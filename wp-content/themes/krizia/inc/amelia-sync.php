<?php
/**
 * Amelia synchronization.
 *
 * Stores a simplified local copy of Amelia packages and events
 * for use inside the Krizia theme.
 *
 * @package Krizia
 */

defined('ABSPATH') || exit;

/**
 * Option names used to store synchronized Amelia data.
 */
const KRIZIA_AMELIA_PACKAGES_OPTION = 'krizia_amelia_packages';
const KRIZIA_AMELIA_EVENTS_OPTION   = 'krizia_amelia_events';

/**
 * Format an Amelia price.
 *
 * @param mixed $price Raw Amelia price.
 * @return float
 */
function krizia_amelia_normalize_price($price)
{
    return is_numeric($price) ? (float) $price : 0.0;
}

/**
 * Normalize an Amelia image URL.
 *
 * @param array $item Amelia item.
 * @return string
 */
function krizia_amelia_get_image(array $item)
{
    if (!empty($item['pictureFullPath'])) {
        return esc_url_raw($item['pictureFullPath']);
    }

    if (!empty($item['pictureThumbPath'])) {
        return esc_url_raw($item['pictureThumbPath']);
    }

    if (!empty($item['gallery'][0]['pictureFullPath'])) {
        return esc_url_raw($item['gallery'][0]['pictureFullPath']);
    }

    if (!empty($item['gallery'][0]['pictureThumbPath'])) {
        return esc_url_raw($item['gallery'][0]['pictureThumbPath']);
    }

    return '';
}

/**
 * Extract the number of appointments included in a package.
 *
 * A package can technically contain several services. We add all the
 * quantities so the theme can display the total number of appointments.
 *
 * @param array $package Amelia package.
 * @return int
 */
function krizia_amelia_get_package_quantity(array $package)
{
    if (empty($package['bookable']) || !is_array($package['bookable'])) {
        return 0;
    }

    $quantity = 0;

    foreach ($package['bookable'] as $bookable) {
        if (!empty($bookable['quantity'])) {
            $quantity += absint($bookable['quantity']);
        }
    }

    return $quantity;
}

/**
 * Extract service names from an Amelia package.
 *
 * @param array $package Amelia package.
 * @return array
 */
function krizia_amelia_get_package_services(array $package)
{
    if (empty($package['bookable']) || !is_array($package['bookable'])) {
        return [];
    }

    $services = [];

    foreach ($package['bookable'] as $bookable) {
        if (empty($bookable['service']) || !is_array($bookable['service'])) {
            continue;
        }

        $service = $bookable['service'];

        $services[] = [
            'id'       => !empty($service['id']) ? absint($service['id']) : 0,
            'name'     => !empty($service['name']) ? sanitize_text_field($service['name']) : '',
            'quantity' => !empty($bookable['quantity']) ? absint($bookable['quantity']) : 0,
            'duration' => !empty($service['duration']) ? absint($service['duration']) : 0,
        ];
    }

    return $services;
}

/**
 * Normalize a package received from Amelia.
 *
 * @param array $package Raw package.
 * @return array
 */
function krizia_amelia_normalize_package(array $package)
{
    return [
        'id'          => !empty($package['id']) ? absint($package['id']) : 0,
        'name'        => !empty($package['name']) ? sanitize_text_field($package['name']) : '',
        'description' => !empty($package['description'])
            ? wp_kses_post($package['description'])
            : '',
        'price'       => krizia_amelia_normalize_price($package['price'] ?? 0),
        'status'      => !empty($package['status'])
            ? sanitize_key($package['status'])
            : '',
        'color'       => !empty($package['color'])
            ? sanitize_hex_color($package['color'])
            : '',
        'image'       => krizia_amelia_get_image($package),
        'quantity'    => krizia_amelia_get_package_quantity($package),
        'services'    => krizia_amelia_get_package_services($package),
        'position'    => isset($package['position'])
            ? absint($package['position'])
            : 0,
        'updated_at'  => current_time('mysql'),
    ];
}

/**
 * Return the first period of an Amelia event.
 *
 * @param array $event Amelia event.
 * @return array
 */
function krizia_amelia_get_first_event_period(array $event)
{
    if (empty($event['periods']) || !is_array($event['periods'])) {
        return [];
    }

    $periods = $event['periods'];

    usort(
        $periods,
        static function ($first, $second) {
            $first_start  = $first['periodStart'] ?? '';
            $second_start = $second['periodStart'] ?? '';

            return strcmp($first_start, $second_start);
        }
    );

    return $periods[0] ?? [];
}

/**
 * Extract Amelia event tags.
 *
 * Amelia may provide tags as strings or arrays depending on its version.
 *
 * @param array $event Amelia event.
 * @return array
 */
function krizia_amelia_get_event_tags(array $event)
{
    if (empty($event['tags']) || !is_array($event['tags'])) {
        return [];
    }

    $tags = [];

    foreach ($event['tags'] as $tag) {
        if (is_string($tag)) {
            $tags[] = sanitize_text_field($tag);
            continue;
        }

        if (is_array($tag)) {
            $tag_name = $tag['name'] ?? $tag['value'] ?? '';

            if ($tag_name) {
                $tags[] = sanitize_text_field($tag_name);
            }
        }
    }

    return array_values(array_unique(array_filter($tags)));
}

/**
 * Normalize an event received from Amelia.
 *
 * @param array $event Raw event.
 * @return array
 */
function krizia_amelia_normalize_event(array $event)
{
    $period = krizia_amelia_get_first_event_period($event);

    return [
        'id'          => !empty($event['id']) ? absint($event['id']) : 0,
        'parent_id'   => !empty($event['parentId']) ? absint($event['parentId']) : 0,
        'name'        => !empty($event['name']) ? sanitize_text_field($event['name']) : '',
        'description' => !empty($event['description'])
            ? wp_kses_post($event['description'])
            : '',
        'price'       => krizia_amelia_normalize_price($event['price'] ?? 0),
        'status'      => !empty($event['status'])
            ? sanitize_key($event['status'])
            : '',
        'show'        => !empty($event['show']),
        'image'       => krizia_amelia_get_image($event),
        'start'       => !empty($period['periodStart'])
            ? sanitize_text_field($period['periodStart'])
            : '',
        'end'         => !empty($period['periodEnd'])
            ? sanitize_text_field($period['periodEnd'])
            : '',
        'capacity'    => isset($event['maxCapacity'])
            ? absint($event['maxCapacity'])
            : 0,
        'spots_sold'  => isset($event['spotsSold'])
            ? absint($event['spotsSold'])
            : 0,
        'location'    => !empty($event['customLocation'])
            ? sanitize_text_field($event['customLocation'])
            : (
                !empty($event['location']['name'])
                    ? sanitize_text_field($event['location']['name'])
                    : ''
            ),
        'tags'        => krizia_amelia_get_event_tags($event),
        'updated_at'  => current_time('mysql'),
    ];
}

/**
 * Save or update one synchronized item.
 *
 * @param string $option_name WordPress option name.
 * @param array  $item        Normalized item.
 * @return void
 */
function krizia_amelia_store_item($option_name, array $item)
{
    if (empty($item['id'])) {
        return;
    }

    $items = get_option($option_name, []);

    if (!is_array($items)) {
        $items = [];
    }

    $items[$item['id']] = $item;

    update_option($option_name, $items, false);
}

/**
 * Remove one synchronized item.
 *
 * @param string $option_name WordPress option name.
 * @param mixed  $payload     Hook payload or item ID.
 * @return void
 */
function krizia_amelia_delete_item($option_name, $payload)
{
    $id = 0;

    if (is_numeric($payload)) {
        $id = absint($payload);
    } elseif (is_array($payload) && !empty($payload['id'])) {
        $id = absint($payload['id']);
    }

    if (!$id) {
        return;
    }

    $items = get_option($option_name, []);

    if (!is_array($items) || !isset($items[$id])) {
        return;
    }

    unset($items[$id]);

    update_option($option_name, $items, false);
}

/**
 * Synchronize an added or updated Amelia package.
 *
 * @param array $package Amelia package.
 * @return void
 */
function krizia_sync_amelia_package($package)
{
    if (!is_array($package)) {
        return;
    }

    krizia_amelia_store_item(
        KRIZIA_AMELIA_PACKAGES_OPTION,
        krizia_amelia_normalize_package($package)
    );
}

/**
 * Synchronize an added or updated Amelia event.
 *
 * Amelia sends the new event as the first hook argument. On update,
 * the second argument contains the previous version.
 *
 * @param array $event Amelia event.
 * @return void
 */
function krizia_sync_amelia_event($event)
{
    if (!is_array($event)) {
        return;
    }

    krizia_amelia_store_item(
        KRIZIA_AMELIA_EVENTS_OPTION,
        krizia_amelia_normalize_event($event)
    );
}

/**
 * Delete a synchronized package.
 *
 * @param mixed $package Amelia package or package ID.
 * @return void
 */
function krizia_delete_amelia_package($package)
{
    krizia_amelia_delete_item(
        KRIZIA_AMELIA_PACKAGES_OPTION,
        $package
    );
}

/**
 * Delete a synchronized event.
 *
 * @param mixed $event Amelia event or event ID.
 * @return void
 */
function krizia_delete_amelia_event($event)
{
    krizia_amelia_delete_item(
        KRIZIA_AMELIA_EVENTS_OPTION,
        $event
    );
}

add_action(
    'amelia_after_package_added',
    'krizia_sync_amelia_package',
    10,
    1
);

add_action(
    'amelia_after_package_updated',
    'krizia_sync_amelia_package',
    10,
    1
);

add_action(
    'amelia_after_package_deleted',
    'krizia_delete_amelia_package',
    10,
    1
);

add_action(
    'amelia_after_event_added',
    'krizia_sync_amelia_event',
    10,
    1
);

add_action(
    'amelia_after_event_updated',
    'krizia_sync_amelia_event',
    10,
    1
);

add_action(
    'amelia_after_event_deleted',
    'krizia_delete_amelia_event',
    10,
    1
);

/**
 * Return synchronized Amelia packages.
 *
 * @param bool $visible_only Return only visible packages.
 * @return array
 */
function krizia_get_amelia_packages($visible_only = true)
{
    $packages = get_option(KRIZIA_AMELIA_PACKAGES_OPTION, []);

    if (!is_array($packages)) {
        return [];
    }

    if ($visible_only) {
        $packages = array_filter(
            $packages,
            static function ($package) {
                return ($package['status'] ?? '') === 'visible';
            }
        );
    }

    uasort(
        $packages,
        static function ($first, $second) {
            $first_id  = absint($first['id'] ?? 0);
            $second_id = absint($second['id'] ?? 0);

            return $first_id <=> $second_id;
        }
    );

    return array_values($packages);
}

/**
 * Return synchronized Amelia events.
 *
 * @param bool $future_only  Return only future events.
 * @param bool $visible_only Return only visible and approved events.
 * @return array
 */
function krizia_get_amelia_events($future_only = true, $visible_only = true)
{
    $events = get_option(KRIZIA_AMELIA_EVENTS_OPTION, []);

    if (!is_array($events)) {
        return [];
    }

    if ($visible_only) {
        $events = array_filter(
            $events,
            static function ($event) {
                return !empty($event['show'])
                    && ($event['status'] ?? '') === 'approved';
            }
        );
    }

    if ($future_only) {
        $now = current_time('timestamp');

        $events = array_filter(
            $events,
            static function ($event) use ($now) {
                if (empty($event['start'])) {
                    return false;
                }

                $start = strtotime($event['start']);

                return $start && $start >= $now;
            }
        );
    }

    uasort(
        $events,
        static function ($first, $second) {
            return strcmp(
                $first['start'] ?? '',
                $second['start'] ?? ''
            );
        }
    );

    return array_values($events);
}

/**
 * Return one synchronized Amelia package.
 *
 * @param int $package_id Package ID.
 * @return array|null
 */
function krizia_get_amelia_package($package_id)
{
    $packages = get_option(KRIZIA_AMELIA_PACKAGES_OPTION, []);
    $package_id = absint($package_id);

    return !empty($packages[$package_id])
        ? $packages[$package_id]
        : null;
}

/**
 * Return one synchronized Amelia event.
 *
 * @param int $event_id Event ID.
 * @return array|null
 */
function krizia_get_amelia_event($event_id)
{
    $events = get_option(KRIZIA_AMELIA_EVENTS_OPTION, []);
    $event_id = absint($event_id);

    return !empty($events[$event_id])
        ? $events[$event_id]
        : null;
}
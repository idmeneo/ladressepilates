<?php
/**
 * Register Agenda block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type([
    'name'            => 'krizia-agenda',
    'title'           => __('Agenda', 'krizia'),
    'description'     => __('Section agenda avec liste d’événements.', 'krizia'),
    'category'        => 'formatting',
    'icon'            => 'calendar-alt',
    'keywords'        => ['agenda', 'evenements', 'formation'],
    'render_template' => get_template_directory() . '/blocks/agenda/template.php',
    'mode'            => 'preview',
    'supports'        => [
        'align'  => false,
        'anchor' => true,
        'jsx'    => true,
    ],
]);
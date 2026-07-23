<?php
/**
 * Register Agenda block.
 *
 * @package Krizia
 */

if (!function_exists('acf_register_block_type')) {
    return;
}

acf_register_block_type(
    array(
        'name'        => 'krizia-agenda',
        'title'       => __('Agenda', 'krizia'),
        'description' => __(
            'Section agenda avec liste d’événements.',
            'krizia'
        ),
        'category'    => 'formatting',
        'icon'        => 'calendar-alt',

        'keywords' => array(
            'agenda',
            'événements',
            'formation',
        ),

        'render_template' => get_template_directory()
            . '/blocks/agenda/template.php',

        'enqueue_assets' => function () {
            krizia_enqueue_block_style('agenda');
        },

        'mode' => 'preview',

        'supports' => array(
            'align'  => false,
            'anchor' => true,
            'jsx'    => true,
        ),
    )
);
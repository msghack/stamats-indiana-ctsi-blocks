<?php

/**
 * Plugin Name:       Indiana CTSI Blocks
 * Description:       Custom Plugin for Indiana CTSI Blocks
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.0.2
 * Author:            Subham Banerjee
 * License:           GPL-3.0
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package CreateBlock
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

function register_layout_category($block_categories)
{
    $new[] = array(
        'slug'  => 'custom-block-category',
        'title' => 'Indiana CTSI Blocks',
        'icon' => null
    );
    $position = 1;
    $block_categories = array_merge(array_slice($block_categories, 0, $position, true), $new, array_slice($block_categories, $position, null, true));
    $block_categories = array_values($block_categories);
    return $block_categories;
}
add_filter('block_categories_all', 'register_layout_category', 10, 2);

function create_block_indiana_ctsi_blocks_block_init()
{
    register_block_type(__DIR__ . '/acf-blocks/container-block');
    register_block_type(__DIR__ . '/acf-blocks/home-banner');
    register_block_type(__DIR__ . '/acf-blocks/interior-banner');
    register_block_type(__DIR__ . '/acf-blocks/icon-links-block');
    register_block_type(__DIR__ . '/acf-blocks/accordion-block');
    register_block_type(__DIR__ . '/acf-blocks/media-showcase-block');
    register_block_type(__DIR__ . '/acf-blocks/location-block');
    register_block_type(__DIR__ . '/acf-blocks/cards-block');
    register_block_type(__DIR__ . '/acf-blocks/image-carousel-block');
    register_block_type(__DIR__ . '/acf-blocks/announcement-block');
    register_block_type(__DIR__ . '/acf-blocks/button-cta-block');
    register_block_type(__DIR__ . '/acf-blocks/news-block');
    register_block_type(__DIR__ . '/acf-blocks/contact-block');
	  register_block_type(__DIR__ . '/acf-blocks/contact-block-2');
}
add_action('init', 'create_block_indiana_ctsi_blocks_block_init');

function register_paragraph_styles()
{
    register_block_style(
        'core/table',
        array(
            'name'  => 'vertical-table',
            'label' => __('Vertical Table', 'ctsitheme'),
        )
    );
    register_block_style(
        'core/table',
        array(
            'name'  => 'horizontal-table',
            'label' => __('Horizontal Table', 'ctsitheme'),
        )
    );
    register_block_style(
        'core/table',
        array(
            'name'  => 'simple-table',
            'label' => __('Simple Table', 'ctsitheme'),
        )
    );
    register_block_style(
        'core/paragraph',
        array(
            'name'  => 'intro',
            'label' => __('Intro Text', 'ctsitheme'),
        )
    );
    register_block_style(
        'core/paragraph',
        array(
            'name'  => 'table-intro',
            'label' => __('Table Intro ', 'ctsitheme'),
        )
    );
}

add_action('init', 'register_paragraph_styles');





function sidebar_plugin_register()
{
    wp_register_script(
        'page-sidebar-js',
        plugin_dir_url(__FILE__) . '/page-type-build/index.js',
        array('wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data', 'wp-compose')
    );
}
add_action('init', 'sidebar_plugin_register');

function sidebar_plugin_script_enqueue()
{
    wp_enqueue_script('page-sidebar-js');
}
add_action('enqueue_block_editor_assets', 'sidebar_plugin_script_enqueue');



function pagetype_register_meta()
{
    register_post_meta('page', '_page_type_interior', array(
        'show_in_rest' => true,
        'type' => 'boolean',
        'single' => true,
        'default' => true,
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ));
}
add_action('init', 'pagetype_register_meta');


add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
function add_default_value_to_image_field($field)
{
    acf_render_field_setting($field, array(
        'label'            => 'Default Image',
        'instructions'        => 'Appears when creating a new post',
        'type'            => 'image',
        'name'            => 'default_value',
    ));
}

function customize_latest_posts_block($block_content, $block) {
    if ( 'core/post-author-name' === $block['blockName'] ) {
        // Use a regular expression to target the "by" in the author div specifically
        $pattern = '/<div class="wp-block-post-author-name">/';
        $replacement = '<div class="wp-block-post-author-name">By ';
        $block_content = preg_replace($pattern, $replacement, $block_content);
    }
    return $block_content;
}
add_filter('render_block', 'customize_latest_posts_block', 10, 2);








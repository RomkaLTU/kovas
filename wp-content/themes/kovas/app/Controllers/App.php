<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function works( $cat = false )
    {
        $args = [
            'post_type' => 'work',
            'post_per_page' => -1,
            'orderby' => 'menu_order',
            'nopaging' => true,
        ];

        if ( $cat ) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'work_categories',
                    'field' => 'slug',
                    'terms' => $cat,
                ]
            ];
        }

        $args['meta_query'] = [
            'relation'		=> 'OR',
            [
                'key'	 	=> 'show_on_gallery',
                'compare' 	=> 'NOT EXISTS',
            ],
            [
                'key'	 	=> 'show_on_gallery',
                'value'	  	=> '0',
                'compare' 	=> '!=',
            ],
        ];

        $wp_query = new \WP_Query( $args );

        return $wp_query->get_posts();
    }

    public static function getPermalinkByTemplate( $template )
    {
        global $wpdb;

        $template = 'views/template-' . $template . '.blade.php';

        $page_id = $wpdb->get_var("SELECT `post_id` FROM $wpdb->postmeta WHERE `meta_key` = '_wp_page_template' AND `meta_value` = '{$template}'");

        if ( empty($page_id) ) {
            return false;
        }

        return get_permalink($page_id);
    }

    public static function work_cats()
    {
        return get_terms([
            'taxonomy' => 'work_categories',
            'hide_empty' => false,
        ]);
    }
}

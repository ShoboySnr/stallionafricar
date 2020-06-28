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

    public static function homeSlider() {
        $args = [
            'numberposts' => 3,
            'post_type' => 'automobile',
            'meta_key'		=> 'show_as_homepage_slider',
            'meta_value'	=> true
        ];
        $sliders = get_posts($args);

        return $sliders;
    }

    public static function getAutomobiles($page = 1) {
        $args = [
            'numberposts' => -1,
            'post_type' => 'automobile',
            'page' => $page,
        ];

        $automobiles = get_posts($args);

        return $automobiles;
    }

    public static function groupByYear() {
        $years = [];
        $args = [
            'posts_per_page' => -1,
            'post_type' => 'automobile',
            'meta_key' => 'year_of_manufacture',
            'meta_value' => null,
            'meta_compare' => 'NOT',
            'post_status' => 'publish',
            'orderby' => 'meta_value',
            'order' => 'DESC',
        ];
        $years = query_posts($args);
        return $years;
    }
}

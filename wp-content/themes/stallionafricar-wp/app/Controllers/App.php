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
        $returnyears = [];
        $selected = '';
        $args = [
            'posts_per_page' => -1,
            'post_type' => 'automobile',
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key' => 'year_of_manufacture',
                    'value' => '',
                    'compare' => '!='
                ],
                [
                    'key' => 'year_of_manufacture',
                    'compare' => 'NOT EXISTS'
                ],
            ],
            'post_status' => 'publish',
            'order' => 'DESC',
        ];
        $years = get_posts($args);
        foreach($years as $year) {
           $prev_year = get_field('year_of_manufacture', $year->ID);

           if ($selected != $prev_year) {
            $returnyears[] = [
                'year_of_manufacture' => $prev_year,
                'id' => $year->ID,
            ];
           }
            $selected = $prev_year;
        }

        return $returnyears;
    }

    public static function groupByTransmission() {
        $returnTransmission = [];
        $selected = '';
        $args = [
            'posts_per_page' => -1,
            'post_type' => 'automobile',
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key' => 'transmission',
                    'value' => '',
                    'compare' => '!='
                ],
                [
                    'key' => 'transmission',
                    'compare' => 'NOT EXISTS'
                ],
            ],
            'post_status' => 'publish',
            'order' => 'DESC',
        ];
        $transmissions = get_posts($args);
        foreach($transmissions as $transmission) {
           $transmission_value = get_field('transmission', $transmission->ID);
           $transmission_unit = get_field('transmission_unit', $transmission->ID);

           $transmission_full_value = $transmission_value.' - '.$transmission_unit;

           if ($selected != $transmission_full_value) {
            $returnyears[] = [
                'transmission' => $transmission_value,
                'id' => $transmission->ID,
                'transmission_unit' => $transmission_unit,
            ];
           }
            $selected = $transmission_full_value;
        }

        return $returnyears;
    }

    public static function getServiceCenter($page = 1) {
        $args = [
            'posts_per_page' => -1,
            'post_type' => 'service_center',
            'page' => $page,
        ];

        $service_centers = get_posts($args);

        return $service_centers;
    }

    public static function getCustomCategory($term_id, $post_type = 'post', $taxonomy = 'categories') {
        $args = [
            'posts_per_page' => -1,
            'post_type' => $post_type,
            'tax_query' => [
                [
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => $term_id
                ]
            ]
        ];

        $categories = get_posts($args);

        return $categories;
    }
}

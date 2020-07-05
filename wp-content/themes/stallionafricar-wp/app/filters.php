<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);


/**
 * Add Search Bar
 */
add_filter('wp_nav_menu_items', function ($items, $args) {
    if(!is_admin() && ($args->theme_location == 'primary_navigation' || $args->theme_location == 'autombile_navigation' || $args->theme_location == 'mobile_navigation'))
        return $items."<li id='menu-item-search' class='menu-item menu-item-type-custom menu-item-object-custom menu-item-search search-icon hidden lg:block' style='margin-left:0;margin-right:0;padding-right:0;'><a href='#searchform' rel='modal:open'>
        <svg width='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'>
        <path d='M0.749971 6.58824C0.749971 9.79741 3.41294 12.4265 6.73221 12.4265C10.0515 12.4265 12.7144 9.79741 12.7144 6.58824C12.7144 3.37907 10.0515 0.75 6.73221 0.75C3.41294 0.75 0.749971 3.37907 0.749971 6.58824Z' stroke='black' stroke-width='1.5'/>
        <line y1='-0.75' x2='6.72825' y2='-0.75' transform='matrix(0.714709 0.699422 0.714709 -0.699422 11.541 11.2941)' stroke='black' stroke-width='1.5'/>
        </svg></a></li>";
 
    return $items;
}, 10, 2);
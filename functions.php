<?php
/**
 * Numerika Theme functions and definitions
 */

if (!defined('NUMERIKA_VERSION')) {
    // Replace the version number when modifying resources
    define('NUMERIKA_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function numerika_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Register menu locations
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'numerika'),
            'footer-1' => esc_html__('Footer Menu 1', 'numerika'),
            'footer-2' => esc_html__('Footer Menu 2', 'numerika'),
        )
    );

    // Switch default core markup to output valid HTML5
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'numerika_setup');

/**
 * Register widget area.
 */
function numerika_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'numerika'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'numerika'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    
    register_sidebar(
        array(
            'name'          => esc_html__('Footer Widget Area', 'numerika'),
            'id'            => 'footer-widget',
            'description'   => esc_html__('Add footer widgets here.', 'numerika'),
            'before_widget' => '<div class="footer-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'numerika_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function numerika_scripts() {
    // Enqueue Tailwind CSS
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/assets/css/tailwind.min.css', array(), NUMERIKA_VERSION);
    
    // Enqueue theme stylesheet
    wp_enqueue_style('numerika-style', get_template_directory_uri() . '/assets/css/main.css', array('tailwindcss'), NUMERIKA_VERSION);
    
    // Enqueue theme JavaScript
    wp_enqueue_script('jquery');
    wp_enqueue_script('numerika-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), NUMERIKA_VERSION, true);
    wp_enqueue_script('numerika-data-animation', get_template_directory_uri() . '/assets/js/data-animation.js', array('jquery'), NUMERIKA_VERSION, true);
    wp_enqueue_script('numerika-testimonials', get_template_directory_uri() . '/assets/js/testimonials-carousel.js', array('jquery'), NUMERIKA_VERSION, true);
    wp_enqueue_script('numerika-portfolio', get_template_directory_uri() . '/assets/js/portfolio-gallery.js', array('jquery'), NUMERIKA_VERSION, true);
    wp_enqueue_script('numerika-tabs', get_template_directory_uri() . '/assets/js/tabs.js', array('jquery'), NUMERIKA_VERSION, true);
    wp_enqueue_script('numerika-contact-form', get_template_directory_uri() . '/assets/js/contact-form.js', array('jquery'), NUMERIKA_VERSION, true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'numerika_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Register Custom Post Types
 */
function numerika_register_post_types() {
    // Register Testimonials CPT
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('Testimonials', 'numerika'),
            'singular_name' => __('Testimonial', 'numerika'),
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
    ));
    
    // Register Portfolio CPT
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => __('Portfolio', 'numerika'),
            'singular_name' => __('Portfolio Item', 'numerika'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
    ));
    
    // Register Training CPT
    register_post_type('training', array(
        'labels' => array(
            'name' => __('Trainings', 'numerika'),
            'singular_name' => __('Training', 'numerika'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'numerika_register_post_types');

/**
 * Register Custom Taxonomies
 */
function numerika_register_taxonomies() {
    // Register Portfolio Category Taxonomy
    register_taxonomy('portfolio_category', 'portfolio', array(
        'labels' => array(
            'name' => __('Portfolio Categories', 'numerika'),
            'singular_name' => __('Portfolio Category', 'numerika'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
    ));
    
    // Register Training Category Taxonomy
    register_taxonomy('training_category', 'training', array(
        'labels' => array(
            'name' => __('Training Categories', 'numerika'),
            'singular_name' => __('Training Category', 'numerika'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'numerika_register_taxonomies');

/**
 * Register ACF fields if ACF is active
 */
function numerika_acf_init() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));
        
        acf_add_options_sub_page(array(
            'page_title' => 'Home Page Settings',
            'menu_title' => 'Home Page',
            'parent_slug' => 'theme-general-settings',
        ));
        
        acf_add_options_sub_page(array(
            'page_title' => 'Contact Information',
            'menu_title' => 'Contact Info',
            'parent_slug' => 'theme-general-settings',
        ));
    }
}
add_action('acf/init', 'numerika_acf_init');

/**
 * Add ACF JSON save point
 */
function numerika_acf_json_save_point($path) {
    return get_stylesheet_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'numerika_acf_json_save_point');

/**
 * Add ACF JSON load point
 */
function numerika_acf_json_load_point($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'numerika_acf_json_load_point');

<?php

function mytheme_enqueue_styles()
{
  wp_enqueue_style('mytheme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

function custom_post_type_speakers()
{

  $labels = array(
    'name'                  => _x('speakers', 'Post Type General Name', 'text_domain'),
    'singular_name'         => _x('speaker', 'Post Type Singular Name', 'text_domain'),
    'menu_name'             => __('speakers', 'text_domain'),
    'all_items'             => __('All speakers', 'text_domain'),
    'add_new_item'          => __('Add New speaker', 'text_domain'),
    'add_new'               => __('Add New', 'text_domain'),
    'new_item'              => __('New speaker', 'text_domain'),
    'edit_item'             => __('Edit speaker', 'text_domain'),
    'update_item'           => __('Update speaker', 'text_domain'),
    'view_item'             => __('View speaker', 'text_domain'),
    'search_items'          => __('Search speakers', 'text_domain'),
    'not_found'             => __('Not Found', 'text_domain'),
    'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
  );
  $args = array(
    'label'                 => __('speaker', 'text_domain'),
    'description'           => __('speakers custom post type', 'text_domain'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-thumbnails'),
    'hierarchical'          => true,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'show_in_nav_menus'     => true,
    'show_in_admin_bar'     => true,
    'menu_position'         => 5,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post', // Change to 'post' for standard posts
    'taxonomies'            => array('category', 'post_tag'), // Add support for categories and tags
    'rewrite'               => array('slug' => 'speakers'), // Specify the custom post type's slug
  );
  register_post_type('speakers', $args);
}
add_action('init', 'custom_post_type_speakers', 0);

add_theme_support('post-thumbnails');

// Enqueue Scripts
function enqueue_custom_script()
{
  wp_enqueue_script('custom-ajax-script', get_template_directory_uri() . '/custom-ajax.js', array('jquery'), null, false);
  wp_localize_script('custom-ajax-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_custom_script');

function get_posts_data_callback()
{
  $current_speaker_count =$_POST['current_speaker_count'];
  $args = array(
    'post_type' => 'speakers',
    'posts_per_page' => 3,
    'offset'         => $current_speaker_count,
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $post_id = $query->ID;
      $speakerName = get_field('speaker_name', $post_id);
      $speakerDesignation = get_field('speaker_designation', $post_id);
      echo '<article class="speaker-container">';
      echo '<p>' . esc_html($speakerName) . '</p>';
      echo '<p>' . esc_html($speakerDesignation) . '</p>';
      echo '</article>';
    }
  }
  wp_die(); 
}

add_action('wp_ajax_get_posts_data', 'get_posts_data_callback');
add_action('wp_ajax_nopriv_get_posts_data', 'get_posts_data_callback'); 


?>
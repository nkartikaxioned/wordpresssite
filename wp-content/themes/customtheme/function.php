<?php
function mytheme_enqueue_styles() {
    wp_enqueue_style('style.css', get_stylesheet_uri());
 }
 add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');
 
?>
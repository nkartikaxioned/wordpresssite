<?php
/*
Template Name: Speaker Listing Template
*/
get_header(); ?>
<div class="speakers-lists">
<?php
$args = array(
    'post_type' => 'speakers',
    'posts_per_page' => 3,
  );
  $speakers_query = new WP_Query($args);
  if ($speakers_query->have_posts()) {
    while ($speakers_query->have_posts()) {
      $speakers_query->the_post();
      $post_id = $speakers_query->ID;
      $speakerName = get_field('speaker_name', $post_id);
      $speakerDesignation = get_field('speaker_designation', $post_id);
  ?>
      <article class="speaker-container">
          <?php 
          if ($speakerName) { ?>
            <h4 class="speaker-name"><?php echo $speakerName; ?></h4>
          <?php }
          if ($speakerDesignation) { ?>
            <p class="speaker-designation"><?php echo $speakerDesignation; ?></p>
          <?php } ?>
      </article>
  <?php
    }
  } ?>
</div>
  <div id="load-more-container">
    <button id="load-more-button">Load More</button>
    <button id="show-less-button" style="display: none;">Show Less</button>
  </div>
</section>
<?php get_footer(); ?>
<?php
/*
Template Name: EuroFinance Template
*/
?>
<?php

if (have_rows('flexible_container')) {
  $flexible = get_field('flexible_container');
  // var_dump($flexible);
  while (have_rows('flexible_container')) {
    the_row();

    if (get_row_layout() == 'learn_and_engage_section') {
?>
      <section class="learn-and-engage-section">
        <div class="wrapper">
          <?php
          $heading = get_sub_field('learn_and_engage_heading');
          $short_Description = get_sub_field('learn_and_engage_short_description');
          $events = get_sub_field('all_events');
          ?>
          <?php if (!empty($heading)) { ?>
            <h2 class="learn-and-engage-section-heading"><?php echo $heading; ?></h2>
          <?php } ?>
          <ul>
            <?php
            foreach ($events as $event) {
              $image = $event['event_image']['url'];
              $image_alt = $event['event_image']['alt'];
              $title = $event['event_title'];
            ?>
              <li>
                <?php if (!empty($image)) { ?>
                  <img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
                <?php } ?>
                <?php if (!empty($title)) { ?>
                  <h3 class="description_title"><?php echo $title; ?></h3>
                <?php } ?>
              </li>
            <?php } ?>
          </ul>
          <?php if (!empty($short_Description)) { ?>
            <h2 class="learn-and-engage-section-description"><?php echo $short_Description; ?></h2>
          <?php } ?>
        </div>
      </section>
    <?php
    } elseif (get_row_layout() == 'latest_from_newsroom_container') {
    ?>
      <section class="latest-from-newsroom-container">
        <div class="wrapper">
          <?php
          $heading = get_sub_field('latest_from_newsroom_heading');
          ?>
          <h2 class="latest-from-newsroom-heading"><?php echo $heading; ?></h2>
          <?php
          $news = get_sub_field('news_rooms');
          foreach ($news as $single_news) {
            $image = $single_news['new_room_image']['url'];
            $image_alt = $single_news['new_room_image']['alt'];
            $title = $single_news['news_room_title'];
            $date = $single_news['news_date'];
            $description = $single_news['short_description_of_news'];
          ?>
            <?php if (!empty($image)) { ?>
              <img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
            <?php } ?>
            <?php if (!empty($title)) { ?>
              <h3><?php echo $title; ?></h3>
            <?php } ?>
            <?php if (!empty($date)) { ?>
              <p><?php echo $date; ?></p>
            <?php } ?>
            <?php if (!empty($description)) { ?>
              <p><?php echo $description; ?></p>
            <?php } ?>
          <?php
          }
          ?>
        </div>
      </section>
    <?php
    } elseif (get_row_layout() == 'featured_events_section') {
    ?>
      <section class="featured-events-section">
        <div class="wrapper">
          <?php
          $image = get_sub_field('featured_events_image');
          $heading = get_sub_field('featured_event_heading');
          $annual_heading = get_sub_field('eruo_finance_annual');
          $title = get_sub_field('euro_finance_international');
          $location = get_sub_field('event_time_month_and_loaction');
          $sub_heading = get_sub_field('worlds_largest_treasury_event');
          $speakers = get_sub_field('speakers');
          $description = get_sub_field('description_of_speakers');
          $link = get_sub_field('find_out_more');
          ?>
          <?php if (!empty($heading)) { ?>
            <h2 class="featured-events-section-heading"><?php echo $heading; ?></h2>
          <?php } ?>
          <?php if (!empty($image)) { ?>
            <figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
          <?php } ?>
          <?php if (!empty($annual_heading)) { ?>
            <p><?php echo $annual_heading; ?></p>
          <?php } ?>
          <?php if (!empty($title)) { ?>
            <p><?php echo $title; ?></p>
          <?php } ?>
          <?php if (!empty($location)) { ?>
            <p><?php echo $location; ?></p>
          <?php } ?>
          <?php if (!empty($sub_heading)) { ?>
            <h3 class="sub_heading"><?php echo $sub_heading; ?></h3>
          <?php } ?>
          <?php if (!empty($speakers)) { ?>
            <ul class="speaker-list">
              <?php
              foreach ($speakers as $speaker) {
              ?>
                <li>
                  <?php if (!empty($speaker['count_of_speakers'])) { ?>
                    <div><?php echo $speaker['count_of_speakers']; ?></div>
                  <?php } ?>
                  <?php if (!empty($speaker['speakers_type'])) { ?>
                    <p><?php echo $speaker['speakers_type'] ?></p>
                  <?php } ?>
                </li>
              <?php
              }
              ?>
            </ul>
            <?php if (!empty($description)) { ?>
              <?php echo $description; ?>
            <?php } ?>
            <?php if (!empty($link)) { ?>
              <div>
                <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </section>
    <?php
    } elseif (get_row_layout() == 'treasury_talks_section') {
    ?>
      <section>
        <div class="wrapper">
          <?php
          $heading = get_sub_field('treasury_talks_heading');
          $treasury_talks = get_sub_field('treasury_talk_repeater');
          $description = get_sub_field('video_short_description');
          ?>
          <?php if (!empty($heading)) { ?>
            <h2 class="treasury-talks-section-heading"><?php echo $heading; ?></h2>
          <?php } ?>
          <ul>
            <?php if (!empty($treasury_talks)) { ?>
              <?php foreach ($treasury_talks as $treasury_talk) {
                $video = $treasury_talk['treasury_talk_video'];
                $title = $treasury_talk['treasury_content_type'];
              ?>
                <li>
                  <?php echo $video; ?>
                  <p> <?php echo $title; ?></p>
                </li>
              <?php
              } ?>
            <?php } ?>
          </ul>
        </div>
      </section>
    <?php } elseif (get_row_layout() == 'ectn_section') {
      $image = get_sub_field('ectn_image');
      $heading = get_sub_field('ectn_heading');
      $description = get_sub_field('ectn_description');
      $link = get_sub_field('find_out_more');
    ?>
      <section class="ectn-section">
        <div class="wrapper">
          <?php if (!empty($image)) { ?>
            <figure class="ectn-image">
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </figure>
          <?php } ?>
          <?php if (!empty($heading)) { ?>
            <h4 class="ectn-section-heading"><?php echo $heading; ?></h4>
          <?php } ?>
          <?php if (!empty($description)) { ?>
            <p><?php echo $description; ?></p>
          <?php } ?>
          <?php if (!empty($link)) { ?>
            <div>
              <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
            </div>
          <?php } ?>
        </div>
      </section>
<?php
    }
  }
} else {
  echo "no value";
}

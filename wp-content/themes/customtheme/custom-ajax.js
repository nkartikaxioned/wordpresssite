jQuery(document).ready(function ($) {
  var postsPerPage = 3; // Number of posts per load
  var currentSpeakerCount = 3;

  $('#load-more-button').on('click', function () {
      $.ajax({
          url: ajax_object.ajax_url,
          type: 'post',
          data: {
              action: 'get_posts_data',
              current_speaker_count: currentSpeakerCount,
          },
          success: function (response) {
              $('.speakers-lists').append(response);
              currentSpeakerCount += postsPerPage;
          }
      });
  });
});

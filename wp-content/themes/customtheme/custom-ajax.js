jQuery(document).ready(function ($) {
  var postsPerPage = 3; // Number of posts per load
  var currentSpeakerCount = 3;

  // Function to load more posts
  function loadMorePosts() {
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

        // Check if there are more posts
        if (response.trim() === '') {
          $('#load-more-button').hide();
        }
        toggleShowLessButton();
      }
    });
  }

  // Function to show or hide "Show Less" button
  function toggleShowLessButton() {
    var totalPosts = $('.speaker-container').length;

    if (totalPosts > postsPerPage) {
      $('#show-less-button').show();
    } else {
      $('#show-less-button').hide();
    }
  }

  $('#show-less-button').on('click', function () {
    $('.speaker-container').slice(-postsPerPage).remove();
    currentSpeakerCount -= postsPerPage;

    $('#load-more-button').show();
    toggleShowLessButton();
  });

  $('#load-more-button').on('click', function () {
    loadMorePosts();
  });
});

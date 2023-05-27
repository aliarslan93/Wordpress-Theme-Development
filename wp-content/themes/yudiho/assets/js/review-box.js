$(document).ready(function () {
    $('#review_text').focus( function() {
        // store original height
        $(this).attr('data-height', $(this).height());
        // animate the height change
        $(this).animate({ height: 100 }, 'slow');
    }).blur( function(e) {
        // set to original height
        $(this).animate({ height: $(this).attr('data-height') }, 'slow');
    });
});
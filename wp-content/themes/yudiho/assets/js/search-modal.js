(function ($) {
    function form_seach() {
        var search_terms = document.getElementById("search-box").value;
        jQuery.ajax({
            url: searchFile.url,
            type: "POST",
            dataType: 'html',
            data: {
                action: "search_form",
                search_terms: search_terms
            },
            success: function (response) {
                $('#search_result').html(response);
            }

        });
    }

    $(document).on('keyup', "input[type='text'][name='search_terms']", function (e) {
        e.preventDefault();
        form_seach();
    });
})(jQuery);
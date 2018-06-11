$(document).ready(function() {
    $.delete = function(url, article){
        return $.ajax({
            url: url,
            type: 'DELETE',
            contentType: 'application/json'
        }).done(function(response) {
            console.log(response);
            $(`article[data-id=${article}]`).remove();
        }).fail(function(response) {
            console.log(response);
        });
    };

    $(".delete-article-button").on("click", function(e) {
        e.preventDefault();
        $.delete($(this).prop("href"), $(this).attr("data-id"));
    });
});
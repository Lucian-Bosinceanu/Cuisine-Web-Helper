$(document).ready(function() {
    $("#menu-button").on("click", function() {
        if ($("#sidebar-menu").hasClass("visible")) {
            $("#sidebar-menu").removeClass("visible");
            $("#sidebar").toggle();
        }
        else {
            $("#sidebar-menu").addClass("visible");
            $("#sidebar").toggle();
        }
    });

    $(".rss-button").on("click", function(e) {
        e.preventDefault();
        var location = window.location.href;
        window.open(location.substr(0, location.length - 1) + window.exportRssUrl, '_blank');
    });
});
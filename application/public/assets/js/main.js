$(document).ready(function() {
    $("#menu-button").on("click", function() {
        if ($("#sidebar-menu").hasClass("visible")) {
            $("#sidebar-menu").removeClass("visible");
            $("#sidebar").show();
        }
        else {
            $("#sidebar-menu").addClass("visible");
            $("#sidebar").hide();
        }
    });

    $(".rss-button").on("click", function(e) {
        e.preventDefault();
        var location = window.location.hostname;
        window.open("http://" + location + window.exportRssUrl, '_blank');
    });
});
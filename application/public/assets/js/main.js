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
        var location = window.location.href;
        window.open(location.substr(0, location.length - 1) + window.exportRssUrl, '_blank');
    });
});
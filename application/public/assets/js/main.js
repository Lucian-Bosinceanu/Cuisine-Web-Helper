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
});
function toggleSidebar() {

    var sidebar = document.getElementById("sidebar");

    if (sidebar.className.indexOf("visible") >= 0)
        sidebar.classList.remove("visible");
    else
        sidebar.classList.add("visible");
}

function toggleDropdown(id) {

    var element = document.getElementById(id);

    if (element.className.indexOf("drop") >= 0)
        element.classList.remove("drop");
    else
        element.classList.add("drop");
}
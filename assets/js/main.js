function toggleSidebar() {

    var sidebar = document.getElementById("sidebar");

    if (sidebar.className.indexOf("visible") >= 0)
            sidebar.classList.remove("visible");
            else
            sidebar.classList.add("visible");
}
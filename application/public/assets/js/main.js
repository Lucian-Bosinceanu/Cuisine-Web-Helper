function toggleSidebar() {

    var sidebar = document.getElementById("sidebar");

    if (sidebar.className.indexOf("visible") >= 0)
        sidebar.classList.remove("visible");
    else
        sidebar.classList.add("visible");
}

function toggleMenu() {

    var sidebar = document.getElementById("sidebar-menu");

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

$(document).ready(function() {
    var input = document.getElementById("image-upload");
    var label	 = input.previousElementSibling,
        labelVal = label.innerHTML;

    input.addEventListener('change', function(e) {
        var fileName = '';
        fileName = e.target.value.split( '\\' ).pop();

        if( fileName )
            label.querySelector('span').innerHTML = fileName;
        else
            label.innerHTML = labelVal;
    });

    $(".delete-button").on("click", function() {
        $(this).parent().remove();
    });
    $("#add-ingredients-button").on("click", function(){
        $(this).before(`
            <div class="ingredient">
                <label for="ingredient-name-1">Ingredient name | Quantity</label>
                <input type="text" name="ingredients[]" id="ingredient-name-1" class="" required>
                <input type="text" name="quantity[]" id="ingredient-quantity-1" class="" required>
                <button class="delete-button" type="button">Delete</button>
            </div>
        `);
        $(".delete-button").on("click", function() {
            $(this).parent().remove();
        });
    });

    $('#add-step-button').on("click", function() {
        $(this).before(`
            <div class="ingredient">
                <textarea name="how-to-steps[]" id="add-how-to-step-1" required></textarea>
                <button class="delete-button" type="button">Delete</button>
            </div>
        `);
        $(".delete-button").on("click", function() {
            $(this).parent().remove();
        });
        $("textarea").on("keydown", function(){
            // $(this).css({"height": "auto"});
            $(this).css("height", `${this.scrollHeight+2}px`);
        });
    });
    $("textarea").on("keydown", function(){
        // $(this).css({"height": "auto"});
        $(this).css("height", `${this.scrollHeight+2}px`);
    });
});
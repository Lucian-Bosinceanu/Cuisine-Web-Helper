$(document).ready(function() {
    $("#search-button").on("click", function() {
        if ($("#sidebar").hasClass("visible")) {
            $("#sidebar").removeClass("visible");
            $("#sidebar-menu").toggle();
        }
        else {
            $("#sidebar").addClass("visible");
            $("#sidebar-menu").toggle();
        }
    });
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
    $(".opener").on("click", function() {
        if ($(this).hasClass("drop")) {
            $(this).removeClass("drop");
        }
        else {
            $(this).addClass("drop");
        }
    });

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
    $("#add-ingredients-button").on("click", function() {
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
        $("textarea").on("keydown", function() {
            $(this).css("height", `${this.scrollHeight + 2}px`);
        });
    });
    $("textarea").on("keydown", function() {
        $(this).css("height", `${this.scrollHeight + 2}px`);
    });
});
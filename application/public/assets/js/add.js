$(document).ready(function() {
    var input = document.getElementById("image-upload");
    if (input) {
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
    }

    $(".delete-button").on("click", function() {
        $(this).parent().remove();
    });
    $("#add-ingredient-button").on("click", function() {
        $(this).before(`
            <div class="ingredient">
                <label>Ingredient name | Quantity</label>
                <input type="text" name="ingredients[]" required>
                <input type="text" name="quantity[]" required>
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
                <textarea name="how-to-steps[]" required></textarea>
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

    $("#json-button").on("click", function(e) {
        e.preventDefault();
        $.post(exportJsonUrl, 
            function(data) {

            });
    });

    $("#csv-button").on("click", function(e) {
        e.preventDefault();
        $.post(exportCsvUrl,
            function(data) {

            });
    });
});
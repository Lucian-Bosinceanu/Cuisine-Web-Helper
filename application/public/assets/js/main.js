$(document).ready(function() {
    $("#search-button").on("click", function() {
        if ($("#sidebar").hasClass("visible")) {
            $("#sidebar").removeClass("visible");
            $("#menu-button").css("margin-left", "-17em");
        }
        else {
            $("#sidebar").addClass("visible");
            $("#menu-button").css("margin-left", "0em");
        }
    });

    // $(recipeSearchInput).on('input', function() {
	// 	const searchText = $(this).val();

	// 	if (searchText.length !== 0){
	// 		const array = getRecipes(searchText);

	// 		if (array.length !== 0){
	// 			renderRecipes(array);
	// 		}
	// 	}
    // });
    
    // function getSuggestions(value) {
    //     const inputValue = value.trim().toLowerCase();
    //     const inputLength = inputValue.length;
      
    //     return inputLength <= 1 ? [] : usersData.filter(user =>
    //       user.fullName.toLowerCase().slice(0, inputLength) === inputValue
    //     );
    // }

    // function getSuggestions_subjects(value){

	// 	const inputValue = value.trim().toLowerCase();
    //     const inputLength = inputValue.length;
      	
    //   	// console.log(subjectsData);
    //     return inputLength <= 1 ? [] : subjectsData.filter(subj =>
    //       subj.name.toLowerCase().slice(0, inputLength) === inputValue
    //     );
	// }


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
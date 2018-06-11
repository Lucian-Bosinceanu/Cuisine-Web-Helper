$(document).ready(function() {
    $("#recipe-search").keypress(function(e) {
        if(e.which === 13) {
            const searchText = $(this).val();

            if (searchText.length !== 0){
                getRecipes(searchText);
            }
        }
    });

    $("#article-search").keypress(function(e) {
        if(e.which === 13) {
            const searchText = $(this).val();

            if (searchText.length !== 0){
                getArticles(searchText);
            }
        }
    });
    
    function getRecipes(value) {
        const inputValue = value.trim().toLowerCase();
        $.post(searchRecipeTitleUrl, {title: inputValue}, newData);
    }

    function getArticles(value) {
        const inputValue = value.trim().toLowerCase();
        $.post(searchArticleTitleUrl, {title: inputValue}, newData);
    }

    function newData(data) {
        $('#main .inner').children().remove('section');
        $('#main .inner').append(data);
    }
    
    if(typeof tags !== 'undefined') {
        $("#tag-search").select2({
            data: tags,
            tags: true,
            tokenSeparators: [',', ' ']
        }); 
    }

    $("#tag-search-button").on("click", function(e) {
        e.preventDefault();
        console.log($('#tag-search').select2('data'));
    });

    $("#search-button").on("click", function() {
        if ($("#sidebar").hasClass("visible")) {
            $("#sidebar").removeClass("visible");
            $("#sidebar-menu").css("margin-left", "-17em");
        }
        else {
            $("#sidebar").addClass("visible");
            $("#sidebar-menu").css("margin-left", "0em");
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
});
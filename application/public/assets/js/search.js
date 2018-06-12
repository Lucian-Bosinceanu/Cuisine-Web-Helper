$(document).ready(function() {
    $("#article-search").keypress(function(e) {
        if(e.which === 13) {
            const searchText = $(this).val();

            if (searchText.length !== 0){
                getArticles(searchText);
            }
        }
    });

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
        $("#restrictions-search").select2({
            data: tags,
            tags: true,
            tokenSeparators: [',', ' ']
        }); 
    }

    $("#search-button").on("click", function(e) {
        e.preventDefault();
        var title = $("#recipe-search").val().trim().toLowerCase();
        var tags = $('#tag-search').select2('data').map(function(item) {
            return item.text;
        });
        var form = $("#tags-form").serializeArray().map(function(item) {
            return item.name;
        });
        var restrictions = $("#restrictions-search").select2('data').map(function(item) {
            return item.text;
        });
        $.post(searchRecipeUrl, {title: title, tags: tags, form: form, restrictions: restrictions}, newData);
    });

    $("#toggle-search").on("click", function() {
        var hidden = 0;
        if ($("#sidebar").hasClass("visible")) {
            $("#sidebar").removeClass("visible");
            if (!hidden)
                $("#menu-button").show();
        }
        else {
            $("#sidebar").addClass("visible");
            if ($("#sidebar-menu").css("display") !== "none") {
                $("#menu-button").hide();
                hidden = 0;
            }
            else {
                hidden = 1;
            }
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
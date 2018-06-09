@extends('layouts.app')

@section('title', 'Edit recipe')

@section('head')
    <script src="{{ js('main') }}"></script>
@endsection

@section('content')
    @include('partials.logged-sidemenu')
    <div id="main">
        <div class="inner">
            <header id="header">
                <h1 class="title"><strong>Edit</strong> recipe</h1>
                @include('partials.logged-menu')
            </header>

            <section class="recipe-section">
                <div class="content">
                    <label for="recipe-title-add">Recipe Title:</label>
                    <input type="text" name="add" id="recipe-title-add" placeholder="Enter recipe title" required>

                    <label for="recipe-tags-add">Tags:</label>
                    <textarea name="tags" id="recipe-tags-add" placeholder="Enter #tags" required></textarea>
                
                    <label for="recipe-time-add">Time to make:</label>
                    <textarea name="time" id="recipe-time-add" placeholder="Enter the time to make the recipe in minutes" required></textarea>

                    <label>Image:</label>
                    <button id="recipe-upload-button">Upload    </button>
                </div>
            </section>

            <section class="recipe-section">
                <div class="content">
                    <h3>Ingredients</h3>
                    <div class="ingredient">
                        <input type="text" name="ingredients[]" id="add-ingredient-1" class="" required>
                        <button id="delete-ingredient-1">Delete</button>
                    </div>
                    <div class="ingredient">
                        <input type="text" name="ingredients[]" id="add-ingredient-1" class="" required>
                        <button id="delete-ingredient-1">Delete</button>
                    </div>
                    <div class="ingredient">
                        <input type="text" name="ingredients[]" id="add-ingredient-1" class="" required>
                        <button id="delete-ingredient-1">Delete</button>
                    </div>
                    <button>Add ingredient</button>
                </div>
            </section>

            <section class="recipe-section">
                <div class="content">
                    <h3>How to make</h3>
                    <div class="ingredient">
                        <textarea name="how-to-steps[]" id="add-how-to-step-1" required></textarea>
                        <button id="delete-how-to-step-1">Delete</button>
                    </div>
                    <button>Add step</button>
                </div>
            </section>

            <section class="recipe-section">
                <div class="content">
                    <a href="user_profile/my_recipes.html" class="button">Update</a>
                </div>
            </section>
        </div>
    </div>
@endsection

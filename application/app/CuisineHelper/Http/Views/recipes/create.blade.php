@extends('layouts.app')

@section('title', 'Add recipe')

@section('content')
    @include('partials.sidemenu')
    <div id="main">
        <div class="inner">
            <header id="header">
                <h1 class="title"><strong>Add</strong> recipe</h1>
                @include('partials.menu')
            </header>

            <form action="{{ route("recipes.store") }}" method="POST" id="recipe-form">
                <section class="recipe-section">
                    <div class="content">
                        <label for="recipe-title-add">Recipe Title:</label>
                        <input type="text" name="add" id="recipe-title-add" placeholder="Enter recipe title" required>

                        <label for="recipe-tags-add">Tags:</label>
                        <textarea name="tags" id="recipe-tags-add" placeholder="Enter #tags" required></textarea>
                    
                        <label for="recipe-time-add">Time to make:</label>
                        <textarea name="time" id="recipe-time-add" placeholder="Enter the time to make the recipe in minutes" required></textarea>

                        <label for="difficulty-add">Difficulty:</label>
                        <textarea name="difficulty" id="difficulty-add" placeholder="Enter the difficulty" required></textarea>

                        <label for="image-upload" id="image-upload-button" class="button">
                            <span>Choose image to upload (PNG, JPG)</span>
                        </label>
                        <input type="file" id="image-upload" name="image-upload" accept=".jpg, .jpeg, .png">
                        <!-- <button id="recipe-upload-button">Upload</button> -->
                    </div>
                </section>

                <section class="recipe-section">
                    <div class="content">
                        <h3>Ingredients</h3>
                        <div class="ingredient">
                            <label for="ingredient-name-1">Ingredient name | Quantity</label>
                            <input type="text" name="ingredients[]" id="ingredient-name-1" class="" required>
                            <input type="text" name="quantity[]" id="ingredient-quantity-1" class="" required>
                            <button class="delete-button" type="button">Delete</button>
                        </div>
                        <button id="add-ingredients-button" type="button">Add ingredient</button>
                    </div>
                </section>

                <section class="recipe-section">
                    <div class="content">
                        <h3>How to make</h3>
                        <div class="ingredient">
                            <textarea name="how-to-steps[]" id="add-how-to-step-1" required></textarea>
                            <button class="delete-button" type="button">Delete</button>
                        </div>
                        <button id="add-step-button" type="button">Add step</button>
                    </div>
                </section>

                <section class="recipe-section">
                    <div class="content">
                        <!-- <a href="user_profile/my_recipes.html" class="button" id="submit-recipe-button" type="submit">Submit recipe</a> -->
                        <button id="submit-recipe-button" type="submit" formmethod="POST" form="recipe-form">Submit recipe</button>
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection

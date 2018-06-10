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

            <form action="{{ route("recipes.store") }}" method="POST" id="recipe-form" enctype="multipart/form-data">
                <section class="recipe-section">
                    <div class="content">
                        <label for="recipe-title-add">Recipe Title:</label>
                        <input type="text" name="add" id="recipe-title-add" placeholder="Enter recipe title" required>

                        <label for="recipe-description-add">Description:</label>
                        <textarea name="description" id="recipe-description-add" placeholder="Enter a description" required></textarea>

                        <label for="recipe-tags-add">Tags:</label>
                        <textarea name="tags" id="recipe-tags-add" placeholder="e.g. potatoes, pizza, ..." required></textarea>
                    
                        <label for="recipe-time-add">Time to make:</label>
                        <input type="text" name="time" id="recipe-time-add" placeholder="Enter the time to make the recipe, in minutes" required></input>

                        <label>Difficulty:</label>
                        <!-- <textarea name="difficulty" id="difficulty-add" placeholder="Enter the difficulty" required></textarea> -->
                        <select name="difficulty" id="difficulty-add">
                            <option value="1">Very easy</option>
                            <option value="2">Easy</option>
                            <option value="3">Medium</option>
                            <option value="4">Hard</option>
                            <option value="5">Very hard</option>
                        </select>

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
                        <button id="add-ingredients-button" type="button">Add ingredient</button>
                    </div>
                </section>

                <section class="recipe-section">
                    <div class="content">
                        <h3>How to make</h3>
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

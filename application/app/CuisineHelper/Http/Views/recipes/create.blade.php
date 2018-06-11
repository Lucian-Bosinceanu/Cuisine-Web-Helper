@extends('layouts.app')

@section('title')
    {{$operation}} Recipe
@endsection

@section('head')
    <script src="{{ js('add') }}"></script>
@endsection

@php
if (!isset($difficulty)) {
    $difficulty = 1;
    $ingredients = [];
    $instructions = [];
}
@endphp
@section('content')
    @include('partials.sidemenu')
    <div id="main">
        <div class="inner">
            <header id="header">
                <h1 class="title"><strong>{{$operation}}</strong> recipe</h1>
                @include('partials.menu')
            </header>

            <form action="{{ route("recipes.store") }}" method="POST" id="recipe-form" enctype="multipart/form-data">
                <section class="recipe-section">
                    <div class="content">
                        <label for="recipe-title-add">Recipe Title:</label>
                        <input type="text" name="add" id="recipe-title-add" placeholder="Enter recipe title" required value="{{$recipe->title OR ''}}">

                        <label for="recipe-tags-add">Tags:</label>
                        <textarea name="tags" id="recipe-tags-add" placeholder="e.g. potatoes pizza ..." required>{{$tagString OR ''}}</textarea>
                    
                        <label for="recipe-time-add">Time to make:</label>
                        <input type="text" name="time" id="recipe-time-add" placeholder="Enter the time to make the recipe, in minutes" required value="{{$recipe->time OR ''}}">

                        <label>Difficulty:</label>
                        <!-- <textarea name="difficulty" id="difficulty-add" placeholder="Enter the difficulty" required></textarea> -->
                        <select name="difficulty" id="difficulty-add">
                            <option value="1" {{ $difficulty == 1 ? 'selected' : '' }}>Very easy</option>
                            <option value="2" {{ $difficulty == 2 ? 'selected' : '' }}>Easy</option>
                            <option value="3" {{ $difficulty == 3 ? 'selected' : '' }}>Medium</option>
                            <option value="4" {{ $difficulty == 4 ? 'selected' : '' }}>Hard</option>
                            <option value="5" {{ $difficulty == 5 ? 'selected' : '' }}>Very hard</option>
                        </select>

                        <label for="image-upload" id="image-upload-button" class="button">
                            <span>Choose image to upload (PNG, JPG)</span>
                        </label>
                        <input type="file" id="image-upload" name="image-upload" accept=".jpg, .jpeg, .png" >
                        <!-- <button id="recipe-upload-button">Upload</button> -->
                    </div>
                </section>

                <section class="recipe-section">
                    <div class="content">
                        <h3>Ingredients</h3>
                        @foreach($ingredients as $ingredient) 
                            <div class="ingredient">
                                <label>Ingredient name | Quantity</label>
                                <input type="text" name="ingredients[]" required="" value="{{$ingredient[0]}}">
                                <input type="text" name="quantity[]" required="" value="{{$ingredient[1]}}">
                                <button class="delete-button" type="button">Delete</button>
                            </div>
                        @endforeach
                        <button id="add-ingredient-button" type="button">Add ingredient</button>
                        <!--<div class="ingredient">
                            <textarea name="how-to-steps[]" id="add-how-to-step-1" required=""></textarea>
                            <button class="delete-button" type="button">Delete</button>
                        </div>-->
                    </div>
                </section>

                <section class="recipe-section">
                    <div class="content">
                        <h3>How to make</h3>
                        @foreach($instructions as $instruction)
                            <div class="ingredient">
                                <textarea name="how-to-steps[]" required="">{{$instruction}}</textarea>
                                <button class="delete-button" type="button">Delete</button>
                            </div>
                        @endforeach
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

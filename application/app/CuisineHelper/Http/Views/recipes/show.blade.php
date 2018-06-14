@extends('layouts.app')

@section('title', 'Recipe viewer')

@section('head')
    <script src="{{ js('add') }}"></script>
    <script type="text/javascript">
        var exportJsonUrl = "{{ $ajaxUrls['exportJson'] }}";
        var exportCsvUrl = "{{ $ajaxUrls['exportCsv'] }}";
    </script>
@endsection

@section('content')
    @include('partials.sidemenu')
    <div id="main">
        <div class="inner">
            <header id="header">
                <h1 class="title"><strong>Recipe</strong> viewer</h1>
                @include('partials.menu')
            </header>

            <section class="recipe-section">
                <div class="content">
                    <h1>{{$recipe->title}}</h1>

                    @if (isAdmin())
                        <!-- <a href="{{ route("recipes.delete", ['id' => $recipe->id]) }}" class="button">Delete</a> -->
                        <a href="{{ route("recipes.edit", ['id' => $recipe->id]) }}" class="button">Edit</a>
                    @endif

                        <ul class="tags">
                            <li><strong>Tags:</strong></li>
                            @foreach ($tags as $tag)
                                <li> #{{$tag}} </li>
                            @endforeach
                        </ul>

                    <ul>
                        <!--<li>
                            <p><strong>Rating:</strong> 4.5/5</p>
                        </li> -->
                        <li>
                            <p><strong>Difficulty:</strong> {{$difficulty}}</p>
                        </li>

                        <li>
                            <p>
                                <strong>Time to make:</strong> {{$recipe->time}} min
                            </p>
                        </li>
                    </ul>

                </div>
                <span class="image">
                    <img src="{{ $imageSrc }}" alt="potato" class="recipe_picture">
                </span>
            </section>

            <section class="recipe-section">
                <div class="content">
                    <h2>Ingredients</h2>

                    <ul class="recipe_ingredients_list">
                        @foreach ($ingredients as $ingredient)
                            <li> {{$ingredient[1]}} {{$ingredient[0]}} </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="recipe-section">
                <div class="content">
                    <h2>How to make</h2>
                    <ol class="recipe_howto_steps">
                        @foreach ($instructions as $instruction)
                            <li>{{$instruction}}</li>
                        @endforeach
                    </ol>
                </div>
            </section>

            <section class="recipe-section">
                <div class="content">
                    <h2>Export to file</h2>
                    <button id="json-button" class="export-button">JSON</button>
                    <button id="csv-button" class="export-button">CSV</button>
                </div>
            </section>
        </div>
    </div>
@endsection

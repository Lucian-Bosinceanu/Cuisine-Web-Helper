@extends('layouts.app')

@section('title', 'Recipe viewer')

@section('head')
    <script src="{{ js('main') }}"></script>
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
                @php
                    $imgUrl = base64_encode(file_get_contents($recipe->image));
                    $type = pathinfo($imgUrl, PATHINFO_EXTENSION);
                    $url = "data:image/" . $type . " ;base64," . $imgUrl;
                @endphp
                    <img src="{{ $url }}" alt="potato" class="recipe_picture">
                </span>
            </section>

            <section class="recipe-section">
                <div class="content">
                    <h2>Ingredients</h2>

                    <ul class="recipe_ingredients_list">
                        @foreach ($ingredients as $ingredient)
                            <li> {{$ingredient}} </li>
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
        </div>
    </div>
@endsection

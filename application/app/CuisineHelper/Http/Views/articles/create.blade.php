@extends('layouts.app')

@section('title')
    {{$operation}} Article
@endsection

@section('content')
    @include('partials.sidemenu')
    <div id="main">
        <div class="inner">
            <header id="header">
                <h1 class="title"><strong>{{$operation}}</strong> article</h1>
                @include('partials.menu')
            </header>

            <form action="{{ $redirect }}" method="POST" id="articles-form" enctype="multipart/form-data">
                <section class="recipe-section">
                    <div class="content">
                        <label for="articles-title-add">Article Title:</label>
                        <input type="text" name="add" id="articles-title-add" placeholder="Enter articles title" required value="{{$article->title OR ''}}">

                        <label for="articles-site-add">Link:</label>
                        <input type="url" name="site" id="articles-site-add" placeholder="Enter article URL" required value="{{$article->url OR ''}}">

                        <label for="articles-description-add">Description:</label>
                        <textarea name="description" id="articles-description-add" placeholder="Enter a description" required>{{$article->description OR ''}}</textarea>

                        <label for="image-upload" id="image-upload-button" class="button">
                            <span>Choose image to upload (PNG, JPG)</span>
                        </label>
                        <input type="file" id="image-upload" name="image-upload" accept=".jpg, .jpeg, .png">
                        <!-- <button id="articles-upload-button">Upload</button> -->
                    </div>
                </section>

                <section class="recipe-section">
                    <div class="content">
                        <!-- <a href="user_profile/my_recipes.html" class="button" id="submit-articles-button" type="submit">Submit articles</a> -->
                        <button id="submit-articles-button" type="submit" formmethod="POST" form="articles-form">Submit article</button>
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection

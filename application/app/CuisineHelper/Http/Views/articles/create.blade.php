@extends('layouts.app')

@section('title', 'Add article')

@section('content')
    @include('partials.sidemenu')
    <div id="main">
        <div class="inner">
            <header id="header">
                <h1 class="title"><strong>Add</strong> article</h1>
                @include('partials.menu')
            </header>

            <form action="{{ route("articles.store") }}" method="POST" id="article-form" enctype="multipart/form-data">
                <section class="recipe-section">
                    <div class="content">
                        <label for="article-title-add">Article Title:</label>
                        <input type="text" name="add" id="article-title-add" placeholder="Enter article title" required>

                        <label for="article-site-add">Article link:</label>
                        <input type="url" name="site" id="article-site-add" placeholder="http://..." pattern="https?://.+" title="Include http://" required>
                    
                        <label for="article-description-add">Description:</label>
                        <textarea name="description" id="article-description-add" placeholder="Enter a description" required></textarea>

                        <label for="image-upload" id="image-upload-button" class="button">
                            <span>Choose image to upload (PNG, JPG)</span>
                        </label>
                        <input type="file" id="image-upload" name="image-upload" accept=".jpg, .jpeg, .png">
                        <!-- <button id="article-upload-button">Upload</button> -->
                    </div>
                </section>

                <section class="recipe-section">
                    <div class="content">
                        <!-- <a href="user_profile/my_articles.html" class="button" id="submit-article-button" type="submit">Submit article</a> -->
                        <button id="submit-article-button" type="submit" formmethod="POST" form="article-form">Submit article</button>
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection

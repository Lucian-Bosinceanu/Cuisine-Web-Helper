@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div id="main">
            <div class="inner">
                <header id="header">
                    <h1 class="title"><strong>Recipe</strong> viewer</h1>
                    <ul class="login">
                        <li><a href="{{ route('recipe.show', ['id' => 2]) }}">Home</a></li>
                        <li><a href="articles.html">Articles</a></li>
						<li><a href="register.html">Register</a></li>
						<li><a href="login.html">Login</a></li>
                    </ul>
                </header>

                <section class="recipe-section">
                    <div class="content">
                        <h1>Potato recipe</h1>

                            <ul class="tags">
                                <li><strong>Tags:</strong></li>
                                <li>#veganism</li>
                                <li>#grill</li>
                                <li>#potato</li>
                            </ul>

                        <ul>
                            <li>
                                <p><strong>Rating:</strong> 4.5/5</p>
                            </li>
                            <li>
                                <p><strong>Difficulty:</strong> 2/5</p>
                            </li>

                            <li>
                                <p>
                                    <strong>Time to make:</strong> 30 min
                                </p>
                            </li>
                        </ul>

                    </div>
                    <span class="image">
                        <img src="../assets/img/potato.jpg" alt="potato" class="recipe_picture">
                    </span>
                </section>

                <section class="recipe-section">
                    <div class="content">
                        <h2>Ingredients</h2>

                        <ul class="recipe_ingredients_list">
                            <li>500g potatoes</li>
                            <li>salt</li>
                            <li>ingredient 2</li>
                            <li>ingredient 4</li>
                        </ul>
                    </div>
                </section>

                <section class="recipe-section">
                    <div class="content">
                        <h2>How to make</h2>
                        <ol class="recipe_howto_steps">
                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>
                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>
                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>
                        </ol>
                    </div>
                </section>
            </div>
        </div>

    <div id="sidebar">
            <button id="search-button" onclick="toggleSidebar()">Search</button>

            <div class="inner">

                <section class="search">
                    <header class="subtitle">
                        <h2>Search by title</h2>
                    </header>

                    <form method="post" action="#">
                        <input type="text" name="recipe-search" id="recipe-search" placeholder="e.g. pizza"/>
                    </form>
                </section>

                <nav id="menu">
                    <header class="subtitle">
                        <h2>Search by tags</h2>
                    </header>

                    <form method="post" action="#">
                        <input type="text" name="tag-search" id="tag-search" placeholder="e.g. salami"/>
                    </form>

                    <ul>
                        <li>
                            <input type="checkbox" id="pineapple" name="pineapple" checked>
                            <label for="pineapple">Pineapple</label>
                        </li>
                        <li>
                            <input type="checkbox" id="salami" name="salami" checked>
                            <label for="salami">Salami</label>
                        </li>
                        <li>
                            <input type="checkbox" id="potatoes" name="potatoes" checked>
                            <label for="potatoes">Potaotes</label>
                        </li>
                        <li>
                            <span id="opener1" class="opener" onclick="toggleDropdown('opener1')">Lifestyle</span>
                            <ul>
                                <li>
                                    <input type="checkbox" id="vegetarian" name="vegetarian">
                                    <label for="vegetarian">Vegetarian</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="vegan" name="vegan">
                                    <label for="vegan">Vegan</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="omnivorus" name="omnivorus">
                                    <label for="omnivorus">Omnivorus</label>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span id="opener2" class="opener" onclick="toggleDropdown('opener2')">Required time</span>
                            <ul>
                                <li>
                                    <input type="checkbox" id="less-then-60-min" name="less-then-60-min">
                                    <label for="less-then-60-min">&lt; 60 min</label>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <section class="search" class="alt">
                    <header class="subtitle">
                        <h2>Search article</h2>
                    </header>

                    <form method="post" action="#">
                        <input type="text" name="recipe-search" id="article-search" placeholder="e.g. 5 ways to.."/>
                    </form>
                </section>
            </div>
        </div>
@endsection

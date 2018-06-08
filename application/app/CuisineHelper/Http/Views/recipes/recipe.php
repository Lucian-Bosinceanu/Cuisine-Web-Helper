@extends('layouts.app')

@section('title', 'Login')

@section('content')
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
@endsection

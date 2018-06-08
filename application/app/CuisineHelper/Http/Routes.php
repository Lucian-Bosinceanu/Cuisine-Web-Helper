<?php

use CuisineHelper\Library\Router\Router as Router;

Router::route( "get", "/", "RecipeController@index" );
Router::route( "get", "/login", "Auth/LoginController@index" );
Router::route( "post", "/login", "Auth/LoginController@login" );

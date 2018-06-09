<?php

namespace CuisineHelper\Http\Models;

use \Model;
use CuisineHelper\Http\Models\Article;

/**
 * @property int    $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends Model {

    public static $_table = 'users';

    public function getArticles() {
        return $this->has_many( MODELPATH . 'Article','user_id','id');
    }

    public function getAuthToken() {
        return $this->has_one( MODELPATH . 'Auth', 'user_id', 'id' );
    }

    public function getFoodRestrictions() {
        return $this->has_many_through(MODELPATH . 'Tag', MODELPATHMANY . 'FoodRestriction','user_id', 'tag_id','id','id');
    }
    
    public function getFoodLifestyles() {
        return $this->has_many_through(MODELPATH . 'Tag', MODELPATHMANY . 'FoodLifestyle','user_id', 'tag_id','id','id');
    }

    public function getRecipeRatings() {
        return $this->has_many_through(MODELPATH . 'Recipe', MODELPATHMANY . 'Rating','user_id', 'recipe_id','id','id');
    }
    
    public function getRecipeReports() {
        return $this->has_many_through(MODELPATH . 'Recipe', MODELPATHMANY . 'Report','user_id', 'recipe_id','id','id');
    }

    public function getMadeRecipes() {
        return $this->has_many_through(MODELPATH . 'Recipe', MODELPATHMANY . 'MadeRecipe','user_id', 'recipe_id','id','id');
    }

    public function getRecipes() {
        return $this->has_many_through(MODELPATH . 'Recipe', MODELPATHMANY . 'MyRecipe','user_id', 'recipe_id','id','id');
    }

    public function getFavouriteRecipes() {
        return $this->has_many_through(MODELPATH . 'Recipe', MODELPATHMANY . 'FavouriteRecipe','user_id', 'recipe_id','id','id');
    }
}

<?php

namespace CuisineHelper\Http\Models;

use CuisineHelper\Http\Models\ModelExceptions\User\DuplicateEmail;
use CuisineHelper\Http\Models\ModelExceptions\User\DuplicateUsername;
use CuisineHelper\Http\Models\ModelExceptions\User\UserNotFound;
use \Model;

/**
 * @property int    $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends Model {

    public static $_table = 'users';

    public function getArticles() {
        return $this->has_many( MODELPATH . 'Article', 'user_id', 'id' );
    }

    public function getAuthToken() {
        return $this->has_one( MODELPATH . 'Auth', 'user_id', 'id' );
    }

    public function getFoodRestrictions() {
        return $this->has_many_through( MODELPATH . 'Tag', MODELPATHMANY . 'FoodRestriction', 'user_id', 'tag_id', 'id', 'id' );
    }

    public function getFoodLifestyles() {
        return $this->has_many_through( MODELPATH . 'Tag', MODELPATHMANY . 'FoodLifestyle', 'user_id', 'tag_id', 'id', 'id' );
    }

    public function getRecipeRatings() {
        return $this->has_many_through( MODELPATH . 'Recipe', MODELPATHMANY . 'Rating', 'user_id', 'recipe_id', 'id', 'id' );
    }

    public function getRecipeReports() {
        return $this->has_many_through( MODELPATH . 'Recipe', MODELPATHMANY . 'Report', 'user_id', 'recipe_id', 'id', 'id' );
    }

    public function getMadeRecipes() {
        return $this->has_many_through( MODELPATH . 'Recipe', MODELPATHMANY . 'MadeRecipe', 'user_id', 'recipe_id', 'id', 'id' );
    }

    public function getRecipes() {
        return $this->has_many_through( MODELPATH . 'Recipe', MODELPATHMANY . 'MyRecipe', 'user_id', 'recipe_id', 'id', 'id' );
    }

    public function getFavouriteRecipes() {
        return $this->has_many_through( MODELPATH . 'Recipe', MODELPATHMANY . 'FavouriteRecipe', 'user_id', 'recipe_id', 'id', 'id' );
    }

    public static function createOrFail( $params = '' ) {
        if ( User::where( 'username', $params['username'] )->findOne() ) {
            throw new DuplicateUsername( 'Username already exists' );
        }
        if ( User::where( 'email', $params['email'] )->findOne() ) {
            throw new DuplicateEmail( 'Email already exists' );
        }
        $params['password'] = hash( 'sha512', $params['password'] );

        return User::create( $params )->save();
    }

    public static function getUser( $uOrEmail ) {
        $user     = User::whereAnyIs( [
                                          [ 'username' => $uOrEmail ],
                                          [ 'email' => $uOrEmail ]
                                      ] )->findOne();
        if (!$user) {
            throw new UserNotFound("User not found");
        }
        return $user;
    }
}

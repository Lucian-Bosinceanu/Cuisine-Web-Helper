<?php

namespace CuisineHelper\Http\Models;

use \Model;
use CuisineHelper\Http\Models\User as User;

/**
 * @property int    $id
 * @property int    $user_id
 * @property string $title
 * @property string $image
 * @property string $url
 * @property string $description
 */
class Article extends Model {

    public static $_table = 'articles';

    public function getUser() {
        return $this->belongs_to( MODELPATH . 'User','user_id','id');
    }

    public function getImageSourceLink() {
        $imgUrl = base64_encode(file_get_contents( config('app')['imagepath'] . $this->image));
        $type = pathinfo($imgUrl, PATHINFO_EXTENSION);
        $imageSrc = "data:image/" . $type . " ;base64," . $imgUrl;
        return $imageSrc;
    }

    public function getImagePath() {
        return config('app')['imagepath'] . $this->image;
    }

    public static function searchByTitle($title, $toArray = false) {
        if (isset($title) && !empty($title)) {
            $articles = Article::where_like('title', "%{$title}%");
            return $toArray ? $articles->findArray() : $articles->findMany();
        }
    }
}

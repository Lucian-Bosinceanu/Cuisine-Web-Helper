<?php

namespace CuisineHelper\Http\Models;

use CuisineHelper\Http\Models\ManyToMany\IngredientRecipe;
use \Model;

/**
 * @property int    $id
 * @property string $title
 * @property int $difficulty
 * @property int $time
 * @property string $instructions
 * @property $image
 */
class Recipe extends Model {

    public static $_table = 'recipes';

    public function getIngredients() {
        return $this->has_many_through(MODELPATH . 'Ingredient', MODELPATHMANY . 'IngredientRecipe','recipe_id','ingredient_id','id','id');
    }

    public function getTags() {
        return $this->has_many_through(MODELPATH . 'Tag', MODELPATHMANY . 'RecipeTag','recipe_id','tag_id','id','id');
    }

    public function getUserRatings() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'Rating','recipe_id','user_id','id','id');
    }
    
    public function getUserReports() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'Report','recipe_id','user_id','id','id');
    }

    public function getUserMadeRecipes() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'MadeRecipe','recipe_id','user_id','id','id');
    }

    public function getUserRecipes() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'MyRecipe','recipe_id','user_id','id','id');
    }

    public function getUserFavouriteRecipes() {
        return $this->has_many_through(MODELPATH . 'User', MODELPATHMANY . 'FavouriteRecipe','recipe_id','user_id','id','id');
    }

    public function getTagNames() {
        $tags = $this->getTags()->findMany();
        $tagList[] = null;
        
        foreach ($tags as $tag) 
                array_push($tagList,$tag->name);
        array_shift($tagList);
        return $tagList;
    }

    public function getIngredientNames() {
        $ingredients = $this->getIngredients()->findMany();
        $ingredientList[] = null;
        $count = 0;
        foreach ($ingredients as $ingredient) 
            {
                $ingredientQuantity = IngredientRecipe::where(['recipe_id' => $this->id,'ingredient_id' => $ingredient->id])->findOne()->quantity;
                $ingredientList[$count] = array($ingredient->name, $ingredientQuantity);
                //array_push($ingredientList[$count],$ingredientQuantity, $ingredient->name);
                $count += 1;
            }    

        return $ingredientList;
    }

    public function getInstructionList() {
        $instructions = explode('##', $this->instructions);
        array_pop($instructions);
        return $instructions;
    }

    public function getImagePath() {
        return config('app')['imagepath'] . $this->image;
    }

    public function getImageAbsolutePath() {
        return base_path() . "public" . config('app')['imagepath'] . $this->image;
    }

    public function getImageSourceLink() {
        $imgUrl = base64_encode(file_get_contents( config('app')['imagepath'] . $this->image));
        $type = pathinfo($imgUrl, PATHINFO_EXTENSION);
        $imageSrc = "data:image/" . $type . " ;base64," . $imgUrl;
        return $imageSrc;
    }

    public static function searchRecipes($params) {
        $recipes = $params['title'] == null ? Recipe::orderByAsc('created_at')->findArray() : Recipe::where_like('title', "%{$params['title']}%")->findArray();
        
        if (isset($params['tags']) && !empty($params['tags'])) {
            $recipes = array_filter($recipes, function ($recipe) use ($params) {
                $tags = Recipe::findOne($recipe['id'])->getTags()->findArray();
                $tags = array_map(function ($tag) {
                    return $tag['name'];
                }, $tags);
                $resultTags = array_filter($params['tags'], function ($tag) use ($tags) {
                    return in_array($tag, $tags);
                });
                return ($params['tags'] == $resultTags);
            });
        }

        if (isset($params['form']) && !empty($params['form'])) {
            $formValues = array_map(function ($item) {
                $expl = explode('-', $item);
                return [$expl[0] => $expl[1]];
            }, $params['form']);


            $newRecipes = [];
            foreach ($recipes as $recipe) {
                $a = $b = 0;
                $fa = $fb = 0;
                foreach ($formValues as $value) {
                    $key = key($value);
                    switch ($key) {
                        case 'time':
                            $fa = 1;
                            $recipeTime = $recipe['time'];
                            $a = $a || ((int)$value[$key] == 180 ? (int)$recipeTime >= (int)$value[$key] : (int)$recipeTime <= (int)$value[$key]);
                            break;
                        case 'difficulty':
                            $fb = 1;
                            $b = $b || ($recipe['dificulty'] == $value[$key]);
                    }
                }
                if (($a && $b) || (!$fb && $a) || (!$fa && $b)) {
                    $newRecipes[] = $recipe;
                }
            }
            $recipes = $newRecipes;
        }

        if (isset($params['restrictions']) && !empty($params['restrictions'])) {
            return $recipes = array_filter($recipes, function ($recipe) use ($params) {
                $tags = Recipe::findOne($recipe['id'])->getTags()->findArray();
                $tags = array_map(function ($tag) {
                    return $tag['name'];
                }, $tags);
                $resultTags = array_filter($params['restrictions'], function ($tag) use ($tags) {
                    return in_array($tag, $tags);
                });

                return count(array_intersect($resultTags, $params['restrictions'])) == 0;
            });
        }
        
        return $recipes;
    }

    public static function createFromArrayList($arrayList = []) {
        if (empty($arrayList)) {
            return [];
        }
        $result = [];
        foreach ($arrayList as $recipe) {
            $result[] = Recipe::create($recipe);
        }
        return $result;
    }

    public static function exportRSS() {
        $allRecipes = Recipe::findMany();
        $rss = <<<EOT
<rss version="2.0">
    <channel>
        <title>Cuisine Web Helper</title>
        <link>http://localhost</link>
        <description>Cuisine Web Helper recipes</description>
        <language>en-us</language>
        <docs>http://blogs.law.harvard.edu/tech/rss</docs>
EOT;
    
        foreach($allRecipes as $recipe) {
            $rss .= <<<EOT

        <item>
            <title>{$recipe->title}</title>
            <link>http://localhost/recipes/{$recipe->id}</link>
            <guid>http://localhost/recipes/{$recipe->id}</guid>
            <pubDate>{$recipe->created_at}</pubDate>
        </item>
EOT;
        }

        $rss .= <<<EOT
    
    </channel>
</rss>
EOT;

        return $rss;
    }

    public static function exportRSSAsFile() {
        $rss = self::exportRSS();
        $tmpPath = config('app')['tmpPath'];
        $path = $tmpPath . uniqid("rss-" . time()) . ".xml";
        @file_put_contents($path, $rss);
        return $path;
    }

    public function exportJSON() {
        $recipe = $this->asArray();
        $json = json_encode($recipe);
        return $json;
    }

    public function exportJSONAsFile() {
        $json = $this->exportJSON();
        $tmpPath = config('app')['tmpPath'];
        $path = $tmpPath . uniqid("json-" . time()) . ".json";
        @file_put_contents($path, $json);
        return $path;
    }

    public function exportCSV() {
        $result = null;
        $tags = $this->getTagNames();
        $ingredients = $this->getIngredientNames();

        $result = $result . '"' . $this->id . '", ';
        $result = $result . '"' . $this->title . '", ';
        $result = $result . '"' . $this->dificulty . '", ';
        $result = $result . '"' . $this->time . '", ';

        $result = $result . '"';
        foreach ($tags as $tag)
            $result = $result . $tag . ", ";
        $result = $result . '",';

        $result = $result . '"';
        foreach ($ingredients as $ingredient)
            $result = $result . $ingredient[1] . ' ' . $ingredient[0] . ", ";
        $result = $result . '",';

        $result = $result . '"' . $this->instructions . '", ';
        $result = $result . '"' . $this->image . '", ';
        $result = $result . '"' . $this->created_at . '"';

        return $result;
    }
    
    public function exportCSVAsFile() {
        $csv = $this->exportCSV();
        $tmpPath = config('app')['tmpPath'];
        $path = $tmpPath . uniqid("csv-" . time()) . ".csv";
        @file_put_contents($path, $csv);
        return $path;
    }
}

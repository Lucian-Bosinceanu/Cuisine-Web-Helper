<?php

namespace CuisineHelper\Http\Controllers;

use CuisineHelper\Library\Http\Controller\BaseController;
use CuisineHelper\Http\Models\Recipe;

class ExportController extends BaseController {

    public function rss($request, $response) {
        $rssPath = Recipe::exportRSSAsFile();
        $response->file($rssPath, "RSS-export.xml");
        @unlink($rssPath);
    }

    public function csv($request, $response) {
        $id = $request->paramsGet()->get('id');
        $recipe = Recipe::findOne($id);
        $csvPath = $recipe->exportCSVAsFile();
        $response->file($csvPath, "CSV-export.csv");
        @unlink($csvPath);
    }

    public function json($request, $response) {
        $id = $request->paramsGet()->get('id');
        $recipe = Recipe::findOne($id); 
        $jsonPath = $recipe->exportJSONAsFile();
        $response->file($jsonPath, "JSON-export.json");
        @unlink($jsonPath);
    }

}

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

    public function csv($request) {
    }

    public function json($request) {
    }

}

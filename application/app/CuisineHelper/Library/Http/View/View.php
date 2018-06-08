<?php

namespace CuisineHelper\Library\Http\View;

use CuisineHelper\Library\Http\View\ViewInterface as ViewInterface;
use CuisineHelper\Library\Http\View\ViewEngine as ViewEngine;

class View implements ViewInterface {

    public static function View($name = '', $params = []) {
        return ViewEngine::getInstance()->render($name, $params);
    }

}

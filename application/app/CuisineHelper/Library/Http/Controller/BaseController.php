<?php

namespace CuisineHelper\Library\Http\Controller;

abstract class BaseController {
    protected $middleware = [];

    public function middleware($middleware, $params = []) {
        foreach ($middleware as $middlewareName) {
            $this->middleware[] = $middlewareName;
        }
    }

    public function getMiddleware() {
        return $this->middleware;
    }
}

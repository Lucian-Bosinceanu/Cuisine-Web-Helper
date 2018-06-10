<?php

namespace CuisineHelper\Http\Middlewares;

use CuisineHelper\Http\Models\Auth;

class CheckAuth {
    public function handle($request, $response) {
        if (Auth::check()) {
            return;
        }
        $response->redirect(route('recipes.index'))->send();
    }
}
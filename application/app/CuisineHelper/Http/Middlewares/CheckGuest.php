<?php

namespace CuisineHelper\Http\Middlewares;

use CuisineHelper\Http\Models\Auth;

class CheckGuest {
    public function handle($request, $response) {
        if (!Auth::check()) {
            return;
        }
        $response->redirect(route('recipes.index'))->send();
    }
}
<?php

namespace CuisineHelper\Http\Middlewares;

use CuisineHelper\Http\Models\Auth;

class CheckAdmin {
    public function handle($request, $response) {
        $user = Auth::user();
        if ($user->is_admin) {
            return;
        }
        $response->redirect(route('recipes.index'))->send();
    }
}
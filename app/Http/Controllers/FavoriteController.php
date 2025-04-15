<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $studentFavorites = $user->favorites()
            ->where('favoritable_type', 'App\\Models\\Student')
            ->with('favoritable')
            ->get()
            ->pluck('favoritable');

        $companyFavorites = $user->favorites()
            ->where('favoritable_type', 'App\\Models\\Company')
            ->with('favoritable')
            ->get()
            ->pluck('favoritable');

        return view('favorites.index', [
            'studentFavorites' => $studentFavorites,
            'companyFavorites' => $companyFavorites
        ]);
    }
}

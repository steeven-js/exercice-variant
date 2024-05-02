<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sku;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    public function index()
    {
        // On récupère tous les utilisateurs
        $skus = Sku::with('items')->get();

        // On retourne les informations des utilisateurs en JSON
        return response()->json($skus);
    }

    public function show(Sku $sku)
    {
        // On retourne les informations de l'utilisateur en JSON
        return response()->json($sku);
    }

    public function destroy(Sku $sku)
    {
        // On supprime l'utilisateur
        $sku->delete();

        // On retourne la réponse JSON
        return response()->json();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Accepte ?q= (notre formulaire) ou ?s= (formulaires du thème)
        $query = trim($request->input('q', $request->input('s', '')));

        $products = collect();

        if ($query !== '') {
            $products = Product::where('is_active', true)
                ->where(function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%")
                        ->orWhere('short_description', 'LIKE', "%{$query}%")
                        ->orWhere('sku', 'LIKE', "%{$query}%");
                })
                ->orderBy('name')
                ->get();
        }

        return view('search', compact('products', 'query'));
    }
}

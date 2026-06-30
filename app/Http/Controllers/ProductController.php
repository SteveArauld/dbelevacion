<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        // Récupérer le produit par son slug
        $product = Product::with(['category', 'subcategory'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Incrémenter le compteur de vues
        $product->increment('views');

        // Produits similaires (même catégorie)
        $relatedProducts = Product::where('category_slug', $product->category_slug)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}

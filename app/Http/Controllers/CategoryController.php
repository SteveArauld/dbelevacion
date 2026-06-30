<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->segment(1);

        // Récupérer la catégorie avec ses sous-catégories (et les produits actifs de chacune)
        $category = Category::with(['subcategories' => function ($query) {
            $query->where('is_active', true)
                ->orderBy('order')
                ->orderBy('name')
                ->withCount(['products' => fn ($q) => $q->where('is_active', true)])
                ->with(['activeProducts' => fn ($q) => $q->orderBy('name')]);
        }])->where('slug', $slug)->firstOrFail();

        $categoryName = $category->name;

        // On n'affiche que les sous-catégories qui contiennent des produits
        $subcategories = $category->subcategories
            ->filter(fn ($sub) => $sub->activeProducts->isNotEmpty())
            ->values();

        return view('categories.index', compact(
            'category',
            'categoryName',
            'subcategories',
            'slug'
        ));
    }
}

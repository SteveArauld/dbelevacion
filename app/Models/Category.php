<?php
// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'icon',
        'products_count',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'products_count' => 'integer',
        'order' => 'integer',
    ];

    // ==========================================
    // RELATIONS
    // ==========================================
    
    /**
     * Produits dans cette catégorie
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Produits actifs uniquement
     */
    public function activeProducts()
    {
        return $this->hasMany(Product::class)->where('is_active', true);
    }

    /**
     * Sous-catégories de cette catégorie
     */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    /**
     * Sous-catégories actives uniquement
     */
    public function activeSubcategories()
    {
        return $this->hasMany(Subcategory::class)->where('is_active', true);
    }

    // ==========================================
    // SCOPES
    // ==========================================
    
    /**
     * Catégories actives uniquement
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Trier par ordre
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('name');
    }

    // ==========================================
    // BOOT
    // ==========================================
    
    protected static function boot()
    {
        parent::boot();

        // Générer automatiquement le slug
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        // Mettre à jour le compteur de produits
        static::saved(function ($category) {
            $category->products_count = $category->products()->count();
            $category->saveQuietly();
        });
    }

    // ==========================================
    // MÉTHODES UTILES
    // ==========================================
    
    /**
     * URL de la catégorie
     */
    public function url()
    {
        return route('category.show', $this->slug);
    }

    /**
     * Image de la catégorie ou placeholder
     */
    public function imageUrl()
    {
        if ($this->image) {
            return asset('assets/images/categories/' . $this->image);
        }
        return asset('assets/images/placeholder-category.jpg');
    }
}
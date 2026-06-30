<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'price_display',
        'sku',
        'stock_status',
        'technical_details',
        'meta_data',
        'delivery_info',
        'images',
        'main_image',
        'category_slug',
        'subcategory_slug',
        'subcategory_name',
        'url',
        'is_active',
        'is_featured',
        'views',
        'scraped_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'technical_details' => 'array',
        'meta_data' => 'array',
        'delivery_info' => 'array',
        'images' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'views' => 'integer',
        'scraped_at' => 'datetime',
    ];

    // ==========================================
    // CONSTANTES
    // ==========================================
    
    const STOCK_IN_STOCK = 'instock';
    const STOCK_OUT_OF_STOCK = 'outofstock';
    const STOCK_ON_BACKORDER = 'onbackorder';

    // ==========================================
    // RELATIONS
    // ==========================================
    
    /**
     * Catégorie du produit
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Sous-catégorie du produit
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // ==========================================
    // SCOPES
    // ==========================================
    
    /**
     * Produits actifs uniquement
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Produits en stock
     */
    public function scopeInStock($query)
    {
        return $query->where('stock_status', self::STOCK_IN_STOCK);
    }

    /**
     * Produits mis en avant
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Par catégorie
     */
    public function scopeByCategory($query, $categorySlug)
    {
        return $query->where('category_slug', $categorySlug);
    }

    /**
     * Par gamme de prix
     */
    public function scopePriceRange($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }

    /**
     * Recherche
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function($q) use ($term) {
            $q->where('name', 'LIKE', "%{$term}%")
              ->orWhere('description', 'LIKE', "%{$term}%")
              ->orWhere('short_description', 'LIKE', "%{$term}%")
              ->orWhere('sku', 'LIKE', "%{$term}%");
        });
    }

    // ==========================================
    // BOOT
    // ==========================================
    
    protected static function boot()
    {
        parent::boot();

        // Générer automatiquement le slug
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    // ==========================================
    // ACCESSORS (Getters)
    // ==========================================
    
    /**
     * Prix formaté
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', ' ') . ' €';
    }

    /**
     * Image principale ou placeholder
     */
    public function getMainImageUrlAttribute()
    {
        if ($this->main_image) {
            // Si c'est un chemin local (images téléchargées)
            if (!filter_var($this->main_image, FILTER_VALIDATE_URL)) {
                return asset('assets/images/' . $this->main_image);
            }
            return $this->main_image;
        }
        return asset('assets/images/placeholder-product.jpg');
    }

    /**
     * Toutes les images avec chemins locaux
     */
    public function getImagesLocalAttribute()
    {
        $images = $this->images ?? [];
        
        return array_map(function($image) {
            // Si c'est déjà un chemin local
            if (!filter_var($image, FILTER_VALIDATE_URL)) {
                return asset('assets/images/' . $image);
            }
            return $image;
        }, $images);
    }

    /**
     * Détails techniques formatés
     */
    public function getTechnicalDetailsArrayAttribute()
    {
        $details = $this->technical_details ?? [];
        
        if (is_string($details)) {
            $details = json_decode($details, true) ?? [];
        }
        
        return $details;
    }

    /**
     * Stock en français
     */
    public function getStockLabelAttribute()
    {
        return match($this->stock_status) {
            self::STOCK_IN_STOCK => 'En stock',
            self::STOCK_OUT_OF_STOCK => 'Rupture de stock',
            self::STOCK_ON_BACKORDER => 'Sur commande',
            default => 'Inconnu',
        };
    }

    /**
     * Badge de stock
     */
    public function getStockBadgeAttribute()
    {
        return match($this->stock_status) {
            self::STOCK_IN_STOCK => '<span class="badge bg-success">En stock</span>',
            self::STOCK_OUT_OF_STOCK => '<span class="badge bg-danger">Rupture</span>',
            self::STOCK_ON_BACKORDER => '<span class="badge bg-warning">Sur commande</span>',
            default => '<span class="badge bg-secondary">Inconnu</span>',
        };
    }

    // ==========================================
    // MÉTHODES UTILES
    // ==========================================
    
    /**
     * URL du produit
     */
    public function url()
    {
        return route('product.show', $this->slug);
    }

    /**
     * Produits similaires (même catégorie)
     */
    public function relatedProducts($limit = 5)
    {
        return self::where('category_slug', $this->category_slug)
            ->where('id', '!=', $this->id)
            ->active()
            ->inRandomOrder()
            ->take($limit)
            ->get();
    }

    /**
     * Vérifier si le produit est en stock
     */
    public function isInStock()
    {
        return $this->stock_status === self::STOCK_IN_STOCK;
    }

    /**
     * Vérifier si le produit a des images
     */
    public function hasImages()
    {
        return !empty($this->images);
    }

    /**
     * Nombre d'images
     */
    public function imagesCount()
    {
        return count($this->images ?? []);
    }
}
<?php
// database/seeders/ProductImporterSeeder.php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductImporterSeeder extends Seeder
{
    /**
     * Ordre / icône des catégories principales (fallback sur le JSON pour le nom).
     */
    private array $categoryMeta = [
        'transpaletas'                  => ['order' => 1,  'icon' => 'fas fa-dolly'],
        'carros-de-transporte'          => ['order' => 2,  'icon' => 'fas fa-truck-loading'],
        'carretillas-elevadoras'        => ['order' => 3,  'icon' => 'fas fa-truck'],
        'carro-salvaescaleras'          => ['order' => 4,  'icon' => 'fas fa-stairs'],
        'plataformas-de-tijera'         => ['order' => 5,  'icon' => 'fas fa-layer-group'],
        'mesas-elevadoras'              => ['order' => 6,  'icon' => 'fas fa-table'],
        'apiladores-de-gran-elevacion'  => ['order' => 7,  'icon' => 'fas fa-pallet'],
        'elevadores-con-cesta'          => ['order' => 8,  'icon' => 'fas fa-arrows-up-to-line'],
        'miniexcavadora'                => ['order' => 9,  'icon' => 'fas fa-tractor'],
        'minilifts'                     => ['order' => 10, 'icon' => 'fas fa-arrow-up'],
    ];

    /**
     * Définition des sous-catégories par catégorie.
     * Pour chaque produit, on choisit la 1re sous-catégorie dont un mot-clé
     * apparaît dans le nom. La sous-catégorie avec "keywords" vide est le
     * fourre-tout (défaut) et doit être placée en DERNIER.
     */
    private array $subcategoryDefs = [
        'transpaletas' => [
            ['name' => 'Apiladores',      'keywords' => []],

            ['name' => 'Transpaletas tijera', 'keywords' => ['Transpaleta de Tijera', 'Tijera','Transpaleta Elevadora']],

            ['name' => 'Transpaletas eléctricas',  'keywords' => ['eléctricas',
            'Transpaleta Eléctrica Industrial','Transpaleta eléctrica','Gerbeur électrique ES12-12ES']],

            ['name' => 'Transpaletas de paneles',    'keywords' => ['láminas']],
  
           
        ],
        'carros-de-transporte' => [
             ['name' => 'first',      'keywords' => ['carro']],
            ['name' => '', 'keywords' => ['Elevador']],
           
          
        ],

        'carretillas-elevadoras' => [

            ['name' => 'Plataformas araña', 'keywords' => []],
            ['name' => 'Carretillas Telescopicas',  'keywords' => ['JCB','Bobcat ','Manipulador telescópico compacto Ausa T204H','JLG','Ausa','MANITOU']],
            ['name' => 'Carretillas Telescopicas Giratorias',  'keywords' => ['Merlo','Manipulador']],
        ],

        'carro-salvaescaleras' => [
       
            ['name' => 'Subeescaleras eléctricos',  'keywords' => []],
        ],
        'plataformas-de-tijera' => [
             ['name' => 'Plataformas de tijera','keywords' => []],
            ['name' => 'd',   'keywords' => ['Elevador de construcción/techos «Toplift Standard» – Capacidad de carga de 230 kg'
            ,'Elevador solar E-SolarClimber – Kit de hasta 10 m con batería de litio',
            'Elevador de']],
           
        ],
        'mesas-elevadoras' => [
            ['name' => 'Mesas elevadoras de tijera', 'keywords' => ['tijera', 'mesa elevadora', 'table élévatrice', 'plataforma elevadora']],
            ['name' => 'Apiladores y elevadores',    'keywords' => ['apilador']],
            ['name' => 'Elevadores de materiales',   'keywords' => []],
        ],
        'apiladores-de-gran-elevacion' => [
            ['name' => 'Apiladores eléctricos',     'keywords' => []],
            ['name' => '',       'keywords' => ['Elevador Eléctrico','Plataforma Elevadora Eléctrica','Elevador de materiales']],
      
        ],
        'elevadores-con-cesta' => [
            ['name' => 'Plataformas articuladas',  'keywords' => []],
            ['name' => 'Elevadores De Vidrio', 'keywords' => []],
            ['name' => 'Elevadores Eléctricos Portatiles', 'keywords' => ['eléctrico','apilador-electrico-linde','Lève-personne','Plataforma elevadora de tijera eléctrica COMPARTEC 706E']],
            ['name' => 'Elevadores  Portatiles Manuales', 'keywords' => ['Elevador de materiales Guil Toro','Toro']],
          
        ],



        'miniexcavadora' => [
            ['name' => 'Retroexcavadoras', 'keywords' => ['mini','hitachi Zx33u','kobeloco','Micro','Retroexcavadora']],
            ['name' => 'Pies elevadores',  'keywords' => ['elevador','elevaci']],
        ],
        'minilifts' => [
            ['name' => 'Minielevadores manuales',   'keywords' => []],
        ],
    ];

    /** Cache des sous-catégories créées : [category_slug][subcategory_slug] => Subcategory */
    private array $subcategoryCache = [];

    public function run(): void
    {
        $this->command->info('📥 Importation des produits...');

        $jsonPath = base_path('output/all_products.json');

        if (!File::exists($jsonPath)) {
            $this->command->error('Fichier output/all_products.json introuvable !');
            return;
        }

        $products = json_decode(File::get($jsonPath), true);

        if (!is_array($products)) {
            $this->command->error('JSON invalide !');
            return;
        }

        // 1. Créer les catégories à partir du JSON
        $categories = [];
        foreach ($products as $product) {
            $catSlug = $product['category_slug'] ?? 'sin-categoria';

            if (!isset($categories[$catSlug])) {
                $meta = $this->categoryMeta[$catSlug] ?? ['order' => 99, 'icon' => null];
                $catName = $product['category_name'] ?? ucwords(str_replace('-', ' ', $catSlug));

                $category = Category::updateOrCreate(
                    ['slug' => $catSlug],
                    [
                        'name'        => $catName,
                        'description' => 'Productos de la categoría ' . $catName,
                        'icon'        => $meta['icon'],
                        'order'       => $meta['order'],
                        'is_active'   => true,
                    ]
                );

                $categories[$catSlug] = $category;
                $this->createSubcategoriesFor($category, $catSlug);
            }
        }
        $this->command->info('✅ ' . count($categories) . ' catégories créées');

        // 2. Importer les produits
        $bar = $this->command->getOutput()->createProgressBar(count($products));
        $bar->start();

        $imported = 0;
        foreach ($products as $product) {
            $catSlug  = $product['category_slug'] ?? 'sin-categoria';
            $category = $categories[$catSlug] ?? null;

            // Slug unique dérivé de l'URL d'origine (sinon depuis le nom)
            $slug = $this->slugFromUrl($product['url'] ?? '') ?: Str::slug($product['name'] ?? 'producto');

            // Déterminer la sous-catégorie via les mots-clés du nom
            $subcategory = $this->matchSubcategory($catSlug, $product['name'] ?? '');

            Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'category_id'       => $category?->id,
                    'subcategory_id'    => $subcategory?->id,
                    'name'              => $product['name'] ?? 'Sin nombre',
                    'description'       => $product['description'] ?? '',
                    'short_description' => $product['short_description'] ?? '',
                    'price'             => $product['price'] ?? 0,
                    'price_display'     => $product['price_display'] ?? '',
                    'sku'               => $product['sku'] ?? '',
                    'stock_status'      => $product['stock_status'] ?? 'instock',
                    'technical_details' => $product['technical_details'] ?? [],
                    'images'            => $product['images'] ?? [],
                    'main_image'        => $product['main_image'] ?? null,
                    'category_slug'     => $catSlug,
                    'subcategory_slug'  => $subcategory?->slug,
                    'subcategory_name'  => $subcategory?->name,
                    'url'               => $product['url'] ?? '',
                    'is_active'         => true,
                    'scraped_at'        => $product['scraped_at'] ?? now(),
                ]
            );

            $imported++;
            $bar->advance();
        }

        $bar->finish();
        $this->command->newLine();

        // 3. Mettre à jour les compteurs et marquer quelques produits en vedette
        $this->updateCounts();
        $this->markFeatured();

        $this->command->info("✅ {$imported} produits importés !");
    }

    /**
     * Crée les sous-catégories d'une catégorie et alimente le cache.
     */
    private function createSubcategoriesFor(Category $category, string $catSlug): void
    {
        $defs = $this->subcategoryDefs[$catSlug] ?? [
            ['name' => $category->name, 'keywords' => []],
        ];

        $this->subcategoryCache[$catSlug] = [];

        foreach ($defs as $i => $def) {
            $sub = Subcategory::updateOrCreate(
                ['category_id' => $category->id, 'slug' => Str::slug($def['name'])],
                [
                    'name'      => $def['name'],
                    'order'     => $i,
                    'is_active' => true,
                ]
            );

            // On garde les mots-clés en mémoire pour le matching
            $this->subcategoryCache[$catSlug][] = [
                'model'    => $sub,
                'keywords' => $def['keywords'],
            ];
        }
    }

 
 /* Trouve la sous-catégorie correspondant au nom du produit.
 * Les sous-catégories avec keywords vides servent de fallback (défaut).
 * Elles peuvent être placées n'importe où dans le tableau, ça n'affecte pas le résultat.
 */
private function matchSubcategory(string $catSlug, string $name): ?Subcategory
{
    $entries = $this->subcategoryCache[$catSlug] ?? [];
    if (empty($entries)) {
        return null;
    }

    $haystack = Str::lower($name);
    
    // Stocker le fallback (dernière sous-cat avec keywords vide, ou la 1ère)
    $fallback = null;

    foreach ($entries as $entry) {
        $keywords = $entry['keywords'];
        
        // Si keywords est vide, c'est un candidat fallback
        if (empty($keywords) || (count($keywords) === 1 && $keywords[0] === '')) {
            if ($fallback === null) {
                $fallback = $entry['model']; // Premier fallback trouvé
            }
            continue; // On ne match pas avec des keywords vides
        }
        
        // Chercher une correspondance
        foreach ($keywords as $kw) {
            if ($kw !== '' && str_contains($haystack, Str::lower($kw))) {
                return $entry['model'];
            }
        }
    }

    // Aucune correspondance → utiliser le fallback
    return $fallback ?? ($entries[0]['model'] ?? null);
}

    /**
     * Extrait le slug depuis l'URL d'origine (dernier segment).
     */
    private function slugFromUrl(string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        $path = trim(parse_url($url, PHP_URL_PATH) ?? '', '/');
        if ($path === '') {
            return null;
        }

        $segments = explode('/', $path);
        return end($segments) ?: null;
    }

    /**
     * Met à jour products_count sur les catégories et sous-catégories.
     */
    private function updateCounts(): void
    {
        Subcategory::all()->each(function (Subcategory $sub) {
            $sub->products_count = $sub->products()->count();
            $sub->saveQuietly();
        });

        Category::all()->each(function (Category $cat) {
            $cat->products_count = $cat->products()->count();
            $cat->saveQuietly();
        });
    }

    /**
     * Met en vedette les produits les plus chers en stock (pour le carrousel d'accueil).
     */
    private function markFeatured(): void
    {
        Product::query()->update(['is_featured' => false]);

        Product::where('stock_status', 'instock')
            ->orderByDesc('price')
            ->take(10)
            ->get()
            ->each(fn (Product $p) => $p->forceFill(['is_featured' => true])->saveQuietly());
    }
}

<?php
// database/migrations/xxxx_xx_xx_create_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->foreignId('subcategory_id')->nullable()->constrained('subcategories')->onDelete('set null');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->string('price_display')->nullable();
            $table->string('sku')->nullable();
            $table->string('stock_status')->default('instock'); // instock, outofstock, onbackorder
            $table->json('technical_details')->nullable();

              $table->string('subcategory_slug')->nullable();
            $table->string('subcategory_name')->nullable();

            $table->json('meta_data')->nullable();
            $table->json('delivery_info')->nullable();
            $table->json('images')->nullable();
            $table->string('main_image')->nullable();
            $table->string('category_slug')->nullable(); // Pour la migration depuis l'ancien système
            $table->string('url')->nullable(); // URL d'origine
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('views')->default(0);
            $table->timestamp('scraped_at')->nullable();
            $table->timestamps();
            
            // Index pour la recherche
            $table->index('category_slug');
            $table->index('price');
            $table->index('stock_status');
            $table->fullText(['name', 'description', 'short_description']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
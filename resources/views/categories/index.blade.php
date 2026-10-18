@extends('layouts.app')

@section('title', $categoryName)

@push('styles')
<style>
    /* Conteneur centré */
    .cat-container {
        max-width: 1140px;
        margin: 0 auto;
        padding: 10px 15px 50px;
    }

    /* Titre de sous-catégorie - BARRE PLEINE LARGEUR AVEC BORDURE COLORÉE */
    .cat-container .cat-subcat-heading {
        display: flex !important;
        margin: 18px 0 26px !important;
        padding: 0 !important;
        width: 100vw !important;
        max-width: 100vw !important;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw !important;
        margin-right: -50vw !important;
        background: #a6a6a6 !important;
        height: 137px;
        text-align: center;
        justify-content: center;
        align-content: center;
        color: white;
        border: 0 !important;
        border-bottom: 10px solid var(--subcat-color, #e2401c) !important;
    }

    .cat-container .cat-subcat-heading .e-con-inner {
        padding: 0 15px !important;
        max-width: 1140px !important;
        margin: 0 auto;
        width: 100%;
        display: flex;
        justify-content: center;
        /* align-content: center; */
        align-items: center;
    }

    .cat-container .cat-subcat-heading .elementor-heading-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #939393;
        margin: 0;
    }

    /* Grille produits : 4 par ligne, cartes plus compactes.
       (Mise en page uniquement, on ne touche pas au style du thème) */
    .cat-container .woocommerce ul.products,
    .cat-container ul.products {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 24px;
        list-style: none;
        margin: 0 0 45px;
        padding: 0;
    }

    .cat-container ul.products::before,
    .cat-container ul.products::after {
        content: none;
        display: none;
    }

    .cat-container ul.products li.product {
        width: auto !important;
        max-width: none !important;
        margin: 0 !important;
        float: none !important;
        clear: none !important;
    }

    /* Image carrée et homogène */
    .cat-container .product-loop-image-wrapper {
        aspect-ratio: 1 / 1;
        width: 100%;
    }

    .cat-container .product-loop-image-wrapper>a {
        display: block;
        width: 100%;
        height: 100%;
    }

    .cat-container img.product-loop-image {
        width: 100% !important;
        height: 100% !important;
        object-fit: contain;
    }

    @media (max-width: 1200px) {

        .cat-container .woocommerce ul.products,
        .cat-container ul.products {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    @media (max-width: 992px) {

        .cat-container .woocommerce ul.products,
        .cat-container ul.products {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {

        .cat-container .woocommerce ul.products,
        .cat-container ul.products {
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }
    }
</style>
@endpush

@section('content')
@php
// Image de bannière de la catégorie : image dédiée sinon 1er produit de la catégorie
$bannerProduct = null;
foreach ($subcategories as $sc) {
if ($sc->activeProducts->isNotEmpty()) { $bannerProduct = $sc->activeProducts->first(); break; }
}
$bannerImg = $category->image
? asset('assets/images/categories/' . $category->image)
: ($bannerProduct ? $bannerProduct->main_image_url : '');

// Couleurs de bordure (une par sous-catégorie, en boucle)
$subColors = ['#22c55e', '#eab308', '#f97316', '#3b82f6', '#ef4444', '#a855f7', '#14b8a6', '#ec4899'];
@endphp
<div id="content" class="site-content" tabindex="-1">
    <div class="woostify-container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article id="post-3028" class="post-3028 page type-page status-publish hentry">
                    <div data-elementor-type="wp-page" data-elementor-id="3028" class="elementor elementor-3028" data-elementor-post-type="page">

                        <div class="elementor-element elementor-element-e00e6d9 e-con-full e-flex e-con e-parent e-lazyloaded" data-id="e00e6d9" data-element_type="container" data-e-type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-element elementor-element-3552f9d e-con-full e-flex e-con e-child" data-id="3552f9d" data-element_type="container" data-e-type="container">
                                <div class="elementor-element elementor-element-a7169c3 bdt-icon-type-icon elementor-position-top bdt-icon-effect-none elementor-widget elementor-widget-bdt-advanced-icon-box" data-id="a7169c3" data-element_type="widget" data-e-type="widget" data-widget_type="bdt-advanced-icon-box.default">
                                    <div class="bdt-ep-advanced-icon-box">
                                        <div class="bdt-ep-advanced-icon-box-icon">
                                            <span class="bdt-ep-advanced-icon-box-icon-wrap">
                                                <i aria-hidden="true" class="fas fa-list-alt"></i>
                                            </span>
                                        </div>
                                        <div class="bdt-ep-advanced-icon-box-content">
                                            <a class="bdt-ep-advanced-icon-box-readmore bdt-display-inline-block" href="#">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-e4b3e2d elementor-widget elementor-widget-theme-page-title elementor-page-title elementor-widget-heading" data-id="e4b3e2d" data-element_type="widget" data-e-type="widget" data-widget_type="theme-page-title.default">
                                    <h4 class="elementor-heading-title elementor-size-default">{{ $categoryName }}</h4>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-0b92c06 e-con-full e-flex e-con e-child"
                                style="@if($bannerImg)background-image: url('{{ $bannerImg }}');@endif
                                    background-position: center center;
                                    background-size: contain;"
                                data-id="0b92c06"
                                data-element_type="container"
                                data-e-type="container"
                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            </div>
                        </div>

                        <div class="cat-container">
                            @forelse($subcategories as $subcategory)
                            @php $subColor = $subColors[$loop->index % count($subColors)]; @endphp
                            
                            <!-- BADON PLEINE LARGEUR AVEC BORDURE COLORÉE - SAUF POUR LA PREMIÈRE SOUS-CATÉGORIE -->
                            @if(!$loop->first)
                            <div class="cat-subcat-heading" style="--subcat-color: {{ $subColor }}; background: #e0e0e0 !important; height: 225px; text-align: center; color: white;">
                                <div class="e-con-inner">
                                    <h2 class="elementor-heading-title elementor-size-default">{{ $subcategory->name }}</h2>
                                </div>
                            </div>
                            @endif

                            <div class="woocommerce columns-5 ">
                                <ul class="products columns-5 tablet-columns-3 mobile-columns-2">
                                    @foreach($subcategory->activeProducts as $product)
                                    @php
                                    $imgs = $product->images_local;
                                    $hover = $imgs[1] ?? null;
                                    @endphp
                                    <li class="product type-product status-publish instock has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                        <div class="product-loop-wrapper">
                                            <div class="product-loop-image-wrapper">
                                                <div class="product-loop-action"></div>
                                                <a href="{{ route('product.show', $product->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                    @if($hover)
                                                    <span class="product-loop-hover-image" style="background-image: url('{{ $hover }}');"></span>
                                                    @endif
                                                    <img loading="lazy" decoding="async" width="300" height="300" src="{{ $product->main_image_url }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail product-loop-image" alt="{{ $product->name }}">
                                                </a>
                                            </div>
                                            <div class="product-loop-content text-center">
                                                <h2 class="woocommerce-loop-product__title">
                                                    <a href="{{ route('product.show', $product->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $product->name }}</a>
                                                </h2>
                                                <div class="product-loop-meta no-transform">
                                                    <div class="animated-meta">
                                                        <span class="price"><span class="woocommerce-Price-amount amount">{{ number_format($product->price, 2, '.', ' ') }}&nbsp;<span class="woocommerce-Price-currencySymbol">€</span></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @empty
                            <p style="text-align:center;padding:60px 0;">No hay productos disponibles en esta categoría por el momento.</p>
                            @endforelse
                        </div>

                    </div>
                </article>
            </main>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Búsqueda: ' . $query)

@push('styles')
<style>
    .cat-container { max-width: 1140px; margin: 0 auto; padding: 30px 15px 50px; }
    .search-title { font-size: 1.6rem; font-weight: 700; color: #222; margin: 0 0 8px; }
    .search-sub { color: #777; margin-bottom: 26px; }
    .cat-container .woocommerce ul.products,
    .cat-container ul.products {
        display: grid; grid-template-columns: repeat(5, 1fr); gap: 24px;
        list-style: none; margin: 0; padding: 0;
    }
    .cat-container ul.products li.product {
        width: auto !important; margin: 0 !important; float: none !important;
    }
    .cat-container .product-loop-image-wrapper { aspect-ratio: 1 / 1; width: 100%; }
    .cat-container .product-loop-image-wrapper > a { display: block; width: 100%; height: 100%; }
    .cat-container img.product-loop-image { width: 100% !important; height: 100% !important; object-fit: contain; }
    @media (max-width: 1200px) { .cat-container .woocommerce ul.products, .cat-container ul.products { grid-template-columns: repeat(4, 1fr); } }
    @media (max-width: 992px)  { .cat-container .woocommerce ul.products, .cat-container ul.products { grid-template-columns: repeat(3, 1fr); } }
    @media (max-width: 768px)  { .cat-container .woocommerce ul.products, .cat-container ul.products { grid-template-columns: repeat(2, 1fr); gap: 16px; } }
</style>
@endpush

@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="woostify-container">
        <div class="cat-container">
            <h1 class="search-title">Resultados de búsqueda</h1>
            <p class="search-sub">
                @if($query !== '')
                    {{ $products->count() }} resultado(s) para « {{ $query }} »
                @else
                    Escriba un término de búsqueda.
                @endif
            </p>

            @if($products->isNotEmpty())
                <div class="woocommerce columns-5 ">
                    <ul class="products columns-5 tablet-columns-3 mobile-columns-2">
                        @foreach($products as $product)
                            @php $imgs = $product->images_local; $hover = $imgs[1] ?? null; @endphp
                            <li class="product type-product status-publish instock has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                <div class="product-loop-wrapper">
                                    <div class="product-loop-image-wrapper">
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
            @elseif($query !== '')
                <p style="padding:40px 0;text-align:center;">No se encontraron productos. Pruebe con otro término.</p>
            @endif
        </div>
    </div>
</div>
@endsection

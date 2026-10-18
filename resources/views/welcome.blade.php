@extends('layouts.app')

@section('title', __('Accueil'))

@push('styles')
<style>
.product-loop-image-wrapper {
    position: relative;
    overflow: hidden;
}
.product-loop-image-wrapper .product-loop-hover-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}
.product-loop-image-wrapper:hover .product-loop-hover-image {
    opacity: 1;
}
.product-loop-image-wrapper img {
    transition: transform 0.3s ease;
}
.product-loop-image-wrapper:hover img {
    transform: scale(1.05);
}
</style>
@endpush

@section('content')
<div id="view">
    <div id="content" class="site-content" tabindex="-1">
        <div class="woostify-container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <article id="post-2872" class="post-2872 page type-page status-publish hentry">
                        <div data-elementor-type="wp-page" data-elementor-id="2872" class="elementor elementor-2872" data-elementor-settings="{&quot;element_pack_global_tooltip_width&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;element_pack_global_tooltip_width_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;element_pack_global_tooltip_width_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;element_pack_global_tooltip_padding&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;element_pack_global_tooltip_padding_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;element_pack_global_tooltip_padding_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;element_pack_global_tooltip_border_radius&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;element_pack_global_tooltip_border_radius_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;element_pack_global_tooltip_border_radius_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true}}" data-elementor-post-type="page">
                            <div class="elementor-element elementor-element-a640c98 e-flex e-con-boxed e-con e-parent" data-id="a640c98" data-element_type="container" data-e-type="container">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-06360ab elementor-widget elementor-widget-bdt-wc-slider" data-id="06360ab" data-element_type="widget" data-e-type="widget" data-widget_type="bdt-wc-slider.default">
                                        <div class="elementor-widget-container">
                                            <div data-bdt-slideshow="{&quot;animation&quot;:&quot;slide&quot;,&quot;ratio&quot;:&quot;1920:768&quot;,&quot;min-height&quot;:550,&quot;autoplay&quot;:true,&quot;autoplay-interval&quot;:7000,&quot;pause-on-hover&quot;:false,&quot;velocity&quot;:1}" class="bdt-wc-slider">
                                                <div class="bdt-position-relative bdt-visible-toggle">
                                                    <ul class="bdt-slideshow-items bdt-child-width-1-1">

                                                        @forelse($sliderProducts as $product)
                                                            <li class="bdt-slideshow-item">
                                                            <div class="bdt-slideshow-item-inner bdt-grid bdt-grid-collapse bdt-height-1-1" data-bdt-grid>
                                                                <div class="bdt-width-1-2@m bdt-flex bdt-flex-middle bdt-slider-item-content">
                                                                    <div class="bdt-slideshow-content-wrapper bdt-padding bdt-text-left">
                                                                        <div class="bdt-wc-slider-price">
                                                                            <div class="wae-product-price">
                                                                                <p class="price"><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->price, 2, '.', ' ') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></bdi></span></p>
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="bdt-wc-slider-title">{{ $product->name }}</h5>
                                                                        <div class="bdt-wc-add-to-cart-readmore bdt-flex bdt-flex-left bdt-flex-middle">
                                                                            <a href="{{ route('product.show', $product->slug) }}" class="bdt-wc-slider-readmore ">
                                                                                Leer más
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="bdt-width-1-2@m bdt-flex bdt-flex-middle bdt-mobile-order">
                                                                    <div class="bdt-position-relative bdt-wc-slider-image">
                                                                        <img decoding="async" src="{{ $product->main_image_url }}" alt="{{ $product->name }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @empty
                                                        @endforelse

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-b792b25 e-flex e-con-boxed e-con e-parent" data-id="b792b25" data-element_type="container" data-e-type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-c065605 bdt-icon-type-icon elementor-position-top bdt-icon-effect-none elementor-widget elementor-widget-bdt-advanced-icon-box" data-id="c065605" data-element_type="widget" data-e-type="widget" data-widget_type="bdt-advanced-icon-box.default">
                                        <div class="bdt-ep-advanced-icon-box">
                                            <div class="bdt-ep-advanced-icon-box-icon">
                                                <span class="bdt-ep-advanced-icon-box-icon-wrap">
                                                    <i aria-hidden="true" class="fas fa-university"></i>
                                                </span>
                                            </div>
                                            <div class="bdt-ep-advanced-icon-box-content">
                                                <h3 class="bdt-ep-advanced-icon-box-title ep-title-style-3">
                                                    <span>
                                                        Transferencia bancaria </span>
                                                </h3>
                                                <a class="bdt-ep-advanced-icon-box-readmore bdt-display-inline-block" href="#">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-97d26bd bdt-icon-type-icon elementor-position-top bdt-icon-effect-none elementor-widget elementor-widget-bdt-advanced-icon-box" data-id="97d26bd" data-element_type="widget" data-e-type="widget" data-widget_type="bdt-advanced-icon-box.default">
                                        <div class="bdt-ep-advanced-icon-box">
                                            <div class="bdt-ep-advanced-icon-box-icon">
                                                <span class="bdt-ep-advanced-icon-box-icon-wrap">
                                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-stopwatch-20" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M398.5,190.91l.59-.61,26.59-26.58a16,16,0,0,0,0-22.63L403,118.41a16,16,0,0,0-22.63,0l-24.68,24.68A206.68,206.68,0,0,0,256,98.5V64h32a16,16,0,0,0,16-16V16A16,16,0,0,0,288,0H160a16.05,16.05,0,0,0-16,16V48a16.05,16.05,0,0,0,16,16h32V98.5A207.92,207.92,0,0,0,16.09,297.57C12.64,411.5,106.76,510.22,220.72,512,337.13,513.77,432,420,432,304A206,206,0,0,0,398.5,190.91ZM204.37,377.55a8.2,8.2,0,0,1,8.32,8.07v22.31a8.2,8.2,0,0,1-8.32,8.07H121.52a16.46,16.46,0,0,1-16.61-17.62c2.78-35.22,14.67-57.41,38.45-91.37,20.42-29.19,27.1-37.32,27.1-62.34,0-16.92-1.79-24.27-12.21-24.27-9.39,0-12.69,7.4-12.69,22.68v5.23a8.2,8.2,0,0,1-8.33,8.07h-24.9a8.2,8.2,0,0,1-8.33-8.07v-4.07c0-27.3,8.48-60.24,56.43-60.24,43,0,55.57,25.85,55.57,61,0,35.58-12.44,51.21-34.35,81.31-11.56,15-24.61,35.57-26.41,51.2ZM344,352.32c0,35.16-12.3,63.68-57.23,63.68C243.19,416,232,386.48,232,352.55V247.22c0-40.73,19.58-63.22,56.2-63.22C325,184,344,206.64,344,245.3ZM287.87,221.73c-9.41,0-13.23,7.5-13.23,20V357.68c0,13.11,3.59,20.59,13.23,20.59s13-8,13-21.27V241.06C300.89,229.79,297.88,221.73,287.87,221.73Z"></path>
                                                    </svg>

                                                </span>
                                            </div>
                                            <div class="bdt-ep-advanced-icon-box-content">
                                                <h3 class="bdt-ep-advanced-icon-box-title ep-title-style-3">
                                                    <span>
                                                        Entrega rápida </span>
                                                </h3>
                                                <a class="bdt-ep-advanced-icon-box-readmore bdt-display-inline-block" href="#">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-1bbef45 bdt-icon-type-icon elementor-position-top bdt-icon-effect-none elementor-widget elementor-widget-bdt-advanced-icon-box" data-id="1bbef45" data-element_type="widget" data-e-type="widget" data-widget_type="bdt-advanced-icon-box.default">
                                        <div class="bdt-ep-advanced-icon-box">
                                            <div class="bdt-ep-advanced-icon-box-icon">
                                                <span class="bdt-ep-advanced-icon-box-icon-wrap">
                                                    <i aria-hidden="true" class="fas fa-award"></i>
                                                </span>
                                            </div>
                                            <div class="bdt-ep-advanced-icon-box-content">
                                                <h3 class="bdt-ep-advanced-icon-box-title ep-title-style-3">
                                                    <span>
                                                        Producto garantizado </span>
                                                </h3>
                                                <a class="bdt-ep-advanced-icon-box-readmore bdt-display-inline-block" href="#">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-99dc663 e-flex e-con-boxed e-con e-parent" data-id="99dc663" data-element_type="container" data-e-type="container">
                                <div class="e-con-inner">
                                    <div class="elementor-element elementor-element-6273454 elementor-widget elementor-widget-shortcode" data-id="6273454" data-element_type="widget" data-e-type="widget" data-widget_type="shortcode.default">
                                        <div class="elementor-shortcode">
                                            <div class="woocommerce columns-5 ">
                                                <ul class="products columns-5 tablet-columns-3 mobile-columns-2">
                                                    @forelse($featuredProducts as $product)
                                                    <li class="product type-product status-publish instock has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                                        <div class="product-loop-wrapper">
                                                            <div class="product-loop-image-wrapper">
                                                                <div class="product-loop-action"></div>
                                                                <a href="{{ route('product.show', $product->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                    @php
                                                                        $hoverImg2 = isset($product->images[1]) ? asset('assets/images/' . $product->images[1]) : $product->main_image_url;
                                                                    @endphp
                                                                    <span class="product-loop-hover-image" style="background-image: url({{ $hoverImg2 }});"></span>
                                                                    <img decoding="async" width="300" height="300" src="{{ $product->main_image_url }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail product-loop-image" alt="{{ $product->name }}" style="width:100%;height:220px;object-fit:cover;" /></a>
                                                            </div>
                                                            <div class="product-loop-content text-center">
                                                                <h2 class="woocommerce-loop-product__title">
                                                                    <a href="{{ route('product.show', $product->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $product->name }}</a>
                                                                </h2>
                                                                <div class="product-loop-meta no-transform">
                                                                    <div class="animated-meta"> <span class="price"><span class="woocommerce-Price-amount amount">{{ number_format($product->price, 2, '.', ' ') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div>
                                <div class="elementor-element elementor-element-e00e6d9 e-con-full e-flex e-con e-parent" data-id="e00e6d9" data-element_type="container" data-e-type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-element elementor-element-3552f9d e-con-full e-flex e-con e-child" data-id="3552f9d" data-element_type="container" data-e-type="container">
                                        <div class="elementor-element elementor-element-a7169c3 bdt-icon-type-icon elementor-position-top bdt-icon-effect-none elementor-widget elementor-widget-bdt-advanced-icon-box" data-id="a7169c3" data-element_type="widget" data-e-type="widget" data-widget_type="bdt-advanced-icon-box.default">
                                            <div class="bdt-ep-advanced-icon-box">
                                                <div class="bdt-ep-advanced-icon-box-icon">
                                                    <span class="bdt-ep-advanced-icon-box-icon-wrap">
                                                        <i aria-hidden="true" class="fas fa-truck-loading"></i>
                                                    </span>
                                                </div>
                                                <div class="bdt-ep-advanced-icon-box-content">
                                                    <h3 class="bdt-ep-advanced-icon-box-title ep-title-style-3">
                                                        <span>
                                                            JCB </span>
                                                    </h3>
                                                    <a class="bdt-ep-advanced-icon-box-readmore bdt-display-inline-block" href="#">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-0b92c06 e-con-full e-flex e-con e-child"
                                        data-id="0b92c06"
                                        data-element_type="container"
                                        data-e-type="container"
                                        style="background-image: url('{{ asset('assets/hero/37-et-38-3.png') }}') !important;
                                    background-position: center center;
                                    background-size: cover;"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    </div>
                                </div>

                                <div class="elementor-element elementor-element-3577efb e-flex e-con-boxed e-con e-parent" data-id="3577efb" data-element_type="container" data-e-type="container">
                                    <div class="e-con-inner">
                                        <div class="elementor-element elementor-element-576476b elementor-widget elementor-widget-shortcode" data-id="576476b" data-element_type="widget" data-e-type="widget" data-widget_type="shortcode.default">
                                            <div class="elementor-shortcode">
                                                <div class="woocommerce columns-5 ">

                                                    <ul class="products columns-5 tablet-columns-3 mobile-columns-2">
                                                        @forelse($latestProducts as $product)
                                                        <li class="product type-product status-publish instock has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                                            <div class="product-loop-wrapper">
                                                                <div class="product-loop-image-wrapper">
                                                                    <div class="product-loop-action"></div>
                                                                    <a href="{{ route('product.show', $product->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                        @php
                                                                            $hoverImg = isset($product->images[1]) ? asset('assets/images/' . $product->images[1]) : $product->main_image_url;
                                                                        @endphp
                                                                        <span class="product-loop-hover-image" style="background-image: url({{ $hoverImg }});"></span>
                                                                        <img decoding="async" width="300" height="300" src="{{ $product->main_image_url }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail product-loop-image" alt="{{ $product->name }}" style="width:100%;height:220px;object-fit:cover;" /></a>
                                                                </div>
                                                                <div class="product-loop-content text-center">
                                                                    <h2 class="woocommerce-loop-product__title">
                                                                        <a href="{{ route('product.show', $product->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $product->name }}</a>
                                                                    </h2>
                                                                    <div class="product-loop-meta no-transform">
                                                                        <div class="animated-meta"> <span class="price"><span class="woocommerce-Price-amount amount">{{ number_format($product->price, 2, '.', ' ') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>




                            <div>
                                <div class="elementor-element elementor-element-65193f0 e-con-full e-flex e-con e-parent" data-id="65193f0" data-element_type="container" data-e-type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-element elementor-element-9884b67 e-con-full e-flex e-con e-child" data-id="9884b67" data-element_type="container" data-e-type="container" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
                                        <div class="elementor-element elementor-element-830764d bdt-icon-type-icon elementor-position-top bdt-icon-effect-none elementor-widget elementor-widget-bdt-advanced-icon-box" data-id="830764d" data-element_type="widget" data-e-type="widget" data-widget_type="bdt-advanced-icon-box.default">
                                            <div class="bdt-ep-advanced-icon-box">
                                                <div class="bdt-ep-advanced-icon-box-icon">
                                                    <span class="bdt-ep-advanced-icon-box-icon-wrap">
                                                        <i aria-hidden="true" class="fas fa-truck-loading"></i>

                                                    </span>
                                                </div>
                                                <div class="bdt-ep-advanced-icon-box-content">
                                                    <h3 class="bdt-ep-advanced-icon-box-title ep-title-style-3">
                                                        <span>
                                                            CS12 </span>
                                                    </h3>
                                                    <a class="bdt-ep-advanced-icon-box-readmore bdt-display-inline-block" href="#">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-a9e8c3f e-con-full e-flex e-con e-child" data-id="a9e8c3f" data-element_type="container" data-e-type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"
                                        style="
                                    background-image: url('{{ asset('assets/hero/Gerbeur-electrique-Compartec-CS15-35-Duplex-3500-mm-8.png') }}') !important;
                                    background-position: center center;
                                    background-size: cover; ">
                                    </div>
                                </div>
                                <div class=" elementor-element elementor-element-d580260 e-flex e-con-boxed e-con e-parent" data-id="d580260" data-element_type="container" data-e-type="container">
                                    <div class="e-con-inner">
                                        <div class="elementor-element elementor-element-bed5ea5 elementor-widget elementor-widget-shortcode" data-id="bed5ea5" data-element_type="widget" data-e-type="widget" data-widget_type="shortcode.default">
                                            <div class="elementor-shortcode">
                                                <div class="woocommerce columns-5 ">
                                                    <ul class="products columns-5 tablet-columns-3 mobile-columns-2">
                                                        @forelse($latestProducts2 as $product)
                                                        <li class="product type-product status-publish instock has-post-thumbnail shipping-taxable purchasable product-type-simple">
                                                            <div class="product-loop-wrapper">
                                                                <div class="product-loop-image-wrapper">
                                                                    <div class="product-loop-action"></div>
                                                                    <a href="{{ route('product.show', $product->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                                        @php
                                                                            $hoverImg3 = isset($product->images[1]) ? asset('assets/images/' . $product->images[1]) : $product->main_image_url;
                                                                        @endphp
                                                                        <span class="product-loop-hover-image" style="background-image: url({{ $hoverImg3 }});"></span>
                                                                        <img decoding="async" width="300" height="300" src="{{ $product->main_image_url }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail product-loop-image" alt="{{ $product->name }}" style="width:100%;height:220px;object-fit:cover;" /></a>
                                                                </div>
                                                                <div class="product-loop-content text-center">
                                                                    <h2 class="woocommerce-loop-product__title">
                                                                        <a href="{{ route('product.show', $product->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $product->name }}</a>
                                                                    </h2>
                                                                    <div class="product-loop-meta no-transform">
                                                                        <div class="animated-meta"> <span class="price"><span class="woocommerce-Price-amount amount">{{ number_format($product->price, 2, '.', ' ') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </article>
                </main>
            </div>
        </div>
    </div>

</div>

@endsection
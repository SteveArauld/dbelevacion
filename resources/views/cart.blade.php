@extends('layouts.app')

@section('title', 'Carrito de la compra')

@push('styles')
<style>
    .dbe-cart-page { max-width: 1180px; margin: 0 auto; padding: 40px 16px 60px; }
    .dbe-cart-page > h1 { font-size: 1.9rem; font-weight: 700; margin-bottom: 28px; }
    .dbe-cart-page .woocommerce { display: flex; gap: 60px; align-items: flex-start; flex-wrap: wrap; }
    .dbe-cart-page .woocommerce-cart-form { flex: 1 1 600px; min-width: 0; }
    .dbe-cart-page .shop_table { width: 100%; border-collapse: collapse; }
    .dbe-cart-page .shop_table th, .dbe-cart-page .shop_table td { padding: 14px 10px; border-bottom: 1px solid #eee; text-align: left; vertical-align: middle; }
    .dbe-cart-page .shop_table thead th { font-size: .8rem; text-transform: uppercase; color: #888; font-weight: 600; }
    .dbe-cart-page .product-thumbnail img { width: 70px; height: 70px; object-fit: contain; background: #fafafa; border: 1px solid #eee; border-radius: 6px; }
    .dbe-cart-page .product-name a { color: #222; text-decoration: none; font-weight: 600; }
    .dbe-cart-page .product-name a:hover { color: #e2401c; }
    .dbe-cart-page td.product-remove .remove { color: #e2401c; font-size: 1.5rem; text-decoration: none; line-height: 1; }
    .dbe-cart-page .quantity .qty { width: 72px; padding: 8px; border: 1px solid #ddd; border-radius: 4px; text-align: center; }
    .dbe-qty-stepper { display: inline-flex; align-items: stretch; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; background: #fff; height: 42px; }
    .dbe-qty-stepper .dbe-qty-btn { width: 38px; border: 0; background: #f5f5f5; color: #333; font-size: 1.25rem; line-height: 1; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background .15s, color .15s; -webkit-user-select: none; user-select: none; }
    .dbe-qty-stepper .dbe-qty-btn:hover { background: #e2401c; color: #fff; }
    .dbe-qty-stepper input.qty { width: 48px; padding: 0; border: 0; border-left: 1px solid #eee; border-right: 1px solid #eee; border-radius: 0; text-align: center; font-size: 1rem; font-weight: 600; color: #222; -moz-appearance: textfield; }
    .dbe-qty-stepper input.qty::-webkit-outer-spin-button, .dbe-qty-stepper input.qty::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
    .dbe-qty-stepper input.qty:focus { outline: none; }
    .dbe-cart-page .price-val { color: #222; font-weight: 600; }
    .dbe-cart-page .cart-collaterals { flex: 0 0 320px; }
    .dbe-cart-page .cart_totals { border: 1px solid #eee; border-radius: 10px; padding: 24px; background: #fafafa; }
    .dbe-cart-page .cart_totals h2 { font-size: 1.2rem; font-weight: 700; margin: 0 0 18px; }
    .dbe-cart-page .cart_totals table { width: 100%; border-collapse: collapse; margin-bottom: 18px; }
    .dbe-cart-page .cart_totals th, .dbe-cart-page .cart_totals td { padding: 12px 0; border-bottom: 1px solid #e8e8e8; text-align: left; font-size: .95rem; }
    .dbe-cart-page .cart_totals .order-total td, .dbe-cart-page .cart_totals .order-total th { font-size: 1.15rem; border-bottom: 0; }
    .dbe-cart-page .cart_totals td { text-align: right; }
    .dbe-cart-page .checkout-button { display: block; text-align: center; background: #e2401c; color: #fff; padding: 14px; border-radius: 6px; text-decoration: none; font-weight: 700; }
    .dbe-cart-page .checkout-button:hover { opacity: .9; }
    .dbe-cart-page .shipping-note { font-size: .82rem; color: #777; margin-top: 4px; }
    .dbe-cart-empty { text-align: center; padding: 70px 0; }
    .dbe-cart-empty p { font-size: 1.1rem; color: #666; margin-bottom: 22px; }
    @media (max-width: 860px) {
        .dbe-cart-page .woocommerce { flex-direction: column; gap: 30px; }
        .dbe-cart-page .cart-collaterals { flex: 1 1 100%; width: 100%; }
        .dbe-cart-page .shop_table thead { display: none; }
        .dbe-cart-page .woocommerce-cart-form__cart-item { display: grid; grid-template-columns: 70px 1fr auto; gap: 8px 12px; align-items: center; border-bottom: 1px solid #eee; padding: 12px 0; }
        .dbe-cart-page .woocommerce-cart-form__cart-item td { border: 0; padding: 2px 0; }
        .dbe-cart-page .product-remove { grid-row: 1 / span 3; }
    }
</style>
@endpush

@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="woostify-container">
        <div class="dbe-cart-page">
            <h1>Carrito de la compra</h1>
            <div id="cart-root"
                 data-home="{{ route('home') }}"
                 data-checkout="{{ route('checkout') }}">
                {{-- Rendu par shop.js depuis le localStorage --}}
            </div>
        </div>
    </div>
</div>
@endsection

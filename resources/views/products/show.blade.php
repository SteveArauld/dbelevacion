@extends('layouts.app')

@section('title', $product->name)

@push('styles')



    <link rel="stylesheet" id="dgwt-wcas-style-css" href="../../wp-content/plugins/ajax-search-for-woocommerce/assets/css/style.mincac6.css?ver=1.33.0" media="all">
    <link rel="stylesheet" id="woostify-style-css" href="../../wp-content/themes/woostify/style9776.css?ver=2.5.1" media="all">
    <style id="woostify-style-inline-css">
        .main-navigation .mega-menu-inner-wrapper {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px
        }

        @media (min-width:992px) {

            .woostify-container,
            .site-boxed-container #view,
            .site-content-boxed-container .site-content {
                max-width: 1200px
            }
        }

        @media (min-width:769px) {

            .elementor .site-branding img,
            .site-branding img {
                max-width: 70px
            }
        }

        @media (min-width:481px) and (max-width:768px) {

            .elementor .site-branding img,
            .site-branding img {
                max-width: 70px
            }
        }

        @media (max-width:480px) {

            .elementor .site-branding img,
            .site-branding img {
                max-width: 50px
            }
        }

        .topbar {
            background-color: #455E78;
            padding: 0px 0
        }

        .topbar * {
            color: #ffffff
        }

        .topbar-slider {
            background-color: #292f34
        }

        .topbar-slider .slider-wrapper {
            padding: 5px 0
        }

        .topbar-slider * {
            color: #ffffff
        }

        .topbar-slider .flickity-prev-next-button svg {
            fill: #222222
        }

        .topbar-slider .slick-slider svg {
            fill: #222222
        }

        @media (max-width:991px) {
            .primary-navigation.primary-mobile-navigation+.primary-navigation {
                display: none
            }

            .has-header-layout-1 .wrap-toggle-sidebar-menu {
                display: block
            }

            .site-header-inner .site-navigation,
            .site-header-inner .site-search {
                display: none
            }

            .has-header-layout-1 .sidebar-menu {
                display: block
            }

            .has-header-layout-1 .site-navigation {
                text-align: left
            }

            .has-header-layout-3 .header-layout-3 .wrap-toggle-sidebar-menu {
                display: block !important
            }

            .has-header-layout-3 .header-layout-3 .navigation-box,
            .has-header-layout-3 .header-layout-3 .left-content {
                display: none
            }

            .has-header-layout-4 .header-layout-4 .wrap-toggle-sidebar-menu {
                display: block !important
            }

            .has-header-layout-5 .header-layout-5 .wrap-toggle-sidebar-menu {
                display: block !important
            }

            .has-header-layout-5 .header-layout-5 .navigation-box,
            .has-header-layout-5 .header-layout-5 .center-content {
                display: none
            }

            .site-branding {
                text-align: center
            }

            .header-layout-6 .wrap-toggle-sidebar-menu,
            .header-layout-6 .header-content-top .shopping-bag-button {
                display: block !important
            }

            .header-layout-6 .content-top-right,
            .header-layout-6 .header-content-bottom {
                display: none
            }

            .header-layout-8 .content-top-right,
            .header-layout-8 .header-content-bottom {
                display: none !important
            }

            .header-layout-8 .wrap-toggle-sidebar-menu,
            .header-layout-8 .header-search-icon {
                display: block !important
            }

            .header-layout-8 .header-content-top .site-tools {
                display: flex !important
            }

            .header-layout-1 .site-branding {
                flex: 0 1 auto
            }

            .header-layout-1 .wrap-toggle-sidebar-menu,
            .header-layout-1 .site-tools {
                flex: 1 1 0px
            }

            .site-header-inner .site-navigation,
            .site-header-inner .site-search {
                display: none
            }

            .header-layout-1 .wrap-toggle-sidebar-menu,
            .header-layout-1 .site-tools {
                flex: 1 1 0px
            }

            .header-layout-1 .site-branding {
                flex: 0 1 auto
            }

            .site-header-inner .woostify-container {
                padding: 15px;
                justify-content: center
            }

            .site-header-inner .logo {
                max-width: 70%;
                margin: 0 auto
            }

            .site-tools .header-search-icon,
            .site-tools .my-account {
                display: none
            }

            .site-header .shopping-bag-button {
                margin-right: 15px
            }

            .has-custom-mobile-logo a:not(.custom-mobile-logo-url) {
                display: none
            }

            .has-header-transparent.header-transparent-for-mobile .site-header {
                position: absolute
            }

            .header-layout-1 .wrap-toggle-sidebar-menu,
            .header-layout-1 .site-tools {
                flex: 1 1 0px
            }

            .header-layout-1 .site-branding {
                flex: 0 1 auto
            }

            .site-header-inner .woostify-container {
                padding: 15px;
                justify-content: center
            }

            .site-header-inner .logo {
                max-width: 70%;
                margin: 0 auto
            }

            .site-tools .header-search-icon,
            .site-tools .my-account {
                display: none
            }

            .has-header-transparent.header-transparent-for-mobile .site-header {
                position: absolute
            }

            .sub-mega-menu {
                display: none
            }

            .site-branding .custom-mobile-logo-url {
                display: block
            }

            .has-custom-mobile-logo.logo-transparent .custom-transparent-logo-url {
                display: block
            }

            .mobile-nav-tab li.active:after {
                background: #DD6E31
            }
        }

        @media (min-width:992px) {

            .primary-navigation.primary-mobile-navigation,
            .primary-navigation.categories-mobile-menu,
            .mobile-nav-tab {
                display: none
            }

            .has-header-layout-1 .wrap-toggle-sidebar-menu {
                display: none
            }

            .site-branding .custom-mobile-logo-url {
                display: none
            }

            .sidebar-menu .main-navigation .primary-navigation>.menu-item {
                display: block
            }

            body:not(.has-header-layout-2) .sidebar-menu .main-navigation .primary-navigation>.menu-item>a {
                padding: 0
            }

            .main-navigation .primary-navigation>.menu-item>a {
                padding: 20px 0;
                margin: 0 20px;
                display: flex;
                justify-content: space-between;
                align-items: center
            }

            .main-navigation .primary-navigation>.menu-item {
                display: inline-flex;
                line-height: 1;
                align-items: center;
                flex-direction: column
            }

            .has-header-layout-1 .sidebar-menu {
                display: none
            }

            .sidebar-menu .main-navigation .primary-navigation .menu-item-has-mega-menu .mega-menu-wrapper {
                min-width: auto;
                max-width: 100%;
                transform: none;
                position: static;
                box-shadow: none;
                opacity: 1;
                visibility: visible
            }

            body:not(.has-header-layout-2) .sidebar-menu .main-navigation .primary-navigation .sub-menu {
                margin-left: 20px !important
            }

            body.has-header-layout-2 .sidebar-menu .site-navigation nav .menu-item a {
                margin: 0
            }

            body.has-header-layout-2 .sidebar-menu .primary-navigation:not(.elementor-inner) a:before {
                left: 20px
            }

            body.has-header-layout-2 .sidebar-menu .primary-navigation:not(.elementor-inner) .sub-menu .menu-item a:before {
                left: 30px
            }

            body.has-header-layout-2 .sidebar-menu .main-navigation .primary-navigation .sub-menu>li>a {
                padding: 0 30px
            }

            .sidebar-menu .main-navigation .primary-navigation .sub-menu:not(.sub-mega-menu) {
                transition-duration: 0s
            }

            .sidebar-menu .main-navigation .primary-navigation>.menu-item ul:not(.sub-mega-menu) {
                opacity: 1;
                visibility: visible;
                transform: none;
                position: static;
                box-shadow: none;
                transition-duration: 0s;
                min-width: auto
            }

            .sidebar-menu .main-navigation .primary-navigation>.menu-item ul:not(.sub-mega-menu) a {
                padding-right: 0;
                padding-left: 0
            }

            .sidebar-menu-open .sidebar-menu .site-navigation {
                left: 60px;
                right: 60px
            }

            .has-header-transparent.header-transparent-for-desktop .site-header {
                position: absolute
            }

            .woostify-nav-menu-widget .woostify-toggle-nav-menu-button,
            .woostify-nav-menu-widget .site-search,
            .woostify-nav-menu-widget .woostify-nav-menu-account-action {
                display: none
            }

            .sidebar-menu-open .sidebar-menu .site-navigation {
                left: 60px;
                right: 60px
            }

            .has-header-transparent.header-transparent-for-desktop .site-header {
                position: absolute
            }

            .has-custom-mobile-logo .custom-mobile-logo-url {
                display: none
            }

            .main-navigation li {
                list-style: none
            }

            .site-header-inner .site-navigation:last-child .main-navigation {
                padding-right: 0
            }

            .main-navigation ul {
                padding-left: 0;
                margin: 0
            }

            .main-navigation .primary-navigation {
                font-size: 0
            }

            .main-navigation .primary-navigation>.menu-item .sub-menu {
                opacity: 0;
                visibility: hidden;
                position: absolute;
                top: 110%;
                left: 0;
                margin-left: 0;
                min-width: 180px;
                text-align: left;
                z-index: -1
            }

            .main-navigation .primary-navigation>.menu-item .sub-menu .menu-item-has-children .menu-item-arrow {
                transform: rotate(-90deg)
            }

            .main-navigation .primary-navigation>.menu-item .sub-menu a {
                padding: 10px 0 10px 20px;
                display: flex;
                justify-content: space-between;
                align-items: center
            }

            .main-navigation .primary-navigation>.menu-item .sub-menu a.tinvwl_add_to_wishlist_button,
            .main-navigation .primary-navigation>.menu-item .sub-menu a.woocommerce-loop-product__link,
            .main-navigation .primary-navigation>.menu-item .sub-menu a.loop-add-to-cart-btn {
                padding: 0;
                justify-content: center;
                border-radius: 0
            }

            .main-navigation .primary-navigation>.menu-item .sub-menu a.tinvwl_add_to_wishlist_button:hover,
            .main-navigation .primary-navigation>.menu-item .sub-menu a.woocommerce-loop-product__link:hover,
            .main-navigation .primary-navigation>.menu-item .sub-menu a.loop-add-to-cart-btn:hover {
                background-color: transparent
            }

            .main-navigation .primary-navigation>.menu-item .sub-menu a:hover {
                background: rgba(239, 239, 239, 0.28)
            }

            .main-navigation .primary-navigation .menu-item {
                position: relative
            }

            .main-navigation .primary-navigation .menu-item:hover>.sub-menu {
                pointer-events: auto;
                opacity: 1;
                visibility: visible;
                top: 100%;
                z-index: 999;
                -webkit-transform: translateY(0px);
                transform: translateY(0px)
            }

            .main-navigation .primary-navigation .sub-menu {
                pointer-events: none;
                background-color: #fff;
                -webkit-box-shadow: 0 2px 8px 0 rgba(125, 122, 122, 0.2);
                box-shadow: 0 2px 8px 0 rgba(125, 122, 122, 0.2);
                border-radius: 4px;
                -webkit-transition-duration: 0.2s;
                transition-duration: 0.2s;
                -webkit-transform: translateY(10px);
                transform: translateY(10px)
            }

            .main-navigation .primary-navigation .sub-menu>.menu-item>.sub-menu {
                -webkit-transform: translateY(0px);
                transform: translateY(0px);
                top: 0;
                left: 110%
            }

            .main-navigation .primary-navigation .sub-menu>.menu-item:hover>.sub-menu {
                left: 100%
            }

            .main-navigation .primary-navigation .sub-menu>.menu-item-has-children a.submenu-left-active {
                flex-direction: row-reverse;
                padding-left: 0;
                padding-right: 10px
            }

            .main-navigation .primary-navigation .sub-menu>.menu-item-has-children a.submenu-left-active .menu-item-arrow {
                transform: rotate(90deg)
            }

            .main-navigation .primary-navigation .sub-menu>li>.sub-menu.submenu-left>.menu-item-has-children a.icon-submenu-left {
                flex-direction: row-reverse;
                padding-left: 0;
                padding-right: 10px
            }

            .main-navigation .primary-navigation .sub-menu>li>.sub-menu.submenu-left>.menu-item-has-children a .menu-item-arrow {
                transform: rotate(90deg)
            }

            .main-navigation .primary-navigation .sub-menu>.menu-item>.sub-menu.submenu-left {
                right: 100%;
                left: auto
            }

            .main-navigation .primary-navigation .sub-menu>.menu-item>.sub-menu.submenu-left .sub-menu {
                right: 100%;
                left: auto
            }

            .main-navigation .primary-navigation .sub-menu>.menu-item:hover>.sub-menu.submenu-left {
                right: 100%;
                left: auto
            }

            .has-header-layout-1 .wrap-toggle-sidebar-menu {
                display: none
            }

            .has-header-layout-1 .site-navigation {
                flex-grow: 1;
                text-align: right
            }

            .has-header-layout-1 .site-navigation .site-search:not(.woostify-search-form-widget),
            .has-header-layout-1 .site-navigation .mobile-my-account {
                display: none
            }
        }

        body,
        select,
        button,
        input,
        textarea {
            font-family: Lato;
            font-weight: 400;
            line-height: 28px;
            text-transform: none;
            font-size: 14px;
            color: #8f8f8f
        }

        .woostify-svg-icon svg {
            width: 14px;
            height: 14px
        }

        .pagination a,
        .pagination a,
        .woocommerce-pagination a,
        .woocommerce-loop-product__category a,
        .woocommerce-loop-product__title,
        .price del,
        .stars a,
        .woocommerce-review-link,
        .woocommerce-tabs .tabs li:not(.active) a,
        .woocommerce-cart-form__contents .product-remove a,
        .comment-body .comment-meta .comment-date,
        .woostify-breadcrumb a,
        .breadcrumb-separator,
        #secondary .widget a,
        .has-woostify-text-color,
        .button.loop-add-to-cart-icon-btn,
        .button.loop-add-to-cart-icon-btn .woostify-svg-icon,
        .loop-wrapper-wishlist a,
        #order_review .shop_table .product-name {
            color: #8f8f8f
        }

        .loop-wrapper-wishlist a:hover,
        .price_slider_wrapper .price_slider,
        .has-woostify-text-background-color {
            background-color: #8f8f8f
        }

        .elementor-add-to-cart .quantity {
            border: 1px solid #8f8f8f
        }

        .product .woocommerce-loop-product__title {
            font-size: 14px
        }

        .primary-navigation a {
            font-family: Lato;
            text-transform: none
        }

        .primary-navigation>li>a,
        .primary-navigation .sub-menu a {
            font-weight: 500
        }

        .primary-navigation>li>a {
            font-size: 14px;
            line-height: 50px;
            color: #2b2b2b
        }

        .primary-navigation>li>a .woostify-svg-icon {
            color: #2b2b2b
        }

        .primary-navigation .sub-menu a {
            line-height: 24px;
            font-size: 12px;
            color: #2b2b2b
        }

        .site-tools .tools-icon .woostify-header-total-price {
            font-family: Lato;
            font-size: 14px;
            color: #2b2b2b
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: Lato;
            font-weight: 700;
            text-transform: none;
            line-height: 1.5;
            color: #2b2b2b
        }

        h1,
        .has-woostify-heading-1-font-size {
            font-size: 48px
        }

        h2,
        .has-woostify-heading-2-font-size {
            font-size: 36px
        }

        h3,
        .has-woostify-heading-3-font-size {
            font-size: 30px
        }

        h4,
        .has-woostify-heading-4-font-size {
            font-size: 28px
        }

        h5,
        .has-woostify-heading-5-font-size {
            font-size: 26px
        }

        h6,
        .has-woostify-heading-6-font-size {
            font-size: 18px
        }

        .product-loop-meta .price,
        .variations label,
        .woocommerce-review__author,
        .button[name="apply_coupon"],
        .quantity .qty,
        .form-row label,
        .select2-container--default .select2-selection--single .select2-selection__rendered,
        .form-row .input-text:focus,
        .wc_payment_method label,
        .shipping-methods-modified-label,
        .woocommerce-checkout-review-order-table thead th,
        .woocommerce-checkout-review-order-table .product-name,
        .woocommerce-thankyou-order-details strong,
        .woocommerce-table--order-details th,
        .woocommerce-table--order-details .amount,
        .wc-breadcrumb .woostify-breadcrumb,
        .sidebar-menu .primary-navigation .arrow-icon,
        .default-widget a strong:hover,
        .woostify-subscribe-form input,
        .woostify-shop-category .elementor-widget-image .widget-image-caption,
        .shop_table_responsive td:before,
        .dialog-search-title,
        .cart-collaterals th,
        .woocommerce-mini-cart__total strong,
        .woocommerce-form-login-toggle .woocommerce-info a,
        .woocommerce-form-coupon-toggle .woocommerce-info a,
        .has-woostify-heading-color,
        .woocommerce-table--order-details td,
        .woocommerce-table--order-details td.product-name a,
        .has-distraction-free-checkout .site-header .site-branding:after,
        .woocommerce-cart-form__contents thead th,
        #order_review .shop_table th,
        #order_review .shop_table th.product-name,
        #order_review .shop_table .product-quantity {
            color: #2b2b2b
        }

        .has-woostify-heading-background-color {
            background-color: #2b2b2b
        }

        .variations label {
            font-weight: 700
        }

        .cart-sidebar-content .woocommerce-mini-cart__buttons a:not(.checkout),
        .product-loop-meta .button,
        .multi-step-checkout-button[data-action="back"],
        .multi-step-checkout-button[data-action="back"] .woostify-svg-icon,
        .review-information-link,
        a {
            color: #2b2b2b
        }

        .woostify-icon-bar span {
            background-color: #2b2b2b
        }

        .cart-sidebar-content .woocommerce-mini-cart__buttons a:not(.checkout):hover,
        .product-loop-meta .button:hover,
        .multi-step-checkout-button[data-action="back"]:hover,
        .multi-step-checkout-button[data-action="back"] .woostify-svg-icon:hover,
        .review-information-link:hover,
        a:hover {
            color: #FDB724
        }

        .woostify-icon-bar span:hover {
            background-color: #FDB724
        }

        .woostify-button-color,
        .loop-add-to-cart-on-image+.added_to_cart,
        {
        color: #ffffff
        }

        .woostify-button-bg-color,
        .woocommerce-cart-form__contents:not(.elementor-menu-cart__products) .actions .coupon [name="apply_coupon"],
        .loop-add-to-cart-on-image+.added_to_cart,
        .related .tns-controls button,
        .up-sells .tns-controls button,
        .woostify-product-recently-viewed-section .tns-controls button {
            background-color: #DD6E31
        }

        .woostify-button-hover-color,
        .button[name="apply_coupon"]:hover {
            color: #ffffff
        }

        .woostify-button-hover-bg-color,
        .loop-add-to-cart-on-image+.added_to_cart:hover,
        .button.loop-add-to-cart-icon-btn:hover,
        .product-loop-action .yith-wcwl-add-to-wishlist:hover,
        .product-loop-action .yith-wcwl-wishlistaddedbrowse.show,
        .product-loop-action .yith-wcwl-wishlistexistsbrowse.show,
        .product-loop-action .added_to_cart,
        .product-loop-image-wrapper .tinv-wraper .tinvwl_add_to_wishlist_button:hover,
        .related .tns-controls button:hover,
        .up-sells .tns-controls button:hover,
        .woostify-product-recently-viewed-section .tns-controls button:hover {
            background-color: #DD8631A1
        }

        @media (min-width:992px) {
            .main-navigation .primary-navigation>.menu-item ul:not(.sub-mega-menu) a.tinvwl_add_to_wishlist_button:hover {
                background-color: #DD8631A1
            }
        }

        .button,
        .woocommerce-widget-layered-nav-dropdown__submit,
        .form-submit .submit,
        .elementor-button-wrapper .elementor-button,
        .has-woostify-contact-form input[type="submit"],
        #secondary .widget a.button,
        .product-loop-meta.no-transform .button,
        .product-loop-meta.no-transform .added_to_cart,
        [class*="elementor-kit"] .checkout-button {
            background-color: #DD6E31;
            color: #ffffff;
            border-radius: 50px
        }

        .button .woostify-svg-icon,
        .product-loop-meta.no-transform .added_to_cart .woostify-svg-icon {
            color: #ffffff
        }

        .cart:not(.elementor-menu-cart__products) .quantity,
        .loop-add-to-cart-on-image+.added_to_cart,
        .loop-product-qty .quantity,
        .mini-cart-product-infor .mini-cart-quantity {
            border-radius: 50px
        }

        .button:hover,
        .single_add_to_cart_button.button:not(.woostify-buy-now):hover,
        .woocommerce-widget-layered-nav-dropdown__submit:hover,
        #commentform input[type="submit"]:hover,
        .form-submit .submit:hover,
        #secondary .widget a.button:hover,
        .woostify-contact-form input[type="submit"]:hover,
        .loop-add-to-cart-on-image+.added_to_cart:hover,
        .product-loop-meta.no-transform .button:hover,
        .product-loop-meta.no-transform .added_to_cart:hover {
            background-color: #DD8631A1;
            color: #ffffff
        }

        /*.product-loop-wrapper .button .woostify-svg-icon{color:#ffffff}*/
        .loop-add-to-cart-on-image+.added_to_cart:hover .woostify-svg-icon {
            color: #ffffff
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected],
        .select2-container--default .select2-results__option--highlighted[data-selected] {
            background-color: #DD6E31 !important
        }

        @media (max-width:600px) {
            .woocommerce-cart-form__contents [name="update_cart"] {
                background-color: #DD6E31;
                filter: grayscale(100%)
            }

            .woocommerce-cart-form__contents [name="update_cart"],
            .woocommerce-cart-form__contents .coupon button {
                color: #ffffff
            }
        }

        .free-shipping-progress-bar .progress-bar-message {
            color: inherit
        }

        .free-shipping-progress-bar[data-progress="100"] .progress-bar-message {
            color: inherit
        }

        .free-shipping-progress-bar .progress-bar-indicator {
            background: linear-gradient(270deg, #1346af 0, #fff 200%);
            background-color: #1346af
        }

        .free-shipping-progress-bar .progress-bar-status.success .progress-bar-indicator {
            background: #67bb67
        }

        .woostify-theme-color,
        .primary-navigation li.current-menu-item>a,
        .primary-navigation>li.current-menu-ancestor>a,
        .primary-navigation>li.current-menu-parent>a,
        .primary-navigation>li.current_page_parent>a,
        .primary-navigation>li.current_page_ancestor>a,
        .woocommerce-cart-form__contents tbody .product-subtotal,
        .woocommerce-checkout-review-order-table .order-total,
        .woocommerce-table--order-details .product-name a,
        .primary-navigation a:hover,
        .primary-navigation a:hover>.menu-item-arrow .woostify-svg-icon,
        .primary-navigation .menu-item-has-children:hover>a,
        .primary-navigation .menu-item-has-children:hover>a>.menu-item-arrow .woostify-svg-icon,
        .default-widget a strong,
        .woocommerce-mini-cart__total .amount,
        .woocommerce-form-login-toggle .woocommerce-info a:hover,
        .woocommerce-form-coupon-toggle .woocommerce-info a:hover,
        .has-woostify-primary-color,
        .blog-layout-grid .site-main .post-read-more a,
        .site-footer a:hover,
        .woostify-simple-subsbrice-form input[type="submit"],
        .woocommerce-tabs li.active a,
        #secondary .widget .current-cat>a,
        #secondary .widget .current-cat>span,
        .site-tools .header-search-icon:hover,
        .product-loop-meta .button:hover,
        #secondary .widget a:not(.tag-cloud-link):hover,
        .cart-sidebar-content .woocommerce-mini-cart__buttons a:not(.checkout):hover,
        .product-nav-item:hover>a,
        .product-nav-item .product-nav-item-price,
        .woocommerce-thankyou-order-received,
        .site-tools .tools-icon:hover,
        .site-tools .tools-icon:hover .woostify-svg-icon,
        .tools-icon.my-account:hover>a,
        .multi-step-checkout-button[data-action="back"]:hover,
        .multi-step-checkout-button[data-action="back"]:hover .woostify-svg-icon,
        .review-information-link:hover,
        .has-multi-step-checkout .multi-step-item,
        #secondary .chosen a,
        #secondary .chosen .count,
        .cart_totals .shop_table .woocommerce-Price-amount,
        #order_review .shop_table .woocommerce-Price-amount {
            color: #DD6E31
        }

        .onsale,
        .pagination li .page-numbers.current,
        .woocommerce-pagination li .page-numbers.current,
        .tagcloud a:hover,
        .price_slider_wrapper .ui-widget-header,
        .price_slider_wrapper .ui-slider-handle,
        .cart-sidebar-head .shop-cart-count,
        .wishlist-item-count,
        .shop-cart-count,
        .sidebar-menu .primary-navigation a:before,
        .woocommerce-message,
        .woocommerce-info,
        #scroll-to-top,
        .woocommerce-store-notice,
        .has-woostify-primary-background-color,
        .woostify-simple-subsbrice-form input[type="submit"]:hover,
        .has-multi-step-checkout .multi-step-item .item-text:before,
        .has-multi-step-checkout .multi-step-item:before,
        .has-multi-step-checkout .multi-step-item:after,
        .has-multi-step-checkout .multi-step-item.active:before,
        .woostify-single-product-stock .woostify-single-product-stock-progress-bar {
            background-color: #DD6E31
        }

        .woocommerce-thankyou-order-received,
        .woostify-lightbox-button:hover,
        .photoswipe-toggle-button:hover {
            border-color: #DD6E31
        }

        .woostify-simple-subsbrice-form:focus-within input[type="submit"] {
            background-color: #DD6E31
        }

        :root {
            --e-global-color-woostify_color_1: #DD6E31;
            --e-global-color-woostify_color_2: #8f8f8f;
            --e-global-color-woostify_color_3: #2b2b2b;
            --e-global-color-woostify_color_6: #FDB724;
            --e-global-color-woostify_color_4: #fd0;
            --e-global-color-woostify_color_5: #fd0
        }

        .site-header-inner {
            background-color: #ffffff
        }

        .site-tools .tools-icon,
        .site-tools .tools-icon .woostify-svg-icon {
            color:
        }

        .site-tools .tools-icon:hover,
        .site-tools .tools-icon:hover .woostify-svg-icon {
            color:
        }

        .site-tools .shop-cart-count,
        .site-tools .wishlist-item-count {
            color: ;
            background-color:
        }

        @media (min-width:992px) {
            .has-sidebar:not(.offcanvas-sidebar) #secondary {
                width: 20%
            }

            .has-sidebar:not(.offcanvas-sidebar) #primary {
                width: calc(100% - 20%)
            }
        }

        .site-footer {
            margin-top: 100px
        }

        .site-footer a {
            color: #8f8f8f
        }

        .site-footer {
            background-color: #eeeeec;
            color: #8f8f8f
        }

        .site-footer .widget-title,
        .site-footer .widgettitle,
        .woostify-footer-social-icon a {
            color: #2b2b2b
        }

        .woostify-footer-social-icon a:hover {
            background-color: #2b2b2b
        }

        .woostify-footer-social-icon a {
            border-color: #2b2b2b
        }

        #scroll-to-top {
            border-radius: 30px
        }

        .woostify-sticky-footer-bar {
            background: #ffffff
        }

        .woostify-sticky-footer-bar .woostify-item-list-item__icon .woositfy-sfb-icon svg {
            color: #111111;
            fill: #111111
        }

        .woostify-sticky-footer-bar .woostify-item-list__item a:hover .woostify-item-list-item__icon .woositfy-sfb-icon svg {
            color: #111111;
            fill: #111111
        }

        .woostify-sticky-footer-bar .woostify-item-list-item__name {
            color: #111111;
            font-weight: 600
        }

        .woostify-sticky-footer-bar .woostify-item-list__item a:hover .woostify-item-list-item__name {
            color: #111111
        }

        .toggle-sidebar-menu-btn.woostify-icon-bar span {
            background-color:
        }

        .sidebar-menu {
            background-color: #fff;
            color: #000
        }

        .sidebar-menu a,
        .sidebar-menu .primary-navigation>li>a,
        .sidebar-menu .primary-navigation .sub-menu a {
            color: #000
        }

        .sidebar-menu a:hover {
            color: #000
        }

        .sidebar-menu .mobile-nav-tab,
        .woostify-nav-menu-inner .mobile-nav-tab {
            margin-bottom: 20px
        }

        .sidebar-menu .mobile-tab-title,
        .woostify-nav-menu-inner .mobile-tab-title {
            background: ;
            padding: 16px 10px 16px 10px
        }

        .sidebar-menu .mobile-tab-title.active,
        .woostify-nav-menu-inner .mobile-tab-title.active {
            background: #f7f7f7
        }

        .sidebar-menu .mobile-tab-title a,
        .woostify-nav-menu-inner .mobile-tab-title a {
            color:
        }

        .sidebar-menu .mobile-tab-title.active a,
        .woostify-nav-menu-inner .mobile-tab-title.active a {
            color:
        }

        @media (min-width:992px) {
            .woostify-sticky-footer-bar {
                padding: 10px 0 10px 0
            }

            .woostify-sticky-footer-bar .woostify-item-list-item__icon .woositfy-sfb-icon svg {
                width: 20px;
                height: 20px
            }

            .woostify-sticky-footer-bar ul.woostify-item-list li.woostify-item-list__item a .woostify-item-list-item__icon {
                margin-bottom: 5px
            }

            .woostify-sticky-footer-bar .woostify-item-list-item__name {
                font-size: 13px
            }
        }

        @media (min-width:768px) and (max-width:991px) {
            .woostify-sticky-footer-bar {
                padding: 10px 0 10px 0
            }

            .woostify-sticky-footer-bar .woostify-item-list-item__icon .woositfy-sfb-icon svg {
                width: 20px;
                height: 20px
            }

            .woostify-sticky-footer-bar ul.woostify-item-list li.woostify-item-list__item a .woostify-item-list-item__icon {
                margin-bottom: 5px
            }

            .woostify-sticky-footer-bar .woostify-item-list-item__name {
                font-size: 13px
            }
        }

        @media (max-width:767px) {
            .woostify-sticky-footer-bar {
                padding: 10px 0 10px 0
            }

            .woostify-sticky-footer-bar .woostify-item-list-item__icon .woositfy-sfb-icon svg {
                width: 18px;
                height: 18px
            }

            .woostify-sticky-footer-bar ul.woostify-item-list li.woostify-item-list__item a .woostify-item-list-item__icon {
                margin-bottom: 5px
            }

            .woostify-sticky-footer-bar .woostify-item-list-item__name {
                font-size: 12px
            }
        }

        #scroll-to-top {
            bottom: 140px;
            background-color: #CE6161
        }

        #scroll-to-top .woostify-svg-icon {
            color:
        }

        #scroll-to-top svg {
            width: 17px;
            height: 17px
        }

        @media (min-width:992px) {
            #scroll-to-top.scroll-to-top-show-mobile {
                display: none
            }
        }

        @media (max-width:992px) {
            #scroll-to-top.scroll-to-top-show-desktop {
                display: none
            }
        }

        .circle-loading:before,
        .product_list_widget .remove_from_cart_button:focus:before,
        .updating-cart.ajax-single-add-to-cart .single_add_to_cart_button:before,
        .product-loop-meta .loading:before,
        .updating-cart #shop-cart-sidebar:before {
            border-top-color: #DD6E31
        }

        .product-loop-wrapper .button,
        .product-loop-meta.no-transform .button {
            background-color: ;
            color: ;
            border-radius: px
        }

        .product-loop-wrapper .button .woostify-svg-icon {
            color:
        }

        .product-loop-wrapper .button:hover,
        .product-loop-meta.no-transform .button:hover,
        .product-loop-wrapper .button:hover .woostify-svg-icon {
            background-color: ;
            color:
        }

        .onsale {
            color: #ffffff;
            background-color: #1346af;
            border-radius: 0px
        }

        .woostify-out-of-stock-label {
            color: #ffffff;
            background-color: #818486;
            border-radius: 0px
        }

        .single-product .content-top,
        .product-page-container {
            background-color: #f3f3f3
        }

        .single_add_to_cart_button.button:not(.woostify-buy-now) {
            border-radius: px;
            background-color: ;
            color:
        }

        .single_add_to_cart_button.button:not(.woostify-buy-now):hover {
            color: ;
            background-color:
        }

        #shop-cart-sidebar {
            background-color: #fff
        }

        .product-loop-action .yith-wcwl-add-to-wishlist a {
            color: #8f8f8f
        }

        .product-loop-action .yith-wcwl-add-to-wishlist a:hover {
            background-color: #DD8631A1
        }

        .product-loop-action .yith-wcwl-add-to-wishlist:hover .feedback {
            background-color: #DD8631A1
        }

        .loop-wrapper-wishlist .feedback:hover {
            background-color: #8f8f8f
        }

        .blog .post-loop .entry-title {
            color: #2b2b2b;
            font-size: 24px
        }

        .blog .post-loop .post-meta-item a,
        .blog .post-loop .post-meta-item {
            color: #2b2b2b;
            font-size: 14px
        }

        .blog .post-loop .summary-text {
            color: #8f8f8f;
            font-size: 14px
        }

        @media (max-width:992px) {
            .blog .post-loop .entry-title {
                font-size: 20px
            }

            .blog .post-loop .post-meta-item a,
            .blog .post-loop .post-meta-item {
                font-size: 14px
            }

            .blog .post-loop .summary-text {
                font-size: 14px
            }
        }

        @media (max-width:767px) {
            .blog .post-loop .entry-title {
                font-size: 18px
            }

            .blog .post-loop .post-meta-item a,
            .blog .post-loop .post-meta-item {
                font-size: 14px
            }

            .blog .post-loop .summary-text {
                font-size: 14px
            }
        }

        .woocommerce .product .woocommerce-loop-product__title {
            color: #8f8f8f;
            font-size: 11px
        }

        .woocommerce .product .product-loop-meta .price del {
            opacity: 0.5
        }

        .woocommerce .product .product-loop-meta .price .woocommerce-Price-amount,
        .woocommerce .product .product-loop-meta .price del {
            color: #DD6E31;
            font-size: 20px
        }

        @media (max-width:992px) {
            .woocommerce .product .woocommerce-loop-product__title {
                font-size: 10px
            }

            .woocommerce .product .product-loop-meta .price .woocommerce-Price-amount,
            .woocommerce .product .product-loop-meta .price del {
                font-size: 18px
            }
        }

        @media (max-width:767px) {
            .woocommerce .product .product-loop-meta .woocommerce-loop-product__title {
                font-size: 10px
            }

            .woocommerce .product .product-loop-meta .price .woocommerce-Price-amount,
            .woocommerce .product .product-loop-meta .price del {
                font-size: 18px
            }
        }

        /*# sourceURL=woostify-style-inline-css */
    </style>
  

    <meta name="google-adsense-platform-account" content="ca-host-pub-2644536267352236">
    <meta name="google-adsense-platform-domain" content="sitekit.withgoogle.com">
    <!-- Acabar con las metaetiquetas de Google AdSense añadidas por Site Kit -->
    <meta name="generator" content="Elementor 4.0.9; features: e_font_icon_svg, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
    <style id="googleidentityservice_button_styles">
        .qJTHM {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            color: #202124;
            direction: ltr;
            -webkit-touch-callout: none;
            font-family: Roboto-Regular, arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            font-weight: 400;
            margin: 0;
            overflow: hidden;
            -webkit-text-size-adjust: 100%
        }

        .ynRLnc {
            left: -9999px;
            position: absolute;
            top: -9999px
        }

        .L6cTce {
            display: none
        }

        .bltWBb {
            overflow-wrap: break-word;
            word-break: break-word
        }

        .hSRGPd {
            color: #1a73e8;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none
        }

        .Bz112c-W3lGp {
            height: 16px;
            width: 16px
        }

        .Bz112c-E3DyYd {
            height: 20px;
            width: 20px
        }

        .Bz112c-r9oPif {
            height: 24px;
            width: 24px
        }

        .Bz112c-u2z5K {
            height: 36px;
            width: 36px
        }

        .Bz112c-uaxL4e {
            border-radius: 10px
        }

        .LgbsSe-Bz112c {
            display: block
        }

        .S9gUrf-YoZ4jf {
            border: none;
            margin: 0;
            padding: 0
        }

        .S9gUrf-YoZ4jf * {
            border: none;
            margin: 0;
            padding: 0
        }

        .fFW7wc-ibnC6b>.aZ2wEe>div {
            border-color: #4285f4
        }

        .P1ekSe-ZMv3u {
            transition: height .2s linear
        }

        .P1ekSe-ZMv3u>div:first-child {
            background-color: #1a73e8 !important;
            transition: width .3s linear
        }

        .P1ekSe-ZMv3u>div:nth-child(2) {
            background-image: linear-gradient(90deg, rgba(255, 255, 255, .7), rgba(255, 255, 255, .7)), linear-gradient(90deg, #1a73e8, #1a73e8) !important
        }

        .P1ekSe-ZMv3u>div:nth-child(3) {
            background-image: linear-gradient(90deg, rgba(255, 255, 255, .7), rgba(255, 255, 255, .7)), linear-gradient(90deg, #1a73e8, #1a73e8) !important
        }

        .haAclf {
            display: inline-block
        }

        .nsm7Bb-HzV7m-LgbsSe {
            border-radius: 4px;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            transition: background-color .218s, border-color .218s;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -webkit-appearance: none;
            background-color: #fff;
            background-image: none;
            border: 1px solid #dadce0;
            color: #3c4043;
            cursor: pointer;
            font-family: Google Sans, arial, sans-serif;
            font-size: .875rem;
            height: 40px;
            letter-spacing: .25px;
            outline: none;
            overflow: hidden;
            padding: 0 12px;
            position: relative;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
            width: auto
        }

        @media screen and (-ms-high-contrast:active) {
            .nsm7Bb-HzV7m-LgbsSe {
                border: 2px solid windowText;
                color: windowText
            }
        }

        @media screen and (preferes-contrast:more) {
            .nsm7Bb-HzV7m-LgbsSe {
                color: #000
            }
        }

        .nsm7Bb-HzV7m-LgbsSe.pSzOP-SxQuSe {
            font-size: .875rem;
            height: 32px;
            letter-spacing: .25px;
            padding: 0 10px
        }

        .nsm7Bb-HzV7m-LgbsSe.purZT-SxQuSe {
            font-size: .6875rem;
            height: 20px;
            letter-spacing: .3px;
            padding: 0 8px
        }

        .nsm7Bb-HzV7m-LgbsSe.Bz112c-LgbsSe {
            padding: 0;
            width: 40px
        }

        .nsm7Bb-HzV7m-LgbsSe.Bz112c-LgbsSe.pSzOP-SxQuSe {
            width: 32px
        }

        .nsm7Bb-HzV7m-LgbsSe.Bz112c-LgbsSe.purZT-SxQuSe {
            width: 20px
        }

        .nsm7Bb-HzV7m-LgbsSe.JGcpL-RbRzK {
            border-radius: 20px
        }

        .nsm7Bb-HzV7m-LgbsSe.JGcpL-RbRzK.pSzOP-SxQuSe {
            border-radius: 16px
        }

        .nsm7Bb-HzV7m-LgbsSe.JGcpL-RbRzK.purZT-SxQuSe {
            border-radius: 10px
        }

        .nsm7Bb-HzV7m-LgbsSe.i5vt6e-to915-Ia7Qfc {
            border: 1px solid #8e918f;
            background-color: #131314;
            color: #e3e3e3
        }

        .nsm7Bb-HzV7m-LgbsSe.MFS4be-Ia7Qfc {
            border: none;
            color: #fff
        }

        .nsm7Bb-HzV7m-LgbsSe.MFS4be-v3pZbf-Ia7Qfc {
            background-color: #1a73e8
        }

        .nsm7Bb-HzV7m-LgbsSe.MFS4be-JaPV2b-Ia7Qfc {
            background-color: #202124;
            color: #e8eaed
        }

        @media screen and (prefers-contrast:more) {
            .nsm7Bb-HzV7m-LgbsSe.MFS4be-JaPV2b-Ia7Qfc {
                color: #fff
            }
        }

        .nsm7Bb-HzV7m-LgbsSe .nsm7Bb-HzV7m-LgbsSe-Bz112c {
            height: 18px;
            margin-right: 8px;
            min-width: 18px;
            width: 18px
        }

        .nsm7Bb-HzV7m-LgbsSe.pSzOP-SxQuSe .nsm7Bb-HzV7m-LgbsSe-Bz112c {
            height: 14px;
            min-width: 14px;
            width: 14px
        }

        .nsm7Bb-HzV7m-LgbsSe.purZT-SxQuSe .nsm7Bb-HzV7m-LgbsSe-Bz112c {
            height: 10px;
            min-width: 10px;
            width: 10px
        }

        .nsm7Bb-HzV7m-LgbsSe.jVeSEe .nsm7Bb-HzV7m-LgbsSe-Bz112c {
            margin-left: 8px;
            margin-right: -4px
        }

        .nsm7Bb-HzV7m-LgbsSe.Bz112c-LgbsSe .nsm7Bb-HzV7m-LgbsSe-Bz112c {
            margin: 0;
            padding: 10px
        }

        .nsm7Bb-HzV7m-LgbsSe.Bz112c-LgbsSe.pSzOP-SxQuSe .nsm7Bb-HzV7m-LgbsSe-Bz112c {
            padding: 8px
        }

        .nsm7Bb-HzV7m-LgbsSe.Bz112c-LgbsSe.purZT-SxQuSe .nsm7Bb-HzV7m-LgbsSe-Bz112c {
            padding: 4px
        }

        .nsm7Bb-HzV7m-LgbsSe .nsm7Bb-HzV7m-LgbsSe-Bz112c-haAclf {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
            display: -moz-box;
            display: flex;
            -moz-box-pack: center;
            justify-content: center;
            -moz-box-align: center;
            align-items: center;
            background-color: #fff;
            height: 36px;
            margin-left: -10px;
            margin-right: 12px;
            min-width: 36px;
            width: 36px
        }

        .nsm7Bb-HzV7m-LgbsSe .nsm7Bb-HzV7m-LgbsSe-Bz112c-haAclf .nsm7Bb-HzV7m-LgbsSe-Bz112c,
        .nsm7Bb-HzV7m-LgbsSe.Bz112c-LgbsSe .nsm7Bb-HzV7m-LgbsSe-Bz112c-haAclf .nsm7Bb-HzV7m-LgbsSe-Bz112c {
            margin: 0;
            padding: 0
        }

        .nsm7Bb-HzV7m-LgbsSe.pSzOP-SxQuSe .nsm7Bb-HzV7m-LgbsSe-Bz112c-haAclf {
            height: 28px;
            margin-left: -8px;
            margin-right: 10px;
            min-width: 28px;
            width: 28px
        }

        .nsm7Bb-HzV7m-LgbsSe.purZT-SxQuSe .nsm7Bb-HzV7m-LgbsSe-Bz112c-haAclf {
            height: 16px;
            margin-left: -6px;
            margin-right: 8px;
            min-width: 16px;
            width: 16px
        }

        .nsm7Bb-HzV7m-LgbsSe.Bz112c-LgbsSe .nsm7Bb-HzV7m-LgbsSe-Bz112c-haAclf {
            border-radius: 3px;
            margin-left: 2px;
            margin-right: 0;
            padding: 0
        }

        .nsm7Bb-HzV7m-LgbsSe.JGcpL-RbRzK .nsm7Bb-HzV7m-LgbsSe-Bz112c-haAclf {
            border-radius: 18px
        }

        .nsm7Bb-HzV7m-LgbsSe.pSzOP-SxQuSe.JGcpL-RbRzK .nsm7Bb-HzV7m-LgbsSe-Bz112c-haAclf {
            border-radius: 14px
        }

        .nsm7Bb-HzV7m-LgbsSe.purZT-SxQuSe.JGcpL-RbRzK .nsm7Bb-HzV7m-LgbsSe-Bz112c-haAclf {
            border-radius: 8px
        }

        .nsm7Bb-HzV7m-LgbsSe .nsm7Bb-HzV7m-LgbsSe-bN97Pc-sM5MNb {
            display: -moz-box;
            display: flex;
            -moz-box-align: center;
            align-items: center;
            -moz-box-orient: horizontal;
            -moz-box-direction: normal;
            flex-direction: row;
            -moz-box-pack: justify;
            justify-content: space-between;
            flex-wrap: nowrap;
            height: 100%;
            position: relative;
            width: 100%
        }

        .nsm7Bb-HzV7m-LgbsSe .oXtfBe-l4eHX {
            -moz-box-pack: center;
            justify-content: center
        }

        .nsm7Bb-HzV7m-LgbsSe .nsm7Bb-HzV7m-LgbsSe-BPrWId {
            -moz-box-flex: 1;
            flex-grow: 1;
            font-family: Google Sans, arial, sans-serif;
            font-weight: 500;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: top
        }

        .nsm7Bb-HzV7m-LgbsSe.purZT-SxQuSe .nsm7Bb-HzV7m-LgbsSe-BPrWId {
            font-weight: 300
        }

        .nsm7Bb-HzV7m-LgbsSe .oXtfBe-l4eHX .nsm7Bb-HzV7m-LgbsSe-BPrWId {
            -moz-box-flex: 0;
            flex-grow: 0
        }

        .nsm7Bb-HzV7m-LgbsSe .nsm7Bb-HzV7m-LgbsSe-MJoBVe {
            transition: background-color .218s;
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0
        }

        .nsm7Bb-HzV7m-LgbsSe:focus,
        .nsm7Bb-HzV7m-LgbsSe:hover {
            box-shadow: none;
            border-color: rgb(210, 227, 252);
            outline: none
        }

        .nsm7Bb-HzV7m-LgbsSe:focus-within {
            outline: 2px solid #00639b;
            border-color: transparent
        }

        .nsm7Bb-HzV7m-LgbsSe:hover .nsm7Bb-HzV7m-LgbsSe-MJoBVe {
            background: rgba(66, 133, 244, .08)
        }

        .nsm7Bb-HzV7m-LgbsSe:active .nsm7Bb-HzV7m-LgbsSe-MJoBVe,
        .nsm7Bb-HzV7m-LgbsSe:focus .nsm7Bb-HzV7m-LgbsSe-MJoBVe {
            background: rgba(66, 133, 244, .1)
        }

        .nsm7Bb-HzV7m-LgbsSe.i5vt6e-to915-Ia7Qfc:hover .nsm7Bb-HzV7m-LgbsSe-MJoBVe {
            background: rgba(255, 255, 255, .08)
        }

        .nsm7Bb-HzV7m-LgbsSe.i5vt6e-to915-Ia7Qfc:active .nsm7Bb-HzV7m-LgbsSe-MJoBVe,
        .nsm7Bb-HzV7m-LgbsSe.i5vt6e-to915-Ia7Qfc:focus .nsm7Bb-HzV7m-LgbsSe-MJoBVe {
            background: rgba(255, 255, 255, .12)
        }

        .nsm7Bb-HzV7m-LgbsSe.MFS4be-Ia7Qfc:hover .nsm7Bb-HzV7m-LgbsSe-MJoBVe {
            background: rgba(255, 255, 255, .24)
        }

        .nsm7Bb-HzV7m-LgbsSe.MFS4be-Ia7Qfc:active .nsm7Bb-HzV7m-LgbsSe-MJoBVe,
        .nsm7Bb-HzV7m-LgbsSe.MFS4be-Ia7Qfc:focus .nsm7Bb-HzV7m-LgbsSe-MJoBVe {
            background: rgba(255, 255, 255, .32)
        }

        .nsm7Bb-HzV7m-LgbsSe .n1UuX-DkfjY {
            border-radius: 50%;
            display: -moz-box;
            display: flex;
            height: 20px;
            margin-left: -4px;
            margin-right: 8px;
            min-width: 20px;
            width: 20px
        }

        .nsm7Bb-HzV7m-LgbsSe.jVeSEe .nsm7Bb-HzV7m-LgbsSe-BPrWId {
            font-family: Roboto;
            font-size: 12px;
            text-align: left
        }

        .nsm7Bb-HzV7m-LgbsSe.jVeSEe .nsm7Bb-HzV7m-LgbsSe-BPrWId .K4efff .fmcmS,
        .nsm7Bb-HzV7m-LgbsSe.jVeSEe .nsm7Bb-HzV7m-LgbsSe-BPrWId .ssJRIf {
            overflow: hidden;
            text-overflow: ellipsis
        }

        .nsm7Bb-HzV7m-LgbsSe.jVeSEe .nsm7Bb-HzV7m-LgbsSe-BPrWId .K4efff {
            display: -moz-box;
            display: flex;
            -moz-box-align: center;
            align-items: center;
            color: #5f6368;
            fill: #5f6368;
            font-size: 11px;
            font-weight: 400
        }

        .nsm7Bb-HzV7m-LgbsSe.jVeSEe.i5vt6e-to915-Ia7Qfc .nsm7Bb-HzV7m-LgbsSe-BPrWId .K4efff {
            color: #c4c7c5;
            fill: #c4c7c5
        }

        .nsm7Bb-HzV7m-LgbsSe.jVeSEe.MFS4be-Ia7Qfc .nsm7Bb-HzV7m-LgbsSe-BPrWId .K4efff {
            color: #e8eaed;
            fill: #e8eaed
        }

        @media screen and (prefers-contrast:more) {

            .nsm7Bb-HzV7m-LgbsSe.jVeSEe .nsm7Bb-HzV7m-LgbsSe-BPrWId .K4efff,
            .nsm7Bb-HzV7m-LgbsSe.jVeSEe.MFS4be-Ia7Qfc .nsm7Bb-HzV7m-LgbsSe-BPrWId .K4efff {
                color: #000;
                fill: #000
            }
        }

        .nsm7Bb-HzV7m-LgbsSe.jVeSEe .nsm7Bb-HzV7m-LgbsSe-BPrWId .K4efff .Bz112c {
            height: 18px;
            margin: -3px -3px -3px 2px;
            min-width: 18px;
            width: 18px
        }

        .nsm7Bb-HzV7m-LgbsSe.jVeSEe .nsm7Bb-HzV7m-LgbsSe-Bz112c-haAclf {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            margin-left: 12px;
            margin-right: -10px
        }

        .nsm7Bb-HzV7m-LgbsSe.jVeSEe.JGcpL-RbRzK .nsm7Bb-HzV7m-LgbsSe-Bz112c-haAclf {
            border-radius: 18px
        }

        .L5Fo6c-sM5MNb {
            border: 0;
            display: block;
            left: 0;
            position: relative;
            top: 0
        }

        .L5Fo6c-bF1uUb {
            border-radius: 4px;
            bottom: 0;
            cursor: pointer;
            left: 0;
            position: absolute;
            right: 0;
            top: 0
        }

        .L5Fo6c-bF1uUb:focus {
            border: none;
            outline: none
        }

        sentinel {}
    </style>
    <link id="googleidentityservice" type="text/css" media="all" href="https://accounts.google.com/gsi/style" rel="stylesheet">
   

    <style>
        .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
        .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
            background-image: none !important;
        }

        @media screen and (max-height: 1024px) {

            .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
            .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
                background-image: none !important;
            }
        }

        @media screen and (max-height: 640px) {

            .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
            .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
                background-image: none !important;
            }
        }
    </style>

    <style>
    .dbe-single { max-width: 1140px; margin: 0 auto; padding: 30px 16px 50px; }
    .dbe-product { display: grid; grid-template-columns: minmax(0, 560px) 1fr; gap: 40px; align-items: start; }
    .dbe-gallery-main { position: relative; border: 1px solid #eee; border-radius: 10px; background: #fafafa; aspect-ratio: 1/1; display: flex; align-items: center; justify-content: center; overflow: hidden; }
    .dbe-gallery-main img { width: 100%; height: 100%; object-fit: contain; cursor: zoom-in; }
    .dbe-zoom-hint { position: absolute; bottom: 10px; right: 10px; background: rgba(0,0,0,.55); color: #fff; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; font-size: 18px; pointer-events: none; opacity: .85; }

    /* Lightbox */
    .dbe-lightbox { position: fixed; inset: 0; background: rgba(0,0,0,.9); z-index: 99999; display: none; align-items: center; justify-content: center; }
    .dbe-lightbox.open { display: flex; }
    .dbe-lightbox-stage { position: relative; width: 100%; height: 100%; overflow: hidden; display: flex; align-items: center; justify-content: center; }
    .dbe-lightbox-img { max-width: 92vw; max-height: 88vh; object-fit: contain; transform-origin: center center; transition: transform .15s ease-out; cursor: grab; user-select: none; -webkit-user-drag: none; will-change: transform; }
    .dbe-lightbox-img.dragging { cursor: grabbing; transition: none; }
    .dbe-lb-btn { position: absolute; background: rgba(255,255,255,.12); color: #fff; border: 0; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background .2s; z-index: 2; }
    .dbe-lb-btn:hover { background: rgba(255,255,255,.28); }
    .dbe-lb-close { top: 20px; right: 24px; width: 46px; height: 46px; border-radius: 50%; font-size: 26px; line-height: 1; }
    .dbe-lb-nav { top: 50%; transform: translateY(-50%); width: 52px; height: 52px; border-radius: 50%; font-size: 30px; line-height: 1; }
    .dbe-lb-prev { left: 24px; }
    .dbe-lb-next { right: 24px; }
    .dbe-lb-zoom { bottom: 24px; left: 50%; transform: translateX(-50%); display: flex; gap: 10px; background: transparent; }
    .dbe-lb-zoom button { width: 46px; height: 46px; border-radius: 50%; font-size: 22px; background: rgba(255,255,255,.12); color: #fff; border: 0; cursor: pointer; transition: background .2s; }
    .dbe-lb-zoom button:hover { background: rgba(255,255,255,.28); }
    .dbe-lb-counter { position: absolute; top: 24px; left: 24px; color: #fff; font-size: .9rem; background: rgba(0,0,0,.4); padding: 4px 12px; border-radius: 20px; z-index: 2; }
    @media (max-width: 600px) {
        .dbe-lb-nav { width: 42px; height: 42px; font-size: 24px; }
        .dbe-lb-prev { left: 10px; } .dbe-lb-next { right: 10px; }
        .dbe-lb-close { top: 12px; right: 12px; }
    }
    .dbe-gallery-thumbs { display: flex; gap: 10px; margin-top: 12px; flex-wrap: wrap; }
    .dbe-thumb { width: 72px; height: 72px; object-fit: cover; border: 1px solid #e5e5e5; border-radius: 6px; cursor: pointer; background:#fff; }
    .dbe-thumb.active, .dbe-thumb:hover { border-color: #e2401c; }
    .dbe-product-summary .product_title { font-size: 1.7rem; font-weight: 700; margin: 0 0 14px; }
    .dbe-product-summary .price { font-size: 1.7rem; color: #e2401c; font-weight: 700; margin: 6px 0 18px; }
    .dbe-short-desc { color: #555; line-height: 1.6; margin-bottom: 18px; white-space: pre-line; }
    .dbe-meta-line { font-size: .92rem; color: #666; margin: 6px 0; }
    .dbe-stock-in { color: #1a8f3c; font-weight: 600; }
    .dbe-stock-out { color: #c0392b; font-weight: 600; }
    .dbe-delivery { list-style: none; padding: 16px; margin: 18px 0; background: #f7f7f7; border-radius: 8px; }
    .dbe-delivery li { padding: 5px 0; font-size: .92rem; color: #444; }
    .dbe-cart-form { display: flex; align-items: stretch; gap: 12px; margin-top: 18px; flex-wrap: wrap; }
    .dbe-qty-stepper { display: inline-flex; align-items: stretch; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; background: #fff; height: 52px; }
    .dbe-qty-btn { width: 46px; border: 0; background: #f5f5f5; color: #333; font-size: 1.4rem; line-height: 1; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background .15s, color .15s; -webkit-user-select: none; user-select: none; }
    .dbe-qty-btn:hover { background: #e2401c; color: #fff; }
    .dbe-qty-btn:disabled { opacity: .4; cursor: not-allowed; background: #f5f5f5; color: #333; }
    .dbe-qty-stepper input.qty { width: 56px; border: 0; border-left: 1px solid #eee; border-right: 1px solid #eee; text-align: center; font-size: 1.05rem; font-weight: 600; color: #222; -moz-appearance: textfield; }
    .dbe-qty-stepper input.qty::-webkit-outer-spin-button, .dbe-qty-stepper input.qty::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
    .dbe-qty-stepper input.qty:focus { outline: none; }
    .dbe-add-btn { flex: 1 1 auto; min-width: 200px; display: inline-flex; align-items: center; justify-content: center; gap: 10px; background: #e2401c; color: #fff; border: 0; border-radius: 8px; padding: 14px 30px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: background .2s, transform .05s; }
    .dbe-add-btn:hover { background: #c5330f; }
    .dbe-add-btn:active { transform: scale(.98); }
    .dbe-add-btn:disabled { background: #bbb; cursor: not-allowed; }
    .dbe-add-btn svg { width: 20px; height: 20px; fill: currentColor; }
    .dbe-section { margin-top: 50px; }
    .dbe-section h2 { font-size: 1.4rem; font-weight: 700; margin-bottom: 18px; border-bottom: 2px solid #e2401c; display: inline-block; padding-bottom: 8px; }
    .dbe-desc { line-height: 1.7; color: #444; white-space: pre-line; }
    .dbe-tech { width: 100%; border-collapse: collapse; }
    .dbe-tech th, .dbe-tech td { border: 1px solid #eee; padding: 10px 14px; font-size: .92rem; text-align: left; }
    .dbe-tech th { background: #f7f7f7; width: 42%; font-weight: 600; }
    @media (max-width: 860px) { .dbe-product { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')



<div id="content" class="site-content" tabindex="-1">
    <div class="woostify-container">
        <div class="woocommerce">
            @php
                $gallery = $product->images_local;
                if (empty($gallery)) { $gallery = [$product->main_image_url]; }
            @endphp
            <div class="dbe-single">
                <div class="dbe-product">

                    {{-- Galerie --}}
                    <div class="dbe-product-gallery">
                        <div class="dbe-gallery-main">
                            <img id="dbe-main-img" src="{{ $gallery[0] }}" alt="{{ $product->name }}" data-index="0" onclick="dbeOpenLightbox(0)">
                            <span class="dbe-zoom-hint" title="Agrandir">🔍</span>
                        </div>
                        @if(count($gallery) > 1)
                            <div class="dbe-gallery-thumbs">
                                @foreach($gallery as $i => $img)
                                    <img src="{{ $img }}" class="dbe-thumb {{ $i === 0 ? 'active' : '' }}" alt="{{ $product->name }}" data-index="{{ $i }}"
                                         onclick="dbeSelectImage({{ $i }});">
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Lightbox / zoom --}}
                    <div id="dbe-lightbox" class="dbe-lightbox" aria-hidden="true">
                        <span id="dbe-lb-counter" class="dbe-lb-counter"></span>
                        <button type="button" class="dbe-lb-btn dbe-lb-close" onclick="dbeCloseLightbox()" aria-label="Fermer">&times;</button>
                        @if(count($gallery) > 1)
                            <button type="button" class="dbe-lb-btn dbe-lb-nav dbe-lb-prev" onclick="dbeNav(-1)" aria-label="Précédent">&#8249;</button>
                            <button type="button" class="dbe-lb-btn dbe-lb-nav dbe-lb-next" onclick="dbeNav(1)" aria-label="Suivant">&#8250;</button>
                        @endif
                        <div class="dbe-lightbox-stage" id="dbe-lb-stage">
                            <img id="dbe-lb-img" class="dbe-lightbox-img" src="" alt="{{ $product->name }}" draggable="false">
                        </div>
                        <div class="dbe-lb-zoom">
                            <button type="button" onclick="dbeZoom(-0.3)" aria-label="Dézoomer">&minus;</button>
                            <button type="button" onclick="dbeZoom(0.3)" aria-label="Zoomer">+</button>
                        </div>
                    </div>

                    @php $galleryJs = json_encode(array_values($gallery)); @endphp
                    <script>
                    (function () {
                        var images = {!! $galleryJs !!};
                        var current = 0, scale = 1, tx = 0, ty = 0;
                        var minScale = 1, maxScale = 5;
                        var lb = document.getElementById('dbe-lightbox');
                        var img = document.getElementById('dbe-lb-img');
                        var stage = document.getElementById('dbe-lb-stage');
                        var counter = document.getElementById('dbe-lb-counter');

                        function applyTransform() {
                            img.style.transform = 'translate(' + tx + 'px,' + ty + 'px) scale(' + scale + ')';
                            img.style.cursor = scale > 1 ? 'grab' : 'zoom-in';
                        }
                        function reset() { scale = 1; tx = 0; ty = 0; applyTransform(); }
                        function show(i) {
                            current = (i + images.length) % images.length;
                            img.src = images[current];
                            reset();
                            if (counter) counter.textContent = (current + 1) + ' / ' + images.length;
                        }

                        window.dbeSelectImage = function (i) {
                            var main = document.getElementById('dbe-main-img');
                            main.src = images[i];
                            main.setAttribute('data-index', i);
                            document.querySelectorAll('.dbe-thumb').forEach(function (t) { t.classList.remove('active'); });
                            var thumb = document.querySelector('.dbe-thumb[data-index="' + i + '"]');
                            if (thumb) thumb.classList.add('active');
                        };
                        window.dbeOpenLightbox = function (i) {
                            if (typeof i !== 'number') {
                                i = parseInt(document.getElementById('dbe-main-img').getAttribute('data-index') || '0', 10);
                            }
                            show(i);
                            lb.classList.add('open');
                            lb.setAttribute('aria-hidden', 'false');
                            document.body.style.overflow = 'hidden';
                        };
                        window.dbeCloseLightbox = function () {
                            lb.classList.remove('open');
                            lb.setAttribute('aria-hidden', 'true');
                            document.body.style.overflow = '';
                        };
                        window.dbeNav = function (d) { show(current + d); };
                        window.dbeZoom = function (delta) {
                            scale = Math.min(maxScale, Math.max(minScale, scale + delta));
                            if (scale === 1) { tx = 0; ty = 0; }
                            applyTransform();
                        };

                        // Molette pour zoomer
                        stage.addEventListener('wheel', function (e) {
                            if (!lb.classList.contains('open')) return;
                            e.preventDefault();
                            dbeZoom(e.deltaY < 0 ? 0.25 : -0.25);
                        }, { passive: false });

                        // Double-clic pour basculer le zoom
                        img.addEventListener('dblclick', function () {
                            scale = scale > 1 ? 1 : 2.5;
                            if (scale === 1) { tx = 0; ty = 0; }
                            applyTransform();
                        });

                        // Glisser pour se déplacer quand zoomé
                        var dragging = false, sx = 0, sy = 0;
                        img.addEventListener('mousedown', function (e) {
                            if (scale <= 1) return;
                            dragging = true; sx = e.clientX - tx; sy = e.clientY - ty;
                            img.classList.add('dragging'); e.preventDefault();
                        });
                        window.addEventListener('mousemove', function (e) {
                            if (!dragging) return;
                            tx = e.clientX - sx; ty = e.clientY - sy; applyTransform();
                        });
                        window.addEventListener('mouseup', function () {
                            dragging = false; img.classList.remove('dragging');
                        });

                        // Tactile : glisser pour déplacer
                        img.addEventListener('touchstart', function (e) {
                            if (scale <= 1 || e.touches.length !== 1) return;
                            dragging = true;
                            sx = e.touches[0].clientX - tx; sy = e.touches[0].clientY - ty;
                        }, { passive: true });
                        img.addEventListener('touchmove', function (e) {
                            if (!dragging || e.touches.length !== 1) return;
                            tx = e.touches[0].clientX - sx; ty = e.touches[0].clientY - sy; applyTransform();
                        }, { passive: true });
                        img.addEventListener('touchend', function () { dragging = false; });

                        // Clic sur le fond pour fermer
                        lb.addEventListener('click', function (e) {
                            if (e.target === lb || e.target === stage) dbeCloseLightbox();
                        });

                        // Clavier : Échap, flèches
                        document.addEventListener('keydown', function (e) {
                            if (!lb.classList.contains('open')) return;
                            if (e.key === 'Escape') dbeCloseLightbox();
                            else if (e.key === 'ArrowLeft' && images.length > 1) dbeNav(-1);
                            else if (e.key === 'ArrowRight' && images.length > 1) dbeNav(1);
                            else if (e.key === '+' || e.key === '=') dbeZoom(0.3);
                            else if (e.key === '-') dbeZoom(-0.3);
                        });
                    })();
                    </script>

                    {{-- Résumé / achat --}}
                    <div class="dbe-product-summary">
                        <h1 class="product_title entry-title">{{ $product->name }}</h1>

                        <p class="price"><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->price, 2, '.', ' ') }}&nbsp;<span class="woocommerce-Price-currencySymbol">€</span></bdi></span></p>

                        @if($product->stock_status === 'instock')
                            <div class="dbe-meta-line"><span class="dbe-stock-in">En stock</span></div>
                        @elseif($product->stock_status === 'outofstock')
                            <div class="dbe-meta-line"><span class="dbe-stock-out">Agotado</span></div>
                        @else
                            <div class="dbe-meta-line">Bajo pedido</div>
                        @endif

                        @if($product->sku)
                           
                        @endif
                        @if($product->category)
                            <div class="dbe-meta-line">Categoría:
                                <a href="{{ url('/' . $product->category->slug) }}">{{ $product->category->name }}</a>
                            </div>
                        @endif

                          <!-- @if($product->short_description)
                             <div class="dbe-meta-line">{{ $product->short_description }}</div>
                            @endif -->

                        <ul class="dbe-delivery">
                            <li>📦 Preparación del pedido: de 1 a 3 días</li>
                            <li>🚚 Entrega: de 1 a 14 días</li>
                            <li>🔒 Pago seguro</li>
                            <li>🧾 Factura de venta</li>
                        </ul>

                        <div class="dbe-cart-form">
                            <div class="dbe-qty-stepper">
                                <button type="button" class="dbe-qty-btn" onclick="dbeQtyChange(-1)" aria-label="Disminuir cantidad">&minus;</button>
                                <input type="number" id="dbe-qty" class="qty" name="quantity" value="1" min="1" step="1" aria-label="Cantidad"
                                       oninput="dbeQtyClamp()">
                                <button type="button" class="dbe-qty-btn" onclick="dbeQtyChange(1)" aria-label="Aumentar cantidad">+</button>
                            </div>
                            <button type="button" class="dbe-add-btn single_add_to_cart_button"
                                    @if($product->stock_status === 'outofstock') disabled @endif
                                    data-add-to-cart
                                    data-qty-target="#dbe-qty"
                                    data-slug="{{ $product->slug }}"
                                    data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}"
                                    data-image="{{ $product->main_image_url }}"
                                    data-url="{{ route('product.show', $product->slug) }}">
                                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zM7.17 14.75l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49a1 1 0 0 0-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C3.52 15.37 4.48 17 6 17h12v-2H7.42a.25.25 0 0 1-.25-.25z"/></svg>
                                @if($product->stock_status === 'outofstock')
                                    Agotado
                                @else
                                    Añadir al carrito
                                @endif
                            </button>
                        </div>

                        <script>
                        function dbeQtyChange(d) {
                            var el = document.getElementById('dbe-qty');
                            var v = parseInt(el.value, 10); if (isNaN(v)) v = 1;
                            v += d; if (v < 1) v = 1;
                            el.value = v;
                        }
                        function dbeQtyClamp() {
                            var el = document.getElementById('dbe-qty');
                            var v = parseInt(el.value, 10);
                            if (isNaN(v) || v < 1) el.value = 1;
                        }
                        </script>
                    </div>
                </div>

                {{-- Description --}}
                @if($product->description)
                    <div class="dbe-section">
                        <h2>Descripción</h2>
                        <div class="dbe-desc">{{ $product->description }}</div>
                    </div>
                @endif

                {{-- Détails techniques --}}
                @if(!empty($product->technical_details_array))
                    <div class="dbe-section">
                        <h2>Detalles técnicos</h2>
                        <table class="dbe-tech">
                            <tbody>
                                @foreach($product->technical_details_array as $key => $value)
                                    <tr>
                                        <th>{{ $key }}</th>
                                        <td>{{ is_array($value) ? implode(', ', $value) : $value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                {{-- Produits relacionados --}}
                @if($relatedProducts->isNotEmpty())
                    <div class="dbe-section">
                        <section class="related products">
                            <h2>Productos relacionados</h2>
                            <div class="woocommerce columns-5 ">
                                <ul class="products columns-5 tablet-columns-3 mobile-columns-2" style="display:grid;grid-template-columns:repeat(5,1fr);gap:20px;list-style:none;padding:0;margin:0;">
                                    @foreach($relatedProducts as $related)
                                        <li class="product type-product status-publish instock has-post-thumbnail shipping-taxable purchasable product-type-simple" style="width:auto;margin:0;float:none;">
                                            <div class="product-loop-wrapper">
                                                <div class="product-loop-image-wrapper" style="aspect-ratio:1/1;">
                                                    <a href="{{ route('product.show', $related->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                        <img loading="lazy" width="300" height="300" src="{{ $related->main_image_url }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail product-loop-image" alt="{{ $related->name }}" style="width:100%;height:100%;object-fit:contain;"></a>
                                                </div>
                                                <div class="product-loop-content text-center">
                                                    <h2 class="woocommerce-loop-product__title">
                                                        <a href="{{ route('product.show', $related->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $related->name }}</a>
                                                    </h2>
                                                    <div class="product-loop-meta no-transform">
                                                        <div class="animated-meta"> <span class="price"><span class="woocommerce-Price-amount amount">{{ number_format($related->price, 2, '.', ' ') }}&nbsp;<span class="woocommerce-Price-currencySymbol">€</span></span></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
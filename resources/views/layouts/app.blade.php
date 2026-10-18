<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<title>{!! trim(View::yieldContent('title') . ' - ' . config('app.name')) !!}</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- CSS crítico anti-FOUC: fija el estado inicial del menú móvil antes de
         que carguen las hojas de estilo externas, para que no aparezca un
         "flash" del menú lateral ni de sus flechas al cargar la página. --}}
    <style>
        /* El menú lateral móvil arranca fuera de la pantalla. */
        .sidebar-menu {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 90%;
            z-index: 200;
            transform: translateX(-100%);
        }
        /* El overlay arranca oculto. */
        #woostify-overlay {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        /* En escritorio: nada de menú móvil, flechas móviles ni botón hamburguesa. */
        @media (min-width: 992px) {
            .primary-navigation.primary-mobile-navigation,
            .primary-navigation.categories-mobile-menu,
            .mobile-nav-tab,
            .wrap-toggle-sidebar-menu {
                display: none !important;
            }
        }
        /* En móvil: el menú/búsqueda en línea de la cabecera permanecen ocultos
           (solo se usan dentro del menú lateral). */
        @media (max-width: 991px) {
            .site-header-inner .site-navigation,
            .site-header-inner .site-search {
                display: none;
            }
        }
    </style>

  {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- Swiper (sliders) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bdt-uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ep-advanced-icon-box.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ep-font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ep-helper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ep-wc-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/widget-form.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/frontend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/widget-google_maps.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/widget-heading.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/widget-icon-list.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ekiticons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/widget-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/phosphor-light.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/wppagebuilder.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/wc-blocks.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/photoswipe-video.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-2872.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-2880.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-2951.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3003.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3022.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3028.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3067.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3086.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3091.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3095.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3105.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3110.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3130.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3281.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-3297.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post-6.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic&display=fallback&ver=2.5.1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sarabun:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&display=swap">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link rel='stylesheet' id='woostify-fonts-css' href='https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic&amp;display=fallback&amp;ver=2.5.1' media='all' />

    {{-- ===== Panier / recherche (localStorage) ===== --}}
    <style>
        /* Toast */
        .dbe-toast{position:fixed;right:24px;bottom:24px;background:#222;color:#fff;padding:14px 20px;border-radius:8px;z-index:99999;box-shadow:0 8px 24px rgba(0,0,0,.25);opacity:0;transform:translateY(12px);transition:all .3s ease;font-size:.95rem;max-width:320px;}
        .dbe-toast.show{opacity:1;transform:translateY(0);}

        /* Barre de recherche dans le header */
        #dbe-search-form{position:absolute;top:100%;right:0;display:flex;background:#fff;border:1px solid #e2e2e2;border-radius:6px;box-shadow:0 10px 30px rgba(0,0,0,.12);padding:8px;gap:8px;z-index:9999;width:340px;max-width:90vw;opacity:0;visibility:hidden;transform:translateY(-8px);transition:all .2s ease;}
        #dbe-search-form.open{opacity:1;visibility:visible;transform:translateY(6px);}
        #dbe-search-form input[name="q"]{flex:1;border:1px solid #ddd;border-radius:4px;padding:8px 12px;font-size:.95rem;outline:none;}
        #dbe-search-form button{background:#e2401c;color:#fff;border:0;border-radius:4px;padding:0 16px;cursor:pointer;font-size:.95rem;}
        .site-tools{position:relative;}

        /* Boutons génériques */
        .dbe-btn{display:inline-block;background:#e2401c;color:#fff !important;padding:12px 24px;border-radius:6px;text-decoration:none;font-weight:600;border:0;cursor:pointer;transition:opacity .2s;}
        .dbe-btn:hover{opacity:.9;}
        .dbe-btn-light{background:#f2f2f2;color:#333 !important;}

        /* Page panier */
        .dbe-cart-wrap{max-width:1140px;margin:0 auto;padding:40px 16px 60px;}
        .dbe-cart-wrap h1{font-size:1.8rem;font-weight:700;margin-bottom:24px;}
        .dbe-cart-table{width:100%;border-collapse:collapse;margin-bottom:24px;}
        .dbe-cart-table th,.dbe-cart-table td{padding:14px 12px;border-bottom:1px solid #eee;text-align:left;vertical-align:middle;}
        .dbe-cart-table th{font-weight:600;color:#666;font-size:.85rem;text-transform:uppercase;}
        .dbe-cart-prod{display:flex;align-items:center;gap:14px;}
        .dbe-cart-prod a{color:#222;text-decoration:none;font-weight:600;}
        .dbe-cart-thumb{width:64px;height:64px;object-fit:contain;background:#fafafa;border:1px solid #eee;border-radius:6px;}
        .dbe-qty{width:70px;padding:8px;border:1px solid #ddd;border-radius:4px;text-align:center;}
        .dbe-remove{background:none;border:0;color:#e2401c;font-size:1.6rem;line-height:1;cursor:pointer;}
        .dbe-cart-summary{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;border-top:2px solid #222;padding-top:20px;}
        .dbe-cart-total{font-size:1.3rem;}
        .dbe-cart-actions{display:flex;gap:12px;flex-wrap:wrap;}
        .dbe-cart-empty{text-align:center;padding:60px 0;}
        .dbe-cart-empty p{font-size:1.1rem;margin-bottom:20px;color:#666;}
        @media(max-width:600px){.dbe-cart-table thead{display:none;}.dbe-cart-table,.dbe-cart-table tbody,.dbe-cart-table tr,.dbe-cart-table td{display:block;width:100%;}.dbe-cart-table tr{border:1px solid #eee;border-radius:8px;margin-bottom:14px;padding:8px;}.dbe-cart-table td{border:0;padding:8px;}}

        /* ===== Panneau panier autonome (#dbe-cart-panel) ===== */
        #dbe-cart-overlay{position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:2147483646;opacity:0;visibility:hidden;transition:opacity .3s ease;}
        #dbe-cart-overlay.open{opacity:1;visibility:visible;}
        #dbe-cart-panel{position:fixed;top:0;right:0;width:380px;max-width:90vw;height:100%;background:#fff;z-index:2147483647;box-shadow:-6px 0 24px rgba(0,0,0,.18);transform:translateX(100%);transition:transform .3s ease;display:flex;flex-direction:column;}
        #dbe-cart-panel.open{transform:translateX(0);}
        #dbe-cart-panel .dbe-panel-head{display:flex;align-items:center;gap:10px;padding:18px 20px;border-bottom:1px solid #eee;flex:0 0 auto;}
        #dbe-cart-panel .dbe-panel-head h4{font-size:1.1rem;font-weight:700;margin:0;flex:1;}
        #dbe-cart-panel .dbe-panel-head .shop-cart-count{background:#e2401c;color:#fff;border-radius:50%;min-width:22px;height:22px;display:inline-flex;align-items:center;justify-content:center;font-size:.8rem;padding:0 6px;}
        #dbe-cart-panel .dbe-panel-close{background:none;border:0;cursor:pointer;font-size:1.6rem;line-height:1;color:#333;padding:0 4px;}
        #dbe-cart-panel .dbe-panel-content{flex:1 1 auto;display:flex;flex-direction:column;overflow:hidden;}
        #dbe-cart-panel .dbe-mini-list{flex:1 1 auto;overflow-y:auto;padding:8px 20px;}
        #dbe-cart-panel .dbe-panel-empty{text-align:center;padding:50px 20px;color:#666;}
        #dbe-cart-panel .dbe-panel-empty p{margin-bottom:18px;}
        .dbe-mini-item{display:flex;gap:12px;padding:14px 0;border-bottom:1px solid #f0f0f0;align-items:center;}
        .dbe-mini-item img{width:60px;height:60px;object-fit:contain;background:#fafafa;border:1px solid #eee;border-radius:6px;flex:0 0 auto;}
        .dbe-mini-item .dbe-mini-info{flex:1;font-size:.88rem;min-width:0;}
        .dbe-mini-item .dbe-mini-info a{color:#222;text-decoration:none;font-weight:600;display:block;margin-bottom:4px;}
        .dbe-mini-item .dbe-mini-price{color:#e2401c;font-weight:600;}
        .dbe-mini-item .dbe-mini-remove{background:none;border:0;color:#999;font-size:1.3rem;cursor:pointer;line-height:1;flex:0 0 auto;}
        #dbe-cart-panel .dbe-mini-foot{padding:18px 20px;border-top:1px solid #eee;flex:0 0 auto;background:#fff;}
        .dbe-mini-total{display:flex;justify-content:space-between;font-size:1.05rem;margin-bottom:14px;font-weight:700;}
        #dbe-cart-panel .dbe-mini-foot .dbe-btn{display:block;text-align:center;margin-bottom:10px;}
    </style>


    <svg style="display: none">
        <filter
            id="bdt-frosted"
            x="0%"
            y="0%"
            width="100%"
            height="100%"
            filterUnits="objectBoundingBox">
            <feTurbulence
                type="fractalNoise"
                baseFrequency="0.01 0.01"
                numOctaves="1"
                seed="5"
                result="turbulence" />
            <!-- Seeds: 14, 17,  -->

            <feComponentTransfer in="turbulence" result="mapped">
                <feFuncR type="gamma" amplitude="1" exponent="10" offset="0.5" />
                <feFuncG type="gamma" amplitude="0" exponent="1" offset="0" />
                <feFuncB type="gamma" amplitude="0" exponent="1" offset="0.5" />
            </feComponentTransfer>

            <feGaussianBlur in="turbulence" stdDeviation="3" result="softMap" />

            <feSpecularLighting
                in="softMap"
                surfaceScale="5"
                specularConstant="1"
                specularExponent="100"
                lighting-color="white"
                result="specLight">
                <fePointLight x="-200" y="-200" z="300" />
            </feSpecularLighting>

            <feComposite
                in="specLight"
                operator="arithmetic"
                k1="0"
                k2="1"
                k3="1"
                k4="0"
                result="litImage" />

            <feDisplacementMap
                in="SourceGraphic"
                in2="softMap"
                scale="150"
                xChannelSelector="R"
                yChannelSelector="G" />
        </filter>
    </svg>

    <link rel="icon" href="{{asset('assets/images/logo.png') }}" sizes="32x32" />
    <link rel="icon" href="{{asset('assets/images/logo.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
      @stack('styles')
</head>

<body class="home wp-singular page-template-default page page-id-2872 wp-custom-logo wp-embed-responsive wp-theme-woostify theme-woostify woocommerce-no-js site-full-width-stretched-container has-header-layout-1 no-sidebar has-gallery-slider-layout hid-skus hid-categories hid-tags ajax-single-add-to-cart elementor-default elementor-kit-6 elementor-page elementor-page-2872">



    @include('layouts.partials.navbar.public')
    <main>
        @yield('content')
    </main>
    @include('layouts.partials.footer.public')


     {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Swiper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    {{-- Phosphor Icons --}}
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
    
    {{-- Ionicons --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    

    <script src="{{ asset('assets/js/bdt-uikit.min.js') }}"></script>
    <script src="{{ asset('assets/js/helper.min.js') }}"></script>
    <script src="{{ asset('assets/js/ep-advanced-icon-box.min.js') }}"></script>
    <script src="{{ asset('assets/js/ep-woocommerce.min.js') }}"></script>
    <script src="{{ asset('assets/js/elements-handlers.min.js') }}"></script>
    <script src="{{ asset('assets/js/webpack-pro.runtime.min.js') }}"></script>
    <script src="{{ asset('assets/js/frontend-modules.min.js') }}"></script>
    <script src="{{ asset('assets/js/webpack.runtime.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/elementor.js') }}"></script>
    <script src="{{ asset('assets/js/widget-scripts.js') }}"></script>
    <script src="{{ asset('assets/js/googlesitekit-consent-mode-da15714e8829855bb7ce.js') }}"></script>
    <script src="{{ asset('assets/js/googlesitekit-events-provider-woocommerce-a5f72561d6cdf416147d.js') }}"></script>
    <script src="{{ asset('assets/js/add-to-cart-variation.min.js') }}"></script>
    <script src="{{ asset('assets/js/add-to-cart.min.js') }}"></script>
   

    <script src="{{ asset('assets/js/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('assets/js/js.cookie.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/js/sourcebuster.min.js') }}"></script>
    <script src="{{ asset('assets/js/arrive.min.js') }}"></script>
    <script src="{{ asset('assets/js/easyzoom.min.js') }}"></script>

    <script src="{{ asset('assets/js/lity.min.js') }}"></script>
    <script src="{{ asset('assets/js/navigation.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-single-add-to-cart.min.js') }}"></script>
    <script src="{{ asset('assets/js/easyzoom-handle.min.js') }}"></script>
    <script src="{{ asset('assets/js/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/product-images.min.js') }}"></script>
    <script src="{{ asset('assets/js/product-variation.min.js') }}"></script>
    <script src="{{ asset('assets/js/quantity-button.min.js') }}"></script>
    <script src="{{ asset('assets/js/woocommerce-sidebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/hooks.min.js') }}"></script>
    <script src="{{ asset('assets/js/i18n.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/underscore.min.js') }}"></script>
    <script src="{{ asset('assets/js/wp-util.min.js') }}"></script>
    <script>
        window.DBE_ROUTES = {
            cart: "{{ route('cart') }}",
            contact: "{{ route('contacto') }}",
            home: "{{ route('home') }}",
            checkout: "{{ route('checkout') }}"
        };
    </script>
    <script src="{{ asset('assets/js/shop.js') }}?v=6"></script>
    @stack('scripts')

</body>

</html>
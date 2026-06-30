<div class="topbar">
    <div class="woostify-container">
        <div class="topbar-item topbar-left">nom-domaine</div>
        <div class="topbar-item topbar-center"></div>
        <div class="topbar-item topbar-right">Contacto@nom-domaine.com</div>
    </div>
</div>

<header id="masthead" class="site-header header-layout-1">
    <div class="site-header-inner">
        <div class="woostify-container">
            <a class="skip-link screen-reader-text" href="#site-navigation">Saltar a la navegación</a>
            <a class="skip-link screen-reader-text" href="#content">Saltar al contenido</a>
            
            <div class="wrap-toggle-sidebar-menu">
                <span class="toggle-sidebar-menu-btn woostify-icon-bar">
                    <span></span>
                </span>
            </div>
            
            <div class="site-branding">
                <a href="{{ route('home') }}" class="custom-logo-link" rel="home" aria-current="page">
                    <img width="1188" height="475" src="{{ asset('assets/images/logo.png') }}" class="custom-logo" alt="nom-domaine" />
                </a>
            </div>

            <div class="site-navigation">
                <nav class="main-navigation" data-menu="main" aria-label="Navegación principal">
                    {{-- Menu Mobile --}}
                    <ul id="menu-01" class="primary-navigation primary-mobile-navigation">
                        <li class="menu-item {{ request()->routeIs('home') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('home') }}"><span class="menu-item-text">nom-domaine</span></a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('category.transpaletas') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('category.transpaletas') }}"><span class="menu-item-text">Transpaletas</span></a>
                        </li>
                        <li class="menu-item menu-item-has-children {{ request()->routeIs('category.carros-transporte') || request()->routeIs('category.carretillas') ? 'current-menu-item' : '' }}">
                            <a href="#"><span class="menu-item-text">Carretillas</span>
                                <span class="menu-item-arrow arrow-icon">
                                    <span class="woostify-svg-icon icon-angle-down">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                            <path d="M16.354 5.075l-7.855 7.854-7.853-7.854 0.707-0.707 7.145 7.146 7.148-7.147 0.708 0.708z" fill="#000000" />
                                        </svg>
                                    </span>
                                </span>
                            </a>
                            <ul class="sub-menu">
                                <li class="menu-item {{ request()->routeIs('category.carros-transporte') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.carros-transporte') }}"><span class="menu-item-text">Carros de transporte</span></a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('category.carretillas') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.carretillas') }}"><span class="menu-item-text">Carretillas elevadoras</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children {{ request()->routeIs(['category.elevadores', 'category.salvaescaleras', 'category.plataformas', 'category.mesas', 'category.apiladores']) ? 'current-menu-item' : '' }}">
                            <a href="#"><span class="menu-item-text">Otros</span>
                                <span class="menu-item-arrow arrow-icon">
                                    <span class="woostify-svg-icon icon-angle-down">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                            <path d="M16.354 5.075l-7.855 7.854-7.853-7.854 0.707-0.707 7.145 7.146 7.148-7.147 0.708 0.708z" fill="#000000" />
                                        </svg>
                                    </span>
                                </span>
                            </a>
                            <ul class="sub-menu">
                                <li class="menu-item {{ request()->routeIs('category.elevadores') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.elevadores') }}"><span class="menu-item-text">Elevadores con cesta</span></a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('category.salvaescaleras') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.salvaescaleras') }}"><span class="menu-item-text">Carro salvaescaleras</span></a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('category.plataformas') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.plataformas') }}"><span class="menu-item-text">Plataformas de tijera</span></a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('category.mesas') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.mesas') }}"><span class="menu-item-text">Mesas elevadoras</span></a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('category.apiladores') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.apiladores') }}"><span class="menu-item-text">Apiladores de gran elevación</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item {{ request()->routeIs('category.miniexcavadora') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('category.miniexcavadora') }}"><span class="menu-item-text">Miniexcavadora</span></a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('category.minilifts') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('category.minilifts') }}"><span class="menu-item-text">Minilifts</span></a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('contacto') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('contacto') }}"><span class="menu-item-text">Contacto</span></a>
                        </li>
                    </ul>
                    
                    {{-- Menu Desktop --}}
                    <ul id="menu-2" class="primary-navigation">
                        <li class="menu-item {{ request()->routeIs('home') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('home') }}"><span class="menu-item-text">nom-domaine</span></a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('category.transpaletas') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('category.transpaletas') }}"><span class="menu-item-text">Transpaletas</span></a>
                        </li>
                        <li class="menu-item menu-item-has-children {{ request()->routeIs('category.carros-transporte') || request()->routeIs('category.carretillas') ? 'current-menu-item' : '' }}">
                            <a href="#"><span class="menu-item-text">Carretillas</span>
                                <span class="menu-item-arrow arrow-icon">
                                    <span class="woostify-svg-icon icon-angle-down">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                            <path d="M16.354 5.075l-7.855 7.854-7.853-7.854 0.707-0.707 7.145 7.146 7.148-7.147 0.708 0.708z" fill="#000000" />
                                        </svg>
                                    </span>
                                </span>
                            </a>
                            <ul class="sub-menu">
                                <li class="menu-item {{ request()->routeIs('category.carros-transporte') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.carros-transporte') }}"><span class="menu-item-text">Carros de transporte</span></a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('category.carretillas') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.carretillas') }}"><span class="menu-item-text">Carretillas elevadoras</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children {{ request()->routeIs(['category.elevadores', 'category.salvaescaleras', 'category.plataformas', 'category.mesas', 'category.apiladores']) ? 'current-menu-item' : '' }}">
                            <a href="#"><span class="menu-item-text">Otros</span>
                                <span class="menu-item-arrow arrow-icon">
                                    <span class="woostify-svg-icon icon-angle-down">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                            <path d="M16.354 5.075l-7.855 7.854-7.853-7.854 0.707-0.707 7.145 7.146 7.148-7.147 0.708 0.708z" fill="#000000" />
                                        </svg>
                                    </span>
                                </span>
                            </a>
                            <ul class="sub-menu">
                                <li class="menu-item {{ request()->routeIs('category.elevadores') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.elevadores') }}"><span class="menu-item-text">Elevadores con cesta</span></a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('category.salvaescaleras') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.salvaescaleras') }}"><span class="menu-item-text">Carro salvaescaleras</span></a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('category.plataformas') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.plataformas') }}"><span class="menu-item-text">Plataformas de tijera</span></a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('category.mesas') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.mesas') }}"><span class="menu-item-text">Mesas elevadoras</span></a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('category.apiladores') ? 'current-menu-item' : '' }}">
                                    <a href="{{ route('category.apiladores') }}"><span class="menu-item-text">Apiladores de gran elevación</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item {{ request()->routeIs('category.miniexcavadora') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('category.miniexcavadora') }}"><span class="menu-item-text">Miniexcavadora</span></a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('category.minilifts') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('category.minilifts') }}"><span class="menu-item-text">Minilifts</span></a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('contacto') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('contacto') }}"><span class="menu-item-text">Contacto</span></a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="site-tools">
                <span class="tools-icon header-search-icon" role="button" tabindex="0" aria-label="Buscar">
                    <span class="woostify-svg-icon icon-search">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                            <path d="M16.604 15.868l-5.173-5.173c0.975-1.137 1.569-2.611 1.569-4.223 0-3.584-2.916-6.5-6.5-6.5-1.736 0-3.369 0.676-4.598 1.903-1.227 1.228-1.903 2.861-1.902 4.597 0 3.584 2.916 6.5 6.5 6.5 1.612 0 3.087-0.594 4.224-1.569l5.173 5.173 0.707-0.708zM6.5 11.972c-3.032 0-5.5-2.467-5.5-5.5-0.001-1.47 0.571-2.851 1.61-3.889 1.038-1.039 2.42-1.611 3.89-1.611 3.032 0 5.5 2.467 5.5 5.5 0 3.032-2.468 5.5-5.5 5.5z" fill="#000000" />
                        </svg>
                    </span>
                </span>

                <form id="dbe-search-form" action="{{ route('search') }}" method="GET" role="search">
                    <input type="search" name="q" placeholder="Buscar productos..." value="{{ request('q') }}" aria-label="Buscar productos">
                    <button type="submit">Buscar</button>
                </form>

                <a href="{{ route('cart') }}" id="dbe-cart-trigger" class="tools-icon shopping-bag-button shopping-cart">
                    <span class="woostify-svg-icon icon-shopping-cart-2">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                            <path d="m 14.176,12.5 c 0.965,0 1.75,0.785 1.75,1.75 0,0.965 -0.785,1.75 -1.75,1.75 -0.965,0 -1.75,-0.785 -1.75,-1.75 0,-0.965 0.785,-1.75 1.75,-1.75 z m 0,2.5 c 0.414,0 0.75,-0.337 0.75,-0.75 0,-0.413 -0.336,-0.75 -0.75,-0.75 -0.414,0 -0.75,0.337 -0.75,0.75 0,0.413 0.336,0.75 0.75,0.75 z m -8.5,-2.5 c 0.965,0 1.75,0.785 1.75,1.75 0,0.965 -0.785,1.75 -1.75,1.75 -0.965,0 -1.75,-0.785 -1.75,-1.75 0,-0.965 0.785,-1.75 1.75,-1.75 z m 0,2.5 c 0.414,0 0.75,-0.337 0.75,-0.75 0,-0.413 -0.336,-0.75 -0.75,-0.75 -0.414,0 -0.75,0.337 -0.75,0.75 0,0.413 0.336,0.75 0.75,0.75 z M 3.555,2 3.857,4 H 17 l -1.118,8.036 H 3.969 L 2.931,4.573 2.695,3 H -0.074 V 2 Z M 4,5 4.139,6 H 15.713 L 15.852,5 Z M 15.012,11.036 15.573,7 H 4.278 l 0.561,4.036 z" fill="#000000" />
                        </svg>
                    </span>
                    <span class="shop-cart-count">0</span>
                </a>
            </div>
        </div>
    </div>
</header>
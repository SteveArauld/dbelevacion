/* ============================================================
   Dbelevacion - Panier & recherche (100% localStorage)
   Panneau autonome injecté dans <body> : aucune dépendance au thème.
   ============================================================ */
(function () {
    'use strict';

    var CART_KEY = 'dbe_cart';

    /* ---------- Stockage ---------- */
    function getCart() {
        try { return JSON.parse(localStorage.getItem(CART_KEY)) || []; }
        catch (e) { return []; }
    }
    function saveCart(cart) {
        localStorage.setItem(CART_KEY, JSON.stringify(cart));
        refreshUI();
    }

    /* ---------- Utilitaires ---------- */
    function routes() { return window.DBE_ROUTES || { cart: '#', contact: '#', home: '/', checkout: '#' }; }
    function formatPrice(v) {
        return (parseFloat(v) || 0).toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' €';
    }
    function priceHtml(v) {
        return '<span class="woocommerce-Price-amount amount"><bdi>' +
            (parseFloat(v) || 0).toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) +
            '&nbsp;<span class="woocommerce-Price-currencySymbol">€</span></bdi></span>';
    }
    function cartCount() { return getCart().reduce(function (s, it) { return s + (parseInt(it.qty, 10) || 0); }, 0); }
    function cartTotal() { return getCart().reduce(function (s, it) { return s + (parseFloat(it.price) || 0) * (parseInt(it.qty, 10) || 0); }, 0); }

    /* ---------- Actions panier ---------- */
    function addToCart(product, qty) {
        qty = parseInt(qty, 10) || 1;
        var cart = getCart();
        var ex = cart.find(function (it) { return it.slug === product.slug; });
        if (ex) { ex.qty += qty; }
        else {
            cart.push({
                slug: product.slug, name: product.name,
                price: parseFloat(product.price) || 0,
                image: product.image || '', url: product.url || '#', qty: qty
            });
        }
        saveCart(cart);
        showToast(product.name + ' añadido al carrito');
    }
    function removeItem(slug) {
        saveCart(getCart().filter(function (it) { return it.slug !== slug; }));
    }
    function setQty(slug, qty) {
        qty = parseInt(qty, 10);
        if (isNaN(qty) || qty < 1) qty = 1;
        var cart = getCart();
        var it = cart.find(function (i) { return i.slug === slug; });
        if (it) { it.qty = qty; saveCart(cart); }
    }

    /* ---------- Toast ---------- */
    function showToast(msg) {
        var t = document.createElement('div');
        t.className = 'dbe-toast';
        t.textContent = msg;
        document.body.appendChild(t);
        requestAnimationFrame(function () { t.classList.add('show'); });
        setTimeout(function () { t.classList.remove('show'); setTimeout(function () { t.remove(); }, 300); }, 2200);
    }

    /* ===================================================================
       PANNEAU PANIER (slide-in) — construit entièrement en JS dans <body>
       =================================================================== */
    function ensurePanel() {
        if (document.getElementById('dbe-cart-panel')) return;

        var overlay = document.createElement('div');
        overlay.id = 'dbe-cart-overlay';

        var panel = document.createElement('div');
        panel.id = 'dbe-cart-panel';
        panel.innerHTML =
            '<div class="dbe-panel-head">' +
                '<h4>Carrito de la compra</h4>' +
                '<span class="shop-cart-count">0</span>' +
                '<button type="button" class="dbe-panel-close" aria-label="Cerrar">&times;</button>' +
            '</div>' +
            '<div class="dbe-panel-content"></div>';

        document.body.appendChild(overlay);
        document.body.appendChild(panel);

        overlay.addEventListener('click', closeCartPanel);
        panel.querySelector('.dbe-panel-close').addEventListener('click', closeCartPanel);
    }

    function openCartPanel() {
        ensurePanel();
        renderPanel();
        document.getElementById('dbe-cart-panel').classList.add('open');
        document.getElementById('dbe-cart-overlay').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeCartPanel() {
        var p = document.getElementById('dbe-cart-panel');
        var o = document.getElementById('dbe-cart-overlay');
        if (p) p.classList.remove('open');
        if (o) o.classList.remove('open');
        document.body.style.overflow = '';
    }

    function renderPanel() {
        var panel = document.getElementById('dbe-cart-panel');
        if (!panel) return;
        var content = panel.querySelector('.dbe-panel-content');
        var r = routes();
        var cart = getCart();

        if (!cart.length) {
            content.innerHTML = '<div class="dbe-panel-empty"><p>No hay productos en el carrito.</p>' +
                '<a class="dbe-btn" href="' + r.home + '">Seguir comprando</a></div>';
            return;
        }

        var items = cart.map(function (it) {
            return '<div class="dbe-mini-item">' +
                '<img src="' + it.image + '" alt="">' +
                '<div class="dbe-mini-info">' +
                    '<a href="' + it.url + '">' + it.name + '</a>' +
                    '<span class="dbe-mini-price">' + it.qty + ' × ' + formatPrice(it.price) + '</span>' +
                '</div>' +
                '<button type="button" class="dbe-mini-remove" data-slug="' + it.slug + '" aria-label="Eliminar">&times;</button>' +
            '</div>';
        }).join('');

        content.innerHTML =
            '<div class="dbe-mini-list">' + items + '</div>' +
            '<div class="dbe-mini-foot">' +
                '<div class="dbe-mini-total"><span>Total</span><span>' + formatPrice(cartTotal()) + '</span></div>' +
                '<a class="dbe-btn" href="' + r.checkout + '">Finalizar compra</a>' +
                '<a class="dbe-btn dbe-btn-light" href="' + r.cart + '">Ver carrito</a>' +
            '</div>';

        content.querySelectorAll('.dbe-mini-remove').forEach(function (b) {
            b.addEventListener('click', function () { removeItem(this.dataset.slug); });
        });
    }

    /* ---------- Badge + rafraîchissement ---------- */
    function updateCartBadge() {
        var c = cartCount();
        document.querySelectorAll('.shop-cart-count').forEach(function (el) { el.textContent = c; });
    }
    function refreshUI() {
        updateCartBadge();
        renderPanel();
        renderCartPage();
        renderCheckout();
    }

    /* ===================================================================
       PAGE CHECKOUT (/commander) — récap commande + données panier
       =================================================================== */
    function renderCheckout() {
        var tbody = document.getElementById('review-items');
        if (!tbody) return; // pas sur la page checkout

        var tfoot = document.getElementById('review-foot');
        var emptyBox = document.getElementById('checkout-empty');
        var form = document.getElementById('checkout-form');
        var hidden = document.getElementById('cart_data');
        var cart = getCart();

        // Mémoriser le panier dans le champ caché
        if (hidden) hidden.value = JSON.stringify(cart);

        if (!cart.length) {
            if (emptyBox) emptyBox.style.display = '';
            if (form) form.style.display = 'none';
            return;
        }
        if (emptyBox) emptyBox.style.display = 'none';
        if (form) form.style.display = '';

        tbody.innerHTML = cart.map(function (it) {
            return '<tr class="cart_item">' +
                '<td class="product-name">' + it.name + '&nbsp;<strong class="product-quantity">×&nbsp;' + it.qty + '</strong></td>' +
                '<td class="product-total">' + priceHtml(it.price * it.qty) + '</td>' +
            '</tr>';
        }).join('');

        if (tfoot) {
            tfoot.innerHTML =
                '<tr class="cart-subtotal"><th>Subtotal</th><td>' + priceHtml(cartTotal()) + '</td></tr>' +
                '<tr class="woocommerce-shipping-totals shipping"><th>Envío</th><td>Envío gratuito</td></tr>' +
                '<tr class="order-total"><th>Total</th><td><strong>' + priceHtml(cartTotal()) + '</strong></td></tr>';
        }
    }

    /* ===================================================================
       PAGE PANIER (/carrito) — style WooCommerce
       =================================================================== */
    function renderCartPage() {
        var root = document.getElementById('cart-root');
        if (!root) return;

        var cart = getCart();
        var home = root.dataset.home || '/';
        var checkout = root.dataset.checkout || '#';

        if (!cart.length) {
            root.innerHTML = '<div class="dbe-cart-empty"><p>Su carrito está vacío.</p>' +
                '<a href="' + home + '" class="checkout-button" style="display:inline-block;">Seguir comprando</a></div>';
            return;
        }

        var rows = cart.map(function (it) {
            return '<tr class="woocommerce-cart-form__cart-item cart_item" data-slug="' + it.slug + '">' +
                '<td class="product-remove"><a role="button" class="remove dbe-remove" data-slug="' + it.slug + '" aria-label="Eliminar">&times;</a></td>' +
                '<td class="product-thumbnail"><a href="' + it.url + '"><img src="' + it.image + '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""></a></td>' +
                '<td class="product-name" data-title="Producto"><a href="' + it.url + '">' + it.name + '</a></td>' +
                '<td class="product-price" data-title="Precio"><span class="price-val">' + priceHtml(it.price) + '</span></td>' +
                '<td class="product-quantity" data-title="Cantidad"><div class="dbe-qty-stepper">' +
                    '<button type="button" class="dbe-qty-btn dbe-qty-dec" data-slug="' + it.slug + '" aria-label="Disminuir">&minus;</button>' +
                    '<input type="number" class="input-text qty text dbe-qty" data-slug="' + it.slug + '" value="' + it.qty + '" min="1" step="1" inputmode="numeric">' +
                    '<button type="button" class="dbe-qty-btn dbe-qty-inc" data-slug="' + it.slug + '" aria-label="Aumentar">+</button>' +
                '</div></td>' +
                '<td class="product-subtotal" data-title="Subtotal"><span class="price-val">' + priceHtml(it.price * it.qty) + '</span></td>' +
            '</tr>';
        }).join('');

        root.innerHTML =
            '<div class="woocommerce">' +
                '<form class="woocommerce-cart-form" onsubmit="return false;">' +
                    '<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">' +
                        '<thead><tr>' +
                            '<th class="product-remove">&nbsp;</th>' +
                            '<th class="product-thumbnail">&nbsp;</th>' +
                            '<th class="product-name">Producto</th>' +
                            '<th class="product-price">Precio</th>' +
                            '<th class="product-quantity">Cantidad</th>' +
                            '<th class="product-subtotal">Subtotal</th>' +
                        '</tr></thead>' +
                        '<tbody>' + rows + '</tbody>' +
                    '</table>' +
                '</form>' +
                '<div class="cart-collaterals">' +
                    '<div class="cart_totals">' +
                        '<h2>Totales del carrito</h2>' +
                        '<table cellspacing="0" class="shop_table shop_table_responsive"><tbody>' +
                            '<tr class="cart-subtotal"><th>Subtotal</th><td data-title="Subtotal">' + priceHtml(cartTotal()) + '</td></tr>' +
                            '<tr class="woocommerce-shipping-totals shipping"><th>Envío</th><td data-title="Envío">Envío gratuito<div class="shipping-note">Entrega estimada en 14 días laborables.</div></td></tr>' +
                            '<tr class="order-total"><th>Total</th><td data-title="Total"><strong>' + priceHtml(cartTotal()) + '</strong></td></tr>' +
                        '</tbody></table>' +
                        '<div class="wc-proceed-to-checkout">' +
                            '<a href="' + checkout + '" class="checkout-button button alt wc-forward">Finalizar compra</a>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>';

        root.querySelectorAll('.dbe-remove').forEach(function (b) {
            b.addEventListener('click', function () { removeItem(this.dataset.slug); });
        });
        root.querySelectorAll('.dbe-qty').forEach(function (inp) {
            inp.addEventListener('change', function () { setQty(this.dataset.slug, this.value); });
        });
        root.querySelectorAll('.dbe-qty-dec').forEach(function (b) {
            b.addEventListener('click', function () {
                var inp = root.querySelector('.dbe-qty[data-slug="' + this.dataset.slug + '"]');
                var v = (parseInt(inp.value, 10) || 1) - 1; if (v < 1) v = 1;
                setQty(this.dataset.slug, v);
            });
        });
        root.querySelectorAll('.dbe-qty-inc').forEach(function (b) {
            b.addEventListener('click', function () {
                var inp = root.querySelector('.dbe-qty[data-slug="' + this.dataset.slug + '"]');
                var v = (parseInt(inp.value, 10) || 1) + 1;
                setQty(this.dataset.slug, v);
            });
        });
    }

    /* ---------- Recherche (toggle barre) ---------- */
    function bindSearch() {
        var icon = document.querySelector('.header-search-icon');
        var form = document.getElementById('dbe-search-form');
        if (!icon || !form) return;
        icon.addEventListener('click', function (e) {
            e.preventDefault();
            form.classList.toggle('open');
            var inp = form.querySelector('input[name="q"]');
            if (form.classList.contains('open') && inp) inp.focus();
        });
        document.addEventListener('click', function (e) {
            if (!form.contains(e.target) && !icon.contains(e.target)) form.classList.remove('open');
        });
    }

    /* ---------- Boutons "Ajouter au panier" ---------- */
    function bindAddButtons() {
        document.querySelectorAll('[data-add-to-cart]').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                var qty = 1;
                var qtyInput = document.querySelector(btn.dataset.qtyTarget || '.qty');
                if (qtyInput) qty = qtyInput.value;
                addToCart({
                    slug: btn.dataset.slug, name: btn.dataset.name,
                    price: btn.dataset.price, image: btn.dataset.image, url: btn.dataset.url
                }, qty);
                openCartPanel();
            });
        });
    }

    /* ---------- Ouverture du panneau via l'icône panier ---------- */
    function bindTrigger() {
        var trigger = document.getElementById('dbe-cart-trigger');
        if (trigger) {
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                openCartPanel();
            });
        }
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeCartPanel();
        });
    }

    /* ---------- Init ---------- */
    document.addEventListener('DOMContentLoaded', function () {
        ensurePanel();
        updateCartBadge();
        bindSearch();
        bindAddButtons();
        bindTrigger();
        renderCartPage();
        renderCheckout();

        // Sécurise le champ caché juste avant l'envoi du formulaire
        var checkoutForm = document.getElementById('checkout-form');
        if (checkoutForm) {
            checkoutForm.addEventListener('submit', function () {
                var hidden = document.getElementById('cart_data');
                if (hidden) hidden.value = JSON.stringify(getCart());
            });
        }
    });

    window.DbeCart = { add: addToCart, remove: removeItem, get: getCart, open: openCartPanel, count: cartCount, total: cartTotal };
})();

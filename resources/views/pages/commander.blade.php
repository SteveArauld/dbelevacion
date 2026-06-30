@extends('layouts.app')

@section('title', 'Finalizar compra')

@php
    $countries = ['Afganistán','Albania','Alemania','Andorra','Angola','Anguila','Antártida','Antigua y Barbuda','Arabia Saudita','Argelia','Argentina','Armenia','Aruba','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belau','Bélgica','Belize','Benin','Bermuda','Bhutan','Bielorrusia','Birmania','Bolivia','Bonaire, San Eustaquio y Saba','Bosnia y Herzegovina','Botswana','Brasil','Brunéi','Bulgaria','Burkina Faso','Burundi','Cabo Verde','Camboya','Camerún','Canadá','Chad','Chile','China','Chipre','Ciudad del Vaticano','Colombia','Comoras','Congo (Brazzaville)','Congo (Kinshasa)','Corea del Norte','Corea del Sur','Costa de Marfil','Costa Rica','Croacia','Cuba','Curaçao','Dinamarca','Djibouti','Dominica','Ecuador','Egipto','El Salvador','Emiratos Árabes Unidos','Eritrea','Eslovaquia','Eslovenia','España','Estados Unidos (EEUU)','Estonia','Esuatini','Etiopía','Filipinas','Finlandia','Fiyi','Francia','Gabón','Gambia','Georgia','Ghana','Gibraltar','Granada','Grecia','Groenlandia','Guadalupe','Guam','Guatemala','Guayana Francesa','Guernsey','Guinea','Guinea Ecuatorial','Guinea-Bisáu','Guyana','Haití','Honduras','Hong Kong','Hungría','India','Indonesia','Irak','Irán','Irlanda','Isla Bouvet','Isla de Man','Isla de Navidad','Isla Norfolk','Isla Santa Elena','Islandia','Islas Åland','Islas Caimán','Islas Cocos','Islas Cook','Islas de ultramar menores de Estados Unidos (EEUU)','Islas Feroe','Islas Georgias y Sandwich del Sur','Islas Heard y McDonald','Islas Malvinas','Islas Marianas del Norte','Islas Marshall','Islas Salomón','Islas Turcas y Caicos','Islas Vírgenes (Británicas)','Islas Vírgenes (EEUU)','Israel','Italia','Jamaica','Japón','Jersey','Jordania','Kazajistán','Kenia','Kirguistán','Kiribati','Kosovo','Kuwait','Laos','Lesoto','Letonia','Líbano','Liberia','Libia','Liechtenstein','Lituania','Luxemburgo','Macao','Macedonia del Norte','Madagascar','Malasia','Malaui','Maldivas','Malí','Malta','Marruecos','Martinica','Mauricio','Mauritania','Mayotte','México','Micronesia','Moldavia','Mónaco','Mongolia','Montenegro','Montserrat','Mozambique','Namibia','Nauru','Nepal','Nicaragua','Níger','Nigeria','Niue','Noruega','Nueva Caledonia','Nueva Zelanda','Omán','Países Bajos','Pakistán','Panamá','Papúa Nueva Guinea','Paraguay','Perú','Pitcairn','Polinesia Francesa','Polonia','Portugal','Puerto Rico','Qatar','Reino Unido (UK)','República Centroafricana','República Checa','República Dominicana','Reunión','Ruanda','Rumania','Rusia','Sahara Occidental','Samoa','Samoa Americana','San Bartolomé','San Cristóbal y Nieves','San Marino','San Martín (Países Bajos)','San Martín (parte de Francia)','San Pedro y Miquelón','San Vicente y las Granadinas','Santa Lucía','Santo Tomé y Príncipe','Senegal','Serbia','Seychelles','Sierra Leona','Singapur','Siria','Somalia','Sri Lanka','Sudáfrica','Sudán','Sudán del Sur','Suecia','Suiza','Surinam','Svalbard y Jan Mayen','Tailandia','Taiwán','Tanzania','Tayikistán','Territorio Británico del Océano Índico','Territorios australes franceses','Territorios Palestinos','Timor Oriental','Togo','Tokelau','Tonga','Trinidad y Tobago','Túnez','Turkmenistán','Turquía','Tuvalu','Ucrania','Uganda','Uruguay','Uzbekistán','Vanuatu','Venezuela','Vietnam','Wallis y Futuna','Yemen','Zambia','Zimbabue'];

    $provinces = ['La Coruña','Álava','Albacete','Alicante','Almería','Asturias','Ávila','Badajoz','Baleares','Barcelona','Burgos','Cáceres','Cádiz','Cantabria','Castellón','Ceuta','Ciudad Real','Córdoba','Cuenca','Gerona','Granada','Guadalajara','Guipúzcoa','Huelva','Huesca','Jaén','La Rioja','Las Palmas','León','Lérida','Lugo','Madrid','Málaga','Melilla','Murcia','Navarra','Orense','Palencia','Pontevedra','Salamanca','Santa Cruz de Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'];
@endphp

@section('content')
<div id="view">
    <div id="content" class="woostify-container" tabindex="-1">
        <div class="woostify-container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="woocommerce">
                        <div class="woocommerce-notices-wrapper"></div>

                        @if ($errors->any())
                            <ul class="woocommerce-error" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{-- Message panier vide (géré par shop.js) --}}
                        <div id="checkout-empty" class="woocommerce-info" style="display:none;">
                            Su carrito está vacío. <a class="button" href="{{ route('home') }}">Seguir comprando</a>
                        </div>

                        <form name="checkout" method="post" class="checkout woocommerce-checkout" action="{{ route('checkout.store') }}" id="checkout-form">
                            @csrf
                            <input type="hidden" name="cart_data" id="cart_data" value="">

                            <div class="col2-set" id="customer_details">
                                <div class="">
                                    <div class="woocommerce-billing-fields">
                                        <h3>Detalles de facturación</h3>
                                        <div class="woocommerce-billing-fields__field-wrapper">

                                            <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                                                <label for="billing_first_name" class="required_field">Nombre&nbsp;<span class="required" aria-hidden="true">*</span></label>
                                                <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="billing_first_name" id="billing_first_name" value="{{ old('billing_first_name') }}" required></span>
                                            </p>
                                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                                <label for="billing_last_name" class="required_field">Apellidos&nbsp;<span class="required" aria-hidden="true">*</span></label>
                                                <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="billing_last_name" id="billing_last_name" value="{{ old('billing_last_name') }}" required></span>
                                            </p>
                                            <p class="form-row form-row-wide validate-required" id="billing_company_field">
                                                <label for="billing_company" class="required_field">Nombre de la empresa&nbsp;<span class="required" aria-hidden="true">*</span></label>
                                                <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="billing_company" id="billing_company" value="{{ old('billing_company') }}" required></span>
                                            </p>
                                            <p class="form-row form-row-wide address-field validate-required" id="billing_country_field">
                                                <label for="billing_country" class="required_field">País / Región&nbsp;<span class="required" aria-hidden="true">*</span></label>
                                                <span class="woocommerce-input-wrapper">
                                                    <select name="billing_country" id="billing_country" class="country_select" required>
                                                        @foreach($countries as $c)
                                                            <option value="{{ $c }}" {{ old('billing_country', 'España') === $c ? 'selected' : '' }}>{{ $c }}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </p>
                                            <p class="form-row address-field validate-required form-row-wide" id="billing_address_1_field">
                                                <label for="billing_address_1" class="required_field">Dirección de la calle&nbsp;<span class="required" aria-hidden="true">*</span></label>
                                                <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="billing_address_1" id="billing_address_1" placeholder="Nombre de la calle y número de la casa" value="{{ old('billing_address_1') }}" required></span>
                                            </p>
                                            <p class="form-row address-field form-row-wide" id="billing_address_2_field">
                                                <label for="billing_address_2" class="screen-reader-text">Apartamento, habitación, escalera, etc.</label>
                                                <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="billing_address_2" id="billing_address_2" placeholder="Apartamento, habitación, escalera, etc. (opcional)" value="{{ old('billing_address_2') }}"></span>
                                            </p>
                                            <p class="form-row address-field validate-required validate-postcode form-row-wide" id="billing_postcode_field">
                                                <label for="billing_postcode" class="required_field">Código postal / ZIP&nbsp;<span class="required" aria-hidden="true">*</span></label>
                                                <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="billing_postcode" id="billing_postcode" value="{{ old('billing_postcode') }}" required></span>
                                            </p>
                                            <p class="form-row address-field validate-required form-row-wide" id="billing_city_field">
                                                <label for="billing_city" class="required_field">Población&nbsp;<span class="required" aria-hidden="true">*</span></label>
                                                <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="billing_city" id="billing_city" value="{{ old('billing_city') }}" required></span>
                                            </p>
                                            <p class="form-row address-field validate-required validate-state form-row-wide" id="billing_state_field">
                                                <label for="billing_state" class="required_field">Provincia&nbsp;<span class="required" aria-hidden="true">*</span></label>
                                                <span class="woocommerce-input-wrapper">
                                                    <select name="billing_state" id="billing_state" class="state_select" required>
                                                        <option value="">Elige una opción…</option>
                                                        @foreach($provinces as $p)
                                                            <option value="{{ $p }}" {{ old('billing_state') === $p ? 'selected' : '' }}>{{ $p }}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </p>
                                            <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field">
                                                <label for="billing_phone" class="required_field">Teléfono&nbsp;<span class="required" aria-hidden="true">*</span></label>
                                                <span class="woocommerce-input-wrapper"><input type="tel" class="input-text" name="billing_phone" id="billing_phone" value="{{ old('billing_phone') }}" required></span>
                                            </p>
                                            <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field">
                                                <label for="billing_email" class="required_field">Dirección de correo electrónico&nbsp;<span class="required" aria-hidden="true">*</span></label>
                                                <span class="woocommerce-input-wrapper"><input type="email" class="input-text" name="billing_email" id="billing_email" value="{{ old('billing_email') }}" required></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="woocommerce-shipping-fields">
                                        <h3 id="ship-to-different-address">
                                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" type="checkbox" name="ship_to_different_address" value="1" {{ old('ship_to_different_address') ? 'checked' : '' }}>
                                                <span>¿Enviar a una dirección diferente?</span>
                                            </label>
                                        </h3>

                                        <div class="shipping_address" style="{{ old('ship_to_different_address') ? '' : 'display:none;' }}">
                                            <div class="woocommerce-shipping-fields__field-wrapper">
                                                <p class="form-row form-row-first" id="shipping_first_name_field">
                                                    <label for="shipping_first_name">Nombre</label>
                                                    <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="shipping_first_name" id="shipping_first_name" value="{{ old('shipping_first_name') }}"></span>
                                                </p>
                                                <p class="form-row form-row-last" id="shipping_last_name_field">
                                                    <label for="shipping_last_name">Apellidos</label>
                                                    <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="shipping_last_name" id="shipping_last_name" value="{{ old('shipping_last_name') }}"></span>
                                                </p>
                                                <p class="form-row form-row-wide" id="shipping_company_field">
                                                    <label for="shipping_company">Nombre de la empresa</label>
                                                    <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="shipping_company" id="shipping_company" value="{{ old('shipping_company') }}"></span>
                                                </p>
                                                <p class="form-row form-row-wide address-field" id="shipping_country_field">
                                                    <label for="shipping_country">País / Región</label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <select name="shipping_country" id="shipping_country" class="country_select">
                                                            @foreach($countries as $c)
                                                                <option value="{{ $c }}" {{ old('shipping_country', 'España') === $c ? 'selected' : '' }}>{{ $c }}</option>
                                                            @endforeach
                                                        </select>
                                                    </span>
                                                </p>
                                                <p class="form-row address-field form-row-wide" id="shipping_address_1_field">
                                                    <label for="shipping_address_1">Dirección de la calle</label>
                                                    <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="shipping_address_1" id="shipping_address_1" placeholder="Nombre de la calle y número de la casa" value="{{ old('shipping_address_1') }}"></span>
                                                </p>
                                                <p class="form-row address-field form-row-wide" id="shipping_address_2_field">
                                                    <label for="shipping_address_2" class="screen-reader-text">Apartamento, habitación, escalera, etc.</label>
                                                    <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="shipping_address_2" id="shipping_address_2" placeholder="Apartamento, habitación, escalera, etc. (opcional)" value="{{ old('shipping_address_2') }}"></span>
                                                </p>
                                                <p class="form-row address-field form-row-wide" id="shipping_postcode_field">
                                                    <label for="shipping_postcode">Código postal / ZIP</label>
                                                    <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="shipping_postcode" id="shipping_postcode" value="{{ old('shipping_postcode') }}"></span>
                                                </p>
                                                <p class="form-row address-field form-row-wide" id="shipping_city_field">
                                                    <label for="shipping_city">Población</label>
                                                    <span class="woocommerce-input-wrapper"><input type="text" class="input-text" name="shipping_city" id="shipping_city" value="{{ old('shipping_city') }}"></span>
                                                </p>
                                                <p class="form-row address-field form-row-wide" id="shipping_state_field">
                                                    <label for="shipping_state">Provincia</label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <select name="shipping_state" id="shipping_state" class="state_select">
                                                            <option value="">Elige una opción…</option>
                                                            @foreach($provinces as $p)
                                                                <option value="{{ $p }}" {{ old('shipping_state') === $p ? 'selected' : '' }}>{{ $p }}</option>
                                                            @endforeach
                                                        </select>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="woocommerce-additional-fields">
                                        <div class="woocommerce-additional-fields__field-wrapper">
                                            <p class="form-row notes" id="order_comments_field">
                                                <label for="order_comments">Notas del pedido&nbsp;<span class="optional">(opcional)</span></label>
                                                <span class="woocommerce-input-wrapper"><textarea name="order_comments" class="input-text" id="order_comments" placeholder="Notas sobre tu pedido, por ejemplo, notas especiales para la entrega." rows="2" cols="5">{{ old('order_comments') }}</textarea></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h3 id="order_review_heading">Tu pedido</h3>

                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Producto</th>
                                            <th class="product-total">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="review-items">
                                        {{-- Rendu par shop.js depuis le localStorage --}}
                                    </tbody>
                                    <tfoot id="review-foot">
                                        {{-- Rendu par shop.js --}}
                                    </tfoot>
                                </table>

                                <div id="payment" class="woocommerce-checkout-payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        <li class="wc_payment_method payment_method_bacs">
                                            <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="Transferencia bancaria directa" checked>
                                            <label for="payment_method_bacs">Transferencia bancaria directa</label>
                                            <div class="payment_box payment_method_bacs">
                                                <p>Realice su pago de forma segura mediante transferencia bancaria. Una vez completado su pedido, recibirá nuestros datos bancarios por correo electrónico. Indique obligatoriamente su número de pedido como concepto de la transferencia.</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-row place-order">
                                        <button type="submit" class="button alt" id="place_order" value="Realizar el pedido">Realizar el pedido</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    (function () {
        var chk = document.getElementById('ship-to-different-address-checkbox');
        var fields = document.querySelector('.shipping_address');
        if (chk && fields) {
            chk.addEventListener('change', function () {
                fields.style.display = chk.checked ? 'block' : 'none';
            });
        }
    })();
</script>
@endpush
@endsection

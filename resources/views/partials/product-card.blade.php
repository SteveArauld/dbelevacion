{{-- resources/views/partials/product-card.blade.php --}}
<li class="product type-product status-publish instock has-post-thumbnail shipping-taxable purchasable product-type-simple">
    <div class="product-loop-wrapper">
        <div class="product-loop-image-wrapper">
            <div class="product-loop-action"></div>
            <a href="{{ route('product.show', $product->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                @if(count($product->images_local) > 1)
                    <span class="product-loop-hover-image" style="background-image: url({{ $product->images_local[1] }});"></span>
                @endif
                <img width="300" height="300" 
                     src="{{ $product->main_image_url }}" 
                     class="attachment-woocommerce_thumbnail product-loop-image" 
                     alt="{{ $product->name }}"
                     loading="lazy">
            </a>
        </div>
        <div class="product-loop-content text-center">
            <h2 class="woocommerce-loop-product__title">
                <a href="{{ route('product.show', $product->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    {{ $product->name }}
                </a>
            </h2>
            <div class="product-loop-meta no-transform">
                <div class="animated-meta">
                    <span class="price">
                        <span class="woocommerce-Price-amount amount">{{ $product->formatted_price }}</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</li>
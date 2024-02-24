
{{--Миникорзина--}}

<div class="dropdown-menu dropdown-cart">
    <div class="cart-content" id="cart-content">
        <ul>
            @foreach($positions as $product)
                <li>
                    <!-- Single Cart Item Start -->
                    <div class="single-cart-item">
                        <div class="cart-thumb">
                            <img src="{{$product->image}}" alt="Cart">
                            <span class="product-quantity">{{$quantities[$product->id]['kolvo']}}x</span>
                        </div>
                        <div class="cart-item-content">
                            <h6 class="product-name">{{$product->name}}</h6>
                            <span class="product-price">${{$product->price}}</span>
                            <div class="attributes-content">
                                <span><strong>Color:</strong> White </span>
                            </div>
                            <a class="cart-remove" href="#"><i class="las la-times"></i></a>
                        </div>
                    </div>
                    <!-- Single Cart Item End -->
                </li>
            @endforeach
        </ul>
    </div>

    <div class="cart-price">
        <div class="cart-subtotals">
            <div class="price-inline">
                <span class="label">Всего:</span>
                <span class="value">${{ $summPrice }}</span>
            </div>
            <div class="price-inline">
                <span class="label">Доставка</span>
                <span class="value">$0.00</span>
            </div>
            <div class="price-inline">
                <span class="label">Налог</span>
                <span class="value">$0.00</span>
            </div>
        </div>
        <div class="cart-total">
            <div class="price-inline">
                <span class="label">Итого:</span>
                <span class="value">{{$summPrice}}</span>
            </div>
        </div>
    </div>

    <div class="checkout-btn">
        <a href="{{ route('store_checkout') }}" class="btn btn-dark btn-hover-primary d-block">Оформить</a>
    </div>
</div>


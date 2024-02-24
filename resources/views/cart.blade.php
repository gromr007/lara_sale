@extends('layouts.app')

@section('content')

    <!-- Shopping Cart Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="cart-wrapper">
                <!-- Cart Wrapper Start -->
                <div class="cart-table table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="product-thumb">Фото</th>
                            <th class="product-info">Информация</th>
                            <th class="product-quantity">Количество</th>
                            <th class="product-total-price">Цена</th>
                            <th class="product-action">Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)

                            <tr>
                                <td class="product-thumb">
                                    <img src="{{$product->image}}" alt="">
                                </td>
                                <td class="product-info">
                                    <h6 class="name"><a href="#">{{$product->name}}</a></h6>
                                    <div class="product-prices">
                                        <span class="old-price">${{$product->price * 1.1}}</span>
                                        <span class="sale-price">${{$product->price}}</span>
                                    </div>
                                    <div class="product-size-color">
                                        <p>Размер <span>S</span></p>
                                        <p>Цвет <span>Белый</span></p>
                                    </div>
                                </td>
                                <td class="quantity">
                                    <div class="product-quantity d-inline-flex">
                                        <form method="POST" action="{{ route('cart_add') }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                            <button type="submit" class="sub">-</button>
                                            <input name="kolvo" type="text" value="{{$quantities[$product->id]['kolvo']}}" />
                                            <button type="submit" class="add">+</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="product-total-price">
                                    <span class="price">${{$product->price * $quantities[$product->id]['kolvo']}}</span>
                                </td>
                                <td class="product-action">
                                    <form method="POST" action="{{ route('position_delete') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                        <a class="remove" href="javascript:;" onclick="parentNode.submit();"><i class="pe-7s-trash"></i></a>
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- Cart Wrapper End -->
                <!-- Cart btn Start -->
                <div class="cart-btn">
                    <div class="left-btn">
                        <a href="{{route('home')}}" class="btn btn-dark btn-hover-primary">Обратно в магазин</a>
                    </div>
                    <div class="left-btn">
                        <a href="javascript:;" class="btn" style="cursor: auto;">Сумма заказа: ${{$summPrice}}</a>
                    </div>
                    <div class="right-btn">
                        <a class="btn btn-outline-dark" href="{{ route('cart_clear') }}">Очистить корзину</a>
                        <a href="{{ route('store_checkout') }}" class="btn btn-outline-dark">Оформить заказ</a>
                    </div>
                </div>
                <!-- Cart btn Start -->
            </div>

        </div>
    </div>
    <!-- Shopping Cart Section End -->

@endsection

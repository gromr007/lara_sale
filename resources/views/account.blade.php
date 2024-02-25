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
                            <th class="product-thumb">№ Заказа</th>
                            <th class="product-info">Товары</th>
                            <th class="product-quantity">Дата</th>
                            <th class="product-total-price">Цена</th>
                            <th class="product-total-price">Удаление</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)

                            <tr>
                                <td class="product-thumb">
                                    {{ $order->id }}
                                </td>
                                <td class="product-info">
                                    @foreach($order->products as $product)
                                        <a href="#">{{ $product->name }}</a> ,
                                    @endforeach
                                </td>
                                <td class="quantity">
                                    {{ $order->created_at }}
                                </td>
                                <td class="product-total-price">
                                    <span class="price">${{ $order->summ }}</span>
                                </td>
                                <td class="product-action">
                                    <form method="POST" action="{{ route('delete_checkout', ['order' => $order->id]) }}">
                                        @csrf
                                        <input type="hidden" name="id_order" value="{{$order->id}}"/>
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
                        <a href="javascript:;" class="btn" style="cursor: auto;">Сумма всех заказов: ${{ $summAll }}</a>
                    </div>
                </div>
                <!-- Cart btn Start -->
            </div>

        </div>
    </div>
    <!-- Shopping Cart Section End -->

@endsection

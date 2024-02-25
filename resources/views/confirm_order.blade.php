@extends('layouts.app')

@section('content')

    <div class="section section-padding">
        <div class="container">
            <div class="cart-wrapper">
                @if($order->id)
                    <h1 class="">Ваш заказ №{{ $order->id }} оформлен</h1>
                    <br/><br/>
                    <div>Перейти в <a href="{{ route('account') }}">Аккаунт</a> </div><br/>
                    <div>Наш менеджер свяжется с Вами ближайшее время </div>
                @else
                    <h1 class="">При оформлении заказа произошла ошибка</h1>
                    <br/><br/>
                    <div>Перейти в <a href="{{ route('cart') }}">Корзину</a> </div><br/>
                    <div>Попробуйте повторить через какое-то время или свяжитесь с нашим менеджером </div>
                @endif
            </div>

        </div>
    </div>

@endsection

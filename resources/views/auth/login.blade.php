@extends('layouts.app')

@section('content')

    <div class="login-register-wrapper">
        <h4 class="title">Авторизация</h4>
        @if(empty(Auth::user()))
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="single-form">
                    <input type="text" name="email" placeholder="Email" value="{{old('email')}}" >
                </div><br/>
                <div class="single-form">
                    <input type="password" name="password" placeholder="Пароль" >
                </div><br/>
                <div class="single-form">
                    <button type="submit" class="btn btn-primary btn-hover-dark">Войти</button>
                </div><br/>
            </form>
            <br/>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p>Нет аккаунта? <a href="/register">Регистрация</a></p>
        @else
            {{ Auth::user()->id }}
        @endif
    </div>

@endsection




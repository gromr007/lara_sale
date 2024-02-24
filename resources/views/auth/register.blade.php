@extends('layouts.app')

@section('content')


    <!-- Register Section Start -->
    <div class="section section-padding mt-n1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Login & Register Start -->
                    <div class="login-register-wrapper">
                        <h4 class="title">Создание нового аккаунта</h4>
                        <p>Есть аккаунт? <a href="/login">Войти!</a></p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="single-form">
                                <input type="text" name="name" placeholder="Имя" value="{{old('name')}}" />
                            </div><br/>
                            <div class="single-form">
                                <input type="text" name="email" placeholder="Email" value="{{old('email')}}" />
                            </div><br/>
                            <div class="single-form">
                                <input type="password" name="password" placeholder="Пароль" />
                            </div><br/>
                            <div class="single-form">
                                <input type="password" name="password_confirmation" placeholder="Повтор Пароля" />
                            </div><br/>
                            <div class="single-form">
                                <button type="submit" class="btn btn-primary btn-hover-dark" style="width:auto;">Регистрация</button>
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

                    </div>
                    <!-- Login & Register End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Register Section End -->


@endsection

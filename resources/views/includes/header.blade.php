
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>

            <a href="{{ route('cart') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Корзина</a>
            <a href="{{ route('confirm_order') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Завершение</a>
            <a href="{{ route('account') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Аккаунт</a>
            <a href="{{ route('logoutGet') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Выйти</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Войти</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Регистрация</a>
            @endif
        @endauth
    </div>
@endif

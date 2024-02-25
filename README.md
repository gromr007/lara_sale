<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
</p>

## Интернет магазин

Тестовое задание.

Удаленный github репозиторий.
* git@github.com:gromr007/lara_sale.git

Бесплатный шаблон интернет магазина
* https://htmldemo.net/furbar-1/furbar/register.html

Хостинг
* https://testsale.suneg.ru/

JS AJAX 
* не использовал, все делал на post\get запросах с обновлением или редиректом страниц.

//==========================
Реализовал следующие страницы:

- Установил авторизацию, регистрацию, разлогинивание
* https://testsale.suneg.ru/login  
* https://testsale.suneg.ru/register
* https://testsale.suneg.ru/logout
    - без авторизации можно только просматривать каталог,
    - Нельзя добавлять в корзину, смотреть корзину, открывать миникорзину, переходить в аккаунт
    - Создал три тестовых аккаунта с помощью фабрик и сидеров
    - Залогиниться можно под admin@admin.ru (12345678) либо зарегистрировать своего пользователя.
  
Главная, Каталог товаров : https://testsale.suneg.ru/
* Название
* Цена
* Возможность выбрать кол-во
* Кнопка «Добавить в корзину»
* Невозможность добавить в корзину уже имеющийся продукт
* картинка
* Строка: 5 продуктов показано из 45
* Пагинация
* Два шаблона (карточки и список)
* Мини корзина в шапке
* Меню в хедере

Страница корзины https://testsale.suneg.ru/cart
* Список товаров в корзине
* Общая стоимость всех товаров в заказе
* Кнопка «Оформить заказ»
* После нажатия на кнопку «Оформить заказ», он попадает в соответствующую таблицу,
* покупателю выводится сообщение об успешно созданном заказе.
* Возможность удалить позицию из корзины
* Возможность изменить количество позиции в корзине
* Цена позиции и общая сумма корзины с учетом количества
* Возможность полностью очистить корзину
* Закрыл возможность открытия корзины и миникорзины если товаров в них нет

Страница аккаунта - список заказов - https://testsale.suneg.ru/account
* Номер заказа
* Дата заказа
* Перечисленные через запятую названия товаров
* Общая стоимость всех товаров в заказе
* Итоговая стоимость всех заказов
* возможность удаления заказа

//==========================

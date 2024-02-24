<!DOCTYPE html>
<html lang="ru" xmlns:og="http://ogp.me/ns#">
<head>
    @include('includes.head')
    @include('includes.metric')
</head>
<body data-page-name="{{ isset($pageName) ? $pageName : '' }}">

    @include('includes.header')

        @yield('content')

    @include('includes.footer')

    @include('includes.modals')

    @include('includes.foot')

</body>
</html>

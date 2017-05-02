<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
{{--@include('css')--}}
{{--@include('fonts')--}}
{{--@include('meta')--}}
<body>
{{--@include('header')--}}

<h1>@yield('title')</h1>
@yield('content')

{{--@include('footer')--}}
</body>
{{--@include('js')--}}
{{--@include('scripts')--}}
</html>
<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/slick-theme.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/MyAccount.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('client/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('client/css/MyAccount.css') }}">

    {{-- <link rel="stylesheet" href="{{asset('client/css/bootstrap.min1.css')}}">  --}}
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/style.css') }}" />

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    @livewireStyles


    
    
    

</head>

<body>

    <!-- Header -->
    @include('components.layouts.header')

    @include('components.layouts.nav')

    <!-- Nội dung chính -->
    <div class="container">
        {{-- @yield('content') --}}
        {{ $slot }}

    </div>

    <!-- Footer -->
    @include('components.layouts.footer')
    <!-- Scripts chung -->
    <script src="{{ asset('client/js/jquery.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/js/slick.min.js') }}"></script>
    <script src="{{ asset('client/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('client/js/main.js') }}"></script>
    <script src="https://unpkg.com/livewire@3.6.2/dist/livewire.js"></script>


    <!-- Nơi để thêm script cho từng trang riêng -->
    @yield('scripts')
    @livewireScripts
    <script>
        window.Alpine = Alpine;
    </script>

</body>

</html>
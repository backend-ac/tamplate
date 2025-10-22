<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KazSnab</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    {{-- Head Metrics --}}
    @if($siteSettings && $siteSettings->head_metrics)
        @foreach($siteSettings->head_metrics as $metric)
            {!! $metric['code'] ?? '' !!}
        @endforeach
    @endif
</head>

<body>
{{-- Body Metrics --}}
@if($siteSettings && $siteSettings->body_metrics)
    @foreach($siteSettings->body_metrics as $metric)
        {!! $metric['code'] ?? '' !!}
    @endforeach
@endif

<div class="wrapper">

@include('layouts.header')
    @yield('content')
    @include('layouts.footer')

</div>
<div class="modal">
    <div class="container">
        <div class="modal-wrapper">
            <button type="button" class="close-modal">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 1L1 21" stroke="black" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                    <path d="M1 1L21 21" stroke="black" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                </svg>
            </button>
            <h2>Оставьте заявку и мы Вам перезвоним!</h2>
            <form action="">
                <input type="text" name="name" placeholder="Имя" required>
                <input type="tel" name="phone" id="" placeholder="Номер телефона" required>
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('js/index.js') }}"></script>
</body>

</html>

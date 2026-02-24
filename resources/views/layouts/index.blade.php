<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Favicon --}}
    @if($siteSettings && $siteSettings->favicon)
        <link rel="icon" href="{{ asset('storage/' . $siteSettings->favicon) }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('storage/' . $siteSettings->favicon) }}" type="image/x-icon">
    @endif
    
    {{-- SEO Meta Tags --}}
    @php
        $pageTitle = $pageTitle ?? ($title ?? null);
        $metaTitle = $siteSettings && $siteSettings->default_meta_title 
            ? str_replace('{page_title}', $pageTitle, $siteSettings->default_meta_title)
            : ($pageTitle ? $pageTitle : 'KazSnab');
        $metaDescription = $metaDescription ?? ($siteSettings ? $siteSettings->default_meta_description : null);
        $metaKeywords = $metaKeywords ?? ($siteSettings ? $siteSettings->default_meta_keywords : null);
        $ogImage = $ogImage ?? ($siteSettings && $siteSettings->og_image ? asset('storage/' . $siteSettings->og_image) : null);
    @endphp
    
    <title>{{ $metaTitle }}</title>
    
    @if($metaDescription)
        <meta name="description" content="{{ $metaDescription }}">
    @endif
    
    @if($metaKeywords)
        <meta name="keywords" content="{{ $metaKeywords }}">
    @endif
    
    {{-- Open Graph Meta Tags --}}
    <meta property="og:title" content="{{ $metaTitle }}">
    @if($metaDescription)
        <meta property="og:description" content="{{ $metaDescription }}">
    @endif
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    @if($ogImage)
        <meta property="og:image" content="{{ $ogImage }}">
    @endif
    
    {{-- Additional Meta Tags --}}
    @if($siteSettings && $siteSettings->default_meta_tags)
        @foreach($siteSettings->default_meta_tags as $tag)
            <meta {{ isset($tag['name']) ? "name={$tag['name']}" : '' }} content="{{ $tag['value'] ?? '' }}">
        @endforeach
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.css?_v=20250416184948">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css?v=1.13') }}">
    
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
@if($hasModal ?? false)
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
            @if(session('success'))
                <div class="alert alert-success" style="color: green; margin-bottom: 15px; padding: 10px; background: #d4edda; border-radius: 5px;">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('leads.store') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Имя" required value="{{ old('name') }}">
                @error('name')
                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
                <input type="tel" name="phone" placeholder="Номер телефона" required value="{{ old('phone') }}">
                @error('phone')
                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>
</div>
@endif
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js?_v=20250416184948"></script>
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js/index.js?v=1.1') }}"></script>
<script src="{{ asset('js/smooth-scroll.js?v=1.0') }}"></script>
</body>

</html>

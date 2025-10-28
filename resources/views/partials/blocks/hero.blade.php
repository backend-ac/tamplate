<section class="hero">
    <div class="swiper hero__slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide hero__slide">
                    <img class="bg-img" src="{{ isset($data['image']) && $data['image'] ? asset('storage/' . $data['image']) : asset('img/hero-img.png') }}" alt="{{ $data['title'] ?? '' }}">
                    <div class="container">
                        <div class="hero__content">
                            <h1 class="title">{{ $data['title'] ?? '' }}</h1>
                            <p>{{ $data['subtitle'] ?? '' }}</p>
                            @if(($data['text'] ?? null))<p>{{ $data['text'] }}</p>@endif
                            @if(($data['cta_text'] ?? null))
                                <a class="open-modal btn-hov" href="{{ $data['cta_href'] ?? 'javascript:;' }}">{{ $data['cta_text'] ?? '' }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="hero__nav-btn">
                    <div class="swiper-button-prev">@include('partials.svg.hero-prev')</div>
                    <div class="swiper-button-next">@include('partials.svg.hero-next')</div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="hero">
    <div class="swiper hero__slider">
      <div class="swiper-wrapper">
                @php
                    $banners = $data['banners'] ?? [];
                    if (empty($banners) && isset($data['title'])) {
                        $banners = [$data];
                    }
                @endphp
                @forelse($banners as $banner)
                <div class="swiper-slide hero__slide">
                    <img class="bg-img" src="{{ isset($banner['image']) && $banner['image'] ? asset('storage/' . $banner['image']) : asset('img/hero-img.png') }}" alt="{{ $banner['image_alt'] ?? $banner['title'] ?? '' }}">
                    <div class="container">
                        <div class="hero__content">
                            <h1 class="title">{{ $banner['title'] ?? '' }}</h1>
                            <p>{{ $banner['subtitle'] ?? '' }}</p>
                            @if(($banner['text'] ?? null))<p>{{ $banner['text'] }}</p>@endif
                            @if(($banner['cta_text'] ?? null))
                                <a class="open-modal btn-hov" href="{{ $banner['cta_href'] ?? 'javascript:;' }}">{{ $banner['cta_text'] ?? '' }}</a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="swiper-slide hero__slide">
                    <img class="bg-img" src="{{ asset('img/hero-img.png') }}" alt="">
                    <div class="container">
                        <div class="hero__content">
                            <h1 class="title"></h1>
                            <p></p>
                        </div>
                    </div>
                </div>
                @endforelse
      </div>
      <div class="container">
                <div class="hero__nav-btn">
                    <div class="swiper-button-prev">@include('partials.svg.hero-prev')</div>
                    <div class="swiper-button-next">@include('partials.svg.hero-next')</div>
                </div>
      </div>
    </div>
</section>



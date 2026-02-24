<section class="hero">
    <div class="swiper hero__slider">
      <div class="swiper-wrapper">
                @php
                    $banners = $data['banners'] ?? [];
                    $title = $data['title'] ?? null;
                    $subtitle = $data['subtitle'] ?? null;
                    $text = $data['text'] ?? null;
                    $cta_text = $data['cta_text'] ?? null;
                    $cta_href = $data['cta_href'] ?? null;
                    
                    // If banners are empty but we have a title, create a banner from the main data
                    if (empty($banners) && isset($data['title'])) {
                        $banners = [[
                            'title' => $title,
                            'subtitle' => $subtitle,
                            'text' => $text,
                            'cta_text' => $cta_text,
                            'cta_href' => $cta_href,
                        ]];
                    }
                    // If we have banners but they don't have titles, add the main title/subtitle to the first banner
                    elseif (!empty($banners) && isset($banners[0]) && empty($banners[0]['title']) && !empty($title)) {
                        $banners[0]['title'] = $title;
                        $banners[0]['subtitle'] = $subtitle;
                        $banners[0]['text'] = $text;
                        $banners[0]['cta_text'] = $cta_text;
                        $banners[0]['cta_href'] = $cta_href;
                    }
                @endphp
                @forelse($banners as $key => $banner)
                <div class="swiper-slide hero__slide">
                    <img class="bg-img" src="{{ isset($banner['image']) && $banner['image'] ? asset('storage/' . $banner['image']) : asset('img/hero-img.png') }}" alt="{{ $banner['image_alt'] ?? $banner['title'] ?? '' }}">
                    <div class="container">
                        <div class="hero__content">
                            @if($key === 0)
                                <h1 class="title">{{ $banner['title'] ?? '' }}</h1>
                            @else
                                <h2 class="title">{{ $banner['title'] ?? '' }}</h2>
                            @endif
                            <div class="hero__subtitle">{!! $banner['subtitle'] ?? '' !!}</div>
                            @if(($banner['text'] ?? null))<div class="hero__text">{!! $banner['text'] !!}</div>@endif
                            @if(($banner['cta_text'] ?? null))
                                @if(!empty($banner['cta_href']))
                                    <a class="btn-hov" href="{{ $banner['cta_href'] }}">{{ $banner['cta_text'] }}</a>
                                @else
                                    <a class="open-modal btn-hov" href="javascript:;">{{ $banner['cta_text'] }}</a>
                                @endif
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
                            <div class="hero__subtitle"></div>
                            <div class="hero__text"></div>
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



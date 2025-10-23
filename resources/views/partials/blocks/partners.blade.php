<section class="partners indent">
    <h2 class="title">{{ $customName ?? $data['title'] ?? '' }}</h2>
    @if(($data['text'] ?? null))<p>{{ $data['text'] }}</p>@endif
    <div class="swiper container certificate__slider">
        <div class="swiper-wrapper">
            @foreach(($data['logos'] ?? []) as $logo)
                <div class="swiper-slide">
                    <div class="partners__slide">
                        @php($file = is_array($logo) ? ($logo['img'] ?? $logo['value'] ?? '') : $logo)
                        <img src="{{ asset('img/' . ($file ?: 'partners.png')) }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



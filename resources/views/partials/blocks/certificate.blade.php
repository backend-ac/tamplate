<section class="certificate office indent">
    <div class="office__wrapper">
        <h2 class="title">{{ $data['title'] ?? '' }}</h2>
        @if(($data['text'] ?? null))<p>{{ $data['text'] }}</p>@endif
        <div class="swiper container certificate__slider">
            <div class="swiper-wrapper">
                @foreach(($data['images'] ?? []) as $img)
                    <div class="swiper-slide">
                        <div class="certificate__slide">
                            @php($file = is_array($img) ? ($img['value'] ?? $img['img'] ?? '') : $img)
                            <img id="fullscreenImage" src="{{ str_starts_with($file, 'blocks/') ? asset('storage/' . $file) : asset('img/' . $file) }}" alt="{{ $img['alt'] ?? $data['title'] ?? '' }}">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev">
                <svg style="transform: rotate(180deg);" width="84" height="84" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M42 82C64.0914 82 82 64.0914 82 42C82 19.9086 64.0914 2 42 2C19.9086 2 2 19.9086 2 42C2 64.0914 19.9086 82 42 82Z" fill="#DD2B1C" stroke="#DD2B1C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M25.9998 42H57.9998" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M42 58.0005L58 42.0005L42 26.0005" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="swiper-button-next">
                <svg width="84" height="84" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M42 82C64.0914 82 82 64.0914 82 42C82 19.9086 64.0914 2 42 2C19.9086 2 2 19.9086 2 42C2 64.0914 19.9086 82 42 82Z" fill="#DD2B1C" stroke="#DD2B1C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M25.9998 42H57.9998" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M42 58.0005L58 42.0005L42 26.0005" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>
</section>



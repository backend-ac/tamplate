<section class="why-us container indent">
    <div class="why-us__wrapper">
        <div class="why-us__left" data-aos="fade-right">
            <h2 class="title">{{ $data['title'] ?? '' }}</h2>
            {!! $data['description'] ?? '' !!}
            @if(($data['text'] ?? null)){!! $data['text'] !!}@endif
            @if(($data['cta_text'] ?? null))
                <a href="{{ $data['cta_href'] ?? 'javascript:;' }}" class="btn-hov open-modal">{{ $data['cta_text'] }}</a>
            @endif
        </div>
        <div class="why-us__right">
            @foreach(($data['items'] ?? []) as $item)
                @php($img = is_array($item) ? ($item['img'] ?? $item['value'] ?? 'assortment-img.svg') : 'assortment-img.svg')
                @php($title = is_array($item) ? ($item['title'] ?? '') : (string)$item)
                @php($text = is_array($item) ? ($item['text'] ?? '') : '')
                <div class="why-us__card" data-aos="fade-left">
                    <img src="{{ str_starts_with($img, 'blocks/') ? asset('storage/' . $img) : asset('img/' . $img) }}" alt="{{ $item['img_alt'] ?? $title }}">
                    <div class="why-us__desc">
                        @if($title !== '')<h3>{{ $title }}</h3>@endif
                        @if($text !== ''){!! $text !!}@endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



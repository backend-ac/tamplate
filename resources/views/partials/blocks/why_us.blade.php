<section class="why-us container indent">
    <div class="why-us__wrapper">
        <div class="why-us__left">
            <h2 class="title">{{ $customName ?? $data['title'] ?? '' }}</h2>
            <p>{{ $data['description'] ?? '' }}</p>
            @if(($data['text'] ?? null))<p>{{ $data['text'] }}</p>@endif
            @if(($data['cta_text'] ?? null))
                <a href="{{ $data['cta_href'] ?? 'javascript:;' }}" class="btn-hov open-modal">{{ $data['cta_text'] }}</a>
            @endif
        </div>
        <div class="why-us__right">
            @foreach(($data['items'] ?? []) as $item)
                @php($img = is_array($item) ? ($item['img'] ?? $item['value'] ?? 'assortment-img.svg') : 'assortment-img.svg')
                @php($title = is_array($item) ? ($item['title'] ?? '') : (string)$item)
                @php($text = is_array($item) ? ($item['text'] ?? '') : '')
                <div class="why-us__card">
                    <img src="{{ asset('img/' . $img) }}" alt="">
                    <div class="why-us__desc">
                        @if($title !== '')<h3>{{ $title }}</h3>@endif
                        @if($text !== '')<p>{{ $text }}</p>@endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



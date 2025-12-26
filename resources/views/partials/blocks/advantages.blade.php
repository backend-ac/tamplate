<section class="advantages assortment container indent">
    <h2 class="title">{{ $customName ?? $data['title'] ?? '' }}</h2>
    @if(($data['text'] ?? null))<p>{{ $data['text'] }}</p>@endif
    <div class="assortment__wrapper">
        @foreach(($data['items'] ?? []) as $item)
            @php($img = is_array($item) ? ($item['img'] ?? $item['value'] ?? 'assortment-img.svg') : 'assortment-img.svg')
            @php($title = is_array($item) ? ($item['title'] ?? '') : (string)$item)
            @php($text = is_array($item) ? ($item['text'] ?? '') : '')
            <div class="assortment__card">
                <img src="{{ str_starts_with($img, 'blocks/') ? asset('storage/' . $img) : asset('img/' . $img) }}" alt="{{ $item['img_alt'] ?? $title }}">
                @if($title !== '')<h3>{{ $title }}</h3>@endif
                @if($text !== '')<p>{{ $text }}</p>@endif
            </div>
        @endforeach
    </div>
    @if(($data['cta_text'] ?? null))
        <a href="{{ $data['cta_href'] ?? 'javascript:;' }}" class="btn-hov open-modal">{{ $data['cta_text'] }}</a>
    @endif
</section>



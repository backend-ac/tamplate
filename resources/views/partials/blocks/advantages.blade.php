<section class="advantages assortment container indent">
    <h2 class="title">{{ $data['title'] ?? 'Преимущества Мини АЗС' }}</h2>
    <div class="assortment__wrapper">
        @foreach(($data['items'] ?? [["img"=>'assortment-img.svg','title'=>'Экономия','text'=>'Покупайте топливо по низким ценам и сократите затраты']]) as $item)
            @php($img = is_array($item) ? ($item['img'] ?? $item['value'] ?? 'assortment-img.svg') : 'assortment-img.svg')
            @php($title = is_array($item) ? ($item['title'] ?? '') : (string)$item)
            @php($text = is_array($item) ? ($item['text'] ?? '') : '')
            <div class="assortment__card">
                <img src="{{ asset('img/' . $img) }}" alt="">
                @if($title !== '')<h3>{{ $title }}</h3>@endif
                @if($text !== '')<p>{{ $text }}</p>@endif
            </div>
        @endforeach
    </div>
    @if(($data['cta_text'] ?? null))
        <a href="{{ $data['cta_href'] ?? 'javascript:;' }}" class="btn-hov open-modal">{{ $data['cta_text'] }}</a>
    @endif
</section>



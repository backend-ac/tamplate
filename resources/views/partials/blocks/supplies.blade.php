<section class="supplies indent">
    <div class="supplies__wrapper container">
        <h2 class="title">{{ $data['title'] ?? '' }}</h2>
        <p>{!! $data['description'] ?? '' !!}</p>
        @if(($data['text'] ?? null))<p>{!! $data['text'] !!}</p>@endif
        <div class="assortment__wrapper">
            @foreach(($data['items'] ?? []) as $item)
                @php($img = is_array($item) ? ($item['img'] ?? $item['value'] ?? 'assortment-img.svg') : 'assortment-img.svg')
                @php($title = is_array($item) ? ($item['title'] ?? '') : (string)$item)
                @php($text = is_array($item) ? ($item['text'] ?? '') : '')
                @php($price = is_array($item) ? ($item['price'] ?? '') : '')
                @php($buttonText = is_array($item) ? ($item['button_text'] ?? '') : '')
                @php($buttonHref = is_array($item) ? ($item['button_href'] ?? '') : '')
                <div class="assortment__card">
                    <img src="{{ str_starts_with($img, 'blocks/') ? asset('storage/' . $img) : asset('img/' . $img) }}" alt="{{ $item['img_alt'] ?? $title }}">
                    @if($title !== '')<h3>{{ $title }}</h3>@endif
                    @if($text !== '')<div class="assortment__card-text">{!! $text !!}</div>@endif
                    @if($price !== '')
                        <div class="assortment__card-price">{{ $price }}</div>
                    @endif
                    @if($buttonText !== '')
                        @if(!empty($buttonHref))
                            <a href="{{ $buttonHref }}" class="btn-hov assortment__card-btn">{{ $buttonText }}</a>
                        @else
                            <a href="javascript:;" class="btn-hov open-modal assortment__card-btn">{{ $buttonText }}</a>
                        @endif
                    @endif
                </div>
            @endforeach
        </div>
        @if(($data['cta_text'] ?? null))
            @if(!empty($data['cta_href']))
                <a href="{{ $data['cta_href'] }}" class="btn-hov">{{ $data['cta_text'] }}</a>
            @else
                <a href="javascript:;" class="btn-hov open-modal">{{ $data['cta_text'] }}</a>
            @endif
        @endif
    </div>
</section>



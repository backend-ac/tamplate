<section class="supplies indent">
    <div class="supplies__wrapper container">
        <h2 class="title">{{ $data['title'] ?? 'Способы поставки топлива' }}</h2>
        <p>{{ $data['description'] ?? 'Мы предлагаем удобные и надежные варианты поставки в зависимости от ваших потребностей:' }}</p>
        <div class="assortment__wrapper">
            @foreach(($data['items'] ?? [['img'=>'assortment-img.svg','title'=>'Ж/д транспортом (Вагон-цистерны)','text'=>'эффективная перевозка крупных объемов на дальние расстояния.']]) as $item)
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
    </div>
</section>



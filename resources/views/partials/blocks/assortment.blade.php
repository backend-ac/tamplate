<section class="assortment container indent">
    <h2 class="title">{{ $data['title'] ?? 'Наш ассортимент топлива' }}</h2>
    <p>{{ $data['description'] ?? 'Мы предлагаем широкий выбор российского и казахстанского дизельного топлива...' }}</p>
    <div class="assortment__wrapper">
        @foreach(($data['items'] ?? [["img"=>'assortment-img.svg','title'=>'Зимнее дизельное топливо','text'=>'предназначено для эксплуатации при температурах от –15 °С до –35 °С.']]) as $item)
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
</section>



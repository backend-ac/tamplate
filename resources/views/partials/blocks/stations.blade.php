<section class="stations indent">
    <div class="stations__wrapper container">
        <div class="why-us__wrapper">
            <div class="why-us__left">
                <h2 class="title">{{ $customName ?? $data['title'] ?? 'Мобильные топливозаправочные станции' }}</h2>
                <p>{{ $data['description'] ?? 'Надежное и удобное решение для хранения и заправки топлива в любом месте.' }}</p>
                @if(($data['text'] ?? null))<p>{{ $data['text'] }}</p>@endif
                @if(($data['cta_text'] ?? null))
                    <a href="{{ $data['cta_href'] ?? 'javascript:;' }}" class="btn-hov open-modal">{{ $data['cta_text'] }}</a>
                @endif
            </div>
            <div class="stations__right">
                @foreach(($data['items'] ?? [["img"=>'assortment-img.svg','title'=>'Продажа мини-АЗС','text'=>'подберем оптимальное решение для вашего бизнеса']]) as $item)
                    @php($img = is_array($item) ? ($item['img'] ?? $item['value'] ?? 'assortment-img.svg') : 'assortment-img.svg')
                    @php($title = is_array($item) ? ($item['title'] ?? '') : (string)$item)
                    @php($text = is_array($item) ? ($item['text'] ?? '') : '')
                    <div class="stations__card why-us__card">
                        <img src="{{ asset('img/' . $img) }}" alt="">
                        @if($title !== '')<h3>{{ $title }}</h3>@endif
                        @if($text !== '')<p>{{ $text }}</p>@endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>



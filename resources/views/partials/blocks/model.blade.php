<section class="model container indent">
    @if(isset($data['title_1']))
        <h2 class="title">{{ $customName ?? $data['title_1'] }}</h2>
        @if(($data['text_1'] ?? null))<p>{{ $data['text_1'] }}</p>@endif
    @endif
    <div class="model__wrapper">
        @foreach(($data['images_1'] ?? ['model-img.png']) as $img)
            @php($file = is_array($img) ? ($img['value'] ?? $img['img'] ?? '') : $img)
            <img src="{{ asset('img/' . $file) }}" alt="">
        @endforeach
    </div>
    @if(isset($data['title_2']))
        <h2 class="title">{{ $data['title_2'] }}</h2>
        @if(($data['text_2'] ?? null))<p>{{ $data['text_2'] }}</p>@endif
    @endif
    <div class="model__wrapper">
        @foreach(($data['images_2'] ?? ['model-img2.png']) as $img)
            @php($file = is_array($img) ? ($img['value'] ?? $img['img'] ?? '') : $img)
            <img src="{{ asset('img/' . $file) }}" alt="">
        @endforeach
    </div>
</section>



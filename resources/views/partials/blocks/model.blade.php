<section class="model container indent">
    @if(isset($data['title_1']))
        <h2 class="title">{{ $data['title_1'] }}</h2>
    @endif
    <div class="model__wrapper">
        @foreach(($data['images_1'] ?? ['model-img.png']) as $img)
            @php($file = is_array($img) ? ($img['value'] ?? $img['img'] ?? '') : $img)
            <img src="{{ asset('img/' . $file) }}" alt="">
        @endforeach
    </div>
    @if(isset($data['title_2']))
        <h2 class="title">{{ $data['title_2'] }}</h2>
    @endif
    <div class="model__wrapper">
        @foreach(($data['images_2'] ?? ['model-img2.png']) as $img)
            @php($file = is_array($img) ? ($img['value'] ?? $img['img'] ?? '') : $img)
            <img src="{{ asset('img/' . $file) }}" alt="">
        @endforeach
    </div>
</section>



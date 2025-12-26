<section class="model container indent">
    @if(isset($data['title_1']))
        <h2 class="title">{{ $customName ?? $data['title_1'] }}</h2>
        @if(($data['text_1'] ?? null))<p>{{ $data['text_1'] }}</p>@endif
    @endif
    <div class="model__wrapper">
        @foreach(($data['images_1'] ?? []) as $img)
            @php($file = is_array($img) ? ($img['value'] ?? $img['img'] ?? '') : $img)
            <img src="{{ str_starts_with($file, 'blocks/') ? asset('storage/' . $file) : asset('img/' . $file) }}" alt="{{ $img['alt'] ?? $data['title_1'] ?? '' }}">
        @endforeach
    </div>
    @if(isset($data['title_2']))
        <h2 class="title">{{ $data['title_2'] }}</h2>
        @if(($data['text_2'] ?? null))<p>{{ $data['text_2'] }}</p>@endif
    @endif
    <div class="model__wrapper">
        @foreach(($data['images_2'] ?? []) as $img)
            @php($file = is_array($img) ? ($img['value'] ?? $img['img'] ?? '') : $img)
            <img src="{{ str_starts_with($file, 'blocks/') ? asset('storage/' . $file) : asset('img/' . $file) }}" alt="{{ $img['alt'] ?? $data['title_2'] ?? '' }}">
        @endforeach
    </div>
</section>



<section class="about indent">
  <div class="container">
      <div class="about__container">
          <h1 class="about__title title">{{ $data['title'] ?? 'О компании' }}</h1>
          <div class="about__block">
            <div class="about__left">
              <div class="about__text">{!! $data['text'] ?? '' !!}</div>
            </div>
            <div class="about__right">
              <div class="about__image">
                @php($image = $data['image'] ?? '')
                <img src="{{ $image ? (str_starts_with($image, 'blocks/') ? asset('storage/' . $image) : asset('img/' . $image)) : '' }}" 
                     alt="{{ $data['image_alt'] ?? $data['title'] ?? 'О компании' }}">
              </div>
            </div>
          </div>
      </div>
  </div>
</section>
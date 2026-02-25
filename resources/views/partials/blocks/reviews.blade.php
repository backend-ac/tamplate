<section class="reviews indent">
    <div class="container">
        @if(isset($data['background_image']) && $data['background_image'])
            <div class="reviews__background">
                <img src="{{ asset('storage/' . $data['background_image']) }}" alt="{{ $data['background_image_alt'] ?? 'Отзывы' }}">
            </div>
        @endif

        <div class="reviews__container">
            <h2 class="title">{{ $data['title'] ?? 'Отзывы' }}</h2>
            <div class="reviews__text">{!! $data['text'] ?? '' !!}</div>
            
            @if(isset($data['items']) && is_array($data['items']) && count($data['items']) > 0)
                <div class="reviews__items">
                    @php
                        // Sort items by sort field if available
                        $items = collect($data['items'])->sortBy('sort')->values()->all();
                    @endphp
                    
                    <div class="swiper reviews__slider">
                        <div class="swiper-wrapper">
                            @foreach($items as $item)
                                <div class="swiper-slide">
                                    <div class="review__item">
                                        <div class="review__header">
                                            @if(isset($item['author_avatar']) && $item['author_avatar'])
                                                <div class="review__avatar">
                                                    <img src="{{ asset('storage/' . $item['author_avatar']) }}" alt="{{ $item['author_avatar_alt'] ?? $item['author_name'] ?? 'Автор отзыва' }}">
                                                </div>
                                            @endif
                                            <div class="review__author">
                                                <div class="review__name">{{ $item['author_name'] ?? '' }}</div>
                                                @if(isset($item['author_position']) && $item['author_position'])
                                                    <div class="review__position">{{ $item['author_position'] }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        @if(isset($item['title']) && $item['title'])
                                            <h3 class="review__title">{{ $item['title'] }}</h3>
                                        @endif
                                        
                                        <div class="review__content">
                                            {!! $item['text'] ?? '' !!}
                                        </div>
                                        
                                        @if(($item['show_rating'] ?? true) && isset($item['rating']))
                                            <div class="review__rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $item['rating'])
                                                        <span class="star star--active">★</span>
                                                    @else
                                                        <span class="star">★</span>
                                                    @endif
                                                @endfor
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    
                    <div class="reviews__nav">
                        <div class="swiper-button-prev">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.reviews__slider', {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    });
</script>

<style>

</style>

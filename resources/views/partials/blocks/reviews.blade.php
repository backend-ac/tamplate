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
    .reviews {
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }
    
    .reviews__background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }
    
    .reviews__background img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.1;
    }
    
    .reviews__container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }
    
    .reviews__text {
        margin-bottom: 40px;
        text-align: center;
    }
    
    .reviews__items {
        position: relative;
    }
    
    .review__item {
        padding: 30px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .review__header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .review__avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 15px;
        flex-shrink: 0;
    }
    
    .review__avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .review__name {
        font-weight: 600;
        font-size: 18px;
        margin-bottom: 5px;
    }
    
    .review__position {
        font-size: 14px;
        color: #666;
    }
    
    .review__title {
        font-size: 20px;
        margin-bottom: 15px;
    }
    
    .review__content {
        flex-grow: 1;
        margin-bottom: 20px;
    }
    
    .review__rating {
        margin-top: auto;
    }
    
    .star {
        color: #ccc;
        font-size: 20px;
    }
    
    .star--active {
        color: #FFD700;
    }
    
    .reviews__nav {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }
    
    .swiper-button-prev,
    .swiper-button-next {
        position: static;
        width: 50px;
        height: 50px;
        margin: 0 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        border-radius: 50%;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .swiper-button-prev:hover,
    .swiper-button-next:hover {
        background-color: #f5f5f5;
    }
    
    .swiper-button-prev::after,
    .swiper-button-next::after {
        display: none;
    }
    
    @media (max-width: 768px) {
        .reviews {
            padding: 60px 0;
        }
        
        .review__item {
            padding: 20px;
        }
    }
</style>

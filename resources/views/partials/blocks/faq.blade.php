<section class="faq indent">
    <div class="container">
        <div class="faq__container">
            <h2 class="title">{{ $data['title'] ?? 'Частые вопросы' }}</h2>
            <div class="faq__text">{!! $data['text'] ?? '' !!}</div>
            
            @if(isset($data['items']) && is_array($data['items']) && count($data['items']) > 0)
                <div class="faq__items">
                    @php
                        $items = collect($data['items'])->sortBy('sort')->values()->all();
                    @endphp
                    
                    @foreach($items as $index => $item)
                        <div class="faq__item">
                            <div class="faq__question">
                                <h3>{{ $item['question'] ?? '' }}</h3>
                                <div class="faq__toggle">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 5V19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="faq__answer">
                                <div class="faq__answer-content">
                                    {!! $item['answer'] ?? '' !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqItems = document.querySelectorAll('.faq__item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq__question');
            const answer = item.querySelector('.faq__answer');
            
            question.addEventListener('click', function() {
                const isActive = item.classList.contains('active');
                
                // Close all items
                faqItems.forEach(faqItem => {
                    faqItem.classList.remove('active');
                    const faqAnswer = faqItem.querySelector('.faq__answer');
                    faqAnswer.style.maxHeight = null;
                });
                
                // Open clicked item if it wasn't active
                if (!isActive) {
                    item.classList.add('active');
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                }
            });
        });
    });
</script>

<style>
    .faq {
        padding: 80px 0;
    }
    
    .faq__container {
        max-width: 900px;
        margin: 0 auto;
    }
    
    .faq__text {
        margin-bottom: 40px;
    }
    
    .faq__items {
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
    
    .faq__item {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }
    
    .faq__question {
        padding: 20px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
    }
    
    .faq__question h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 500;
    }
    
    .faq__toggle {
        transition: transform 0.3s ease;
    }
    
    .faq__item.active .faq__toggle {
        transform: rotate(45deg);
    }
    
    .faq__answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }
    
    .faq__answer-content {
        padding-bottom: 20px;
    }
</style>

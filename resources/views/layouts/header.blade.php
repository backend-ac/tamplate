<header class="header">
    <div class="container">
        <div class="header__wrapper">
            <a href="/"><img src="{{  asset('storage/' . $siteSettings?->logo) ?? asset('img/logo.svg') }}" alt=""></a>
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="header__nav">
                <ul>
                    @php
                        $navigationBlocks = \App\Models\Block::where('enabled', true)
                            ->where('show_in_navigation', true)
                            ->orderBy('sort')
                            ->get();
                    @endphp
                    
                    @foreach($navigationBlocks as $block)
                        @php
                            $pageSlug = $block->page->slug ?? '#';
                            $blockType = $block->type;
                            $currentLocale = app()->getLocale();
                            $content = $block->content[$currentLocale] ?? [];
                            $title = $content['title'] ?? ($blockType === 'model' ? ($content['title_1'] ?? $blockType) : $blockType);
                        @endphp
                        <li>
                            <a href="#{{ $blockType }}">{{ $title }}</a>
                        </li>
                    @endforeach
                    
                    @if($navigationBlocks->isEmpty())
                        <li>
                            <a href="#about">О компании</a>
                        </li>
                        <li>
                            <a href="#adv">Преимущества</a>
                        </li>
                        <li>
                            <a href="#gallery">Галерея</a>
                        </li>
                        <li>
                            <a href="#services">Услуги</a>
                        </li>
                        <li>
                            <a href="#reviews">Отзывы</a>
                        </li>
                        <li>
                            <a href="#contacts">Контакты</a>
                        </li>
                    @endif
                </ul>
            </nav>
            @php
                $currentLocale = app()->getLocale();
                $availableLocales = $siteSettings?->locales ?? [
                    ['value' => 'ru'],
                    ['value' => 'en'],
                    ['value' => 'kk']
                ];
                $isMultilingual = $siteSettings?->is_multilingual ?? true;
                
                $localeLabels = [
                    'ru' => 'RU',
                    'en' => 'EN',
                    'kk' => 'KZ',
                ];
            @endphp
            @if($isMultilingual && count($availableLocales) > 1)
            <div class="header__lang">
                <span>{{ $localeLabels[$currentLocale] ?? strtoupper($currentLocale) }}</span>
                <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 1.5L7 6.5L2 1.5" stroke="#6B53F6" stroke-width="3" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <div class="header__lang-group">
                    @foreach($availableLocales as $locale)
                        @php
                            $localeCode = is_array($locale) ? ($locale['value'] ?? 'ru') : $locale;
                            $localeUrl = $localeCode === ($siteSettings?->default_locale ?? 'ru') 
                                ? url('/') 
                                : url('/' . $localeCode);
                        @endphp
                        <a class="{{ $currentLocale === $localeCode ? 'active' : '' }}" 
                           href="{{ $localeUrl }}">
                            {{ $localeLabels[$localeCode] ?? strtoupper($localeCode) }}
                        </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</header>

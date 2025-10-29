<footer class="footer">
    <div class="footer__wrapper container">
        <div class="footer__top">
            <a href="/"><img src="{{  asset('storage/' . $siteSettings?->logo) ?? asset('img/logo.svg') }}" alt=""></a>
            <div class="footer__contacts">
                <h3>Контакты</h3>
                <ul>
                    @php
                        $contacts = $siteSettings?->footer_contacts ?? [];
                    @endphp
                    @foreach($contacts as $contact)
                        <li>
                            @if(!empty($contact['address']))
                                <p>{{ $contact['address'] }}</p>
                            @endif
                            @if(!empty($contact['phones']))
                                @foreach($contact['phones'] as $phone)
                                    @if(!empty($phone['number']))
                                        <span>
                                            <a href="tel:{{ preg_replace('/[^0-9]/', '', $phone['number']) }}">{{ $phone['number'] }}</a>
                                            @if(!empty($phone['label']))
                                                - {{ $phone['label'] }}
                                            @endif
                                        </span>
                                    @endif
                                @endforeach
                            @endif
                            @if(!empty($contact['email']))
                                <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="footer__bot">
            <span>{{ $siteSettings?->footer_copyright ?? 'KAZSNAB-GROUP 2025, © Все права защищены' }}</span>
            <a href="https://astanacreative.kz/">Разработано в Astana Creative</a>
        </div>
    </div>
</footer>

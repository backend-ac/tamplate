@extends('layouts.index')
@section('content')
    <main>
        <section class="hero">
            <div class="swiper hero__slider">
              <div class="swiper-wrapper">
                        <div class="swiper-slide hero__slide">
                            <img class="bg-img" src="./img/hero-img.png" alt="">
                            <div class="container">
                                <div class="hero__content">
                                    <h1 class="title">Оптовая продажа дизельного топлива</h1>
                                    <p>С 2007 года надежно поставляем дизельное топливо оптом. Гарантируем высокое
                                        качество, своевременную доставку и выгодные условия сотрудничества для вашего
                                        бизнеса.</p>
                                    <a class="open-modal btn-hov" href="javascript:;">Позвонить нам</a>
                                </div>
                            </div>
                        </div>
              </div>
              <div class="container">
                        <div class="hero__nav-btn">
                            <div class="swiper-button-prev">
                                <svg width="52" height="53" viewBox="0 0 52 53" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M26 51.5C12.1929 51.5 1 40.3071 1 26.5C1 12.6929 12.1929 1.5 26 1.5C39.8071 1.5 51 12.6929 51 26.5C51 40.3071 39.8071 51.5 26 51.5Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M36.0001 26.5H16.0001" stroke="white" stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M26 36.5004L16 26.5004L26 16.5004" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                            </div>
                            <div class="swiper-button-next">
                                <svg width="52" height="53" viewBox="0 0 52 53" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M26 51.5C39.8071 51.5 51 40.3071 51 26.5C51 12.6929 39.8071 1.5 26 1.5C12.1929 1.5 1 12.6929 1 26.5C1 40.3071 12.1929 51.5 26 51.5Z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M15.9999 26.5H35.9999" stroke="white" stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M26 36.5004L36 26.5004L26 16.5004" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                            </div>
                        </div>
              </div>
            </div>
        </section>
        <section class="about indent">
          <div class="container">
            <div class="about__container">
                <h2 class="title">О компании</h2>
                <div class="about__block">
                  <div class="about__left">
                    <p>Компания "Алем Трейд" с 2007 года является надежным поставщиком дизельного топлива оптом. Мы
                      специализируемся на продаже высококачественного топлива, соответствующего международным стандартам,
                      что гарантирует его эффективность и безопасность для использования в различных типах двигателей.</p>
                  </div>
                  <div class="about__image">
                    <img src="/storage/blocks/hero/01KC40C49BPDQND5Q2RSN40JXZ.webp" alt="">
                  </div>
                </div>
            </div>
          </div>
        </section>
        <section class="assortment container indent">
            <h2 class="title">Наш ассортимент топлива</h2>
            <p>Мы предлагаем широкий выбор российского и казахстанского дизельного топлива для различных сфер
                деятельности.</p>
            <div class="assortment__wrapper">
                <div class="assortment__card">
                    <img src="./img/assortment-img.svg" alt="">
                    <h3>Зимнее дизельное топливо</h3>
                    <p>предназначено для эксплуатации при температурах от –15 °С до –35 °С.</p>
                    <p>Обеспечивает надежную работу двигателя в холодных условиях, предотвращая загустевание топлива
                    </p>
                </div>
            </div>
        </section>
        <section class="supplies indent">
            <div class="supplies__wrapper container">
                <h2 class="title">Способы поставки топлива</h2>
                <p>Мы предлагаем удобные и надежные варианты поставки в зависимости от ваших потребностей:</p>
                <div class="assortment__wrapper">
                    <div class="assortment__card">
                        <img src="./img/assortment-img.svg" alt="">
                        <h3>Ж/д транспортом (Вагон-цистерны)</h3>
                        <p>эффективная перевозка крупных объемов на дальние расстояния.</p>
                    </div>
                </div>
                <a href="javascript:;" class="btn-hov open-modal">Позвонить нам</a>
            </div>
        </section>
        <section class="why-us container indent">
            <div class="why-us__wrapper">
                <div class="why-us__left">
                    <h2 class="title">Почему выбирают нас</h2>
                    <p>Мы обеспечиваем стабильные поставки качественного дизельного топлива и предоставляем надежный
                        сервис. Наш опыт, собственный автопарк и профессиональный подход позволяют нам предлагать
                        клиентам выгодные условия сотрудничества и оперативную доставку.</p>
                    <a href="javascript:;" class="btn-hov open-modal">Позвонить нам</a>
                </div>
                <div class="why-us__right">
                    <div class="why-us__card">
                        <img src="./img/assortment-img.svg" alt="">
                        <div class="why-us__desc">
                            <h3>Всегда в наличии</h3>
                            <p>обеспечиваем бесперебойные поставки дизельного топлива независимо от сезона и спроса.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="stations indent">
            <div class="stations__wrapper container">
                <div class="why-us__wrapper">
                    <div class="why-us__left">
                        <h2 class="title">Мобильные топливозаправочные станции</h2>
                        <p>Надежное и удобное решение для хранения и заправки топлива в любом месте. Гарантируем
                            качество, безопасность и выгодные условия!</p>
                        <a href="javascript:;" class="btn-hov open-modal">Позвонить нам</a>
                    </div>
                    <div class="stations__right">
                        <div class="stations__card why-us__card">
                            <img src="./img/assortment-img.svg" alt="">
                            <h3>Продажа мини-АЗС</h3>
                            <p>подберем оптимальное решение для вашего бизнеса с учетом всех требований.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="advantages assortment container indent">
            <h2 class="title">Преимущества Мини АЗС</h2>
            <div class="assortment__wrapper">
                <div class="assortment__card">
                    <img src="./img/assortment-img.svg" alt="">
                    <h3>Экономия</h3>
                    <p>Вы сможете покупать топливо по низким ценам и сократить затраты до 15 тенге с каждого литра,
                        в зависимости от региона и сезонности</p>
                </div>
            </div>
            <a href="javascript:;" class="btn-hov open-modal">Позвонить нам</a>
        </section>
        <section class="model container indent">
            <h2 class="title">Модельный ряд мини АЗС</h2>
            <div class="model__wrapper">
                <img src="./img/model-img.png" alt="">
            </div>
            <h2 class="title">Нефтебаза в Астане</h2>
            <div class="model__wrapper">
                <img src="./img/model-img2.png" alt="">
            </div>
        </section>
        <section class="office indent">
            <div class="office__wrapper">
                <h2 class="title">Нефтебаза и Офис в Актау</h2>
                <div class="swiper container office__slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-prev">
                        <svg style="transform: rotate(180deg);" width="84" height="84" viewBox="0 0 84 84"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M42 82C64.0914 82 82 64.0914 82 42C82 19.9086 64.0914 2 42 2C19.9086 2 2 19.9086 2 42C2 64.0914 19.9086 82 42 82Z"
                                fill="#DD2B1C" stroke="#DD2B1C" stroke-width="3" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path d="M25.9998 42H57.9998" stroke="white" stroke-width="3" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M42 58.0005L58 42.0005L42 26.0005" stroke="white" stroke-width="3"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="swiper-button-next">
                        <svg width="84" height="84" viewBox="0 0 84 84" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M42 82C64.0914 82 82 64.0914 82 42C82 19.9086 64.0914 2 42 2C19.9086 2 2 19.9086 2 42C2 64.0914 19.9086 82 42 82Z"
                                fill="#DD2B1C" stroke="#DD2B1C" stroke-width="3" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path d="M25.9998 42H57.9998" stroke="white" stroke-width="3" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M42 58.0005L58 42.0005L42 26.0005" stroke="white" stroke-width="3"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                </div>
                <h2 class="title">Нефтебаза и Офис в Атырау</h2>
                <div class="swiper container office__slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="office__slide">
                                <img src="./img/model-img.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-prev">
                        <svg style="transform: rotate(180deg);" width="84" height="84" viewBox="0 0 84 84"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M42 82C64.0914 82 82 64.0914 82 42C82 19.9086 64.0914 2 42 2C19.9086 2 2 19.9086 2 42C2 64.0914 19.9086 82 42 82Z"
                                fill="#DD2B1C" stroke="#DD2B1C" stroke-width="3" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path d="M25.9998 42H57.9998" stroke="white" stroke-width="3" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M42 58.0005L58 42.0005L42 26.0005" stroke="white" stroke-width="3"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="swiper-button-next">
                        <svg width="84" height="84" viewBox="0 0 84 84" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M42 82C64.0914 82 82 64.0914 82 42C82 19.9086 64.0914 2 42 2C19.9086 2 2 19.9086 2 42C2 64.0914 19.9086 82 42 82Z"
                                fill="#DD2B1C" stroke="#DD2B1C" stroke-width="3" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path d="M25.9998 42H57.9998" stroke="white" stroke-width="3" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M42 58.0005L58 42.0005L42 26.0005" stroke="white" stroke-width="3"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                </div>
            </div>
        </section>
        <section class="model indent">
            <h2 class="title">Нефтебаза и Офис в Актау</h2>
            <div class="model__wrapper">
                <img src="./img/model-img.png" alt="">
                <img src="./img/model-img.png" alt="">
                <img src="./img/model-img.png" alt="">
            </div>
        </section>
        <section class="certificate office indent">
            <div class="office__wrapper">
                <h2 class="title">Нефтебаза и Офис в Актау</h2>
                <div class="swiper container certificate__slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="certificate__slide">
                                <img id="fullscreenImage" id="fullscreenImage" src="./img/certificate.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="certificate__slide">
                                <img id="fullscreenImage" src="./img/certificate.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="certificate__slide">
                                <img id="fullscreenImage" src="./img/certificate.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="certificate__slide">
                                <img id="fullscreenImage" src="./img/certificate.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="certificate__slide">
                                <img id="fullscreenImage" src="./img/certificate.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="certificate__slide">
                                <img id="fullscreenImage" src="./img/certificate.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-prev">
                        <svg style="transform: rotate(180deg);" width="84" height="84" viewBox="0 0 84 84"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M42 82C64.0914 82 82 64.0914 82 42C82 19.9086 64.0914 2 42 2C19.9086 2 2 19.9086 2 42C2 64.0914 19.9086 82 42 82Z"
                                fill="#DD2B1C" stroke="#DD2B1C" stroke-width="3" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path d="M25.9998 42H57.9998" stroke="white" stroke-width="3" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M42 58.0005L58 42.0005L42 26.0005" stroke="white" stroke-width="3"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="swiper-button-next">
                        <svg width="84" height="84" viewBox="0 0 84 84" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M42 82C64.0914 82 82 64.0914 82 42C82 19.9086 64.0914 2 42 2C19.9086 2 2 19.9086 2 42C2 64.0914 19.9086 82 42 82Z"
                                fill="#DD2B1C" stroke="#DD2B1C" stroke-width="3" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path d="M25.9998 42H57.9998" stroke="white" stroke-width="3" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M42 58.0005L58 42.0005L42 26.0005" stroke="white" stroke-width="3"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                </div>
            </div>
        </section>
        <section class="partners indent">
            <h2 class="title">Партнеры</h2>
            <div class="swiper container certificate__slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="partners__slide">
                            <img src="./img/partners.png" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="partners__slide">
                            <img src="./img/partners.png" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="partners__slide">
                            <img src="./img/partners.png" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="partners__slide">
                            <img src="./img/partners.png" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="partners__slide">
                            <img src="./img/partners.png" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="partners__slide">
                            <img src="./img/partners.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

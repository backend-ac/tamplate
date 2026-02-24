document.addEventListener("DOMContentLoaded", (event) => {

    const burger = document.querySelector('.burger');
    const menu = document.querySelector('.header__nav');
    const menuLinks = document.querySelectorAll('.header__nav ul a')

    burger.addEventListener('click', () => {
        burger.classList.toggle('active');
        menu.classList.toggle('active');
    });
    menuLinks.forEach((link) => {
        link.addEventListener('click', () => {
            burger.classList.remove('active');
        menu.classList.remove('active');
        })
    })

    const lang = document.querySelector('.header__lang');
    const langGroup = document.querySelector('.header__lang-group');

    lang.addEventListener('click', () => {
        langGroup.classList.toggle('active');
        lang.classList.toggle('active');
    });

    const modelSlider = new Swiper('.office__slider', {
        speed: 700,
        spaceBetween: 30,
        loop: true,
        breakpoints: {
            320: {
                slidesPerView: 1.2,
            },
            540: {
                slidesPerView: 1.6,
            },
            767: {
                slidesPerView: 2.5,
            },
            998: {
                slidesPerView: 3.4,
            },
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // autoplay: {
        //     delay: 3500,
        //     stopOnLastSlide: false,
        //     disableOnInteraction: false,
        // },
    });
    const certificateSlider = new Swiper('.certificate__slider', {
        speed: 700,
        spaceBetween: 30,
        loop: true,
        breakpoints: {
            320: {
                slidesPerView: 1.8,
            },
            540: {
                slidesPerView: 2.5,
            },
            767: {
                slidesPerView: 3.5,
            },
            998: {
                slidesPerView: 5.4,
            },
        },

        navigation: {
            nextEl: '.certificate__slider .swiper-button-next',
            prevEl: '.certificate__slider .swiper-button-prev',
        },
        // autoplay: {
        //     delay: 3500,
        //     stopOnLastSlide: false,
        //     disableOnInteraction: false,
        // },
    });


    
    const images = document.querySelectorAll(".certificate__slide");

    images.forEach((image) => {
        image.addEventListener("click", function () {
            if (!document.fullscreenElement) {
                // Вход в полноэкранный режим
                if (image.requestFullscreen) {
                    image.requestFullscreen();
                } else if (image.webkitRequestFullscreen) { // Safari
                    image.webkitRequestFullscreen();
                } else if (image.msRequestFullscreen) { // IE11
                    image.msRequestFullscreen();
                }
                image.classList.add("fullscreen"); // Добавляем класс для смены курсора
            } else {
                // Выход из полноэкранного режима
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) { // Safari
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) { // IE11
                    document.msExitFullscreen();
                }
                image.classList.remove("fullscreen"); // Убираем класс при выходе из полноэкранного режима
            }
        });
    });
    if (!document.fullscreenElement) {
        // При выходе из полноэкранного режима убираем класс со всех изображений
        images.forEach((image) => {
            image.classList.remove("fullscreen");
        });
    };

    const modal = document.querySelector('.modal');
    const openModal = document.querySelectorAll('.open-modal');
    const cloeModal = document.querySelector('.close-modal');

    if(openModal.length) {
      openModal.forEach((open) => {
          open.addEventListener('click', () => {
              modal.classList.add('active');
              document.documentElement.style.overflow = "hidden";
          });
      });
    }
    if(cloeModal) {
      cloeModal.addEventListener('click', () => {
          modal.classList.remove('active');
          document.documentElement.style.overflow = "auto";
      });
    }

    $('input[type="tel"]').on('click', function () {
    }).mask('+7 (999) 999 99 99');
});

window.onload = () => {
    const heroSlider = new Swiper('.hero__slider', {
      slidesPerView: 1,
      effect: 'fade',
      fadeEffect: { crossFade: true },
      // loop: true,
      // speed: 2000,
      autoplay: {
        delay: 5000,
      },
      navigation: {
        prevEl: '.hero__nav-btn .swiper-button-prev',
        nextEl: '.hero__nav-btn .swiper-button-next'
      }
    });
}
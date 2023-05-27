$(document).ready(function () {
    new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 20,
        breakpoints: {
            1920: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            1028: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
});
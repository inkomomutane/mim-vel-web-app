import '@splidejs/splide/css';
import Splide from '@splidejs/splide';
const options = [
    '.avaliar',
]
const choices = options.map((e) => document.querySelector(e) ? new Choices(e, {}) : null);


document.addEventListener('DOMContentLoaded', function () {
    let splide = new Splide('.splide', {
    //     cover: true,
        autoplay: true,
        type: 'loop',
        pagination: false,
        isNavigation: false,
        lazyLoad: true,

    });
    let thumb = new Splide('#thumbnail-carousel', {
        fixedWidth: 100,
        fixedHeight: 60,
        gap: 10,
        rewind: true,
        pagination: false,
        isNavigation: true,
        lazyLoad: true,
    });
    splide.sync(thumb);
    splide.mount();
    thumb.mount();
});


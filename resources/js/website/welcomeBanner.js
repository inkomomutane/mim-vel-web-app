import Swiper, { Pagination, Autoplay } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
new Swiper(".default", {
    modules: [Pagination, Autoplay],
    loop: true,
    speed: 400,
    spaceBetween: 0,
    grabCursor: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
});



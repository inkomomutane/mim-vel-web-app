const options = [
    '.avaliar',
]
const choices = options.map((e) => document.querySelector(e) ? new Choices(e,{}): null);


window.onload = function(){
    const swiper = new window.Swiper('.swiper-container', {
        speed: 1200,
        spaceBetween: 0,
        grabCursor: true,
        loop:true,
        autoplay: {
            delay: 6500,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
      });
    }

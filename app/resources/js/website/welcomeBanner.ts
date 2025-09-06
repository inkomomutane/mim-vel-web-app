import Splide from "@splidejs/splide";
import "@splidejs/splide/css";
window.addEventListener("load", function () {
    const thumb = this.document.getElementById("thumbnail-slide");
    const relevantImovels = this.document.getElementById("relevant-imovels");
    const newAddedHouses  = this.document.getElementById("new-added-houses");
    const relatedHouses  = this.document.getElementById("relatedHouses");
    const relevantHotels = this.document.getElementById("relevantHotels");


    /** Slider for hotels */

    const hotelSlider = this.document.getElementsByClassName('hotel-slider') ?? [];
    if(hotelSlider.length > 0){
        for (let index = 0; index < hotelSlider.length; index++) {
            const element = hotelSlider[index] as HTMLElement;
            const hotelSliderLoop = new Splide(element, {
                arrows: false,
                perPage: 1,
                gap: 5,
                breakpoints: {
                    768: {
                        perPage: 1,
                        width: 768,
                        mediaQuery: 'max'
                    },
                    1280 : {
                        perPage: 1,
                        width: 1280,
                        mediaQuery: 'max'
                    },
                    1536 : {
                        perPage: 1,
                        width: 1536,
                        mediaQuery: 'max'
                    }
                }
            });
            hotelSliderLoop.mount();
        }
    }

    /** End slider for hotels */



    if (relevantImovels != null) {
        const relevantImovelsSlide = new Splide("#relevant-imovels", {
            arrows: false,
            perPage: 4,
            gap: 5,
            breakpoints: {
                768: {
                    perPage: 1,
                    width: 768,
                    mediaQuery: 'max'
                },
                1280 : {
                    perPage: 2,
                    width: 1280,
                    mediaQuery: 'max'
                },
                1536 : {
                    perPage: 3,
                    width: 1536,
                    mediaQuery: 'max'
                }
            }
        });
        relevantImovelsSlide.mount();
    }
    if(newAddedHouses !=null){
        const newAddedHousesSlide = new Splide("#new-added-houses", {
            arrows: false,
            perPage: 4,
            gap: 5,
            breakpoints: {
                768: {
                    perPage: 1,
                    width: 768,
                    mediaQuery: 'max'
                },
                1280 : {
                    perPage: 2,
                    width: 1280,
                    mediaQuery: 'max'
                },
                1536 : {
                    perPage: 3,
                    width: 1536,
                    mediaQuery: 'max'
                }
            }
        });
        newAddedHousesSlide.mount();
    }
    if(relatedHouses !=null){
        const relatedHousesSlide = new Splide("#relatedHouses", {
            arrows: false,
            perPage: 4,
            gap: 5,
            breakpoints: {
                768: {
                    perPage: 1,
                    width: 768,
                    mediaQuery: 'max'
                },
                1280 : {
                    perPage: 2,
                    width: 1280,
                    mediaQuery: 'max'
                },
                1536 : {
                    perPage: 3,
                    width: 1536,
                    mediaQuery: 'max'
                }
            }
        });
        relatedHousesSlide.mount();
    }
    if(relevantHotels != null ){
        const relevantHotelsSlide = new Splide("#relevantHotels", {
            arrows: false,
            perPage: 4,
            gap: 5,
            breakpoints: {
                768: {
                    perPage: 1,
                    width: 768,
                    mediaQuery: 'max'
                },
                1280 : {
                    perPage: 2,
                    width: 1280,
                    mediaQuery: 'max'
                },
                1536 : {
                    perPage: 3,
                    width: 1536,
                    mediaQuery: 'max'
                }
            }
        });
        relevantHotelsSlide.mount();
    }

    if (thumb != null) {
        const splide = new Splide(".default", {
            arrows: false,
        });

        const thumbnails = new Splide("#thumbnail-slide", {
            fixedWidth: 100,
            fixedHeight: 60,
            gap: 10,
            rewind: true,
            pagination: false,
            isNavigation: true,
            arrows: false,
        });

        splide.sync(thumbnails);
        splide.mount();
        thumbnails.mount();
    } else {
        const splide = new Splide(".default", {
            arrows: false,
        });
        splide.mount();
    }
});

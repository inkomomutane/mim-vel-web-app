import Splide from '@splidejs/splide';
import '@splidejs/splide/css';
window.addEventListener('load',function(){

const thumb = this.document.getElementById('thumbnail-slide');

if(thumb!=null){
    const splide =  new Splide( '.default',{
        arrows:false
    });

   const thumbnails =  new Splide( '#thumbnail-slide',{
    fixedWidth: 100,
    fixedHeight: 60,
    gap: 10,
    rewind: true,
    pagination: false,
    isNavigation: true,
    arrows:false
   });

  splide.sync( thumbnails );
  splide.mount();
thumbnails.mount();

}else{

    const splide =  new Splide( '.default',{
        arrows:false
    });

    splide.mount();
}




})




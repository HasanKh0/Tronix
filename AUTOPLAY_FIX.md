# Fix Slider Autoplay

The slider CSS has been updated with smaller mobile height. Now you need to add autoplay to the Swiper configuration.

## Update home.php

Find lines 209-216 in `home.php` which look like:
```javascript
var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});
```

**Replace with:**
```javascript
var swiper = new Swiper(".home-slider", {
   loop: true,
   spaceBetween: 20,
   effect: 'fade',
   fadeEffect: {
      crossFade: true
   },
   speed: 800,
   autoplay: {
      delay: 5000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
   },
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
   },
   navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
   },
   grabCursor: true,
});
```

## What This Adds:
- ✅ Auto-slide every 5 seconds
- ✅ Smooth fade transitions
- ✅ Pause on hover
- ✅ Navigation arrow support
- ✅ Better cursor interaction

## Mobile Height Fixed:
- ✅ Reduced from 25rem to 18rem on tablets
- ✅ Reduced to 15rem on small phones
- ✅ Tighter spacing throughout
- ✅ Much more compact mobile view

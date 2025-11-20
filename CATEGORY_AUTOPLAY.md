# Add Category Auto-Slide

The category slider needs slow auto-slide functionality.

## Update home.php

Find the category slider configuration (around lines 233-254) which looks like:
```javascript
 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});
```

**Replace with:**
```javascript
 var swiper = new Swiper(".category-slider", {
   loop: true,
   spaceBetween: 20,
   speed: 1000,
   autoplay: {
      delay: 7000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
   },
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
      },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});
```

## What This Adds:
- ✅ Slow auto-slide every 7 seconds
- ✅ Smooth 1-second transition
- ✅ Works on ALL devices (desktop, tablet, mobile)
- ✅ Pause on hover
- ✅ Infinite loop

Save and refresh to see the categories smoothly auto-scrolling! 🎨

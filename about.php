
<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About - Tronix</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/slider.css">
   <link rel="stylesheet" href="css/products.css">
   <link rel='stylesheet' href= "css/category.css">
   <link rel="stylesheet" href="css/about.css">
   <link rel='stylesheet' href= "css/footer.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- About Section -->
<section class="about">
   <div class="about-container">
      <div class="about-header">
         <h1>About Tronix</h1>
         <p class="subtitle">Your Trusted Online Electronics Marketplace</p>
      </div>

      <div class="about-content">
         <div class="about-card">
            <div class="card-icon">
               <i class="fas fa-shopping-bag"></i>
            </div>
            <h3>What is Tronix?</h3>
            <p>Tronix is Lebanon's leading e-commerce platform dedicated to providing customers with a secure, reliable, and convenient online shopping experience. We connect trusted sellers with quality electronics and digital products, ensuring every transaction meets our high standards of excellence.</p>
         </div>

         <div class="about-card">
            <div class="card-icon">
               <i class="fas fa-concierge-bell"></i>
            </div>
            <h3>Our Services</h3>
            <ul class="services-list">
               <li><i class="fas fa-check"></i> Wide selection of electronics and digital products</li>
               <li><i class="fas fa-check"></i> Secure payment gateway and buyer protection</li>
               <li><i class="fas fa-check"></i> Fast and reliable delivery with tracking</li>
               <li><i class="fas fa-check"></i> 7-day easy return and refund policy</li>
               <li><i class="fas fa-check"></i> Game vouchers and gift cards</li>
               <li><i class="fas fa-check"></i> Multiple pickup points for convenience</li>
               <li><i class="fas fa-check"></i> 24/7 customer support</li>
            </ul>
         </div>

         <div class="about-card">
            <div class="card-icon">
               <i class="fas fa-cogs"></i>
            </div>
            <h3>What We Can Do</h3>
            <p>Tronix empowers you to shop for thousands of products with confidence. Our intelligent seller rating system, strict quality control, and buyer protection policies ensure you receive genuine products. Whether you're looking for the latest gadgets, accessories, or digital services, we make online shopping safe, affordable, and hassle-free.</p>
         </div>
      </div>
   </div>
</section>

<!-- Map Section -->
<section class="map-section">
   <div class="map-container">
      <h2>Find Us</h2>
      <p>Visit our headquarters in Beirut, Lebanon</p>
      <div class="map-wrapper">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.2436869411366!2d35.4928!3d33.8886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f1a0000000001%3A0x0!2sLebanon%20University!5e0!3m2!1sen!2slb!4v1234567890" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
   </div>
</section>

<!-- Reviews Section -->
<section class="reviews">
   
   <h1 class="heading">What Our Clients Say</h1>
   <p class="reviews-subtitle">Real experiences from real customers</p>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="review-card">
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <p class="review-text">Been using their services for quite a bit and have never had an issue with the quality of their products. Online e-products working great as well. Only issue I have is they usually deliver when I'm a little caught up, though I've set a preferred delivery time. Everything else has been good.</p>
               <div class="review-author">
                  <img src="images/male1.jpeg" alt="Issa Kalash">
                  <div class="author-info">
                     <h3><a href="https://www.facebook.com/profile.php?id=100083292714419" target="_blank">Issa Kalash</a></h3>
                     <span class="verified"><i class="fas fa-check-circle"></i> Verified Customer</span>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="review-card">
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <p class="review-text">It is the first online services in Lebanon which we can trust completely. I always unbox making a video and instantly complain if there's anything wrong. Sometimes even don't need to return the item and they process the refund. Tronix do heavy fine to sellers who send wrong products that's why its platform getting better day by day.</p>
               <div class="review-author">
                  <img src="images/female1.jpg" alt="Rita Ghanem">
                  <div class="author-info">
                     <h3><a href="https://www.facebook.com/profile.php?id=100075602340579" target="_blank">Rita Ghanem</a></h3>
                     <span class="verified"><i class="fas fa-check-circle"></i> Verified Customer</span>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="review-card">
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <p class="review-text">Tronix is great if you choose good sellers. A variety of required item available. Customers can return and refund full amount within 7 days easily. Tronix is boosting eCommerce business in Beirut. It provides great opportunity to sale items online with ease.</p>
               <div class="review-author">
                  <img src="images/male2.jpeg" alt="Chadi Owaidet">
                  <div class="author-info">
                     <h3><a href="https://www.facebook.com/HasanKheireddine" target="_blank">Chadi Owaidet</a></h3>
                     <span class="verified"><i class="fas fa-check-circle"></i> Verified Customer</span>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="review-card">
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <p class="review-text">Using Tronix for online shopping from almost 3 years. Outstanding experience with them. Game vouchers and pick up point as delivery with 0 shipping charges are super saving services.</p>
               <div class="review-author">
                  <img src="images/female2.jpeg" alt="Nancy Daher">
                  <div class="author-info">
                     <h3><a href="https://www.facebook.com/NancyDaher0/" target="_blank">Nancy Daher</a></h3>
                     <span class="verified"><i class="fas fa-check-circle"></i> Verified Customer</span>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="review-card">
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <p class="review-text">I have been using their services for the last 2 years and I have found them extremely reliable. Their return policy is what gives you an extra layer of reliance and peace of mind. In case the product doesn't meet your expectations or if there is any fault in it, then you can return the product within seven days from the date of delivery.</p>
               <div class="review-author">
                  <img src="images/male3.jpeg" alt="Alex Dint">
                  <div class="author-info">
                     <h3><a href="https://www.facebook.com/ranjitchaudhary159" target="_blank">Alex Dint</a></h3>
                     <span class="verified"><i class="fas fa-check-circle"></i> Verified Customer</span>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="review-card">
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
               <p class="review-text">Tronix is cool! I have ordered hundreds of products from it and never got any scam. It delivers products in time without delay. Packaging of products are strong and delivery rates are too low. Just amazing Website will keep shopping from Tronix.</p>
               <div class="review-author">
                  <img src="images/male4.jpeg" alt="Fawzi Mahmoud">
                  <div class="author-info">
                     <h3><a href="https://www.facebook.com/pra.x.nil" target="_blank">Fawzi Mahmoud</a></h3>
                     <span class="verified"><i class="fas fa-check-circle"></i> Verified Customer</span>
                  </div>
               </div>
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

   </div>

</section>

<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

<script>
var swiper = new Swiper(".reviews-slider", {
   loop: true,
   autoplay: {
      delay: 5000,
      disableOnInteraction: false,
   },
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
   },
   navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
   },
   breakpoints: {
      0: {
         slidesPerView: 1,
      },
      768: {
         slidesPerView: 2,
      },
      991: {
         slidesPerView: 3,
      },
   },
});
</script>

</body>
</html>
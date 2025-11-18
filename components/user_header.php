<?php
include 'components/connect.php';

$user_id = $_SESSION['user_id'] ?? null;

if(isset($message)){
   foreach((array)$message as $msg){
      echo '
      <div class="message" style="
         background-color: #eaf8ec;
         border: 1px solid Red;
         color: red;
         padding: 10px 15px;
         border-radius: 6px;
         margin: 10px auto;
         width: 80%;
         text-align: center;
         font-size:20px;
         font-weight: 800;
         position: relative;">
         <span>'.$msg.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();" style="
            position:absolute;
            top:13px;
            right:10px;
            cursor:pointer;
            color:red;"></i>
      </div>
      ';
   }
}
?>

<header class="header">
   <section class="flex">

      <a href="home.php" class="logo">Tronix<span>.Com</span></a>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About Us</a>
         <a href="orders.php">Orders</a>
         <a href="shop.php">Shop Now</a>
         <a href="contact.php">Contact Us</a>
      </nav>

      <div class="icons">
         <?php
            $total_wishlist_counts = 0;
            $total_cart_counts = 0;

            if($user_id){
               $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
               $count_wishlist_items->execute([$user_id]);
               $total_wishlist_counts = $count_wishlist_items->rowCount();

               $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
               $count_cart_items->execute([$user_id]);
               $total_cart_counts = $count_cart_items->rowCount();
            }
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php"><i class="fas fa-search"></i>Search</a>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts; ?>)</span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            if($user_id){
               $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
               $select_profile->execute([$user_id]);
               if($select_profile->rowCount() > 0){
                  $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= htmlspecialchars($fetch_profile["name"]); ?></p>
         <a href="update_user.php" class="btn">Update Profile.</a>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('Logout from the website?');">Logout</a>
         <?php
               }
            } else {
         ?>
         <p>Please Login Or Register First to proceed!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">Register</a>
            <a href="user_login.php" class="option-btn">Login</a>
         </div>
         <?php
            }
         ?>
      </div>

   </section>
</header>

<?php
include 'components/connect.php';

// Load modern header styles
echo '<link rel="stylesheet" href="css/header.css">';

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

      <a href="home.php" class="logo">
         <i class="fas fa-bolt"></i>
         Tronix
      </a>

      <nav class="navbar">
         <a href="home.php"><i class="fas fa-home"></i> Home</a>
         <a href="about.php"><i class="fas fa-info-circle"></i> About</a>
         <a href="orders.php"><i class="fas fa-box"></i> Orders</a>
         <a href="shop.php"><i class="fas fa-shopping-bag"></i> Shop</a>
         <a href="contact.php"><i class="fas fa-envelope"></i> Contact</a>
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
         <div id="menu-btn" class="icon-btn">
            <i class="fas fa-bars"></i>
         </div>
         <a href="search_page.php" class="icon-btn" title="Search">
            <i class="fas fa-search"></i>
         </a>
         <a href="wishlist.php" class="icon-btn" title="Wishlist">
            <i class="fas fa-heart"></i>
            <?php if($total_wishlist_counts > 0): ?>
               <span class="badge"><?= $total_wishlist_counts; ?></span>
            <?php endif; ?>
         </a>
         <a href="cart.php" class="icon-btn" title="Cart">
            <i class="fas fa-shopping-cart"></i>
            <?php if($total_cart_counts > 0): ?>
               <span class="badge"><?= $total_cart_counts; ?></span>
            <?php endif; ?>
         </a>
         <div id="user-btn" class="icon-btn" title="Account">
            <i class="fas fa-user"></i>
         </div>
      </div>

      <div class="profile">
         <?php
            if($user_id){
               $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
               $select_profile->execute([$user_id]);
               if($select_profile->rowCount() > 0){
                  $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <div class="profile-header">
            <div class="avatar">
               <i class="fas fa-user-circle"></i>
            </div>
            <div class="user-info">
               <p class="username"><?= htmlspecialchars($fetch_profile["name"]); ?></p>
               <span class="user-email">Welcome back!</span>
            </div>
         </div>
         <div class="profile-links">
            <a href="update_user.php" class="profile-link">
               <i class="fas fa-user-edit"></i>
               <span>Update Profile</span>
            </a>
            <a href="orders.php" class="profile-link">
               <i class="fas fa-box"></i>
               <span>My Orders</span>
            </a>
            <a href="wishlist.php" class="profile-link">
               <i class="fas fa-heart"></i>
               <span>Wishlist</span>
            </a>
            <a href="components/user_logout.php" class="profile-link logout" onclick="return confirm('Logout from the website?');">
               <i class="fas fa-sign-out-alt"></i>
               <span>Logout</span>
            </a>
         </div>
         <?php
               }
            } else {
         ?>
         <div class="profile-header">
            <div class="avatar">
               <i class="fas fa-user-circle"></i>
            </div>
            <p class="guest-text">Please Login Or Register!</p>
         </div>
         <div class="profile-links">
            <a href="user_login.php" class="profile-link">
               <i class="fas fa-sign-in-alt"></i>
               <span>Login</span>
            </a>
            <a href="user_register.php" class="profile-link">
               <i class="fas fa-user-plus"></i>
               <span>Register</span>
            </a>
         </div>
         <?php
            }
         ?>
      </div>

   </section>
</header>

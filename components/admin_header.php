<?php
include 'connect.php';


$admin_id = $_SESSION['admin_id'] ?? null;


if(isset($message)){
   foreach((array)$message as $msg){
      echo '
      <div class="message" style="
         background-color: #eaf8ec;
         border: 1px solid red;
         color: red;
         padding: 10px 15px;
         border-radius: 6px;
         margin: 10px auto;
         width: 80%;
         text-align: center;
         font-weight: 800;
         font-size:20px;
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

      <a href="../admin/dashboard.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="../admin/dashboard.php">Home</a>
         <a href="../admin/products.php">Products</a>
         <a href="../admin/placed_orders.php">Orders</a>
         <a href="../admin/admin_accounts.php">Admins</a>
         <a href="../admin/users_accounts.php">Users</a>
         <a href="../admin/messages.php">Messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            if($admin_id){
               $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
               $select_profile->execute([$admin_id]);
               if($select_profile->rowCount() > 0){
                  $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= htmlspecialchars($fetch_profile['name']); ?></p>
         <a href="../admin/update_profile.php" class="btn">Update Profile</a>
         <a href="../components/admin_logout.php" class="delete-btn" onclick="return confirm('Logout from the admin panel?');">Logout</a>
         <?php
               }
            } else {
         ?>
         <p>Please Login Or Register First!</p>
         <div class="flex-btn">
            <a href="../admin/register_admin.php" class="option-btn">Register</a>
            <a href="../admin/admin_login.php" class="option-btn">Login</a>
         </div>
         <?php
            }
         ?>
      </div>

   </section>
</header>

<?php

include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}

$message = '';
$message_type = '';

if(isset($_POST['submit'])){

   $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $pass = $_POST['pass'];
   $cpass = $_POST['cpass'];

   // Validate email format
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $message = 'Please enter a valid email address!';
      $message_type = 'error';
   }
   // Validate password length
   elseif(strlen($pass) < 8){
      $message = 'Password must be at least 8 characters long!';
      $message_type = 'error';
   }
   // Validate password strength
   elseif(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $pass)){
      $message = 'Password must contain uppercase, lowercase, number, and special character!';
      $message_type = 'error';
   }
   elseif($pass != $cpass){
      $message = 'Passwords do not match!';
      $message_type = 'error';
   } else {
      $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
      $select_user->execute([$email]);

      if($select_user->rowCount() > 0){
         $message = 'Email already exists!';
         $message_type = 'error';
      } else {
         $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $hashed_pass]);
         $message = 'Registered successfully! Redirecting to login...';
         $message_type = 'success';
         echo "<script>
            setTimeout(() => {
               window.location.href = 'user_login.php';
            }, 2000);
         </script>";
      }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register - Tronix</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/slider.css">
   <link rel="stylesheet" href="css/products.css">
   <link rel='stylesheet' href= "css/category.css">
   <link rel='stylesheet' href= "css/footer.css">
   <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="auth-wrapper">
   <div class="auth-container">
      <div class="auth-box">
         <div class="auth-header">
            <h1>Create Account</h1>
            <p>Join Tronix and start shopping today</p>
         </div>

         <?php if($message): ?>
            <div class="alert alert-<?php echo $message_type; ?>">
               <i class="fas fa-<?php echo $message_type == 'error' ? 'exclamation-circle' : 'check-circle'; ?>"></i>
               <span><?php echo $message; ?></span>
            </div>
         <?php endif; ?>

         <form action="" method="post" class="auth-form">
            <div class="form-group">
               <label for="name">Full Name</label>
               <div class="input-wrapper">
                  <i class="fas fa-user"></i>
                  <input type="text" id="name" name="name" required placeholder="John Doe" maxlength="50" class="form-input">
               </div>
            </div>

            <div class="form-group">
               <label for="email">Email Address</label>
               <div class="input-wrapper">
                  <i class="fas fa-envelope"></i>
                  <input type="email" id="email" name="email" required placeholder="you@example.com" maxlength="50" class="form-input">
               </div>
               <small class="form-helper">We'll never share your email</small>
            </div>

            <div class="form-group">
               <label for="pass">Password</label>
               <div class="input-wrapper">
                  <i class="fas fa-lock"></i>
                  <input type="password" id="pass" name="pass" required placeholder="Enter a strong password" maxlength="50" class="form-input" oninput="checkPasswordStrength(this.value)">
                  <button type="button" class="toggle-password" onclick="togglePassword('pass')">
                     <i class="fas fa-eye"></i>
                  </button>
               </div>
               <div class="password-strength">
                  <div class="strength-meter">
                     <div class="strength-bar" id="strengthBar"></div>
                  </div>
                  <small id="strengthText" class="strength-text">Password strength: Weak</small>
               </div>
               <small class="form-helper">Min 8 chars, uppercase, lowercase, number & special char (@$!%*?&)</small>
            </div>

            <div class="form-group">
               <label for="cpass">Confirm Password</label>
               <div class="input-wrapper">
                  <i class="fas fa-lock"></i>
                  <input type="password" id="cpass" name="cpass" required placeholder="Confirm your password" maxlength="50" class="form-input" oninput="matchPassword()">
                  <button type="button" class="toggle-password" onclick="togglePassword('cpass')">
                     <i class="fas fa-eye"></i>
                  </button>
               </div>
               <small id="matchText" class="form-helper"></small>
            </div>

            <button type="submit" name="submit" class="btn-primary">Create Account</button>
         </form>

         <div class="auth-divider">
            <span>or</span>
         </div>

         <button type="button" class="btn-google" onclick="signUpWithGoogle()">
            <i class="fab fa-google"></i>
            Sign up with Google
         </button>

         <div class="auth-footer">
            <p>Already have an account? <a href="user_login.php" class="auth-link">Log in here</a></p>
         </div>
      </div>

      <div class="auth-image">
         <div class="auth-image-content">
            <i class="fas fa-shopping-bag"></i>
            <h2>Welcome to Tronix</h2>
            <p>Your trusted electronics marketplace</p>
         </div>
      </div>
   </div>
</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>
<script src="js/auth.js"></script>
</body>
</html>
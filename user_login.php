<?php


include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

$message = '';
$message_type = '';

if(isset($_POST['submit'])){

   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $pass = $_POST['pass'];

   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $message = 'Please enter a valid email address!';
      $message_type = 'error';
   } else {
      $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
      $select_user->execute([$email]);
      $row = $select_user->fetch(PDO::FETCH_ASSOC);

      if($select_user->rowCount() > 0 && password_verify($pass, $row['password'])){
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');
      } else {
         $message = 'Incorrect email or password!';
         $message_type = 'error';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login - Tronix</title>
   
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
            <h1>Welcome Back</h1>
            <p>Log in to your Tronix account</p>
         </div>

         <?php if($message): ?>
            <div class="alert alert-<?php echo $message_type; ?>">
               <i class="fas fa-<?php echo $message_type == 'error' ? 'exclamation-circle' : 'check-circle'; ?>"></i>
               <span><?php echo $message; ?></span>
            </div>
         <?php endif; ?>

         <form action="" method="post" class="auth-form">
            <div class="form-group">
               <label for="email">Email Address</label>
               <div class="input-wrapper">
                  <i class="fas fa-envelope"></i>
                  <input type="email" id="email" name="email" required placeholder="you@example.com" maxlength="50" class="form-input">
               </div>
            </div>

            <div class="form-group">
               <label for="pass">Password</label>
               <div class="input-wrapper">
                  <i class="fas fa-lock"></i>
                  <input type="password" id="pass" name="pass" required placeholder="Enter your password" maxlength="50" class="form-input">
                  <button type="button" class="toggle-password" onclick="togglePassword('pass')">
                     <i class="fas fa-eye"></i>
                  </button>
               </div>
            </div>

            <div class="form-options">
               <label class="remember-me">
                  <input type="checkbox" name="remember">
                  <span>Remember me</span>
               </label>
               <a href="#" class="forgot-password">Forgot password?</a>
            </div>

            <button type="submit" name="submit" class="btn-primary">Login</button>
         </form>

         <div class="auth-divider">
            <span>or</span>
         </div>

         <button type="button" class="btn-google" onclick="loginWithGoogle()">
            <i class="fab fa-google"></i>
            Continue with Google
         </button>

         <div class="auth-footer">
            <p>Don't have an account? <a href="user_register.php" class="auth-link">Sign up now</a></p>
         </div>
      </div>

      <div class="auth-image">
         <div class="auth-image-content">
            <i class="fas fa-lock"></i>
            <h2>Secure Access</h2>
            <p>Your account is protected with encryption</p>
         </div>
      </div>
   </div>
</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>
<script src="js/auth.js"></script>
</body>
</html>
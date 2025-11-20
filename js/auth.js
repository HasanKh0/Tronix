// Toggle Password Visibility
function togglePassword(fieldId) {
   const field = document.getElementById(fieldId);
   const button = event.currentTarget;
   const icon = button.querySelector('i');

   if (field.type === 'password') {
      field.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
   } else {
      field.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
   }
}

// Check Password Strength
function checkPasswordStrength(password) {
   const strengthBar = document.getElementById('strengthBar');
   const strengthText = document.getElementById('strengthText');
   
   if (!strengthBar) return;

   let strength = 'weak';
   let score = 0;

   // Length check
   if (password.length >= 8) score++;
   if (password.length >= 12) score++;

   // Lowercase check
   if (/[a-z]/.test(password)) score++;

   // Uppercase check
   if (/[A-Z]/.test(password)) score++;

   // Number check
   if (/\d/.test(password)) score++;

   // Special character check
   if (/[@$!%*?&]/.test(password)) score++;

   // Determine strength
   if (score <= 2) strength = 'weak';
   else if (score <= 4) strength = 'fair';
   else if (score <= 5) strength = 'good';
   else strength = 'strong';

   // Update UI
   strengthBar.className = 'strength-bar ' + strength;
   strengthText.className = 'strength-text ' + strength;
   strengthText.textContent = 'Password strength: ' + strength.charAt(0).toUpperCase() + strength.slice(1);
}

// Match Password
function matchPassword() {
   const pass = document.getElementById('pass');
   const cpass = document.getElementById('cpass');
   const matchText = document.getElementById('matchText');

   if (!matchText) return;

   if (cpass.value === '') {
      matchText.textContent = '';
      matchText.style.color = '#999';
   } else if (pass.value === cpass.value) {
      matchText.textContent = '✓ Passwords match';
      matchText.style.color = '#27ae60';
   } else {
      matchText.textContent = '✗ Passwords do not match';
      matchText.style.color = '#ff6b6b';
   }
}

// Google Sign Up
function signUpWithGoogle() {
   alert('Google Sign-up integration coming soon!\n\nTo enable Google Authentication:\n1. Visit https://console.cloud.google.com\n2. Create OAuth 2.0 credentials\n3. Integrate with your app');
   // In production, implement Clerk or Firebase Google OAuth
}

// Google Login
function loginWithGoogle() {
   alert('Google Login integration coming soon!\n\nTo enable Google Authentication:\n1. Visit https://console.cloud.google.com\n2. Create OAuth 2.0 credentials\n3. Integrate with your app');
   // In production, implement Clerk or Firebase Google OAuth
}

// Email validation on blur
document.addEventListener('DOMContentLoaded', function() {
   const emailInputs = document.querySelectorAll('input[type="email"]');
   
   emailInputs.forEach(input => {
      input.addEventListener('blur', function() {
         const email = this.value;
         const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
         
         if (email && !isValid) {
            this.style.borderColor = '#ff6b6b';
         } else {
            this.parentElement.style.borderColor = '#e0e0e0';
         }
      });
   });
});
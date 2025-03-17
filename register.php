<?php
session_start();
include './helpers/not_authenticated.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Food Orders System - Sign Up</title>
  <link href="statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="statics/js/bootstrap.bundle.min.js"></script>
  
  <style>
   body {
    background: url('food-pattern.png') no-repeat center center;
    background-size: cover;
    background-color: #F8EDE3; 
    font-family: 'Arial', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;

   }

.card {
  width: 550px;
  padding: 25px;
  border-radius: 12px;
  background: #FFF7E6;
  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1); 
  text-align: center;
  border: 1px solid #FFD9A0; 
}

.login-title {
  font-size: 2.3rem;
  font-weight: bold;
  color: #D72638;
  margin-bottom: 5px;
}

.subtext {
  font-size: 1rem;
  color: #666;
  margin-bottom: 20px;
}
.form-label {
  margin-bottom: 10px;
  font-size: 1rem;
  font-weight: bold;
  color: #FF8C42;
  text-align: left;
  display: block;
}

.form-control {
  font-size: 1rem;
  padding: 10px;
  width: 90%;
  border-radius: 6px;
  border: 2px solid #A7C957; 
  background: #FFF;
  transition: 0.3s;
}
.form-control:focus {
  border-color: #FF8C42; 
  box-shadow: 0 0 5px rgba(255, 140, 66, 0.5);
  outline: none;
}

.btn-custom {
  background: #D72638;
  border: none;
  color: white;
  font-size: 1.2rem;
  font-weight: bold;
  padding: 12px;
  border-radius: 6px;
  transition: 0.3s;
  width: 95%;
}
.btn-custom:hover {
  background: #A71D31; 
}

.signup-link {
  font-size: 1rem;
  color: #4CAF50;
  font-weight: bold;
  text-decoration: none;
}
.signup-link:hover {
  text-decoration: underline;
}

.text-center small {
  color: #555;
  font-size: 0.9rem;
}

.mb-3 {
  margin-bottom: 15px;
}
.d-grid {
  margin-top: 20px;
}
.text-center.mt-3 {
  margin-top: 15px;
}

  </style>
</head>

<body>
  <div class="container">
    <div class="col-md-6 mx-auto">
      <div class="text-center ">
        <h1 class="login-title">🍽️ Create Account 🎉</h1>
        <p class="subtext">Sign up to continue</p>
      </div>
      <div class="card">
        <?php if (!empty($_SESSION['errors'])): ?>
          <div class="alert alert-danger text-center">
            <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
          </div>
        <?php endif; ?>

        <form action="handlers/register_handler.php" method="POST" novalidate>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required />
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required />
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" required />
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-custom">
              Sign Up&nbsp;&nbsp;<i class="fa-solid fa-user-plus"></i>
            </button>
          </div>
        </form>

        <div class="text-center mt-3">
          <small>Already have an account? <a href="index.php" class="signup-link">Sign In</a></small>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

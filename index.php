<?php
session_start();
include './database/database.php';
include './helpers/not_authenticated.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Food Ordering System</title>
  <link href="statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="statics/js/bootstrap.bundle.min.js"></script>

  <style>
    /* Background */
body {
  background: url('food-pattern.png') no-repeat center center;
  background-size: cover;
  background-color: #F8EDE3; /* Soft beige for a cozy feel */
  font-family: 'Arial', sans-serif;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0;
}

/* Card */
.card {
  width: 400px; /* Slightly reduced for better proportions */
  padding: 30px;
  border-radius: 14px;
  background: #FEF5E7; /* Soft cream */
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 1);
  border: none;
}

/* Title */
.login-title {
  font-size: 2rem;
  font-weight: bold;
  text-align: center;
  margin-bottom: 10px;
  color: #E60B20; /* Improved red color */
}

/* Icons */
.title-icon {
  font-size: 1rem;
  vertical-align: middle;
  margin-right: 10px;
}

/* Labels */
.form-label {
  font-size: 1rem;
  font-weight: bold;
  color: #FF8C42; /* Orange */
  margin-bottom: 5px;
}

/* Input Fields */
.form-control {
  font-size: 1rem;
  padding: 10px;
  border-radius: 6px;
  border: 2px solid #C5E17A; /* Improved for contrast */
  background: #F4F8E8; /* Light background */
  outline: none;
  width: 90%;
  transition: 0.2s ease-in-out;
}

.form-control:focus {
  border-color: #FF8C42; /* Highlight input on focus */
  box-shadow: 0 0 5px rgba(255, 140, 66, 0.5);
}

/* Login Button */
.btn-custom {
  background: #D72638; /* Red */
  border: none;
  color: white;
  font-size: 1rem;
  font-weight: bold;
  padding: 10px;
  border-radius: 6px;
  width: 95%;
  cursor: pointer;
  transition: background 0.3s ease-in-out;
}

.btn-custom:hover {
  background: #A71D31;
}

/* Sign Up Link */
.text-highlight {
  color: #4CAF50; 
  font-weight: bold;
  text-decoration: none;
}

.text-highlight:hover {
  text-decoration: underline;
}

/* Centering */
.text-center {
  text-align: center;
}

/* Spacing */
.mb-3 {
  margin-bottom: 15px;
}

.mt-4 {
  margin-top: 20px;
}

/* Responsive Fix */
@media (max-width: 480px) {
  .card {
    width: 90%;
    padding: 20px;
  }
}
  </style>
</head>

<body>
  <div class="container">
    <div class="col-md-6 mx-auto">
      <div class="text-center">
        <h1 class="login-title">
          <i class="fa-solid fa-burger title-icon"></i>
          Food Ordering System
          <i class="fa-solid fa-pizza-slice title-icon"></i>
        </h1>
        <p class="text-dark">Login to continue</p>
      </div>

      <div class="card">
        <?php if (isset($_SESSION['errors'])): ?>
          <div class="alert alert-danger text-center">
            <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
          </div>
        <?php endif; ?>

        <form action="handlers/login_handler.php" method="POST">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required />
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required />
          </div>

          <button type="submit" class="btn btn-custom">
            Login&nbsp;&nbsp;<i class="fa-solid fa-right-to-bracket"></i>
          </button>
        </form>

        <div class="text-center mt-4">
          <small>Don't have an account? <a href="register.php" class="text-highlight">Sign Up</a></small>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

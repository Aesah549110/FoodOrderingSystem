<?php
session_start();
include './helpers/not_authenticated.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Food Ordering Management</title>
  <link href="statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="statics/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background: linear-gradient(to right, red 50%, url('statics/images/food-background.jpg') 50%) no-repeat center center/cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      backdrop-filter: brightness(0.8);
      padding: 20px;
    }
    .card {
      width: 320px; /* Further decreased width */
      padding: 25px; /* Adjusted padding */
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
    }
    .form-label {
      font-size: 0.9rem; /* Smaller label size */
      font-weight: bold;
      color: #E44D26;
      margin-bottom: 5px;
    }
    .form-control {
      font-size: 0.9rem; /* Smaller input size */
      padding: 8px;
      border-radius: 5px;
    }
    .btn-custom {
      background: #E44D26;
      border: none;
      color: #fff;
      font-size: 0.9rem;
      font-weight: bold;
      padding: 10px;
      border-radius: 5px;
      transition: 0.3s;
      margin-top: 8px;
    }
    .btn-custom:hover {
      background: #c0392b;
    }
    .alert {
      font-size: 0.85rem;
      border-radius: 5px;
    }
    .text-highlight {
      color: #E44D26;
      font-weight: bold;
      font-size: 0.9rem;
    }
    .login-title {
      font-size: 1.6rem; /* Smaller title size */
      font-weight: bold;
    }
    .spacer {
      margin-bottom: 12px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="col-md-6 mx-auto">
      <div class="text-center mb-3">
        <h1 class="login-title text-white">🍕 Create Account</h1>
        <p class="text-light">Fill in the details to get started</p>
      </div>
      <div class="card">
        <?php if (!empty($_SESSION['errors'])): ?>
          <div class="alert alert-danger text-center spacer">
            <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
          </div>
        <?php endif; ?>
        <form action="handlers/register_handler.php" method="POST" novalidate>
          <div class="mb-2">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required />
          </div>
          <div class="mb-2">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required />
          </div>
          <div class="mb-2">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" required />
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-custom">
              Sign Up&nbsp;&nbsp;<i class="fa-solid fa-user-plus"></i>
            </button>
          </div>
        </form>
        <div class="text-center mt-2">
          <small>Already have an account? <a href="index.php" class="text-highlight text-decoration-none">Login</a></small>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

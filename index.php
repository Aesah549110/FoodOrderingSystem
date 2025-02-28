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
  <title>Food Ordering Management</title>
  <link href="statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="statics/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background: url('statics/images/food-background.jpg') no-repeat center center/cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      backdrop-filter: brightness(0.8);
      padding: 20px;
    }
    .card {
      width: 400px; /* Increased width */
      padding: 40px; /* More padding */
      border-radius: 16px;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
    }
    .form-label {
      font-size: 1.2rem; /* Bigger labels */
      font-weight: bold;
      color: #E44D26;
      margin-bottom: 8px;
    }
    .form-control {
      font-size: 1.1rem; /* Larger input fields */
      padding: 12px;
      border-radius: 8px;
    }
    .btn-custom {
      background: #E44D26;
      border: none;
      color: #fff;
      font-size: 1.2rem;
      font-weight: bold;
      padding: 14px;
      border-radius: 8px;
      transition: 0.3s;
      margin-top: 15px;
    }
    .btn-custom:hover {
      background: #c0392b;
    }
    .alert {
      font-size: 1rem;
      border-radius: 8px;
    }
    .text-highlight {
      color: #E44D26;
      font-weight: bold;
      font-size: 1.1rem;
    }
    .login-title {
      font-size: 2rem; /* Bigger title */
      font-weight: bold;
    }
    .spacer {
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="col-md-6 mx-auto">
      <div class="text-center mb-4">
        <h1 class="login-title text-white">🍕 Food Order</h1>
        <p class="text-light">Login to continue</p>
      </div>
      <div class="card">
        <?php if (isset($_SESSION['errors'])): ?>
          <div class="alert alert-danger text-center spacer">
            <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
          </div>
        <?php endif; ?>
        <form action="handlers/login_handler.php" method="POST">
          <div class="mb-4">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required />
          </div>
          <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required />
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-custom">
              Login&nbsp;&nbsp;<i class="fa-solid fa-right-to-bracket"></i>
            </button>
          </div>
        </form>
        <div class="text-center mt-4">
          <small>Don't have an account? <a href="register.php" class="text-highlight text-decoration-none">Sign Up</a></small>
        </div>
      </div>
    </div>
  </div>
</body>
</html>


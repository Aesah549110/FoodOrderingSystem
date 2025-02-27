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
      background: linear-gradient(135deg, rgb(9, 32, 63), rgb(83, 120, 149));
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border-radius: 12px;
      background: #fff;
      box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
    }
    .btn-custom {
      background: #6E8EF5;
      border: none;
      color: #fff;
      transition: 0.3s ease-in-out;
    }
    .btn-custom:hover {
      background: #5b76d6;
      transform: scale(1.02);
    }
    .alert {
      border-radius: 8px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="col-md-5 mx-auto">
      <div class="text-center mb-4">
        <h1 class="fw-bold text-white">Create an Account</h1>
        <p class="text-light">Fill in the details to get started</p>
      </div>
      <div class="card p-4">
        <?php if (!empty($_SESSION['errors'])): ?>
          <div class="alert alert-danger text-center">
            <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
          </div>
        <?php endif; ?>
        <form action="handlers/register_handler.php" method="POST" novalidate>
          <div class="mb-3">
            <label class="form-label fw-bold">Username</label>
            <input type="text" class="form-control" name="username" required />
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Password</label>
            <input type="password" class="form-control" name="password" required />
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" required />
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-custom">Sign Up</button>
          </div>
        </form>
        <div class="text-center mt-3">
          <small>Already have an account? <a href="index.php" class="text-decoration-none">Login</a></small>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

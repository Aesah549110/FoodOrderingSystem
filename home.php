<?php
include './database/database.php';
include './helpers/authenticated.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Food Order</title>
  <link href="../statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="../statics/js/bootstrap.js"></script>
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }
    .container {
      width: 90%;
      max-width: 1000px;
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
      text-align: center;
    }
    .header {
      margin-bottom: 20px;
    }
    .header h1 {
      font-weight: 600;
      color: #343a40;
    }
    .btn-custom {
      background-color: #c0392b;
      color: white;
      border-radius: 50px;
      padding: 12px 20px;
      text-decoration: none;
      display: inline-block;
      margin-bottom: 20px;
    }
    .btn-custom:hover {
      background-color: #bdccd8;
    }
    .food-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      margin-top: 15px;
      background: #ffffff;
      transition: transform 0.3s ease-in-out;
      text-align: left;
    }
    .food-card:hover {
      transform: translateY(-5px);
    }
    .food-title {
      font-size: 22px;
      font-weight: bold;
      color: #333;
    }
    .food-details {
      font-size: 16px;
      color: #555;
    }
    .movie-action-btns {
      margin-top: 10px;
    }
    .movie-action-btns a {
      margin-right: 10px;
      padding: 6px 12px;
      font-size: 14px;
    }
    .no-movies-text {
      font-size: 18px;
      color: #777;
    }
    .logout-btn {
      display: block;
      width: 200px;
      margin-top: 20px;
      padding: 12px;
      font-size: 18px;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="header">
      <h1>Food Orders  🍕</h1>
      <p>Discover our foods and excellent service!</p>
      <a href="create.php" class="btn btn-custom">
        Add New Food <i class="fa-solid fa-plus"></i>
      </a>
    </div>

    <?php 
      $res = $conn->query("SELECT * FROM orders"); 
    ?>

    <?php if ($res->num_rows > 0): ?>
      <?php while ($row = $res->fetch_assoc()): ?>
        <div class="food-card">
          <h3 class="food-title"> 
            <?= isset($row['title']) ? htmlspecialchars($row['title']) : 'Order info'; ?> 
          </h3>
          <?php if (!empty($row['food_name'])): ?>
            <p class="food-details"><strong>Food Name:</strong> <?= htmlspecialchars($row['food_name']); ?></p>
          <?php endif; ?>
          <?php if (!empty($row['customer_name'])): ?>
            <p class="food-details"><strong>Customer Name:</strong> <?= htmlspecialchars($row['customer_name']); ?></p>
          <?php endif; ?>
          <?php if (!empty($row['order_status'])): ?>
            <p class="food-details"><strong>Order Status:</strong> <?= htmlspecialchars($row['order_status']); ?></p>
          <?php endif; ?>
          <div class="orders-action-btns">
            <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
            <a href="./handlers/delete_handler.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="no-movies-text">🎉 No food orders yet! Time to add some tasty dishes! </div>
    <?php endif; ?>
  </div>

  <a href="./handlers/logout_handler.php" class="btn btn-danger logout-btn">
    Logout <i class="fa-solid fa-right-from-bracket"></i>
  </a>

</body>
</html>


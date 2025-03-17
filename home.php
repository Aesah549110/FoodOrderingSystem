<?php
include './database/database.php'; // Ensure this file establishes $conn properly

// Fetch orders from database
$res = $conn->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Food Orders 🍕</title>
  <link href="statics/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="statics/js/bootstrap.bundle.min.js"></script>

  <style>
  body {
      background: url('food-pattern.png'); /* Use a subtle food-related image */
      background-color: #F8EDE3; /* Soft beige for a cozy feel */
      background-size: cover;
      font-family: 'Arial', sans-serif;
}

    .container {
      max-width: 700px;
      margin: auto;
    }

    /* Header */
    .header {
      margin-bottom: 20px;
    }

    .header h1 {
      font-size: 2.2rem;
      font-weight: bold;
      color: #C72C41;
    }

    .btn-custom {
      background-color: #C72C41;
      color: white;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 8px;
      font-size: 1.2rem;
      border: none;
      text-decoration: none;
      display: inline-block;
    }

    .btn-custom:hover {
      background-color: #A71D31;
    }

    /* Order Cards */
    .food-card {
      background: #FFF5E1;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
      text-align: left;
      margin-bottom: 20px;
      transition: transform 0.2s;
    }

    .food-card:hover {
      transform: translateY(-5px);
    }

    .food-title {
      font-size: 22px;
      font-weight: bold;
      color: #C72C41;
      text-transform: uppercase;
    }

    .food-details {
      font-size: 16px;
      color: #555;
    }

    /* Buttons */
    .orders-action-btns {
      margin-top: 10px;
      display: flex;
      justify-content: space-between;
    }

    .btn-edit {
      background-color: #0096C7;
      color: white;
      font-size: 14px;
      padding: 8px 12px;
      border-radius: 6px;
      text-decoration: none;
      border: none;
    }

    .btn-delete {
      background-color: #F77F00;
      color: white;
      font-size: 14px;
      padding: 8px 12px;
      border-radius: 6px;
      text-decoration: none;
      border: none;
    }

    .btn-edit:hover {
      background-color: #0077B6;
    }

    .btn-delete:hover {
      background-color: #D35400;
    }

    .no-orders-text {
      font-size: 18px;
      color: white;
      background: #8E44AD;
      padding: 12px;
      border-radius: 8px;
    }

    /* Logout Button */
    .logout-btn {
      display: block;
      width: 200px;
      margin: 20px auto;
      padding: 12px;
      font-size: 18px;
      text-align: center;
      background-color: #C72C41;
      color: white;
      text-decoration: none;
      border-radius: 8px;
    }

    .logout-btn:hover {
      background-color: #A71D31;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="header">
      <h1>Food Orders 🍕</h1>
      <p>Discover our foods and excellent service!</p>
      <a href="create.php" class="btn btn-custom">
        Add New Food <i class="fa-solid fa-plus"></i>
      </a>
    </div>

    <?php if ($res && $res->num_rows > 0): ?>
      <?php while ($row = $res->fetch_assoc()): ?>
        <div class="food-card">
          <h3 class="food-title"><?= htmlspecialchars($row['customer_name'] ?? 'Unknown Customer'); ?></h3>
          <p class="food-details"><strong>Food Name:</strong> <?= htmlspecialchars($row['food_name'] ?? 'N/A'); ?></p>
          <p class="food-details"><strong>Order Status:</strong> <?= htmlspecialchars($row['order_status'] ?? 'N/A'); ?></p>
          <div class="orders-action-btns">
            <a href="update.php?id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-edit">Edit</a>
            <a href="./handlers/delete_handler.php?id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-delete">Delete</a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="no-orders-text">
        🎉 No food orders yet! Time to add some tasty dishes!
      </div>
    <?php endif; ?>
  </div>

  <a href="./handlers/logout_handler.php" class="logout-btn">
    Logout <i class="fa-solid fa-right-from-bracket"></i>
  </a>

</body>
</html>

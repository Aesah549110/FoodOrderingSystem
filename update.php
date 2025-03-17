<?php
include './database/database.php';

$id = $_GET['id'] ?? '';
$query = $conn->query("SELECT * FROM orders WHERE id = '$id'");
$order = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Order</title>
  <link href="statics/css/bootstrap.min.css" rel="stylesheet">
  <script src="statics/js/bootstrap.bundle.min.js"></script>

  <style>
     body {
  background: url('food-pattern.png');
  background-color: #F8EDE3; 
  background-size: cover;
  font-family: 'Arial', sans-serif;
}

  .container {
    max-width: 500px;
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
    margin: 50px auto;
    text-align: center;
  }

  h2 {
    font-weight: bold;
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
    color: #D35400; /* Orange */
    display: block;
    text-align: left;
    margin-bottom: 6px;
  }

  input, textarea, select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 16px;
    display: block;
    box-sizing: border-box; 
  }

  textarea {
    resize: none;
    height: 80px;
  }

  .btn-container {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 10px;
  }

  .btn-update {
    background-color: #C72C41;
    color: white;
    font-weight: bold;
    padding: 12px;
    font-size: 18px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    display: block;
    width: 100%;
    text-align: center;
  }

  .btn-update:hover {
    background-color: #A71D31;
  }

 
  .btn-back {
    background-color: #6C757D; 
    color: white;
    font-weight: bold;
    padding: 10px;
    font-size: 18px;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    display: block;
    width: 95%;
    text-align: center;
  }

  .btn-back:hover {
    background-color: #5A6268;
  }

  </style>
</head>
<body>

  <div class="container">
    <h2>Edit Order</h2>

    <form action="handlers/update_handler.php" method="POST">
      <input type="hidden" name="id" value="<?= htmlspecialchars($order['id']); ?>">

      <label>Customer Name</label>
      <input type="text" name="customer_name" value="<?= htmlspecialchars($order['customer_name']); ?>" required>

      <label>Food Name</label>
      <input type="text" name="food_name" value="<?= htmlspecialchars($order['food_name']); ?>" required>

      <label>Order Status</label>
      <select name="order_status">
        <option value="Pending" <?= ($order['order_status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
        <option value="Ongoing" <?= ($order['order_status'] == 'Ongoing') ? 'selected' : ''; ?>>Ongoing</option>
        <option value="Completed" <?= ($order['order_status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
      </select>

      <div class="btn-container">
        <button type="submit" class="btn-update">Update Order</button>
        <a href="index.php" class="btn-back">Back to Orders</a>
      </div>
    </form>
  </div>

</body>
</html>

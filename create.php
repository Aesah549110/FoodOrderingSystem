<?php
include './database/database.php'; // Include the database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $food_name = $_POST['food_name'];
    $customer_name = $_POST['customer_name'];
    $order_status = $_POST['order_status'];

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO orders (food_name, customer_name, order_status) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $food_name, $customer_name, $order_status);

    if ($stmt->execute()) {
        echo "<script>alert('Order added successfully!'); window.location.href='index.php';</script>"; // Redirect with alert
    } else {
        echo "Error adding order: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="../statics/js/bootstrap.js"></script>
</head>
<body class="container mt-5">
    <h2>Add New Food Order</h2>

    <!-- Back to Orders Button -->
    <a href="index.php" class="btn btn-secondary mb-3">Back to Orders</a>

    <form action="create.php" method="POST">
        <div class="mb-3">
            <label for="food_name" class="form-label">Food Name:</label>
            <input type="text" name="food_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name:</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Order Status:</label>
            <select name="order_status" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Preparing">Preparing</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add Order</button>
    </form>
</body>
</html>

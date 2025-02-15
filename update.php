<?php
include './database/database.php'; // Include database connection

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch order details
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    if (!$order) {
        echo "Order not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

// Handle form submission for updating the order
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $food_name = $_POST['food_name'];
    $customer_name = $_POST['customer_name'];
    $order_status = $_POST['order_status'];

    // Update query
    $stmt = $conn->prepare("UPDATE orders SET food_name=?, customer_name=?, order_status=? WHERE id=?");
    $stmt->bind_param("sssi", $food_name, $customer_name, $order_status, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Order updated successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error updating order: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Food Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="../statics/js/bootstrap.js"></script>
</head>
<body class="container mt-5">
    <h2>Edit Food Order</h2>

    <!-- Back to Orders Button -->
    <a href="index.php" class="btn btn-secondary mb-3">Back to Orders</a>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="food_name" class="form-label">Food Name:</label>
            <input type="text" name="food_name" class="form-control" value="<?php echo htmlspecialchars($order['food_name']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name:</label>
            <input type="text" name="customer_name" class="form-control" value="<?php echo htmlspecialchars($order['customer_name']); ?>" required>
        </div>

        <div class="mb-3">
            <label>Order Status:</label>
            <select name="order_status" class="form-control">
                <option value="Pending" <?php if ($order['order_status'] == "Pending") echo "selected"; ?>>Pending</option>
                <option value="Preparing" <?php if ($order['order_status'] == "Preparing") echo "selected"; ?>>Preparing</option>
                <option value="Completed" <?php if ($order['order_status'] == "Completed") echo "selected"; ?>>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Update Order</button>
    </form>
</body>
</html>

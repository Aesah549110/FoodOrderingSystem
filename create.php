<?php
include './database/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $food_name = $_POST['food_name'];
    $customer_name = $_POST['customer_name'];
    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("INSERT INTO orders (food_name, customer_name, order_status) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $food_name, $customer_name, $order_status);

    if ($stmt->execute()) {
        echo "<script>alert('Order added successfully!'); window.location.href='index.php';</script>";
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

    <style>
        body {
            background: url('food-pattern.png'); /* Use a subtle food-related image */
            background-color: #F8EDE3; /* Soft beige for a cozy feel */
            background-size: cover;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .form-container {
            background-color: #FFF5D1; /* Light yellowish container */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            color: #D72638;
            text-align: center;
            margin-bottom: 20px;
        }

        .back-btn {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #6C757D;
            color: white;
            padding: 8px;
            border-radius: 6px;
            text-decoration: none;
            margin-bottom: 15px;
        }

        .back-btn:hover {
            background-color: #5A6268;
        }

        label {
            font-weight: bold;
            color: #E44D26;
        }

        .btn-submit {
            width: 100%;
            background-color: #D72638;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 6px;
            padding: 10px;
            border: none;
        }

        .btn-submit:hover {
            background-color: #A71D31;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2 class="form-title">Add New Order</h2>

        <a href="index.php" class="back-btn">Back to Orders</a>

        <form action="create.php" method="POST">
            <div class="mb-3">
                <label for="food_name" class="form-label">Food Name</label>
                <input type="text" name="food_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="order_status">Order Status</label>
                <select name="order_status" class="form-control">
                    <option value="Pending">Pending</option>
                    <option value="Preparing">Preparing</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-submit">Add Order</button>
        </form>
    </div>

</body>
</html>

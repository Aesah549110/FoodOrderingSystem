<?php
include '../database/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $food_name = $_POST['food_name'] ;
    $customer_name =$_POST['customer_name'];
    $order_status = $_POST['order_status'] ;

    if (empty($food_name) || empty($customer_name) || empty($order_status)) {
        echo("Error: All fields are required.");
    }


    $sql = "INSERT INTO orders (food_name, customer_name, order_status) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql); 

    if ($stmt) {
        $stmt->bind_param("sss", $food_name, $customer_name, $order_status);

        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../index.php");
            exit;
        } else {
            echo("Error: " .$stmt->error);
        }
    } else {
        echo("Error preparing statement: " . $conn->error);
    }
 }

?>


<?php
include '../database/database.php';

try{

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $food_name = $_POST['food_name'];
    $customer_name = $_POST['customer_name'];
    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("UPDATE orders SET food_name=?, customer_name=?, order_status=?' WHERE id=?");
    $stmt->bind_param("ssssi", $food_name, $costumer_name, $order_status,$id);

      
    if ($stmt->execute()) {
        header("Location: ../index.php"); 
        exit;
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

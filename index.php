<?php 
include './database/database.php';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="statics/css/bootstrap.min.css" rel="stylesheet">
    <script src="statics/js/bootstrap.js"></script>

    <style>
    .food_card {
      transition: transform 0.3s ease-in-out;
    }

    .food_name {
      font-size: 48px;
      font-weight: bold;
      color: #333;
    }

    .customer_name {
      font-size: 16px;
      color: #555;
    }

    .order_status {
      font-size: 20px;
      color: #999;
    }

    .btn-custom {
      background-color:rgb(71, 108, 141);
      color: white;
      border-radius: 50px;
    }

    .btn-custom:hover {
      background-color:rgb(189, 204, 216);
    }
  </style>

</head>
<body>
<div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="text-center mb-4">
          <h1 class="display-4 fw-bold text-primary">FOOD ORDER</h1>
          <p class="lead text-muted">Discover our foods and service and others!</p>
        </div>

        <div class="mb-4 text-center">
          <a href="../FoodOrderingSystem/create.php" class="btn btn-lg btn-info">Add New Food</a>
        </div>

        <?php
           
           $res = $conn->query("SELECT * FROM orders");
        ?>

        <?php if($res->num_rows > 0): ?>   
            <?php while($row = $res->fetch_assoc()): ?>
              <div class="row border rounded p-3 my-3">
                <div>
                  <h5 class="fw-bold"><?= $row['food_name']; ?></h5>
                  <p class="text-secondary"><?= $row['customer_name']; ?></p>
                  <p><strong>Ingredients:</strong> <?= $row['order_status']; ?></p>
                  
                  <div class="row my-1">
                      <a href="../FoodOrderingsystem/update.php?id=<?=$row['id'];?>" class="btn btn-sm btn-info">Edit</a>
                  </div>
                  <div class="row my-1">
                      <a href="handlers/delete_handler.php?id=<?=$row['id'];?>" class="btn btn-sm btn-warning">Delete</a>
                  </div>
                </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
            <div class="row border rounded p-3 my-3 text-center">
                <div class="col mt-3">
                    <p class="text-muted">🎉 No food order yet! Time to add some tasty dishes!</p>
                </div>
            </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
<?php 
//session_start(); 
include 'controllers/get_products.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Boutique</title>
</head>
<body>
    <a href="./views/panier.php" class="link">Panier<span><?= array_sum($_SESSION['panier']) ?></span></a>
    <section class="products_list">
        <?= $tbody; ?>
    </section>
</body>
</html>
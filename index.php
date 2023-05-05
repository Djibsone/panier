<?php 
session_start(); 
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
        <?php foreach($Products as $produit): ?>
            <form action="" class="product">
                <div class="image_product">
                    <img src="./assets/images/<?= $produit['img'] ?>" alt="">
                </div>
                <div class="content">
                    <h4 class="name"><?= $produit['name'] ?></h4> 
                    <h2 class="price"><?= number_format($produit['price'], 2) ?>€</h2>
                    <a href="controllers/ajouter_panier.php?p=<?= base64_encode($produit['id']) ?>" class="id_product">Ajouter au panier</a>
                </div>
            </form>
        <?php endforeach; ?>
    </section>
</body>
</html>

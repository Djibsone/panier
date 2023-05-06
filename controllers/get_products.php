<?php
require_once './models/config.php';
$_SESSION['panier'];

//get all product
$Products = getProducts();

//echo json_encode($categories->fetchAll(PDO::FETCH_ASSOC)); /
/*<img src="./assets/images/<?= $data["img"]; ?>" alt="">
*/
$tbody = ''; // Déclaration de $tbody en dehors de la boucle

foreach($Products as $data) {
    $tbody .= '
        <form action="" class="product">
            <div class="image_product">
                <img src="./assets/images/'. $data['img'] .'" alt="">
            </div>
            <div class="content">
                <h4 class="name">'. $data['name'] .'</h4> 
                <h2 class="price">'. number_format($data['price'], 2) .'€</h2>
                <a href="controllers/ajouter_panier.php?p='. base64_encode($data['id']) .'" class="id_product">Ajouter au panier</a>
            </div>
        </form>
    ';
}
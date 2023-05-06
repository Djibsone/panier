<?php
require_once '../models/config.php';

/*//recuperation l'id dans le lien
if(isset($_GET['del'])) {
    $id = base64_decode($_GET['del']);
    //verifier grace a l'id si le produit existe dans la db
    $check = getProduct($id);
    $data = $check->fetch();
    if (empty($data)) {
       die('Ce produit n\'existe pas !');
    }

    //supprimer le produit dans le panier (le tableau)
        //si le produit existe dans le panier
    if($data) {
        //delete product
        $Products = delProduct($id);
    } else {
        //si non on ajoute le produit
        $_SESSION['panier'][$id] = 1;
        //echo 'Le produit a été ajouté au panier !';
    }
    
    header('Location: ../');
}*/

if(isset($_GET['del'])) {
    $id = base64_decode($_GET['del']);

    //supprimer le produit dans le panier (le tableau)
    unset($_SESSION['panier'][$id]);
    $_SESSION['success'] = 'Le produit a été supprimé du panier !';

    header('Location: ../views/panier.php');
}
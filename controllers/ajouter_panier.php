<?php
require_once '../models/config.php';

//verifier si une session existe
/*if(!isset($_SESSION)) {
    //si non demarrer la session
    session_start();
}*/

//creer la session
if(!isset($_SESSION['panier'])) {
    //s'il n'exite pas une session on creer une et on mets un tableau a l'interieur
    $_SESSION['panier'] = array();
}

//recuperation l'id dans le lien
if(isset($_GET['p'])) {
    $id = base64_decode($_GET['p']);
    //verifier grace a l'id si le produit existe dans la db
    $check = getProduct($id);
    $data = $check->fetch();
    if (empty($data)) {
       die('Ce produit n\'existe pas !');
    }

    //ajouter le produit dans le panier (le tableau)
        //si le produit existe dans le panier
    if(isset($_SESSION['panier'][$id])) {
        //represente la quantity
        $_SESSION['panier'][$id]++; 
        header('Location: ../');
    } else {
        //si non on ajoute le produit
        $_SESSION['panier'][$id] = 1;
        //echo 'Le produit a été ajouté au panier !';
        //header('Location: ../');
    }

}

//echo $data['name'];
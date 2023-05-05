<?php
session_start();
require_once '../models/config.php';

//liste des produits
//recuperer les keys du tableau
$keys = array_keys($_SESSION['panier']);

//s'il n'y a aucune keys dans le tableau
if (empty($keys)) {
    echo 'Votre panier est vide';
} else {
    //si oui
    $check = getProduitKeys($keys);
   echo $tbody;
}

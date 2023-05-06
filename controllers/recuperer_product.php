<?php
//session_start();
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
    $tbody = ''; // Déclaration de $tbody en dehors de la boucle

    foreach($check as $data) {
        $tbody .= '
            <tr>
                <td><img src="../assets/images/' . $data["img"] . '" alt=""></td>
                <td>' . $data["name"] . '</td>
                <td>' . number_format($data["price"], 2) . '€</td>
                <td>' . $_SESSION["panier"][$data["id"]] . '</td>
                <td><img src="../assets/images/del.png" alt=""></td>
            </tr>
        ';
    }
}

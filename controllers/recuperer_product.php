<?php
require_once '../models/config.php';

$total = 0;

//liste des produits
//recuperer les keys du tableau
$keys = array_keys($_SESSION['panier']);

//s'il n'y a aucune keys dans le tableau
if (empty($keys)) {
    //echo '<h4 class="vide_panier">Votre panier est vide !</h4>';
    //$check = array();
    unset($_SESSION['success']);
    $_SESSION['error'] = 'Votre panier est vide !';
} else {
    //si oui
    $check = getProduitKeys($keys);
    $tbody = ''; // Déclaration de $tbody en dehors de la boucle

    foreach($check as $data) {
        //calculer le total ($total(0) + prix unitaire * quantity)
        $total = $total + $data["price"] * $_SESSION["panier"][$data["id"]];

        $tbody .= '
            <tr>
                <td><img src="../assets/images/' . $data["img"] . '" alt=""></td>
                <td>' . $data["name"] . '</td>
                <td>' . number_format($data["price"], 2,',',' ') . '€</td>
                <td>' . $_SESSION["panier"][$data["id"]] . '</td>
                <td><a href="../controllers/del_product.php?del='. base64_encode($data['id']) .'"><img src="../assets/images/del.png" alt=""></a></td>
            </tr>
        ';
    }
}

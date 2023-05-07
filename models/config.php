<?php
session_start();

//Connexion à la base de données
function dbConnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=panier;charset=utf8', 'djibril', 'tamou');
        return $db;
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

//Récupérer tous les products
function getProducts(){
    $db = dbConnect();

    $req = $db->query('SELECT * FROM products ');
    $req->execute();
    return $req;
}


//Récupérer un product
function getProduct($id){
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM products WHERE id = ?');
    $req->execute(array($id));
    return $req;
}

//Récupérer un product
function getProduitKeys($keys){
    $db = dbConnect();

    $req = $db->query('SELECT * FROM products WHERE id IN ('.implode(',', $keys). ')');
    //$req->execute(array($keys));
    return $req;
}

/*
function getProduitKeys($keys){
    $db = dbConnect();

    $subt = rtrim(str_repeat('?,', count($keys)), ',');
    $query = 'SELECT * FROM products WHERE id IN (' . $subt . ')';

    $stmt = $db->prepare($query);
    $stmt->execute($keys);
    return $stmt;
}
*/

/*
    //Récupérer le token d'un user
    function getUserToken($u){
        $db = dbConnect();

        $req = $db->prepare('SELECT token FROM users WHERE token = ?');
        $req->execute(array($u));
        return $req;
    }


    //Récupérer toutes infos user depuis table password_reset en fction de token_user & token
    function getToken($u, $token){
        $db = dbConnect();

        $req = $db->prepare('SELECT * FROM password_reset WHERE token_user = ? AND token = ?');
        $req->execute(array($u, $token));
        //$user = $req->fetch();
        return $req;
        //return $user;
    }

    //Récupérer toutes infos user depuis table password_reset en fction de token
    function getTokenPasswordReset($token){
        $db = dbConnect();

        $req = $db->prepare('SELECT * FROM password_reset WHERE token_user = ?');
        $req->execute(array($token));
        return $req;
    }
*/

//Ajouter un product
function addProduct($img, $price, $name){
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO product(img,price,name) VALUES(?,?,?)');

    if($req->execute(array($img, $price, $name)))
        return true;
    else
        return false;
}

//Supprimer l'infos d'1 product
function delProduct($id){
    $db = dbConnect();

    $req = $db->prepare('DELETE FROM products WHERE id = ?');

    if($req->execute(array($id)))
        return true;
    else
        return false;
}

//Modifier un product
function updateProduct($id){
    $db = dbConnect();

    $req = $db->prepare('UPDATE products SET id = ? WHERE token = ?');

    if($req->execute(array($id)))
        return true;
    else
        return false;
}


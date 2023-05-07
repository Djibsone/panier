<?php 
session_start();

// Détruire toutes les variables de session
$_SESSION = array();

// Si vous souhaitez détruire complètement la session, décommentez la ligne suivante
 //session_destroy();

// Déconnection message
$_SESSION['success'] = 'Vous vous êtes déconnectés !';

// Rediriger vers la page d'accueil ou toute autre page appropriée après la déconnexion
header("Location: ../");
// exit();
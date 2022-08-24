<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Users.php';


// nous allons déclencher nos vérifications lors d'une request méthode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // création d'un tableau d'erreurs
    $errors = [];

    // vérification de l'input login si vide
    if (isset($_POST['login'])) {
        if (empty($_POST['login'])) {
            $errors['login'] = 'Identifiant obligatoire';
        }
    }

    // vérification de l'input password si vide
    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = 'Mot de passe obligatoire';
        }
    }

    // nous allons déclencher des tests complémentaiers si les inputs sont remplis
    if (count($errors) == 0) {

        // j'instancie un nouvel objet selon la class Users
        $usersObj = new Users();

        // vérification si le mail existe à l'aide de la méthode de l'objet checkIfMailExists
        if($usersObj->checkIfMailExists($_POST['login'])){
            header('Location: dashboard.php');
        } else {
            $errors['connection'] = 'Identifiant ou Mdp incorrect';
        }
       
    }
}

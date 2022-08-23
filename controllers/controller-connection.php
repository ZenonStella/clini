<?php

require_once '../config.php';
require_once '../models/Database.php';


// nous allons déclencher nos vérifications lors d'une request méthode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // création d'un tableau d'erreurs
    $errors = [];

    // vérification de l'input login
    if (isset($_POST['login'])) {
        if (empty($_POST['login'])) {
            $errors['login'] = 'Identifiant obligatoire';
        }
    }

    // vérification de l'input password
    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = 'Mot de passe obligatoire';
        }
    }

    // nous allons déclencher des tests dans la bdd
    if(count($errors) == 0){

    }

}

<?php
if (!isset($_SESSION['user'])) {
    header('location: connection.php');
    exit;
}
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Patients.php';

// nous allons déclencher nos vérifications lors d'une request méthode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Mise en place des regex 
    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";
    $regexPhoneNumber = "/^[0-9]{10}+$/";

    // création d'un tableau d'erreurs
    $errors = [];

    // vérification de l'input lastname
    if (isset($_POST['lastname'])) {
        if (empty($_POST['lastname'])) { // si c'est vide
            $errors['lastname'] = '*Nom obligatoire';
        } else if (!preg_match($regexName, $_POST['lastname'])) { // si ça ne remplit pas le pattern
            $errors['lastname'] = '*Mauvais format, ex. DUPONT';
        }
    }

    // vérification de l'input firstname
    if (isset($_POST['firstname'])) {
        if (empty($_POST['firstname'])) { // si c'est vide
            $errors['firstname'] = '*Prénom obligatoire';
        } else if (!preg_match($regexName, $_POST['firstname'])) { // si ça ne remplit pas le pattern
            $errors['firstname'] = '*Mauvais format, ex. Hugo';
        }
    }

    // vérification de le mail
    if (isset($_POST['mail'])) {
        if (empty($_POST['mail'])) { // si c'est vide
            $errors['mail'] = '*Email obligatoire';
        } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) { // si ça ne passe pas le filter var : FILTER_VALIDATE_EMAIL
            $errors['mail'] = '*Mauvais format, ex. mail@mail.com';
        }
    }

    // vérification de l'adresse
    if (isset($_POST['address'])) {
        if (empty($_POST['address'])) { // si c'est vide
            $errors['address'] = '*Adresse obligatoire';
        }
    }

    // vérification du numéro de téléphone
    if (isset($_POST['phoneNumber'])) {
        if (empty($_POST['phoneNumber'])) { // si c'est vide
            $errors['phoneNumber'] = '*Numéro de tél. obligatoire';
        } else if (!preg_match($regexPhoneNumber, $_POST['phoneNumber'])) { // si ça ne remplit pas le pattern
            $errors['phoneNumber'] = '*Mauvais format, ex. 0631234456';
        }
    }

    if (count($errors) == 0) {
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        $address = htmlspecialchars($_POST['address']);
        $mail = htmlspecialchars($_POST['mail']);
        $patientObj = new Patient();
        $patientObj->addNewPatient($lastname, $firstname, $phoneNumber, $address, $mail);
        header('Location: dashboard.php');
    }
}

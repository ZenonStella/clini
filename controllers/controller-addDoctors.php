<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Users.php';
require_once '../models/MedicalSpecialities.php';

$medicalspecialitiesObj = new medicalSpecialities();
$medicalspecialities = $medicalspecialitiesObj->getAllMedicalSpecialities();



// nous allons déclencher nos vérifications lors d'une request méthode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
    if (isset($_POST['specialities'])) {
        if (empty($_POST['specialities'])) { // si c'est vide
            $errors['specialities'] = '*spécialité obligatoire';
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
    // vérification de l'input password si vide
    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = '*Mot de passe obligatoire';
        }else {
            if (empty($_POST['confirmPassword'])) {
                $errors['confirmPassword'] = '* Confirmer le mot de passe';

            }
        }
    }

    // nous allons déclencher des tests complémentaiers si les inputs sont remplis
    if (count($errors) == 0) {
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        $specialities = htmlspecialchars($_POST['specialities']);
        $password = htmlspecialchars($_POST['password']);
        $mail = htmlspecialchars($_POST['mail']);
        $doctorsObj = new Doctors();
        $usersDoctors = new Users();
        
        $doctorsObj->addNewdoctors($lastname, $firstname, $phoneNumber, $specialities, $mail);
        $usersDoctors->addUsers($mail, password_hash($password, PASSWORD_DEFAULT),3);
        header('Location: dashboard.php');

    }
}

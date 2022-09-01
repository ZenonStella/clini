<?php 
if (!isset($_SESSION['user'])) {
    header('location: connection.php');
    exit;
}
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Patients.php';
$patientsO = new Patient();
$patient = $patientsO->getAOnePatients($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";
    $errors = [];
    if (isset($_POST['lastname'])) {
        if (empty($_POST['lastname'])) { // si c'est vide
            $errors['lastname'] = '*lastname obligatoire';
        }
    }
    if (isset($_POST['firstname'])) {
        if (empty($_POST['firstname'])) { // si c'est vide
            $errors['firstname'] = '*firstname obligatoire';
        }
    }
    if (isset($_POST['phoneNumber'])) {
        if (empty($_POST['phoneNumber'])) { // si c'est vide
            $errors['phoneNumber'] = '*phoneNumber obligatoire';
        }
    }
    if (isset($_POST['mail'])) {
        if (empty($_POST['mail'])) { // si c'est vide
            $errors['mail'] = '*mail obligatoire';
        }
    }
    if (isset($_POST['address'])) {
        if (empty($_POST['address'])) { // si c'est vide
            $errors['address'] = '*address obligatoire';
        }
    }
    if (count($errors) == 0) {
        $name = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        $mail = htmlspecialchars($_POST['mail']);
        $address = htmlspecialchars($_POST['address']);
        $patient = htmlspecialchars($_GET['id']);
        $patientsO->updatepatients($patient, $name, $lastname, $phoneNumber, $mail,  $address);
        header('Location: dashboard.php');
    }
}
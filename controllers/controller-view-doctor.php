<?php 
if (!isset($_SESSION['user'])) {
    header('location: connection.php');
    exit;
}
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/MedicalSpecialities.php';
$medicalespecialitiesO = new medicalSpecialities();
$medicalespecialities = $medicalespecialitiesO->getAllMedicalSpecialities();
$doctorsO = new Doctors();
$doctor = $doctorsO->getAOneDoctors($_GET['id']);
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
    if (isset($_POST['specialities'])) {
        if (empty($_POST['specialities'])) { // si c'est vide
            $errors['specialities'] = '*specialities obligatoire';
        }
    }
    if (count($errors) == 0) {
        $name = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        $mail = htmlspecialchars($_POST['mail']);
        $specialities = htmlspecialchars($_POST['specialities']);
        $doctor = htmlspecialchars($_GET['id']);
        $doctorsObj = new Doctors();
        $userObj = new Users();
        $userObj->updateUsers($mail);
        $doctorsObj->updateDoctors($doctor, $name, $lastname, $phoneNumber, $mail,  $specialities);
        header('Location: dashboard.php');
    }
}
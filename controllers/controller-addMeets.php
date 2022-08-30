<?php
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Patients.php';
require_once '../models/Meets.php';
$doctorsO = new Doctors();
$doctors = $doctorsO->getAlldoctors();
$patientsO = new Patient();
$patients = $patientsO->getAllPatients();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";
    $errors = [];
    if (isset($_POST['doctors'])) {
        if (empty($_POST['doctors'])) { // si c'est vide
            $errors['doctors'] = '*Docteur obligatoire';
        }
    }
    if (isset($_POST['patients'])) {
        if (empty($_POST['patients'])) { // si c'est vide
            $errors['patients'] = '*Patient obligatoire';
        }
    }
    if (isset($_POST['date'])) {
        if (empty($_POST['date'])) { // si c'est vide
            $errors['date'] = '*Date obligatoire';
        }
    }
    if (isset($_POST['hour'])) {
        if (empty($_POST['hour'])) { // si c'est vide
            $errors['hour'] = '*Heure obligatoire';
        }
    }
    if (isset($_POST['description'])) {
        if (empty($_POST['description'])) { // si c'est vide
            $errors['description'] = '*Description obligatoire';
        }
    }
    if (count($errors) == 0) {
        $doctors = htmlspecialchars($_POST['doctors']);
        $patients = htmlspecialchars($_POST['patients']);
        $date = htmlspecialchars($_POST['date']);
        $hour = htmlspecialchars($_POST['hour']);
        $description = htmlspecialchars($_POST['description']);
        $meetsObj = new Meets();
        $meetsObj->addMeets($doctors, $patients, $date, $hour, $description);
        header('Location: dashboard.php');
    }
}

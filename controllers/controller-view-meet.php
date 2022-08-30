<?php 
if (!isset($_SESSION['user'])) {
    header('location: connection.php');
    exit;
}
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Meets.php';

$meetsO = new Meets();
$meet = $meetsO->getAOneMeets($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";
    $errors = [];
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
        $date = htmlspecialchars($_POST['date']);
        $hour = htmlspecialchars($_POST['hour']);
        $description = htmlspecialchars($_POST['description']);
        $meetid = $meet['rendezvous_id'];
        $meetsObj = new Meets();
        $meetsObj->updateMeets($meetid ,$date, $hour, $description);
        header('Location: dashboard.php');
    }
}
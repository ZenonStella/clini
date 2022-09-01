<?php
if (!isset($_SESSION['user'])) {
    header('location: connection.php');
    exit;
}
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Patients.php';
require_once '../models/Doctors.php';
require_once '../models/Meets.php';
require_once '../models/Users.php';
$clinics = [
    1 => 'Patients',
    2 => 'Doctors',
    3 => 'Rendezvous'
];

if (isset($_GET['clinic']) && array_key_exists($_GET['clinic'], $clinics)) {
    if ($_GET['clinic'] == 1) {
        if (isset($_GET['id'])) {
            $patientsObj = new Patient();
            $patientsObj->deletePatients($_GET['id']);
            header('Location: dashboard.php');
        }
    }
    if ($_GET['clinic'] == 2) {
        if (isset($_GET['id'])) {
            $doctorsObj = new Doctors();
            $usersObj = new Users();
            $doctor = $doctorsObj->getAOneDoctors($_GET['id']);
            $usersObj->deleteUsers($doctor['doctors_mail']);
            $doctorsObj->deleteDoctors($_GET['id']);
            header('Location: dashboard.php');
        }
    }
    if ($_GET['clinic'] == 3) {
        if (isset($_GET['id'])) {
            $meetsObj = new Meets();
            $meetsObj->deleteMeets($_GET['id']);
            header('Location: dashboard.php');
        }
    }
}

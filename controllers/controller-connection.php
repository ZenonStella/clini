<?php
// if (isset($_SESSION['USER'])) {
//     header("Location: ../views/logout.php");
// }
// tableau d'erreurs vide
$errors = [];
// nous stockons notre mot de passe hashé dans une variable $passwordHash
$passwordHash = '$2y$10$4uNpCg7Fr9GccSOFdui6aO/RUgpJbgDWM.LQu6eoAxA/1DNsaDpsu';
// nous stockons notre login dans une variable $login
$login = 'admin';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Nous contrôlons si $_POST['login'] et $_POST['password'] est présent, si oui, nous déclenchons nos tests
    if (isset($_POST['login']) && isset($_POST['password'])) {
        // Si login est vide
        if ($_POST['login'] == '') {
            $errors['login'] = "Champ obligatoire";
            // si login n'est pas égale à notre variable
        } else if ($_POST['login'] != $login) {
            $errors['login'] = 'Login incorrect';
        }

        // Si password est vide
        if ($_POST['password'] == '') {
            $errors['password'] = "Champ obligatoire";
            // Si password correspond au password hashé
        } else if (!password_verify($_POST['password'], $passwordHash)) {
            $errors['password'] = 'Mot de passe incorrect';
        }

        // Si tout est ok, cas le tableau d'erreurs est vide alors ...
        if (count($errors) == 0) {

            // On a créé une variable de session $_SESSION['USER']
            $_SESSION['USER'] = [
                'lastname' => 'LH',
                'firstname' => 'P8',
                'role' => 1
            ];
            header('Location: ../views/dashboard.php');
            exit;
        }
    }
}

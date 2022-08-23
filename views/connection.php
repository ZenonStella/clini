<?php

// Cela permet d'utiliser les variables de session : $_SESSION
session_start();

// Appel du controller de la view
require_once '../controllers/controller-connection.php';

?>


<!-- Nous incluons le header -->
<?php include('templates/header.php'); ?>

<div class="p-3">
    <p class="h2 text-center">IDENTIFICATION</p>
    <div class="row justify-content-center">

        <!-- Nous manipulons des passwords, nous devons être en POST -->
        <form class="col-lg-4 col-8 border border-danger rounded shadow p-4" method="POST" action="">

            <div class="d-flex flex-column">
                <label for="login">Identifiant
                    <!-- Mise en place d'une ternaire afin d'afficher l'erreur correspondante -->
                    <span class="text-danger fst-italic"><?= isset($errors['login']) ? $errors['login'] : '' ?></span>
                </label>
                <input type="text" id="login" name="login">
            </div>
            <div class="d-flex flex-column">
                <label for="password">Mot de passe
                    <span class="text-danger fst-italic"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                </label>
                <input type="password" id="password" name="password">
            </div>
            <div class="text-center d-flex flex-column">
                <span class="text-danger fst-italic default-span"><?= isset($errors['validate']) ? $errors['validate'] : '' ?></span>
                <button class="btn btn-danger">Se connecter</button>
            </div>
        </form>
        <div class="text-center">
            <a href="" src="">Mot de passe oublié</a>
        </div>
    </div>
</div>

<!-- Nous incluons le footer -->
<?php include('templates/footer.php'); ?>
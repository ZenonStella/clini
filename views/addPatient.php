<?php

// Cela permet d'utiliser les variables de session : $_SESSION
session_start();

// Appel du controller de la view
require_once '../controllers/controller-addPatient.php';

?>

<!-- Nous incluons le header -->
<?php include('templates/header.php'); ?>

<div class="p-3">
    <p class="h2 text-center">Ajout d'un nouveau patient</p>
    <div class="row justify-content-center">

        <!-- Mise en place de novalidate pour debugger -->
        <form class="col-lg-4 col-8 border border-success rounded shadow p-4" method="POST" action="" novalidate>

            <div class="d-flex flex-column">
                <label for="lastname">Nom
                    <!-- Mise en place d'une ternaire afin d'afficher l'erreur correspondante -->
                    <span class="text-danger fst-italic"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                </label>
                <!-- Mise en place de l'opérateur de coalescence pour afficher oui ou non la valeur de $_POST -->
                <input type="text" id="login" name="lastname" value="<?= $_POST['lastname'] ?? '' ?>" required>
            </div>

            <div class="d-flex flex-column">
                <label for="firstname">Prénom
                    <span class="text-danger fst-italic"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
                </label>
                <input type="text" id="firstname" name="firstname" value="<?= $_POST['firstname'] ?? '' ?>" required>
            </div>

            <div class="d-flex flex-column">
                <label for="phoneNumber">Numéro de contact
                    <!-- Mise en place d'une ternaire afin d'afficher l'erreur correspondante -->
                    <span class="text-danger fst-italic"><?= isset($errors['phoneNumber']) ? $errors['phoneNumber'] : '' ?></span>
                </label>
                <input type="text" id="phoneNumber" name="phoneNumber" value="<?= $_POST['phoneNumber'] ?? '' ?>" required>
            </div>

            <div class="d-flex flex-column">
                <label for="mail">E-mail
                    <!-- Mise en place d'une ternaire afin d'afficher l'erreur correspondante -->
                    <span class="text-danger fst-italic"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span>
                </label>
                <input type="email" id="mail" name="mail" value="<?= $_POST['mail'] ?? '' ?>" required>
            </div>

            <div class="d-flex flex-column">
                <label for="address">Adresse postale
                    <span class="text-danger fst-italic"><?= isset($errors['address']) ? $errors['address'] : '' ?></span>
                </label>
                <input type="text" id="address" name="address" value="<?= $_POST['address'] ?? '' ?>">
            </div>

            <div class="text-center d-flex flex-column">
                <button class="btn btn-success mt-4">Ajouter</button>
            </div>
        </form>

    </div>

    <div class="row justify-content-center">
        <a href="dashboard.php" class="btn btn-secondary mt-3 col-3">Dashboard</a>
    </div>


</div>

<!-- Nous incluons le footer -->
<?php include('templates/footer.php'); ?>
<?php
session_start();
require_once '../controllers/controller-addDoctors.php';
include('templates/header.php'); 
?>
<div class="p-3">
    <p class="h2 text-center">Ajout d'un nouveau docteur</p>
    <div class="row justify-content-center">
        <form class="col-lg-4 col-8 border border-success rounded shadow p-4" method="POST" action="" novalidate>
            <div class="d-flex flex-column">
                <label for="lastname">Nom
                    <span class="text-danger fst-italic"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                </label>
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
                    <span class="text-danger fst-italic"><?= isset($errors['phoneNumber']) ? $errors['phoneNumber'] : '' ?></span>
                </label>
                <input type="text" id="phoneNumber" name="phoneNumber" value="<?= $_POST['phoneNumber'] ?? '' ?>" required>
            </div>
            <div class="d-flex flex-column">
                <label for="mail">E-mail
                    <span class="text-danger fst-italic"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span>
                </label>
                <input type="email" id="mail" name="mail" value="<?= $_POST['mail'] ?? '' ?>" required>
            </div>
            <div class="d-flex flex-column">
                <label for="specialities">Specialité
                    <span class="text-danger fst-italic"><?= isset($errors['specialities']) ? $errors['specialities'] : '' ?></span>
                </label>
                <select name="specialities" id="">
                    <option value="">--- Selectionner une spécialité ---</option>
                    <?php foreach ($medicalspecialities as $medicalspecialitie) { ?>
                        <option value="<?= $medicalspecialitie['medicalspecialities_id'] ?>"><?= $medicalspecialitie['medicalspecialities_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-flex flex-column">
                <label for="password">Mot de passe
                    <span class="text-danger fst-italic"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                </label>
                <input type="password" id="password" name="password">
            </div>
            <div class="d-flex flex-column">
                <label for="confirmPassword">Confirmer le mot de passe
                    <span class="text-danger fst-italic"><?= isset($errors['confirmPassword']) ? $errors['confirmPassword'] : '' ?></span>
                </label>
                <input type="password" id="confirmPassword" name="confirmPassword">
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
<?php include('templates/footer.php'); ?>
<?php
// require('assets/data/glaces.php');
session_start();
include('templates/header.php');
require_once '../controllers/controller-view-doctor.php';
$actions = [
    1 => 'detail',
    2 => 'edith',
    3 => 'delete'
];
?>

<div class="d-flex justify-content-center">
    <?php
    if (isset($_GET['action']) && array_key_exists($_GET['action'], $actions)) {
        // $glace = $glaces[$_GET['action']];

        if ($_GET['action'] == 1) {
            if (isset($_GET['id'])) { ?>
                <div class="rounded-4">
                    <h3 class="text-center my-5">Details du Docteur <?= $doctor['doctors_name'] ?> <?= $doctor['doctors_lastname'] ?></h3>
                    <div class="px-5 mx-5">
                        <p>Specialité : <?= $doctor['medicalspecialities_name'] ?></p>
                        <!-- <p>Pris en charge par le docteur <?= $doctor['doctors_lastname'] ?> <?= $doctor['doctors_name'] ?></p> -->
                        <p>Télephonne : <?= $doctor['doctors_phonenumber'] ?></p>
                        <p>Mail : <?= $doctor['doctors_mail'] ?></p>
                        <div class="d-flex justify-content-center mb-3">
                            <a href="listdoctors.php" title="Retour a la page d'accueil" class="btn btn-secondary  my-3">Retourner à la liste des rendez-vous</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php }
        if ($_GET['action'] == 2) { ?>
            <div class="rounded-4">
                <?php if (isset($_GET['id'])) { ?>
                    <p class="text-center my-5 h3">Modifier le profil du docteur<?= $doctor['doctors_lastname'] ?> <?= $doctor['doctors_name'] ?></p>
                    <div class="row justify-content-center">
                        <form class="col-lg-4 col-8 border border-success rounded shadow p-4" method="POST" action="" novalidate>
                            <div class="d-flex flex-column">
                                <label for="lastname">Nom
                                    <span class="text-danger fst-italic"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                                </label>
                                <input value="<?= $doctor['doctors_lastname'] ?>" type="text" id="login" name="lastname" value="<?= $_POST['lastname'] ?? '' ?>" required>
                            </div>
                            <div class="d-flex flex-column">
                                <label for="firstname">Prénom
                                    <span class="text-danger fst-italic"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
                                </label>
                                <input value="<?= $doctor['doctors_name'] ?>" type="text" id="firstname" name="firstname" value="<?= $_POST['firstname'] ?? '' ?>" required>
                            </div>
                            <div class="d-flex flex-column">
                                <label for="phoneNumber">Numéro de contact
                                    <span class="text-danger fst-italic"><?= isset($errors['phoneNumber']) ? $errors['phoneNumber'] : '' ?></span>
                                </label>
                                <input value="<?= $doctor['doctors_phonenumber'] ?>" type="text" id="phoneNumber" name="phoneNumber" value="<?= $_POST['phoneNumber'] ?? '' ?>" required>
                            </div>
                            <div class="d-flex flex-column">
                                <label for="mail">E-mail
                                    <span class="text-danger fst-italic"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span>
                                </label>
                                <input value="<?= $doctor['doctors_mail'] ?>" type="email" id="mail" name="mail" value="<?= $_POST['mail'] ?? '' ?>" required>
                            </div>
                            <div class="d-flex flex-column">
                                <label for="specialities">Specialité
                                    <span class="text-danger fst-italic"><?= isset($errors['specialities']) ? $errors['specialities'] : '' ?></span>
                                </label>
                                <select name="specialities" id="">
                                    <option value="">--- Selectionner une spécialité ---</option>
                                    <?php foreach ($medicalespecialities as $medicalspecialitie) { ?>
                                        <option value="<?= $medicalspecialitie['medicalspecialities_id'] ?>"><?= $medicalspecialitie['medicalspecialities_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="text-center d-flex flex-column">
                                <button class="btn btn-success mt-4">Ajouter</button>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
        <?php }
        if ($_GET['action'] == 3) { ?>
            <div class="rounded-4">
                <h3 class="text-center my-5">333</h3>
                <div class="px-5 mx-5">
                    <p>Etes vous sûr de vouloir supprimer ce rendez-vous?</p>

                </div>
            </div>
    <?php }
    } else {
        // header('Location: 404.php');
        // exit();
        require('404.php');
    }
    ?>
</div>


<?php
include('templates/footer.php');

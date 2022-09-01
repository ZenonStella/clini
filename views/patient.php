<?php
// require('assets/data/glaces.php');
session_start();
include('templates/header.php');
require_once '../controllers/controller-view-patient.php';
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
                    <h3 class="text-center my-5">Details du Patient <?= $patient['patients_firstname'] ?> <?= $patient['patients_lastname'] ?></h3>
                    <div class="px-5 mx-5">
                        <p>Télephonne : <?= $patient['patients_phonenumber'] ?></p>
                        <p>Mail : <?= $patient['patients_mail'] ?></p>
                        <p>adresse : <?= $patient['patients_address'] ?></p>
                        <div class="d-flex justify-content-center mb-3">
                            <a href="listpatients.php" title="Retour a la page d'accueil" class="btn btn-secondary  my-3">Retourner à la liste des rendez-vous</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php }
        if ($_GET['action'] == 2) { ?>
            <div class="rounded-4">
                <?php if (isset($_GET['id'])) { ?>
                    <p class="text-center my-5 h3">Modifier le profil du patient <?= $patient['patients_lastname'] ?> <?= $patient['patients_firstname'] ?></p>
                    <div class="row justify-content-center">
                        <form class="col-lg-4 col-8 border border-success rounded shadow p-4" method="POST" action="" novalidate>
                            <div class="d-flex flex-column">
                                <label for="lastname">Nom
                                    <span class="text-danger fst-italic"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                                </label>
                                <input value="<?= $patient['patients_lastname'] ?>" type="text" id="login" name="lastname" value="<?= $_POST['lastname'] ?? '' ?>" required>
                            </div>
                            <div class="d-flex flex-column">
                                <label for="firstname">Prénom
                                    <span class="text-danger fst-italic"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
                                </label>
                                <input value="<?= $patient['patients_firstname'] ?>" type="text" id="firstname" name="firstname" value="<?= $_POST['firstname'] ?? '' ?>" required>
                            </div>
                            <div class="d-flex flex-column">
                                <label for="phoneNumber">Numéro de contact
                                    <span class="text-danger fst-italic"><?= isset($errors['phoneNumber']) ? $errors['phoneNumber'] : '' ?></span>
                                </label>
                                <input value="<?= $patient['patients_phonenumber'] ?>" type="text" id="phoneNumber" name="phoneNumber" value="<?= $_POST['phoneNumber'] ?? '' ?>" required>
                            </div>
                            <div class="d-flex flex-column">
                                <label for="mail">E-mail
                                    <span class="text-danger fst-italic"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span>
                                </label>
                                <input value="<?= $patient['patients_mail'] ?>" type="email" id="mail" name="mail" value="<?= $_POST['mail'] ?? '' ?>" required>
                            </div>
                            <div class="d-flex flex-column">
                                <label for="address">Adresse
                                    <span class="text-danger fst-italic"><?= isset($errors['address']) ? $errors['address'] : '' ?></span>
                                </label>
                                <input value="<?= $patient['patients_address'] ?>" type="address" id="address" name="address" value="<?= $_POST['address'] ?? '' ?>" required>
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
                <?php if (isset($_GET['id'])) { ?>
                    <h3 class="text-center my-5">333</h3>
                    <div class="px-5 mx-5">
                        <p>Etes vous sûr de vouloir supprimer ce rendez-vous?</p>
                        <form action="" method="get">
                            <a href="delete.php?id=<?= $_GET['id'] ?>&clinic=1" class="btn btn-danger">Oui</a>
                            <a class="btn btn-primary" href="listPatients.php">Non</a>
                        </form>
                    </div>
                <?php } ?>
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

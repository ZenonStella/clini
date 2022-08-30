<?php
// require('assets/data/glaces.php');
session_start();
include('templates/header.php');
require_once '../controllers/controller-view-meet.php';
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
                    <h3 class="text-center my-5">Details du rendez-vous du <?= $meet['rendezvous_date'] ?></h3>
                    <div class="px-5 mx-5">
                        <p>Patient : <?= $meet['patients_lastname'] ?> <?= $meet['patients_firstname'] ?></p>
                        <p>Pris en charge par le docteur <?= $meet['doctors_lastname'] ?> <?= $meet['doctors_name'] ?></p>
                        <p><?= $meet['rendezvous_description'] ?></p>
                        <p>Le <?= $meet['rendezvous_date'] ?> à <?= $meet['rendezvous_hour'] ?></p>
                        <div class="d-flex justify-content-center mb-3">
                            <a href="listMeets.php" title="Retour a la page d'accueil" class="btn btn-secondary  my-3">Retourner à la liste des rendez-vous</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php }
        if ($_GET['action'] == 2) { ?>
            <div class="rounded-4">
                <?php if (isset($_GET['id'])) { ?>
                    <p class="text-center my-5 h3">Modifier le rendez-vous de <?= $meet['patients_lastname'] ?> <?= $meet['patients_firstname'] ?><br>Avec le docteur <?= $meet['doctors_lastname'] ?> <?= $meet['doctors_name'] ?></p>
                    
                    <div class="row justify-content-center">  
                      <form class="col-lg-5 col-10 border border-success rounded shadow p-4 mb-5" method="POST" action="" novalidate>
                            <div class="d-flex flex-column">
                                <label for="date">Date du rendez-vous
                                    <span class="text-danger fst-italic"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
                                </label>
                                <input type="date" name="date" id="date" value="<?= $meet['rendezvous_date'] ?>">
                            </div>
                            <div class="d-flex flex-column">
                                <label for="hour">Heure du rendez-vous
                                    <span class="text-danger fst-italic"><?= isset($errors['hour']) ? $errors['hour'] : '' ?></span>
                                </label>
                                <input type="time" name="hour" id="hour" value="<?= $meet['rendezvous_hour'] ?>">
                            </div>
                            <div class="d-flex flex-column">
                                <label for="description">Description des symptômes
                                    <span class="text-danger fst-italic"><?= isset($errors['description']) ? $errors['description'] : '' ?></span>
                                </label>
                                <textarea name="description" id="description" rows="5"><?= $meet['rendezvous_description'] ?></textarea>
                            </div>
                            <div class="text-center d-flex flex-column">
                                <button class="btn btn-success mt-4">Modifier</button>
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

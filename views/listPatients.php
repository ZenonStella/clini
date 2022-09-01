<?php
session_start();
require_once '../controllers/controller-listPatients.php';
include('templates/header.php');
?>
<div class="p-3">
    <p class="h2 text-center">Bienvenue</p>
    <div class="row justify-content-evenly text-light py-5">
        <div class="col-10">
            <table class="table table-danger table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient) { ?>
                        <tr>
                            <th scope="row"><?= $patient['patients_id'] ?></th>
                            <td><?= $patient['patients_lastname'] ?></td>
                            <td><?= $patient['patients_firstname'] ?></td>
                            <td><?= $patient['patients_mail'] ?></td>
                            <td>
                                <a href="patient.php?action=1&id=<?= $patient['patients_id'] ?>" class="btn btn-warning btn-sm">+ d'info</a>
                                <a href="patient.php?action=2&id=<?= $patient['patients_id'] ?>" class="btn btn-primary btn-sm">Modifier</a>
                                <a href="patient.php?action=3&id=<?= $patient['patients_id'] ?>" class="btn btn-danger btn-sm">Suprrimer</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php
include('templates/footer.php');

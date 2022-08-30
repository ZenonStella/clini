<?php
session_start();
require_once '../controllers/controller-listDoctors.php';
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
                        <th scope="col">Spécialité</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($doctors as $doctor) { ?>
                        <tr>
                            <th scope="row"><?= $doctor['doctors_id'] ?></th>
                            <td><?= $doctor['doctors_lastname']?></td>
                            <td><?= $doctor['doctors_name']?></td>
                            <td><?= $doctor['doctors_mail']?></td>
                            <td><?= $doctor['medicalspecialities_name']?></td>
                            <td>
                                <a href="doctors.php?action=1&id=<?= $doctor['doctors_id'] ?>" class="btn btn-warning btn-sm">+ d'info</a>
                                <a href="doctors.php?action=2&id=<?= $doctor['doctors_id'] ?>" class="btn btn-primary btn-sm">Modifier</a>
                                <a href="doctors.php?action=3&id=<?= $doctor['doctors_id'] ?>" class="btn btn-danger btn-sm">Suprrimer</a>
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

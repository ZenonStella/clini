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
                    <?php foreach ($patients as $value) { ?>
                        <tr>
                            <th scope="row"><?= $value['patients_id'] ?></th>
                            <td><?= $value['patients_lastname']?></td>
                            <td><?= $value['patients_firstname']?></td>
                            <td><?= $value['patients_mail']?></td>
                            <td><a href="" class="btn btn-warning btn-sm">+ d'info</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php
include('templates/footer.php');

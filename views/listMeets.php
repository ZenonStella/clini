<?php
session_start();
require_once '../controllers/controller-listMeets.php';
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
                        <th scope="col">Date</th>
                        <th scope="col">Heure</th>
                        <th scope="col">Description</th>
                        <th scope="col">Patient</th>
                        <th scope="col">Spécialiste</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($meets as $meet) { ?>
                        <tr>
                            <th scope="row"><?= $meet['rendezvous_id'] ?></th>
                            <td><?= $meet['rendezvous_date']?></td>
                            <td><?= $meet['rendezvous_hour']?></td>
                            <td><?= $meet['rendezvous_description']?></td>
                            <td><?= $meet['patients_lastname'] . ' ' . $meet['patients_firstname']?> </td>
                            <td><?= $meet['doctors_name'] . ' ' . $meet['doctors_lastname']?></td>
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

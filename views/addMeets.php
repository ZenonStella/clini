<?php
session_start();
require_once '../controllers/controller-addMeets.php';
?>
<?php include('templates/header.php'); ?>
<div class="p-3">
    <p class="h2 text-center">Ajout d'un nouveau rendez-vous</p>
    <div class="row justify-content-center">
        <form class="col-lg-4 col-8 border border-success rounded shadow p-4" method="POST" action="" novalidate>
            <div class="d-flex flex-column">
                <label for="doctors">Docteurs
                    <span class="text-danger fst-italic"><?= isset($errors['doctors']) ? $errors['doctors'] : '' ?></span>
                </label>
                <select name="doctors" id="">
                    <option value="">--- Selectionner un spécialiste ---</option>
                    <?php foreach ($doctors as $doctor) { ?>
                        <option value="<?= $doctor['doctors_id'] ?>">Doc.<?= $doctor['doctors_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-flex flex-column">
                <label for="patients">Patients
                    <span class="text-danger fst-italic"><?= isset($errors['patients']) ? $errors['patients'] : '' ?></span>
                </label>
                <select name="patients" id="">
                    <option value="">--- Selectionner un patient ---</option>
                    <?php foreach ($patients as $patient) { ?>
                        <option value="<?= $patient['patients_id'] ?>"><?= $patient['patients_lastname'] . ' ' . $patient['patients_firstname'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-flex flex-column">
                <label for="date">Date du rendez-vous
                    <span class="text-danger fst-italic"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
                </label>
                <input type="date" name="date" id="date">
            </div>
            <div class="d-flex flex-column">
                <label for="hour">Heure du rendez-vous
                    <span class="text-danger fst-italic"><?= isset($errors['hour']) ? $errors['hour'] : '' ?></span>
                </label>
                <input type="time" name="hour" id="hour">
            </div>
            <div class="d-flex flex-column">
                <label for="description">Description des symptômes
                    <span class="text-danger fst-italic"><?= isset($errors['description']) ? $errors['description'] : '' ?></span>
                </label>
                <textarea name="description" id="description" rows="5"></textarea>
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
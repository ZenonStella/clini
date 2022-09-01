<?php
session_start();
include('templates/header.php');
require_once '../controllers/controller-delete.php';
?>
<p><?= $clinic ?></p>
<?php
include('templates/footer.php');

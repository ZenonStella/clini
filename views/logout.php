<?php
session_start();
session_unset();
session_destroy();
include('../inc/header.php');
?>
<h1 class="mt-5 title text-center">Deconnextion</h1>
<p>Vous vous êtes bien deconnecter</p>
<?php 
include('../inc/footer.php');
<?php
session_start();
session_unset();
session_destroy();
include('templates/header.php');
?>
<pre>
    <?php 
        print_r($_SESSION);
    ?>
</pre>
<h1 class="mt-5 title text-center">Deconnextion</h1>
<p>Vous vous êtes bien deconnecter</p>
<?php 
include('templates/footer.php');
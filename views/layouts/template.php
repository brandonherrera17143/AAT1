<?php
require_once(__DIR__ . '/../../autoload.php');

use controller\enlaces\EnlacesController;

$paginas = new EnlacesController();

?>
<?php include(__DIR__ . '/../includes/cabecera.php'); ?>
<?php include(__DIR__ . '/../includes/navBar.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php
            $paginas->enlacesPaginasController();
            ?>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../includes/footer.php'); ?>
<?php 
include_once 'inc/layouts/header.php'; 
include_once 'inc/functions/functions.php';
?>


<?php 

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if (!$id){
    die('no es valido');
}


$contact = loadContact($id)->fetch_assoc();

$name = $contact['contact_name'];
$workplace = $contact['workplace'];
$phone = $contact['phone'];

?>



<div class="bar-container">
    <div class="container bar">
        <a href="index.php" class="btn return">Volver</a>
        <h1>Editar Contacto</h1>
    </div>
</div>

<div class="bg-yellow container shadow">
    <form id="contacto" action="">
        <legend>Edite el Contacto <span>Todos los campos son Obligarorios</span></legend>
        
        <?php include_once 'inc/layouts/form.php'; ?>
    </form>
</div>



<?php include_once 'inc/layouts/footer.php'; ?>
<?php include_once 'inc/layouts/header.php'; 
      include_once 'inc/functions/functions.php';  
?>

<div class="bar-container">
    <h1>Agenda de Contactos</h1>
</div>

<div class="bg-yellow container shadow">

    <form id="contacto" action="#">
        <legend>Añada un Contacto <span>Todos los campos son obligarios</span></legend>

        <?php include_once 'inc/layouts/form.php'; ?>
    </form>

</div>

<div class="bg-white container shadow contacts">
    <div class="contacts-container">
        <h2>Contactos</h2>
        <input type="text" id="search" class="explorer shadow" placeholder="Buscar Contactos..">

        <p class="total-contacts"><span>2 </span>Contactos</p>

        <div class="table-container">
            <table id="contact-list" class="contact-list">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $contacts = loadContacts();
                        

                        if ($contacts->num_rows): 
                            
                            foreach ($contacts as $contact):
                            
                            $name = $contact['contact_name'];    
                            $phone = $contact['phone'];    
                            $workplace = $contact['workplace'];
                            $id = $contact['contact_id'];    
                        ?>
                            <tr>
                                <td><?php echo $name ?></td>
                                <td><?php echo $workplace ?></td>
                                <td><?php echo $phone ?></td>
                                <td>
                                    <a class="btn btn-edit" href="edit.php?id=<?php echo $id?>">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                    <button data-id="<?php echo $id?>" class="btn btn-delete" type="button"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                    <?php   endforeach; 
                        endif;  
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include_once 'inc/layouts/footer.php'; ?>
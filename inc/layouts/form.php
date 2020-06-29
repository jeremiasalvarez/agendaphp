<div class="fields">
    <div class="field">
        <label for="name">Nombre:</label>
        <input type="text" placeholder="Nombre de Contacto"
        id="name" value="<?php echo ($contact['contact_name']) ? $contact['contact_name'] : '' ?>">
    </div> 
    <div class="field">
        <label for="workplace">Empresa:</label>
        <input type="text" placeholder="Nombre de Empresa"
        id="workplace" value="<?php echo ($contact['workplace']) ? $contact['workplace'] : '' ?>">
    </div> 
    <div class="field">
        <label for="phone">Telefono:</label>
        <input type="tel" placeholder="Telefono de Contacto"
        id="phone"  value="<?php echo ($contact['phone']) ? $contact['phone'] : '' ?>">
    </div>      
</div>
<div class="field send">

        <?php 
            $text = ($contact['phone']) ? "Guardar" : "Añadir";
            $value = ($contact['phone']) ? "update" : "create";
        ?>

        <input type="hidden" id="action" value= <?php echo $value ?>>
        <input type="submit" value=<?php echo $text ?>>
</div>  
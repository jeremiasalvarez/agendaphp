<?php include_once 'inc/layouts/header.php'; ?>

<div class="bar-container">
    <h1>Agenda de Contactos</h1>
</div>

<div class="bg-yellow container shadow">

    <form id="contacto" action="">
        <legend>Añada un Contacto <span>Todos los campos son obligarios</span></legend>

        <div class="fields">
            <div class="field">
                <label for="name">Nombre:</label>
                <input type="text" placeholder="Nombre de Contacto"
                id="name">
            </div> 
            <div class="field">
                <label for="workplace">Empresa:</label>
                <input type="text" placeholder="Nombre de Empresa"
                id="workplace">
            </div> 
            <div class="field">
                <label for="phone">Telefono:</label>
                <input type="tel" placeholder="Telefono de Contacto"
                id="phone">
            </div>      
        </div>
        <div class="field send">
                <input type="submit" value="Añadir">
        </div>  
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
                    <tr>
                        <td>Juan</td>
                        <td>Apple</td>
                        <td>23424235</td>
                        <td>
                            <a class="btn btn-edit" href="#">
                                <i class="fas fa-pen-square"></i>
                            </a>
                            <button data-id="1" class="btn btn-delete" type="button"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Juan</td>
                        <td>Apple</td>
                        <td>23424235</td>
                        <td>
                            <a class="btn btn-edit" href="#">
                                <i class="fas fa-pen-square"></i>
                            </a>
                            <button data-id="1" class="btn btn-delete" type="button"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Juan</td>
                        <td>Apple</td>
                        <td>23424235</td>
                        <td>
                            <a class="btn btn-edit" href="#">
                                <i class="fas fa-pen-square"></i>
                            </a>
                            <button data-id="1" class="btn btn-delete" type="button"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include_once 'inc/layouts/footer.php'; ?>
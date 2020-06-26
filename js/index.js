const formularioContacto = document.querySelector('#contacto');
const tableBody = document.querySelector('#contact-list tbody');


events();


function events() {
    formularioContacto.addEventListener('submit', readForm);
    tableBody.addEventListener('click', deleteContact);
}

function deleteContact(e) {

    let deleteButtonPressed = e.target.parentElement.classList.contains('btn-delete');

    if (deleteButtonPressed) {

        const deleteButton = e.target.parentElement;

        console.log(deleteButton);
        const contactId = deleteButton.getAttribute('data-id');

        const userResponse = confirm("¿Estas seguro de que quieres eliminar el contacto?");

        if (userResponse) {

            const xhr = new XMLHttpRequest();

            xhr.open('GET', `inc/models/contact_model.php?id=${contactId}&action=delete`, true);

            xhr.onload = function() {

                if (this.status === 200) {

                    const response = JSON.parse(xhr.responseText);


                    if (response.status == 'success') {

                        const row = e.target.parentElement.parentElement.parentElement;

                        row.remove();

                        showPopup("El contacto se elimino exitosamente", 'success');


                    } else {
                        showPopup("Ocurrio un error al eliminar el contacto", 'error');
                    }
                }

            }

            xhr.send();

        }

    }

}


function readForm(event) {
    event.preventDefault();

    const name = document.querySelector('#name').value;
    const workplace = document.querySelector('#workplace').value;
    const phone = document.querySelector('#phone').value;
    const action = document.querySelector('#action').value;

    if (name === '' || workplace === '' || phone === '') {
        showPopup('Todos los campos son Obligatorios', 'error');
    } else {

        const contactInfo = new FormData();

        contactInfo.append('name', name);
        contactInfo.append('workplace', workplace);
        contactInfo.append('phone', phone);
        contactInfo.append('action', action);

        if (action === 'create') {
            insertDb(contactInfo);
        }
    }
}

function showPopup(msg, type) {
    const popup = document.createElement('div');
    popup.classList.add(type, 'popup', 'shadow');
    const legend = document.querySelector('form legend');
    popup.textContent = msg;

    formularioContacto.insertBefore(popup, legend);

    setTimeout(() => {
        popup.classList.add('visible');
        setTimeout(() => {
            popup.classList.remove('visible');
            setTimeout(() => {
                popup.remove();
            }, 500);
        }, 3000);
    }, 100);
}

function insertDb(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'inc/models/contact_model.php', true);

    xhr.onload = function() {
        if (this.status == 200) {

            const response = JSON.parse(xhr.responseText);

            const newContact = document.createElement('tr');

            newContact.innerHTML = `
                <td>${response.data.name}</td>
                <td>${response.data.workplace}</td>
                <td>${response.data.phone}</td>
            `
            const actionsContainer = document.createElement('td');

            //* icon

            const editIcon = document.createElement('i');

            editIcon.classList.add('fas', 'fa-pen-square');

            const editLink = document.createElement('a');
            editLink.setAttribute('href', `edit.php?id=${response.data.inserted_id}`);
            editLink.classList.add('btn', 'btn-edit');

            editLink.appendChild(editIcon);


            const deleteIcon = document.createElement('i');

            deleteIcon.classList.add('fas', 'fa-trash-alt');

            const deleteButton = document.createElement('button');

            deleteButton.setAttribute('data-id', `${response.data.inserted_id}`);
            deleteButton.setAttribute('type', 'button');
            deleteButton.classList.add('btn', 'btn-delete');

            deleteButton.appendChild(deleteIcon);

            actionsContainer.appendChild(editLink);
            actionsContainer.appendChild(deleteButton);

            newContact.appendChild(actionsContainer);

            tableBody.appendChild(newContact);

            showPopup('Contacto creado exitosamente', 'success');

            document.querySelector('form').reset();
        }
    }

    xhr.send(data);
}
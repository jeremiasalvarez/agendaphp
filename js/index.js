const formularioContacto = document.querySelector('#contacto');

events();


function events() {
    formularioContacto.addEventListener('submit', readForm);
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
        } else {

        }


        showPopup('Contacto creado exitosamente', 'success');
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


            console.log(response);
        }
    }

    xhr.send(data);
}
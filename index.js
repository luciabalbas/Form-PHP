// Script - Práctica PHP - Lucía Balbás

// Variables del formulario
let uName = document.getElementById("name");
let uSurname = document.getElementById("surname");
let uEmail = document.getElementById("email");

// Funcion para validar formulario
function validateForm(event) {
    // Enviar Formulario
    sendForm = true;

    // Nombre - Si vacío
    if (uName.value == "") {
        error(uName, "* Este campo es obligatorio");
    }
    else {
        success(uName);
    }

    // Apellido - Si vacio
    if (uSurname.value == "") {
        error(uSurname, "* Este campo es obligatorio");
    }
    else {
        success(uSurname);
    }

    // Email - Si vacío
    if (uEmail.value == "") {
        error(uEmail, "* Este campo es obligatorio");
    }
    else {
        success(uEmail);
    }

    // Si hay algún error - No se envía
    if (sendForm == false) {
        event.preventDefault();
    }
}

// Funcion Exito - Para el input
function success(input) {
    let parent = input.parentElement;
    let text = parent.querySelector("p");
    text.textContent = "";
    parent.classList.remove("error");
    parent.classList.add("success");
}

// Funcion Error - Para el input
function error(input, message) {
    let parent = input.parentElement;
    let text = parent.querySelector("p");
    text.textContent = message;
    parent.classList.remove("success");
    parent.classList.add("error");
    sendForm = false;
}
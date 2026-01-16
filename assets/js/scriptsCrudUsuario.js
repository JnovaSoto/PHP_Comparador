function validarInput(input) {
    if (input.value == "") {
        input.classList.add('is-invalid');
        input.classList.remove('is-valid');
    } else {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }
}

function esMismaContrasenia(inputComprobar1, inputComprobar2) {
    return inputComprobar1.value === inputComprobar2.value;
}

window.onload = function () {
    // Determine context
    const isListado = window.location.href.includes("index.php?accion=listarUsuario");
    const isForm = document.getElementById("formularioRegistro") !== null;

    if (isListado) {
        fetch('jsons.php?modo=todosUsuarios')
            .then(response => response.json())
            .then(data => {
                const grid = document.getElementsByClassName("gridUsuarios")[0];
                if (!grid) return;

                let tablaUsuarios = "";
                data.forEach(user => {
                    tablaUsuarios += `
                        <div>${user.idUsuario}</div>
                        <div>${user.email}</div>
                        <div>${user.nombre}</div>
                        <div>••••••••</div>
                        <div>${user.esAdmin == 1 ? '<span class="pill">Sí</span>' : 'No'}</div>
                        <div><a class='botonEditar' href='index.php?accion=editarUsuario&idUsuario=${user.idUsuario}'><i class="fas fa-edit"></i></a></div>
                        <div><a class='botonEliminar' href='index.php?accion=listarUsuario&idUsuario=${user.idUsuario}'><i class="fas fa-trash"></i></a></div>
                    `;
                });
                grid.innerHTML += tablaUsuarios;
            })
            .catch(err => console.error("Error loading users:", err));
    } else if (isForm) {
        const inputCorreo = document.getElementById("inputCorreo");
        const inputNombre = document.getElementById("inputNombre");
        const inputContra1 = document.getElementById("inputContra1");
        const inputContra2 = document.getElementById("inputContra2");
        const botonRegistrar = document.getElementById("botonRegistrar");
        const errorLabel = document.getElementById("errorContra");

        if (inputCorreo) inputCorreo.addEventListener("input", () => validarInput(inputCorreo));
        if (inputNombre) inputNombre.addEventListener("input", () => validarInput(inputNombre));

        if (inputContra2 && inputContra1) {
            const checkPass = () => {
                const esMisma = esMismaContrasenia(inputContra1, inputContra2);
                if (!esMisma && inputContra2.value !== "") {
                    inputContra1.classList.add('is-invalid');
                    inputContra2.classList.add('is-invalid');
                    inputContra1.classList.remove('is-valid');
                    inputContra2.classList.remove('is-valid');
                    if (botonRegistrar) botonRegistrar.disabled = true;
                    if (errorLabel) errorLabel.style.display = "flex";
                } else if (inputContra2.value !== "") {
                    inputContra1.classList.remove('is-invalid');
                    inputContra2.classList.remove('is-invalid');
                    inputContra1.classList.add('is-valid');
                    inputContra2.classList.add('is-valid');
                    if (botonRegistrar) botonRegistrar.disabled = false;
                    if (errorLabel) errorLabel.style.display = "none";
                }
            };

            inputContra2.addEventListener("input", checkPass);
            inputContra1.addEventListener("input", checkPass);
        }
    }
}
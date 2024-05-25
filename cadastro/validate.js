document.addEventListener("DOMContentLoaded", function () {
    var form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        var nome = document.getElementById("nome");
        var cpf = document.getElementById("cpf");
        var password = document.getElementById("password");
        var fone = document.getElementById("fone");
        var email = document.getElementById("email");
        var nivel = document.getElementById("nivel");
        var cep = document.getElementById("cep");
        var rua = document.getElementById("rua");
        var numero = document.getElementById("numero");
        var bairro = document.getElementById("bairro");
        var cidade = document.getElementById("cidade");
        var estado = document.getElementById("estado");
        var isValid = true;

        function showError(input) {
            input.classList.add("error-border");

            isValid = false;
        }

        function removeError(input) {
            input.classList.remove("error-border");
        }

        if (nome.value.trim() === "") {
            showError(nome);
        } else {
            removeError(nome);
        }

           if (cpf.value.trim() === "") {
            showError(cpf);
        } else {
            removeError(cpf);
        }

        if (password.value.trim() === "") {
            showError(password);
        } else {
            removeError(password);
        }

        if (fone.value.trim() === "") {
            showError(fone);
        } else {
            removeError(fone);
        }

        if (email.value.trim() === "") {
            showError(email);
        } else {
            removeError(email);
        }

        if (nivel.value.trim() === "") {
            showError(nivel);
        } else {
            removeError(nivel);
        }

        if (cep.value.trim() === "") {
            showError(cep);
        } else {
            removeError(cep);
        }

        if (rua.value.trim() === "") {
            showError(rua);
        } else {
            removeError(rua);
        }

        if (numero.value.trim() === "") {
            showError(numero);
        } else {
            removeError(numero);
        }

        if (bairro.value.trim() === "") {
            showError(bairro);
        } else {
            removeError(bairro);
        }

        if (cidade.value.trim() === "") {
            showError(cidade);
        } else {
            removeError(cidade);
        }

        if (estado.value.trim() === "") {
            showError(estado);
        } else {
            removeError(estado);
        }


        if (!isValid) {
            event.preventDefault();
        }
    });
});

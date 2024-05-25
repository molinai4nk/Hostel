
function calcularValorTotal() {
    var checkinDate = new Date(document.getElementById("checkin").value);
    var checkoutDate = new Date(document.getElementById("checkout").value);
    var precoDiaria = document.getElementById("preco-diaria").value;

    if (!isNaN(precoDiaria) && precoDiaria.trim() !== "") {
        precoDiaria = parseFloat(precoDiaria);
        var quantidadeDias = Math.ceil((checkoutDate - checkinDate) / (1000 * 60 * 60 * 24)) + 1;

        if (quantidadeDias < 1) {
            quantidadeDias = 1;
        }

        var valorTotal = precoDiaria * quantidadeDias;
        document.getElementById('valor-total-hidden').value = valorTotal.toFixed(2);
        return valorTotal.toFixed(2);
    } else {
        return "0.00";
    }
}



function exibirFormularioReserva(local, tipo_suitedeluxo, precoDiaria) {
    document.getElementById('local').value = local;
    document.getElementById('tipo_suitedeluxo').value = tipo_suitedeluxo;
    document.getElementById('preco-diaria').value = precoDiaria;
    document.getElementById('reserva-box').style.display = 'block';
}

    

function fecharReservaBox() {
    document.getElementById('reserva-box').style.display = 'none';
    document.getElementById("preco-diaria").value = "";
}



document.addEventListener("DOMContentLoaded", function () {
    var checkinInput = document.getElementById("checkin");
    var checkoutInput = document.getElementById("checkout");
    var valorTotalSpan = document.getElementById("span-valor-total");


    [checkinInput, checkoutInput].forEach(function (input) {
        input.addEventListener("change", function () {
            valorTotalSpan.textContent = "R$ " + calcularValorTotal();
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var checkinInput = document.getElementById("checkin");
    var checkoutInput = document.getElementById("checkout");
    var valorTotalSpan = document.getElementById("valorTotal"); // Certifique-se de que o elemento existe

    var currentDate = new Date();
    currentDate.setHours(0, 0, 0, 0);

    checkinInput.setAttribute("min", currentDate.toISOString().split("T")[0]);

    checkinInput.addEventListener("change", function () {
        var selectedCheckinDate = new Date(checkinInput.value);
        selectedCheckinDate.setHours(0, 0, 0, 0);

        // Adicione um dia à data de checkin para definir o mínimo do checkout
        selectedCheckinDate.setDate(selectedCheckinDate.getDate() + 1);
        checkoutInput.setAttribute("min", selectedCheckinDate.toISOString().split("T")[0]);

        if (selectedCheckinDate > currentDate) {
            checkoutInput.value = checkinInput.value;
        } else {
            checkoutInput.value = "";
        }

        // Atualize o valor total
        valorTotalSpan.textContent = "R$ " + calcularValorTotal();
    });

    [checkinInput, checkoutInput].forEach(function (input) {
        input.addEventListener("change", function () {
            valorTotalSpan.textContent = "R$ " + calcularValorTotal();
        });
    });
});


function iniciarCarrosseis() {
    var carrosseis = document.querySelectorAll('.image-slider');

    carrosseis.forEach(function (carrossel) {
        var imagens = carrossel.querySelectorAll('img');
        var indiceAtual = 0;

       
        function mostrarProximaImagem() {
            imagens[indiceAtual].style.display = 'none';
            indiceAtual = (indiceAtual + 1) % imagens.length;
            imagens[indiceAtual].style.display = 'block';
        }

       
        imagens.forEach(function (imagem, index) {
          
            if (index !== 0) {
                imagem.style.display = 'none';
            }
        });

 
        setInterval(mostrarProximaImagem, 3000);
    });
}


document.addEventListener("DOMContentLoaded", function () {
    iniciarCarrosseis();

});


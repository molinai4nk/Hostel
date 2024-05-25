<?php
session_start();

if (!isset($_SESSION['usuario_autenticado'])) {
    header("Location: ../../cadastro/login.php");
    exit();
}

$nivelDeAcesso = $nivelDeAcesso = $_SESSION['nivel_de_acesso'];
$usuarioEmail = $_SESSION['usuario_email'];


$emailDoUsuario = $usuarioEmail ?? null;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $lugar = $_POST['local'];
    $tipo_suitedeluxo = $_POST['tipo_suitedeluxo'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $valorTotal = $_POST['valor-total'];
    $formaPagamento = $_POST['payment'];

    $reservas = file_exists('reservas.json') ? json_decode(file_get_contents('reservas.json'), true) : [];


    $reserva = [
        'usuario' => $usuarioEmail,
        'local' => $lugar,
        'tipo_suitedeluxo' => $tipo_suitedeluxo,
        'checkin' => $checkin,
        'checkout' => $checkout,
        'valor-total' => $valorTotal,
        'forma-pagamento' => $formaPagamento,
    ];
    if ($usuarioEmail !== null) {
        $reservas[] = $reserva;
    }

    file_put_contents('reservas.json', json_encode($reservas, JSON_PRETTY_PRINT));


    header("Location: reserva_concluida.php");
    exit();

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel - Reservas</title>
    <link rel="stylesheet" href="../../index.css">
    <script src="../../script.js"></script>
    <link rel="icon" href="../../sobre/img/icon1.png" type="image/png">
    <link rel="stylesheet" href="../princ.css">
</head>

<body style="background-color: #ededed;">
    <div id="topo">
        <div class="dropdown" style="float:right;">
            <button onclick="toggleDropdown()">Perfil &#9660;</button>
            <div id="myDropdown" class="dropdown-content">
                <li class="drop"><a class="drop2" href="../perf/perfil.php">Perfil</a></li>
                <li class="drop"><a class="drop2" href="../sair/logout.php">Logout</a></li>
            </div>
        </div>
        <div class="logo-container">
            <p style="text-align: left;">
                <img src="../../sobre/img/logo.png" alt="Logotipo" style="max-width: 100%; height: 150px;">
            </p>
        </div>
        <nav>
            <ul>
                <li class="cabeça"><a href="../index.php" class="cabeça2">Hospedagens</a></li>
                <li class="cabeça"><a class="cabeça2" href="../../sobre/list_sobre.php">Sobre</a></li>
                <li class="cabeça"><a href="" class="cabeça2">Reservas</a></li>
                <li class="cabeça"><a href="minhas_reservas.php" class="cabeça2">Minhas Reservas</a></li>
                <?php if ($nivelDeAcesso == 'adm'): ?>
                <li class="cabeça"><a class="cabeça2" href="../../cadastro/Adm/Adm.php">Administrador</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="hotel-container">
            <div class="hotel-info">
                <h3 class="titulo-hotel">Suíte de Luxo - São Paulo</h3>
                <p>Nossa suíte é perfeita para casais em busca de conforto e espaço, com a capacidade adicional de
                    acomodar até duas crianças. Com generosos 60m², este espaço oferece uma atmosfera acolhedora e
                    relaxante. Desfrute da vista incrível de frente para a piscina, adicionando um toque de
                    serenidade à sua estadia. Com a combinação de acomodações espaçosas e comodidades exclusivas,
                    sua experiência em nosso estabelecimento será inesquecível. Seu refúgio ideal aguarda você nesta
                    suíte encantadora.
                    <br><br><br><br>
                    Diaria: R$ 1200.00
                    <br><br>
                </p>
                <button onclick="exibirFormularioReserva('São Paulo', 'Suíte-Luxo', 1200)">Reserve aqui</button>
            </div>
            <div class="hotel-box" data-preco="1200">
                <div class="image-container">
                    <div class="image-slider">
                        <img src="img/sp/Sp-Hotel.jpg" alt="hotel">
                        <img src="img/sp/sp-suiteluxo.jpg" alt="sala">
                        <img src="img/sp/suiteluxo-sp2.jpg" alt="quarto">
                        <img src="img/sp/refeicao-sphotel.jpg" alt="refeicao">
                    </div>
                </div>
            </div>
        </div>

        <div class="hotel-container">
            <div class="hotel-info">
                <h3 class="titulo-hotel">Resort - São Paulo</h3>
                <p>

                    Bem-vindo ao nosso resort, onde o conforto se encontra com a beleza natural. Nossos
                    quartos espaçosos são ideais para famílias, acomodando até seis pessoas. Desfrute da serenidade da
                    piscina e explore atividades emocionantes para todas as idades, incluindo um parque aquático, cinema
                    e área de jogos. Mime-se com café da manhã, almoço e jantar inclusos, apresentando uma culinária
                    deliciosa com ingredientes locais. Criamos não apenas acomodações, mas memórias inesquecíveis em
                    nosso refúgio paradisíaco.
                    <br><br><br><br>
                    Diaria: R$ 220.00
                    <br><br>
                </p>
                <button onclick="exibirFormularioReserva('São Paulo', 'Resort', 220)">Reserve aqui</button>
            </div>
            <div class="hotel-box" data-preco="220">
                <div class="image-slider">
                    <img src="img/sp/Hotel.jpg" alt="Resort-Sp">
                    <img src="img/sp/Resort-sp.jpg" alt="Quarto">
                    <img src="img/sp/parque-sp.jpg" alt="parque">
                    <img src="img/sp/refeicao-sp.jpg" alt="refeicao">
                </div>
            </div>
        </div>

        <div class="hotel-container">
            <div class="hotel-info">
                <h3 class="titulo-hotel">Suíte de luxo - Rio de Janeiro</h3>
                <p>
                    Desfrute do requinte em nossa espaçosa Suite de Luxo no coração do Rio de Janeiro, oferecendo
                    generosos 80m² de elegância. Com uma deslumbrante vista para o mar, esta suíte proporciona uma
                    experiência única de conforto e sofisticação. As refeições inclusas elevam a estadia, apresentando
                    os sabores autênticos do Rio em cada prato. Cada detalhe foi cuidadosamente pensado para criar um
                    refúgio de luxo, proporcionando uma estadia inesquecível na cidade maravilhosa. Permita-se mergulhar
                    na beleza natural e cultural do Rio, enquanto se entrega ao conforto exclusivo desta Suite de Luxo à
                    beira-mar.
                    <br><br><br><br>

                    Diaria: R$ 1300.00
                    <br><br>
                </p>
                <button onclick="exibirFormularioReserva('Rio de Janeiro', 'Suíte-Luxo', 1300)">Reserve aqui</button>
            </div>
            <div class="hotel-box" data-preco="1300">
                <div class="image-slider">
                    <img src="img/rj/Rj-Hotel.jpg" alt="Hotel-rj">
                    <img src="img/rj/Rj-suiteluxo2.jpg" alt="quarto-rj">
                    <img src="img/rj/Rj-suiteluxo.jpg" alt="sala-rj">
                    <img src="img/rj/refeicao-rjhotel.jpg" alt="refeicao-rj">
                </div>
            </div>
        </div>

        <div class="hotel-container">
            <div class="hotel-info">
                <h3 class="titulo-hotel">Resort - Rio de janeiro</h3>
                <p>

                    Bem-vindo ao nosso paraíso resort, um resort exclusivo no Rio de Janeiro. Os quartos espaçosos e
                    elegantemente decorados oferecem romance e conforto, enquanto o spa de classe mundial proporciona
                    relaxamento absoluto. Para os entusiastas do esporte, temos uma quadra de tênis e uma piscina
                    cristalina, além de uma jacuzzi com vistas deslumbrantes do oceano.

                    Desfrute de experiências gastronômicas incomparáveis em nosso restaurante à beira-mar, com refeições
                    requintadas incluídas em seu pacote. Para famílias ou grupos de amigos, oferecemos a opção de
                    adicionar camas aos quartos principais, garantindo conforto para todos. Neste refúgio à beira-mar,
                    cada momento é uma lembrança preciosa, proporcionando uma jornada inesquecível de luxo e serenidade.
                    <br><br><br><br>
                    Diaria: R$ 320.00
                    <br><br>
                </p>
                <button onclick="exibirFormularioReserva('Rio de Janeiro', 'Resort', 320)">Reserve aqui</button>
            </div>
            <div class="hotel-box" data-preco="320">
                <div class="image-slider">
                    <img src="img/rj/resort-rj.jpg" alt="resort-rj">
                    <img src="img/rj/salaresort-rj.jpg" alt="sala">
                    <img src="img/rj/quartoresort-rj.jpg" alt="quarto">
                    <img src="img/rj/refeicao-rj.jpg" alt="refeicao">
                </div>
            </div>
        </div>

        <div class="hotel-container">
            <div class="hotel-info">
                <h3 class="titulo-hotel">Suíte de Luxo - Balneário Camboriú</h3>
                <p> Desfrute do requinte urbano na nossa Suite de Luxo no coração de Balneário Camboriú. Projetada para
                    uma estadia inigualável, esta suíte de 45m² combina conforto e sofisticação, acomodando até quatro
                    pessoas. Refeições inclusas, destacando a culinária local, podem ser desfrutadas com uma vista
                    panorâmica da cidade nos andares superiores do prédio. A privacidade da varanda completa a
                    experiência, proporcionando momentos de relaxamento. Com acesso às piscinas do hostel, cada momento
                    nesta suíte é uma celebração do luxo no cenário vibrante de Balneário Camboriú.
                    <br><br><br><br>
                    Diaria: R$1100
                    <br><br>
                </p>
                <button onclick="exibirFormularioReserva('Balneário Camboriú', 'Suite-Luxo', 1100)">Reserve
                    aqui</button>
            </div>
            <div class="hotel-box" data-preco="1100">
                <div class="image-slider">
                    <img src="img/balne/hotel-balneario.jpg" alt="hotel-bc">
                    <img src="img/balne/suiteluxo-balneario.jpg" alt="Quarto-bc">
                    <img src="img/balne/suiteluxo-balneario2.jpg" alt="varanda-bc">
                    <img src="img/balne/refeicao-balneariohotel.jpg" alt="refeicao">
                </div>
            </div>
        </div>

        <div class="hotel-container">
            <div class="hotel-info">
                <h3 class="titulo-hotel">Resort - Balneário Camboriú</h3>
                <p> Descubra o refúgio perfeito para toda a família no Resort. Nossas suítes espaçosas acomodam
                    confortavelmente até cinco membros, garantindo momentos inesquecíveis. Desfrute de refeições
                    inclusas, onde sabores excepcionais encontram-se à mesa diante da vista deslumbrante para o mar.
                    Para um relaxamento completo, mergulhe em nossas piscinas no resort. No Resort, cada detalhe é
                    pensado para criar memórias duradouras em um cenário tropical de pura sofisticação.
                    <br><br><br><br>
                    Diaria: R$280
                    <br><br>
                </p>
                <button onclick="exibirFormularioReserva('Balneário Camboriú', 'Resort', 280)">Reserve aqui</button>
            </div>
            <div class="hotel-box" data-preco="280">
                <div class="image-slider">
                    <img src="img/balne/balneario-Resort.jpg" alt="resort-bc">
                    <img src="img/balne/balnearioquarto-resort.jpg" alt="Quarto1-bc">
                    <img src="img/balne/balneario-quarto.jpg" alt="varanda1-bc">
                    <img src="img/balne/refeicao-balneario.jpeg" alt="refeicao">
                </div>
            </div>
        </div>
        <div id="reserva-box">
            <h2>Faça sua Reserva</h2>
            <form method="post" action="">
                <label for="local">Local:</label>
                <input type="text" name="local" id="local" class="input-text" readonly>

                <label for="tipo_suitedeluxo">Tipo de Hotel:</label>
                <input type="text" name="tipo_suitedeluxo" id="tipo_suitedeluxo" class="input-text" readonly>

                <label for="checkin">Data de Check-in:</label>
                <input type="date" name="checkin" id="checkin" class="input-text" required>

                <label for="checkout">Data de Check-out:</label>
                <input type="date" name="checkout" id="checkout" class="input-text" required>

                <label for="payment">Forma de Pagamento:</label>
                <select name="payment" id="payment" class="input-text" required>
                    <option value="PIX">PIX</option>
                    <option value="Dinheiro">Dinheiro</option>
                    <option value="Cartão de Détido/Crédito">Cartão de Débito/Crédito</option>
                </select>

                <input type="hidden" id="preco-diaria" name="preco-diaria">
                <input type="hidden" id="valor-total-hidden" name="valor-total" value="0.00">
                <p id="valor-total">Valor Total: R$ <span id="span-valor-total">0.00</span></p>
                <input type="submit" name="submit" value="Reservar" class="input-submit">
            </form>
            <button onclick="fecharReservaBox()" class="btn-fechar">Fechar</button>
        </div>
        <script src="scriptreserva.js"></script>
    </div>

    <div id="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contato</h3>
                <p>Entre em contato conosco:</p>
                <p>Email: Hostel.Turistico@gmail.com</p>
                <p>WhatsApp: <a href="https://wa.me/18981406694" target="_blank">(18) 981406694.</a></p>
                <a href="https://www.instagram.com/hostel_turistico" target="_blank">Instagram</a>
            </div>

            <div class="footer-section">
                <h3>Links Úteis</h3>
                <ul>
                    <li><a href="../../sobre/poli_termo/politica.php">Políticas de Privacidade</a></li><br>
                    <li><a href="../../sobre/poli_termo/termo.php">Termos de Uso</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2023 Hostel. Todos os direitos reservados.</p>
        </div>
    </div>

</body>

</html>
<?php
session_start();

if (!isset($_SESSION['usuario_autenticado'])) {
    header("Location: cadastro/login.php");
    exit();
}

$nivelDeAcesso = $_SESSION['nivel_de_acesso'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Site - Sobre</title>
    <script src="../../script.js"></script>
    <link rel="stylesheet" href="../../index.css">
    <link rel="icon" href="../img/icon1.png" type="image/png">
    <style>
        .final {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div id="topo">
        <div class="dropdown" style="float:right;">
            <button onclick="toggleDropdown()">Perfil &#9660;</button>
            <div id="myDropdown" class="dropdown-content">
                <li class="drop"><a class="drop2" href="../../principal/perf/perfil.php">Perfil</a></li>
                <li class="drop"><a class="drop2" href="../../principal/sair/logout.php">Logout</a></li>
            </div>
        </div>
        <div class="logo-container">
            <p style="text-align: left;">
                <img src="../img/logo.png" alt="Logotipo" style="max-width: 100%; height: 150px;">
            </p>
        </div>
        <nav>
            <ul>
                <li class="cabeça"><a class="cabeça2" href="../../principal/index.php">Hospedagens</a></li>
                <li class="cabeça"><a class="cabeça2" href="../list_sobre.php">Sobre</a></li>
                <li class="cabeça"><a href="../../principal/reserva/reserva.php" class="cabeça2">Reservas</a></li>
                <?php if ($nivelDeAcesso == 'adm'): ?>
                    <li class="cabeça"><a class="cabeça2" href="../../cadastro/Adm/Adm.php">Administrador</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <div id="container">
        <div id="text-content">
            <h1>Política de Privacidade</h1>
            <p>Última atualização: 18/11/2023</p>

            <p>A Hostel respeita a privacidade dos seus usuários e está comprometida em proteger as
                informações pessoais que você fornece enquanto utiliza o nosso site. Esta Política de Privacidade
                explica como coletamos, usamos, armazenamos e protegemos suas informações. Ao utilizar o nosso site,
                você concorda com os termos descritos nesta política.</p>
            <h1>1. Informações Coletadas:</h1>
            <p>Coletamos informações pessoais que você nos fornece voluntariamente, como nome, endereço de e-mail e
                outras
                informações que podem ser usadas para identificá-lo. Além disso, podemos coletar automaticamente
                informações
                sobre a sua visita, incluindo o seu endereço IP, navegador, data e hora de acesso, e páginas visitadas.
            </p>
            <h1> 2. Uso das Informações:</h1>
            <p>As informações coletadas podem ser utilizadas para personalizar a sua experiência no site, enviar
                informações, responder a dúvidas ou solicitações, processar transações e fornecer suporte ao cliente.
                Não
                compartilhamos suas informações pessoais com terceiros, exceto quando necessário para cumprir obrigações
                legais ou proteger nossos direitos.</p>
            <h1>3. Cookies:</h1>
            <p> Utilizamos cookies para melhorar a sua experiência de navegação. Os cookies são pequenos arquivos de
                texto
                armazenados no seu dispositivo que nos ajudam a entender como você interage com o nosso site. Você pode
                desativar os cookies nas configurações do seu navegador, mas isso pode afetar a funcionalidade do site.
            </p>
            <h1>4. Links para Terceiros:</h1>
            <p>O nosso site pode conter links para sites de terceiros. Não nos responsabilizamos pelas práticas de
                privacidade desses sites. Recomendamos que você leia as políticas de privacidade de cada site que
                visita.</p>
            <h1>5. Segurança:</h1>
            <p>Implementamos medidas de segurança para proteger suas informações contra acesso não autorizado,
                alteração,
                divulgação ou destruição. No entanto, lembre-se de que nenhum método de transmissão pela internet ou
                armazenamento eletrônico é totalmente seguro.</p>
            <h1>6. Alterações nesta Política:</h1>
            <p>Reservamo-nos o direito de atualizar esta Política de Privacidade a qualquer momento. Recomendamos que
                você
                revise periodicamente esta página para estar ciente de quaisquer alterações.</p>
            <p>Ao utilizar o nosso site, você concorda com os termos desta Política de Privacidade. Se tiver dúvidas ou
                preocupações sobre a proteção de suas informações, entre em contato conosco através dos canais
                disponibilizados.</p>
            <p class="final">Obrigado por confiar no Hostel.</p>
        </div>
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
                    <li><a href="">Políticas de Privacidade</a></li>
                    <li><a href="termo.php">Termos de Uso</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy;
                <?php echo date("Y"); ?> Hostel. Todos os direitos reservados.
            </p>
        </div>
    </div>
</body>

</html>
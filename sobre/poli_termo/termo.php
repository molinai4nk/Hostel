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
            <h1>TERMOS DE USO PARA O SITE DE HOSPEDAGEM DE HOTEL</h1>
            <p>Última atualização: 18/11/2023</p>
            <p>Estes Termos de Uso regem o uso do site de hospedagem de hotel oferecido pela Hostel
                , doravante denominada. Ao acessar e usar este Site, você concorda com estes
                Termos. Se não concordar com estes Termos, não use o Site.</p>
            <h1>1. Serviços:</h1>
            <p>A Empresa fornece uma plataforma online que permite aos usuários pesquisar, reservar e pagar por
                acomodações em hotéis. A Empresa não é proprietária, opera ou gerencia os hotéis listados no Site.
            </p>
            <h1> 2. Reservas e Pagamentos:</h1>
            <p>Ao efetuar uma reserva através do Site, você concorda em cumprir as políticas de cancelamento e pagamento
                estabelecidas pelo hotel específico. A Empresa não é responsável por quaisquer taxas ou encargos
                adicionais impostos pelo hotel.</p>
            <h1>3. Cancelamentos e Reembolsos:</h1>
            <p>As políticas de cancelamento e reembolso são determinadas pelos hotéis individuais. A Empresa não garante
                reembolsos e não é responsável por eventuais custos associados a cancelamentos.
            </p>
            <h1>4. Responsabilidade do Usuário:</h1>
            <p>Você concorda em fornecer informações precisas e completas ao fazer uma reserva. A Empresa não é
                responsável por informações incorretas fornecidas pelos usuários.</p>
            <h1>5. Conteúdo do Usuário:</h1>
            <p>Ao enviar conteúdo para o Site, como avaliações e comentários, você concede à Empresa o direito de usar,
                modificar e exibir esse conteúdo de forma não exclusiva e sem compensação.</p>
            <h1>6. Propriedade Intelectual:</h1>
            <p>O conteúdo do Site, incluindo textos, gráficos, logotipos e software, é protegido por leis de propriedade
                intelectual. Você concorda em não reproduzir, distribuir ou criar obras derivadas sem permissão.</p>
            <h1>7. Limitação de Responsabilidade:</h1>
            <p>A Empresa não será responsável por danos diretos, indiretos, incidentais, especiais ou consequentes
                decorrentes do uso ou incapacidade de usar o Site.</p>
            <h1>8. Modificações nos Termos:</h1>
            <p>A Empresa reserva-se o direito de modificar estes Termos a qualquer momento. As modificações entram em
                vigor imediatamente após a publicação no Site. O uso contínuo do Site após tais modificações constitui
                aceitação dos Termos modificados.</p>
            <h1>9. Lei Aplicável:</h1>
            <p>Estes Termos são regidos pelas leis da República Federativa do Brasil e quaisquer disputas serão
                submetidas à jurisdição exclusiva dos tribunais dessa jurisdição.</p>
            <p>Ao usar este Site, você concorda com estes Termos de Uso. Se não concordar, por favor, não use o Site.
            </p>
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
                    <li><a href="politica.php">Políticas de Privacidade</a></li>
                    <li><a href="">Termos de Uso</a></li>
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
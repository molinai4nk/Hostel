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
    <title>Hostel -- Sobre</title>
    <link rel="stylesheet" href="../index.css">
    <script src="../script.js"></script>
    <link rel="icon" href="img/icon1.png" type="image/png">

<body style="background-color: #ededed;">
    <div id="topo">
        <div class="dropdown" style="float:right;">
            <button onclick="toggleDropdown()">Perfil &#9660;</button>
            <div id="myDropdown" class="dropdown-content">
                <li class="drop"><a class="drop2" href="../principal/perf/perfil.php">Perfil</a></li>
                <li class="drop"><a class="drop2" href="../principal/sair/logout.php">Logout</a></li>

            </div>
        </div>
        <div id="topo">
            <p style="text-align: left;">
                <img src="img/logo.png" alt="Logotipo" style="max-width: 100%; height: 100px;">
            </p>
        </div>
        <nav>
            <ul>
                <li class="cabeça"><a href="../principal/index.php" class="cabeça2">Hospedagens</a></li>
                <li class="cabeça"><a class="cabeça2" href="list_sobre.php">Sobre</a></li>
                <li class="cabeça"><a href="../principal/reserva/reserva.php" class="cabeça2">Reservas</a></li>
                <?php if ($nivelDeAcesso == 'adm'): ?>
                    <li class="cabeça"><a class="cabeça2" href="../cadastro/Adm/Adm.php">Administrador</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <div id="container">
        <div id="text-content">
            <div class="titulo-principal abc">
                <h1 class="sashimi">Bem-vindo à Rede Hostel Urbano: Sua Experiência de Estadia Moderna em Diversas
                    Localidades em São Paulo</h1>
                <p>Em meio ao pulsante coração da metrópole de São Paulo, nasceu a Rede Hostel Urbano,
                    <br>uma inovadora coleção de estabelecimentos que transcende as expectativas tradicionais de
                    hospedagem.
                    <br>Inspirada no espírito de comunidade e na diversidade cultural da cidade,
                    <br> a nossa rede de hostels oferece uma experiência única em várias localidades ao redor da
                    metrópole.
                </p>
            </div>
            <div class="titulo-secundario abc">
                <h2 class="sashimi"> Design Moderno e Acolhedor:</h2>
                <p> Cada um dos nossos hostels foi cuidadosamente projetado para refletir o ambiente urbano moderno,
                    <br> ao mesmo tempo em que proporciona um espaço acolhedor e descontraído.
                    <br> Com quartos vibrantes e áreas comuns que convidam à interação, nossos espaços são mais do
                    que
                    <br> apenas lugares para dormir - são pontos de encontro para viajantes de todas as partes do
                    mundo.
                </p>
            </div>
            <div class="titulo-terceiro abc">
                <h2 class="sashimi">Localizações Estratégicas:</h2>
                <p>A Rede Hostel Urbano abrange diversas localidades ao redor de São Paulo,
                    <br> permitindo que você explore a riqueza cultural e a diversidade da cidade de maneira
                    conveniente.
                    <br>Seja no coração do centro histórico, nos bairros artísticos ou perto das famosas avenidas,
                    <br>nossos hostels oferecem acesso fácil aos principais pontos turísticos e a uma variedade de
                    experiências locais autênticas.
                </p>
            </div>
            <div class="titulo-quarto abc">
                <h2 class="sashimi">Experiências Culturais Únicas:</h2>
                <p> Nossos hostels não são apenas lugares para ficar; são portais para mergulhar na cultura local.
                    <br> Organizamos eventos culturais, passeios guiados e atividades interativas que conectam os
                    hóspedes
                    <br>com a vibrante cena cultural de São Paulo. Seja participando de uma aula de dança regional
                    ou
                    explorando
                    <br> galerias de arte locais, você vivenciará a cidade de uma maneira autêntica.
                </p>
            </div>
            <div class="titulo-quinto abc">
                <h2 class="sashimi">Conectivide Global:</h2>
                <p> A Rede Hostel Urbano reconhece a importância da conectividade global. Com áreas comuns equipadas
                    com
                    Wi-Fi de
                    <br>alta velocidade e espaços de trabalho colaborativos, oferecemos um ambiente propício para
                    viajantes
                    que precisam
                    <br>se manter conectados com o mundo, seja para trabalho remoto ou para compartilhar
                    experiências
                    nas
                    redes sociais.
                </p>
            </div>
            <div class="titulo-quinto abc">
                <h2 class="sashimi">Sustentabilidade e Responsabilidade Social:</h2>
                <p> Comprometidos com a sustentabilidade, implementamos práticas eco-friendly em nossos hostels.
                    Desde a
                    gestão
                    <br> eficiente de resíduos até a promoção de iniciativas locais, buscamos minimizar nosso
                    impacto
                    ambiental e
                    <br>contribuir para o bem-estar das comunidades em que estamos inseridos.
                </p>
            </div>
        </div>
        <div id="image-content">
            <h3 class="titulo-img">Hostel em São Paulo</h3>
            <img src="../principal/reserva/img/sp/sp-hotel.jpg" alt="Foto do Hotel" style="width: auto; height: 650px">
            <div class="titulo-quintoabc">
                <h2 class="sashimi">Venha Explorar, Conectar e Descansar:</h2>
                <p>Na Rede Hostel Urbano, oferecemos mais do que apenas uma cama para descansar; proporcionamos uma
                    experiência
                    <br>imersiva que enriquece sua viagem. Venha explorar São Paulo e suas diversas facetas,
                    conectar-se
                    com
                    viajantes
                    <br>de todo o mundo e desfrutar de uma estadia autêntica e memorável em nossos hostels urbanos.
                    Seja
                    bem-vindo à sua
                    <br> casa longe de casa na cidade que nunca para.
                </p>
            </div>
        </div>
    </div>
    <div id="ceos-container">
        <div class="ceo-info">
            <h3>CEO</h3>
            <img src="ceo/ceo2.jpg" alt="Foto do CEO" style="max-width: 270px; height: auto;">
            <p class="p-ceos">Han Ji-Pyeong</p>
        </div>
        <div class="ceo-info">
            <h3>CFO</h3>
            <img src="ceo/cfo.jpg" alt="Foto do CFO" style="max-width: 300px; height: auto;">
            <p class="p-ceos">Isabella Gomes</p>
        </div>
        <div class="ceo-info">
            <h3>CTO</h3>
            <img src="ceo/cto.jpg" alt="Foto do CTO" style="max-width: 320px; height: auto;">
            <p class="p-ceos">Arthur Oliveira</p>
        </div>
    </div>
    <div id="ceo-info-box">
        <div class="ceo-image-left">
            <img src="ceo/ceo1.jpg" alt="Foto do CEO Diretor" style="max-width: 550px; height: auto;">
        </div>
        <div class="ceo-text-right">
            <h3>CEO Diretor</h3>
            <p>Olá, sou Han Ji-Pyeong, o visionário fundador do Hostel. Nasci na Coreia do Sul e, diante de
                circunstâncias desafiadoras, encontrei meu caminho para o Brasil, mais especificamente em São Paulo.
                Quando aqui cheguei, carregava apenas sonhos e determinação, pois deixei meu país de origem sem o
                suporte dos meus pais.

                Os primeiros dias foram um verdadeiro desafio. Iniciei do zero, construindo passo a passo o que viria a
                se tornar uma notável empresa, o Hostel. No princípio, operava exclusivamente em São Paulo, mas com
                resiliência e dedicação, o Hostel prosperou e expandiu suas raízes pelo Brasil. Hoje, temos filiais no
                Rio de Janeiro e em Balneário Camboriú.

                O sonho que me impulsionou desde o início é grandioso: levar a essência acolhedora do Hostel a todos os
                cantos do Brasil e, eventualmente, do mundo. Estamos determinados a continuar crescendo, conectando
                pessoas e culturas através de nossos espaços únicos. O futuro reserva a expansão para cada canto deste
                país e, quem sabe, além-fronteiras, levando a hospitalidade do Hostel a novos horizontes globais.</p>
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
                    <li><a href="poli_termo/politica.php">Políticas de Privacidade</a></li><br>
                    <li><a href="#">Termos de Uso</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Hostel. Todos os direitos reservados.</p>
        </div>
    </div>
</body>

</html>
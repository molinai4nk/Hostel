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
  <title>Hostel -- Pagina Principal</title>
  <link rel="stylesheet" href="../index.css">
  <link rel="stylesheet" href="princ.css">
  <script src="../script.js"></script>
  <link rel="icon" href="../sobre/img/icon1.png" type="image/png">
</head>

<body>
  <div id="topo">
    <div class="dropdown" style="float:right;">
      <button onclick="toggleDropdown()">Perfil &#9660;</button>
      <div id="myDropdown" class="dropdown-content">
        <li class="drop"><a class="drop2" href="perf/perfil.php">Perfil</a></li>
        <li class="drop"><a class="drop2" href="sair/logout.php">Logout</a></li>
      </div>
    </div>
    <div class="logo-container">
      <p style="text-align: left;">
        <img src="../sobre/img/logo.png" alt="Logotipo" style="max-width: 100%; height: 150px;">
      </p>
    </div>
    <nav>
      <ul>
        <li class="cabeça"><a href="" class="cabeça2">Hospedagens</a></li>
        <li class="cabeça"><a class="cabeça2" href="../sobre/list_sobre.php">Sobre</a></li>
        <li class="cabeça"><a href="reserva/reserva.php" class="cabeça2">Reservas</a></li>
        <?php if ($nivelDeAcesso == 'adm'): ?>
          <li class="cabeça"><a class="cabeça2" href="../cadastro/Adm/Adm.php">Administrador</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
  <div class="introducao">
      <h2>Bem-vindo ao Hostel Turístico</h2>
      <p>Descubra uma experiência única de hospedagem conosco. Explore nossos hotéis e resorts excepcionais, projetados para proporcionar conforto, luxo e momentos inesquecíveis. Sua jornada começa aqui!</p>
    </div>
  <div class="container">
    <section class="hotel-section">
      <h1 class="titulo-hotel">Nossos Hotéis</h1>
      <div class="slider">
        <div class="slides">
          <div class="slide active">
            <a href="reserva/reserva.php"><img src="reserva/img/sp/Sp-Hotel.jpg" alt="Slide 1"></a>
          </div>
          <div class="slide">
            <a href="reserva/reserva.php"><img src="reserva/img/rj/Rj-Hotel.jpg" alt="Slide 2"></a>
          </div>
          <div class="slide">
            <a href="reserva/reserva.php"><img src="reserva/img/balne/balneario-Resort.jpg" alt="Slide 3"></a>
          </div>
        </div>
        <div class="navigation">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
      </div>
    </section>

    <section class="suite-section">
      <h1 class="titulo-hotel">Resorts</h1>
      <div class="slider">
        <div class="slides">
          <div class="slide active">
            <a href="reserva/reserva.php"><img src="reserva/img/sp/hotel.jpg" alt="Slide 1"></a>
          </div>
          <div class="slide">
            <a href="reserva/reserva.php"><img src="reserva/img/rj/resort-rj.jpg" alt="Slide 2"></a>
          </div>
          <div class="slide">
            <a href="reserva/reserva.php"><img src="reserva/img/balne/balneario-Resort.jpg" alt="Slide 3"></a>
          </div>
        </div>
        <div class="navigation">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
      </div>
  </div>
  <div id="map" style="height: 400px; width: 100%;"></div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2vTW8WnRqpVXAd9QT0uOfdwlZlMjeyVw&callback=initMap" async defer></script>
  <div id="footer">
    <div class="footer-content">
      <div class="footer-section">
        <h3>Contato</h3>
        <p>Email: Hostel.Turistico@gmail.com</p>
        <p>WhatsApp: <a href="https://wa.me/18981406694" target="_blank">(18) 981406694.</a></p>
         <a href="https://www.instagram.com/hostel_turistico" target="_blank">Instagram</a>
      </div>
      <div class="footer-section">
        <h3>Links Úteis</h3>
        <ul>
          <li><a href="../sobre/poli_termo/politica.php">Políticas de Privacidade</a></li>
          <li><a href="../sobre/poli_termo/termo.php">Termos de Uso</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2023 Seu Site. Todos os direitos reservados.</p>
    </div>
  </div>

  <script src="script.js"></script>
  <script src="https://kit.fontawesome.com/6a220da9f8.js" crossorigin="anonymous"></script>
</body>

</html>
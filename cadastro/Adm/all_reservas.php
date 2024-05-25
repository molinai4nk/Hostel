<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel - adm - Painel de clientes</title>
    <link rel="stylesheet" href="../../index.css">
    <script src="../../script.js"></script>
    <link rel="icon" href="../../sobre/img/icon1.png" type="image/png">
    <link rel="stylesheet" href="../../principal/princ.css">
</head>

<body style="background-color:#ededed">
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
                <img src="../../sobre/img/logo.png" alt="Logotipo" style="max-width: 100%; height: 150px;">
            </p>
        </div>
        <nav>
            <ul>
                <li class="cabeça"><a class="cabeça2" href="../../principal/index.php">Hospedagens</a></li>
                <li class="cabeça"><a class="cabeça2" href="../../sobre/list_sobre.php">Sobre</a></li>
                <li class="cabeça"><a href="../../principal/reserva/reserva.php" class="cabeça2">Reservas</a></li>
                <li class="cabeça"><a href="../../principal/reserva/minhas_reservas.php" class="cabeça2">Minhas Reservas</a>
                <li class="cabeça"><a class="cabeça2" href="Adm.php">Admistrador</a></li>
            </li>
            </ul>
        </nav>
    </div>
    <div id="conteudo">
        <div id="minhas-reservas">
            <h2>Todas as reservas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Local</th>
                        <th>Tipo de Suíte</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Valor</th>
                        <th>Forma de pagamento</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (file_exists('../../principal/reserva/reservas.json')) {
                        $arq = file_get_contents('../../principal/reserva/reservas.json');
                        $arq = json_decode($arq, true);

                        foreach ($arq as $key => $user): ?>
                            <tr>
                                <td>
                                    <?php echo $user['usuario'] ?>
                                </td>
                                <td>
                                    <?php echo $user['local']; ?>
                                </td>
                                <td>
                                    <?php echo $user['tipo_suitedeluxo']; ?>
                                </td>
                                <td>
                                    <?php echo $user['checkin']; ?>
                                </td>
                                <td>
                                    <?php echo $user['checkout']; ?>
                                </td>
                                <td>
                                    <?php echo 'R$ ' . number_format($user['valor-total'], 2, ',', '.'); ?>
                                </td>
                                <td>
                                    <?php echo $user['forma-pagamento']; ?>
                                </td>
                                <td>
                                    <a href="canc_reserva.php?id=<?php echo $key; ?>" class="btn-canc"> Cancelar </a>
                                </td>
                            </tr>
                        <?php endforeach;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
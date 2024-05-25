<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel - adm - Painel de clientes</title>
    <link rel="stylesheet" href="../../index.css">
    <script src="../../script.js"></script>
    <link rel="icon" href="../../sobre/img/icon1.png" type="image/png">
</head>

<body style="background-color:#ededed">
<div id="topo">
        <div class="dropdown">
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
                <li class="cabeça"><a href="../../principal/reserva/minhas_reservas.php" class="cabeça2">Minhas Reservas</a></li>
              <li class="cabeça"><a class="cabeça2" href="">Admistrador</a></li> 
            </ul>
        </nav>
    </div>
    <div id="conteudo">
        <div id="minhas-reservas">
          <div id="quadrado"><a href="all_reservas.php" ><p >Todas As reservas</p></a></div> 
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cpf</th>
                    <th class="password">Password</th>
                    <th>Fone</th>
                    <th>Email</th>
                    <th>Nivel</th>
                    <th>Cep</th>
                    <th>Rua</th>
                    <th>Numero</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (file_exists('../user.json')) {
                    $arq = file_get_contents('../user.json');
                    $arq = json_decode($arq, true);

                    foreach ($arq as $key => $user):
                        ?>
                        <tr>
                            <td>
                                <?php echo $user['nome'] ?>
                            </td>
                            <td>
                                <?php echo $user['cpf'] ?>
                            </td>
                            <td>
                                <?php echo $user['password'] ?>
                            </td>
                            <td>
                                <?php echo $user['fone'] ?>
                            </td>
                            <td>
                                <?php echo $user['email'] ?>
                            </td>
                            <td>
                                <?php echo $user['nivel'] ?>
                            </td>
                            <td>
                                <?php echo $user['cep'] ?>
                            </td>
                            <td>
                                <?php echo $user['rua'] ?>
                            </td>
                            <td>
                                <?php echo $user['numero'] ?>
                            </td>
                            <td>
                                <?php echo $user['bairro'] ?>
                            </td>
                            <td>
                                <?php echo $user['cidade'] ?>
                            </td>
                            <td>
                                <?php echo $user['estado'] ?>
                            </td>
                            <td>
                                <a href="upd_user.php?id=<?php echo $key ?>" class="btn-canc"> Update </a>

                                <a href="del_user.php?id=<?php echo $key ?>" class="btn-canc"> Delete </a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                }
                ?>
            </tbody>
        </table>
            </div>
    </div>

</body>

</html>
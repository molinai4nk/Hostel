<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel -- cancelar reserva</title>
    <link rel="stylesheet" href="../../index.css">
</head>

<body id="canc">
    <div id="cont">
        <h1 id="titulo-canc">Cancelar a reserva</h1>
        <?php
        session_start();

        if (!isset($_SESSION['usuario_autenticado'])) {
            header("Location: ../../cadastro/login.php");
            exit();
        }

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $op = filter_input(INPUT_GET, 'op', FILTER_DEFAULT);

        $arquivo = "reservas.json";
        if (file_exists($arquivo)) {
            $arq = file_get_contents($arquivo);
            $arq = json_decode($arq, true);
            $reserva = $arq[$id]['local'];
            $tipo_suitedeluxo = $arq[$id]['tipo_suitedeluxo'];
            $dia = $arq[$id]['checkin'];
        }

        if ($op == 's') {
            unset($arq[$id]);
            if (!in_array($id, $arq)) {
                $arq = json_encode($arq);
                file_put_contents($arquivo, $arq);

                echo '<h3 id="confirmation-message">Reserva cancelada com sucesso!</h3>';
                header("Refresh: 3, url=minhas_reservas.php");
                exit();
            }
        }

        if ($op == 'n') {
            header("Location: minhas_reservas.php");
            exit();
        }
        ?>

        <h3>Você deseja cancelar a reserva de <?php echo $reserva; ?> na <?php echo $tipo_suitedeluxo?>  do dia <?php echo $dia?>?</h3>
        <div id="quadrado">
            <a href="canc_reserva.php?id=<?php echo $id ?>&op=s"> Sim || </a>
            <a href="canc_reserva.php?id=<?php echo $id ?>&op=n"> Não </a>
        </div>
    </div>
</body>

</html>

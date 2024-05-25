<?php
session_start();


if (!isset($_SESSION['usuario_autenticado']) || !isset($_SESSION['usuario_email'])) {

    header("Location: ../../cadastro/login.php");
    exit();
}


$usuarioLogadoEmail = $_SESSION['usuario_email'];


$arquivo = "../../cadastro/user.json";

if (file_exists($arquivo)) {
    $arq = file_get_contents($arquivo);
    $usuarios = json_decode($arq, true);


    foreach ($usuarios as $key => $usuario) {
        if ($usuario['email'] === $usuarioLogadoEmail) {
            $id = $key;
            $nome = $usuario['nome'];
            $cpf = $usuario['cpf'];
            $password = $usuario['password'];
            $fone = $usuario['fone'];
            $email = $usuario['email'];
            $nivel = $usuario['nivel'];
            $cep = $usuario['cep'];
            $rua = $usuario['rua'];
            $numero = $usuario['numero'];
            $bairro = $usuario['bairro'];
            $cidade = $usuario['cidade'];
            $estado = $usuario['estado'];
            break;
        }
    }
} else {
    echo "Arquivo de usuários não encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../../cadastro/style.css">
    <link rel="stylesheet" href="../../index.css">
    <script src="../../script.js"></script>
    <link rel="icon" href="../../sobre/img/icon1.png" type="image/png">
</head>

<body>

    <div id="topo" class="topo">
    <div class="dropdown" style="float:right;">
            <button onclick="toggleDropdown()">Perfil &#9660;</button>
            <div id="myDropdown" class="dropdown-content">
              <li class="drop"><a class="drop2" href="../index.php">Voltar</a></li>
              <li class="drop"><a class="drop2" href="../sair/logout.php">Logout</a></li>
            </div>
          </div>
          <div class="logo-container">
            <p style="text-align: left;">
                <img src="../../sobre/img/logo.png" alt="Logotipo" style="max-width: 100%; height: 150px;" class="logotipo">
            </p>
          </div>
        <h2 class="titulo" style="text-align: center; /* tive que colocar aqui para n dar conflito com os outros */">Olá,
            <?php echo $nome ?>
        </h2>
    </div>
    <div class="container">
        <div class="form-div">
            <form action="" method="post" enctype="multipart/form-data">
            <div id="quadrado">  
            <?php if ($id !== null): ?>
                        <a class="edit" href="editarpelocliente/upd_user.php?id=<?php echo $id; ?>">Editar Perfil</a>
                    <?php else: ?>
                        <p>ID do usuário não encontrado.</p>
                    <?php endif; ?>
                </div>  
                    <div id="quadrado">
                    <a href="../reserva/minhas_reservas.php"><p>Minhas reservas</p></a>
                </div>
                <hr>
                <div class="form-group">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" class="form-input"
                        placeholder="Seu nome" disabled>
                </div>
                <div class="form-group">
                    <label for="cpf" class="label">CPF:</label>
                    <input type="text" name="cpf" id="cpf" value="<?php echo $cpf; ?>" class="form-input"
                        placeholder="xxx.xxx.xxx-xx" disabled>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-input" placeholder="**********"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="fone" class="form-label">telefone:</label>
                    <input type="text" name="fone" id="fone" value="<?php echo $fone; ?>" class="form-input"
                        placeholder="(xx) xxxxx-xxxxx" disabled>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">email:</label>
                    <input type="email" name="email" id="email" value="<?php echo $email; ?>" class="form-input"
                        placeholder="exemplo@exemplo.com" disabled>
                </div>

                <div class="form-group">
                    <label for="nivel" class="form-label">Nivel de Usuário</label>
                    <select name="nivel" id="nivel" class="form-input" disabled>
                        <option value="0" selected disabled>Selecione um nível de usuário </option>
                        <option value="usuario" <?php echo ($nivel == "usuario" ? "selected" : ""); ?>>
                            Cliente </option disabled>
                            <option value="usuario" <?php echo ($nivel == "Adm" ? "selected" : ""); ?>>
                            Cliente </option disabled>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" name="cep" id="cep" value="<?php echo $cep; ?>" class="form-input"
                        placeholder="xxxxx-xxx" disabled>
                </div>
                <div class="form-group">
                    <label for="rua" class="form-label">Rua:</label>
                    <input type="text" name="rua" id="rua" value="<?php echo $rua; ?>" class="form-input"
                        placeholder="Nome da rua" disabled>
                </div>
                <div class="form-group">
                    <label for="num" class="form-label">Numero da Rua:</label>
                    <input type="number" name="numero" id="numero" value="<?php echo $numero; ?>" class="form-input"
                        placeholder="Nome da rua" disabled>
                </div>
                <div class="form-group">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" value="<?php echo $bairro; ?>" class="form-input"
                        placeholder="Nome do bairro" disabled>
                </div>
                <div class="form-group">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" value="<?php echo $cidade; ?>" class="form-input"
                        placeholder="São-Paulo" disabled>
                </div>
                <div class="form-group">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" name="estado" id="estado" value="<?php echo $estado; ?>" class="form-input"
                        placeholder="São-Paulo" disabled>
                </div>
                <hr>
        </div>
        </form>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hostel -Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../sobre/img/icon1.png" type="image/png">
</head>

<body>
    <div class="topo">
        <h1 class="titulo">LOGIN</h1>
    </div>

    <?php
session_start();

if (isset($_POST['login'])) {
    $loginEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $loginPassword = filter_input(INPUT_POST, 'password');

    $arquivo = "user.json";

    if (file_exists($arquivo)) {
        $arq = file_get_contents($arquivo);
        $usuarios = json_decode($arq, true);

        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $loginEmail && password_verify($loginPassword, $usuario['password'])) {
                $_SESSION['usuario_autenticado'] = true;
                $_SESSION['usuario_email'] = $loginEmail; 
                $_SESSION['nivel_de_acesso'] = $usuario['nivel']; 
                header("Location: ../principal/index.php");
                exit();
            }
        }
        echo "<h1 class='titulo'>Usuário não encontrado ou senha incorreta!</h1>";
        header("Refresh: 2, url=login.php");
        exit();
    } else {
        echo "<h1 class='titulo'>Arquivo de usuários não encontrado!</h1>";
        header("Refresh: 2, url=login.php");
        exit();
    }
}
    ?>

    <div class="container">
        <div class="form-div">
            <form action="" method="post">
                <hr>
                <div class="form-group">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-input" placeholder="exemplo@exemplo.com" required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" name="password" id="password" class="form-input" placeholder="**********" required>
                    <p id="password-error" class="apagando"></p> <!-- Mensagem de erro para a senha -->
                </div>
                <div class="btn-class">
                    <input type="submit" value="Entrar" name="login" class="btn">
                    <hr>
                </div>
            </form>
        </div>
        <div class="end">
            <h1 class="titulo conta">Não possui conta?</h1>
            <a href="registro.php" class="btn-1" >Cadastrar</a>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel - Cliente - Att de clientes</title>
    <link rel="stylesheet" href="../../../cadastro/style.css">
    <link rel="icon" href="../../../sobre/img/icon1.png" type="image/png">

</head>

<body>
<div class="topo">
        <div class="logo-container">
            <p style="text-align: left;">
                <img src="../../../sobre/img/logo.png" alt="Logotipo" style="max-width: 100%; height: 150px;">
            </p>
          </div>
          <h1 class=" titulo">Atualização de Usuários</h1>
        </div>
    <div class="container">

        <?php
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (file_exists("../../../cadastro/user.json")) {

            if (isset($dados['update'])) {

                unset($dados['update']);

                $arq = file_get_contents("../../../cadastro/user.json");
                $arq = json_decode($arq, true);


                if (empty($dados['password'])) {
                    $dados['password'] = $arq[$id]['password'];
                } else {
                    $dados['password'] = md5($dados['password']);
                }


                $arq[$id] = $dados;
                $arq = json_encode($arq);
                if (file_put_contents('../../../cadastro/user.json', $arq)) {
                    echo "<h1 class='titulo'> <br> Dados atualizados com sucesso! </h1>";
                    header("Refresh: 3, url=../perfil.php");
                }

            }
            if ($id === false) {
                echo "ID inválido.";
                exit();
            }

            $arq = file_get_contents("../../../cadastro/user.json");
            $arq = json_decode($arq, true);
            $user = $arq[$id];
        }


        ?>

        <div class="container">
            <div class="form-div">
                <form action="" method="post" enctype="multipart/form-data">
                    <hr>
                    <div class="form-group">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?php echo $user['nome']; ?>" class="form-input"
                            placeholder="Seu nome">
                    </div>
                    <div class="form-group">
                        <label for="cpf" class="label">CPF:</label>
                        <input type="text" name="cpf" id="cpf" value="<?php echo $user['cpf']; ?>" class="form-input"
                            placeholder="xxx.xxx.xxx-xx">
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" id="password" class="form-input"
                            placeholder="**********">
                    </div>
                    <div class="form-group">
                        <label for="fone" class="form-label">telefone:</label>
                        <input type="text" name="fone" id="fone" value="<?php echo $user['fone']; ?>" class="form-input"
                            placeholder="(xx) xxxxx-xxxxx">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">email:</label>
                        <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>"
                            class="form-input" placeholder="exemplo@exemplo.com">
                    </div>

                    <div class="form-group">
                        <label for="nivel" class="form-label">Nivel de Usuário</label>
                        <select name="nivel" id="nivel" class="form-input">
                            <option value="0" selected disabled>Selecione um nível de usuário </option>
                            <option value="usuario" <?php echo ($user['nivel'] == "usuario" ? "selected" : ""); ?>>
                                Cliente </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cep" class="form-label">CEP:</label>
                        <input type="text" name="cep" id="cep" value="<?php echo $user['cep']; ?>" class="form-input"
                            placeholder="xxxxx-xxx">
                    </div>
                    <div class="form-group">
                        <label for="rua" class="form-label">Rua:</label>
                        <input type="text" name="rua" id="rua" value="<?php echo $user['rua']; ?>" class="form-input"
                            placeholder="Nome da rua">
                    </div>
                    <div class="form-group">
                        <label for="num" class="form-label">Numero da Rua:</label>
                        <input type="number" name="numero" id="numero" value="<?php echo $user['numero']; ?>"
                            class="form-input" placeholder="Nome da rua">
                    </div>
                    <div class="form-group">
                        <label for="bairro" class="form-label">Bairro:</label>
                        <input type="text" name="bairro" id="bairro" value="<?php echo $user['bairro']; ?>"
                            class="form-input" placeholder="Nome do bairro">
                    </div>
                    <div class="form-group">
                        <label for="cidade" class="form-label">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" value="<?php echo $user['cidade']; ?>"
                            class="form-input" placeholder="São-Paulo">
                    </div>
                    <div class="form-group">
                        <label for="estado" class="form-label">Estado:</label>
                        <input type="text" name="estado" id="estado" value="<?php echo $user['estado']; ?>"
                            class="form-input" placeholder="São-Paulo">
                    </div>
                    <div class="btn-class"> <input type="submit" value="Update" name="update" class="btn">
                        <hr>
                    </div>
                </form>
            </div>
</body>

</html>
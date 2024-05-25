<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel -- Registro --</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../sobre/img/icon1.png" type="image/png">
</head>

<body>
    <div class="topo">
        <h1 class="titulo">CRIAR CONTA</h1>
    </div>
    <?php


    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (isset($dados['cadastrar'])):

        if (in_array("", $dados)) {
            echo "<h1> Todos os campos devem ser preenchidos!</h1>";
            header("Refresh: 2,  url=registro.php");
            exit();
        }

        $dados['password'] = password_hash($dados['password'], PASSWORD_DEFAULT);
        unset($dados['cadastrar']);

        $arquivo = "user.json";

        if (file_exists($arquivo)) {
            $arq = file_get_contents($arquivo);
            $arq = json_decode($arq, true);
            array_push($arq, $dados);


            $arq = json_encode($arq);
            if (file_put_contents($arquivo, $arq) !== false) {

                echo "<h1 class='titulo'> Cadastro realizado com sucesso!</h1>";

                header("Refresh: 2, url=../index.html");

            } else {
                header("Refresh: 2, url=registro.php");
            }

        } else {
            $dados = array($dados);
            $dados = json_encode($dados);
            if (file_put_contents($arquivo, $dados)) {
                echo "<h1 class='titulo'> Cadastro realizado com sucesso!</h1>";

                header("Refresh: 2, url=../index.html");

            } else {
                header("Refresh: 2, url=registro.php");
            }
        }
    endif;
    ?>
    <div class="container">
        <div class="form-div">
            <form action="" method="post" enctype="multipart/form-data">
                <hr>
                <div class="form-group">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-input" placeholder="Seu nome*">
                    <span class="error-message"></span> 
                </div>
                <div class="form-group">
                    <label for="cpf" class="label">CPF:</label>
                    <input type="text" name="cpf" id="cpf" class="form-input" placeholder="xxx.xxx.xxx-xx*">
                    <span class="error-message"></span> 
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-input" placeholder="**********">
                    <span class="error-message"></span> 
                </div>
                <div class="form-group">
                    <label for="fone" class="form-label">telefone:</label>
                    <input type="text" name="fone" id="fone" class="form-input" placeholder="(xx) xxxxx-xxxxx*">
                    <span class="error-message"></span> 
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">email:</label>
                    <input type="email" name="email" id="email" class="form-input" placeholder="exemplo@exemplo.com*">
                    <span class="error-message"></span> 
                </div>

                <div class="form-group">
                    <label for="nivel" class="form-label">Nivel de Usuário</label>
                    <select name="nivel" id="nivel" class="form-input">
                        <option value="0" selected disabled>Selecione um nível de usuário *</option>
                        <option value="usuario"> Cliente </option>
                        <option value="Adm" disabled style="display: none;"> Adm</option>
                    </select>
                    <span class="error-message"></span> 
                </div>

                <div class="form-group">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" name="cep" id="cep" class="form-input" placeholder="xxxxx-xxx*">
                    <span class="error-message"></span> 
                </div>
                <div class="form-group">
                    <label for="rua" class="form-label">Rua:</label>
                    <input type="text" name="rua" id="rua" class="form-input" placeholder="Nome da rua*">
                    <span class="error-message"></span> 
                </div>
                <div class="form-group">
                    <label for="num" class="form-label">Numero da Rua:</label>
                    <input type="number" name="numero" id="numero" class="form-input" placeholder="Nome da rua*">
                    <span class="error-message"></span> 
                </div>
                <div class="form-group">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" class="form-input" placeholder="Nome do bairro*">
                    <span class="error-message"></span> 
                </div>
                <div class="form-group">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="form-input" placeholder="São-Paulo*">
                    <span class="error-message"></span> 
                </div>
                <div class="form-group">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" name="estado" id="estado" class="form-input" placeholder="São-Paulo*">
                    <span class="error-message"></span> 
                </div>
                <div class="btn-class"> <input type="submit" value="Cadastar" name="cadastrar" class="btn">
                    <hr>
                </div>
                <p class="apagando">* campo obrigatorio</p>
            </form>
            <script src="validate.js"></script>
        </div>
        <div class="end">
            <h1 class="titulo conta">Ja possui conta?</h1>
            <a href="login.php" class="btn-1">Entrar</a>
        </div>
    </div>
</body>

</html>
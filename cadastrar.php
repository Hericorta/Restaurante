<?php
    include_once "conexão.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="custom.css">
    <title>Cadastrar</title>
</head>
<body class="d-flex">
    <?php
        $dados= filter_input_array(INPUT_POST,FILTER_DEFAULT);
        if(!empty($dados["enviar"])){
            try{
                $inserir = "INSERT INTO teste(nome,senha,created) VALUES (:nome,:senha,NOW())";
                $cadastro=$conn->prepare($inserir);
                $cadastro->bindParam(':nome',$dados['nome'], PDO::PARAM_STR);
                $cadastro->bindParam(':senha',$dados['senha'], PDO::PARAM_STR); 
                $cadastro->execute();
                if($cadastro->rowcount()){
                    echo"Cadastrado com sucesso! <br>";
                }
            }catch(PDOException $erro){
                echo"Erro: usuário não cadastrado <br>";

            }
        }
    ?>
    <div class="conteudo-formulario">
        <div class="wrapper-login">
            <div class="title">
                <span>Cadastrar</span>
            </div>
            <form method="POST" class="form-login">
                <div class="row">
                    <label>Nome: </label>
                    <input type="text" name="nome" placeholder="Nome" required>
                </div>
                <div class="row">
                    <label>Senha: </label>
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>
                <div class="row-button">
                    <input class="button" type="submit" name="enviar" value="cadastrar">
                </div>
                <div class="signup-link">
                    <a href="login.php">Entrar</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>
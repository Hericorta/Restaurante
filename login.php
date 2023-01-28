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
    <title>Login</title>
</head>
<body class="d-flex">
    <?php
        
        $dados= filter_input_array(INPUT_POST,FILTER_DEFAULT);
        
        if(!empty($dados["enviar"])){
            $nome = $dados['nome'];
            $senha = $dados['senha'];
            
            $selecionar = "SELECT nome and senha FROM teste WHERE nome='$nome' and senha='$senha'";
            $selecionado = $conn->prepare($selecionar);   
            $selecionado->execute();
            while($linha = $selecionado->fetch(PDO::FETCH_ASSOC)){
            
                if((!empty($linha['nome']))AND(!empty($linha['senha']))){
                    echo"Usuário encontrado";
                }else{
                    echo"Nome ou senha incorretos";
                }
            }
        }
            
        
    ?>
    <div class="conteudo-formulario">
        <div class="wrapper-login">
            <div class="title">
                <span>Login</span>
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
                    <input class="button" type="submit" name="enviar" value="Entrar">
                </div>
                <div class="signup-link">
                    <a href="cadastrar.php">Cadastrar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
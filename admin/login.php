<?php

include_once "../config.inc.php";

 $usuario = $_REQUEST['usuario'];
 $senha = $_REQUEST['senha'];

 $sql = "SELECT * FROM usuario WHERE usuario='$usuario'
  AND senha='$senha'";

 $resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "Deu bom";
    $dados = mysqli_fetch_array($resultado);
    if ($senha == $dados['senha']) {
        // Login válido
        session_start();    //armazena os dados no servidor; se for como cookies, armazena de maneira temporária no teu computador
        $_SESSION['user_id'] = $dados['id'];
        $_SESSION['usuario'] = $dados['usuario'];

        header("Location: index.php");
    }else{
        header("Location: form_login.php");

    }
} else {
    // Login inválido
    echo "Nome de usuário ou senha incorretos.";
}

mysqli_close($conexao);

?>

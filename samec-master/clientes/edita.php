<?php
  session_start();
include_once("conexao.php");
    //RECUPERANDO DADOS DO USUÁRIO
    $id = $_GET['usuario_id'];
      $nome = $_GET['nome'];
      $sobrenome = $_GET['sobrenome'];
      $email = $_GET['email'];
      $senha = $_GET['senha'];
      $perfil=0;
      $cpf = $_GET['cpf'];
      //ALTERANDO DADOS DO USUARIO
    $sql = "UPDATE tb_usuarios 
    SET nome='".$nome."', 
        sobrenome='".$sobrenome."',
        email='".$email."',
        senha='".md5($senha)."',
        perfil='".$perfil."',
        cpf='".$cpf."' WHERE usuario_id='".$id."'";


 $resultado= mysqli_query($conexao, $sql);
 mysqli_query($conexao, $resultado);

      //MENSAGEM SE O USUÁRIO FOI ALTERADO COM SUCESSO

if(mysqli_affected_rows($conexao)){
  $_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
  header("Location: index.php");
}else{
  $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
  header("Location: editar.php?id=$id");
}
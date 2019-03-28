<?php 
session_cache_expire(10);
$cache_expire = session_cache_expire();
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['password'];

// A variavel $result pega as varias $login e $senha, faz uma 
//pesquisa na tabela de usuarios
$result = ($login == 'apac' and $senha == 'abracadabra');

if(($result) > 0 )
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
header('location:pesquisa.php');
}
else{
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  header('location:index.php');
   
  }
?>
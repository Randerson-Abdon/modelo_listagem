<!-- CONEXÃO COM O BD-->
<?php
//LOCAL PADRÃO DA APLICAÇÃO BRASIL
date_default_timezone_set('America/Sao_Paulo');

//CONEXAO LOCAL
//OBJETO QUE SE MANTEM, CONSTANTE COM DADOS PARA CONEXÃO AO BD
define('HOST', 'localhost'); //servidor
define('USUARIO', 'provider'); //usuario do banco de dados
define('SENHA', 'Jp?20061965'); //senha do banco de dados
define('BD', 'santaizabel-pa'); //do banco de dados

//VARIAVEL PARA GUARDAR A EXECUÇÃO DA CONEXÃO
$conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die('Não Conectou');
mysqli_set_charset($conexao, "utf8");

?>
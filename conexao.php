<!-- CONEXÃO COM O BD-->
<?php
//LOCAL PADRÃO DA APLICAÇÃO BRASIL
date_default_timezone_set('America/Sao_Paulo');

//CONEXAO LOCAL
//OBJETO QUE SE MANTEM, CONSTANTE COM DADOS PARA CONEXÃO AO BD
define('HOST', 'localhost'); //servidor
define('USUARIO', ''); //usuario do banco de dados
define('SENHA', ''); //senha do banco de dados
define('BD', ''); //do banco de dados

//VARIAVEL PARA GUARDAR A EXECUÇÃO DA CONEXÃO
$conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die('Não Conectou');
mysqli_set_charset($conexao, "utf8");

?>

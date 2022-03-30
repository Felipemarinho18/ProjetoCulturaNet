<?php
  define('host', '127.0.0.1');
  define('USUARIO','root');
  define('SENHA','');
  define('DB','entrar');

  $conexao = mysqli_connect(host,USUARIO,SENHA,DB) or die ('Não foi possivel conectar');

  echo "Tudo certo";
 ?>

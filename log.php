
<?php
  include ('conexao.php');

  if(isset($_POST['email']) || isset($_POST['senha']))
  {
    if(strlen($_POST['email']) ==0)
    {
      echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha'])==0)
    {
      echo "Preencha sua senha";
    } else{
      {
        $email = mysqli->real_escape_string($_POST['email']);
        $senha = mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo SQL");

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1)
        {
          $usuario = $sql_query->fetch_assoc();

          if (! isset($_SESSION)) {
              session_start();
          }
          $_SESSION['id'] = $usuario['id'];
          header("Location: home.php");
        }else
        {
          echo "Falha ao logar! E-mail ou senha incorretos";
        }

      }
    }
  }

 ?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - PHP + MySQL - Canal TI</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="bulma.min.css" />
    <link rel="stylesheet" href="log.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Sistema de Login</h3>
                    <h3 class="title has-text-grey"><a href="https://youtube.com/canaltioficial" target="_blank"> Maiara Linda</a></h3>
                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <div class="box">
                        <form action="home.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" name="text" class="input is-large" placeholder="Seu usuário" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Sua senha">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

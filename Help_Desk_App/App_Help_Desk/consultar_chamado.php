<?php

  require("valida_acesso.php");

?>

<?php
  $chamados = array();
  $arquivo = fopen('../../help_desk/chamado.txt', 'r');

  while(!feof($arquivo)){
    $registro = fgets($arquivo);
    $registro_detalhes = explode('#', $registro);

    if($_SESSION['perfil'] == 2){
      if($_SESSION['id'] != $registro_detalhes[0]){
        continue;
      }else{
        $chamados[] = $registro;
      }
    }else{
      $chamados[] = $registro;
    }
  }

  fclose($arquivo);
  
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
            <?php foreach($chamados as $chamado){ ?>
              <?php 
                $dados_chamado = explode('#', $chamado);
                

                if(count($dados_chamado) < 3){
                  continue;
                }
              ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $dados_chamado[1]; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $dados_chamado[2]; ?></h6>
                  <p class="card-text"><?= $dados_chamado[3]; ?></p>

                </div>
              </div>
            <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  
                    <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
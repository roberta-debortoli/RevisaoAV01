<?php

include_once '../controle/controleEvento.php';

if(!empty($_POST['form_submit'])){
    controleEvento::index();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="img/favicon.ico">
  <title>SiGer</title>
  <!-- Bootstrap URL - CSS -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="../../recursos/css/theme.css" rel="stylesheet">
  <!-- Ajax Script -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body role="document">
  <!-- Fixed navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">[ SisGer ] Sistema Gerenciador de Certificado</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="../index.php"> Início </a>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container theme-showcase" role="main">

    <div class="page-header">
      <br>
      <h2 class="form-signin-heading">
        <div id="m_texto"> Eventos Cadastrados </div>
      </h2>
    </div>

    <form class="form" method="post" action="viewEvento.php">
      <input TYPE="hidden" NAME="form_submit" VALUE="OK">

      <button type="submit" name="acao" class="btn btn-primary">
        <b>Cadastrar Novo Evento</b>
      </button>
      <br>
      <table class='table table-striped'>
        <thead>
          <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>TIPO</th>
            <th>DATA</th>
            <th>AÇÕES</th>
          </tr>
        </thead>
        <tbody>
          <?php
          controleEvento::loadTabelaEventos();
          ?>
        </tbody>
      </table>
    </form>

    <div class="page-header">
      <b>&copy;2019&nbsp;&nbsp;&raquo;&nbsp;&nbsp;</b>
    </div>
  </div> <!-- /container -->
</body>

</html>
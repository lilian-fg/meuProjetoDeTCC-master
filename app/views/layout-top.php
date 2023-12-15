<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Simples</title>

    <link rel="stylesheet" href="<?=assets('bootstrap/css/bootstrap.min.css')?>" />
    <script src="<?=assets('bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <link rel="stylesheet" href="<?=assets('css/estilo.css')?>" />

    <script src="https://unpkg.com/imask"></script>
    <script src="<?=assets('js/main.js')?>"></script>
</head>
<body>

<!-- MENU -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=route('')?>">ProcurArte</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php
    if (isset($_SESSION["user"])):
    ?>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?=route('artistas')?>">Artistas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=route('obras')?>">Obras</a>
          <li class="nav-item">
      <a class="nav-link" href="<?=route('autenticacao/logout')?>">Logout</a>
        </li>
        </li>
      </ul>
    </div>

    <?php
    endif;
    ?>
  </div>
</nav>

<div class="container">

<?php

if (getFlash("success")){
    print "<div class='alert alert-success' role='alert'>".getFlash("success")."</div>";
} else
if (getFlash("error")){
    print "<div class='alert alert-danger' role='alert'>".getFlash("error")."</div>";
}

?>

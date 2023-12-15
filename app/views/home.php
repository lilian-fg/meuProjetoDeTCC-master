<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!--REFERENCIA DO BOOTSTRAP AO JAVASCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <!-- CSS PESSOAL -->
    <link rel="stylesheet" href="<?=assets("css/home.css")?>" />

    <!-- BOOSTRAP ICONES-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <link rel="shortcut icon" href="public/imgs/faviconn.ico" type="image/x-icon">


    <title>ProcurArte</title>

</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- CONTAINER -->
        <div class="container-sm">
            <nav><a  href="<?=route('')?>">
                    <img id="logoInicio" src="public/imgs/logo.png" alt="logo" width="40" height="32"
                        viewBox="0 0 118 94">
                        </a>                
                    <ul class="ul">
                        <div class="login">
                             <button><a id="btn1" href="<?=route('autenticacao/index')?>">LOGIN</a></button>
                        </div>
                    </ul>
            </nav>

            <section class="banner">
                <div class="banner-text">
                    <h1>ProcurArte</h1>
                    <p>Descubra novas expressões.</p>
                </div>
            </section>
        </div>
        
        <!-- END CONTAINER-->
    </header>
    <br><br><br><br><br><br>
    <!-- END HEADER-->
    <!-- PAG 1.0-->
    <section class="quemsomos">
        <!-- CONTAINER -->
        <div class="container">
            <div class="quemsomos-text">
                <h3>Quem Somos?</h3>
                <p>Somos um projeto que visa divulgar obras de artistas locais.</p>
            </div>
            <div class="quemsomos-img">
            <img src="public/imgs/frufru.png" alt="quemsomos-img">
            </div>
        </div>
        <!-- END CONTAINER -->
    </section>
    <!-- END PAG 1.0-->
    <!-- PAG 2.0-->
    <section class="quemsomos">
        <!-- CONTAINER -->
        <div class="container">
            <div class="quemsomos-img">
                <img src="public/imgs/lulu.png" alt="quemsomos-img">
            </div>
            <div class="quemsomos-text">
                <h3>Nosso Mural de Obras</h3>
                <p>Patrimônio Construído: Celebrando as Obras Registradas</p>
            </div>
        </div>
        <!-- END CONTAINER -->
    </section>


<div class="row row-cols-1 row-cols-md-4 g-4" style="margin-left:10px; margin-right:10px;">
    <?php foreach($lista as $item): ?>
    
        <div class="col"  >
            <div class="card" style="max-width: 340px; height: 515px;">
            <img src="<?=$item['foto1']?>" class="card-img-top" alt="<?=$item['nome']?>" style="height: 468px;">
            <div class="card-body">
                <h5 class="card-title"><?=$item['nome']?></h5>
            </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

    <!-- END PAG 2.0-->
    <section class="informações">
        <div class="container">
            <hr>
            <!--<div class="name-Page">
                <img id="logo" src="public/imgs/EndPage.png" alt="">
                <p></p>
            </div>-->
            <div class="login">
            <h5>ProcurArte © 2023</h5>
            <p1>Entre em contato conosco</p1>
            <p>llilianele6@gmail.com</p>
            <p>yza.belly2612@gmail.com</p>
            </div>
        </div>
    </section>
    <script src="js/script.js"></script>
</body>

</html>
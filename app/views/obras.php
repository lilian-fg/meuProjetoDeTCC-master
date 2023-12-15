<?php 
use models\Artista;
include 'layout-top.php' ?>


<form method='POST' action='<?=route('obras/salvar/'._v($data,"id"))?>' enctype="multipart/form-data">

<label class='col-md-6'>
    Nome
    <input type="text" class="form-control" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label class='col-md-6'>
    Foto
    <input type="file" class="form-control" name="foto1"  >
    <?php if (_v($data,"foto1")):?>
        <img src="<?=$server_url . _v($data,"foto1")?>" width=100>
    <?php endif;?>
</label>

<label class='col-md-6'>
    Foto
    <input type="file" class="form-control" name="foto2"  >
    <?php if (_v($data,"foto2")):?>
        <img src="<?=$server_url . _v($data,"foto2")?>" width=100>
    <?php endif;?>
</label>

<label class='col-md-6'>
    Foto
    <input type="file" class="form-control" name="foto3"  >
    <?php if (_v($data,"foto3")):?>
        <img src="<?=$server_url . _v($data,"foto3")?>" width=100>
    <?php endif;?>
</label>


<label class='col-md-6'>
    Modelo
    <select name="modelo_id" class="form-control">
        <?php
        foreach($modelos as $modelo){
            _v($data,"modelo_id") == $modelo['id'] ? $selected='selected' : $selected='';
            print "<option value='{$modelo['id']}' $selected>{$modelo['modelo']}</option>";
        }
        ?>
    </select>
</label>


<label class='col-md-2'>
    Tipo de Arte
    <input type="text" class="form-control" name="editora" value="<?=_v($data,"editora")?>" >
</label>

<label class='col-md-2'>
    Ano
    <input type="text" class="form-control" name="ano" value="<?=_v($data,"ano")?>" >
</label>


<?php
if ($_SESSION['user']['tipo'] < Artista::ADMIN_USER):
?>
<input type="hidden" name="obra_artista_id" value="<?=$_SESSION['user']['id']?>" >

<?php
else:
?>

<label class='col-md-6'>
    Obra_Artistas
    <select name="obra_artista_id" class="form-control">
        <option></option>
        <?php
        foreach($artistas as $usu){
            _v($data,"artistas") == $usu['id'] ? $selected='selected' : $selected='';
            print "<option value='{$usu['id']}'>{$usu['nome']}</option>";
        }
        ?>
    </select>  
</label>

<?php
endif;
?>


<?php if (_v($data,'id')) : ?>
    <table class='table'>
        <tr>
            <th>Nome</th>
            <th>Deletar</th>
        </tr>
        <?php foreach($obra_artistas as $item): ?>
            <tr>
                <td><?=$item['nome']?></td>
                <?php
                if ($_SESSION['user']['tipo'] == Artista::ADMIN_USER):
                ?>
                <td>
                    <a href='<?=route("obras/deletarObra_Artista/{$item['id']}")?>'>Deletar</a>
                </td>
                <?php
                endif;
                ?>
            </tr>
        <?php endforeach; ?>
    </table>    
<?php endif; ?>



<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("obras")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Modelo</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("obras/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['modelo']?></td>
            
            <td>
                <a href='<?=route("obras/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>
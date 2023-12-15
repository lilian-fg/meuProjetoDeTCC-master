<?php
use models\Obra;
use models\Modelo;
use models\Artista;
use models\Obra_Artista;

class ObrasController {

	
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Obra();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->minhasObras();

        #recupera a lista com todos os modelos
        $modelosModel = new Modelo();
        $send['modelos'] = $modelosModel->all();

		
        #recupera a lista com todos os Artistas
        $usuModel = new Artista();
        $send['artistas'] = $usuModel->all();


		#se estiver editando um Obra
		if ($id != null){
			#recupera todos os Obra_Artistas já setados para esse Obra
			$send['obra_artistas'] = $model->getObra_Artistas($id);
		}
		

		$send['tipos'] = [0=>"Escolha uma opção", 1=>"Virtual", 2=>"Fisico"];

		#chama a view
		render("Obras", $send);
	}

	
	function salvar($id=null){


		$parts = pathinfo($_FILES['foto1']['name']);
		$uploadfile = "./uploads/".$_FILES['foto1']['name'];
		$i = 2;
		while (file_exists($uploadfile)){
			$uploadfile = "./uploads/".$parts['filename'] . "-$i-" .".".$parts['extension'];
			$i++;
		}
		if (move_uploaded_file($_FILES['foto1']['tmp_name'], $uploadfile)) {
			$_POST["foto1"]=$uploadfile;
		}

		$parts = pathinfo($_FILES['foto2']['name']);
		$uploadfile = "./uploads/".$_FILES['foto2']['name'];
		$i = 2;
		while (file_exists($uploadfile)){
			$uploadfile = "./uploads/".$parts['filename'] . "-$i-" .".".$parts['extension'];
			$i++;
		}
		if (move_uploaded_file($_FILES['foto32']['tmp_name'], $uploadfile)) {
			$_POST["foto2"]=$uploadfile;
		}

		$parts = pathinfo($_FILES['foto3']['name']);
		$uploadfile = "./uploads/".$_FILES['foto13']['name'];
		$i = 2;
		while (file_exists($uploadfile)){
			$uploadfile = "./uploads/".$parts['filename'] . "-$i-" .".".$parts['extension'];
			$i++;
		}
		if (move_uploaded_file($_FILES['foto3']['tmp_name'], $uploadfile)) {
			$_POST["foto3"]=$uploadfile;
		}


		$model = new Obra();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}

		#se a id de um Artista/Obra_Artista tiver sido enviada
		if (_v($_POST,'obra_artista_id')){
			$model = new Obra_Artista();
			$dados = ["artista_id"=> $_POST['obra_artista_id'], "obra_id"=>$id];
			$model->save($dados);
		}
		
		
		redirect("Obras/index/$id");
	}

	function deletar(int $id){
		
		$model = new Obra();
		$model->delete($id);

		redirect("Obras/index/");
	}

	function deletarObra_Artista(int $idDoRelacionamento){
       
        $model = new Obra_Artista();
        $rel = $model->findById($idDoRelacionamento);
        $model->delete($idDoRelacionamento);

        redirect("Obras/index/{$rel['obra_id']}");
    }


}

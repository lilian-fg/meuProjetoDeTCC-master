<?php
use models\Obra;

class PrincipalController {

	function index(){
		#cria o model
		$model = new Obra();
		
		
		$send = [];
		#busca todos os registros
		$send['lista'] = $model->all();	


		render("home",$send);
	}

}


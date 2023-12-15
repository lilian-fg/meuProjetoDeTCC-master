<?php

namespace models;

class Motorista extends Model {

    protected $table = "motoristas";
    #nao esqueça da ID
    protected $fields = ["id","usuario_id","veiculo_id"];
   
}



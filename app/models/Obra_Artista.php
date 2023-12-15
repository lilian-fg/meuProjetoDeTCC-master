<?php

namespace models;

class Obra_Artista extends Model {

    protected $table = "obra_artista";
    #nao esqueça da ID
    protected $fields = ["id","artista_id","obra_id"];
   
}



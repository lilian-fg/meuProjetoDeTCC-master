<?php

namespace models;

class Artista extends Model {

    protected $table = "artistas";
    #nao esqueça da ID
    protected $fields = ["id","nome","dataNascimento","ativado","email","senha", "tipo"];
    
    const COMUM_USER = 1;
    const ADMIN_USER = 5;

    public static $userTypes = [Artista::COMUM_USER=>"Usuário comum",
                                Artista::ADMIN_USER=>"Admin"];


    public function findByEmailAndSenha($email, $senha){
        $sql = "SELECT * FROM {$this->table} "
                ." WHERE email = :email and senha = :senha";
        $stmt = $this->pdo->prepare($sql);
        $data = [':email' => $email, ":senha"=>$senha];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    
}


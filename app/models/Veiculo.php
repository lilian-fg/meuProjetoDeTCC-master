<?php

namespace models;

class Veiculo extends Model {
    
    protected $table = "veiculos";
    #nao esqueça da ID
    protected $fields = ["id","placa","modelo_id","cor","ano"];

    public function findById($id){
        $sql = "SELECT veiculos.*, modelos.modelo AS modelo FROM {$this->table} "
                ." LEFT JOIN modelos ON modelos.id = veiculos.modelo_id "
                ." WHERE veiculos.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [':id' => $id];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $sql = "SELECT veiculos.*, modelos.modelo as modelo FROM {$this->table} "
                ." LEFT JOIN modelos ON modelos.id = veiculos.modelo_id ";
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }


    public function getMotoristas($idVeiculo){
        $sql = "SELECT * FROM usuarios
            INNER JOIN motoristas ON
                usuarios.id = motoristas.usuario_id
            WHERE motoristas.veiculo_id = :idVeiculo ";

        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute([':idVeiculo' => $idVeiculo]);

        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }




    
}


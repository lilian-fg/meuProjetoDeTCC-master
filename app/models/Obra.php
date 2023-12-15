<?php

namespace models;

class Obra extends Model {
    
    protected $table = "Obras";
    #nao esqueça da ID
    protected $fields = ["id","nome","modelo_id","editora","ano", "foto1", "foto2","foto3"];

    public function findById($id){
        $sql = "SELECT Obras.*, modelos.modelo AS modelo FROM {$this->table} "
                ." LEFT JOIN modelos ON modelos.id = Obras.modelo_id "
                ." WHERE Obras.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [':id' => $id];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function ultimas(){
        $sql = "SELECT Obras.*, modelos.modelo as modelo FROM {$this->table} "
                ." LEFT JOIN modelos ON modelos.id = Obras.modelo_id limit 10 order by obras.id";
        
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

    public function minhasObras(){
        $sql = "SELECT Obras.*, modelos.modelo as modelo FROM {$this->table} "
                ." LEFT JOIN modelos ON modelos.id = Obras.modelo_id ";

        if ($_SESSION['user']['tipo'] < Artista::ADMIN_USER){
            $sql .= " INNER JOIN Obra_Artista ON obras.id = Obra_Artista.obra_id ";
            $sql .= " WHERE Obra_Artista.artista_id = :idArtista ";
        }
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        if ($_SESSION['user']['tipo'] < Artista::ADMIN_USER){
            $stmt->execute([':idArtista' => $_SESSION['user']['id']]);
        } else {
            $stmt->execute();
        }
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }

    public function all(){
        $sql = "SELECT Obras.*, modelos.modelo as modelo FROM {$this->table} "
                ." LEFT JOIN modelos ON modelos.id = Obras.modelo_id ";
        
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


    public function getObra_Artistas($idObra){
        $sql = "SELECT * FROM artistas
            INNER JOIN Obra_Artista ON
                artistas.id = Obra_Artista.artista_id
            WHERE Obra_Artista.Obra_id = :idObra ";

        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute([':idObra' => $idObra]);

        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }




    
}


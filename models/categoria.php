<?php

class Categoria {
    private $id;
    private $nombre;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getAll(){
        $categoria = $this->db->query('SELECT * FROM categorias'); 
        return $categoria;
    }

    public function getOne(){
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->id}");
        return $categoria->fetch_object();
    }

    public function save(){
        $save = $this->db->query("INSERT INTO categorias VALUES (NULL,'{$this->getNombre()}')");        
        $this->result = false;

        if($save){
            $this->result = true;
        }
        return $this->result;
    }
}
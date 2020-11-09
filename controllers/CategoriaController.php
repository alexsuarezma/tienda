<?php 
require_once('models/categoria.php');
require_once('models/producto.php');
class CategoriaController {
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        
        require_once('views/categoria/index.php');
    }
    public function crear(){
        Utils::isAdmin();
        require_once('views/categoria/crear.php');
    }

    public function ver(){
        if(isset($_GET['id'])){
            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $categoria = $categoria->getOne();

            if($categoria){
                $producto = new Producto();
                $producto->setCategoria_id($_GET['id']);
                $producto->getCategoria_id();

                $productos = $producto->getAllCategory();
            }

        }
        require_once('views/categoria/ver.php');
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false ;
            if($nombre){
                $categoria = new Categoria();
                $categoria->setNombre($nombre);

                $categoria->save();
            }
            header('Location: '.base_url.'categoria/index');
        }
    }
}
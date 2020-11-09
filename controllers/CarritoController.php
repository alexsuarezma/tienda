<?php 
require_once('models/producto.php');
class CarritoController {
    public function index(){
        if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1){
            $carrito = $_SESSION['carrito'];
        }else{
            $carrito = '';
        }
        require_once('views/carrito/index.php');
    }

    public function add(){
        if(!isset($_GET['id'])){
            header('Location: '.base_url);
        }


        if(isset($_SESSION['carrito'])){
            $counter = 0;
            foreach($_SESSION['carrito'] as $indice => $elemento){
                if($elemento['id_producto'] == $_GET['id']){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }

        if(!isset($counter) || $counter == 0){
            $producto = new Producto();
            $producto->setId($_GET['id']);
            $producto = $producto->getOne();

            if(is_object($producto)){
                $_SESSION['carrito'][] = array(
                    'id_producto'=>$producto->id,
                    'precio'=>$producto->precio,
                    'producto'=>$producto,
                    'unidades'=> 1
                );
            }
        }
        header('Location: '.base_url.'carrito/index');
     }

    public function remove(){
        if(isset($_GET['id'])){
            unset($_SESSION['carrito'][$_GET['id']]);
        }
        header('Location: '.base_url.'carrito/index');
    }

    public function plus(){
        if(isset($_GET['id'])){
            $_SESSION['carrito'][$_GET['id']]['unidades']++;
        }
        header('Location: '.base_url.'carrito/index');
    }

    public function less(){
        if(isset($_GET['id'])){
            $_SESSION['carrito'][$_GET['id']]['unidades']--;
            if($_SESSION['carrito'][$_GET['id']]['unidades'] == 0){
                unset($_SESSION['carrito'][$_GET['id']]);
            }
        }
        header('Location: '.base_url.'carrito/index');
    }

    public function delete(){
        unset($_SESSION['carrito']);
        header('Location: '.base_url.'carrito/index');
    }
}
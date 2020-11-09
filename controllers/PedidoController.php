<?php 
require_once('models/pedido.php');

class PedidoController {
    public function pedir(){
        require_once('views/pedido/pedir.php');
    }

    public function add(){
       
        if(isset($_SESSION['identity'])){
            
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false ; 
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false ; 
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false ; 
            $stats = Utils::statsCarrito();

            if($localidad && $provincia && $direccion){
                $pedido = new Pedido();
                $pedido->setUsuario_id($_SESSION['identity']->id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($stats['total']);

                $pedido->save();

                $saveLinea = $pedido->saveLinea();

                if($pedido->result && $saveLinea){
                    $_SESSION['pedido'] = 'completed';
                }else{
                    $_SESSION['pedido'] = 'failed';
                }
            }else{
                $_SESSION['pedido'] = 'failed';
            }
            header('Location: '.base_url.'pedido/confirmado');
        }else{
            header('Location: '.base_url);
        }
    }

    public function confirmado(){
        if(isset($_SESSION['identity'])){
            $pedido = new Pedido();
            $pedido->setUsuario_id($_SESSION['identity']->id);
            
            $pedido = $pedido->getOneByUser();

            $pedidoProductos = new Pedido();
            $productos = $pedidoProductos->getProductsByPedido($pedido->id);
        }

        require_once('views/pedido/confirmado.php');
    }

    public function misPedidos(){
        Utils::isIdentity();
        $pedido = new Pedido();
        $pedido->setUsuario_id($_SESSION['identity']->id);
        $pedidos = $pedido->getAllByUser();

        require_once('views/pedido/misPedidos.php');
    }

    public function detalle(){
        Utils::isIdentity();
        if(isset($_GET['id'])){
            $pedido = new Pedido();
            $pedido->setId($_GET['id']);
            
            $pedido = $pedido->getOne();

            $pedidoProductos = new Pedido();
            $productos = $pedidoProductos->getProductsByPedido($_GET['id']);

            require_once('views/pedido/detalle.php');
        }else{
            header('Location: '.base_url.'pedido/misPedidos');
        }
    }

    public function gestion(){
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once('views/pedido/misPedidos.php');
    }

    public function estado(){
        Utils::isAdmin();
        if(isset($_POST['id']) && isset($_POST['estado'])){
            
            $pedido = new Pedido();
            $pedido->setId($_POST['id']);
            $pedido->setEstado($_POST['estado']);

            $pedido->updateOneState();
            
            header('Location: '.base_url.'pedido/detalle&id='.$_POST['id']);
        }else{
            header('Location: '.base_url);
        }
    }
}
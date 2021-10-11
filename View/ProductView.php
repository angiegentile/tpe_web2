
<?php

require_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class ProductView{
    
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
    }
    
    function viewProducts($products){
        
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', 'Productos');
        $this->smarty->assign('items', $products);
        $this->smarty->display('templates/products.tpl');
    }

    function viewProduct($product){
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $product['producto']->nombre);
        $this->smarty->assign('descripcion', $product['producto']->descripcion);
        $this->smarty->assign('precio', $product['producto']->precio);
        $this->smarty->assign('id_categoria', $product['producto']->id_categoria);
        $this->smarty->assign('nombre_categoria', $product['categoria']);
        $this->smarty->display('templates/product.tpl');

    }

    function toAdmin(){
        header("Location: ". BASE_URL."admin");
    }

    function viewEditForm($product){
        
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', 'editar producto');
        $this->smarty->assign('product', $product);
        $this->smarty->display('templates/editProductForm.tpl');
    }
    
}
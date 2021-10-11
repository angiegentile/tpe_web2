
<?php

class ProductModel{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql: host=localhost;'.'dbname=bd_aquamood;charset=utf8','root','');
    }
    function getProducts(){
        $sentencia = $this->db->prepare("select * from producto");
        $sentencia->execute();
        $sentenciaCategorias = $this->db->prepare("select * from categoria where id_categoria=?");
        $productos= $sentencia->fetchAll(PDO::FETCH_OBJ);
        $productosConCategoria = array();
        foreach($productos as $producto) {
            $p['nombre'] = $producto->nombre;
            $p['descripcion'] = $producto->descripcion;
            $p['precio'] = $producto->precio;
            $p['id_producto'] = $producto->id_producto;
            $sentenciaCategorias->execute(array($producto->id_categoria));
            $categoria = $sentenciaCategorias->fetch(PDO::FETCH_OBJ);
            $p['categoria']= $categoria->nombre;
            array_push($productosConCategoria, $p);
        }

        return $productosConCategoria;
    }

    function getProduct($id){
        $sentencia = $this->db->prepare("select * from producto where id_producto=?");
        $sentencia->execute((array($id)));
        $producto = $sentencia->fetch(PDO::FETCH_OBJ);
        $obtCategoria = $this->db->prepare("select * from categoria where id_categoria=?");
        $obtCategoria->execute(array($producto->id_categoria));
        $categoria = $obtCategoria->fetch(PDO::FETCH_OBJ);
        $p = array();
        $p['categoria'] = $categoria->nombre;
        $p['producto'] = $producto;
        

        return $p;

    }

    function addProductOnDb($name, $price, $description, $id_category){
        $sentencia = $this->db->prepare("INSERT INTO producto(nombre, precio, descripcion, id_categoria) VALUES(?, ?, ?, ?)");
        $sentencia->execute(array($name, $price, $description, $id_category));
    }

    function deleteProductFromDB($id){
        $sentencia = $this->db->prepare("DELETE from producto where id_producto=?");
        $sentencia->execute(array($id));
    }

    function updateProductOnDB($id){
        $sentencia = $sentencia = $this->db->prepare("UPDATE producto SET nombre=?, precio=?, descripcion=? WHERE id_producto=?");
        $sentencia->execute(array($_POST['name'], $_POST['price'], $_POST['description'],$id));
    }
}

{include file="header.tpl"}
    <h2>Datos actuales</h2>
    <p>Nombre : {$product['producto']->nombre}</p>
    <p>Precio : {$product['producto']->precio}</p>
    <p>Descripcion : {$product['producto']->descripcion}</p>
    <p>Categoría :{$product['producto']->id_categoria} - {$product['categoria']}</p>
    
    <form method="POST" action="editProduct/{$product['producto']->id_producto}">

        <label for="name"> Nombre para el producto:  </label>
        <input type="text" name="name" id="name"> 

        <label for="price"> Precio para el producto:  </label>
        <input type="number" name="price" id="price">

        <label for="description"> Descripcion : </label>
        <input type="text" name="description" id="description"> 

      
        <input type="submit" value="Editar">
    </form>
{include file="footer.tpl"}
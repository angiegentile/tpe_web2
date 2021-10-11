{include file="header.tpl"}
    <div>
    <h2>{$descripcion}</h2>
    </div>

    <div>
    <h4>Precio : ${$precio}</h4>
    </div>

    <div>
        <h6>Categoría: {$nombre_categoria}</h6>
        <h6> <a href="showOneCategory/{$id_categoria}">Ver otros productos de esta categoría</a> - <a href="showProducts">Ver todos los productos</a> <a href="home">Home</a><h6>
    </div>


   

{include file="footer.tpl"}
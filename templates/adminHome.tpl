{include file="header.tpl"}
    <h2>Administrar productos y categorías</h2> <a href="home">Home</a> <a href="logout">Log Out</a>
    <h3>Administrar Productos</h3>
        {foreach $products item=$p}
           <li>{$p['nombre']}- <a href="deleteProduct/{$p['id_producto']}">Borrar </a> - <a href="editProductForm/{$p['id_producto']}">Editar</a></li>
        {/foreach}

    <h4>Crear nuevo Producto</h4>    
     <form method="POST" action="createProduct">

        <label for="name"> Nombre para el producto:  </label>
        <input type="text" name="name" id="name"> 

        <label for="price"> Precio para el producto:  </label>
        <input type="number" name="price" id="price"> 

        <label for="description"> Descripcion : </label>
        <input type="text" name="description" id="description"> 

        <label for="category"> Seleccione la categoría : </label>
        <select name="category">
        {foreach $categories item=$c}
            <option value={$c->id_categoria}>{$c->nombre}</option>
        {/foreach}
        </select>

        <input type="submit" value="Crear">
   </form>    


   <h3>Administrar Categorías</h3>
        {foreach $categories item=$c}
            <li>{$c->nombre} - <a href="deleteCategory/{$c->id_categoria}">Borrar </a> - <a href="editCategoryForm/{$c->id_categoria}">Editar</a></li>;
        {/foreach}

    <h4>Crear nueva categoría</h4>    
     <form  action="createCategory" method="POST">
        <label for="name"> Nombre para la categoría:  </label>
        <input type="text" name="name" id="name"> 
        <label for="description"> Descripcion : </label>
        <input type="text" name="description" id="description"> 
        <input type="submit" value="Crear">
   </form>    
{include file="footer.tpl"}
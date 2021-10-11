{include file="header.tpl"}
    <h2>Datos actuales</h2>
    <p>Nombre : {$categoria['nombre']}</p>
    <p>Descripcion : {$categoria['descripcion']}</p>
    
    <form method="POST" action="editCategory/{$categoria['id_categoria']}">
        <label for="name"> Nombre para la categoría:  </label>
        <input type="text" name="name" id="name"> 
        <label for="description"> Descripcion : </label>
        <input type="text" name="description" id="description"> 
        <input type="submit" value="Editar">
    </form>
{include file="footer.tpl"}
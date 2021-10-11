{include file="header.tpl"}
    <a href="home">Home</a>
   {foreach $items  item=$item}
    <li>{$item['nombre']}  - $ {$item['precio']} - CATEGORÍA: {$item['categoria']} - <a href="showOneProduct/{$item['id_producto']}">Ver producto</a></li>;
    {/foreach}

{include file="footer.tpl"}
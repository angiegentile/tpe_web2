
{include file="header.tpl"}
    <a href="home">Home</a>

   {foreach $items  item=$item}
    <li>{$item->nombre} : {$item->descripcion} <a href="showOneCategory/{$item->id_categoria}" target="_self"> Ver productos</a> </li>;
    {/foreach}

{include file="footer.tpl"}
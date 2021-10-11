{include file="header.tpl"}
    <a href="home">Home</a>
    
   {foreach $items  item=$item}
    <li>{$item->nombre} : {$item->descripcion} - $ {$item->precio} </li>;
    {/foreach}

{include file="footer.tpl"}
{include file="header.tpl"}

    <form action="verifyLogin" method="POST">

        <input type="email" name="email" id="email" placeholder="email" required> 
        <input type="password" name="password" id="password" placeholder="password" required> 
        <input type="submit" value="ingresar">
    </form>

{include file="footer.tpl"}
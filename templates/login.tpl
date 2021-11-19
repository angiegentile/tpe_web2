{include file="header.tpl"}

<div> {$message}<div>
    
    <form action="verifyLogin" method="POST">
        <input type="email" name="email" id="email" placeholder="email" required> 
        <input type="password" name="password" id="password" placeholder="password" required> 
        <input type="submit" value="ingresar">
    </form>
    <p>No tiene una cuenta?<a href="registerForm">Registrarse</a></p>
{include file="footer.tpl"}
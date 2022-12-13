<h1 class="nombre-pagina">Iniciar Sesión</h1>
<p class="descripcion-pagina">Ingresa tus credenciales de acceso</p>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";         //incluir template de alertas
?>


<form class="formulario" method="POST" action="/">
    <div class="campo">
        <!-- <label for="email">Email</label> -->
        <input 
            type="email"
            id="email"
            placeholder="Tu Email"
            name="email"
        />
    </div>

    <div class="campo">
        <!-- <label for="password">Password</label> -->
        <input 
                type="password"
                id="password"
                placeholder="Tu Password"
                name="password"
        />
    </div>

    <div class="boton-centrar">
        <input type="submit" class="boton" value="Iniciar Sesión">
    </div>
    
</form>

<div class="acciones">
    <b><a href="/crear-cuenta">Regístrarse</a></b>
    <b><a href="/olvide">Recuperar Contraseña</a></b>
</div>
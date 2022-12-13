<h1 class="nombre-pagina">Servicios</h1>
<p class="descripcion-pagina">Administracion de Servicios</p>

<?php
    include_once __DIR__ . '/../templates/barra.php'; 

?>

<ul class="servicios">
    <?php foreach($servicios as $servicio){?>

        <li>
            <div class="servicios-publicados">
                <div class="anchoMaximo">
                    <p>Nombre: <span><?php echo $servicio->nombre; ?></span></p>
             
                </div>
                <div>
                    <p>Precio: <span>$<?php echo $servicio->precio; ?></span></p>
                </div>
            
            <div class="acciones">
                <a class="servicios-publicados-actualizar" href="/servicios/actualizar?id=<?php echo $servicio->id; ?>">&#128190;Editar</a>

                <form action="/servicios/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
                    <input type="submit" value="&#128465; Borrar" class="servicios-publicados-borrar">
                </form>
            </div>
            </div>
        </li>
    <?php } ?>
</ul>
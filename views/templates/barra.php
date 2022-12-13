<div class="barra">
    <p> &#128578; Usuario: <?php echo $nombre ?? '' ?></p>
    <a class="boton" href="/logout">&#10060; Salir</a>
</div>

<?php if(isset($_SESSION['admin'])){ ?>
    <div class="barra-servicios">
        <a class="botonesAdmin" href="/admin">&#128198; Citas Solicitadas</a>
        <a class="botonesAdmin" href="/servicios">&#127760; Servicios Publicados</a>
        <a class="botonesAdmin" href="/servicios/crear">&#128161; Crear Nuevo Servicio</a>
    </div>
<?php } ?>
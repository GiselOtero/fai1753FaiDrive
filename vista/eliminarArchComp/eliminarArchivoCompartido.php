<?php
    include_once ("../estructura/cabecera.php");
?>
<div class="card shadow-lg" style="width:80%;margin:auto;">
    <div class="card-header text-white" style="background-image: linear-gradient(to top right,#ACE5FF,#46B3E6,#4D80E4,#2E279D)"><h5>Eliminar Archivo Compartido</h5></div>
    <div class="card-body">
        <div><h5> 1234.png </h5><h5>cantVeces</h></div>
    
        <form  id="formEliminarArchivoCompartido" action="upload.php" method="post">
            <div class="form-group">
                <label for="motivo">Motivo de que desea dejar de compartir el archivo:</label>
                <input class="form-control" type="text" name="motivo" id="motivo">
            </div>
            <div class="form-group">
                <label for="usuario">Usuario que lo carga:</label>
                <select class="form-control" name="usuario" id="usuario">
                    <option value=""></option>
                    <option value="admin">Admin</option>
                    <option value="visitante">Visitante</option>
                    <option value="elUsuario">Tú</option>
                </select>
            </div>
            <div class="form-group">
                <input class="btn btn-primary boton" type="submit" value="Eliminar">
            </div>
        </form>
    </div>
</div>
<?php
    include_once ("../estructura/pie.php");
?>
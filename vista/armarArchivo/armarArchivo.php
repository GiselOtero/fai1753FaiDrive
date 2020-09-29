<?php
    include_once ("../estructura/cabecera.php");
?>
<div class="card shadow-lg" style="width: 80%; margin: auto">
    <div class="card-header text-white" style="
      background-image: linear-gradient(to top right, #ace5ff, #46b3e6, #4d80e4, #2e279d);">
        <h5>Armar Archivo</h5>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="nombreArchivo">Ingrese el nombre del Archivo:</label>
                <input class="form-control" type="text" placeholder="1234.png" />
            </div>
            <div class="form-group">
                <!-- <input type="submit" value="Enviar" name="submit"> -->
                <label for="descrpcion">Descripcion: </label>
                <input class="form-control" type="text" name="descripcion" id="descrpcion" />
            </div>
            <div class="form-group">
                <div class="row align-items-center">
                    <label class="col-md-4" for="usuario">Usuario que lo carga: </label>

                    <select class="form-control mr-sm-2 col-md-3" name="usuario" id="usuario">
                        <option value=""></option>
                        <option value="admin">Admin</option>
                        <option value="visitante">Visitante</option>
                        <option value="elUsuario">Tú</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10 col-lg-10 text-center">
                    <div class="row"><label for="icono">Icono</label></div>
                    <div class="row">
                        <div class="form-check form-check-inline col-md-2">
                            <input class="form-check-input" type="checkbox" name="icono[]" id="imagen" value="imagen" />
                            <label class="form-check-label" for="">Imagen</label>
                        </div>
                        <div class="form-check form-check-inline col-md-2">
                            <input class="form-check-input" type="checkbox" name="icono[]" id="zip" value="zip" />
                            <label class="form-check-label" for="zip">Zip</label>
                        </div>
                        <div class="form-check form-check-inline col-md-2">
                            <input class="form-check-input" type="checkbox" name="icono[]" id="doc" value="doc" />
                            <label class="form-check-label" for="doc">Doc</label>
                        </div>
                        <div class="form-check form-check-inline col-md-2">
                            <input class="form-check-input" type="checkbox" name="icono[]" id="pdf" value="pdf" />
                            <label class="form-check-label" for="pdf">PDF</label>
                        </div>
                        <div class="form-check form-check-inline col-md-2">
                            <input class="form-check-input" type="checkbox" name="icono[]" id="xls" value="xls" />
                            <label class="form-check-label" for="xls">XLS</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="clave">Clave del Archivo: </label>
                <input class="form-control" type="password" name="clave" id="clave" />
            </div>

            <div class="form-group">
                <input class="btn btn-primary boton" type="submit" value="Enviar" />
            </div>
        </form>
    </div>
</div>

<?php
    include_once ("../estructura/pie.php");
?>
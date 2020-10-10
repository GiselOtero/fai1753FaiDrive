<?php
    include_once ("../estructura/cabecera.php");
    $nombre=($_GET['nomArch']);
?>
<div class="card shadow-lg" style="width: 80%; margin: auto">
    <div class="card-header text-white" style="
      background-image: linear-gradient(to top right, #ace5ff, #46b3e6, #4d80e4, #2e279d);">
        <h5>Armar Archivo</h5>
    </div>
    <div class="card-body">
        <form id="formArmar" name="formArmar" action="accion.php" method="post" data-toggle="validator">
            <div class="form-group">
                <input type="file" name="archivo" id="archivo" onchange = "obtenerNombre();">
            </div>
            <div class="form-group">
                <label for="nombreArchivo">Ingrese el nombre del Archivo:</label>
                <input class="form-control" name="nombreArchivo" id="nombreArchivo" type="text" placeholder="1234.png" value="<?php echo $nombre ?>" onchange="extencion();" required/>
                <!-- Validacion -->
                <div class="invalid-feedback">

                </div>
            </div>
            <div class="form-group">
                
                <label for="descripcion">Descripcion: </label>
               <!--  <input class="form-control" type="text" name="descripcion" id="descrpcion" /> -->
                <!-- editor -->
                <div class="row">
                    <div class="col-sm-8 col-md-10 col-lg-12 ">
                        <textarea id="editor" name="editor">
                            <p>Esta es una descripción genérica, si lo necesita la puede cambiar.</p>
                        </textarea>
                        
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                    </div>
                </div>

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
                            <input class="form-check-input" type="radio" name="icono" id="imagen" value="imagen" />
                            <i class="far fa-file-image"></i>
                            <label class="form-check-label" for="image"> Imagen</label>
                            
                        </div>
                        <div class="form-check form-check-inline col-md-2">
                            <input class="form-check-input" type="radio" name="icono" id="zip" value="zip" />
                            <i class="far fa-file-archive"></i>
                            <label class="form-check-label" for="zip"> Zip</label>
                        </div>
                        <div class="form-check form-check-inline col-md-2">
                            <input class="form-check-input" type="radio" name="icono" id="doc" value="doc" />
                            <i class="far fa-file-alt"></i>
                            <label class="form-check-label" for="doc"> Doc</label>
                        </div>
                        <div class="form-check form-check-inline col-md-2">
                            <input class="form-check-input" type="radio" name="icono" id="pdf" value="pdf" />
                            <i class="far fa-file-pdf"></i>
                            <label class="form-check-label" for="pdf"> PDF</label>
                        </div>
                        <div class="form-check form-check-inline col-md-2">
                            <input class="form-check-input" type="radio" name="icono" id="xls" value="xls" />
                            <i class="far fa-file-excel"></i>
                            <label class="form-check-label" for="xls"> XLS</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="clave">Clave del Archivo: </label>
                <input class="form-control" type="password" name="claveArchivo" id="claveArchivo" />
                <input type="hidden" id=clave name=clave value="0">
            </div>

            <div class="form-group">
                <input class="btn btn-primary boton" id="btn-enviar" type="submit" value="Enviar" />
            </div>
        </form>
    </div>
</div>

<?php
    include_once ("../estructura/pie.php");
?>
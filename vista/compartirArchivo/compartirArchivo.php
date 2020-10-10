<?php
    include_once ("../estructura/cabecera.php");
?>
<div class="card shadow-lg" style="width:80%;margin:auto;">
    <div class="card-header text-white"
        style="background-image: linear-gradient(to top right,#ACE5FF,#46B3E6,#4D80E4,#2E279D)">
        <h5>Compartir Archivo</h5>
    </div>
    <div class="card-body">
        <div>
            <h6>1234.png</h6>
        </div>
        <form action="accion.php" method="post">
            <div class="form-group">
                <label for="cantDiaas">Ingresar la cantidad de dias que se comparte:</label>
                <input class="form-control" type="text" name="cantDias" id="cantDias">
            </div>
            <div class="form-group">
                <label for="cantDescarga">Cantidad de descargas posibles:</label>
                <input class="form-control" type="text" name="cantDescarga" id="cantDescarga">
            </div>
            <div class="form-group">
                <script type="text/javascript">
                    function showContent() {
                        element = document.getElementById("clave");
                        check = document.getElementById("proteger");
                        if (check.checked) {
                            element.style.display = 'block';
                        }
                        else {
                            element.style.display = 'none';
                        }
                    }
                </script>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="proteger" id="proteger"
                        onchange="javascript:showContent()">
                    <label class="form-check-label" for="proteger">Proteger con contrase&ntilde;a: </label>
                </div>
                <div id="clave" style="display:none;">
                    <!-- oculto -->
                    <label for="claveProteccion">Ingresar contrase&ntilde;a:</label>
                    <input class="form-control" type="password" name="claveProteccion" id="claveProteccion" onkeyup="verificarClave(this);">
                    <div id="tipoClave">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input class="btn btn-outline-primary" type="button" value="Generar Hash" name="hash" onclick="stringToHash();">
                
                <div>
                <a href=""><span  id='mostrarHash'></span></a>
                    <!-- mostrar link generado-->
                    
                </div>
            </div>
            
            <!-- <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div> -->
        </form>
    </div>
</div>
<?php
    include_once ("../estructura/pie.php");
?>
<?php
    include_once ("../estructura/cabecera.php");
    include_once ("../../control/control_contenido.php");
?>


<div class="card shadow-lg" style="width: 80%; margin: auto">
    <div class="card-header text-white" style="
      background-image: linear-gradient(to top right, #ace5ff, #46b3e6, #4d80e4, #2e279d);">
        <h5>Contenido</h5>
    </div>
    <div class="card-body">
        <form id="formCrearCarpeta" action="" method="get" data-toggle="validator">
           
            <div class="form-group p-3 row">
                <div class="col-md-3"><input class="form-control" type="text" name="nombreCarpeta" id="nombreCarpeta" required></div>
                <div class="col-md-3"><input class="btn btn-primary" type="submit" value="Crear Carpeta" onchange="location.reload()" ></div>
            </div>
        </form>
        <div class="">
                <?php 
                    $datos = data_submitted();
                    $obj = new control_contenido();
                    $respuesta=$obj->crearCarpeta($datos);
                    echo "<h5>".$respuesta."</h5>";
                    /* $obj->mostrarContenido("../../archivos/"); */
                    $archivos=$obj->mostrarArchivos("../../archivos/");
                   /*  print_r($archivos); */
                    recorrer($archivos);
                    function recorrer($archivos){
                        
                        foreach ($archivos as $arch){
                            # code...
                            
                            if(is_array($arch)){
                                echo "<div class='border-bottom p-2'>";
                                echo "<i class='far fa-folder-open'></i>
                                ". key($archivos);
                                next($archivos);
                                echo "</div>";
                                echo "<div class='pl-4'>"; 
                                recorrer($arch);
                                echo "</div>";
                            }else{
                                echo "<div class='border-bottom p-2'>";
                                echo "". $arch;
                                echo "<div class='form-group col-md-10'> 
                                <a class='btn btn-outline-primary' href='../armarArchivo/armarArchivo.php?nomArch=$arch'>Armar Archivo</a>
                                <a class='btn btn-outline-success' href='../compartirArchivo/compartirArchivo.php?nomArch=$arch'>Compartir Archivo</a>
                                <a class='btn btn-outline-warning' href='../eliminarArchComp/eliminarArchivoCompartido.php?nomArch=$arch'>Dejar de Compartir</a>
                                <a  class='btn btn-outline-danger' href='../eliminarArchivo/eliminarArchivo.php?nomArch=$arch'>Eliminar</a></div>";
                                echo "</div>";
                            }
                           
                        }
                    }
                ?>
               
        </div>
    </div>
</div>
<?php
    include_once ("../estructura/pie.php");
?>
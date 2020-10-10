 <?php
    include_once ("../estructura/cabecera.php");
    include_once ("../../control/control_contenido.php");
?>
<div class="card shadow-lg" style="width: 80%; margin: auto">
    <div class="card-header text-white" style="
      background-image: linear-gradient(to top right, #ace5ff, #46b3e6, #4d80e4, #2e279d);"><h5>Compartidos</h5></div>
   <div class="card-body">
        <!-- <form action="">
            <a class='btn btn-outline-warning' href='../eliminarArchComp/eliminarArchivoCompartido.php'>Dejar de Compartir</a>
        </form> -->
        <?php
            $obj = new control_contenido();
            $archivos=$obj->mostrarArchivos("../../archivos/");
                   /*  print_r($archivos); */
            recorrer($archivos);
            function recorrer($archivos){
                        
                foreach ($archivos as $arch){
                            # code...
                            
                    if(is_array($arch)){
                        echo "<div class='border-bottom p-2'>";
                        echo "<i class='far fa-folder-open'></i>". key($archivos);
                        next($archivos);
                        echo "</div>";
                        echo "<div class='pl-4'>"; 
                            recorrer($arch);
                        echo "</div>";
                    }else{
                        echo "<div class='border-bottom p-2'>";
                        echo "". $arch;
                        echo "<div class='form-group col-md-10'> 
                                <a class='btn btn-outline-warning' href='../eliminarArchComp/eliminarArchivoCompartido.php?nomArch=$arch'>Dejar de Compartir</a>
                                </div>";
                        echo "</div>";
                    }
                           
                }
            }
        ?>
    </div>
</div>
<?php
    include_once ("../estructura/pie.php");
?>
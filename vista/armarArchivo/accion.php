<?php
    
    include_once ("../estructura/cabecera.php");
    include_once ("../../control/control_archivo.php");
?>
<div class="">
    <?php 
        $datos = data_submitted();
        
        if ($datos["clave"].value=="0") {
            # code...
            $s=array("accion"=>"alta");
        }else{
            $s=array("accion"=>"modificar");
        }
        
        $obj = new control_archivo();
        $respuesta = $obj->armarArchivo($datos);
    ?>


    <p>
        
        <?php echo $respuesta ?>
    </p>
</div>
<?php include_once ("../estructura/pie.php")?>
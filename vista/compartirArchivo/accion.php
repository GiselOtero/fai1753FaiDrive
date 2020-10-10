<?php
    include_once ("../estructura/cabecera.php");
    include_once ("../../control/control_archivo.php");
?>
<div class="">
    <?php 
        $datos = data_submitted();
        $obj = new control_archivo();
        $respuesta = $obj->compartirArchivo($datos);
    ?>


    <p>
        
        <?php echo $respuesta ?>
    </p>
</div>
<?php include_once ("../estructura/pie.php")?>
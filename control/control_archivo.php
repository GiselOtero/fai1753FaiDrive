<?php
    class control_archivo{
        public function armarArchivo($datos){
            # code...
            $nomArchivo=$datos["nombreArchivo"];
            $usuario=$datos["usuario"];
            $clave=$datos["claveArchivo"];  
            $descripcion=$datos["editor"];
            $respuesta= "<p>Nombre Archivo: ".$nomArchivo."</p><p>Usuario: ".$usuario."</p><p>Descripcion: ".$descripcion."</p>";
            
            return $respuesta;
        } 
        public function compartirArchivo($datos){
            # code...
               /*  $usuario=$datos["usuario"]; */
                $cantDias=$datos["cantDias"];
                $cantDescargas=$datos["cantDescarga"];
                $respuesta="<p>Cantidad de dias: ".$cantDias."</p><p>Cantidad de desacargas: ".$cantDescargas."</p>";
                return $respuesta;
        }
        public function eliminar($datos){
            # code...
            $usuario=$datos["usuario"];
            $motivo=$datos["motivoElim"];
            /* $permitido=true;
            if ($usuario==null || $motivo==null ) {
                # code...
                $permitido=false;
            } */
            $respuesta="<p>Usuario: ".$usuario."</p><p>Motivo de eliminacion: ".$motivo."</p>";
                return $respuesta;

        }
        public function dejarCompartir($datos){
            # code...
            $usuario=$datos["usuario"];
            $motivo=$datos["motivo"];
            /* $permitido=true;
            if ($usuario==null || $motivo==null ) {
                # code...
                $permitido=false;
            } */
            $respuesta="<p>Usuario: ".$usuario."</p><p>Motivo para dejar de Compartir: ".$motivo."</p>";
                return $respuesta;

        }
    }
?>
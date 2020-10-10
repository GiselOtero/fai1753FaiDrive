<?php

    class control_contenido{
        public function mostrarContenido($ruta){
            //mostrar contenido de forma recursiva
            # code...
            $res= array();
            if (is_dir($ruta)){
                // Abre un gestor de directorios para la ruta indicada
                $gestor = opendir($ruta);
                /* echo "<ul>"; */
        
                // Recorre todos los elementos del directorio
                while (($archivo = readdir($gestor)) !== false)  {
                        
                    $ruta_completa = $ruta . "/" . $archivo;
        
                    // Se muestran todos los archivos y carpetas excepto "." y ".."
                    if ($archivo != "." && $archivo != "..") {
                        // Si es un directorio se recorre recursivamente
                        if (is_dir($ruta_completa)) {
                            echo "<div class='border-bottom p-2'>" . $archivo; 
                            /* echo "<div class='form-group'>"; */
                             echo "</div>";
                            echo "<div class='pl-4'>"; 
                            $res[]=array_merge($res, $this->mostrarContenido($ruta_completa));echo"</div>";
                        } else {
                            
                            echo "<div class='border-bottom p-2'>" . $archivo; 
                            echo "<div class='form-group col-md-10'> 
                                    <a class='btn btn-outline-primary' href='../armarArchivo/armarArchivo.php?nombreArchivo<?php $archivo?>'>Armar Archivo</a>
                                    <a class='btn btn-outline-success' href='../compartirArchivo/compartirArchivo.php'>Compartir Archivo</a>
                                    <a class='btn btn-outline-warning' href='../eliminarArchComp/eliminarArchivoCompartido.php'>Dejar de Compartir</a>
                                    <a  class='btn btn-outline-danger' href='../eliminarArchivo/eliminarArchivo.php'>Eliminar</a></div>";
                             echo "</div>";
                            $res[]=$archivo;
                        }
                    }
                }
                
                // Cierra el gestor de directorios
                closedir($gestor);
                /* echo "</ul>"; */
            } else {
                echo "No es una ruta de directorio valida<br/>";
            }
            return $res;
        }

        /* borrador */
        public function mostrarArchivos($dir) {
  
            $result = array();
         
            $cdir = scandir($dir);
            foreach ($cdir as $key => $value)
            {
               if (!in_array($value,array(".","..")))
               {
                  if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
                  {
                     $result[$value] = $this->mostrarArchivos($dir . DIRECTORY_SEPARATOR . $value);
                  }
                  else
                  {
                     $result[] = $value;
                  }
               }
            }
           
            return $result;
         } 
        /* borrador */

        /* crear carpeta */
        public function crearCarpeta($datos){
            # code...
            $repuesta="";
            $carpeta=$datos["nombreCarpeta"];
            if($carpeta!=null){
                $ruta="../../archivos/";
                $rutaDirectorio=$ruta.$carpeta;
                //si el directorio no existe va a crear la carpeta caso contrario devuelve mensaje de error
                if (!is_dir($rutaDirectorio)) {
                    # code...
                    $crear = mkdir($rutaDirectorio, 077,true);
                    if ($crear) {
                        # code...
                        $repuesta= "El directorio ".$carpeta. " se ha creado correctamente";
                    }
                }else{
                    $repuesta= "El directorio ya existe";
                }
                return $repuesta;
            }
        }
    }
?>
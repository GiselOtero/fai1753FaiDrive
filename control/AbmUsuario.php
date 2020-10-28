<?php
class AbmUsuario{
    private function cargarObjeto($param){
        # code...
        $obj = null;
        
        if(array_key_exists('idusuario',$param)  and array_key_exists('usnombre',$param)  and array_key_exists('usapellido',$param)  and array_key_exists('uslogin',$param)  and array_key_exists('usclave',$param)  and array_key_exists('usactivo',$param) ){

            $obj = new Usuario();
            $obj->setear($param['idusuario'], $param['usnombre'],$param['usapellido'],$param['uslogin'],$param['usclave'],$param['usactivo']);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param){
        # code...
        if ( isset($param['idusuario']) ) {
            # code...
            $obj = new Usuario;
            $obj->setear($param['idusuario'],null);
        }
        return $obj;
    }

    private function seteadosCamposClaves($param){
        # code...
        $resp = false;
        if (isset($param['idusuario'])) {
            # code...
            $resp = true;
        }
        return $resp;
    }

    public function alta($param){
        
        $resp = false;
        $param['idusuario'] = null;
        $elObjtTabla = $this->cargarObjeto($param);
        // verEstructura($elObjtTabla);
        if ($elObjtTabla!=null and $elObjtTabla->insertar()){
            $resp = true;
        }
        return $resp;
    }

    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtUsuario = $this->cargarObjetoConClave($param);
            if ($elObjtUsuario!=null and $elObjtUsuario->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtUsuario = $this->cargarObjeto($param);
            if($elObjtUsuario!=null and $elObjtUsuario->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['idusuario']))
                $where.=" and idusuario = '".$param['idusuario']."'";
                /* */
            
            if (isset($param['usnombre'])){
                    # code...
                    $where.=" and usnombre = '".$param['usnombre']."'";
            }
            if (isset($param['usapellido'])){
                # code...
                $where.=" and usapellido = '".$param['usapellido']."'";
            }
           
            if  (isset($param['uslogin'])){
                 $where.=" and uslogin ='".$param['uslogin']."'";
            }

            
            /* if  (isset($param['usclave'])){
                 $where.=" and usclave ='".$param['usclave']."'";
            } */
        }
        $arreglo = Usuario::listar($where);  
        return $arreglo;        
    }
}
?>
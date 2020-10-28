<?php
class AbmUsuario{
    private function cargarObjeto($param){
        # code...
        $obj = null;
        
        if(array_key_exists('idarchivocargadoestado',$param)  and array_key_exists('idestadotipos',$param)  and array_key_exists('acedescripcion',$param)  and array_key_exists('idusuario',$param)  and array_key_exists('acefechaingreso',$param)  and array_key_exists('acefechafin',$param) and array_key_exists('idarchivocargado',$param) ){

            $obj = new Usuario();
            $obj->setear($param['idusuario'], $param['usnombre'],$param['usapellido'],$param['uslogin'],$param['usclave'],$param['usactivo']);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param){
        # code...
        if ( isset($param['idarchivocargadoestado']) ) {
            # code...
            $obj = new ArchivoCargadoEstado();
            $obj->setear($param['idarchivocargadoestado'],null);
        }
        return $obj;
    }

    private function seteadosCamposClaves($param){
        # code...
        $resp = false;
        if (isset($param['idarchivocargadoestado'])) {
            # code...
            $resp = true;
        }
        return $resp;
    }

    public function alta($param){
        
        $resp = false;
        $param['idarchivocargadoestado'] = null;
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
            $elObjtArchCargadoEst = $this->cargarObjetoConClave($param);
            if ($elObjtArchCargadoEst!=null and $elObjtArchCargadoEst->eliminar()){
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
            $elObjtArchCargadoEst = $this->cargarObjeto($param);
            if($elObjtArchCargadoEst!=null and $elObjtArchCargadoEst->modificar()){
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
            if  (isset($param['idarchivocargadoestado']))
                $where.=" and idarchivocargadoestado = '".$param['idarchivocargadoestado']."'";
                /* */
            
            if (isset($param['idestadotipos'])){
                    # code...
                    $where.=" and idestadotipos = '".$param['idestadotipos']."'";
            }
            if (isset($param['acedescripcion'])){
                # code...
                $where.=" and acedescripcion = '".$param['acedescripcion']."'";
            }
           
            if  (isset($param['idusuario'])){
                 $where.=" and idusuario ='".$param['idusuario']."'";
            }

            
            if  (isset($param['acefechaingreso'])){
                 $where.=" and acefechaingreso ='".$param['acefechaingreso']."'";
            }

            if  (isset($param['idarchivocargado'])){
                $where.=" and idarchivocargado ='".$param['idarchivocargado']."'";
           }
        }
        $arreglo = ArchivoCargadoEstado::listar($where);  
        return $arreglo;        
    }
}
?>
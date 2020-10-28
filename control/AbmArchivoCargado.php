<?php
class AbmArchivoCargado{
    private function cargarObjeto($param){
        # code...
        $obj = null;

        if (array_key_exists('acnombre',$param)  and array_key_exists('acdescripcion',$param)  and array_key_exists('acicono',$param)  and array_key_exists('idusuario',$param) and array_key_exists('aclinkacceso',$param) and array_key_exists('accantidaddescarga',$param) and array_key_exists('accantidadusada',$param) and array_key_exists('acfechainiciocompartir',$param) and array_key_exists('acefechafincompartir',$param)  and array_key_exists('acprotegidoclave',$param) ) {
            # code...

            /* acefechafincompartir modificar???????!!!!!! */
            $obj = new ArchivoCargado();
            $obj->setear($param['idarchivocargado'], $param['acnombre'],$param['acdescripcion'],$param['acicono'],$row['idusuario'],$param['aclinkacceso'],$param['accantidaddescarga'],$param['accantidadusada'],$param['acfechainiciocompartir'],$param['acefechafincompartir'],$param['acprotegidoclave']);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param){
        # code...
        if ( isset($param['idarchivocargado']) ) {
            # code...
            $obj = new Usuario;
            $obj->setear($param['idarchivocargado'],null);
        }
        return $obj;
    }

    private function seteadosCamposClaves($param){
        # code...
        $resp = false;
        if (isset($param['idarchivocargado'])) {
            # code...
            $resp = true;
        }
        return $resp;
    }

    public function alta($param){
        
        $resp = false;
        $param['idarchivocargado'] = null;
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
            $elObjtArchivoCargado = $this->cargarObjetoConClave($param);
            if ($elObjtArchivoCargado!=null and $elObjtArchivoCargado->eliminar()){
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
            $elObjtArchivoCargado = $this->cargarObjeto($param);
            if($elObjtArchivoCargado!=null and $elObjtArchivoCargado->modificar()){
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
            if  (isset($param['idarchivocargado']))
                $where.=" and idarchivocargado = '".$param['idarchivocargado']."'";
                /* */
            
            if (isset($param['acnombre'])){
                    # code...
                    $where.=" and acnombre = '".$param['acnombre']."'";
            }
            if (isset($param['acdescripcion'])){
                # code...
                $where.=" and acdescripcion = '".$param['acdescripcion']."'";
            }
           
            if  (isset($param['acicono'])){
                 $where.=" and acicono ='".$param['acicono']."'";
            }

            
            if  (isset($param['idusuario'])){
                 $where.=" and idusuario ='".$param['idusuario']."'";
            }

            if  (isset($param['aclinkacceso'])){
                $where.=" and aclinkacceso ='".$param['aclinkacceso']."'";
           }

           if  (isset($param['accantidaddescarga'])){
                $where.=" and accantidaddescarga ='".$param['accantidaddescarga']."'";
            }
            if  (isset($param['accantidadusada'])){
                $where.=" and accantidadusada ='".$param['accantidadusada']."'";
            }

            if  (isset($param['acfechainiciocompartir'])){
                $where.=" and acfechainiciocompartir ='".$param['acfechainiciocompartir']."'";
            }

            if  (isset($param['acefechafincompartir'])){
                $where.=" and acefechafincompartir ='".$param['acefechafincompartir']."'";
            }

            if  (isset($param['acprotegidoclave'])){
                $where.=" and acprotegidoclave ='".$param['acprotegidoclave']."'";
            }
        }
        $arreglo = ArchivoCargado::listar($where);  
        return $arreglo;        
    }
}
?>
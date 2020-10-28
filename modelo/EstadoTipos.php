<?php
class EstadoTipos{
    private $idestadotipos;
    private $etdescripcion;
    private $etactivo;
    private $mensajeoperacion;

    public function __construct(){
        # code...
        $this->idestadotipos ="";
        $this->etdescripcion ="";
        $this->etactivo ="";
        $this->mensajeoperacion = "";
    }
    public function  setear($idE,$descEstado,$act){
        # code...
        $this->setIdEstadoTipos($idE);
        $this->setEtDescripcion($descEstado);
        $this->setEtActivo($act);
    }
    /* get y set */
    public function getIdEstadoTipos(){
        # code...
        return $this->idestadotipos;
    }
    public function setIdEstadoTipos($idE){
        # code...
        $this->idestadotipos = $idE;
    }

    public function getEtDescripcion(){
        # code...
        return $this->etdescripcion;
    }
    public function setEtDescripcion($descEstado){
        # code...
        $this->etdescripcion = $descEstado;
    }

    public function getEtActivo(){
        # code...
        return $this->etactivo;
    }
    public function setEtActivo($act){
        # code...
        $this->etactivo = $act;
    }

    public function getmensajeoperacion(){
        # code...
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($valor){
        # code...
        $this->mensajeoperacion =$valor;
    }

    /*  */
    public function cargar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql="SELECT * FROM estadotipos WHERE  idestadotipos= ".$this->getIdEstadoTipos();
        if ($base->Iniciar()) {
            # code...
            $resp = $base->Ejecutar();
            if ($resp >-1) {
                # code...
                if ($resp>0) {
                    # code...
                    $row = $base->Registro();
                    $this->setear($row['idestadotipos'],$row['etdescripcion'],$row['etactivo']);
                }
            }            
        } else {
            # code...
            $this->setmensajeoperacion("EstadoTipos->listar: ".$base->getError());
        }
        return $resp;
    }
    
    public function insertar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO estadotipos(etdescripcion,etactivo) VALUES ('".$this->getEtDescripcion()."','".$this->getEtActivo()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdEstadoTipos($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("EstadoTipos->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("EstadoTipos->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        # code...
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE estadotipos SET etdescripcion='".$this->getEtDescripcion()."' , etactivo='".$this->getEtActivo()."' WHERE idestadotipos=".$this->getIdEstadoTipos();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("EstadoTipos->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("EstadoTipos->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM estadotipos WHERE idestadotipos =". $this->getIdEstadoTipos();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("EstadoTipos->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("EstadoTipos->eliminar: ".$base->getError());
        }
        return $resp;
    }


    public static function listar($parametro = ""){
        # code...
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM estadotipos";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res > -1){
            if($res > 0){
                
                while ($row = $base->Registro()){
                    $obj = new EstadoTipos();
                    $obj->setear($row['idestadotipos'],$row['etdescripcion'],$row['etactivo']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            //$this->setmensajeoperacion("EstadoTipos->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
}
?>
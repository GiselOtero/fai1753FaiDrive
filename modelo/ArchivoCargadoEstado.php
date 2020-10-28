<?php
class ArchivoCargadoEstado{
    private $idarchivocargadoestado;
    private $idestadotipos;
    private $acedescripcion;
    private $idusuario;
    private $acefechaingreso;
    private $acefechafin;
    private $idarchivocargado;
    private $mensajeoperacion;

    public function __construct(){
        # code...
        $this->idarchivocargadoestado = "";
        $this->idestadotipos = "";
        $this->acedescripcion = "";
        $this->idusuario = "";
        $this->acefechaingreso = "";
        $this->acefechafin = "";
        $this->idarchivocargado = "";
        $this->mensajeoperacion="";
    }

    public function setear($idArchivoEstado,$idE,$descArchi,$id,$fechaIngreso,$fechafin,$idArchivo){
        $this->setIdArchivoCargadoEstado($idArchivoEstado);
        $this->setIdEstadoTipos($idE);
        $this->setAceDescripcion($descArchi);
        $this->setIdUsuario($id);
        $this->setAceFechaIngreso($fechaIngreso);
        $this->setAceFechaFin($fechafin);
        $this->setIdArchivoCargado($idArchivo);
    }

    /* get y set */
    public function getIdArchivoCargadoEstado(){
        # code...
        return $this->idarchivocargadoestado;
    }
    public function setIdArchivoCargadoEstado($idArchivoEstado){
        # code...
        $this->idarchivocargadoestado = $idArchivoEstado;
    }

    public function getIdEstadoTipos(){
        # code...
        return $this->idestadotipos;
    }
    public function setIdEstadoTipos($idE){
        # code...
        $this->idestadotipos = $idE;
    }

    public function getAceDescripcion(){
        # code...
        return $this->acedescripcion;
    }
    public function setAceDescripcion($descArchi){
        # code...
        $this->acedescripcion = $descArchi;
    }

    public function getIdUsuario(){
        # code...
        return $this->idusuario;
    }
    public function setIdUsuario($id){
        # code...
        $this->idusuario = $id;
    }

    public function getAceFechaIngreso(){
        # code...
        return $this->acefechaingreso;
    }
    public function setAceFechaIngreso($fechaIngreso){
        # code...
        $this->acefechaingreso = $fechaIngreso;
    }

    public function getAceFechaFin(){
        # code...
        return $this->acefechafin;
    }
    public function setAceFechaFin($fechafin){
        # code...
        $this->acefechafin = $fechafin;
    }

    public function getIdArchivoCargado(){
        # code...
        return $this->idarchivocargado;
    }
    public function setIdArchivoCargado($idArchivo){
        # code...
        $this->idarchivocargado = $idArchivo;
    }

    public function getmensajeoperacion(){
        # code...
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($valor){
        # code...
        $this->mensajeoperacion = $valor;
    }

    /*  */
    public function cargar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql="SELECT * FROM archivocargadoestado WHERE  idarchivocargadoestado= ".$this->getIdArchivoCargadoEstado();
        if ($base->Iniciar()) {
            # code...
            $resp = $base->Ejecutar();
            if ($resp >-1) {
                # code...
                if ($resp>0) {
                    # code...
                    $row = $base->Registro();
                    $this->setear($row['idarchivocargadoestado'], $row['idestadotipos'],$row['acedescripcion'],$row['idusuario'],$row['acefechaingreso'],$row['acefechafin'],$row['idarchivocargado']);
                }
            }            
        } else {
            # code...
            $this->setmensajeoperacion("ArchivoCargadoEstado->listar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO archivocargadoestado(idestadotipos,acedescripcion,idusuario,acefechaingreso,acefechafin,idarchivocargado) VALUES('".$this->getIdEstadoTipos()."','".$this->getAceDescripcion()."','".$this->getIdUsuario()."','".$this->getAceFechaIngreso()."','".$this->getAceFechaFin()."','".$this->getIdArchivoCargado()."')";

        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdArchivoCargadoEstado($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("ArchivoCargadoEstado->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("ArchivoCargadoEstado->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql="UPDATE archivocargadoestado SET ideestadotipos = '".$this->getIdEstadoTipos()."', acedescripcion = '".$this->getAceDescripcion()."', idusuario = '".$this->getIdUsuario()."', acefechaingreso = '".$this->getAceFechaIngreso()."', acefechafin = '".$this->getAceFechaFin()."', idarchivocargado = '".$this->getIdArchivoCargado()."' WHERE idarchivocargadoestado=".$this->getIdArchivoCargadoEstado();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("ArchivoCargadoEstado->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("ArchivoCargadoEstado->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM archivocargadoestado WHERE idArchivoCargadoEstado =". $this->getIdArchivoCargadoEstado();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("ArchivoCargadoEstado->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("ArchivoCargadoEstado->eliminar: ".$base->getError());
        }
        return $resp;
    }
    public static function listar($parametro = ""){
        # code...
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM archivocargadoestado";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res > -1){
            if($res > 0){
                
                while ($row = $base->Registro()){
                    $obj = new ArchivoCargadoEstado();
                    $obj->setear($row['idarchivocargadoestado'], $row['idestadotipos'],$row['acedescripcion'],$row['idusuario'],$row['acefechaingreso'],$row['acefechafin'],$row['idarchivocargado']);
                }
               
            }
            
        } else {
            //$this->setmensajeoperacion("ArchivoCargadoEstado->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
}
?>
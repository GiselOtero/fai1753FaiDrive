<?php
class ArchivoCargado{
    private $idarchivocargado;
    private $acnombre;
    private $acdescripcion;
    private $acicono;
    private $idusuario;
    private $aclinkacceso;
    private $accantidaddescarga;
    private $accantidadusada;
    private $acfechainiciocompartir;
    private $acefechafincompartir;
    private $acprotegidoclave;
    private $mensajeoperacion;

    public function __construct(){
        # code...
        $this->idarchivocargado ="";
        $this->acnombre ="";
        $this->acdescripcion ="";
        $this->acicono ="";
        $this->idusuario ="";
        $this->aclinkacceso ="";
        $this->accantidaddescarga ="";
        $this->accantidadusada ="";
        $this->acfechainiciocompartir = "";;
        $this->acefechafincompartir = "";;
        $this->acprotegidoclave = "";
        $this->mensajeoperacion="";
    }

    public function setear($idArchivo,$nomArch,$descArchi,$icono,$usuario,$link,$cantDescarga,$cantUso,$fechaIni,$fechaFin,$clave){
        # code...
        $this->setIdArchivoCargado($idArchivo);
        $this->setAcnombre($nomArch);
        $this->setAcDescripcion($descArchi);
        $this->setAcIcono($icono);
        $this->setIdUsuario($usuario);
        $this->setAcLinkAcceso($link);
        $this->setAcCantidadDescarga($cantDescarga);
        $this->setAcCantidadUsada($cantUso);
        $this->setAcFechaInicioCompartir( $fechaIni) ;
        $this->setAceFechaFinCompartir($fechaFin);
        $this->setAcProtegidoClave($clave);
    }


    /* get */
    public function getIdArchivoCargado(){
        # code...
        return $this->idarchivocargado;
    }

    public function getAcnombre(){
        # code...
        return $this->acnombre;
    }

    public function getAcDescripcion(){
        # code...
        return $this->acdescripcion;
    }

    public function getAcIcono(){
        # code...
        return $this->acicono;
    }
    public function getIdUsuario(){
        # code...
        return $this->idusuario;
    }
    public function getAcLinkAcceso(){
        # code...
        return $this->aclinkacces;
    }
    public function getAcCantidadDescarga(){
        # code...
        return $this->accantidaddescarga;
    }
    public function getAcCantidadUsada(){
        # code...
        return $this->accantidadusada;
    }
    public function getAcFechaInicioCompartir(){
        # code...
        return $this->acfechainiciocompartir;
    }
    public function getAceFechaFinCompartir(){
        # code...
        return $this->acefechafincompartir;
    }
    public function getAcProtegidoClave(){
        # code...
        return $this->idarchivocargado;
    }
    
    public function getmensajeoperacion(){
        # code...
        return $this->mensajeoperacion;
    }


    /* set */
    public function setIdArchivoCargado($idArchivo){
        # code...
        $this->idarchivocargado=$idArchivo;
    }

    public function setAcnombre($nomArch){
        # code...
        $this->acnombre = $nomArch;
    }

    public function setAcDescripcion($descArchi){
        # code...
        $this->acdescripcion = $descArchi;
    }

    public function setAcIcono($icono){
        # code...
        $this->acicono = $icono;
    }
    public function setIdUsuario($usuario){
        # code...
        $this->idusuario = $usuario;
    }
    public function setAcLinkAcceso($link){
        # code...
        $this->aclinkacces = $link;
    }
    public function setAcCantidadDescarga($cantDescarga){
        # code...
        $this->accantidaddescarga = $cantDescarga;
    }
    public function setAcCantidadUsada($cantUso){
        # code...
        $this->accantidadusada = $cantUso;
    }
    public function setAcFechaInicioCompartir( $fechaIni){
        # code...
        $this->acfechainiciocompartir = $fechaIni ;
    }
    public function setAceFechaFinCompartir($fechaFin){
        # code...
        $this->acefechafincompartir = $fechaFin;
    }
    public function setAcProtegidoClave($clave){
        # code...
        $this->idarchivocargado = $clave;
    }
    
    public function setmensajeoperacion($valor){
        # code...
        $this->mensajeoperacion = $valor;
    }


    /*  */
    public function cargar(){
        # code...
        $res = false;
        $base = new BaseDatos();
        $sql="SELECT * FROM archivocargado WHERE  idarchivocargado= ".$this->getIdArchivoCargado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idarchivocargado'], $row['acnombre'],$row['acdescripcion'],$row['acicono'],$row['idusuario'],$row['aclinkacceso'],$row['accantidaddescarga'],$row['accantidadusada'],$row['acfechainiciocompartir'],$row['acefechafincompartir'],$row['acprotegidoclave']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("ArchivoCargado->listar: ".$base->getError());
        }
        return $resp;        
    }
    
    public function insertar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO archivo(acnombre,acdescripcion,acicono,idusuario,aclinkacceso,accantidaddescarga,accantidadusada,acfechainiciocompartir,acefechafincompartir,acprotegidoclave) VALUES ('".$this->getAcnombre()."','".$this->getAcDescripcion()."','".$this->getAcIcono()."','".$this->getAcnombre()."','".$this->getIdUsuario()."','".$this->getAcnombre()."','".$this->getAcLinkAcceso()."','".$this->getAcCantidadDescarga()."','".$this->getAcCantidadUsada()."','".$this->getAcFechaInicioCompartir()."','".$this->getAceFechaFinCompartir()."','".$this->getAcProtegidoClave()."')";
        if ($base->Iniciar()) {
            # code...
            if ($idArchivo = $base->Ejecutar($sql)) {
                # code...
                $this->setIdArchivoCargado($idArchivo);
                $resp = true;
            } else {
                # code...
                $this->setmensajeoperacion("ArchivoCargado->insertar: ".$base->getError());
            }
            
        } else {
            # code...
            $this->setmensajeoperacion("ArchivoCargado->insertar: ".$base->getError());
        }
        return $resp;
        
    }

    public function modificar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE archivocargando SET acnombre = '".$this->getAcnombre()."', acdescripcion = '".$this->getAcDescripcion()."', acicono = '".$this->acicono()."', idusuario = '".$this->getIdUsuario()."', aclinkacceso = '".$this->aclinkacceso()."', accantidaddescarga = '".$this->accantidaddescarga()."', accantidadusada = '".$this->getAcCantidadUsada()."', acfechainiciocompartir = '".$this->getAcFechaInicioCompartir()."', acefechafinccompartir = '".$this->getAceFechaFinCompartir()."', acprotegidoclave = '".$this->acprotegidoclave()."',  WHERE idarchivocargado = ".$this->getIdArchivoCargado();
        if ($base->Iniciar()) {
            # code...
            if ($base->Ejecutar()) {
                # code...
                $resp = true;
            } else {
                # code...
                $this->setmensajeoperacion("ArchivoCargado->modificar: ".$base->getError());
            }
            
        } else {
            # code...
            $this->setmensajeoperacion("ArchivoCargado->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM archivocargado WHERE idarchivocargado =". $this->getIdArchivoCargado();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("ArchivoCargado->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("ArchivoCargado->eliminar: ".$base->getError());
        }
        return $resp;
    }
    public static function listar($parametro = ""){
        # code...
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM archivocargado";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res > -1){
            if($res > 0){
                
                while ($row = $base->Registro()){
                    $obj = new ArchivoCargado();
                    $obj->setear($row['idarchivocargado'], $row['acnombre'],$row['acdescripcion'],$row['acicono'],$row['idusuario'],$row['aclinkacceso'],$row['accantidaddescarga'],$row['accantidadusada'],$row['acfechainiciocompartir'],$row['acefechafincompartir'],$row['acprotegidoclave']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            //$this->setmensajeoperacion("ArchivoCargado->listar: ".$base->getError());
        }
 
        return $arreglo;
    }

    
}

?>
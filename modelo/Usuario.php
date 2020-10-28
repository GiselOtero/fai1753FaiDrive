<?php
class Usuario{
    private $idusuario;
    private $usnombre;
    private $usapellido;
    private $uslogin;
    private $usclave;
    private $usactivo;
    private $mensajeoperacion;

    public function __construct(){
        $this->idusuario = "";
        $this->usnombre = "";
        $this->usapellido = "";
        $this->uslogin = "";
        $this->usclave= "";
        $this->usactivo = "";
        $this->mensajeoperacion= "";
    }
    public function setear($id,$nomUsuario,$apellidoUs,$login,$usclave,$act){
        $this->setIdUsuario($id);
        $this->setUsNombre($nomUsuario);
        $this->setUsApellido( $apellidoUs);
        $this->setUsLogin ($login);
        $this->setUsClave($claveUsuario);
        $this->setUsActivo($act);
    }
    /* get */
    public function getIdUsuario(){
        # code...
        return $this->idusuario;
    }
    public function setIdUsuario($id){
        # code...
        $this->idusuario = $id;
    }

    public function getUsNombre(){
        # code...
        return $this->usnombre;
    }
    public function setUsNombre($nomUsuario){
        # code...
        $this->usnombre = $nomUsuario;
    }

    public function getUsApellido(){
        # code...
        return $this->usapellido;
    }
    public function setUsApellido($apellidoUs){
        # code...
        $this->usapellido = $apellidoUs;
    }

    public function getUsLogin(){
        # code...
        return $this->uslogin;
    }
    public function setUsLogin($login){
        # code...
        $this->uslogin = $login;
    }
    public function getUsClave(){
        # code...
        return $this->usclave;
    }
    public function setUsClave($claveUsuario){
        # code...
        $this->usclave = $claveUsuario;
    }
    public function getUsActivo(){
        # code...
        return $this->usactivo;
    }
    public function setUsActivo($act){
        # code...
        $this->usactivo = $act;
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
        $res = false;
        $base = new BaseDatos();
        $sql="SELECT * FROM usuario WHERE  idusuario= ".$this->getIdUsuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res > -1){
                if($res > 0){
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'],$row['usapellido'],$row['uslogin'],$row['usclave'],$row['usactivo']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Usuario->listar: ".$base->getError());
        }
        return $res;        
    }

    public function insertar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO usuario(usnombre,usapellido,uslogin,usclave,usactivo) VALUES ('".$this->getUsNombre()."','".$this->getUsApellido()."','".$this->getUsLogin()."','".$this->getUsClave()."','".$this->getUsActivo()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdUsuario($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        # code...
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE usuario SET usnombre='".$this->getUsNombre()."', usapellido='".$this->getUsApellido()."', uslogin='".$this->getUsLogin()."', usclave='".$this->getUsClave()."' , usactivo='".$this->getUsActivo()."' WHERE idusuario=".$this->getIdUsuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        # code...
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM usuario WHERE idusuario =". $this->getIdUsuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Usuario->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->eliminar: ".$base->getError());
        }
        return $resp;
    }


    public static function listar($parametro = ""){
        # code...
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res > -1){
            if($res > 0){
                
                while ($row = $base->Registro()){
                    $obj = new Usuario();
                    $obj->setear($row['idusuario'], $row['usnombre'],$row['usapellido'],$row['uslogin'],$row['usclave'],$row['usactivo']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            //$this->setmensajeoperacion("Usuario->listar: ".$base->getError());
        }
 
        return $arreglo;
    }

}
?>
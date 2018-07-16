<?php

class Conectar{

    public function Conexion(){
        try{
            $options = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" );
            $cn = new PDO("mysql:host=localhost;dbname=TiendaOnline","root","",$options);
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e){
            die("Error al conectar con la base de datos: ".$e->getMesage());
            echo "El error se produjo: ".$e->getLine();
        }
        return $cn;
    }
}

?>
<?php
class BD
{
    public static $instance = null; //esto almacena la conexion
    public static function getInstance()
    {
        //controla los errores que se puedan presentar
        if (!isset(self::$instance)) {
            $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=ecolac', 'root', '', $opciones);
            
        }
        return self::$instance;
    }

    
    
}
?>
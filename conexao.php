<?php
class Conn {    
    public static $host = "localhost";
    public static $usuario = "root";
    public static $senha = "lcs_160803";
    public static $banco = "pdoteste";
    private static $Connect = null;
    
    private static function Conectar() {
        try {
            if(self::$Connect == null):
                self::$Connect = new PDO('mysql:host='.self::$host.';dbname='.self::$banco, self::$usuario, self::$senha,  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            endif;          
        } catch (Exception $ex) {
            echo 'Mensagem: ' . $ex->getMessage();
            die;
        }       
        return self::$Connect;
    }
    
    public function getConn() {
        return self::Conectar();
    }
    
}

?>

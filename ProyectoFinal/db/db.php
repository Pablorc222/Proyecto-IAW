<?php
/**
 * Clase que implementa un método estático para realizar la conexión a la BBDD. Obtiene los datos de conexión
 * de variables de entorno existentes en el fichero .env.
 */
class Database {

    private $db=null;
    
    /**
     * Método que inicia la conexión y la devuelve.
     */
    public static function connect ()
    {
        $host='mariadb';
        $dbname=getenv ('database');

        try {
            $dsn = 'mysql:host='.$host.";dbname=".$dbname.";charset=UTF8";;
            $dbh = new PDO($dsn, getenv('root'), getenv ('changepassword'));
            $dbh->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;

        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

}
?>
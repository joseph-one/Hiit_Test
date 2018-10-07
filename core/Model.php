<?php
class Model{

    static $connections = array();

    public function __construct()
    {
        //Mettre un controle pour ne pas charger la cnx 2 fois
        $conf = Connexion::$connect;
        if(isset(Model::$connections)){
            return true;
        }
        try{
            $db= new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'], $conf['user'], $conf['pass']);
            Model::$connections = $db;
        }catch (PDOException $e){
            die($e->getMessage());
        }

    }


}
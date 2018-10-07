<?php

Class Authentification {

    private $db;

    function __construct()
    {
        global $db;
        $this->db = $db;
    }


    function validLogin ($user,$pass){

        if($statement = $this->db->prepare("SELECT * FROM users WHERE login = ? AND pass = ?")){
            $statement->bindParam("s",$user,md5($pass));
            $statement->execute();

            if($statement->num_rows > 0){
                $statement->close();
                return TRUE;
            }else{
                $statement->close();
                return FALSE;
            }
        }else{
            die("ERREUR: PROB DANS LA CNX");
        }

    }

    function checkUserState(){
        if (isset($_SESSION['loggedin'])){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function logout(){
        session_destroy();
        session_start();
    }


}
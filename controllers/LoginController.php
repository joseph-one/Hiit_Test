<?php
class LoginController extends Controller {

    function index(){
        echo 'ici la page index';
    }


    function login(){
        $this->set(array(
            'text'=>'Bienvenu sur notre systeme de chat',
            'nom' =>'Mr Youssef'
        ));

        $this->render('login');
    }



}
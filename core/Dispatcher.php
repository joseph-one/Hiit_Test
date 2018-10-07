<?php

class Dispatcher{

    var $request;

    function __construct()
    {
        $this->request = new Request();


        RouterR::parser($this->request->url,$this->request);
        $controller = $this->loadController();


        if(!in_array($this->request->action,get_class_methods($controller))){
            $this->errors('Le Controlleur ( '.$this->request->controller.' ) ne contient pas la methode ('.$this->request->action.')');
        }

        call_user_func_array(array($controller,$this->request->action),$this->request->params);


        //rendre la view
        $controller->render($this->request->action);


    }

    function loadController(){
        $name = ucfirst($this->request->controller).'Controller';
        $file = ROOT.DS.'controllers'.DS.$name.'.php';
        require $file;
        return new $name($this->request);

    }

    //gestion des erreurs dans les urls
    public function errors($message){
        $contoller=new Controller($this->request);
        $contoller->set('message',$message);
        $contoller->render('/erreur/404');
        die();

    }

}
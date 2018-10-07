<?php
class Controller{

    public $request;
    private $vars = array();
    private $is_render = false;

    function __construct($request)
    {
        $this->request=$request;
    }

    public function render($view){

        if($this->is_render){return false;}

        extract($this->vars);

        //cet condition pour les views des erreus
        if (strpos($view,'/')===0){
            $view = ROOT.DS.'views'.DS.$view.'.php';
        }else{
            $view = ROOT.DS.'views'.DS.$this->request->controller.DS.$view.'.php';
        }
        ob_start();
        require($view);
        $contenu_pour_layout = ob_get_clean();
        require ROOT.DS.'views'.DS.'layout'.DS.'mainLayout.php';
        $this->is_render= true;

    }




    //Pour passer les varriable au views
    public function set($key,$value=null){
        if(is_array($key)){
            $this->vars += $key;
        }else{
            $this->vars[$key]=$value;
        }
    }



    //La fonction pour loader un model
    function loadModel ($name){
        $file = ROOT.DS.'models'.DS.$name.'.php';
        require_once($file);

        if(!isset($this->name)){
            $this->$name = new $name();
        }
    }


}
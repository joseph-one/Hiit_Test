<?php
class RouterR{



    //pour le decoupage de l'url taper par l'user (Controller + Action + Params)
    static function parser($url,$request){
        $url = trim($url,'/');


        $params = explode('/',$url);

        $request->controller = $params[0];
        $request->action = isset($params[1]) ? $params[1] : 'index';
        $request->params = array_slice($params,2);



        return true;
    }

    static function url($url){
        return $url;
    }

}
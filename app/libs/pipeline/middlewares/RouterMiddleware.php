<?php

namespace app\libs\pipeline\middlewares;

use app\libs\pipeline\middlewares\base\Middleware;
use app\libs\pipeline\middlewares\base\InterfaceMiddleware;
use app\libs\http\Response;
use app\libs\http\Request;


final class RouterMiddleWare extends Middleware implements InterfaceMiddleware{
    public function __construct(){
        parent::__construct();
    }

    public function process(Request $request, Response $response){
        $controller = ucfirts($request->getController())."Controller";
        $controller = "app\\core\\controllers\\" . $controller;

        if(!class_exists($controller) || !method_exists($controller, $request->getAction())){
            throw new \Exception("Controlador y acción incorrectos ({$request->getController()} => {$request->getAction()})");
        }
        
        //Se invoca el endpoint
        call_user_func_array(
            array(new $controller, $request->getAction()),
            array($request, $response)
            );
    }
}
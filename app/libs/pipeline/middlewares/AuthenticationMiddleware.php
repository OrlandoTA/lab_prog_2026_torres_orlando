<?php

namespace app\libs\pipeline\middlewares;

use app\libs\pipeline\middlewares\base\Middleware;
use app\libs\pipeline\middlewares\base\InterfaceMiddleware;
use app\libs\http\Request;
use app\libs\http\Response;

/**
 * Descripción de AuthenticationMiddleware
 *
 * @author Ing. Jose Rasjido
 */

final class AuthenticationMiddleware extends Middleware implements InterfaceMiddleware {
    
    public function __construct() {
        parent::__construct();
    }

    public function process(Request $request, Response $response): void {
        session_start();

    // Rutas públicas (no requieren login)
    $publicRoutes = [
        'authentication/index',
        'authentication/login',
        'user/create',
        'user/save'
    ];

    $currentRoute = $request->getController() . '/' . $request->getAction();

    // Si es una ruta pública, continuar sin validar sesión
    if(in_array($currentRoute, $publicRoutes)){
        $this->processNext($request, $response);
        return;
    }

    // Validación normal de sesión
    if (isset($_SESSION["token"]) && $_SESSION["token"] === APP_TOKEN) {

        if($_SESSION["motivoCierreSesion"] != SESSION_FINISHED){
            $request->setController(APP_AUTHENTICATION_CONTROLLER);
            $request->setAction(APP_LOGOUT_ACTION);
        }

    } else {

        $request->setController(APP_AUTHENTICATION_CONTROLLER);

        if($request->getAction() != APP_LOGIN_ACTION){
            $request->setAction(APP_DEFAULT_ACTION);
        }
    }

    $this->processNext($request, $response);
     /*   
        session_start();
    
        if (isset($_SESSION["token"]) && ($_SESSION["token"] === APP_TOKEN)) {
            if($_SESSION["motivoCierreSesion"] != 0){
                $request->setController(APP_AUTHENTICATION_CONTROLLER);
                $request->setAction(APP_LOGOUT_ACTION);
            }
        }
        else{
            $request->setController(APP_AUTHENTICATION_CONTROLLER);
            if($request->getAction() != APP_LOGIN_ACTION){
                $request->setAction(APP_DEFAULT_ACTION);
            }
        }

        $this->processNext($request, $response);
        */
    }

    
}
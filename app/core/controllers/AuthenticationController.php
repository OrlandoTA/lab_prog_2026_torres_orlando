<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\services\AuthenticationService;
use app\libs\http\Request;
use app\libs\http\Response;

class AuthenticationController extends BaseController{
    public function __construct(){

    }


    public function index(Request $request, Response $response){
        require_once APP_FILE_LOGIN;
    }

    public function login(Request $request, Response $response){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $serive = new AuthenticationService();
        $serive->login($user,$pass);
        $request->setController(APP_DEFAULT_CONTROLLER);
        $request->setAction(APP_DEFAULT_ACTION);
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function logout(Request $request, Response $response){
        $service = new AuthenticationService();
        $serive->logout();
        require_once(APP_FILE_LOGIN);
    }
}
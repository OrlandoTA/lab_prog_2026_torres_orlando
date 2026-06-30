<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\libs\http\Request;
use app\libs\http\Response;

class HomeController extends BaseController{
    
    public function __construct()
    {

    }

    public function index(Request $request, Response $response){
        $this->setScripts(['app/js/home/index.js']);
$this->requireProfile(['Administrador', 'Operador']);

        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }


}
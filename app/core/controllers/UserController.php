<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\core\models\dto\UserDto;
use app\core\services\UserService;
use app\libs\http\Request;
use app\libs\http\Response;

class UserController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, Response $response){
        array_push($this->modules, "app/js/user/index.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function create(Request $request, Response $response){
        array_push($this->modules, "app/js/user/create.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function save(Request $request, Response $response){
        var_dump($request->getDataFromInput());
exit;
        /*
        $data = $request->getDataFromInput();
        $dto = new UserDto($data);
        $service = new UserService();
        $service->save($dto);
        $response->setMessage("Se registró el usuario con éxito.");
        $response->send();*/
    }

    public function edit(Request $request, Response $response){
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function update(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new UserDto($data);
        $service = new UserService();
        $service->update($dto);
        $response->setMessage('Se actualizo el usuario con exito.');
        $response->send(); 
    }

    public function delete(Request $request, Response $response){
        $id = $request->getId();
        $dto = new UserDto([
            'id' =>$id,
        ]);
        $service = new UserService();
        $service->delete($dto);
        $response->setMessage('Se elimino el usuario con exito.');
        $response->send();
    }

    public function list(Request $request, Response $response){
        $service = new UserService();
        $result = $service->list($request->getDataFromInput());
        $response->setData($result);
        $response->send();
    }
    
    public function suggestive(Request $request, Response $response){

    }

}
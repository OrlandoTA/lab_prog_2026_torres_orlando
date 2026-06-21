<?php

namespace app\core\controllers;

use app\core\controllers\base\BaseController;
use app\libs\http\Request;
use app\libs\http\Response;

class CategoryController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, Response $response){
       // array_push($this->modules, "app/js/Category/index.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function create(Request $request, Response $response){
       // array_push($this->modules, "app/js/Category/create.js");
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function save(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new CategoryDto($data);
        $service = new CategoryService();
        $service->save($dto);
        $response->setMessage("Se registró la categoria con éxito.");
        $response->send();
    }

    public function edit(Request $request, Response $response){
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function update(Request $request, Response $response){
        $data = $request->getDataFromInput();
        $dto = new CategoryDto($data);
        $service = new CategoryService();
        $service->update($dto);
        $response->setMessage('Se actualizo la categoria con exito.');
        $response->send(); 
    }

    public function delete(Request $request, Response $response){
        $id = $request->getId();
        $dto = new CategoryDto([
            'id' =>$id,
        ]);
        $service = new CategoryService();
        $service->delete($dto);
        $response->setMessage('Se elimino la categoria con exito.');
        $response->send();
    }

    public function list(Request $request, Response $response){
        $service = new CategoryService();
        $result = $service->list($request->getDataFromInput());
        $response->setData($result);
        $response->send();
    }
    

}
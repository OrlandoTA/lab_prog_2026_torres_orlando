<?php

namespace app\core\controllers;

use app\core\models\dao\CategoryProductDao;
use app\core\controllers\base\BaseController;
use app\core\services\CategoryService;
use app\core\models\dao\CategoryDao;
use app\core\models\dto\ItemDto;
use app\core\services\ItemService;
use app\libs\http\Request;
use app\libs\http\Response;

class ItemController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, Response $response){
        array_push($this->modules, "app/js/item/index.js");
        
        $this->breadcrumb =  [
            [
                'title' => 'Inicio',
                'icono' => 'home-outline',
                'class' => 'firts',
                'url' => APP_URL . '?controller=home&action=index',
            ],
            [
                'class' => 'last active',
                'title' => 'Gestión de productos',
            ] 
        ];
     $this->requireProfile(['Administrador']);
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function create(Request $request, Response $response){
        
        array_push($this->modules, "app/js/item/create.js");
        $this->breadcrumb = [
            [
                'title' => 'Inicio',
                'icono' => 'home-outline',
                'class' => 'firts',
                'url' => APP_URL . '?controller=home&action=index'
            ],
            [
                'title' => 'Productos',
                'icono'=> 'basket-outline',
                'url' => APP_URL . '?controller=item&action=index'
            ],
            [
                'class' => 'last active',
                'title' => 'Crear producto'
            ]
        ];

        //Se utiliza para mostrar las categorias dinamicamente en la vista
        $categoryService = new CategoryService();
        $this->categorias = $categoryService->list([]);
        
        $this->requireProfile(['Administrador']);


        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function save(Request $request, Response $response){
        $data = $request->getDataFromInput();
 
        $dto = new ItemDto($data);
        $service = new ItemService();
        $service->save($dto);

        $response->send();
    }

    public function edit(Request $request, Response $response){
         
         array_push($this->modules, "app/js/item/edit.js");
        $this->breadcrumb = [
            [
                'title' => 'Inicio',
                'icono' => 'home-outline',
                'class' => 'firts',
                'url' => APP_URL . '?controller=home&action=index'
            ],
            [
                'title' => 'Productos',
                'url' => APP_URL . '?controller=item&action=index'
            ],
            [
            'class' => 'last active',
                'title' => 'Editar producto'
            ]
        ];

        $categoryService = new CategoryService();
        $this->categorias = $categoryService->list([]);
        
        $this->requireProfile(['Administrador']);

        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function update(Request $request, Response $response){
        $data = $request->getDataFromInput();

        $dto = new ItemDto($data);
        $service = new ItemService();
        $service->update($dto);

        $response->send(); 

    }

    public function load(Request $request, Response $response){
        $data = $request->getDataFromInput();

        $dto = new ItemDto(['id' => $data['id']]);
        $service = new ItemService();

        $response->setData($service->load($dto)) ;

        $response->send();
    }

    public function delete(Request $request, Response $response){
        $data = $request->getDataFromInput();

        $dto = new ItemDto([
            'id' =>$data['id'],
        ]);
        $service = new ItemService();

        $service->delete($dto);

        $response->send();
    }

    public function list(Request $request, Response $response){
        $service = new ItemService();
        $result = $service->list($request->getDataFromInput());
        $response->setData($result);
        $response->send();
    }
    
    public function suggestive(Request $request, Response $response){
        // $service = new MaterialService($request->getController());
        // $data = $service->suggestive($request->getDataFromInput());
        // $response->setResult($data);
        // $response->send();
    }

}
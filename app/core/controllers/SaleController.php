<?php

namespace app\core\controllers;

use app\core\models\dto\SaleDto;
use app\core\services\SaleService;
use app\core\controllers\base\BaseController;
use app\libs\http\Request;
use app\libs\http\Response;

class SaleController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, Response $response){
         
        array_push($this->modules, "app/js/sale/index.js");
         $this->breadcrumb = [
            [
                'title' => 'Inicio',
                'icono' => 'home-outline',
                'class' => 'firts',
                'url' => APP_URL . '?controller=home&action=index',
                
            ],
            [
                'class' => 'last active',
                'title' => 'Gestion de Ventas',
                'icono' => 'wallet-outline',
            ],
           
        ];
    $this->requireProfile(['Administrador']);
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }
    
    public function create(Request $request, Response $response){
        
        array_push($this->modules, "app/js/sale/create.js");

         $this->breadcrumb = [
        [
            'title' => 'Inicio',
            'url' => APP_URL . '?controller=home&action=index',
            'icono' => 'home-outline',
            'class' => 'firts',
        ],
        [
            'title' => 'Gestion de Venta',
            'url' => APP_URL . '?controller=sale&action=index',
            'icono' => 'wallet-outline',
        ],
        [
            'class' => 'last active',
            'title' => 'Agregar Venta'
        ]
    ];
     $this->requireProfile(['Administrador']);
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }
    
    public function save(Request $request, Response $response){
 
        $data = $request->getDataFromInput();
        $dto = new SaleDto($data);
        $service = new SaleService();
        $service->save($dto);

        $response->send();
    }

    public function load(Request $request, Response $response){
        $data = $request->getDataFromInput();

        $dto = new SaleDto(['id' => $data['id']]);
        $service = new SaleService();

        $response->setData($service->load($dto)) ;

        $response->send();
    }


    public function edit(Request $request, Response $response){
        array_push($this->modules, "app/js/sale/edit.js");
        $this->breadcrumb = [
            [
                'title' => 'Inicio',
                'url' => APP_URL . '?controller=home&action=index'
            ],
            [
                'title' => 'Gestion de ventas',
                'url' => APP_URL . '?controller=sale&action=index'
            ],
            [
                'title' => 'Editar venta'
            ]
        ];

        $this->requireProfile(['Administrador']);
        
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function update(Request $request, Response $response){
        $data = $request->getDataFromInput();
 
        $dto = new SaleDto($data);
       
        $service = new SaleService();
        $service->update($dto);
   
        $response->send(); 
    }

    public function delete(Request $request, Response $response){
        $data = $request->getDataFromInput();

        $dto = new SaleDto([
            'id' =>$data['id'],
        ]);
        $service = new SaleService();
        $service->delete($dto);

        $response->send();
    }

    public function list(Request $request, Response $response){
        $service = new SaleService();
        $result = $service->list($request->getDataFromInput());
        $response->setData($result);
        $response->send();
    }
    


}
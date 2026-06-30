<?php

namespace app\core\controllers;

use app\core\models\dto\CustomerDto;
use app\core\services\CustomerService;
use app\core\controllers\base\BaseController;
use app\libs\http\Request;
use app\libs\http\Response;

class CustomerController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, Response $response){

        array_push($this->modules, "app/js/customer/index.js");
         $this->breadcrumb = [
            [
                'title' => 'Inicio',
                'icono' => 'home-outline',
                'class' => 'firts',
                'url' => APP_URL . '?controller=home&action=index',
                
            ],
            [
                'class' => 'last active',
                'title' => 'Gestion de clientes',
                'icono' => 'wallet-outline',
            ],
           
        ];

        $this->requireProfile(['Administrador', 'Operador']);


        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }
    
    public function create(Request $request, Response $response){

        array_push($this->modules, "app/js/customer/create.js");

         $this->breadcrumb = [
        [
            'title' => 'Inicio',
            'url' => APP_URL . '?controller=home&action=index',
            'icono' => 'home-outline',
            'class' => 'firts',
        ],
        [
            'title' => 'Gestion de clientes',
            'url' => APP_URL . '?controller=customer&action=index',
            'icono' => 'wallet-outline',
        ],
        [
            'class' => 'last active',
            'title' => 'Agregar cliente'
        ]
    ];
 $this->requireProfile(['Administrador', 'Operador']);

        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }
    
    public function save(Request $request, Response $response){
 
        $data = $request->getDataFromInput();
        $dto = new CustomerDto($data);
        $service = new CustomerService();
        $service->save($dto);

        $response->send();
    }

    public function load(Request $request, Response $response){
        $data = $request->getDataFromInput();

        $dto = new CustomerDto(['id' => $data['id']]);
        $service = new CustomerService();

        $response->setData($service->load($dto)) ;

        $response->send();
    }


    public function edit(Request $request, Response $response){

        array_push($this->modules, "app/js/customer/edit.js");
        $this->breadcrumb = [
            [
                'title' => 'Inicio',
                'url' => APP_URL . '?controller=home&action=index'
            ],
            [
                'title' => 'Gestion de clientes',
                'url' => APP_URL . '?controller=customer&action=index'
            ],
            [
                'title' => 'Editar cliente'
            ]
        ];
$this->requireProfile(['Administrador', 'Operador']);

        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function update(Request $request, Response $response){
        $data = $request->getDataFromInput();
       $dto = new CustomerDto($data);
        $service = new CustomerService();
        $service->update($dto);
   
        $response->send(); 
    }

    public function delete(Request $request, Response $response){
        $data = $request->getDataFromInput();

        $dto = new CustomerDto([
            'id' =>$data['id'],
        ]);
        $service = new CustomerService();
        $service->delete($dto);

        $response->send();
    }

    public function list(Request $request, Response $response){
        $service = new CustomerService();
        $result = $service->list($request->getDataFromInput());
        $response->setData($result);
        $response->send();
    }


}
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
        
        $this->breadcrumb = [
            [
                'title' => 'Inicio',
                'icono' => 'home-outline',
                'class' => 'firts',
                'url' => APP_URL . '?controller=home&action=index',
                
            ],
            [
                'class' => 'last active',
                'title' => 'Gestion de Usuarios',
                'icono' => 'people-outline',
            ],
           
        ];

        $service = new UserService();
        


        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function create(Request $request, Response $response){
        array_push($this->modules, "app/js/user/create.js");

         $this->breadcrumb = [
        [
            'title' => 'Inicio',
            'url' => APP_URL . '?controller=home&action=index',
            'icono' => 'home-outline',
            'class' => 'firts',
        ],
        [
            'title' => 'Gestion de Usuarios',
            'url' => APP_URL . '?controller=user&action=index',
            'icono' => 'people-outline',
        ],
        [
            'class' => 'last active',
            'title' => 'Alta de usuario'
        ]
    ];
        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function save(Request $request, Response $response){
 
        $data = $request->getDataFromInput();
        $dto = new UserDto($data);
        $service = new UserService();
        $service->save($dto);

        $response->send();
    }

    public function load(Request $request, Response $response){
        $data = $request->getDataFromInput();

        $dto = new UserDto(['id' => $data['id']]);
        $service = new UserService();

        $response->setData($service->load($dto)) ;

        $response->send();
    }


    public function edit(Request $request, Response $response){
        array_push($this->modules, "app/js/user/edit.js");
        $this->breadcrumb = [
            [
                'title' => 'Inicio',
                'url' => APP_URL . '?controller=home&action=index'
            ],
            [
                'title' => 'Usuarios',
                'url' => APP_URL . '?controller=user&action=index'
            ],
            [
                'title' => 'Editar de usuario'
            ]
        ];


        $this->setCurrentView($request);
        require_once(APP_FILE_TEMPLATE);
    }

    public function update(Request $request, Response $response){
        $data = $request->getDataFromInput();
       $dto = new UserDto($data);
        $service = new UserService();
        $service->update($dto);
   
        $response->send(); 
    }

    public function delete(Request $request, Response $response){
        $data = $request->getDataFromInput();

        $dto = new UserDto([
            'id' =>$data['id'],
        ]);
        $service = new UserService();
        $service->delete($dto);

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
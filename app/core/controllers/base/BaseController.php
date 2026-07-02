<?php

namespace app\core\controllers\base;

use app\libs\http\Request;

class BaseController{

    protected string $view;
    protected array $scripts;
    protected array $modules;
    protected array $modals;
    protected array $breadCrumb;

    public function __construct(array $scripts = [], array $modules = [], array $modals = [])
    {
        $this->view = "";
        $this->scripts = $scripts;
        $this->modules = $modules;
        $this->modals = $modals;
        $this->breadCrumb = [ ];

    }

    protected function setCurrentView(Request $request): void{
        $this->view = $request->getController() . '/' . $request->getAction() . '.php';
    }

    protected function setBreadCrumb(){
        $this->breadCrumb = $breadCrumb;
    }

    protected function setScripts(array $scripts):void{
        $this->scripts = $scripts;
    }

    //Metodo para control de acceso dependiendo de los roles
    protected function requireProfile(array $profile):void{
        //Se verifica que el usuario este logueado
        if(!isset($_SESSION['perfil'])){
            header("Location: " .APP_URL . "?controller=authentication&action=index");
            exit;
        }

        //Verifica el rol del usuario con $_SESSION['perfil'] y se lo compara con la lista de roles ingresados 
        //por parametros 
        if(!in_array($_SESSION['perfil'], $profile)){
            header("Location: " .APP_URL . "?controller=home&action=index");
            exit;
        }
    }

}
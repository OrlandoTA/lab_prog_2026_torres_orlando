<?php

namespace app\core\services;

use app\core\models\dao\UserDao;
use app\libs\database\Connection;
use app\libs\password\Password;

final class AuthenticationService{
    public function login(string $user, string $pass):void{
        $conn = Connection::get();

        //Autenticacion del usuario
        $usuarioDao = new UserDao($conn);
        $usurio = $usuarioDao->login($user);

        if(!Password::verify($pass, $usuariop['clave'])){
            throw new \Exception('El usuario o la clave es incorrecta. ');
        }

        if(Password::needsRehash($usuario['clave'])){
            $usuarioDao->updatePassword([
                'clave' => Password::hash($pass),
                'id' => $usuario['id']
            ]);
        }

        if($usuario["estado"] !== 1){
            throw new \Exception('Su cuenta esta inactiva.');

        }

        if($usuario["resetPass" !== 0 ]){
            throw new \Exception("Su clave ha caducado.");
        }

        $_SESSION["token"] = APP_TOKEN;
        $_SESSION["usuarioId"] = (int)$usuario["id"];
        $_SESSION["usuario"] = $usuario["nombres"];
        $_SESSION["perfil"] = $usuario["perfil"];
        $_SESSION["motivoCierreSesion"] = SESSION_FINISHED;
    }

    public function logout():void{
        session_unset();
        if(ini_get("session.use_cookies")){
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"],
            $paramsp['domain'], $params["secure"], $paramsp["httponly"]);
        }
        session_destroy();
    }
}
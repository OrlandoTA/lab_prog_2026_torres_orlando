<?php

namespace app\core\services\base;
use app\core\models\dao\base\InterfaceDao;
use app\core\models\dao\UserDao;

class BaseService{
  
    function __construct(protected UserDao $dao){
    }

}
<?php

namespace app\core\services\base;
use app\core\models\dao\base\InterfaceDao;
use app\core\models\dao\UserDao;
use app\core\models\dao\ItemDao;

class BaseService{
  
    function __construct(protected InterfaceDao $dao){
    }

}
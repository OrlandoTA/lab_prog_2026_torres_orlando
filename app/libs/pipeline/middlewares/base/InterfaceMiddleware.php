<?php

namespace app\libs\pipeline\middlewares\base;

use app\libs\http\Response;
use app\libs\http\Request;

interface InterfaceMiddleware{
    public function process(Request $request, Response $response):void;

    public function setNext(InterfaceMiddleware $middleware):void;

    public function processNext(Request $request, Response $response):void;
}

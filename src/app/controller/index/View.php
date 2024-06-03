<?php

namespace app\controller\index;

use nova\framework\request\Controller;
use nova\framework\request\Request;
use nova\framework\request\Response;
use nova\plugin\tpl\ViewException;
use nova\plugin\tpl\ViewResponse;

class View extends Controller
{

 protected ViewResponse $response;
  public function __construct(Request $request)
  {
      parent::__construct($request);
      $this->response =new ViewResponse();
      $this->response->init("layout",['name'=>'nova','age'=>18],false);
  }

    /**
     * @throws ViewException
     */
    public function index(): Response
    {
        return $this->response->asTpl('index',true);
    }

}
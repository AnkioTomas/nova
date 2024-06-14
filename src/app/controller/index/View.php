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
      if($request->isPjax()){
          //取消layout
      }
      $this->response->init("layout",['name'=>'nova','age'=>18,'pjax'=>$request->isPjax()],false);
  }

    /**
     * @throws ViewException
     */
    public function index(): Response
    {
        return $this->response->asTpl('index',true);
    }

    /**
     * @throws ViewException
     */
    public function hello(): Response
    {
        //处理pjax
        return $this->response->asTpl('hello',true);

    }

    public function md(): Response
    {
        return $this->response->asTpl('md',true);
    }

}
<?php

class App{
  protected $controller = 'HomeController';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->parseURL();
    if (!empty($url)) {
      $url[0] = ucwords($url[0]);
    // if(empty($url))return;
    // !! Controller
    if (file_exists('../app/controllers/' . $url[0] . 'Controller.php')) {
       $this->controller = $url[0] . "Controller";
       unset($url[0]);
    } else{
      $this->controller = 'HomeController';
      $this->method = 'notfound';
    }
    }
    require_once '../app/controllers/'.$this->controller.'.php';
    $this->controller = new $this->controller;

    //!! Method
    if(!empty($url)&&isset($url[1])){
      if(method_exists($this->controller,$url[1])){
        $this->method = $url[1];
        unset($url[1]);
      }else{
        $this->method = 'notfound';
      }
    } 

    //!! Params
   if(!empty($url)){
    $this->params = array_values($url);
   }

   //** jalankan controller dan method, serta kirimkan params jika ada
   call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function parseURL()
  {
    if(isset($_GET['url'])){
      $url = ltrim($_GET['url'],'/');
      $url = rtrim($url,'/');
      $url = filter_var($url,FILTER_SANITIZE_URL);
      $url = explode('/',$url);
      return $url;
    }
  }
}

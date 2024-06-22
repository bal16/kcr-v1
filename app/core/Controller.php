<?php

class Controller{
  public function view($view, $data = [])
  {
    require_once '../app/views/'. $view.'.php';
  }
  public function model($model)
  {
    require_once '../app/models/'. $model. '.php';
    return new $model;
  }
  public function sha256($data)
  {
   return hash("sha256", $data);
  }
  public function encode($data)
    {
        return base64_encode($data);
    }

    public function decode($data)
    {
        return base64_decode($data);
    }
  public function validate($data)
  {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }

}


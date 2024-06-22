<?php
class AuthController extends Controller {
  public $title = 'Auth Page';
  public function index($massage=null)
  {
      if (isset($_SESSION['login'])&&$_SESSION['login']) {
        header('Location:/home/index/welcome');
        exit();
      }
      $data['title'] = $this->title;
      (empty($massage))?:$data['massage'] = $massage;
      $this->view('templates/head', $data);
      $this->view('Auth/index', $data);
      $this->view('templates/foot', $data);

  }
  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
      $username = $this->validate($_POST['username']);
      $password = $this->sha256($this->validate($_POST['password']));
      $stay = isset($_POST['stay']);
      $data = $this->model('User')->auth($username, $password, $stay);
      if(!empty($data)){
        $_SESSION["login"] = $this->encode($username);
        if($stay==true) {
          setcookie('login', $_SESSION["login"], time()+86400, "/");
        }else header('location: /auth');
      } else{
         header('location: /auth/index/lgfl');
         exit();
      }
    }
  }
  public function register(){
    if ($_SERVER['REQUEST_METHOD']=='POST'){
      // var_dump($_POST);
      $data['name']=$this->validate($_POST['name']);
      // var_dump(!($this->unique($this->validate($_POST['username']))));
      if(!($this->unique($this->validate($_POST['username'])))){
        $data['username']=$this->validate($_POST['username']);
      } else{
        header('location:/auth/index/usnmnu');
        exit();
      }
      if($_POST['password']==$_POST['password1']){
        $data['password']=$this->sha256($this->validate($_POST['password']));
        $this->model('User')->store($data);
        $this->login();
      } else {
        header('location:/auth/index/pwnsm');
        exit();
      }
    }
  }
 public function logout()
 {
  if (isset($_SESSION['login'])&&$_SESSION['login']) {
    unset($_SESSION['login']);
    if(isset($_COOKIE['login'])) {
      setcookie('login', '', time()-100000000000, "/");
      unset($_COOKIE['login']);
    }
    header('Location:/auth/index/sys');
    exit();
  }else {
    header('Location:/');
    exit();
  }
 }
 public function unique($username)
 {
  return $this->model('User')->exist($username);
 }
}

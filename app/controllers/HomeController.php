<?php
class HomeController extends Controller
{
  public $title = 'Home Page';
  public function index($massage=null)
  {
    if (isset($_COOKIE['login']) && isset($_COOKIE['login'])) {
      $_SESSION['login'] = $_COOKIE['login'];
    }
    if ((!isset($_SESSION['login']) && !$_SESSION['login']) && (!isset($_COOKIE['login']) && ($_COOKIE['login']) == '')) {
      header('Location:/auth');
      exit();
    }
    (empty($massage))?:$data['massage'] = $massage;
    $data['title'] = $this->title;
    $data['username'] = $this->decode($_SESSION['login']);
    $this->view('templates/head', $data);
    $this->view('templates/navbar', $data);
    $this->view('templates/header');
    $this->view('Home/index', $data);
    $this->view('templates/footer');
    $this->view('templates/foot', $data);
  }

  public function checkOut()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $contentType = empty($_SERVER['CONTENT_TYPE']) ? '' : $_SERVER['CONTENT_TYPE'];
      if (strpos($contentType, 'application/json') !== false) {
        $rawData = file_get_contents('php://input');
        if ( ($data = json_decode($rawData, true))!== false ) {
          $userId = $this->model('User')->getId($this->decode($_SESSION['login']));
          $this->model('Transaction')->store([
            'cust' => $data['cust'],
            'user_id' => $userId,
            'total' => $data['total']
          ]);
          $lastTransactionId = $this->model('Transaction')->getLastId();
          foreach ($data['list'] as $menu) {
            $this->model('Transactions_detail')->store([
              'transaction_id' => $lastTransactionId,
              'menu_id' => $menu['id'],
              'qty' => $menu['qty'],
              'subtotal' => $menu['subtotal']
            ]);
          }
          $response = array('message' => 'Data received successfully!');
          echo json_encode($response);
        } else {
          echo json_encode(array('error' => 'Invalid JSON format'));
          http_response_code(400);
        }
      } else {
        echo json_encode(array('error' => 'Unsupported Content-Type'));
        http_response_code(415);
      }
    } else {
      echo json_encode(array('error' => 'Invalid request method'));
      http_response_code(405);
    }
  }
  public function notfound()
  {
    // echo'404';
    $this->view('templates/head');
    $this->view('404');
    $this->view('templates/foot');
  }
}

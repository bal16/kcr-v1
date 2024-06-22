<?php
class MenuController extends Controller
{
  public $title = 'Menu Page';
  public function index()
  {
    header('location:/');
  }
  public function all()
  {
    $data = $this->model('Menu')->getAll();

    if (!is_array($data)) {
      return json_encode(['error' => 'Data is not an array']);
    }

    header('Content-Type: application/json');

    echo json_encode($data);
  }
  public function create()
  {
    $data['title'] = $this->title;
    $this->view('templates/head', $data);
    $this->view('Home/create', $data);
    $this->view('templates/foot');
  }
  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
      $data['name']=$this->validate($_POST['name']);
      $data['price']=$this->validate($_POST['price']);
      !(isset($_FILES['image']['name'])&&!empty($_FILES['image']['name']))?:$data['image']=$this->handleImageUpload($_FILES);
      // var_dump($data['image']);
      $data['category_id']=$this->validate($_POST['category']);;
      $data['description']=$this->validate($_POST['description']);
      $this->model('Menu')->store($data);
      header('Location:/home/index/created');
      exit();
    }
  }
  public function edit($id)
  {
    $data['title'] = $this->title;
    $data['menu'] = $this->model('Menu')->getById($id);
    // var_dump($data);
    $this->view('templates/head', $data);
    $this->view('Home/edit', $data);
    $this->view('templates/foot');
  }
  public function update($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
      $data['id']=$this->validate($id);
      $data['name']=$this->validate($_POST['name']);
      $data['price']=$this->validate($_POST['price']);
      $data['image']=!(isset($_FILES['image']['name'])&&!empty($_FILES['image']['name']))?$_POST['oldImage']:$this->handleImageUpload($_FILES);
      // var_dump($data['image']);
      $data['category_id']=$this->validate($_POST['category']);;
      $data['description']=$this->validate($_POST['description']);
      // var_dump($data);
      $this->model('Menu')->update($data);
      header('Location:/home/index/updated');
      exit();
  }
  }
  public function handleImageUpload($data)
  {
    // Get details about the uploaded file
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Sanitize the file name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // Directory where you want to save the file
    $dest_path = UPLOADED_FILE_DIR . $newFileName;
    move_uploaded_file($fileTmpPath, $dest_path);
    // Allowed file types (you can modify this list based on your requirements)
    // $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
    return $newFileName;
  }
  public function destroy($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
      // DELETE request logic goes here
      !($image =  $this->model('Menu')->getImageById($id))?:
      unlink(UPLOADED_FILE_DIR.$image);
      $this->model('Menu')->deleteById($id);
      header('location:/');
      exit();
    } else {
      // Handle other request methods (e.g., GET, POST)
    }
  }
}
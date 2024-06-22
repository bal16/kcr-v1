<?php
class Transactions_detail {
  private $db;
  private $tableName = 'transactions_details';
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAll()
  {
    $this->db->query("SELECT * FROM ".$this->tableName);
    return $this->db->resultSet();
  }
  public function getById($id)
  {
    $this->db->query("SELECT * FROM $this->tableName WHERE id =:id");
    $this->db->bind(':id',$id);
    return $this->db->single();
  }
  public function getLastId()
  {
    $this->db->query("SELECT MAX(id) AS last_id FROM $this->tableName");
    return $this->db->single();
  }
  public function store($data)
  {
      $_SESSION['list']=$data;
      $query = "INSERT INTO {$this->tableName} (transaction_id, menu_id, qty, subtotal) VALUES (:transaction_id, :menu_id, :qty, :subtotal);";
      $this->db->query($query);
      $this->db->bind(':transaction_id', $data['transaction_id']);
      $this->db->bind(':menu_id', $data['menu_id']);
      $this->db->bind(':qty', $data['qty']); 
      $this->db->bind(':subtotal', "{$data['subtotal']}"); 
      $this->db->execute();
  }
}
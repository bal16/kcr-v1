<?php
class Transaction {
  private $db;
  private $tableName = 'transactions';
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
    return ($this->db->single())['last_id'];
  }
  public function store($data)
  {
      $query = "INSERT INTO {$this->tableName} (cust, user_id, request_at, total) VALUES (:cust, :user_id, :request_at, :total)";
      $this->db->query($query);
      $this->db->bind(':cust', $data['cust']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':request_at', date('Y-m-d H:i'));
      $this->db->bind(':total', "{$data['total']}"); 
      $this->db->execute();
  }
}
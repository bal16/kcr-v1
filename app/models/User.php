<?php
class User {
  private $db;
  private $tableName = 'users';
  public function __construct()
  {
    $this->db = new Database;
  }
  public function auth($username, $password, $stay)
  {
    $this->db->query("SELECT username FROM $this->tableName WHERE username = :username AND password = :password");
    $this->db->bind(':username', $username);
    $this->db->bind(':password', $password);
    return $this->db->single();
  }
  public function store($data)
  {
      $query = "INSERT INTO {$this->tableName} (name, username, password) 
      VALUES (:name, :username, :password);";
      $this->db->query($query);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':username', $data['username']);
      $this->db->bind(':password', $data['password']);
      $this->db->execute();
  }
  public function getId($username)
  {
    $this->db->query("SELECT id FROM {$this->tableName} WHERE username = :username");
    $this->db->bind(':username', $username);
    return ($this->db->single())['id'];
  }
  public function exist($username)
  {
    $this->db->query("SELECT username FROM {$this->tableName} WHERE username = :username");
    $this->db->bind(':username', $username);
    $result = ($this->db->single())['username'];
    return ($result == $username);
  }
}
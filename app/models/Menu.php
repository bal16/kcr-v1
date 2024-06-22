<?php
class Menu {
  private $db;
  private $tableName = 'menus';
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
  public function getImageById($id)
  {
    $this->db->query("SELECT image FROM $this->tableName WHERE id =:id");
    $this->db->bind(':id',$id);
    return ($this->db->single())['image'];
  }
  public function getByCategory($category)
  {
    $this->db->query("SELECT * FROM $this->tableName WHERE category =:category");
    $this->db->bind(':category',$category);
    return $this->db->resultSet();
  }
  public function store($data)
  {
      $withImage = isset($data['image']);
      // var_dump($withImage);
      $query = $withImage
        ?"INSERT INTO {$this->tableName} (name, category_id, price, description, image) VALUES (:name, :category_id, :price, :description, :image);"
        :"INSERT INTO {$this->tableName} (name, category_id, price, description) VALUES (:name, :category_id, :price, :description);";
      $this->db->query($query);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':category_id', ($data['category_id']));
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':description', $data['description']);
      !($withImage)?:$this->db->bind(':image', $data['image']);
      $this->db->execute();
  }
  public function update($data)
  {
      $query = "UPDATE {$this->tableName} SET name = :name, category_id = :category_id, price = :price, description = :description, image = :image WHERE  id = :id;";
      $this->db->query($query);
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':category_id', ($data['category_id']));
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':description', $data['description']);
      $this->db->bind(':image', $data['image']);
      $this->db->execute();
  }
  public function deleteById($id)
  {
    $query = "DELETE FROM {$this->tableName} WHERE id = :id;";
      $this->db->query($query);
      $this->db->bind(':id', $id);
      $this->db->execute();
  }
}

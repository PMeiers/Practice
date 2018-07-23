<?php

class Store
{
  private $conn;
  private $table;

  function __construct($conn, $table) {
    $this->conn = $conn;
    $this->table = $table;
  }

  function addProduct($product)
  {
    
      $sql = "INSERT INTO ". $this->table. " (sku, name, price, type, spec) values("."'".$product->sku."',".
          "'".$product->name."',". $product->price.",". 
          "'".$product->type."',"."'".json_encode($product->dimensions)."')";

      // echo "sql".$sql;
      

      if ($this->conn -> query($sql)){
          print_r( "New product added successfully!");
      }
      else
          print_r( "Error:". $conn -> error);
  }

  function getProducts()
  {
    $sql = "SELECT * FROM ".$this->table;
    
    $result = $this -> conn -> query($sql);    

    if (!$this-> conn -> query($sql))
        print_r( "Error:" + $conn -> error);

    if ($result -> num_rows > 0) {
        $products = [];
        $rows = $result->num_rows;
        for ($i=0; $i < $rows; $i++) {
          array_push($products, $result->fetch_assoc());
        }
        echo json_encode($products);
    } else {
        echo 0;
    }
  }

  function delProduct($idx)
  {
    $sql = "DELETE FROM " . $this->table ." WHERE id=" . $idx;

    if ($this-> conn ->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $this-> conn ->error;
    }
  }

  function finish() 
  {
    $this->conn->close();

  }
};



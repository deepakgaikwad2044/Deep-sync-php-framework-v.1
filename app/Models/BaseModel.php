<?php
namespace App\Models;
use App\Config\Database;

class BaseModel extends Database {
  
    public function tableName()
  {
    return $this->table_name;
  }
}

?>
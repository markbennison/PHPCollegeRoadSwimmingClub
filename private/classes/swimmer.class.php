<?php

class Swimmer extends DatabaseObject {

    static protected $table_name = 'user';
    static protected $db_columns = ['id', 'username', 'password', 'forename', 'surname', 'dateofbirth', 'email', 'telephone', 'address1', 'address2', 'city', 'postcode', 'roleid', 'registrationdate'];

    public $id;
    public $username;
    public $password;
    public $forename;
    public $surname;
    public $dateofbirth;
    public $email;
    public $telephone;
    public $address1;
    public $address2;
    public $city;
    public $postcode;
    public $roleid;
    public $registrationdate;

    public $parentid;
    public $swimmerconfirmed;
    public $parentconfirmed;

    public const ROLE_OPTIONS = [
        1 => 'Guest',
        2 => 'Swimmer',
        3 => 'Parent',
        4 => 'Coach',
        5 => 'Admin'
      ];

    public function __construct($args=[]) {
        $this->id = $args['id'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->forename = $args['forename'] ?? '';
        $this->surname = $args['surname'] ?? '';
        $this->dateofbirth = $args['dateofbirth'] ?? date("Y-m-d");
        $this->email = $args['email'] ?? '';
        $this->telephone = $args['telephone'] ?? '';
        $this->address1 = $args['address1'] ?? '';
        $this->address2 = $args['address2'] ?? '';
        $this->city = $args['city'] ?? '';
        $this->postcode = $args['postcode'] ?? '';
        $this->roleid = $args['roleid'] ?? 3;
        $this->registrationdate = $args['registrationdate'] ?? date("Y-m-d");
    }

    //OVERRIDE METHODS

    protected function create() {
      $this->validate();
      if(!empty($this->errors)) { return false; }
      $attributes = $this->sanitized_attributes();
      $sql = "INSERT INTO " . static::$table_name . " (";
      $sql .= join(', ', array_keys($attributes));
      $sql .= ") VALUES ('";
      $sql .= join("', '", array_values($attributes));
      $sql .= "')";
      $result = self::$database->query($sql);
      if($result) {
        $this->id = self::$database->insert_id;
      }
      return $result;
    }

    public function attributes() {
      $attributes = [];
      foreach(static::$db_columns as $column) {
        // Properties which have database columns, excluding ID
        if($column == 'id') { continue; }
        elseif($column == 'roleid' && empty($this->$column)) {
          $attributes[$column] = 3;
          continue; 
        }
        elseif($column == 'registrationdate' && empty($this->$column)) {
          $attributes[$column] = date("Y-m-d");
          continue; 
        }

        $attributes[$column] = $this->$column;
      }
      return $attributes;
    }

    static public function find_by_roleid($roleid) {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE roleid='". $roleid . "'";
      return static::find_by_sql($sql);
    }
/*
SELECT 
`swimmerparent`.`swimmerid`, 
`swimmerparent`.`parentid`,
`user`.`username`,
`user`.`forename`,
`user`.`surname`,
`swimmerparent`.`swimmerconfirmed`, 
`swimmerparent`.`parentconfirmed`
FROM `swimmerparent` 
INNER JOIN `user` ON `swimmerparent`.`parentid` = `user`.`id`
WHERE `swimmerparent`.`swimmerid` = '' 
*/

    static public function find_swimmer_parents($id) {
      $sql = "SELECT swimmerparent.swimmerid, swimmerparent.parentid, user.username, user.forename, user.surname, swimmerparent.swimmerconfirmed, swimmerparent.parentconfirmed ";
      $sql .= "FROM swimmerparent ";
      $sql .= "INNER JOIN user ON swimmerparent.parentid = user.id ";
      $sql .= "WHERE swimmerparent.swimmerid='" . self::$database->escape_string($id) . "'";
      return static::find_by_sql($sql);
    }


    public function condition() {
        if($this->condition_id > 0) {
          return self::CONDITION_OPTIONS[$this->condition_id];
        } else {
          return "Unknown";
        }
      }
    
      protected function validate() {
        $this->errors = [];
    
        if(is_blank($this->username)) {
          $this->errors[] = "Username cannot be blank.";
        }
        if(is_blank($this->forename)) {
          $this->errors[] = "Forename cannot be blank.";
        }
        return $this->errors;
      }

}

?>
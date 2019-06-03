<?php

class User extends DatabaseObject {

    static protected $table_name = 'user';
    static protected $db_columns = ['id', 'username', 'password', 'forename', 'surname', 'dateofbirth', 'gender', 'email', 'telephone', 'address1', 'address2', 'city', 'postcode', 'roleid', 'registrationdate'];

    public $id;
    public $username;
    protected $password;
    public $forename;
    public $surname;
    public $dateofbirth;
    public $gender;
    public $email;
    public $telephone;
    public $address1;
    public $address2;
    public $city;
    public $postcode;
    public $roleid;
    public $registrationdate;

    protected $password_required = true;
    public $plain_password;
    public $confirm_password;

    public const ROLE_OPTIONS = [
        1 => 'Guest',
        2 => 'Swimmer',
        3 => 'Parent',
        4 => 'Coach',
        5 => 'Admin'
      ];

      public const GENDER_OPTIONS = [
        1 => 'Female',
        2 => 'Male'
      ];

    public function __construct($args=[]) {
        $this->id = $args['id'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->forename = $args['forename'] ?? '';
        $this->surname = $args['surname'] ?? '';
        $this->dateofbirth = $args['dateofbirth'] ?? '';
        $this->gender = $args['gender'] ?? 'Female';
        $this->email = $args['email'] ?? '';
        $this->telephone = $args['telephone'] ?? '';
        $this->address1 = $args['address1'] ?? '';
        $this->address2 = $args['address2'] ?? '';
        $this->city = $args['city'] ?? '';
        $this->postcode = $args['postcode'] ?? '';
        $this->roleid = $args['roleid'] ?? 1;
        $this->registrationdate = $args['registrationdate'] ?? date("Y-m-d");

        $this->plain_password = $args['plain_password'] ?? '';
        $this->confirm_password = $args['confirm_password'] ?? '';
    }

    public function full_name() {
      return $this->forename . " " . $this->surname;
    }
    
    protected function set_hashed_password() {
      $this->password = password_hash($this->plain_password, PASSWORD_DEFAULT);
    }
  
    public function verify_password($plain_password) {
      return password_verify($plain_password, $this->password);
    }
  
    protected function create() {
      $this->set_hashed_password();
      return parent::create();
    }
  
    protected function update() {
      if($this->plain_password != '') {
        $this->set_hashed_password();
        // validate password
      } else {
        // password not being updated, skip hashing and validation
        $this->password_required = false;
      }
      return parent::update();
    }

    static public function find_by_username($username) {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
      $obj_array = static::find_by_sql($sql);
      if(!empty($obj_array)) {
        return array_shift($obj_array);
      } else {
        return false;
      }
    }
    
/*
    static public function get_current_user($swimmerid) {
      $sql = "SELECT swimmerparent.swimmerid, swimmerparent.parentid, user.id, user.username, user.forename, user.surname, user.gender, swimmerparent.swimmerconfirmed, swimmerparent.parentconfirmed ";
      $sql .= "FROM swimmerparent ";
      $sql .= "INNER JOIN user ON swimmerparent.parentid = user.id ";
      $sql .= "WHERE swimmerparent.swimmerid='" . self::$database->escape_string($swimmerid) . "'";
      return static::find_by_sql($sql);
    }
*/

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
        }elseif (!has_length($this->username, array('min' => 8, 'max' => 255))) {
          $this->errors[] = "Username must be between 8 and 255 characters.";
        } elseif (!has_unique_username($this->username, $this->id ?? 0)) {
          $this->errors[] = "Username not allowed. Try another.";
        }

        if(is_blank($this->forename)) {
          $this->errors[] = "Forename cannot be blank.";
        } elseif (!has_length($this->forename, array('min' => 2, 'max' => 30))) {
          $this->errors[] = "Forename must be between 2 and 30 characters.";
        }
    
        if(is_blank($this->surname)) {
          $this->errors[] = "Surname cannot be blank.";
        } elseif (!has_length($this->surname, array('min' => 2, 'max' => 30))) {
          $this->errors[] = "Surname must be between 2 and 30 characters.";
        }
    
        if(is_blank($this->email)) {
          $this->errors[] = "Email cannot be blank.";
        } elseif (!has_length($this->email, array('max' => 128))) {
          $this->errors[] = "Email must be less than 128 characters.";
        } elseif (!has_valid_email_format($this->email)) {
          $this->errors[] = "Email must be a valid format.";
        }
    
        if($this->password_required) {
          if(is_blank($this->plain_password)) {
            $this->errors[] = "Password cannot be blank.";
          } elseif (!has_length($this->plain_password, array('min' => 8))) {
            $this->errors[] = "Password must contain 8 or more characters";
          } elseif (!preg_match('/[A-Z]/', $this->plain_password)) {
            $this->errors[] = "Password must contain at least 1 uppercase letter";
          } elseif (!preg_match('/[a-z]/', $this->plain_password)) {
            $this->errors[] = "Password must contain at least 1 lowercase letter";
          } elseif (!preg_match('/[0-9]/', $this->plain_password)) {
            $this->errors[] = "Password must contain at least 1 number";
          } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->plain_password)) {
            $this->errors[] = "Password must contain at least 1 symbol";
          }
    
          if(is_blank($this->confirm_password)) {
            $this->errors[] = "Confirm password cannot be blank.";
          } elseif ($this->plain_password !== $this->confirm_password) {
            $this->errors[] = "Password and confirm password must match.";
          }
        }

        return $this->errors;
      }

}

?>
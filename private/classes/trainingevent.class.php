<?php

class TrainingEvent extends DatabaseObject {

    static protected $table_name = 'trainingevent';
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
        $this->dateofbirth = $args['dateofbirth'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telephone = $args['telephone'] ?? '';
        $this->address1 = $args['address1'] ?? '';
        $this->address2 = $args['address2'] ?? '';
        $this->city = $args['city'] ?? '';
        $this->postcode = $args['postcode'] ?? '';
        $this->roleid = $args['roleid'] ?? 1;
        $this->registrationdate = $args['registrationdate'] ?? date("Y-m-d");
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
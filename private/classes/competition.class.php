<?php

class Competition extends DatabaseObject {

    static protected $table_name = 'competition';
    static protected $db_columns = ['id', 'title', 'startdate'];

    public $id;
    public $title;
    public $startdate;

    public function __construct($args=[]) {
        $this->id = $args['id'] ?? '';
        $this->title = $args['title'] ?? '';
        $this->startdate = $args['startdate'] ?? date("Y-m-d");
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
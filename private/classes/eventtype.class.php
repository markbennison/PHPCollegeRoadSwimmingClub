<?php

class EventType extends DatabaseObject {

    static protected $table_name = 'eventtype';
    static protected $db_columns = ['id', 'name', 'qualifyingtime'];

    public $id;
    public $name;
    public $qualifyingtime;

    public function __construct($args=[]) {
        $this->id = $args['id'] ?? 0;
        $this->name = $args['name'] ?? '';
        $this->qualifyingtime = $args['qualifyingtime'] ?? 0;
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

        if(is_blank($this->name)) {
          $this->errors[] = "Event Name cannot be blank.";
        }
        return $this->errors;
      }

}

?>
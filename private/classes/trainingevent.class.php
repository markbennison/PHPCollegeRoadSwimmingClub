<?php

class TrainingEvent extends DatabaseObject {

    static protected $table_name = 'trainingevent';
    static protected $db_columns = ['id', 'eventtypeid', 'swimmerid', 'date', 'time'];

    public $id;
    public $eventtypeid;
    public $swimmerid;
    public $date;
    public $time;

    public $forename;
    public $surname;
    public $name;
    public $qualifyingtime;
    public $differential;

    public function __construct($args=[]) {
        $this->id = $args['id'] ?? '';
        $this->eventtypeid = $args['eventtypeid'] ?? '';
        $this->swimmerid = $args['swimmerid'] ?? '';
        $this->date = $args['date'] ?? date("Y-m-d");
        $this->time = $args['time'] ?? '';
    }

    static public function find_trainingevents_by_swimmer($swimmerid) {
      $sql = "SELECT trainingevent.id, trainingevent.eventtypeid, trainingevent.swimmerid, ";
      $sql .= "trainingevent.date, trainingevent.time, eventtype.name, eventtype.qualifyingtime, ";
      $sql .= "(eventtype.qualifyingtime - trainingevent.time) AS differential ";
      $sql .= "FROM trainingevent ";
      $sql .= "INNER JOIN eventtype ON trainingevent.eventtypeid = eventtype.id ";
      $sql .= "WHERE trainingevent.swimmerid='" . self::$database->escape_string($swimmerid) . "' ";
      $sql .= "ORDER BY trainingevent.date DESC";
      return static::find_by_sql($sql);
    }

    static public function find_trainingevents_by_type($eventtypeid) {
      $sql = "SELECT trainingevent.id, trainingevent.eventtypeid, trainingevent.swimmerid, ";
      $sql .= "trainingevent.date, trainingevent.time, eventtype.name, eventtype.qualifyingtime, ";
      $sql .= "user.forename, user.surname, ";
      $sql .= "(eventtype.qualifyingtime - trainingevent.time) AS differential ";
      $sql .= "FROM trainingevent ";
      $sql .= "INNER JOIN eventtype ON trainingevent.eventtypeid = eventtype.id ";
      $sql .= "INNER JOIN user ON trainingevent.swimmerid = user.id ";
      $sql .= "WHERE trainingevent.eventtypeid='" . self::$database->escape_string($eventtypeid) . "' ";
      $sql .= "ORDER BY trainingevent.date DESC";
      return static::find_by_sql($sql);
    }

    static public function find_trainingeventtypes() {
      $sql = "SELECT DISTINCT trainingevent.eventtypeid, eventtype.name, eventtype.qualifyingtime ";
      $sql .= "FROM trainingevent ";
      $sql .= "LEFT JOIN eventtype ON trainingevent.eventtypeid = eventtype.id ";
      $sql .= "ORDER BY eventtype.name ASC";
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
    
        if(is_blank($this->eventtypeid)) {
          $this->errors[] = "Event Type cannot be blank.";
        }elseif(!is_numeric($this->eventtypeid)) {
          $this->errors[] = "Event Type ID must be an number";
        }elseif($this->eventtypeid < 0) {
          $this->errors[] = "Event Type ID cannot be negative";
        }

        if(is_blank($this->swimmerid)) {
          $this->errors[] = "Swimmer ID cannot be blank.";
        }elseif(!is_numeric($this->swimmerid)) {
          $this->errors[] = "Swimmer ID must be an number";
        }elseif($this->swimmerid < 0) {
          $this->errors[] = "Swimmer ID cannot be negative";
        }

        if(is_blank($this->date)) {
          $this->errors[] = "Date cannot be blank.";
        }

        if(is_blank($this->time)) {
          $this->errors[] = "Time cannot be blank.";
        }elseif(!is_numeric($this->time)) {
          $this->errors[] = "Time (measured in milliseconds) must be a number";
        }elseif($this->time < 1000 || $this->time > 3600000) {
          $this->errors[] = "Time (measured in milliseconds) must be between 1,000 (1 second) and 3,600,000 (1 hour)";
        }

        return $this->errors;
      }

}

?>
<?php

class CompetitionEvent extends DatabaseObject {

    static protected $table_name = 'competitionevent';
    static protected $db_columns = ['id', 'competitionid ', 'eventtypeid ', 'date'];

    public $id;
    public $competitionid ;
    public $eventtypeid ;
    public $date;

    public $name;
    public $qualifyingtime;
    public $differential;

    public function __construct($args=[]) {
        $this->id = $args['id'] ?? 0;
        $this->competitionid  = $args['competitionid '] ?? 0;
        $this->eventtypeid  = $args['eventtypeid '] ?? 0;
        $this->date = $args['date'] ?? date("Y-m-d");
    }

    static public function find_competitionevents_by_swimmer($swimmerid) {
      $sql = "SELECT competitionevent.id, competitionevent.competitionid, competitionevent.eventtypeid, ";
      $sql .= "competitionevent.date, eventtype.name, eventtype.qualifyingtime, ";
      $sql .= "competition.title, competition.startdate ";
      //$sql .= "(eventtype.qualifyingtime - trainingevent.time) AS differential ";
      $sql .= "FROM competitionevent ";
      $sql .= "INNER JOIN eventtype ON competitionevent.eventtypeid = eventtype.id ";
      //$sql .= "WHERE trainingevent.swimmerid='" . self::$database->escape_string($swimmerid) . "' ";
      $sql .= "ORDER BY trainingevent.date DESC";
      return static::find_by_sql($sql);
    }

    static public function find_eventtypes_by_competitionid($competitionid) {
      $sql = "SELECT competitionevent.id, competitionevent.competitionid, competitionevent.eventtypeid, ";
      $sql .= "competitionevent.date, eventtype.name, eventtype.qualifyingtime ";
      $sql .= "FROM competitionevent ";
      $sql .= "LEFT JOIN eventtype ON competitionevent.eventtypeid = eventtype.id ";
      $sql .= "WHERE competitionevent.competitionid='" . self::$database->escape_string($competitionid) . "' ";
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
    
        if(is_blank($this->competitionid)) {
          $this->errors[] = "Competition ID cannot be blank.";
        }
        if(is_blank($this->eventtypeid)) {
          $this->errors[] = "Event Type ID cannot be blank.";
        }
        return $this->errors;
      }

}

?>
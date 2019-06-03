<?php

class LaneAssignment extends DatabaseObject {

    static protected $table_name = 'laneassignment';
    static protected $db_columns = ['eventid', 'heatnumber', 'lanenumber', 'swimmerid', 'time', 'status', 'place'];

    public $eventid;
    public $heatnumber;
    public $lanenumber;
    public $swimmerid;
    public $time;
    public $status;
    public $place;

    public $competitionid;
    public $date;
    public $name;

    public $forename;
    public $surname;

    public function __construct($args=[]) {
        $this->eventid = $args['eventid'] ?? 0;
        $this->heatnumber = $args['heatnumber'] ?? 0;
        $this->lanenumber = $args['lanenumber'] ?? 0;
        $this->swimmerid = $args['swimmerid'] ?? 0;
        $this->time = $args['time'] ?? 0;
        $this->status = $args['status'] ?? '';
        $this->place = $args['place'] ?? 0;
    }

    static public function find_competitionevents_by_swimmer($swimmerid) {
      $sql = "SELECT laneassignment.eventid, laneassignment.heatnumber, laneassignment.lanenumber, ";
      $sql .= "laneassignment.swimmerid, laneassignment.time, laneassignment.status, laneassignment.place, ";
      $sql .= "competitionevent.competitionid, competitionevent.date, eventtype.name ";
      $sql .= "FROM laneassignment ";
      $sql .= "INNER JOIN competitionevent ON laneassignment.eventid = competitionevent.id ";
      $sql .= "INNER JOIN eventtype ON competitionevent.eventtypeid = eventtype.id ";
      $sql .= "WHERE laneassignment.swimmerid='" . self::$database->escape_string($swimmerid) . "' ";
      //$sql .= "ORDER BY trainingevent.date DESC";
      return static::find_by_sql($sql);
    }

    static public function find_swimmers_by_eventid($eventid) {
      $sql = "SELECT competitionevent.id, competitionevent.competitionid, competitionevent.eventtypeid, ";
      $sql .= "competitionevent.date, eventtype.name, eventtype.qualifyingtime, ";
      $sql .= "laneassignment.heatnumber, laneassignment.lanenumber, laneassignment.swimmerid, ";
      $sql .= "laneassignment.time, laneassignment.status, laneassignment.place, ";
      $sql .= "user.id, user.forename, user.surname ";
      $sql .= "FROM competitionevent ";
      $sql .= "INNER JOIN eventtype ON competitionevent.eventtypeid = eventtype.id ";
      $sql .= "INNER JOIN laneassignment ON competitionevent.id = laneassignment.eventid ";
      $sql .= "INNER JOIN user ON laneassignment.swimmerid = user.id ";
      $sql .= "WHERE competitionevent.id='" . self::$database->escape_string($eventid) . "' ";
      $sql .= "ORDER BY laneassignment.place ASC";
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
    
        if(is_blank($this->eventid)) {
          $this->errors[] = "Event ID cannot be blank.";
        }
        if(is_blank($this->heatnumber)) {
          $this->errors[] = "Heat Number cannot be blank.";
        }
        return $this->errors;
      }

}

?>
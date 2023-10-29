<?php
    require_once('./helpers/DatabaseConnect.php');
    class SearchHelper{
        public $fromLocation;
        public $toLocation;
        public $journeyDate;

        public function __construct($from,$to,$date){
            $this->fromLocation = $from;
            $this->toLocation = $to;
            $this->journeyDate = $date;
        }

        // Methods
        public function fetchBuses(){
            // PHP prepared statement
            $databaseConnect = new DatabaseConnect();
            $conn = $databaseConnect->getInstance();
            $sql = "SELECT * FROM bus_routes WHERE from_location = ? AND to_location = ? ORDER BY duration ASC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $this->fromLocation,$this->toLocation);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            return $result;
        }
        function fetchFromLocation() {
            return $this->fromLocation;
        }
        function fetchToLocation() {
            return $this->toLocation;
        }
        function fetchJourneyDate() {
            $d = date_create($this->journeyDate);
            $journeyDate = date_format($d,'jS \o\f F Y (l)');
            return $journeyDate;
        }
    }
?>
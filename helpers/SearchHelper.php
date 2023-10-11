<?php
    class SearchHelper{
        public $fromLocation;
        public $toLocation;
        public $date;

        public function __construct($from,$to,$date){
            $this->fromLocation = $from;
            $this->toLocation = $to;
            $this->journeyDate = $date;
        }

        // Methods
        public function fetchBuses(){
            // PHP prepared statement
            $sql = "SELECT * FROM bus_routes WHERE 'from_location' = ? AND 'to_location' = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $this->fromLocation,$this->toLocation);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $bus = $result->fetch_assoc(); // fetch data
            
            return $bus;
        }
        function fetchFromLocation() {
            return $this->fromLocation;
        }
        function fetchToLocation() {
            return $this->toLocation;
        }
        function fetchJourneyDate() {
            $d = date_create($this->date);
            $journeyDate = date_format($d,'jS \o\f F Y (l)');
            return $journeyDate;
        }
    }
?>
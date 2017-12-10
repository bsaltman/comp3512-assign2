<?php
    /*
      Gateway for db interaction with BookVisits table
   */
    class bookVisitsGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT VisitID, BookID, CountryCode FROM BookVisits";
        }
        protected function getOrderFields() {
            return 'LastName';
        }
        protected function getPrimaryKeyName() {
            return "UserID";
        }
        
        protected function getForeignKeyName(){
            //no foreign key
        }
        
        protected function topfifteenCountriesSelect(){
            return "SELECT COUNT(VisitID) as numVisits,CountryCode FROM BookVisits GROUP BY CountryCode ORDER BY COUNT(VisitID) DESC";
        }
        
        public function topfifteen(){
            $sql = $this->topfifteenCountriesSelect();
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetchAll();
        }
        
    }
?>
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
            return "SELECT COUNT(BookVisits.VisitID) as numVisits, BookVisits.CountryCode, Countries.CountryName FROM BookVisits 
            INNER JOIN Countries
            ON BookVisits.CountryCode = Countries.CountryCode
            GROUP BY BookVisits.CountryCode ORDER BY COUNT(BookVisits.VisitID) DESC
            LIMIT 15";
        }
        
        
        public function topfifteen(){
            $sql = $this->topfifteenCountriesSelect();
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetchAll();
        }
        
        protected function uniqueVistsSelect(){
            return "Select COUNT(VisitID) as numVisits From BookVisits";
        }
        
        public function uniqueVisits(){
            $sql = $this->uniqueVistsSelect();
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetch();
        }
        
        protected function uniqueCountriesSelect(){
            return "Select COUNT(VisitID) FROM BookVisits GROUP BY CountryCode";
        }
        
        public function uniqueCountries(){
            $sql = $this->uniqueCountriesSelect();
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetchAll();
        }
        
    }
?>
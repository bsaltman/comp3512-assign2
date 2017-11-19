<?php
    /*
      Gateway for db interaction with Universities table
   */
    class UniversitiesGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT UniversityID, Name, Address, City, State,
                    Zip, Website, Longitude, Latitude FROM Universities";
        }
        
        protected function getOrderFields() {
            return 'Name';
        }
         
        protected  function getForeignKeyName(){
            return "State";
        }
        
        protected function getPrimaryKeyName() {
            return "Name";
        }
        

    }
?>
<?php
    /*
      Gateway for db interaction with countries table
   */
    class countriesGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT CountryName FROM Countries";
        }
        protected function getOrderFields() {
            return 'CountryName';
        }
        protected function getPrimaryKeyName() {
            return "CountryCode";
        }
        
        protected function getForeignKeyName(){
            //no foreign key
        }
        
        
    }
?>
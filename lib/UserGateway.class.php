<?php
    /*
      Gateway for db interaction with User table
   */
    class UserGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT UserID, FirstName, LastName, Address, City, Region, 
                    Country, Postal, Phone, Email From Users";
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
    }
?>
<?php
    /*
      Gateway for db interaction with Employee Messages tables
   */
    class EmployeeMessagesGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT MessageID, EmployeeID, ContactID, MessageDate, 
            Category, Content FROM EmployeeMessages";
        }
        
        protected function getOrderFields() {
            return 'MessageDate';
        }
        protected function getPrimaryKeyName() {
            return "MessageID";
        }
        
        protected function getForeignKeyName(){
            return "EmployeeID";
        }
    }
?>
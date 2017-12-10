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
        protected function getContactId(){
            return "ContactID";
        }
        
        public function byContactId($con){
            $sql = $this->getSelectStatement() . " WHERE " .
            $this->getContactId() . "='". $con . "' ORDER BY "
            . $this->getOrderFields();
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetchAll();
        }
        
        protected function countMessagesSelect(){
            return "Select COUNT(MessageID) as numMessages FROM EmployeeMessages";
        }
        
        public function countMessages(){
            $sql = $this->countMessagesSelect();
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetch();
        }
        

    }
?>
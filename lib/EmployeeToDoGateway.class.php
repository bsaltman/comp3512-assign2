<?php
    class EmployeeToDoGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT ToDoID, Status, Priority, DateBy, 
            Description FROM EmployeeToDo";
        }
        
        protected function getOrderFields() {
            return 'Dateby';
        }
        protected function getPrimaryKeyName() {
            return "ToDoID";
        }
        
        protected function getForeignKeyName(){
            return "EmployeeID";
        }
    }
?>
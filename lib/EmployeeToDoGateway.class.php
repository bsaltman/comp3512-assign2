<?php
    /*
      Gateway for db interaction with EmployeeToDo table
   */
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
        
        protected function employeeToDoCountSelect(){
            return "Select Count(ToDoID) as numToDos FROM EmployeeToDo";
        }
        
        public function countToDos(){
            $sql = $this->employeeToDoCountSelect();
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetch();
        }
        
    }
?>
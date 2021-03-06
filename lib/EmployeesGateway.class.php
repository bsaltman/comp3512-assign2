<?php
    /*
      Gateway for db interaction with Employee table
   */
    class EmployeesGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT EmployeeID, FirstName, LastName, Address, City,
            Region, Country, Postal, Email FROM Employees ";
        }
        
        
        protected function getOrderFields() {
            return 'LastName, FirstName';
        }
        protected function getPrimaryKeyName() {
            return "EmployeeID";
        }
        
        
        protected function getLastName(){
            return "LastName";
        }
        
        protected function getCity(){
            return "City";
        }
        
        protected function cityListSQL(){
            return "SELECT DISTINCT City FROM Employees ORDER BY City";
        }
        
        public function cityList(){
            $sql= $this->cityListSQL();
            $statement = DatabaseHelper::runQuery($this->connection, $sql,null);
           return $statement->fetchAll();
        }
        
        public function findByLastName($lastName)
       {
           $sql = $this->getSelectStatement() . ' WHERE ' .
           $this->getLastName() .  " LIKE '$lastName%' ORDER BY "  .
           $this->getOrderFields();
           $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
           return $statement->fetchAll();
       } 
       
        public function findByCity($city)
       {
           $sql = $this->getSelectStatement() . ' WHERE ' .
           $this->getCity() . '=:ci ORDER BY '. $this->getOrderFields();
          
           $statement = DatabaseHelper::runQuery($this->connection, $sql,
           Array(':ci' => $city));
           return $statement->fetchAll();
       }
       
       public function findByCityLastName($city,$lastName)
       {
           $sql = $this->getSelectStatement() . ' WHERE ' .
           $this->getLastName() .  " LIKE '$lastName%'  AND " .
           $this->getCity() . '=:ci ORDER BY '. $this->getOrderFields();
          
           $statement = DatabaseHelper::runQuery($this->connection, $sql,
           Array(':ci'=> $city));
           return $statement->fetchAll();
       }
    }
?>
<?php
    class tableJoinsGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT Books.ISBN10, Books.Title, Books.CopyrightYear, 
            Imprints.Imprint, Subcategories.SubcategoryName FROM Books 
            INNER JOIN Imprints 
            ON Books.ImprintID = Imprints.ImprintID
        	INNER JOIN Subcategories 
        	ON Books.SubcategoryID = Subcategories.SubcategoryID ";
        }

        protected function getOrderFields() {
            return 'Books.Title';
        }
        
        protected function getPrimaryKeyName() {
            return "Subcategories.SubcategoryID";
        }
        
        protected function getForeignKeyName(){
            return "Imprints.ImprintID";
            
        }
        public function subFilter($subID){
            $sql = $this->getSelectStatement() . " WHERE " .
            $this->getPrimaryKeyName() . "= $subID ORDER BY "
            . $this->getOrderFields(). " LIMIT 20";
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetchAll();
        }
        
        public function impFilter($impID){
            $sql = $this->getSelectStatement() . " WHERE " .
            $this->getForeignKeyName() . "= $impID ORDER BY "
            . $this->getOrderFields(). " LIMIT 20";
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetchAll();
        }
    
    }
?>
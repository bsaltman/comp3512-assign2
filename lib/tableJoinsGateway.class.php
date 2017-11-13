<?php
    class tableJoinsGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT Books.ISBN10, Books.Title, Books.CopyrightYear, 
            Books.Description, Books.PageCountsEditorialEst, Books.TrimSize,
            Books.ISBN13, Imprints.ImprintID, Imprints.Imprint, 
            Subcategories.SubcategoryName, Subcategories.SubcategoryID,
            BindingTypes.BindingType, Statuses.Status FROM Books 
            INNER JOIN Imprints 
            ON Books.ImprintID = Imprints.ImprintID
        	INNER JOIN Subcategories 
        	ON Books.SubcategoryID = Subcategories.SubcategoryID 
        	INNER JOIN BindingTypes
            ON Books.BindingTypeID = BindingTypes.BindingTypeID
            INNER JOIN Statuses
        	ON Books.ProductionStatusID = Statuses.StatusID";
        }
        

        protected function getOrderFields() {
            return 'Books.Title';
        }
        
        protected function getPrimaryKeyName() {
            return "FILL IN";
        }
        
        protected function getForeignKeyName(){
            return "FILL IN";
            
        }
        public function subFilter($subID){
            $sql = $this->getSelectStatement() . " WHERE " .
            "Subcategories.SubcategoryID" . "= $subID ORDER BY "
            . $this->getOrderFields(). " LIMIT 20";
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetchAll();
        }
        
        public function impFilter($impID){
            $sql = $this->getSelectStatement() . " WHERE " .
            "Imprints.ImprintID" . "= $impID ORDER BY "
            . $this->getOrderFields(). " LIMIT 20";
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetchAll();
        }
        
        public function byISBN($isbn10){
            $sql = $this->getSelectStatement() . " WHERE " .
            "Books.ISBN10" . "='". $isbn10 . "' ORDER BY "
            . $this->getOrderFields();
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetchAll();
        }
    
    }
?>
<?php
    class UniversityJoinGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT Universities.Name,
        		    FROM Universities
        		    INNER JOIN Adoptions 
        		    ON Universities.UniversityID = Adoptions.UniversityID
        		    INNER JOIN AdoptionBooks
        		    ON Adoptions.AdoptionID = AdoptionBooks.AdoptionID
        		    INNER JOIN Books
        		    ON Books.BookID = AdoptionBooks.BookID";
        }
        

        protected function getOrderFields() {
            return 'Universities.Name';
        }
        
        protected function getPrimaryKeyName() {
            //fill in
        }
        
        protected function getForeignKeyName(){
            //fill in
            
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
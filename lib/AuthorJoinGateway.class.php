<?php
    class AuthorJoinGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT Authors.FirstName, Authors.LastName
        		    FROM Authors
        		    INNER JOIN BookAuthors 
        		    ON Authors.AuthorID = BookAuthors.AuthorID
        		    INNER JOIN Books
        		    ON Books.BookID = BookAuthors.BookId";
        }
        

        protected function getOrderFields() {
            return 'Authors.LastName';
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
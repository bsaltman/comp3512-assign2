<?php
/*
      Gateway for db interaction with Author table
   */
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
            return 'AuthorID';
        }
        
        protected function getForeignKeyName(){
            //none
            
        }
   /*
      Returns a record for the specificed ISBN seperate function due to ISBN
      not being the primary key
   */
        public function byISBN($isbn10){
            $sql = $this->getSelectStatement() . " WHERE " .
            "Books.ISBN10" . "='". $isbn10 . "' ORDER BY "
            . $this->getOrderFields();
            $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
            return $statement->fetchAll();
        }
    
    }
?>
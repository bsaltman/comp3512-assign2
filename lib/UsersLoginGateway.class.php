<?php   
    /*
      Gateway for db interaction with UserLogin table
   */
    class UsersLoginGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT UserID, UserName, Password, Salt, State, DateJoined, 
                    DateLastModified From UsersLogin";
        }
        protected function getOrderFields() {
            return 'LastName';
        }
        protected function getPrimaryKeyName() {
            return "UserName";
        }
        
        protected function getForeignKeyName(){
            return "UserID";
        }
    }
?>
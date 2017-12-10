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
        
        public function getForeignKeyName(){
            return "UserID";
        }
    
        public function InsertUsersLogin($userID, $userName, $password,$salt,$date){
            $sql = "INSERT INTO `UsersLogin` (`UserID`, `UserName`, `Password`, `Salt`, `State`, `DateJoined`, `DateLastModified`)". 
            "VALUES (".$userID.",'".$userName."','". md5($password . $salt)."','".$salt."',1,'".$date."','".$date."')";
            $statement = DatabaseHelper::runQuery($this->connection, $sql,null);
        }
        
    }
?>
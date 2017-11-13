<?php
/*"SELECT Users.UserID, Users.FirstName, Users.LastName, 
                    Users.Address, Users.City, Users.Region, Users.Country, 
                    Users.Postal, Users.Phone, Users.Email, UsersLogin.UserID,
                    UsersLogin.UserName, UsersLogin.Password, UsersLogin.Salt, 
                    UsersLogin.State, UsersLogin.DateJoined, UsersLogin.DateLastModified
                    From UsersLogin
                    INNER JOIN Users
                    ON Users.UserID = UsersLogin.UserID";*/
    class UserGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT UserID, FirstName, LastName, Address, City, Region, 
                    Country, Postal, Phone, Email From Users";
        }
        protected function getOrderFields() {
            return 'LastName';
        }
        protected function getPrimaryKeyName() {
            return "UserID";
        }
        
        protected function getForeignKeyName(){
            //
        }
    }
?>
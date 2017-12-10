<?php
    /*
      Gateway for db interaction with State tables
   */
    class StateGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT StateName, StateAbbr FROM States";
        }
        
        protected function getOrderFields() {
            return 'StateName';
        }
        protected function getPrimaryKeyName() {
            return "StateAbbr";
        }
        
    }
?>
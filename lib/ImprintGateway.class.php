<?php
    /*
      Gateway for db interaction with Imprint table
   */
    class ImprintGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT DISTINCT Imprint, ImprintID from Imprints";;
        }
        
        protected function getOrderFields() {
            return 'Imprint';
        }
        protected function getPrimaryKeyName() {
            return "ImprintID";
        }
    }
?>



<?php
    /*
      Gateway for db interaction with SubCategories tables
   */
    class SubCategoriesGateway extends TableDataGateway {
        public function __construct($connect) {
            parent::__construct($connect);
        }
        
        protected function getSelectStatement()
        {
            return "SELECT DISTINCT SubcategoryID, CategoryID, 
            SubcategoryName FROM Subcategories";
        }
        
        protected function getOrderFields() {
            return 'SubcategoryName';
        }
        protected function getPrimaryKeyName() {
            return "SubcategoryName";
        }
    }
?>
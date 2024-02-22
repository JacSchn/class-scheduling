<?php
    class MemberModel extends Model {
        public function memberList($parameter_values = null) { 
            //This method returns a list of members
            $sql = "SELECT `memberId`, `firstName`, `lastName`, `phone` FROM `members` ORDER BY `lastName`";
            // Set SQL statement using the Model class's setSql() method
            $this->setSql($sql);
            //Fetch and return result set using the Model class's getAll() method
            return $this->getAll();
        }
    }
?>
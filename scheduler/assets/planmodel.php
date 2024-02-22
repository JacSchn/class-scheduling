<?php
    class PlanModel extends Model {
        public function planList($parameter_values = null) { 
            //This method returns a list of selected courses
            $sql = "SELECT *, P.id as spid FROM `semesterplans` P, `schedules` S WHERE S.id = P.sectionID AND P.memberID = $_SESSION[memberID] ORDER BY `subject`, `number`, `Section`";
            // Set SQL statement using the Model class's setSql() method
            $this->setSql($sql);
            //Fetch and return result set using the Model class's getAll() method
            return $this->getAll();
        }

        public function addToPlan($parameter_values = null, $sectionID) {
            //This method inserts a selected course into the semesterplans table

            $sql = "INSERT INTO `semesterplans` (memberID, sectionID, created_at, updated_at) VALUES (:memberID, :sectionID, NOW(), NOW())";
            $parameter_values = [":memberID" => $_SESSION['memberID'],
                ":sectionID" => $sectionID
            ];
            $this->setSql($sql);
            $this->sendUpdate($parameter_values);
        }

        public function removeFromPlan($parameter_values = null, $sectionID) {
            $sql = "DELETE FROM `semesterplans` WHERE sectionID = :sectionID AND memberID = :memberID";
            $parameter_values = [":sectionID" => $sectionID,
                ":memberID" => $_SESSION['memberID']
            ];
            $this->setSQL($sql);
            $this->sendUpdate($parameter_values);
        }
    }
?>
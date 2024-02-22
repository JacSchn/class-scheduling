<?php
    class CourseModel extends Model {
        public function courseList($parameter_values = null) { 
            //This method returns a list of members
            $sql = "SELECT `id`, `subject`, `number`, `section`, `days`, `time`, `location`, `instructor`, `credits` FROM `schedules` where subject = :subject ORDER BY `subject`";
            // Set SQL statement
            $this->setSql($sql);

            //Fetch and return result set
            return $this->getAll($parameter_values);
        }

        public function allcourses($parameter_values = null) { 
            //This method returns a list of members
            $sql = "SELECT `id`, `subject`, `number`, `section`, `days`, `time`, `location`, `instructor`, `credits` FROM `schedules` ORDER BY `subject`";
            // Set SQL statement
            $this->setSql($sql);

            //Fetch and return result set
            return $this->getAll($parameter_values);
        }
    }
 ?>
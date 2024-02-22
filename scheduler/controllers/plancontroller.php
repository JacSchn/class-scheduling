<?php
    class PlanController {

        public $model;
        public $view;

        public function __construct() {
            // Assign model
            $this->model = new PlanModel();
        }

        public function planList() {
            //This method returns a list of plans
            $planList = $this->model->planList();
            $pageTitle = "Your selected courses";

            include("views/plans/planlist.php");
       }
       
       public function addToPlan($parameters = null, $section) {
            //This method adds a course to the semester plan
            $addToPlan = $this->model->addToPlan($parameters, $section);
            echo "Course Added to Plan";
       }

       public function removeFromPlan($parameters = null, $section) {
            $removeFromPlan = $this->model->removeFromPlan($parameters, $section);
            echo "Course Removed from Plan";
       }
    }
?>
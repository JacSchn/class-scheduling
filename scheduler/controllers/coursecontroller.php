<?php
  class CourseController {
    public $model;
    public $view;

    public function __construct() {
      // Assign model
      $this->model = new CourseModel();
    }

    public function courseList($parameters, $subject) {
      //This method returns a list of courses of selected subject
      $courseList = $this->model->courseList($parameters);
 
      // Define page title
      $pageTitle = "List of {$subject} courses";

      include("views/courses/courselist.php");
    }

    public function allcourses($parameters) { 
      //This method returns a list of courses
      $courseList = $this->model->allcourses($parameters);

      // Define page title
      $pageTitle = "List of courses";

      include("views/courses/courselist.php");
    }
  }
?>
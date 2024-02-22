<?php
    class MemberController {

        public $model;
        public $view;

        public function __construct() {
            // Assign model
            $this->model = new MemberModel();
        }

        public function memberList() {
            //This method returns a list of members
            $memberList = $this->model->memberList();

            include("views/members/memberlist.php");
       }

       public function login($username,$password) {
            $result = $this->model->getOne();

       }
    }
?>
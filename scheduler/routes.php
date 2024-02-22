<?php
    // Define variables and assign their default values
    $mode = ""; // default value for the switch statement
    $parameterValues = null; // default values named parameters
    $pageTitle = ""; // define a title for each output
    $columns = array(); // define an array of column labels for a table header

    try {
        
        if (!(isset($_SESSION["memberID"]) || isset($_POST["username"]))) {
            //User is trying to access the page without signing in. Display the login page
            include("views\layouts\loginform.html");
            // terminate the script without executing any other statements
            exit();
        }

        if (isset($_GET['mode'])) {
            $mode = $_GET['mode'];
        }

        switch ($mode) {
            case "login":
                $m = new MemberController;
                // read login information
                $username = (isset($_POST["username"])) ? $_POST["username"] : "-1";
                $password = (isset($_POST["password"])) ? $_POST["password"] : "-1";
                // Define SQL statement
                $sql = "SELECT `memberID`, `firstName`, `lastName` from `members` where username=:username and password = :password ";
                $m->model->setSQL($sql);

                $parameters = [":username" => $username, ":password" => md5($password)];
                $result = $m->model->getOne($parameters);
                // Execute the SQL statement
                // validate the user
                if (isset($result) && isset($result->memberID)) {
                    // Valid user. Store the memberID using a session variable
                    $_SESSION["memberID"] = $result->memberID;

                    // You may save any other information. For example, the full name can be assigned to a session variable.
                    $_SESSION["name"] = $result->firstName . " " . $result->lastName;
                    include("views/defaultview.php");
                }
                else {
                    echo "<p>Invalid user</p>";
                    // Display the login form
                    include("views/layouts/loginform.html");
                }
                break;

            case "logout":
                // Remove all the session variables and display the login form
                session_unset();
                setcookie(session_name(), '', time()-1000, '/');
                $_SESSION = array();
                include("views/layouts/loginform.html");
                break;            

                case "classes": // display a list of movies based on the selected genre

                    // Create an instance of MovieController class
                    $m = new CourseController();
              
                    /* Note: We use two key/value pairs: 
                        mode - identifies the switch case
                        genre - movie type
                        If genre=all, then display all the movies.
                        If genre=Drama, then display Dramas-type movies.
                        Need two different SQL statements.
                        We can use an if ... else statement to handle these values.
                    */
              
                    if (isset($_GET['subject']) && $_GET['subject'] !== "all") {
                      $subject = $_GET['subject'];
                      // Define values for named parameters. 
                      $parameterValues = array(":subject" => $subject);
                      // Invoke movieList( ) method to display a list of movies of selected type
                      $courseList = $m->courseList($parameterValues, $subject);
                    } else {
                      // Default output is a list of all the movies
                      // Invoke allmovies( ) method to display a list of movies
                      $courseList = $m->allcourses(null);
                    }
                    break;

                case "myPlan":
                    $p = new PlanController();

                    $planlist = $p->planList(null);

                    break;

                case "addCourse":
                    $p = new PlanController();

                    if (isset($_GET['courseid'])) {
                        $courseid = $_GET['courseid'];

                        $p->model->addToPlan($parameterValues, $courseid);
                        echo "<h3>Adding course to Semester Plan</h3><br><p>Successfully added course to your schedule</p>";
                    }
                    else {
                        echo "No course selected.";
                    }

                    break;

                case "removeCourse":
                    $p = new PlanController();
                    if (isset($_GET['courseid'])) {
                        $courseid = $_GET['courseid'];

                        $p->model->removeFromPlan($parameterValues, $courseid);
                        $p = new PlanController();
                        $planlist = $p->planlist(null);
                    }
                    else {
                        echo "No courses selected.";
                    }
                    break;

            default: // Default page
                include("views/defaultview.php");
                break;
        }
    }
    catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>
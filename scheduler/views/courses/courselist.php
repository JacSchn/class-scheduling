<?php
    if (count($courseList) > 0) {
        if (isset($pageTitle)) {
            echo "<h3>{$pageTitle}</h3>";
        }

        echo "<table class='table'>";
        echo "<th>Course</th>";
        echo "<th>Section</th>";
        echo "<th>Schedule</th>";
        echo "<th>Location</th>";
        echo "<th>Instructor</th>";
        echo "<th>Credits</th>";
        echo "<th>Add To Plan</th>";

        foreach ($courseList as $course) {
            // Each $movie is an object. Use -> operator to access its properties
            echo "<tr>
                <td>{$course->subject} {$course->number}</td>
                <td>{$course->section}</td>
                <td>{$course->days} {$course->time}</td>
                <td>{$course->location}</td>
                <td>{$course->instructor}</td>
                <td>{$course->credits}</td>
                <td><button type='button' class='btn btn-primary' data-course-id='{$course->id}'>Add to Plan</button></td>
                </tr>";
        }
        echo "</table>";
    }
    else {
        echo "<p>There are no courses";
    }
?>
<script>
    const planButtons = document.querySelectorAll('.btn-primary');

    planButtons.forEach(button => {
        button.addEventListener('click', () => {
            const courseId = button.getAttribute('data-course-id');
            const url = `index.php?mode=addCourse&courseid=${courseId}`;
            window.location.href = url;
        });
    });
</script>
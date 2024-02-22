<?php
    if (count($planList) > 0) {
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
        echo "<th>Remove</th>";

        $total_credits = 0;

        foreach ($planList as $course) {
            $total_credits += $course->credits;
            // Each $movie is an object. Use -> operator to access its properties
            echo "<tr>
                <td>{$course->subject} {$course->number}</td>
                <td>{$course->section}</td>
                <td>{$course->days} {$course->time}</td>
                <td>{$course->location}</td>
                <td>{$course->instructor}</td>
                <td>{$course->credits}</td>
                <td><button type='button' class='btn btn-primary' data-course-id='{$course->id}' >Remove</button></td>
                </tr>";
        }
        echo "</table>";
        echo "Total Credits: $total_credits";
    }
    else {
        echo "<h3>You have no courses selected</h3>";
    }
?>
<script>
    const removeButtons = document.querySelectorAll('.btn-primary');

    removeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const courseId = button.getAttribute('data-course-id');
            const url = `index.php?mode=removeCourse&courseid=${courseId}`;
            if (confirm("Are you sure you would like to remove this course?")) {
                window.location.href = url;
            }
        });
    });
</script>
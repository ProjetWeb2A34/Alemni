<?php
//include 'HeaderF.php';
include '../../../controller/CoursC.php';
// Retrieve class ID from URL parameters
if (isset($_GET['id_classe'])) {
    $classId = $_GET['id_classe'];
    

    // Create an instance of the course controller
    $coursC = new CoursC();

    // Get all courses for the specified class
    $courses = $coursC->getCoursesForClass($classId);
} else {
    // Redirect to an error page or handle the situation when parameters are missing
    header("Location: error.php");
    exit();
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <!-- Include FullCalendar CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <!-- Include jQuery -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <!-- Include FullCalendar JavaScript -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
</head>
<body>
    <div id="calendar"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize FullCalendar
            $('#calendar').fullCalendar({
                // Set the initial view to 'agendaWeek' for weekly view
                defaultView: 'agendaWeek',
                // Set the header options
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                // Display the session dates of courses on the calendar
                events: [
                    <?php foreach ($courses as $course): ?>
                        {
                            title: '<?php echo $course['NomCours']; ?>',
                            start: '<?php echo $course['seance']; ?>'
                        },
                    <?php endforeach; ?>
                ]
            });
        });
    </script>
    
</body>
</html>

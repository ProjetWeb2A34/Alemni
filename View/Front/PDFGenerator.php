<?php
include 'HeaderF.php';
?>



<?php
// Check if the course name is provided in the URL parameter
if(isset($_GET['course'])) {
    // Get the course name from the URL parameter
    $courseName = $_GET['course'];
    
    // Map the course name to the corresponding PDF file
    $pdfFiles = [
        'Math' => 'math.pdf',
        'Math2' => 'math2.pdf',
        'English' => 'english.pdf',
        'Physique' => 'physique.pdf',
        'Coding' => 'coding.pdf'
    ];

    // Check if the course name exists in the mapping
    if(array_key_exists($courseName, $pdfFiles)) {
        // Get the PDF file name
        $pdfFile = $pdfFiles[$courseName];
        
        // Set the appropriate headers for PDF file
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=".$pdfFile);
        
        // Output the PDF file
        readfile($pdfFile);
        
        // Exit script
        exit();
    } else {
        // If the course name is not found, display an error message
        echo "PDF file not found for the course: $courseName";
    }
} else {
    // If the course name is not provided in the URL parameter, display an error message
    echo "Course name is missing in the URL parameter";
}
?>









<?php
include 'FooterF.php';
?>
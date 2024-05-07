<?php
require_once 'EventDAO.php'; // Include EventDAO class
require_once 'vendor/autoload.php'; // Include PhpSpreadsheet library

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController {
    public function generateExcel() {
        // Create a new PhpSpreadsheet instance
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Event Name');
        $sheet->setCellValue('C1', 'Location');
        $sheet->setCellValue('D1', 'Price');
        $sheet->setCellValue('E1', 'Date');
        $sheet->setCellValue('F1', 'Capacity');

        // Fetch events from the database
        $eventDAO = new EventDAO();
        $events = $eventDAO->getEventsFromDatabase();

        // Populate the spreadsheet with event data
        $row = 2; // Start from second row
        foreach ($events as $event) {
            $sheet->setCellValue('A' . $row, $event['id_event']);
            $sheet->setCellValue('B' . $row, $event['nom_event']);
            $sheet->setCellValue('C' . $row, $event['lieux_event']);
            $sheet->setCellValue('D' . $row, $event['prix_event']);
            $sheet->setCellValue('E' . $row, $event['date_event']);
            $sheet->setCellValue('F' . $row, $event['nb_personne']);
            $row++;
        }

        // Save the spreadsheet as an Excel file
        $writer = new Xlsx($spreadsheet);
        $filePath = 'events.xlsx'; // Output file path
        $writer->save($filePath);

        // Return the file path
        return $filePath;
    }
}
?>
 
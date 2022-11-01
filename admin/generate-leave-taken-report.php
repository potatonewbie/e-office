<?php

require('../phpspreadsheet/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST["export"]) && isset($_POST['data'])) {
    $result = unserialize($_POST['data']);
    $spreadsheet = new Spreadsheet();
    $active_sheet = $spreadsheet->getActiveSheet();

    $active_sheet->getColumnDimension('A')->setAutoSize(true);
    $active_sheet->getColumnDimension('B')->setAutoSize(true);
    $active_sheet->getColumnDimension('C')->setAutoSize(true);
    $active_sheet->getColumnDimension('D')->setAutoSize(true);
    $active_sheet->getColumnDimension('E')->setAutoSize(true);
    $active_sheet->getColumnDimension('F')->setAutoSize(true);
    $active_sheet->getColumnDimension('G')->setAutoSize(true);
    $active_sheet->getColumnDimension('H')->setAutoSize(true);
    $active_sheet->getColumnDimension('I')->setAutoSize(true);
    $active_sheet->getColumnDimension('J')->setAutoSize(true);
    $active_sheet->getColumnDimension('K')->setAutoSize(true);
    $active_sheet->getColumnDimension('L')->setAutoSize(true);

    $active_sheet->setCellValue('A1', 'Employee ID');
    $active_sheet->setCellValue('B1', 'Employee Name');
    $active_sheet->setCellValue('C1', 'Annual Leave');
    $active_sheet->setCellValue('D1', 'Medical Leave');
    $active_sheet->setCellValue('E1', 'Emergency Leave');
    $active_sheet->setCellValue('F1', 'Maternity Leave');
    $active_sheet->setCellValue('G1', 'Paternity Leave');
    $active_sheet->setCellValue('H1', 'Compassionate Leave');
    $active_sheet->setCellValue('I1', 'Study Leave');
    $active_sheet->setCellValue('J1', 'Examination Leave');
    $active_sheet->setCellValue('K1', 'Unpaid Leave');
    $active_sheet->setCellValue('L1', 'Others');

    $active_sheet->getStyle('A:L')->getAlignment()->setHorizontal('left');
    $active_sheet->getStyle('A1:L1')->getFont()->setBold(true);

    $active_sheet->getStyle('A1:L1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
    $active_sheet->getStyle('A1:L1')->getFill()->getStartColor()->setARGB('A6A6A6');
    $active_sheet->getStyle("A1:L1")->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

    $counter = 2;

    if (is_array($result) || is_object($result)) {
        foreach ($result as $row) {
            $active_sheet->setCellValue('A' . $counter, $row["empID"]);
            $active_sheet->setCellValue('B' . $counter, $row["empName"]);
            $active_sheet->setCellValue('C' . $counter, $row["Annual_Leave"]);
            $active_sheet->setCellValue('D' . $counter, $row["Medical_Leave"]);
            $active_sheet->setCellValue('E' . $counter, $row["Emergency_Leave"]);
            $active_sheet->setCellValue('F' . $counter, $row["Maternity_Leave"]);
            $active_sheet->setCellValue('G' . $counter, $row["Paternity_Leave"]);
            $active_sheet->setCellValue('H' . $counter, $row["Compassionate_Leave"]);
            $active_sheet->setCellValue('I' . $counter, $row["Study_Leave"]);
            $active_sheet->setCellValue('J' . $counter, $row["Examination_Leave"]);
            $active_sheet->setCellValue('K' . $counter, $row["Unpaid_Leave"]);
            $active_sheet->setCellValue('L' . $counter, $row["Others"]);
            $active_sheet->getStyle("A{$counter}:L{$counter}")->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $counter++;
        }
    }

    $year = date('Y');
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
    $filename = "Employee_Leave_Taken_Report_{$year}.xlsx";
    $writer->save($filename);

    header('Content-Type: application/x-www-form-urlencoded');
    header('Content-Transfer-Encoding: Binary');
    header("Content-Disposition: attachment; filename=\"".$filename."\"");

    readfile($filename);
    unlink($filename);

    exit;
}

?>
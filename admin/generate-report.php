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

    $active_sheet->setCellValue('A1', 'Leave ID');
    $active_sheet->setCellValue('B1', 'Employee ID');
    $active_sheet->setCellValue('C1', 'Employee Name');
    $active_sheet->setCellValue('D1', 'Leave Type');
    $active_sheet->setCellValue('E1', 'Start Date');
    $active_sheet->setCellValue('F1', 'End Date');
    $active_sheet->setCellValue('G1', 'Days Requested');
    $active_sheet->setCellValue('H1', 'Leave Status');

    $active_sheet->getStyle('A:H')->getAlignment()->setHorizontal('left');
    $active_sheet->getStyle('A1:H1')->getFont()->setBold(true);

    $active_sheet->getStyle('A1:H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
    $active_sheet->getStyle('A1:H1')->getFill()->getStartColor()->setARGB('A6A6A6');
    $active_sheet->getStyle("A1:H1")->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

    $counter = 2;

    if (is_array($result) || is_object($result)) {
        foreach ($result as $row) {
            $active_sheet->setCellValue('A' . $counter, $row["leaveID"]);
            $active_sheet->setCellValue('B' . $counter, $row["empID"]);
            $active_sheet->setCellValue('C' . $counter, $row["empName"]);
            $active_sheet->setCellValue('D' . $counter, $row["leaveType"]);
            $active_sheet->setCellValue('E' . $counter, date('d-m-Y', strtotime($row["startDate"])));
            $active_sheet->setCellValue('F' . $counter, date('d-m-Y', strtotime($row["endDate"])));
            $active_sheet->setCellValue('G' . $counter, $row["Days"]);
            if($row['leaveStatus'] === 'Approved') {
                $active_sheet->getStyle('H' . $counter)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $active_sheet->getStyle('H' . $counter)->getFill()->getStartColor()->setARGB('29bb04');
                $active_sheet->setCellValue('H' . $counter, $row["leaveStatus"]);
            }
            else {
                $active_sheet->getStyle('H' . $counter)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $active_sheet->getStyle('H' . $counter)->getFill()->getStartColor()->setARGB('FF0000');
                $active_sheet->setCellValue('H' . $counter, $row["leaveStatus"]);
            }
            $active_sheet->getStyle("A{$counter}:H{$counter}")->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $counter++;
        }
    }

    $year = date('Y');
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
    $filename = "Employee_Leave_Report_{$year}.xlsx";
    $writer->save($filename);

    header('Content-Type: application/x-www-form-urlencoded');
    header('Content-Transfer-Encoding: Binary');
    header("Content-Disposition: attachment; filename=\"".$filename."\"");

    readfile($filename);
    unlink($filename);

    exit;
}

?>
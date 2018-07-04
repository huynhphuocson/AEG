<?php
 function create_excel($namefield = array(), $namedata = array())
{
    require('../../vendor/phpoffice/phpexcel/Classes/PHPExcel.php' );
    require('../../vendor/phpoffice/phpexcel/Classes/PHPExcel/Writer/Excel2007.php');

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getProperties()->setCreator("");
    $objPHPExcel->getProperties()->setLastModifiedBy("");
    $objPHPExcel->getProperties()->setTitle("");
    $objPHPExcel->getProperties()->setSubject("");
    $objPHPExcel->getProperties()->setDescription("");

    $objPHPExcel->setActiveSheetIndex(0);

    $t = 0;
    $i = 1;
    $z = 'A';
    foreach ($namefield as $row) {
        $objPHPExcel->getActiveSheet()->setCellValue($z . $i, $row);
        $z++;
    }

    $row = 3;
    $t = 'A';

    foreach ($namedata as $row1) {
        foreach ($row1 as $key=>$value){
            $objPHPExcel->getActiveSheet()->setCellValue($t.$row,$value);
            $t++;
        }
        $t = 'A';
        $row++;
        /*pre( get_object_vars($row1));*/
    }

    $filename = "Register-Exported-on-" . date("Y-m-d-H-i-s") . '.xlsx';

    $objPHPExcel->getActiveSheet()->setTitle("Tasks-Overview");

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $writer->save('php://output');
    exit;
}
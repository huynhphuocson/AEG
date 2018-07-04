<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 14/06/2018
 * Time: 5:15 CH
 */
class Export extends MY_Controller
{
    public function excel()
    {

        $input = array();
        $date_select = $this->input->post('date_select1');
        if ($date_select > 0) {
            $date_select = date("Y-m-d", strtotime($date_select));
            $input['like'] = array('created', $date_select);
        }

        /*require (APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require (APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');*/

        $this->load->model('register_model');
        $list = $this->register_model->get_list($input);

        $this->load->model('province_model');
        $input1 = array();

        foreach ($list as $row) {
            $input1['where'] = array('id' => $row->province_id);
            $list_provice = $this->province_model->get_list($input1);
        }

        $input2 = array();

        $input2[0] =  "Mã số";
        $input2[1] =   "Họ tên khách hàng";
        $input2[2] =   "Số điện thoại";
        $input2[3] =   "Email";
        $input2[4] =   "Nơi ở";
        $input2[5] =   "Nội dung";
        $input2[6] =   "Url giới thiệu";
        $input2[7] =   "Url gửi form";
        $input2[8] =   "Ngày tạo";


        create_excel($input2, $list);

        /*$objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("");
        $objPHPExcel->getProperties()->setLastModifiedBy("");
        $objPHPExcel->getProperties()->setTitle("");
        $objPHPExcel->getProperties()->setSubject("");
        $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Mã số');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Họ tên khách hàng');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Số điện thoại');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Email');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Nơi ở');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Nội dung');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Url giới thiệu');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Url gửi form');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Ngày tạo');

        $row = 3;

        foreach($list as $key => $value){
            foreach ($list_provice as $row2) {
                $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $value->id);
                $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $value->name);
                $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $value->phone);
                $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $value->email);
                $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $row2->name);
                $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $value->content);
                $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $value->url_referer);
                $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $value->url_current);
                $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $value->created);

                $row++;
            }
        }

        $filename = "Register-Exported-on-".date("Y-m-d-H-i-s").'.xlsx';

        $objPHPExcel->getActiveSheet()->setTitle("Tasks-Overview");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
        exit;*/
    }

}
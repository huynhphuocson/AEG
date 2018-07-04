<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 2:30 CH
 */

class Home extends MY_Controller
{

    function index()
    {
       /* $this->data['json'] = $json;*/
        $this->load->model('order_status_model');
        $orders_status = $this->order_status_model->get_list();
        $this->data['orders_status'] = $orders_status;

        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }

    function datacharts()
    {
        $this->load->model('orders_model');
        $json = array();

        if(!empty($_POST['date_select_1']) && !empty($_POST['date_select_2'])){

            /*$date_select_from = '2006-02-25 00:00:00';
            $date_select_to = '2006-03-24 00:00:00';
            $data_status = '3';*/

            $input = array();
            $date_select_from = $_POST['date_select_1'];
            $date_select_to = $_POST['date_select_2'];
            $data_status = $_POST['data_status'];

            $input['status_id'] = intval($data_status);
            $input['order_date_from'] = date("Y-m-d H:i:s", strtotime($date_select_from));
            $input['order_date_to'] = date("Y-m-d H:i:s", strtotime($date_select_to));
            $input['group_by'] = 'order_date';

            $list = $this->orders_model->get_list_where($input);

        }
        else {
            $list = $this->orders_model->get_list_by('order_date');
        }

        /*$json = $list;*/
        foreach ($list as $row){
            //$string = date('Y-m-d', $row->order_date);
            //$string = $row->order_date;
            $str = substr($row->order_date,0,10);
            if(!empty($str))
                $json[] = array($str, (int)$row->soluong);
        }

        echo json_encode($json);

    }

   /* function datachartshavedata()
    {
        $this->load->model('orders_model');
        $date_select_1 = $_POST['date_select_1'];
        $date_select_2 = $_POST['date_select_2'];
        $data_status = $_POST['data_status'];
        $data_status = intval($data_status);
        /*$date_select_1 = '2006-02-25 00:00:00';
        $date_select_2 = '2006-03-24 00:00:00';
        $data_status = '3';*/

        /*$date_select_1= date("Y-m-d H:i:s", strtotime($date_select_1));
        $date_select_2= date("Y-m-d H:i:s", strtotime($date_select_2));
        $input2 = 'order_date';

        if(!empty($data_status)){
            $input = 'status_id = \''.$data_status.'\' and order_date >= \''.$date_select_1.'\' and order_date <= \''.$date_select_2.'\'';
        }else{
            $input = 'order_date >= \''.$date_select_1.'\' and order_date <= \''.$date_select_2.'\'';
        }

        $list = $this->orders_model->get_list_where($input, $input2);

        $json = array();
        foreach ($list as $row){
            $str = substr($row->order_date,0,10);
            if(!empty($str))
            $json[] = array($str, (int)$row->soluong);
        }
        echo json_encode($json);

    }*/

    /*
     * đăng xuất
     */
    function logout()
    {
        if($this->session->userdata('login'))
        {
            $this->session->unset_userdata('login');
        }
        redirect(admin_url('login'));
    }
}
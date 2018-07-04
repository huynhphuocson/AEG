<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 2:21 CH
 */
Class Customers extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('customers_model');
    }

    function index()
    {
        $input = array();
        $list = $this->customers_model->get_list($input);
        $this->data['list'] = $list;

        $total = $this->customers_model->get_total();
        $this->data['total'] = $total;

        //lay ra bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/customers/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * them moi admin
     */
    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('last_name', 'Tên', 'required');
            $this->form_validation->set_rules('company', 'Tên công ty', 'required|min_length[8]');
            $this->form_validation->set_rules('first_name', 'Họ', 'required');
            $this->form_validation->set_rules('email_address', 'email', 'required');
            $this->form_validation->set_rules('business_phone', 'sdt', 'required');
            $this->form_validation->set_rules('job_title', 'chức vụ', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //thêm dữ liệu vào trong tables
                $company        = $this->input->post('company');
                $last_name      = $this->input->post('last_name');
                $first_name     = $this->input->post('first_name');
                $email_address  = $this->input->post('email_address');
                $job_title      = $this->input->post('job_title');
                $business_phone = $this->input->post('business_phone');
                $fax_number     = $this->input->post('fax_number');
                $address        = $this->input->post('address');
                $city           = $this->input->post('city');

                $data = array(
                    'company' => $company,
                    'last_name' => $last_name,
                    'first_name' => $first_name,
                    'email_address' => $email_address,
                    'job_title' => $job_title,
                    'business_phone' => $business_phone,
                    'fax_number' => $fax_number,
                    'address' => $address,
                    'city' => $city,
                );

                if($this->customers_model->create($data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'them thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'them khong thanh cong');
                }
                //chuyen ve trang danh sach quan tri vien
                redirect(admin_url('customers'));
            }
        }

        $this->data['temp'] = 'admin/customers/add';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * ham chinh sua thong tin quan tri vien
     */
    function edit(){

        $this->load->library('form_validation');
        $this->load->helper('form');

        //lay id quan tri de chinh sua
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        $info = $this->customers_model->get_info($id);

        if(!$info)
        {
            $this->session->set_flashdata('message', 'không tồn tại quản trị viên này');
            redirect(admin_url('customers'));
        }
        $this->data['info'] = $info;

        if($this->input->post())
        {
            $this->form_validation->set_rules('last_name', 'Tên', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                $company        = $this->input->post('company');
                $last_name      = $this->input->post('last_name');
                $first_name     = $this->input->post('first_name');
                $email_address  = $this->input->post('email_address');
                $job_title      = $this->input->post('job_title');
                $business_phone = $this->input->post('business_phone');
                $fax_number     = $this->input->post('fax_number');
                $address        = $this->input->post('address');
                $city           = $this->input->post('city');

                $data = array(
                    'company' => $company,
                    'last_name' => $last_name,
                    'first_name' => $first_name,
                    'email_address' => $email_address,
                    'job_title' => $job_title,
                    'business_phone' => $business_phone,
                    'fax_number' => $fax_number,
                    'address' => $address,
                    'city' => $city,
                );

                if($this->customers_model->update($id, $data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'cập nhật thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'cập nhật khong thanh cong');
                }
                //chuyen ve trang danh sach quan tri vien
                redirect(admin_url('customers'));
            }

        }

        $this->data['temp'] = 'admin/customers/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
    * hàm xóa quản trị viên
    */
    function delete()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //lay id quan tri de chinh sua
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        $info = $this->customers_model->get_info($id);

        if(!$info)
        {
            $this->session->set_flashdata('message', 'không tồn tại quản trị viên này');
            redirect(admin_url('customers'));
        }

        if($this->customers_model->delete($id))
        {
            //tao thong bao
            $this->session->set_flashdata('message', 'xóa thanh cong');
        }else
        {
            $this->session->set_flashdata('message', 'xóa khong thanh cong');
        }

        redirect(admin_url('customers'));
    }



}
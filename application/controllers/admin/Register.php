<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 12/06/2018
 * Time: 8:16 SA
 */

class Register extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('register_model');
    }

    /*
     * lấy danh sach cac các bảng đăng ký
     */
    function index()
    {
        $this->load->model('province_model');

        $list = $this->register_model->get_list();
        $this->data['list'] = $list;

        $list_provice = $this->province_model->get_list();
        $this->data['list_provice'] = $list_provice;


        $total = $this->register_model->get_total();
        $this->data['total'] = $total;

        //lay ra bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/register/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * chỉnh sửa bảng đăng ký
     */

    function edit()
    {
        $this->load->model('province_model');
        $this->load->library('form_validation');
        $this->load->helper('form');

        //lay cai id ra
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        $info = $this->register_model->get_info($id);

        if(!$info)
        {
            $this->session->set_flashdata('message', 'không tồn tại quản trị viên này');
            redirect(admin_url('register'));
        }
        //gui qua thong tin cua danh muc
        $this->data['info'] = $info;

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('phone', 'Số Điện Thoại', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //thêm dữ liệu vào trong tables
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $email = $this->input->post('email');
                $province_id = $this->input->post('province');
                $content = $this->input->post('content');

                $data = array(
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'province_id' => $province_id,
                    'content' => $content,
                );
                if($this->register_model->update($id, $data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'Cập nhật thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'Cập nhật khong thanh cong');
                }
                //chuyen ve trang danh sach
                redirect(admin_url('register'));
            }
        }

        // lấy danh sach tỉnh thành phố
        $list1 = $this->province_model->get_list();
        $this->data['list_provice'] = $list1;

        $this->data['temp'] = 'admin/register/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * xóa bảng đăng ký
     */

    function delete()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //lay id quan tri de chinh sua
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        $info = $this->register_model->get_info($id);

        if(!$info)
        {
            $this->session->set_flashdata('message', 'không tồn tại quản trị viên này');
            redirect(admin_url('register'));
        }

        if($this->register_model->delete($id))
        {
            //tao thong bao
            $this->session->set_flashdata('message', 'xóa thanh cong');
        }else
        {
            $this->session->set_flashdata('message', 'xóa khong thanh cong');
        }

        redirect(admin_url('register'));
    }

    function printer()
    {
        $this->load->model('province_model');

        $input = array();

        //loc theo ngày tạo
        $date_select = $this->input->get('date_select');
        if($date_select > 0){
            $date_select= date("Y-m-d", strtotime($date_select));
            $input['like'] = array('created', $date_select);
        }

        $list = $this->register_model->get_list($input);
        $this->data['list'] = $list;

        $list_provice = $this->province_model->get_list();
        $this->data['list_provice'] = $list_provice;


        $total = $this->register_model->get_total();
        $this->data['total'] = $total;

        //lay ra bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/register/table_printer';
        $this->load->view('admin/main', $this->data);
    }
}
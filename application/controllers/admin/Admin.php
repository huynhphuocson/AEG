<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 2:21 CH
 */
Class Admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    function index()
    {
        $input = array();
        $list = $this->admin_model->get_list($input);
        $this->data['list'] = $list;

        $total = $this->admin_model->get_total();
        $this->data['total'] = $total;

        //lay ra bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * kiểm ta user name da ton tai chua
     */
    function check_username()
    {
        $action = $this->uri->rsegment(2);
        $username = $this->input->post('username');
        $where = array('username' => $username);

        $check = true;
        if($action == 'edit'){
            $info = $this->data['info'];// lay ra thog tin quan tri vien
            if($info->username == $username){
                $check = false;
            }
        }

        //kiem tra username da ton tai chua
        if($check && $this->admin_model->check_exists($where))
        {
            $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
            return false;
        }
        return true;
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
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Tài Khoản Đăng Nhập', 'required|callback_check_username');
            $this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Nhập Lại Mật Khẩu', 'matches[password]');
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //thêm dữ liệu vào trong tables
                $name = $this->input->post('name');
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $data = array(
                    'name' => $name,
                    'username' => $username,
                    'password' => md5($password)
                );

                $permissions = $this->input->post('permissions');
                $data['permissions'] = json_encode($permissions);

                if($this->admin_model->create($data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'them thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'them khong thanh cong');
                }
                //chuyen ve trang danh sach quan tri vien
                redirect(admin_url('admin'));
            }
        }

        $this->config->load('permissions', true);
        $config_permissions = $this->config->item('permissions');
        $this->data['config_permissions'] = $config_permissions;

        $this->data['temp'] = 'admin/admin/add';
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

        $info = $this->admin_model->get_info($id);

        if(!$info)
        {
            $this->session->set_flashdata('message', 'không tồn tại quản trị viên này');
            redirect(admin_url('admin'));
        }
        //gui qua thong tin cua quan tri vien
        $info->permissions = json_decode($info->permissions);

        $this->data['info'] = $info;

        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Tài Khoản Đăng Nhập', 'required|callback_check_username');

            $password = $this->input->post('password');
            if($password)
            {
                $this->form_validation->set_rules('password', 'Mật Khẩu', 'required|min_length[6]');
                $this->form_validation->set_rules('re_password', 'Nhập Lại Mật Khẩu', 'matches[password]');
            }
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                $name = $this->input->post('name');
                $username = $this->input->post('username');

                $data = array(
                    'name' => $name,
                    'username' => $username,
                );
                //neu thay doi mat khau thi moi gan du lieu
                if($password)
                {
                    $data['password'] = md5($password);
                }

                $permissions = $this->input->post('permissions');
                $data['permissions'] = json_encode($permissions);


                if($this->admin_model->update($id, $data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'cập nhật thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'cập nhật khong thanh cong');
                }
                //chuyen ve trang danh sach quan tri vien
                redirect(admin_url('admin'));
            }

        }

        $this->config->load('permissions', true);
        $config_permissions = $this->config->item('permissions');
        $this->data['config_permissions'] = $config_permissions;

        $this->data['temp'] = 'admin/admin/edit';
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

        $info = $this->admin_model->get_info($id);

        if(!$info)
        {
            $this->session->set_flashdata('message', 'không tồn tại quản trị viên này');
            redirect(admin_url('admin'));
        }

        if($this->admin_model->delete($id))
        {
            //tao thong bao
            $this->session->set_flashdata('message', 'xóa thanh cong');
        }else
        {
            $this->session->set_flashdata('message', 'xóa khong thanh cong');
        }

        redirect(admin_url('admin'));
    }



}
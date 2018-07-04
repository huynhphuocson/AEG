<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 1:51 CH
 */
Class Login extends MY_Controller
{
    function index()
    {

        $this->load->library('form_validation');
        $this->load->helper('form');

        if($this->input->post())
        {
            $this->form_validation->set_rules('username', 'Tên Đăng Nhập', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            if($this->form_validation->run())
            {
                /*
                * kiem tra user name va password
                */
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $password = md5($password);

                $this->load->model('admin_model');
                $where = array('username' => $username, 'password' => $password);
                $admin = $this->admin_model->get_info_rule($where);


                if($admin)
                {
                    $this->session->set_userdata('permissions',json_decode($admin->permissions));
                    $this->session->set_userdata('admin_id',$admin->id);
                    $this->session->set_userdata('admin_name',$admin->name);
                    $this->session->set_userdata('login',true);

                    /*$t = $_SESSION['url_first'];
                    die($t."da dang nha65p ");

                    if(!(empty($t))){
                        redirect($t);
                    }*/
                    redirect(admin_url('home'));
                }
                $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
            }

        }
        $this->data['temp'] = 'admin/login/index';
        $this->load->view('admin/main', $this->data);
    }
}
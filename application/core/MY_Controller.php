<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 1:46 CH
 */

Class MY_Controller extends CI_Controller
{
    //biến gửi dữ kiệu trong view
    public $data = array();

    public function __construct()
    {
        // ke thua ci controller
        parent::__construct();

        if (!(empty($_SERVER['REQUEST_URI']))) {
            $t = $_SERVER["REQUEST_URI"];
            $this->session->set_userdata('url_first', $t);
        }

        $controller = $this->uri->segment(1);
        switch ($controller)
        {
            case 'admin':
                {
                    //xu ly du lieu khi truy cap vao trong admin
                    $this->load->helper('admin');
                    $this->_check_login();

                    //lấy menu
                    $this->load->model('menu_model');

                    $input = array();
                    $input['order'] = array('id', 'ASC');
                    $input['where'] = array('parent_id' => 0);
                    $menu_list = $this->menu_model->get_list($input);
                    foreach($menu_list as $row)
                    {
                        $input['where'] = array('parent_id' => $row->id);
                        $subs =  $this->menu_model->get_list($input);
                        $row->subs = $subs;
                    }

                    $this->data['menu_list'] = $menu_list;
                    break;
                }
            default:
                {
                    //xu ly du lieu trang ngoai
                   /* $this->_save_referer();*/
                }
        }
    }

    /*
     * kiểm tra đăng nhập hay chưa
     */

    private function _check_login()
    {
        $controller = $this->uri->segment('2');
        $controller = strtolower($controller);

        $login = $this->session->userdata('login');
        // neu chua dang nhap thi chuyen ve trang login
        if(!$login && $controller != 'login')
        {
            redirect(admin_url('login'));
        }
        if($login && $controller == 'login')
        {
            redirect(admin_url('home'));
        }
        elseif (!in_array($controller, array('login', 'home'))){
            //kiem tra quyen tai day
            $admin_id = $this->session->userdata('admin_id');
            $admin_root = $this->config->item('root_admin');
            if($admin_id != $admin_root) {

                $permissions_admin = $this->session->userdata('permissions');

                $controller = $this->uri->rsegment(1);
                $action     = $this->uri->rsegment(2);
                $check = true;
                if(!isset($permissions_admin->{$controller})){
                    $check = false;
                }
                $permissions_actions = $permissions_admin->{$controller};
                if(!in_array($action, $permissions_actions)){
                    $check = false;
                }
                if(!$check){
                    $this->session->set_flashdata('message', 'ban khong co quyen truy cap trang nay');
                    redirect(base_url('admin/home'));
                }
            }
        }
    }



}
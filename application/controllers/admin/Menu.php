<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 6:07 CH
 */
class Menu extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
    }

    /*
     * lấy danh sach cac menu
     */
    function index()
    {
        $list = $this->menu_model->get_list();
        $this->data['list'] = $list;

        $total = $this->menu_model->get_total();
        $this->data['total'] = $total;

        //lay ra bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/menu/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * them moi menu
     */
    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('url', 'URL', 'required');
            $this->form_validation->set_rules('sort_order', 'Thứ Tự', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //thêm dữ liệu vào trong tables
                $name = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');
                $url = $this->input->post('url');
                $controller = $this->input->post('controller');

                $data = array(
                    'parent_id' => $parent_id,
                    'title' => $name,
                    'url' => $url,
                    'sort_order' => intval($sort_order),
                    'controller' => $controller,
                );
                if($this->menu_model->create($data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'them thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'them khong thanh cong');
                }
                //chuyen ve trang danh sach
                redirect(admin_url('menu'));
            }
        }

        // lấy danh sach danh muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list1 = $this->menu_model->get_list($input);
        $this->data['list1'] = $list1;

        $this->data['temp'] = 'admin/menu/add';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * cập nhật danh muc
     */
    function edit()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //lay cai id ra
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        $info = $this->menu_model->get_info($id);

        if(!$info)
        {
            $this->session->set_flashdata('message', 'không tồn tại quản trị viên này');
            redirect(admin_url('menu'));
        }
        //gui qua thong tin cua danh muc
        $this->data['info'] = $info;

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('url', 'URL', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //thêm dữ liệu vào trong tables
                $name = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');
                $url = $this->input->post('url');

                $data = array(
                    'parent_id' => $parent_id,
                    'title' => $name,
                    'url' => $url,
                    'sort_order' => intval($sort_order)
                );
                if($this->menu_model->update($id, $data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'Cập nhật thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'Cập nhật khong thanh cong');
                }
                //chuyen ve trang danh sach
                redirect(admin_url('menu'));
            }
        }

        // lấy danh sach danh muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list1 = $this->menu_model->get_list($input);
        $this->data['list1'] = $list1;

        $this->data['temp'] = 'admin/menu/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * xóa danh muc
     */

    function delete()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //lay id quan tri de chinh sua
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        $info = $this->menu_model->get_info($id);

        if(!$info)
        {
            $this->session->set_flashdata('message', 'không tồn tại quản trị viên này');
            redirect(admin_url('menu'));
        }

        if($this->menu_model->delete($id))
        {
            //tao thong bao
            $this->session->set_flashdata('message', 'xóa thanh cong');
        }else
        {
            $this->session->set_flashdata('message', 'xóa khong thanh cong');
        }

        redirect(admin_url('menu'));
    }
}
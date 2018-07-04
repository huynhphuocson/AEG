<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 6:07 CH
 */
class Catalog_article extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('catalog_article_model');
    }

    /*
     * lấy danh sach cac san pham
     */
    function index()
    {
        $list = $this->catalog_article_model->get_list();
        $this->data['list'] = $list;

        $total = $this->catalog_article_model->get_total();
        $this->data['total'] = $total;

        //lay ra bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/catalog_article/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * them moi danh muc
     */
    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //thêm dữ liệu vào trong tables
                $name = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');

                $data = array(
                    'name' => $name,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order)
                );
                if($this->catalog_article_model->create($data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'them thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'them khong thanh cong');
                }
                //chuyen ve trang danh sach
                redirect(admin_url('catalog_article'));
            }
        }

        // lấy danh sach danh muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list1 = $this->catalog_article_model->get_list($input);
        $this->data['list1'] = $list1;

        $this->data['temp'] = 'admin/catalog_article/add';
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

        $info = $this->catalog_article_model->get_info($id);

        if(!$info)
        {
            $this->session->set_flashdata('message', 'không tồn tại quản trị viên này');
            redirect(admin_url('catalog_article'));
        }
        //gui qua thong tin cua danh muc
        $this->data['info'] = $info;

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //thêm dữ liệu vào trong tables
                $name = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');

                $data = array(
                    'name' => $name,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order)
                );
                if($this->catalog_article_model->update($id, $data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'Cập nhật thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'Cập nhật khong thanh cong');
                }
                //chuyen ve trang danh sach
                redirect(admin_url('catalog_article'));
            }
        }

        // lấy danh sach danh muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list1 = $this->catalog_article_model->get_list($input);
        $this->data['list1'] = $list1;

        $this->data['temp'] = 'admin/catalog_article/edit';
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

        $info = $this->catalog_article_model->get_info($id);

        if(!$info)
        {
            $this->session->set_flashdata('message', 'không tồn tại quản trị viên này');
            redirect(admin_url('catalog_article'));
        }

        if($this->catalog_article_model->delete($id))
        {
            //tao thong bao
            $this->session->set_flashdata('message', 'xóa thanh cong');
        }else
        {
            $this->session->set_flashdata('message', 'xóa khong thanh cong');
        }

        redirect(admin_url('catalog_article'));
    }
}
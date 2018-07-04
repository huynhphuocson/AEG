<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 08/06/2018
 * Time: 11:25 SA
 */

class Article_promotion extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('article_promotion_model');
    }

    /*
     * hiển thị danh sách bài viết
     */
    function index()
    {
        // lay ra tong so luong cac bài viết
        $total_rows = $this->article_promotion_model->get_total();
        $this->data['total_rows'] = $total_rows;
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();

        /*
         * dinh dạng cho pagination
         */
        $config['full_tag_open']    = '<div class=" text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        // $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';

        /*
         * khai báo config cho pagination
         */
        $config['total_rows'] = $total_rows; // tong tat ca cac san pham
        $config['base_url'] = admin_url('article_promotion/index'); //link hien thi ra du lieu
        $config['per_page'] = 5; //so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4; //phan doan hien thi ra so trang tren url
        $config['next_link'] = "Trang kế tiếp";
        $config['prev_link'] = "Trang trước";
        // khoi tao phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        //kiem tra co thuc hien loc du lieu hay khong
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if($id > 0){
            $input['where']['id'] = $id;
        }

        //loc theo ten tiêu đề bài viết
        $name = $this->input->get('title');
        if($name){
            $input['like'] = array('title', $name);
        }

        //loc theo danh muc san pham
        $catalog_id = $this->input->get('catalog');
        $catalog_id = intval($catalog_id);
        if($catalog_id > 0){
            $input['where']['catalog_article_id'] = $catalog_id;
        }

        //lay ra danh sach san pham
        $list = $this->article_promotion_model->get_list($input);
        $this->data['list'] = $list;

        //lấy danh sách danh muc san pham
        $this->load->model('catalog_article_model');
        $input1 = array();
        $input1['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_article_model->get_list($input1);
        foreach ($catalogs as $row){
            $input1['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_article_model->get_list($input1);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;


        //lay ra bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/article_promotion/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * them bài viết
     */
    function add()
    {
        //lấy danh sách danh muc bài viết
        $this->load->model('catalog_article_model');
        $input1 = array();
        $input1['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_article_model->get_list($input1);
        foreach ($catalogs as $row){
            $input1['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_article_model->get_list($input1);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;

        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('catalog', 'Thể Loại', 'required');
            $this->form_validation->set_rules('content', 'Nội Dung', 'required');
            $this->form_validation->set_rules('sort_order', 'Thứ Tự Hiển Thị', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //thêm dữ liệu vào trong tables
                $name = $this->input->post('name');
                $catalog_article_id = $this->input->post('catalog');
                $sort_order = $this->input->post('sort_order');

                //lay ten file anh minh hoa duoc upload len
                $this->load->library('upload_library');
                $upload_path = './public/upload/news';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }

                //upload các ảnh kèm theo
                $image_list = array();
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                $image_list = json_encode($image_list);

               // get date timesteam
               /* date_default_timezone_set('Asia/Ho_Chi_Minh');
                $dt = date('Y-m-d H:i:s');*/


                //lưu những dữ liệu kèm theo
                $data = array(
                    'title' => $name,
                    'content' => $this->input->post('content'),
                    'image_link' => $image_link,
                    'catalog_article_id' =>  $catalog_article_id,
                    'image_list' => $image_list,
                    'sort_order' => intval($sort_order),
                );
                if($this->article_promotion_model->create($data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'them thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'them khong thanh cong');
                }
                //chuyen ve trang danh sach
                redirect(admin_url('article_promotion'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/article_promotion/add';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * chỉnh sửa bài viết
     */
    function edit()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->segment('4');
        $id = intval($id);
        $product = $this->article_promotion_model->get_info($id);
        if(!$product)
        {
            $this->session->set_flashdata('message', 'không tồn tại bài viết này');
            redirect(admin_url('article_promotion'));
        }
        $this->data['product'] = $product;

        //lấy danh sách danh muc san pham
        $this->load->model('catalog_article_model');
        $input1 = array();
        $input1['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_article_model->get_list($input1);
        foreach ($catalogs as $row){
            $input1['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_article_model->get_list($input1);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;

        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('catalog', 'Thể Loại', 'required');
            $this->form_validation->set_rules('content', 'Nội dung', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //thêm dữ liệu vào trong tables
                $name = $this->input->post('name');
                $catalog_article_id = $this->input->post('catalog');
                $sort_order = $this->input->post('sort_order');

                //lay ten file anh minh hoa duoc upload len
                $this->load->library('upload_library');
                $upload_path = './public/upload/news';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }

                //upload các ảnh kèm theo
                $image_list = array();
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                $image_list_json = json_encode($image_list);

                //lưu những dữ liệu kèm theo
                $data = array(
                    'title' => $name,
                    'content' => $this->input->post('content'),
                    'catalog_article_id' =>  $catalog_article_id,
                    'sort_order' => intval($sort_order)
                );
                if($image_link != '')
                {
                    $data['image_link'] = $image_link;
                }
                if(!empty($image_list))
                {
                    $data['image_list'] = $image_list_json;
                }
                if($this->article_promotion_model->update($id, $data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'Cập nhật thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'Cập nhật khong thanh cong');
                }
                //chuyen ve trang danh sach
                redirect(admin_url('article_promotion'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/article_promotion/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * xóa sản phẩm
     */
    function delete()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->segment('4');
        $id = intval($id);
        $product = $this->article_promotion_model->get_info($id);
        if(!$product)
        {
            $this->session->set_flashdata('message', 'không tồn tại bài viết này');
            redirect(admin_url('article_promotion'));
        }

        if(file_exists('./public/upload/news/'.$product->image_link))
        {
            //xoá ảnh kèm theo
            unlink('./public/upload/news/'.$product->image_link);
        }

        //xoá các ảnh link kết
        $image_list = json_decode($product->image_list);
        if(is_array($image_list)){
            foreach ($image_list as $img)
            {
                $image_link = './public/upload/news/'.$img;
                if(file_exists($image_link))
                {
                    //xoá ảnh kèm theo
                    unlink($image_link);
                }
            }
        }

        if($this->article_promotion_model->delete($id))
        {
            //tao thong bao
            $this->session->set_flashdata('message', 'xóa thanh cong');
        }else
        {
            $this->session->set_flashdata('message', 'xóa khong thanh cong');
        }

        redirect(admin_url('article_promotion'));
    }

}
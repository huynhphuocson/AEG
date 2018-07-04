<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 26/05/2018
 * Time: 4:01 CH
 */
Class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    /*
     * hiển thị danh sách sản phẩm
     */
    function index()
    {
        // lay ra tong so luong cac san pham
        $total_rows = $this->product_model->get_total();
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
        $config['base_url'] = admin_url('product/index'); //link hien thi ra du lieu
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

        //loc theo ten san pham
        $name = $this->input->get('name');
        if($name){
            $input['like'] = array('product_name', $name);
        }

        //loc theo danh muc san pham
        $catalog = $this->input->get('catalog');
        if(!empty($catalog)){
            $input['where']['category'] = $catalog;
        }

        //lay ra danh sach san pham
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;


        //lay ra bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * them san pham
     */
    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //load nhà cung cấp
        $this->load->model('suppliers_model');
        $suppliers = $this->suppliers_model->get_list();
        $this->data['suppliers'] = $suppliers;

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('product_name', 'Tên', 'required');
            $this->form_validation->set_rules('product_code', 'Mã code', 'required');
            $this->form_validation->set_rules('standard_cost', 'Giá', 'required');
            $this->form_validation->set_rules('list_price', 'Giá bán chính thức', 'required');
            $this->form_validation->set_rules('quantity_per_unit', 'Số lượng trên một đơn vị', 'required');
            $this->form_validation->set_rules('minimum_reorder_quantity', 'Số lượng đặt ít nhất', 'required');
            $this->form_validation->set_rules('catalog', 'Thể loại', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //thêm dữ liệu vào trong tables
                $product_name = $this->input->post('product_name');
                $product_code = $this->input->post('product_code');
                $standard_cost = $this->input->post('standard_cost');
                $list_price = $this->input->post('list_price');
                $quantity_per_unit = $this->input->post('quantity_per_unit');
                $minimum_reorder_quantity = $this->input->post('minimum_reorder_quantity');
                $catalog = $this->input->post('catalog');
                $suppliers = intval($this->input->post('suppliers'));
                $description = $this->input->post('description');

                //lưu những dữ liệu kèm theo
                $data = array(
                    'supplier_ids' => $suppliers,
                    'product_name' => $product_name,
                    'product_code' =>  $product_code,
                    'standard_cost' => $standard_cost,
                    'list_price' => $list_price,
                    'quantity_per_unit' => $quantity_per_unit,
                    'minimum_reorder_quantity' => $minimum_reorder_quantity,
                    'category' => $catalog,
                    'description' => $description,
                );
                if($this->product_model->create($data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'them thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'them khong thanh cong');
                }
                //chuyen ve trang danh sach
                redirect(admin_url('product'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/product/add';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * chỉnh sửa sản phẩm
     */
    function edit()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->segment('4');
        $id = intval($id);
        $product = $this->product_model->get_info($id);
        if(!$product)
        {
            $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
            redirect(admin_url('product'));
        }
        $this->data['product'] = $product;


        //load nhà cung cấp
        $this->load->model('suppliers_model');
        $suppliers = $this->suppliers_model->get_list();
        $this->data['suppliers'] = $suppliers;

        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('list_price', 'Giá bán chính thức', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //thêm dữ liệu vào trong tables
                $product_name = $this->input->post('product_name');
                $product_code = $this->input->post('product_code');
                $standard_cost = $this->input->post('standard_cost');
                $list_price = $this->input->post('list_price');
                $quantity_per_unit = $this->input->post('quantity_per_unit');
                $minimum_reorder_quantity = $this->input->post('minimum_reorder_quantity');
                $catalog = $this->input->post('catalog');
                $suppliers = intval($this->input->post('suppliers'));
                $description = $this->input->post('description');

                //lưu những dữ liệu kèm theo
                $data = array(
                    'supplier_ids' => $suppliers,
                    'product_name' => $product_name,
                    'product_code' =>  $product_code,
                    'standard_cost' => $standard_cost,
                    'list_price' => $list_price,
                    'quantity_per_unit' => $quantity_per_unit,
                    'minimum_reorder_quantity' => $minimum_reorder_quantity,
                    'category' => $catalog,
                    'description' => $description,
                );
                if($this->product_model->update($id, $data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'Cập nhật thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'Cập nhật khong thanh cong');
                }
                //chuyen ve trang danh sach
                redirect(admin_url('product'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/product/edit';
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
        $product = $this->product_model->get_info($id);
        if(!$product)
        {
            $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
            redirect(admin_url('product'));
        }
        if($this->product_model->delete($id))
        {
            //tao thong bao
            $this->session->set_flashdata('message', 'xóa thanh cong');
        }else
        {
            $this->session->set_flashdata('message', 'xóa khong thanh cong');
        }

        redirect(admin_url('product'));
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 2:21 CH
 */
Class Orders extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('orders_model');
    }

    function index()
    {
        // lay ra tong so luong cac san pham
        $total_rows = $this->orders_model->get_total();
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
        $config['base_url'] = admin_url('orders/index'); //link hien thi ra du lieu
        $config['per_page'] = 15; //so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4; //phan doan hien thi ra so trang tren url
        $config['next_link'] = "Trang kế tiếp";
        $config['prev_link'] = "Trang trước";
        // khoi tao phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        $list = $this->orders_model->get_list($input);
        $this->data['list'] = $list;


        //lay ra bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/orders/index';
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
                $notes           = $this->input->post('notes');

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
                    'notes' => $notes,
                );

                if($this->orders_model->create($data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'them thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'them khong thanh cong');
                }
                //chuyen ve trang danh sach quan tri vien
                redirect(admin_url('Orders'));
            }
        }

        $this->data['temp'] = 'admin/orders/add';
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

        $info = $this->orders_model->get_info($id);

        if(empty($info))
        {
            $this->session->set_flashdata('message', 'không tồn tại đặt hàng này');
            redirect(admin_url('orders'));
        }
        $this->data['info'] = $info;

        $this->load->model('customers_model');
        $list_cus = $this->customers_model->get_list();
        $this->data['list_cus'] = $list_cus;

        $this->load->model('employees_model');
        $list_emp = $this->employees_model->get_list();
        $this->data['list_emp'] = $list_emp;

        $this->load->model('order_status_model');
        $list_ordsta = $this->order_status_model->get_list();
        $this->data['list_ordsta'] = $list_ordsta;

        $this->load->model('shippers_model');
        $list_shipper = $this->shippers_model->get_list();
        $this->data['list_shipper'] = $list_shipper;

        if($this->input->post())
        {
            $this->form_validation->set_rules('name_emp', 'Tên nhân viên', 'required');
            $this->form_validation->set_rules('name_cus', 'Tên nhân viên', 'required');
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                $employee_id    = $this->input->post('name_emp');
                $customer_id    = $this->input->post('name_cus');
                $order_date     = $this->input->post('order_date');
                $shipped_date   = $this->input->post('shipped_date');
                $shipper_id     = $this->input->post('shipper_id');
                $ship_name      = $this->input->post('ship_name');
                $ship_address   = $this->input->post('ship_address');
                $ship_city       = $this->input->post('ship_city');
                $ship_state_province = $this->input->post('ship_state_province');
                $ship_zip_postal_code = $this->input->post('ship_zip_postal_code');
                $ship_country_region  = $this->input->post('ship_country_region');
                $shipping_fee   = $this->input->post('shipping_fee');
                $payment_type   = $this->input->post('payment_type');
                $paid_date      = $this->input->post('paid_date');
                $status_orders  = $this->input->post('status_orders');

                $data = array(
                    'employee_id' => $employee_id,
                    'customer_id' => $customer_id,
                    'order_date' => $order_date,
                    'shipped_date' => $shipped_date,
                    'shipper_id' => $shipper_id,
                    'ship_name' => $ship_name,
                    'ship_address' => $ship_address,
                    'ship_city' => $ship_city,
                    'ship_state_province' => $ship_state_province,
                    'ship_zip_postal_code' => $ship_zip_postal_code,
                    'ship_country_region' => $ship_country_region,
                    'shipping_fee' => $shipping_fee,
                    'taxes' => '',
                    'payment_type' => $payment_type,
                    'paid_date' => $paid_date,
                    'notes' => '',
                    'tax_rate' => '0',
                    'tax_status_id' => '',
                    'status_id' => $status_orders,
                );

                if($this->orders_model->update($id, $data))
                {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'cập nhật thanh cong');
                }else
                {
                    $this->session->set_flashdata('message', 'cập nhật khong thanh cong');
                }
                //chuyen ve trang danh sach quan tri vien
                redirect(admin_url('orders'));
            }

        }

        $this->data['temp'] = 'admin/orders/edit';
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

        $info = $this->orders_model->get_info($id);

        if(!$info)
        {
            $this->session->set_flashdata('message', 'không tồn tại quản trị viên này');
            redirect(admin_url('Orders'));
        }

        if($this->orders_model->delete($id))
        {
            //tao thong bao
            $this->session->set_flashdata('message', 'xóa thanh cong');
        }else
        {
            $this->session->set_flashdata('message', 'xóa khong thanh cong');
        }

        redirect(admin_url('Orders'));
    }

    function detail(){

        $this->load->library('form_validation');
        $this->load->helper('form');

        //lay id quan tri de chinh sua
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        $info = $this->orders_model->get_list_detail($id);

        if(empty($info))
        {
            $this->session->set_flashdata('message', 'không tồn tại đặt hàng này');
            redirect(admin_url('orders'));
        }
        $this->data['info'] = $info;

        $this->load->model('order_status_model');
        $list_ordsta = $this->order_status_model->get_list();
        $this->data['list_ordsta'] = $list_ordsta;

        $this->load->model('employees_model');
        $list_emp = $this->employees_model->get_list();
        $this->data['list_emp'] = $list_emp;

        if($this->input->post()) {
            $this->form_validation->set_rules('status_orders', 'Tình trạng đơn hàng', 'required');
            if($this->form_validation->run()) {
                $order_id       = $this->input->post('id');
                $employee_id    = $this->input->post('name_emp');
                $status_orders  = $this->input->post('status_orders');
                $data = array(
                    'employee_id' => $employee_id,
                    'status_id' => $status_orders
                );
                if($status_orders == '1'){
                    $this->load->model('invoices_model');
                    $data1 = array(
                        'order_id' => $order_id,
                    );
                    if($this->invoices_model->create($data1)) {
                        if ($this->orders_model->update($id, $data)) {
                            $this->session->set_flashdata('message', 'tạo hoá đơn thanh cong');
                            redirect(admin_url('orders'));
                        }
                    }
                }
                else {
                    if ($this->orders_model->update($id, $data)) {
                        //tao thong bao
                        $this->session->set_flashdata('message', 'cập nhật thanh cong');
                    } else {
                        $this->session->set_flashdata('message', 'cập nhật khong thanh cong');
                    }
                    //chuyen ve trang danh sach quan tri vien
                    redirect(admin_url('orders'));
                }
            }
        }

        $this->data['temp'] = 'admin/orders/detail';
        $this->load->view('admin/main', $this->data);
    }



}
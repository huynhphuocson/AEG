<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 07/06/2018
 * Time: 10:44 SA
 */

class Home extends MY_Controller
{
    function index()
    {
        if (!(empty($_SERVER['HTTP_REFERER']))){
            $t = $_SERVER["HTTP_REFERER"];
            $this->session->set_userdata('referer', $t);
        }

        $this->load->model('article_promotion_model');
        $input = array();

        /*blockIelts*/
        $input['where'] = array('catalog_article_id' => 2);
        $input['order'] = array('created', 'DESC');
        $input['limit'] = array('1', '0');
        $advance_list = $this->article_promotion_model->get_list($input);
        $this->data['advance_list'] = $advance_list;
        /*End blockIelts*/

        /*blockwhychoseAEG*/
        /*vi trí bên phải*/
        $input['where'] = array('catalog_article_id' => 3, 'sort_order' => 1);
        $chose_list1 = $this->article_promotion_model->get_list($input);
        $this->data['chose_list1'] = $chose_list1;
        /*vị trí giữa phải*/
        $input['where'] = array('catalog_article_id' => 3, 'sort_order' => 2);
        $chose_list2 = $this->article_promotion_model->get_list($input);
        $this->data['chose_list2'] = $chose_list2;
        /*vị trí giữa trái*/
        $input['where'] = array('catalog_article_id' => 3, 'sort_order' => 3);
        $chose_list3 = $this->article_promotion_model->get_list($input);
        $this->data['chose_list3'] = $chose_list3;
        /*vị trí bên trái*/
        $input['where'] = array('catalog_article_id' => 3, 'sort_order' => 4);
        $chose_list4 = $this->article_promotion_model->get_list($input);
        $this->data['chose_list4'] = $chose_list4;
        /*End blockwhychoseAEG*/

        /*block share*/
        $input['where'] = array('catalog_article_id' => 4, 'sort_order' => 1);
        $share_list1 = $this->article_promotion_model->get_list($input);
        $this->data['share_list1'] = $share_list1;
        $input['where'] = array('catalog_article_id' => 4, 'sort_order' => 2);
        $share_list2 = $this->article_promotion_model->get_list($input);
        $this->data['share_list2'] = $share_list2;
        $input['where'] = array('catalog_article_id' => 4, 'sort_order' => 3);
        $share_list3 = $this->article_promotion_model->get_list($input);
        $this->data['share_list3'] = $share_list3;
        $input['where'] = array('catalog_article_id' => 4, 'sort_order' => 4);
        $share_list4 = $this->article_promotion_model->get_list($input);
        $this->data['share_list4'] = $share_list4;
        /*end block share*/

        /*
         * load tỉnh thành phố
         */
        $this->load->model('province_model');
        $input1 = array();
        $input1['order'] = array('id', 'ASC');
        $province = $this->province_model->get_list($input1);
        $this->data['province'] = $province;

        $this->data['temp'] = 'user/home/index';
        $this->load->view('user/main', $this->data);
    }

    /*
     * them moi danh muc
     */
    function add()
    {
        if(isset($_SESSION['referer'])){
            $t = $_SESSION['referer'];
        }else{
            $t = $_SERVER['REQUEST_URI'];
        }

        $uri = $_SERVER['HTTP_REFERER'];
        $this->load->model('register_model');

        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('phone', 'Số Điện Thoại', 'required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('city', 'Thành Phố', 'required');

            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //thêm dữ liệu vào trong tables
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $email = $this->input->post('email');
                $city = $this->input->post('city');
                $content = $this->input->post('content');

                $data = array(
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'province_id' => $city,
                    'content' => $content,
                    'url_referer' => $t,
                    'url_current' => $uri,
                );
                if ($this->register_model->create($data)) {
                    //tao thong bao
                    $this->session->set_flashdata('message', 'them thanh cong');
                } else {
                    $this->session->set_flashdata('message', 'them khong thanh cong');
                }
                //chuyen ve trang danh sach
                unset($_SESSION['referer']);
                redirect('home');
            }
        }
    }
}
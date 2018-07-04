<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 27/06/2018
 * Time: 4:50 CH
 */
Class Orders_model extends MY_Model
{
    var $table = 'orders';

    /**
     * thực hiện câu câu select bằng where là 1 chuỗi
     * input là 1 chuỗi where
     */

    function get_list_where($params_input = array()){

            $order_date_from = $params_input['order_date_from'];
            $order_date_to = $params_input['order_date_to'];
            $group_by = $params_input['group_by'];

            $this->db->select('COUNT(*) as soluong, order_date');
            if(!empty($params_input['status_id'])){
                $status_id = $params_input['status_id'];
                $this->db
                    ->where("status_id = $status_id ")
                    ->where("order_date >= '$order_date_from' ")
                    ->where("order_date <= '$order_date_to' ");
            }else{
                $this->db
                    ->where("order_date >= '$order_date_from' ")
                    ->where("order_date <= '$order_date_to' ");
            }

            $this->db->group_by($group_by);

            $query = $this->db->get($this->table);
            return $query->result();
    }

    /**
     * 2 field soluong, order_date
     * thực hiện câu câu select chỉ gôm nhóm
     * input là 1 chuỗi group bySSSSSSSS
     */

    function get_list_by($str_groupby){
        $this->db->select('COUNT(*) as soluong, order_date');
        $this->db->group_by($str_groupby);

        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * hàm lấy nhiều field từ nhiều bảng khác nhau
     */
    function get_list_detail($id)
    {
        $this->db
            ->select("od.id , od.employee_id, od.customer_id, od.order_date, cus.last_name as name_cus, emp.last_name as name_emp, odsta.status_name,")
            ->select("od.shipped_date, od.shipper_id, od.ship_name, od.ship_address, od.ship_city, od.ship_state_province, ")
            ->select("od.ship_zip_postal_code, od.ship_country_region, od.shipping_fee, od.payment_type, od.paid_date, od.status_id");
        $this->db->from("orders od, customers cus, employees emp, orders_status odsta");
        $this->db
            ->where("od.customer_id = cus.id and od.employee_id = emp.id and od.status_id = odsta.id")
            ->where("od.id = $id");
        $this->db->limit('1');

        $query = $this->db->get($this->table);
        return $query->result();
    }
}
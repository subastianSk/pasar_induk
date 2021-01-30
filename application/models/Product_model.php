<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_products()
    {
        return $this->db
        ->order_by('add_date', 'DESC')
        ->limit(8)
        ->get('products')
        ->result();
    }

    public function get_belanja()
    {
        return $this->db
        ->order_by('category_id', 'DESC')
        ->limit(24)
        ->get('products')
        ->result();
    }

    public function search_by_products($query, $limit, $start)
    {
        $products = $this->db->like('name', $query)->or_like('description', $query)->get('products', $limit, $start)->result();

        return $products;
    }

    public function best_deal_product()
    {
        $data = $this->db->where('is_available', 1)
            ->order_by('current_discount', 'DESC')
            ->limit(1)
            ->get('products')
            ->row();

        return $data;
    }

    public function is_product_exist($id, $sku)
    {
        return ($this->db->where(array('id' => $id, 'sku' => $sku))->get('products')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function product_data($id)
    {
        $data = $this->db->query("
            SELECT p.*, pc.name as category_name
            FROM products p
            JOIN product_category pc
                ON pc.id = p.category_id
            WHERE p.id = '$id'
        ")->row();

        return $data;
    }

    public function related_products($current, $category)
    {
        return $this->db->where(array('id !=' => $current, 'category_id' => $category))->limit(4)->get('products')->result();
    }

    public function create_order(Array $data)
    {
        $this->db->insert('orders', $data);

        return $this->db->insert_id();
    }

    public function promo()
    {
        return $this->db->order_by('expired_date', 'DESC')->get('coupons')->result();
    }

    public function create_order_items($data)
    {
        return $this->db->insert_batch('order_item', $data);
    }
}
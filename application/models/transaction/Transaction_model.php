<?php

class Transaction_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function get_transaction_history()
    {
        if($this->session->userdata('position') ==1){
            if($this->session->userdata('staff_position') == 1){
            $this->db->select('t.*');
            $this->db->from('transactions as t');
            $this->db->order_by('t.id', 'desc');
            }else{
            $user_id = $this->session->userdata('staff_id');
            $this->db->select('t.*');
            $this->db->from('transactions as t');
            $this->db->join('client_details as c', 'c.id = t.contact_id', 'left');
            $this->db->where('c.manager' , $user_id);
            $this->db->order_by('t.id', 'desc');
            }
        } else{
            $user_id = $this->session->userdata('id');
            $this->db->select('t.*');
            $this->db->from('transactions as t');
            $this->db->where('t.id' , $user_id);
            $this->db->order_by('t.id', 'desc');
        }

        $query = $this->db->get()->result();
        return $query;

    }

    public function get_demo_account()
    {
        $user_id = $this->session->userdata('client_id');
        $this->db->from('mt_demo_account');
        $this->db->where('contact_id' , $user_id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_live_account()
    {
        $user_id = $this->session->userdata('client_id');
        $this->db->from('mt_live_account');
        $this->db->where('contact_id' , $user_id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_pending_transaction()
    {
        // $user_id = $this->session->userdata('contact_id');
        $this->db->select('t.*, CONCAT (C.first_name, " ", C.last_name) as full_name');
        $this->db->from('transactions as t');
        $this->db->join('client_details as C', 't.contact_id = C.id', 'left');
        $this->db->where('t.action', 1);
        $this->db->where('t.status', 0);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_pending_withdraw()
    {
        // $user_id = $this->session->userdata('contact_id');
        $this->db->select('t.*, CONCAT (C.first_name, " ", C.last_name) as full_name');
        $this->db->from('transactions as t');
        $this->db->join('client_details as C', 't.contact_id = C.id', 'left');
        $this->db->where('t.action', 2);
        $this->db->where('t.status', 0);
        $query = $this->db->get()->result();
        return $query;
    }

    public function insert_transaction($data)
    {
        if ($this->db->insert('transactions', $data)) {
            return TRUE;
        }
    }

    public function process_transaction($t_id){
        $this->db->where('id', $t_id);
        $this->db->set(['status'=> 1, 'processed'=> 1]);
        $this->db->update('transactions');
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            log_message('error', 'Database Insert Error: ' . json_encode($this->db->error()));
            return false;
        }
    }

    public function reject_transaction($t_id){
        $this->db->where('id', $t_id);
        $this->db->set(['status'=> 1, 'processed'=> 0]);
        $this->db->update('transactions');
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            log_message('error', 'Database Insert Error: ' . json_encode($this->db->error()));
            return false;
        }
    }

}
<?php


class Staff_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_country()
    {
        $this->db->from('countries');
        $this->db->order_by('country', "asc");
        $query = $this->db->get()->result();
        return $query;
    }

    public function insert_staff($data)
    {
        if ($this->db->insert('staff_details', $data)) {
            return TRUE;
        }else{
            log_message('error', 'Database Insert Error: ' . json_encode($this->db->error()));
            return false;
        }
    }

    public function insert_user($data)
    {
        if ($this->db->insert('user_details', $data)) {
            return TRUE;
        }
    }

    public function check_exist($email){
        $data = $this->db->select('U.*')
                ->from('user_details as U')
                ->where('U.username',$email)
                ->get();
        return $data;
    }

    public function get_staff(){
        $data = $this->db->select('S.*')
                ->from('staff_details as S')
                ->order_by('first_name','asc')
                ->get();
        return $data->result();
    }

    public function get_staff_details($staff_id){
        $data = $this->db->select('S.*')
                ->from('staff_details as S')
                ->where('staff_id',$staff_id)
                ->get();
        return $data->row_array();
    }

    public function update_staff($data,$staff_id){
       
        $this->db->where('staff_id', $staff_id);
        $this->db->set($data);
        $this->db->update('staff_details');
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            log_message('error', 'Database Insert Error: ' . json_encode($this->db->error()));
            return false;
        }
    }
}
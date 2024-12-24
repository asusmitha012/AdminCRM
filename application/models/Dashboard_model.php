<?php
class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_userdata($user_id)
    {
        $this->db->select('client_details.*, countries.country, CONCAT(staff_details.first_name, " ", staff_details.last_name) as manager_name');
        $this->db->from('client_details');
        $this->db->where('client_details.id', $user_id);
        $this->db->join('countries', 'client_details.country = countries.id', 'left');
        $this->db->join('staff_details', 'staff_details.staff_id = client_details.manager', 'left');

        $query = $this->db->get()->row();
        return $query;
    }
    public function get_staffdata($user_id)
    {
        $this->db->select('staff_details.*, countries.country');
        $this->db->from('staff_details');
        $this->db->where('staff_id', $user_id);
        $this->db->join('countries', 'staff_details.country = countries.id', 'left');
        $query = $this->db->get()->row();
        return $query;
    }

}
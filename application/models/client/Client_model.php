<?php


class Client_model extends CI_Model
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

    public function insert_client($data)
    {
        if ($this->db->insert('client_details', $data)) {
            return TRUE;
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

    public function get_client(){
        $user_id = $this->session->userdata('contact_id');
        if($this->session->userdata('staff_position')==1){
            $data = $this->db->select('C.*,CONCAT(S.first_name, " ", S.last_name) as manager_name')
                    ->from('client_details as C')
                    ->join('staff_details as S', 'C.manager = S.staff_id', 'left')
                    ->order_by('c.id', 'desc')
                    ->get();
            return $data->result();
        }
        if($this->session->userdata('staff_position') == 2){
            $data = $this->db->select('C.*,CONCAT(S.first_name, " ", S.last_name) as manager_name')
                    ->from('client_details as C')
                    ->join('staff_details as S', 'C.manager = S.staff_id', 'left')
                    ->where('c.manager', $user_id)
                    ->order_by('c.id', 'desc')
                    ->get();
            return $data->result();
        }
    }

    public function get_client_details($id){
        $data = $this->db->select('C.*,CONCAT(S.first_name, " ", S.last_name) as manager_name')
                ->from('client_details as C')
                ->join('staff_details as S', 'C.manager = S.staff_id', 'left')
                ->where('C.id',$id)
                ->get();
        return $data->row_array();
    }

    public function get_manager_details(){
        $data = $this->db->select('S.*')
                ->from('staff_details as S')
                ->get();
        return $data->result();
    }

    public function update_client($data,$client_id){
       
        $this->db->where('id', $client_id);
        $this->db->set($data);
        $this->db->update('client_details');
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            log_message('error', 'Database Insert Error: ' . json_encode($this->db->error()));
            return false;
        }
    }

    public function get_client_document($client_id)
    {
        $this->db->from('client_documents');
        $this->db->where('id', $client_id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function upload_document($data)
    {
        if($this->db->insert('client_documents',$data)){
            return TRUE;
        }
    }

    public function upload_document_update($data,$client_id){
        $this->db->where('contact_id',$client_id);
        $this->db->set($data);
        $this->db->update('client_documents');
        log_message('info', 'DB Update Data: ' . json_encode($data));
        if($this->db->affected_rows() > 0){
            return true;
        }
        else{
            log_message('error', 'Database Insert Error: ' . json_encode($this->db->error()));
            return false;
        }
    }

    public function document_verify($data,$id){
        $this->db->where('contact_id', $id);
        $this->db->set($data);
        $this->db->update('client_documents');
        if($this->db->affected_rows() > 0){
            return true;
        }
        else{
            log_message('error', 'Database Insert Error: ' . json_encode($this->db->error()));
            return false;
        }
    }

    public function user_verify($id){
        $this->db->where('id',$id);
        $this->db->set('verify',1);
        $this->db->update('client_details');
        if($this->db->affected_rows() > 0){
            return true;
        }
        else{
            log_message('error', 'Database Insert Error: ' . json_encode($this->db->error()));
            return false;
        }
    }

}
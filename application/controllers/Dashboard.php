<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('login');
        }
        $this->load->model('Dashboard_model', 'MDashboard');
        $this->load->model('client/Client_model', 'CModel');
        $this->load->model('staff/Staff_model', 'SModel');
    }

	public function index()
	{
        $user_id = $this->session->userdata('contact_id');
        $position = $this->session->userdata('position');
        $breadcrumb = array(
            0 => array('title' => 'Home', 'status' => 0, 'link' => base_url('home/dashboard')),
            1 => array('title' => 'Dashboard', 'status' => 1),
        );
        $data['main_menu'] = 'dashboard';
        $data['title'] = 'Dashboard';
        $data['breadcrumb'] = bread_crump_maker($breadcrumb);
		
		$data['user_name'] = $this->session->flashdata('uname');

        if($position == 1){
            $data['template'] = 'dashboard';
            $this->load->view('template/crm_template', $data);
        }
        else{
            $data['template'] = 'dashboard_client';
            $this->load->view('template/crm_template', $data);
        }
	}

    public function my_profile(){
        $user_id = $this->session->userdata('contact_id');
        $position = $this->session->userdata('position');
        if($position == 1){
            $data['title'] = 'Profile';
            $data['result'] = $this->MDashboard->get_staffdata($user_id);
            $data['client_document_details'] = '';
            $data['template'] = 'myprofile_staff';
        }else{
            $data['result'] = $this->MDashboard->get_userdata($user_id);
            $data['title'] = 'Profile';
            $data['client_document_details'] = $this->CModel->get_client_document($user_id);
            // $data['bank_data'] = $this->CModel->get_bankdetails($user_id);
            $data['template'] = 'myprofile_client';
        }
        
        $this->load->view('template/crm_template', $data);
    }
}

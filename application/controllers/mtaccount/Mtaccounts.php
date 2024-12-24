<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtaccounts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('login');
        }
        
        // $this->load->model('mt/Mt_model','MModel');
    }

    public function index()
	{
        if($this->session->userdata('staff_position') == 1 || $this->session->userdata('staff_position') == 2)
        {
            // $data['account_details'] = $this->MModel->get_demo_accounts();
            $data['title'] = 'Demo';
            $data['template'] = 'mt/demo_show';
            $this->load->view('template/crm_template', $data);
        }else{
            redirect('error');
        }
	}

    public function live_accounts(){
        if($this->session->userdata('staff_position') == 1 || $this->session->userdata('staff_position') == 2)
        {
            // $data['account_details'] = $this->MModel->get_demo_accounts();
            $data['title'] = 'Live';
            $data['template'] = 'mt/live_show';
            $this->load->view('template/crm_template', $data);
        }else{
            redirect('error');
        }
    }


}
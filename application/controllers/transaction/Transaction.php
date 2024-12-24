<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('login');
        }
        
        $this->load->model('transaction/Transaction_model','TModel');
    }

    public function index()
	{
        $data['demo_account'] = $this->TModel->get_demo_account();
        $data['live_account'] = $this->TModel->get_live_account();
        $data['title'] = 'Transactions';
        $data['template'] = 'transaction/client_transaction';
        $this->load->view('template/crm_template', $data);
	}
    
    public function success_transaction()
    {
        if($this->session->userdata('staff_position') == 1 || $this->session->userdata('staff_position') == 2)
        {
            $data['template'] = 'transaction/success_transaction';
            $data['title'] = 'Success';
            $this->load->view('template/crm_template', $data);
        }else{
            redirect('error');

        }
        // $data['success_transactions_deposit'] = $this->TModel->get_success_transactions_deposit();
        // $data['success_transactions_withdraw'] = $this->TModel->get_success_transactions_withdraw();
        
    }

    public function transaction_history()
    {
        $data['transactions_history'] = $this->TModel->get_transaction_history();
        $data['title'] = 'History';
        $data['template'] = 'transaction/transaction_history';
        $this->load->view('template/crm_template', $data);
    }

    public function pending_transaction()
    {
        $data['pending_transaction'] = $this->TModel->get_pending_transaction();
        $data['title'] = 'Pending';
        $data['template'] = 'transaction/pending_transaction';
        $this->load->view('template/crm_template',$data);
    }

    public function save_transaction()
    {
      $contact_id = $this->session->userdata('id');
      $action = $this->input->post('action');
      $account = $this->input->post('account');
      $type = $this->input->post('type');
      $amt = $this->input->post('amount');
      $data = array('contact_id'=> $contact_id, 'login'=> '8948', 'action'=> $action, 'type'=> $type, 'actual_amt'=> $amt, 'credited_amt'=> $amt, 'status'=>0, 'processed'=>0);
      if($this->TModel->insert_transaction($data)){
        echo json_encode(array('status' => 1, 'view' => $this->load->view('transaction/client_transaction', $data, TRUE)));
        return;
      } 
      else{
        echo json_encode(array('status' => 2, 'view' => $this->load->view('transaction/client_transaction', $data, TRUE)));
        return;
      } 
    }

    public function pending_deposit()
    {
        // $id = $this->input->post('client_id');
        $data['pending_deposit'] = $this->TModel->get_pending_transaction();
        $this->load->view('transaction/pending_deposit',$data);
    }

    public function pending_withdraw()
    {
        $data['pending_withdraw'] = $this->TModel->get_pending_withdraw();
        $this->load->view('transaction/pending_withdraw',$data);
    }

    public function process_transaction()
    {
        $contact_id = $this->session->userdata('id');
        $t_id = $this->input->post('transaction_id');
        $action = $this->input->post('action');
        if($this->TModel->process_transaction($t_id)){
            echo json_encode(array('status' => 1, 'view' => $this->load->view('transaction/'.$action, $data, TRUE)));
            return;
          } 
          else{
            echo json_encode(array('status' => 2, 'view' => $this->load->view('transaction/'.$action, $data, TRUE)));
            return;
          }

    }

    public function reject_transaction()
    {
        $contact_id = $this->session->userdata('id');
        $t_id = $this->input->post('transaction_id');
        if($this->TModel->reject_transaction($t_id)){
            echo json_encode(array('status' => 1, 'view' => $this->load->view('transaction/client_transaction', $data, TRUE)));
            return;
          } 
          else{
            echo json_encode(array('status' => 2, 'view' => $this->load->view('transaction/client_transaction', $data, TRUE)));
            return;
          }

    }

}
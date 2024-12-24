<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('client/Client_model','CModel');
        $this->load->model('Dashboard_model', 'MDashboard');
    }

    public function index()
    {
        if (isset($this->session->userdata['logged_in']) && ($this->session->userdata['logged_in'] == TRUE)) {
            redirect('home');
        } else {
            $this->loginaction();
        }
        // $this->load->view('login/login');
        
    }

    public function signup()
    {
        $data['countries'] = $this->CModel->get_country();
        $this->load->view('login/signup',$data);
    }

    public function add_client()
    {
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $country = $this->input->post('country');
        // $password = md5($this->input->post('password'));
        $password = RandString();
        $password_hash = md5($password);
        
        $check_exist = $this->CModel->check_exist($email);
        if ($check_exist->num_rows() > 0) {
            echo json_encode(array('status' => 2));
            return;
        }
        $data = array('first_name' => $fname,'last_name' => $lname,'email_id' => $email,'dob' => '2008-01-01','manager' => 0, 'tel' => $phone, 'country' => $country);
        
        if($this->CModel->insert_client($data)){
            $full_name = $fname.' '.$lname;
            $lastInsertedId = $this->db->insert_id();
            $user_data = array('contact_id' => $lastInsertedId,'name' => $full_name, 'username' => $email, 'password' => $password_hash,'position' => 2);
            $user_add = $this->CModel->insert_user($user_data);

            $subject = 'Account details';
            $mailto = $email;
            $mail_data['email'] = $email;
            $mail_data['password'] = $password;
            $mail_data['full_name'] = $full_name;
            // $mail_data['client_id'] = base64_encode($lastInsertedId);
            
            $mailcontent =  $this->load->view('mail_templates/auth_mail', $mail_data, true);
            $cc = "";
            $mail = send_smtp_mailer($subject, $mailto, $mailcontent, $cc);
            if(!$mail){
                echo json_encode(array('status' => 3));
                return;
            }else{
                echo json_encode(array('status' => 1));
                return;
            }

        }else{
            echo json_encode(array('status' => 0));
            return;
        }
        
    }

    public function loginaction(){
        $this->form_validation->set_rules('email','User Name','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');
        $data = array();
        if($this->form_validation->run() === FALSE){
            if (form_error('email')) {
                $data['uname'] = 0;
                $data['message'] = 'Given Email is Invalid!';
            }
            if (form_error('password')) {
                $data['pwd'] = 0;
                $data['message'] = 'Given Password is Invalid!';
            }
            $this->load->view('login/login', $data);
        }
        else{
            $uname = $this->input->post('email');
            $pwd = $this->input->post('password');
            $udetail = $this->db->select('U.*')
                        ->from('user_details AS U')
                        ->where('U.username',$uname)
                        ->where('U.password',md5($pwd))
                        ->get();
            
            if($udetail->num_rows() > 0){
                $session_data = $udetail->row_array();
                $this->session->set_userdata($session_data);
                if($session_data['position'] == 1){
                    $staff_qry = $this->db->select('S.*')
                    ->from('staff_details as S')
                    ->where('S.staff_id', $session_data['contact_id'])
                    ->get();
                $session_contact = $staff_qry->row_array();
                $this->session->set_userdata($session_contact);
                // echo"<pre>";
                // print_r($session_contact);die;
                }
                if($session_data['position'] == 2){
                    $client_qry = $this->db->select('C.*')
                    ->from('client_details as C')
                    ->where('C.id', $session_data['contact_id'])
                    ->get();
                $session_contact = $client_qry->row_array();
                $this->session->set_userdata($session_contact);
                }

                $session_data['logged_in'] = true;
                $this->session->set_userdata($session_data);

                // $this->session->set_flashdata('uname', $session_data['name']);
                redirect('home');
            }
            else{
                $data['credentials'] = 1;
                $data['message'] = 'Invalid Credentials.';
                $this->load->view('login/login',$data);
            }
            
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

    public function reset_pwd()
    {
        $this->load->view('login/reset_pwd');
    }
}

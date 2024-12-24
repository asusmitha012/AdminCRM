<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('login');
        }
        
        $this->load->model('client/Client_model', 'CModel');
        $this->load->model('staff/Staff_model', 'SModel');
    }

    public function index()
	{

		$data['template'] = 'staff/staff_view';
        $data['title'] = 'Staff';
        $data['staff_details'] = $this->SModel->get_staff();
        $this->load->view('template/crm_template', $data);
	}

    public function staff_add()
    {
        $data['subtitle'] = 'Add Staff';
        $data['countries'] = $this->CModel->get_country();
        // $data['manager_details'] = $this->SModel->get_staff();
        $this->load->view('staff/staff_add', $data);
    }

    public function edit_staff()
    {
        $staff_id = $this->input->post('staff_id');
        $email = $this->input->post('email');
        $data['subtitle'] = 'Update Staff';
        $data['countries'] = $this->CModel->get_country();
        $data['staff_details'] = $this->SModel->get_staff_details($staff_id);
        
        $this->load->view('staff/edit_staff', $data);
    }

    public function staff_save() {
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $dob = $this->input->post('dob');
        $dob = date('Y-m-d', strtotime($dob));
        $gender = $this->input->post('gender');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $tel = $this->input->post('phone');
        $department = $this->input->post('department');
        $position = $this->input->post('position');
        $refid = $this->input->post('refid');
        $country = $this->input->post('country');
        $zip = $this->input->post('zip');
        $city = $this->input->post('city');
        $address = $this->input->post('address');
        $creator = $this->session->userdata('contact_id');
    
        $uploadPath = 'uploads';
        $uploadfile = 'files';
        $filename = $this->fileUpload($uploadPath, $uploadfile);
        $file = $filename;
    
        $data = array(
            'first_name' => $firstname,
            'last_name' => $lastname,
            'gender' => $gender,
            'staff_position' => $position,
            'country' => $country,
            'zip' => $zip,
            'email_id' => $email,
            'department' => $department,
            'employee_id' => $refid,
            'address' => $address,
            'dob' => $dob,
            'city' => $city,
            'phone' => $tel,
            'file' => $file,
            'created_by' => $creator
        );
    
        
        $query_client = $this->SModel->check_exist($email);
    
        if ($query_client->num_rows() > 0) {
        // if($query_client != null){
            echo json_encode(array('status' => 2, 'view' => $this->load->view('staff/staff_add', $data, TRUE)));
        } else {
            // log_message('debug', 'Staff Save Data: ' . json_encode($data));
            if ($this->SModel->insert_staff($data)) {
                $full_name = $firstname . ' ' . $lastname;
                $lastInsertedId = $this->db->insert_id();
    
                $data_user_data = array(
                    'contact_id' => $lastInsertedId,
                    'name' => $full_name,
                    'username' => $email,
                    'password' => $password,
                    'position' => 1
                );
    
                if ($this->SModel->insert_user($data_user_data)) {
                    echo json_encode(array('status' => 1, 'view' => $this->load->view('staff/staff_add', $data, TRUE)));
                } else {
                    echo json_encode(array('status' => 0, 'view' => $this->load->view('staff/staff_add', $data, TRUE)));
                }
            } else {
                echo json_encode(array('status' => 0, 'view' => $this->load->view('staff/staff_add', $data, TRUE)));
            }
        }
    }

    public function update_staff() {
        $staff_id = $this->input->post('staff_id');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $dob = $this->input->post('dob');
        $dob = date('Y-m-d', strtotime($dob));
        $gender = $this->input->post('gender');
        $password = $this->input->post('password');
        $tel = $this->input->post('phone');
        $department = $this->input->post('department');
        $position = $this->input->post('position');
        $refid = $this->input->post('refid');
        $country = $this->input->post('country');
        $zip = $this->input->post('zip');
        $city = $this->input->post('city');
        $address = $this->input->post('address');
        $creator = $this->session->userdata('contact_id');
        if($this->session->userdata('user_role') == 1){
            $email = $this->input->post('email');
        }
    
        $uploadPath = 'uploads';
        $uploadfile = 'files';
        $filename = $this->fileUpload($uploadPath, $uploadfile);
        $file = $filename;
        if($file == '' || $file == null){
            $data = array(
                'first_name' => $firstname,
                'last_name' => $lastname,
                'gender' => $gender,
                'staff_position' => $position,
                'country' => $country,
                'zip' => $zip,
                'department' => $department,
                'employee_id' => $refid,
                'address' => $address,
                'dob' => $dob,
                'city' => $city,
                'phone' => $tel,
                'created_by' => $creator
            );
        }
        else{
            $data = array(
                'first_name' => $firstname,
                'last_name' => $lastname,
                'gender' => $gender,
                'staff_position' => $position,
                'country' => $country,
                'zip' => $zip,
                'department' => $department,
                'employee_id' => $refid,
                'address' => $address,
                'dob' => $dob,
                'city' => $city,
                'phone' => $tel,
                'file' => $file,
                'created_by' => $creator
            );
        }
    
            // log_message('debug', 'Staff Update Data: ' . json_encode($data));
        if ($this->SModel->update_staff($data,$staff_id)) {
            $full_name = $firstname.' '.$lastname;
            if($password != null)
            {
                $password = md5($password);
                $data_user_data = array('name' => $full_name, 'password' => $password,'position' => 1);

            }else{
                $data_user_data = array('name' => $full_name,'position' => 1);
            }
            if($this->session->userdata('user_role') == 1){
                $data_user_data['username'] = $email;
            }
            $user_update = $this->SModel->update_user($data_user_data, $staff_id);
            echo json_encode(array('status' => 1, 'view' => $this->load->view('staff/edit_Staff', $data, TRUE)));
        } else {
            echo json_encode(array('status' => 0, 'view' => $this->load->view('staff/edit_staff', $data, TRUE)));
        }
        
    }


    public function fileUpload($uploadPath, $uploadfile = '')
    {
        $uploadData = "";
        $images = "";
        if ($uploadfile == '')
            $uploadfile = 'files';

        $filesCount = count($_FILES[$uploadfile]['name']);
        if ($filesCount > 0) {
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|doc|docx|pdf';
            $this->load->library('upload', $config);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name']     = $_FILES[$uploadfile]['name'][$i];
                $_FILES['file']['type']     = $_FILES[$uploadfile]['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES[$uploadfile]['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES[$uploadfile]['error'][$i];
                $_FILES['file']['size']     = $_FILES[$uploadfile]['size'][$i];


                if ($this->upload->do_upload('file')) {

                    $fileData = $this->upload->data();
                    //print_r($fileData);
                    $images .= $fileData['file_name'];
                } else {
                    return $images;
                }
            }
        }
        $this->session->set_flashdata('uploaded_file', $images);
        return $images;
    }
}
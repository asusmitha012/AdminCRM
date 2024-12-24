<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('login');
        }
        
        $this->load->model('client/Client_model','CModel');
        $this->load->model('staff/Staff_model', 'SModel');
    }

    public function index()
	{
        if($this->session->userdata('staff_position') == 1 || $this->session->userdata('staff_position') == 2)
        {
            $data['client_details'] = $this->CModel->get_client();
            $data['title'] = 'Client';
            $data['template'] = 'client/client_view';
            $this->load->view('template/crm_template', $data);
        }else{
            redirect('error');
        }
	}

    public function client_add()
    {
        $data['subtitle'] = 'Add Client';
        $data['countries'] = $this->CModel->get_country();
        $data['manager_details'] = $this->SModel->get_staff();
        $this->load->view('client/client_add', $data);
    }

    public function client_save(){
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $gender = $this->input->post('gender');
        // $empid = $this->input->post('empid');
        $email = $this->input->post('email');
        $manager = $this->input->post('manager');
        $country = $this->input->post('country');
        $zip = $this->input->post('zip');
        $department = $this->input->post('department');
        $address = $this->input->post('address');
        $citizen = $this->input->post('citizen');
        $passport = $this->input->post('passport');
        $region = $this->input->post('region');
        $dob = $this->input->post('dob');
        $dob = date('Y-m-d', strtotime($dob));
        $password = md5($this->input->post('password'));
        $city = $this->input->post('city');
        $tel = $this->input->post('tel');

        $uploadPath = 'uploads';
        $uploadfile = 'files';
        $images = '';
        $filename = $this->fileUpload($uploadPath, $uploadfile);
        $file = $filename;

        $data = array(
        'first_name' => $firstname,  'last_name' => $lastname, 'gender' => $gender,'country' => $country,
        'zip' => $zip,'citizen' => $citizen,'passport' => $passport, 'email_id' => $email, 'manager' => '$manager','department' => $department, 'address' => $address, 'region' => $region, 'dob' => $dob,
        'city' => $city, 'tel' => $tel, 'file' => $file);
        // $json_data = json_encode($data);
        // echo $json_data;
        // return;
        $query_client = $this->CModel->check_exist($email);
        
        if ($query_client->num_rows() > 0 ) {
            echo json_encode(array('status' => 2, 'view' => $this->load->view('client/client_add', $data, TRUE)));
            return;
        }else{
            if($this->CModel->insert_client($data)){
                $full_name = $firstname.' '.$lastname;
                $lastInsertedId = $this->db->insert_id();
                $data_user_data = array('contact_id' => $lastInsertedId,'name' => $full_name, 'username' => $email, 'password' => $password,'position' => 2);
                $user_add = $this->CModel->insert_user($data_user_data);
                echo json_encode(array('status' => 1, 'view' => $this->load->view('client/client_add', $data, TRUE)));
                return;
            }else{
                echo json_encode(array('status' => 0, 'view' => $this->load->view('client/client_add', $data, TRUE)));
                return;
            }
        }
    }

    public function edit_client(){
        $client_id = $this->input->post('client_id');
        $data['subtitle'] = 'Update Client';
        $data['countries'] = $this->CModel->get_country();
        $data['client_details'] = $this->CModel->get_client_details($client_id);
        $data['manager_details'] = $this->CModel->get_manager_details();
        $this->load->view('client/edit_client', $data);
    }

    public function update_client(){
        $client_id = $this->input->post('client_id');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $gender = $this->input->post('gender');
        $email = $this->input->post('email');
        $manager = $this->input->post('manager');
        $country = $this->input->post('country');
        $zip = $this->input->post('zip');
        $department = $this->input->post('department');
        $address = $this->input->post('address');
        $citizen = $this->input->post('citizen');
        $passport = $this->input->post('passport');
        $region = $this->input->post('region');
        $dob = $this->input->post('dob');
        $dob = date('Y-m-d', strtotime($dob));
        $password = md5($this->input->post('password'));
        $city = $this->input->post('city');
        $tel = $this->input->post('tel');

        $uploadPath = 'uploads';
        $uploadfile = 'files';
        $filename = $this->fileUpload($uploadPath, $uploadfile);
        $file = $filename;

        if($file == '' || $file == null){
            $data = array(
                'first_name' => $firstname,  'last_name' => $lastname, 'gender' => $gender,'country' => $country,
                'zip' => $zip,'citizen' => $citizen,'passport' => $passport, 'email_id' => $email, 'manager' => $manager,'department' => $department, 'address' => $address, 'region' => $region, 'dob' => $dob,
                'city' => $city, 'tel' => $tel);
        }
        else{
            $data = array(
                'first_name' => $firstname,  'last_name' => $lastname, 'gender' => $gender,'country' => $country,
                'zip' => $zip,'citizen' => $citizen,'passport' => $passport, 'email_id' => $email, 'manager' => $manager,'department' => $department, 'address' => $address, 'region' => $region, 'dob' => $dob,
                'city' => $city, 'tel' => $tel, 'file' => $file);
        }
        
        // $json_data = json_encode($data);
        // echo $json_data;
        // return;
       
        if($this->CModel->update_client($data,$client_id)){
            echo json_encode(array('status' => 1, 'view' => $this->load->view('client/client_add', $data, TRUE)));
            return;
        }else{
            echo json_encode(array('status' => 0, 'view' => $this->load->view('client/client_add', $data, TRUE)));
            return;
        }
    
    }

    public function client_show(){
        $id = $this->input->post('client_id');
        $data['subtitle'] = 'View Client';
        $data['client_id'] = $id;
        $data['client_details'] = $this->CModel->get_client_details($id);
        $data['client_document_details'] = $this->CModel->get_client_document($id);
        $this->load->view('client/client_show',$data);
    }

    public function client_document(){
        $user_id = $this->session->userdata('id');
        $data['client_document_details'] = $this->CModel->get_client_document($user_id);
        $data['main_menu'] = 'Document upload';
        $data['template'] = 'client/client_document';
        $data['title'] = 'Document';
        $this->load->view('template/crm_template', $data);
    }

    public function save_client_document(){
        $user_id = $this->session->userdata('id');
        $data['contact_id'] = $user_id;
        $uploadPath = 'uploads';

        $file_id = 'files_id';
        $filename = $this->fileUpload($uploadPath, $file_id);
        $files_id = $filename;
        log_message('info', 'File ID Upload: ' . $filename);
        if($files_id != null){
            $data['file_id'] = $files_id;
        }
        $file_pass = 'files_pass';
        $filename = $this->fileUpload($uploadPath, $file_pass);
        $files_pass = $filename;
        log_message('info', 'File Passport Upload: ' . $filename);
        if($files_pass != null){
            $data['file_passport'] = $files_pass;
        }
        $file_stmt = 'files_stmt';
        $filename = $this->fileUpload($uploadPath, $file_stmt);
        $files_stmt = $filename;
        log_message('info', 'File Statement Upload: ' . $filename);
        if($files_stmt != null){
            $data['file_statement'] = $files_stmt;
        }
        log_message('info', 'Prepared Data for DB Update: ' . json_encode($data));

        $sql = $this->db->select('*')
                ->from('client_documents')
                ->where('contact_id',$user_id)
                ->get();
        // $json_data = json_encode($sql->num_rows());
        // echo $json_data;
        // return;
        if($sql->num_rows() > 0){
            $doc_update = $this->CModel->upload_document_update($data,$user_id);
            if ($doc_update) {
                log_message('info', 'Document Update Status: true');
                echo json_encode(array('status' => 1, 'message' => 'Document updated successfully.', 'view' => $this->load->view('client/client_document', $data, TRUE)));
                return;
            } else {
                log_message('info', 'Document Update Status: false');
                echo json_encode(array('status' => 0, 'message' => 'Failed to update document.'));
                return;
            }
        }else{
            $doc_save = $this->CModel->upload_document($data);
            if ($doc_save) {
                log_message('info', 'Document Save Status: true');
                echo json_encode(array('status' => 1, 'message' => 'Document saved successfully.', 'view' => $this->load->view('client/client_document', $data, TRUE)));
                return;
            } else {
                log_message('info', 'Document Save Status: false');
                echo json_encode(array('status' => 0, 'message' => 'Failed to save document.'));
                return;
            }
        }
        
    }

    public function client_document_verify(){
        $id = $this->input->post('client_id');
        $data['client_details'] = $this->CModel->get_client_details($id);
        $data['client_document_details'] = $this->CModel->get_client_document($id);
        $this->load->view('client/client_document_verify', $data);
    }

    public function client_document_verification(){
        $id = $this->input->post('client_id');
        $val = $this->input->post('val');
        if($val==1){
            $data['file_id_verify'] = 1;
        }
        elseif($val==2){
            $data['file_passport_verify'] = 1;
        }else{
            $data['file_statement_verify'] = 1;
        }
        $doc_verify = $this->CModel->document_verify($data,$id);
        if($doc_verify){
            echo json_encode(array('status' => 1, 'message' => 'Document verification Successfull.', 'view' => $this->load->view('client/client_document_verify', $data, TRUE)));
            return;
        }  
    }

    public function verify_user(){
        $id = $this->input->post('client_id');
        $email = $this->input->post('email');
        $data['client_details'] = $this->CModel->get_client_details($id);
        // $data['client_document_details'] = $this->CModel->get_client_document($id);
        $doc_verify_check = $this->db->select('*')
                            ->from('client_documents')
                            ->where('contact_id', $id)
                            ->where('file_id_verify',1)
                            ->where('file_passport_verify',1)
                            ->where('file_statement_verify',1)
                            ->get();
        if($doc_verify_check->num_rows() > 0){
            $user_verify = $this->CModel->user_verify($id);

            $subject = "Documents Verified";
            $mailto = $email;
            $mail_data['email'] = $email;
            $mailcontent =  $this->load->view('mail_templates/doc_verify_mail', $mail_data, true);
            $cc = "";
            $mail = send_smtp_mailer($subject, $mailto, $mailcontent, $cc);

            if($user_verify){
                echo json_encode(array('status' => 1, 'message' => 'User Verified', 'view' => $this->load->view('client/client_document_verify',$data, True)));
                return;
            }
        }
        else{
            echo json_encode(array('status' => 0, 'message' => 'User not Verified', 'view' => $this->load->view('client/client_document_verify',$data, True)));
            return;
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
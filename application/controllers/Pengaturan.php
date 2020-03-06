<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Pengaturan extends CI_Controller
{
	public $level;
	public $id;
	public $name;
	public $photo;

	public function __construct()
        {
            parent::__construct();
            $url=base_url();
            if($this->session->userdata('MASUK') != TRUE)redirect($url);

            $this->level = $this->session->userdata('level');
            $this->id = $this->session->userdata('id');
            $this->name = $this->session->userdata('nama');
            $this->photo = $this->session->userdata('foto');

            $this->load->model("Pengaturan_model");
            $this->load->library("form_validation");
            $this->load->helper('security');
            $logs = $this->Pengaturan_model->logs();
        }

    public function index()
    {
    	$model = $this->Pengaturan_model;
    	$data['title'] = "Pengaturan";
    	$data['tahunajarans'] = $model->getTahunAjaran();
        if($this->level==0){
        	$data['admin'] = $model->get_admin($this->id);
            $data['tahunajarans'] = $model->getTahunAjaran();
        	$this->load->view("pengaturan/admin",$data);
        }elseif($this->level==1){
            $data['wargabelajar'] = $model->get_wb($this->id);
        	$this->load->view("pengaturan/wargabelajar",$data);
        }elseif($this->level==2){
            $data['pimpinan'] = $model->get_pimpinan($this->id);
            $this->load->view("pengaturan/pimpinan",$data);
        }elseif($this->level==3){
            $data['tutor'] = $model->get_tutor($this->id);
        	$this->load->view("pengaturan/tutor",$data);
        }
    }
    public function update()
    {
    	$validation = $this->form_validation;
    	$model = $this->Pengaturan_model;

    	$validation->set_rules('admin_nama','Nama','required|trim|xss_clean');
        $validation->set_rules('admin_username','Username','required|trim|callback_username_check_blank|xss_clean|min_length[7]');

        if($validation->run()){
        	$model->updateAdmin($this->id);
        	$this->session->set_flashdata('success', 'Berhasil mengubah data');
        	redirect('pengaturan');
        }else{
        	$this->session->set_flashdata('failed', 'Gagal');
        	redirect('pengaturan');
        }
    }
    public function import(){
        if($this->level != 0) redirect('pengaturan');

        if($this->input->method()=="post"){
            $extension = $_FILES["data-import"]["type"]; 
            if($extension != "application/sql"){
                $this->session->set_flashdata('ignore_import','dilarang');
                redirect('pengaturan');
            }else{
                $status = 0;
                $templine = '';
                $lines = file($_FILES["data-import"]["tmp_name"]); 
                foreach ($lines as $line)
                {
                    // Skip it if it's a comment
                    if (substr($line, 0, 2) == '--' || $line == '')
                    continue;

                    // Add this line to the current templine we are creating
                    $templine .= $line;

                    // If it has a semicolon at the end, it's the end of the query so can process this templine
                    if (substr(trim($line), -1, 1) == ';')
                    {
                    
                        // Perform the query
                        if( ! $this->db->query($templine)){
                            $this->session->set_flashdata('error_import',$status);
                        }else{
                            // Reset temp variable to empty
                            $templine = '';
                            $status+=1;
                        }
                    }
                }
                if($status == 0){
                    $this->session->set_flashdata('error_import',$status);
                }else{
                    $this->session->set_flashdata('success_import','berhasil impor');
                }
                redirect('pengaturan');
            }
        }else{
            redirect('pengaturan');
        }

    }
    public function backup(){
        if($this->level != 0) redirect('pengaturan');

        $filename= "Backup ".date('Y-m-d H:i:s').".sql";
        // Load the DB utility class
        $this->load->dbutil();

        $prefs = array(
        'format'                => 'txt',                       // gzip, zip, txt
        'filename'              => $filename,              // File name - NEEDED ONLY WITH ZIP FILES
        'add_drop'              => TRUE,                        // Whether to add DROP TABLE statements to backup file
        'add_insert'            => TRUE,                        // Whether to add INSERT data to backup file
        'foreign_key_checks'    => TRUE,                        // Alter
        'newline'               => "\n"                         // Newline character used in backup file
        );

        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup($prefs);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($filename, $backup);

    }
    public function update_password(){
        $model = $this->Pengaturan_model;
        if($this->input->method()=="post"){
            if($this->level==3){
                // get old password
                $password = $model->get_pass_tutor($this->id);
                // old password by user
                $old_password = $this->input->post('old_password');

                // request new password by user
                $new_password = $this->input->post('new_password');
                $confirm_password = $this->input->post('confirm_password');

                // validation old password by user and old password from database
                if($password['password'] != md5(sha1($old_password))){
                    // give message is not old password
                    $this->session->set_flashdata('wrong_password','Password salah');
                }else{
                    // counting words of request password
                    if(strlen($new_password) < 7 || strlen($confirm_password) < 7){
                        $this->session->set_flashdata('minus_words','Password tidak boleh kurang dari 7');
                    }
                    // validation is new_password and confirm password
                    elseif($new_password != $confirm_password){
                        // give message request new password and confirm new password not same
                        $this->session->set_flashdata('ignore_request_new_password','Password tidak sama');
                    }else{
                        $change_password = $model->update_pass_tutor($this->id,array(
                            'tutor_password'    => md5(sha1($new_password))
                        ));

                        if($change_password){
                            $this->session->set_flashdata('success_change_password','Berhasil mengubah password');
                        }else{
                            $this->session->set_flashdata('error_change_password','Ooops terjadi kesalahan...');
                        }
                    }
                }
            }elseif($this->level==1){
                // get old password
                $password = $model->get_pass_wb($this->id);
                // old password by user
                $old_password = $this->input->post('old_password');

                // request new password by user
                $new_password = $this->input->post('new_password');
                $confirm_password = $this->input->post('confirm_password');

                // validation old password by user and old password from database
                if($password['password'] != md5(sha1($old_password))){
                    // give message is not old password
                    $this->session->set_flashdata('wrong_password','Password salah');
                }else{
                    // counting words of request password
                    if(strlen($new_password) < 7 || strlen($confirm_password) < 7){
                        $this->session->set_flashdata('minus_words','Password tidak boleh kurang dari 7');
                    }
                    // validation is new_password and confirm password
                    elseif($new_password != $confirm_password){
                        // give message request new password and confirm new password not same
                        $this->session->set_flashdata('ignore_request_new_password','Password tidak sama');
                    }else{
                        $change_password = $model->update_pass_wb($this->id,array(
                            'wargabelajar_password'    => md5(sha1($new_password))
                        ));

                        if($change_password){
                            $this->session->set_flashdata('success_change_password','Berhasil mengubah password');
                        }else{
                            $this->session->set_flashdata('error_change_password','Ooops terjadi kesalahan...');
                        }
                    }
                }

            }elseif($this->level==2){
                // get old password
                $password = $model->get_pass_pimpinan($this->id);
                // old password by user
                $old_password = $this->input->post('old_password');

                // request new password by user
                $new_password = $this->input->post('new_password');
                $confirm_password = $this->input->post('confirm_password');

                // validation old password by user and old password from database
                if($password['password'] != md5(sha1($old_password))){
                    // give message is not old password
                    $this->session->set_flashdata('wrong_password','Password salah');
                }else{
                    // counting words of request password
                    if(strlen($new_password) < 7 || strlen($confirm_password) < 7){
                        $this->session->set_flashdata('minus_words','Password tidak boleh kurang dari 7');
                    }
                    // validation is new_password and confirm password
                    elseif($new_password != $confirm_password){
                        // give message request new password and confirm new password not same
                        $this->session->set_flashdata('ignore_request_new_password','Password tidak sama');
                    }else{
                        $change_password = $model->update_pass_pimpinan($this->id,array(
                            'pimpinan_password'    => md5(sha1($new_password))
                        ));

                        if($change_password){
                            $this->session->set_flashdata('success_change_password','Berhasil mengubah password');
                        }else{
                            $this->session->set_flashdata('error_change_password','Ooops terjadi kesalahan...');
                        }
                    }
                }
            }
        }else{
            redirect('pengaturan');
        }
    }
    public function status(){

        if($this->level==3 || $this->level==1 || $this->level==2){
            if($this->session->flashdata('wrong_password')){
                $data["status"] = "wrong";
            } elseif ($this->session->flashdata('ignore_request_new_password')){
                $data["status"] = "ignore";
            } elseif ($this->session->flashdata('error_change_password')){
                $data["status"] = "error";
            } elseif ($this->session->flashdata('success_change_password')){
                $data["status"] = "success";
            } elseif($this->session->flashdata('minus_words')){
                $data["status"] = "minus";
            }
            echo json_encode($data); 
        }else{
            redirect('pengaturan');
        }
        
    }
    public function username_check_blank($str)
    {

    $pattern = '/ /';
    $result = preg_match($pattern, $str);

    if ($result)
    {
        $this->form_validation->set_message('username_check_blank', 'Kolom {field} dilarang menggunakan spasi');
        return FALSE;
    }
    else
    {
        return TRUE;
    }
    }
    public function set_permission()
    {
        if($this->level==0){
            if($this->input->method()=="post"){
                $id = $this->input->post('id');
                $val = $this->input->post('val');

                if(!isset($id) || !isset($val)){
                    $this->session->set_flashdata('empty_val','empty');
                }elseif($val == 0 || $val == 1){

                    $model = $this->Pengaturan_model;

                    $update = $model->open_nilai($id,$val);

                    if($update){
                        $this->session->set_flashdata('success_set_permission','sukses');
                    }else{
                        $this->session->set_flashdata('failed_set_permission','gagal');
                    }
                }else{
                    $this->session->set_flashdata('empty_val','kosong');
                }
            }else{
                redirect('pengaturan');
            }
        }else{
            redirect('pengaturan');
        }
    }

    public function status_permission()
    {
        // $status = 0;

        if($this->session->flashdata('empty_val')) {
            $data["status"] = 500; 
            //data is empty
        }elseif ($this->session->flashdata('success_set_permission')) {
            $data["status"] = 200; 
            //success change permission
        }elseif ($this->session->flashdata('failed_set_permission')) {
            $data["status"] = 430; 
            //failed to change permission
        }else{
            $data["status"] = 0;
        }

        echo json_encode($data);
    }
}
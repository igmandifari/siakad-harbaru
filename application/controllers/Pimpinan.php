<?php
class Pimpinan extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model("Pimpinan_model");
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index()
    {
        $data["pimpinans"] = $this->Pimpinan_model->getAll();
        $data["title"] = "Data Pimpinan";
        $data["actor"] = "Pimpinan";
        $data["tahunajarans"] = $this->Pimpinan_model->getTahunAjaran();
    
        $this->load->view('pimpinan/list',$data);    
    }

    public function hapus($id=null)
    {
        if (!isset($id)){
            redirect('pimpinan');
        }
    //     }elseif(!$this->Pimpinan_model->delete($id)){
    //          redirect('pimpinan');
    // }
        else{
            $this->Pimpinan_model->delete($id);
            $this->session->set_flashdata('success', 'Berhasil');
          
            redirect('pimpinan');
        }
    }

    public function ubah($id=null)
    {
        if (!isset($id)) redirect('pimpinan');

        $pimpinan = $this->Pimpinan_model;
        $data['pimpinan'] = $pimpinan->getByid($id);

        if(!$data['pimpinan']) redirect('pimpinan');
        
        $validasi = $this->form_validation;

        $validasi->set_rules($pimpinan->rules_edit());
        if ($validasi->run()){
                $pimpinan->perbarui();
                $this->session->set_flashdata('success', 'Berhasil');
            
        }
        $data["title"] = "Ubah Data";
        $data["actor"] = "Pimpinan";
        $data["tahunajarans"] = $this->Pimpinan_model->getTahunAjaran();
        
        $this->load->view('pimpinan/ubah',$data);
    }

    public function ubah_password(){
        $pimpinan = $this->Pimpinan_model;

        $this->form_validation->set_rules('pimpinan_password','Password','min_length[5]');

        if ($this->form_validation->run()){
           $pimpinan->perbarui_password();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('pimpinan');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal');
            redirect('pimpinan');
        } 
    }

    public function tambah()
    {
        $pimpinan = $this->Pimpinan_model;
    
        $validasi = $this->form_validation;
        $validasi->set_rules($pimpinan->rules());
        if ($validasi->run()){
            
            $pimpinan->simpan();
            $this->session->set_flashdata('success', 'Berhasil');

            redirect('pimpinan');
        }
        
        $data["title"] = "Tambah Data";
        $data["actor"] = "Pimpinan";
        $data["tahunajarans"] = $this->Pimpinan_model->getTahunAjaran();

        $this->load->view('pimpinan/tambah',$data);
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
}
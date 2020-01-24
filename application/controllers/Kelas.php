<?php
class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');        
        $this->load->helper('security');
    }

    public function index()
    {

        $data["title"] = "Data Kelas";
        $data["actor"] = "Kelas";
        $data["kelass"] = $this->Kelas_model->getAll();
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();
    
        $this->load->view('kelas/list',$data);
    }
    public function tambah()
    {
        $kelas = $this->Kelas_model;
        
        $validasi = $this->form_validation;
        $validasi->set_rules($kelas->rules());

        if ($validasi->run()){
            $kelas->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
            
            redirect("kelas"); 
        }

        $data["title"] = "Tambah Data";
        $data["actor"] = "Kelas";
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        $this->load->view('kelas/tambah',$data);
    }

    public function hapus($id=null)
    {
        if(!isset($id)){
            redirect('kelas');
        }else{
            $this->Kelas_model->delete($id);
            redirect('kelas');
        }
    }
    

    public function ubah($id=null)
    {
        if (!isset($id)) redirect('kelas');

        $kelas = $this->Kelas_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($kelas->rules());

        if ($validasi->run()){
            $kelas->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        }
        
        $data["title"] = "Ubah Data";
        $data["actor"] = "Kelas";
        $data['kelas'] = $kelas->getByid($id);
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        if(!$data['kelas']) redirect('kelas');

        $this->load->view('kelas/ubah',$data);

    }
    public function rombel()
    {
        $kelas = $this->Kelas_model;

        $data["actor"] = "Rombel";
        $data["title"] = "Daftar Rombel";
        $data["SemuaRombel"] = $kelas->getRombel();
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        $this->load->view('kelas/rombel_list',$data);
    }
    public function tambah_rombel(){
        $kelas = $this->Kelas_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($kelas->rules_tambah_rombel());

        if($validasi->run()){
            $kelas->saveRombel();
            $this->session->set_flashdata('success', 'Berhasil'); 

            redirect('kelas/rombel');
        }
        $data['title'] = "Tambah Rombel";
        $data['actor'] = "Rombel";
        $data['getKelas'] = $kelas->getKelas();
        $data['getTahun'] = $kelas->getTahun();
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        $this->load->view('kelas/tambah_rombel',$data);
    }
    public function rombel_tambah($id=null){
        if (!isset($id)) redirect('kelas/rombel');
        $kelas = $this->Kelas_model;
        $data['kelas'] = $kelas->getRombelbyId($id);
        $data['semua_wargabelajar'] = $kelas->getWargaBelajarNonRombel();
        $data['actor'] = 'Rombel';
        $data['title'] = 'Masukan Ke Rombel';
        if(!$data['kelas']) redirect('kelas/rombel');
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        $this->load->view('kelas/rombel_tambah',$data);
        
    }
    public function rombel_lihat($id){
        if (!isset($id)) redirect('kelas/rombel');
        $kelas = $this->Kelas_model;
        $data['kelas'] = $kelas->getRombelbyId($id);
        $data['semua_wargabelajar'] = $kelas->getRombelDetbyId($id);
        $data['actor'] = 'Rombel';
        $data['title'] = 'Lihat Rombel';
        if(!$data['semua_wargabelajar']) redirect('kelas/rombel');
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        $this->load->view('kelas/rombel_lihat',$data);
    }
    public function rombel_simpan(){
        $validasi = $this->form_validation;
        $kelas = $this->Kelas_model;
        if($this->input->method()=="post"){
            $kelas->rombelsave();
            $this->session->set_flashdata('success', 'Berhasil');            
            redirect('kelas/rombel_tambah/'.$this->input->post('rombel_id'));
        }
        else{
            redirect('kelas/rombel');
        }
    }

    public function rombel_det_hapus($id=null,$rombel_id=null)
    {
        if(!isset($id)){
            redirect('kelas/rombel_lihat/'.$rombel_id);
        }else{
            $this->Kelas_model->rombelDet($id);
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('kelas/rombel_lihat/'.$rombel_id);
        }
    }
    public function rombel_hapus($id=null){
        $kelas = $this->Kelas_model;
            
        if(!isset($id)){
            redirect('kelas/rombel');
        }else{
            $kelas->delRombel($id);
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
            redirect('kelas/rombel');
        }
    }
    function select_validate($param)
    {
        if($param=="0"){
            $this->form_validation->set_message('select_validate', 'Mohon untuk memilih {field}');
            return false;
        } else{
            return true;
        }
    }
}
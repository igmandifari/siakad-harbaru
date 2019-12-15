<?php
class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");

        $this->load->library("Form_validation");
        $this->load->model("Jadwal_model");
        $this->load->helper("security");
    }
    public function index()
    {
        $jadwal = $this->Jadwal_model;

        $data["jadwals"] = $jadwal->getAll();
        $data["title"] = "Jadwal Mata Pelajaran";
        $data["actor"] = "Mata Pelajaran";
        

        $this->load->view('jadwal/list',$data);
    }
    public function ubah($id=null)
    {
        if(!isset($id))redirect('jadwal');

        $jadwal = $this->Jadwal_model;
        $validasi = $this->form_validation;

        $validasi->set_rules($jadwal->rules());
        
        if($validasi->run()){
            $jadwal->perbarui();
            $this->session->set_flashdata('success', 'Berhasil Diubah');

        }
        
        $data["title"] = "Ubah Jadwal Mata Pelajaran";
        $data["actor"] = "Jadwal";
        $data["kelass"] = $jadwal->getKelas();
        $data["matpels"] = $jadwal->getMatpel();
        $data["jadwal"] = $jadwal->getById($id);

        if(!$data['jadwal']) redirect('jadwal');
        
        $this->load->view("jadwal/ubah",$data);
    }

    public function tambah()
    {
        $jadwal = $this->Jadwal_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($jadwal->rules());
        
        if($validasi->run()){
            $jadwal->simpan();
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan');

            redirect('jadwal');

        }
        
        $data["title"] = "Tambah Jadwal Mata Pelajaran";
        $data["actor"] = "Jadwal";
        $data["kelas_all"] = $jadwal->getKelas();
        $data["matpel_all"] = $jadwal->getMatpel();
        
        $this->load->view("jadwal/tambah",$data);
    }
    public function hapus($id=null){
        $jadwal = $this->Jadwal_model;

        $data['jadwal'] = $jadwal->getById($id);

        if(!isset($id)) redirect('jadwal');

        if(!$data['jadwal']) {
            redirect('jadwal');
        }else{
            $jadwal->delete($id);
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
            redirect('jadwal');
        }

        
    }
    public function tambah_tutorial_mandiri(){
        $jadwal = $this->Jadwal_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($jadwal->rules_tutorial_mandiri());

        if($validasi->run()){
            $jadwal->save_tutorial_mandiri();
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
            
            redirect('jadwal');
        }else{
            redirect('jadwal/tambah#tutorial-mandiri');
            $this->session->set_flashdata('failed', 'Gagal');
        }
    }
    public function update_tutorial_mandiri(){
        $jadwal = $this->Jadwal_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($jadwal->rules_tutorial_mandiri());

        if($validasi->run()){
            $jadwal->update_tutorial_mandiri();
            $this->session->set_flashdata('success', 'Berhasil Diubah');

            redirect('jadwal');
        }else{
            redirect('jadwal');
            $this->session->set_flashdata('failed', 'Gagal');
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
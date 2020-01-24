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

        $data["tahuns"] = $jadwal->getTahunajaran();
        $data["title"] = "Jadwal Mata Pelajaran";
        $data["actor"] = "Mata Pelajaran";
        

        $this->load->view('jadwal/list_tahun',$data);
    }
    public function ubah($tahun=null,$id=null)
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
        $data["kelass"] = $jadwal->getKelas($tahun);
        $data["matpels"] = $jadwal->getMatpel();
        $data["jadwal"] = $jadwal->getById($id);
        $data["tahuns"] = $jadwal->getTahunajaran();

        if(!$data['jadwal']) redirect('jadwal');
        
        $this->load->view("jadwal/ubah",$data);
    }

    public function matpel_tambah($tahun=null)
    {
        if(!isset($tahun)) redirect('jadwal');

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
        $data["kelas_all"] = $jadwal->getKelas($tahun);
        $data["matpel_all"] = $jadwal->getMatpel();
        $data["tahuns"] = $jadwal->getTahunajaran();
        
        $this->load->view("jadwal/tambah",$data);
    }
    public function matpel_lihat($tahun=null){
        if(!isset($tahun)) redirect('jadwal');

        $jadwal = $this->Jadwal_model;
        $data["jadwals"] =$jadwal->getMatpelTahun($tahun);
        $data["title"] = "Jadwal Mata Pelajaran";
        $data["actor"] = "Jadwal";
        $data["tahuns"] = $jadwal->getTahunajaran();

        if(!$data['jadwals']) redirect('jadwal');

        $this->load->view('jadwal/list',$data);
    }
    public function hapus($id=null){
        $jadwal = $this->Jadwal_model;
        $tahun = $this->uri->segment('3');
        $data['jadwal'] = $jadwal->getById($id);

        if(!isset($id)) redirect('jadwal');

        if(!$data['jadwal']) {
            redirect('jadwal');
        }else{
            $jadwal->delete($id);
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
            redirect('jadwal/matpel_lihat/').$tahun;
        }

        
    }
    public function tambah_tutorial_mandiri(){
        $jadwal = $this->Jadwal_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($jadwal->rules_tutorial_mandiri());

        if($validasi->run()){
            $tahun = $this->uri->segment('3');
            $jadwal->save_tutorial_mandiri();
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
            
            redirect('jadwal/matpel_lihat/').$this->input->post('tahunajaran_id');
        }else{
            redirect('jadwal/matpel_tambah#tutorial-mandiri');
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
    public function delTahun($id=null){
        $jadwal = $this->Jadwal_model;
            
        if(!isset($id)){
            redirect('jadwal');
        }else{
            $jadwal->delTahun($id);
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
            redirect('jadwal');
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
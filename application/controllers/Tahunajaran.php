<?php
class Tahunajaran extends CI_Controller
{
    private $tahunajaran;
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Tahunajaran_model');
        $this->load->library('form_validation'); 
        $this->load->helper('security'); 
    }

    public function index()
    {
        $data["tahunajarans"] = $this->Tahunajaran_model->getAll();
        $data["title"] = "Data Tahun Ajaran";
        $data["actor"] = "Tahun Ajaran";

        $this->load->view('tahunajaran/list',$data);
    }

    public function tambah()
    {
        $tahunajaran = $this->Tahunajaran_model;

        $validasi = $this->form_validation;
        $validasi->set_rules($tahunajaran->rules());

        if ($validasi->run()){
            $semua_kelas = $tahunajaran->getKelas();
            $this->tahunajaran_id = uniqid();
                    
                $simpan_tahun_ajaran =  $tahunajaran->simpan(array(
                    'tahunajaran_id'                  => $this->tahunajaran_id,
                    'tahunajaran_nama'                => $this->input->post("tahunajaran_nama"),
                    'created_at'        => date('Y-m-d H:i:s')
                ));
                foreach($semua_kelas as $kelas){
                    $simpan_rombel = $tahunajaran->simpan_rombel(array(
                        'rombel_id'         => uniqid(),
                        'tahunajaran_id'    => $this->tahunajaran_id,
                        'kelas_id'          => $kelas->kelas_id,
                        'created_at'        => date('Y-m-d H:i:s')
                    ));
                }
            
            $this->session->set_flashdata('success', 'Berhasil');

            redirect('tahunajaran');
        }

        $data["title"] = "Tambah Data";
        $data["actor"] = "Mata Pelajaran";
        $data["tahunajarans"] = $this->Tahunajaran_model->getAll();
        $this->load->view('tahunajaran/tambah',$data);
    }

    public function hapus($id=null)
    {
        if(!isset($id)){
            redirect('tahunajaran');
        }else{
            $this->Tahunajaran_model->delete($id);
            redirect('tahunajaran');
        }
    }

    public function ubah($id=null)
    {
        if(!isset($id)) redirect('tahunajaran');
        $tahunajaran = $this->Tahunajaran_model;
        $data['tahunajaran'] = $tahunajaran->getByid($id);

        if(!$data['tahunajaran']) redirect('tahunajaran');

        $validasi = $this->form_validation;
        $validasi->set_rules($tahunajaran->rules());

        if ($validasi->run()){
            $tahunajaran->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        }

        $data["title"] = "Ubah Data";
        $data["actor"] = "Kelas";
        $data["tahunajarans"] = $this->Tahunajaran_model->getAll();
        
        $this->load->view("tahunajaran/ubah",$data);
    }

}
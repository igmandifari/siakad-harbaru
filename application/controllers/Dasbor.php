<?php
class Dasbor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        $this->load->model('Dasbor_model');
        $logs = $this->Dasbor_model->logs();   
    }
    public function logs()
    {
        if($this->session->userdata('level')==0){
            $logs = $this->Dasbor_model->get_logs();

            echo json_encode($logs);

        }else{
            redirect('dasbor');
        }
    }
    public function index(){
        $dasbor = $this->Dasbor_model;
        $logs = $dasbor->logs();
        $data["title"] = "Dasbor";
        $data["tahunajarans"] = $dasbor->getTahunAjaran();


        if($this->session->userdata('level') == 0){
            $data["logs"] = $dasbor->get_logs();
            $data["countWargaBelajar"] = $dasbor->countWargaBelajar();
            $data["countAdmin"] = $dasbor->countAdmin();
            $data["countTutor"] = $dasbor->countTutor();
            $data["countPimpinan"] = $dasbor->countPimpinan();
            $this->load->view('dasbor/dasbor_admin',$data);
        }
        else if($this->session->userdata('level') == 1){
            $tahun= $this->session->userdata('tahunajaran_id');
            $data["haris"]=$dasbor->getHari($tahun);
            $data['dasbor'] =  $this->Dasbor_model;
            $this->load->view('dasbor/wargabelajar/dasbor_wargabelajar',$data);
        }else if($this->session->userdata('level') == 2)
        {
            $this->load->view('dasbor/pimpinan/dasbor',$data);
        }else if($this->session->userdata('level') == 3)
        {
            $data["all_jadwal_mengajar"] = $dasbor->getJadwalByIdTutor();
            $this->load->view('dasbor/dasbor_tutor',$data);
        }

    }
    public function setTahunajaran()
    {
        $logs = $this->Dasbor_model->logs();
        if($this->input->method()=="post"){
            $thnid = $this->input->post('tahunajaran_id');

            $model = $this->Dasbor_model;
            $tahunajaran = $model->get_tahun_ajaran($thnid);
            $data = array(
                'tahunajaran_id'    => $tahunajaran['tahunajaran_id'],
                'tahunajaran_nama'  => $tahunajaran['tahunajaran_nama'],
                'open_nilai'            => $tahunajaran['open_nilai']
            );
            $this->session->set_userdata($data);
        }
    }
    public function wargabelajar()
    {
        $logs = $this->Dasbor_model->logs();
        if($this->session->userdata('level') != 2){
            redirect('dasbor');
        }else{
            $model = $this->Dasbor_model;
            $data['title'] = "Wargabelajar";
            $data['wargabelajars'] = $model->getWargabelajars();
            $this->load->view('dasbor/pimpinan/wargabelajar',$data);
        }
    }
    public function tutor()
    {
        $logs = $this->Dasbor_model->logs();
        if($this->session->userdata('level') != 2){
            redirect('dasbor');
        }else{
            $model = $this->Dasbor_model;
            $data['title'] = "Tutor";
            $data['tutors'] = $model->getTutors();
            $this->load->view('dasbor/pimpinan/tutor',$data);
        }
    }
    public function kelas($jenis=null,$id=null)
    {
        $logs = $this->Dasbor_model->logs();
        if($this->session->userdata('level') != 2){
            redirect('dasbor');
        }else{
            $model = $this->Dasbor_model;
            $data['title'] = "Daftar Kelas";
            $data['tahunajarans'] =  $model->getTahunAjaran();
            $data['model'] = $model;

            if($jenis=="nilai"){
                $data["wargabelajars"]= $model->getWargaBelajar($id);
                $data["jadwal"]= $model->getKelasAndMatpel($id);
                if(!$data["wargabelajars"]) redirect('dasbor/kelas');
                $this->load->view('dasbor/pimpinan/nilai',$data,FALSE);
            }elseif($jenis=="presensi"){
                $idpresensi=$model->getIDPresensi($id);
                if(!$idpresensi) redirect('dasbor/kelas');
                $data["wargabelajars"] = $model->getWb($idpresensi["presensi_id"]);
                $data["kelas"] = $model->getNameKelas($id);
                $data["actor"] = $data["kelas"]["kelas_nama"];
                $this->load->view('dasbor/pimpinan/presensi',$data);
            }else{
                $this->load->view('dasbor/pimpinan/kelas',$data,FALSE);
            }
        }
    }
}
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
    public function import($jenis=null)
    {
        if($this->session->userdata('level')==0){
            $model= $this->Dasbor_model;

            if($jenis=="tutor"){
                $data = $model->getTutors();
                foreach ($data as $tutor) {
                    $id = $tutor->tutor_id;
                    $name = $tutor->tutor_nama;
                    $nama = strtoupper(substr($name,0,1));
                    $tanggal_lahir = $tutor->tutor_tanggal_lahir;
                    $years = substr($tanggal_lahir, 2,2);
                    $month = substr($tanggal_lahir, 5,2);
                    $date = substr($tanggal_lahir, 8,2);
                    
                    $password = $nama.$date.$month.$years;

                    $update = $model->tutor_pw($id,$password);
                    if($update){
                        echo "sukses";
                    }
                }
            }elseif ($jenis=="wargabelajar") {
                $data = $model->getWargabelajars();
                foreach ($data as $wb) {
                    $id = $wb->wargabelajar_id;
                    $name = $wb->wargabelajar_nama;
                    $nama = strtoupper(substr($name,0,1));
                    $tanggal_lahir = $wb->wargabelajar_tanggal_lahir;
                    $years = substr($tanggal_lahir, 2,2);
                    $month = substr($tanggal_lahir, 5,2);
                    $date = substr($tanggal_lahir, 8,2);
                    
                    $password = $nama.$date.$month.$years;

                    $update = $model->wb_pw($id,$password);

                    if($update){
                        echo "sukses";
                    } 
                }
            }
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
            $data['masukans'] = $dasbor->get_masukan();
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
    public function kelas($jenis=null,$id=null,$tahun=null)
    {
        $logs = $this->Dasbor_model->logs();
        if($this->session->userdata('level') != 2 && $this->session->userdata('level') != 0){
            redirect('dasbor');
        }else{
            $model = $this->Dasbor_model;
            $data['title'] = "Daftar Kelas";
            $data['tahunajarans'] =  $model->getTahunAjaran();
            $data['model'] = $model;

            if($jenis=="nilai"){
                $data["wargabelajars"]= $model->getWargaBelajar($id);
                $data["jadwal"]= $model->getKelasAndMatpel($id);
                if(!$data["wargabelajars"]){
                    if($this->session->userdata('level')==0){
                        redirect('jadwal/matpel_lihat/'.$tahun);
                    }else{
                        redirect('dasbor/kelas');
                    }
                } 

                if($this->session->userdata('level')==2){
                    $this->load->view('dasbor/pimpinan/nilai',$data,FALSE);
                }elseif ($this->session->userdata('level')==0) {
                    $this->load->view('jadwal/nilai',$data);
                }
            }elseif($jenis=="presensi"){
                $idpresensi=$model->getIDPresensi($id);
                if(!$idpresensi) {
                    if($this->session->userdata('level')==0){
                        redirect('jadwal/matpel_lihat/'.$tahun);
                    }else{
                        redirect('dasbor/kelas');
                    }
                } 
                $data["wargabelajars"] = $model->getWb($idpresensi["presensi_id"]);
                $data["kelas"] = $model->getNameKelas($id);
                $data["actor"] = $data["kelas"]["kelas_nama"];

                if($this->session->userdata('level')==2){
                    $this->load->view('dasbor/pimpinan/presensi',$data);
                }elseif ($this->session->userdata('level')==0) {
                    $this->load->view('jadwal/presensi',$data);
                }
            }else{
                if($this->session->userdata('level')==2){
                    $this->load->view('dasbor/pimpinan/kelas',$data,FALSE);
                }else{
                    redirect('jadwal');
                }
            }
        }
    }
}
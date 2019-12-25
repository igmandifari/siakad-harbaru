<?php
    class Presensi extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $url=base_url();
            if($this->session->userdata('MASUK') != TRUE)redirect($url);
            if($this->session->userdata('level') != 3) redirect("dasbor");

            $this->load->model('Presensi_model');
        }

        public function index()
        {
            // if(!isset($kelas)){
            $presensi = $this->Presensi_model;

            $data["title"] = "Daftar Kelas";
            $data["actor"] ="Presensi Kehadiran";
            $data["SemuaKelas"] = $presensi->getKelas();
            
            $this->load->view('tutor/presensi/list',$data);
        }
        public function presensi_baru(){
            $presensi=$this->Presensi_model;
            if($this->input->method()=="post"){
                $jadwal_id =$this->input->post('jadwal_id');
                $presensi_id = $this->input->post('presensi_id');
                $presensi->NewPresensi();
                $wargabelajars = $presensi->getSiswaByRombel($jadwal_id);
                foreach($wargabelajars as $wargabelajar){
                    $presensi->PresensiDet(array(
                        'presensi_id'       => $presensi_id,
                        'wargabelajar_id'   => $wargabelajar->wargabelajar_id,
                        'presensi_det_ket'  => 'A'
                    ));
                }
                redirect('presensi/jadwal/'.$jadwal_id.'/'.$presensi_id);
            }else{
                redirect('presensi');
            }
        }
        public function jadwal($id=null,$pertemuan=null){
            if(!isset($id)) redirect('presensi');

            $presensi = $this->Presensi_model;
            $data["pertemuans"] = $presensi->getPertemuan($id);
            $data["title"] = "Kelas";
            $data["actor"] = "Presensi";
            $data["wargabelajars"] = $presensi->getPresensiDet($pertemuan);

            
            if(!isset($pertemuan) && isset($id)){
                $this->load->view('tutor/presensi/pertemuan',$data);
            }elseif(!$data["wargabelajars"]){
                redirect('presensi/jadwal/'.$this->uri->segment(3));
            }elseif(isset($data["wargabelajars"])){
                $this->load->view('tutor/presensi/presensi',$data);
            }               
        }
        
        public function update_presensi_det($jadwal_id,$presensi_id,$presensi_det_id,$status){
            $presensi= $this->Presensi_model;
            $presensi->updatePresensiDet(array(
                'presensi_det_ket'  => $status
            ),$presensi_det_id);

            redirect('presensi/jadwal/'.$jadwal_id.'/'.$presensi_id);
        }
        
    }
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
            $data["tahunajarans"]= $presensi->getTahunAjaran();
            
            $this->load->view('tutor/presensi/list',$data);
        }
        public function presensi_baru(){
            $presensi=$this->Presensi_model;
            $data["tahunajarans"]= $presensi->getTahunAjaran();
            if($this->input->method()=="post"){
                $jadwal_id =$this->input->post('jadwal_id');
                $presensi_id = $this->input->post('presensi_id');
                $presensi->NewPresensi();
                $wargabelajars = $presensi->getSiswaByRombel($jadwal_id);
                foreach($wargabelajars as $wargabelajar){
                    $presensi->PresensiDet(array(
                        'presensi_id'       => $presensi_id,
                        'wargabelajar_id'   => $wargabelajar->wargabelajar_id,
                        'presensi_det_ket'  => 'A',
                        'updated_at'        => date('Y-m-d H:i:s')
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
            $data["kelas"] = $presensi->getNameKelas($id);
            $data["title"] = "Kelas";
            $data["actor"] = "Presensi";
            $data["wargabelajars"] = $presensi->getPresensiDet($pertemuan);
            $data["tahunajarans"]= $presensi->getTahunAjaran();
            $data["pertemuans"]=$presensi->getPertemuan($id);
            
            if(!isset($pertemuan) && isset($id)){
                $this->load->view('tutor/presensi/pertemuan',$data);
            }elseif(!$data["wargabelajars"]){
                redirect('presensi/jadwal/'.$this->uri->segment(3));
            }elseif(isset($data["wargabelajars"])){
                $data['tanggal']=$presensi->getTanggal($pertemuan);
                $this->load->view('tutor/presensi/presensi',$data);
            }               
        }
        
        public function update_presensi_det(){
            $presensi= $this->Presensi_model;
            if($this->input->method()=="post"){
                $presensi->updatePresensiDet(array(
                    'presensi_det_ket'  => $this->input->post('status'),
                    'updated_at'        => date('Y-m-d H:i:s')
                ),$this->input->post('id'));
            }
        }
        
        public function details($jadwal=null){
            if(!isset($jadwal)) redirect('presensi');
            $details = $this->Presensi_model;
            $idpresensi=$details->getIDPresensi($jadwal);
            $data["wargabelajars"] = $details->getWb($idpresensi["presensi_id"]);
            $wargabelajars = $data["wargabelajars"];
            $data["title"] = "Rekap Presensi";
            $data["kelas"] = $details->getNameKelas($jadwal);
            $data["actor"] = $data["kelas"]["kelas_nama"];
            $data["details"] = $this->Presensi_model;
            $data["tahunajarans"]= $details->getTahunAjaran();
            $this->load->view('tutor/presensi/rekap',$data);
        }
        public function hapus($jadwal=null,$id=null){
            if(!isset($id)) redirect('presensi');
            $model = $this->Presensi_model;

            $details = $model->hapus_details($id);
            if($details){
                $presensi=$model->hapus($id);
                $this->session->set_flashdata('success',"berhasil");
                redirect('presensi/jadwal/').$jadwal;
            }
        }
        
    }
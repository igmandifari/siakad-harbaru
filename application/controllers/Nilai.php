<?php
    Class Nilai extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $url=base_url();
            if($this->session->userdata('MASUK') != TRUE)redirect($url);
            if($this->session->userdata('level') != 3) redirect("dasbor");
            $this->load->model('Nilai_model');
        }
        public function index(){
            $nilai = $this->Nilai_model;

            $data["title"] = "Daftar Kelas";
            $data["actor"] ="Nilai";
            $data["SemuaKelas"] = $nilai->getKelas();
            
            $this->load->view('tutor/nilai/list',$data,FALSE);
        }
        public function getWargaBelajars($jadwal=null){
            if(!isset($jadwal)) redirect('nilai');

            $nilai = $this->Nilai_model;
            $data= $nilai->getWargaBelajar($jadwal);

            echo json_encode($data);

        }
        public function matpel($semester=null,$jadwal=null,$id=null)
        {
            if(!isset($id) || (!isset($jadwal))|| (!isset($semester)))redirect('nilai');
            $nilai = $this->Nilai_model;
            $data = $nilai->checkAvailable($semester,$jadwal,$id);
            if(!$data){
                $insert = $nilai->insertNilai(array(
                    'nilai_id'          => uniqid(),
                    'nilai_semester'    => $this->uri->segment(3),
                    'jadwal_id'         => $this->uri->segment(4),
                    'wargabelajar_id'   => $this->uri->segment(5),
                    'created_at'        => date('Y-m-d H:i:s')
                    )
                );
                if($insert){
                    redirect('nilai/matpel/'.$semester.'/'.$jadwal.'/'.$id);
                }
            }else{
                $data['idnilai'] = $nilai->getIDNIilai($jadwal);
                // warga belajar as WB
                $data['wb'] =  $nilai->getDataWargaBelajar($id);
                // nama mata pelajaran as matpel
                $data['matpel'] = $nilai->getNameMatpel($jadwal);
                $data['title'] = "Daftar Nilai ".$data['matpel']['matpel_nama'];


                $this->load->view('tutor/nilai/history',$data,FALSE);
            }
            
            
        }

        public function InsertNilai(){
            if($this->input->method()=="post"){
                $nilai = $this->Nilai_model;
                $insert = $nilai->insetToDet(
                    array(
                        'nilai_id'              => $this->input->post('id'),
                        'nilai_details_jenis'   => $this->input->post('jenis'),
                        'nilai_details_nilai'   => $this->input->post('nilai'),
                        'created_at'            => date('Y-m-d H:i:s')
                    ));
            }
        }

        public function getNilai($id=null){
            if(!isset($id)) redirect('nilai');

            $nilai = $this->Nilai_model;
            $data = $nilai->getDataNilai($id);

            echo json_encode($data);
        }

    }
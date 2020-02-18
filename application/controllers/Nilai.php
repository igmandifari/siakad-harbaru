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
            $data["tahunajarans"]=$this->Nilai_model->getTahunAjaran();
            
            $this->load->view('tutor/nilai/list',$data,FALSE);
        }
        public function getWargaBelajars($jadwal=null){
            if(!isset($jadwal)) redirect('nilai');

            $nilai = $this->Nilai_model;
            $data= $nilai->getWargaBelajar($jadwal);

            echo json_encode($data);

        }
        public function matpel($semester=null,$jadwal=null,$id=null,$type=null)
        {
            if(!isset($id) || (!isset($jadwal))|| (!isset($semester)))redirect('nilai');
            $nilai = $this->Nilai_model;
            $there = $nilai->checkAvailable($semester,$jadwal,$id);
            if(!$there){
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
                $data['idnilai'] = $nilai->getIDNIilai($jadwal,$id,$semester);
                // warga belajar as WB
                $data['wb'] =  $nilai->getDataWargaBelajar($id);
                // nama mata pelajaran as matpel
                $data['matpel'] = $nilai->getNameMatpel($jadwal);
                $data['title'] = "Daftar Nilai ".$data['matpel']['matpel_nama'];
                $data["tahunajarans"]=$this->Nilai_model->getTahunAjaran();


                $this->load->view('tutor/nilai/history',$data,FALSE);

                if($type=="pdf"){
                    $harian = $nilai->calcHarian($data['idnilai']['nilai_id']);
                    $tugas = $nilai->calcTugas($data['idnilai']['nilai_id']);
                    $uts = $nilai->calcUts($data['idnilai']['nilai_id']);
                    $uas = $nilai->calcUas($data['idnilai']['nilai_id']);

                    $total = $harian['rata']+$tugas['rata']+$uts['rata']+$uas['rata'];
                    $rata = $total/4;
                    $data['harian'] = $harian['rata'];
                    $data['tugas'] = $tugas['rata'];
                    $data['uts'] = $uts['rata'];
                    $data['uas'] = $uas['rata'];
                    $data['total'] = $total;
                    $data['rata'] =$rata;

                    $style = file_get_contents(base_url('assets/css/presensi.css'));
                    $cetak = $this->load->view('tutor/nilai/cetak',$data,TRUE);
                    $jadwal= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                    $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                    $jadwal->Output('Rekap Nilai '.$data['matpel']["matpel_nama"].' '.$data['wb']["wargabelajar_nomor_induk"].' Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').' Semester '.ucfirst($this->uri->segment(3)).'.pdf', 'D');
                    
                }elseif($type=="xlsx"){
                    $data['jadwals'] = $model->getJadwals($jadwal);
                    var_dump($data['jadwals']);
                }
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
        public function countNilai($id=null){
            if(!isset($id)) redirect('nilai');

            $nilai = $this->Nilai_model;
            
            $harian = $nilai->calcHarian($id);
            $tugas = $nilai->calcTugas($id);
            $uts = $nilai->calcUts($id);
            $uas = $nilai->calcUas($id);

            $total = $harian['rata']+$tugas['rata']+$uts['rata']+$uas['rata'];
            $rata = $total/4;

            $data[0]['total']=$total;
            $data[0]['rata']=$rata;
            echo json_encode($data);
        }
        public function hapus($semester=null,$jadwal=null,$id=null,$nilai=null){
            if(!isset($id) || (!isset($jadwal))|| (!isset($semester))|| (!isset($nilai))){
                redirect('nilai');
            }else{

                $hapus = $this->Nilai_model->hapusNilaiDet($nilai);
                if($hapus){
                    $this->session->set_flashdata('success','<div class="alert alert-success d-flex align-items-center" role="alert"><div class="flex-00-auto"><i class="fa fa-fw fa-check"></i></div><div class="flex-fill ml-3"><p class="mb-0">Berhasil menghapus nilai!</p></div></div>');
                }else{
                    $this->session->set_flashdata('failed','<div class="alert alert-danger d-flex align-items-center justify-content-between" role="alert"><div class="flex-00-auto"><i class="fa fa-fw fa-times-circle"></i></div><div class="flex-fill ml-3"><p class="mb-0">Gagal menghapus nilai!</p></div></div>');
                }

                redirect('nilai/matpel/'.$semester.'/'.$jadwal.'/'.$id);
            }
        }
        public function ubah($semester=null,$jadwal=null,$id=null,$nilai=null){
            if(!isset($id) || (!isset($jadwal))|| (!isset($semester))|| (!isset($nilai))){
                redirect('nilai');
            }else{

                $ubah = $this->Nilai_model->hapusNilaiDet($nilai);
                if($hapus){
                    $this->session->set_flashdata('success','<div class="alert alert-success d-flex align-items-center" role="alert"><div class="flex-00-auto"><i class="fa fa-fw fa-check"></i></div><div class="flex-fill ml-3"><p class="mb-0">Berhasil menghapus nilai!</p></div></div>');
                }else{
                    $this->session->set_flashdata('failed','<div class="alert alert-danger d-flex align-items-center justify-content-between" role="alert"><div class="flex-00-auto"><i class="fa fa-fw fa-times-circle"></i></div><div class="flex-fill ml-3"><p class="mb-0">Gagal menghapus nilai!</p></div></div>');
                }

                redirect('nilai/matpel/'.$semester.'/'.$jadwal.'/'.$id);
            }
        }

        public function rekap($jadwal=null,$semester=null,$type=null)
        {
            if(!isset($jadwal) || !isset($semester)) redirect('nilai');
            if($semester != "ganjil" && $semester != "genap" ) redirect('nilai');

            $nilai = $this->Nilai_model;
            
            $data["model"]=$this->Nilai_model;
            $data["wargabelajars"]= $nilai->getWargaBelajar($jadwal);
            $data["jadwal"]= $nilai->getKelasAndMatpel($jadwal);
            if(!$data["jadwal"]) redirect('nilai');

            $data["title"] = "Rekap Nilai Semester ".ucfirst($semester);
            $data["tahunajarans"]=$this->Nilai_model->getTahunAjaran();

            $this->load->view('tutor/nilai/rekap',$data);

            if($type=="pdf"){

                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('tutor/nilai/cetak_rekap',$data,TRUE);
                $jadwal= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $jadwal->Output('Rekap Nilai '.$data['jadwal']["matpel_nama"].' '.$data['jadwal']["kelas_nama"].' Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').' Semester '.ucfirst($this->uri->segment(4)).'.pdf', 'D');
                
            }elseif($type=="xlsx"){
                $data['jadwals'] = $model->getJadwals($jadwal);
                var_dump($data['jadwals']);
            }
        }

    }
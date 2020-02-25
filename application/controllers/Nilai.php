<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
 
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

        public function getNilais($id=null){
            if(!isset($id)) redirect('nilai');

            $nilai = $this->Nilai_model;
            $data = $nilai->getDataNilai($id);

            echo json_encode($data);
        }
        public function updatenilai()
        {
            if($this->input->method()=="post"){
                $model = $this->Nilai_model;
                $id = $this->input->post('id');
                $update = $model->updatenilai($id,array(
                    'nilai_details_nilai'   => $this->input->post('nilai'),
                    'nilai_details_jenis'   => $this->input->post('jenis')
                ));
            }else{
                redirect('nilai');
            }
        }
        public function getnilai($id=null){
            if(!isset($id)) redirect('nilai');

            $nilai = $this->Nilai_model;
            $data = $nilai->getnilai($id);

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
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:N1')
                    ->setCellValue('A2', 'Data Nilai '.$data["jadwal"]["matpel_nama"].' '.$data["jadwal"]["kelas_nama"].' '.$this->session->userdata('tahunajaran_nama').' '.ucfirst($semester))
                    ->mergeCells('A2:N2')
                    ->setCellValue('A5','NO')
                    ->mergeCells('A5:A6')
                    ->setCellValue('B5','Nomor Induk')
                    ->mergeCells('B5:B6')
                    ->setCellValue('C5','Nama')
                    ->mergeCells('C5:C6')
                    ->setCellValue('D5','Total')
                    ->mergeCells('D5:G5')
                    ->setCellValue('D6','Harian')
                    ->setCellValue('E6','Tugas')
                    ->setCellValue('F6','UTS')
                    ->setCellValue('G6','UAS')
                    ->setCellValue('H5','Nilai')
                    ->mergeCells('H5:K5')
                    ->setCellValue('H6','Harian')
                    ->setCellValue('I6','Tugas')
                    ->setCellValue('J6','UTS')
                    ->setCellValue('K6','UAS')
                    ->setCellValue('L5','Total')
                    ->mergeCells('L5:L6')
                    ->setCellValue('M5','Rata-rata')
                    ->mergeCells('M5:M6')
                    ->setCellValue('N5','Keterangan')
                    ->mergeCells('N5:N6');

                // Set Width
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
                

                // Parsing data from database
                $row = 7;
                $n = 1;
                foreach ($data["wargabelajars"] as $wargabelajar) {
                    $id = $wargabelajar["wargabelajar_id"];
                    $getnilaiID = $nilai->getIDNIilai($jadwal,$id,$semester);
                    $idnilai = $getnilaiID["nilai_id"];

                    $CountUTS = $nilai->countUts($idnilai);
                    $CountUAS = $nilai->countUas($idnilai);
                    $CountTugas = $nilai->countTugas($idnilai);
                    $CountHarian = $nilai->countHarian($idnilai);

                    $sumUTS = $nilai->sumUts($idnilai);
                    $sumUAS = $nilai->sumUas($idnilai);
                    $sumTugas = $nilai->sumTugas($idnilai);
                    $sumHarian = $nilai->sumHarian($idnilai);

                    $total = $sumUTS['uts']+$sumUAS['uas']+$sumTugas['tugas']+$sumHarian['harian'];
                    $average = ($total / 4);
                    
                    if($average>=90 && $average<=100){
                        $status ="A";
                    }elseif($average>=80 && $average<90){
                        $status = "B";
                    }elseif($average>=70 && $average<80){
                        $status = "C";
                    }elseif($average>=60 && $average<70){
                        $status = "D";
                    }else{
                        $status = "E";
                    }
                    
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,$n)
                        ->setCellValue('B'.$row,$wargabelajar["wargabelajar_nomor_induk"])
                        ->setCellValue('C'.$row,$wargabelajar["wargabelajar_nama"])
                        ->setCellValue('D'.$row,$CountHarian['harian'])
                        ->setCellValue('E'.$row,$CountTugas['tugas'])
                        ->setCellValue('F'.$row,$CountUTS['uts'])
                        ->setCellValue('G'.$row,$CountUAS['uas'])
                        ->setCellValue('H'.$row,$sumHarian['harian'])
                        ->setCellValue('I'.$row,$sumTugas['tugas'])
                        ->setCellValue('J'.$row,$sumUTS['uts'])
                        ->setCellValue('K'.$row,$sumUAS['uas'])
                        ->setCellValue('L'.$row,$total)
                        ->setCellValue('M'.$row,$average)
                        ->setCellValue('N'.$row,$status);
                    $row++;
                    $n++;
                }
                $ndata = $row - 1;

                $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,"Total")
                        ->mergeCells('A'.$row.':C'.$row)
                        ->setCellValue('D'.$row,'=sum(D7:D'.$ndata.')')
                        ->setCellValue('E'.$row,'=sum(E7:E'.$ndata.')')
                        ->setCellValue('F'.$row,'=sum(F7:F'.$ndata.')')
                        ->setCellValue('G'.$row,'=sum(G7:G'.$ndata.')')
                        ->setCellValue('H'.$row,'=sum(H7:H'.$ndata.')')
                        ->setCellValue('I'.$row,'=sum(I7:I'.$ndata.')')
                        ->setCellValue('J'.$row,'=sum(J7:J'.$ndata.')')
                        ->setCellValue('K'.$row,'=sum(K7:K'.$ndata.')')
                        ->setCellValue('L'.$row,'=sum(L7:L'.$ndata.')')
                        ->setCellValue('M'.$row,'=sum(M7:M'.$ndata.')');
                        $row+=1;
                $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,"Rata-rata")
                        ->mergeCells('A'.$row.':C'.$row)
                        ->setCellValue('D'.$row,'=average(D7:D'.$ndata.')')
                        ->setCellValue('E'.$row,'=average(E7:E'.$ndata.')')
                        ->setCellValue('F'.$row,'=average(F7:F'.$ndata.')')
                        ->setCellValue('G'.$row,'=average(G7:G'.$ndata.')')
                        ->setCellValue('H'.$row,'=average(H7:H'.$ndata.')')
                        ->setCellValue('I'.$row,'=average(I7:I'.$ndata.')')
                        ->setCellValue('J'.$row,'=average(J7:J'.$ndata.')')
                        ->setCellValue('K'.$row,'=average(K7:K'.$ndata.')')
                        ->setCellValue('L'.$row,'=average(L7:L'.$ndata.')')
                        ->setCellValue('M'.$row,'=average(M7:M'.$ndata.')');
                        $row+=1;
                $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,"Banyak Data")
                        ->mergeCells('A'.$row.':C'.$row)
                        ->setCellValue('D'.$row,'=count(D7:D'.$ndata.')')
                        ->setCellValue('E'.$row,'=count(E7:E'.$ndata.')')
                        ->setCellValue('F'.$row,'=count(F7:F'.$ndata.')')
                        ->setCellValue('G'.$row,'=count(G7:G'.$ndata.')')
                        ->setCellValue('H'.$row,'=count(H7:H'.$ndata.')')
                        ->setCellValue('I'.$row,'=count(I7:I'.$ndata.')')
                        ->setCellValue('J'.$row,'=count(J7:J'.$ndata.')')
                        ->setCellValue('K'.$row,'=count(K7:K'.$ndata.')')
                        ->setCellValue('L'.$row,'=count(L7:L'.$ndata.')')
                        ->setCellValue('M'.$row,'=count(M7:M'.$ndata.')');
                        $row+=1;
                $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,"Tertinggi")
                        ->mergeCells('A'.$row.':C'.$row)
                        ->setCellValue('D'.$row,'=max(D7:D'.$ndata.')')
                        ->setCellValue('E'.$row,'=max(E7:E'.$ndata.')')
                        ->setCellValue('F'.$row,'=max(F7:F'.$ndata.')')
                        ->setCellValue('G'.$row,'=max(G7:G'.$ndata.')')
                        ->setCellValue('H'.$row,'=max(H7:H'.$ndata.')')
                        ->setCellValue('I'.$row,'=max(I7:I'.$ndata.')')
                        ->setCellValue('J'.$row,'=max(J7:J'.$ndata.')')
                        ->setCellValue('K'.$row,'=max(K7:K'.$ndata.')')
                        ->setCellValue('L'.$row,'=max(L7:L'.$ndata.')')
                        ->setCellValue('M'.$row,'=max(M7:M'.$ndata.')');
                        $row+=1;
                $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,"Terendah")
                        ->mergeCells('A'.$row.':C'.$row)
                        ->setCellValue('D'.$row,'=min(D7:D'.$ndata.')')
                        ->setCellValue('E'.$row,'=min(E7:E'.$ndata.')')
                        ->setCellValue('F'.$row,'=min(F7:F'.$ndata.')')
                        ->setCellValue('G'.$row,'=min(G7:G'.$ndata.')')
                        ->setCellValue('H'.$row,'=min(H7:H'.$ndata.')')
                        ->setCellValue('I'.$row,'=min(I7:I'.$ndata.')')
                        ->setCellValue('J'.$row,'=min(J7:J'.$ndata.')')
                        ->setCellValue('K'.$row,'=min(K7:K'.$ndata.')')
                        ->setCellValue('L'.$row,'=min(L7:L'.$ndata.')')
                        ->setCellValue('M'.$row,'=min(M7:M'.$ndata.')');
                        $row+=1;
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Rekap Niliai'.date('d-m-Y H'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Data Nilai '.$data["jadwal"]["matpel_nama"].' '.$data["jadwal"]["kelas_nama"].' '.$this->session->userdata('tahunajaran_nama').' '.ucfirst($semester).'.xlsx"');
                header('Cache-Control: max-age=0');
                // If you're serving to IE 9, then the following may be needed
                header('Cache-Control: max-age=1');

                // If you're serving to IE over SSL, then the following may be needed
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0

                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        }

    }
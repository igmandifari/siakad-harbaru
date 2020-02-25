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
        public function matpel($jadwal=null,$id=null,$type=null)
        {
            if(!isset($id) || (!isset($jadwal)))redirect('nilai');
            $nilai = $this->Nilai_model;
            $there = $nilai->checkAvailable($jadwal,$id);
            if(!$there){
                $insert = $nilai->insertNilai(array(
                    'nilai_id'          => uniqid(),
                    'jadwal_id'         => $this->uri->segment(3),
                    'wargabelajar_id'   => $this->uri->segment(4),
                    'created_at'        => date('Y-m-d H:i:s')
                    )
                );
                if($insert){
                    redirect('nilai/matpel/'.$jadwal.'/'.$id);
                }
            }else{
                $data['idnilai'] = $nilai->getIDNIilai($jadwal,$id);
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
                    $pts = $nilai->calcPTS($data['idnilai']['nilai_id']);
                    $pas = $nilai->calcPAS($data['idnilai']['nilai_id']);
                    $pat = $nilai->calcPAT($data['idnilai']['nilai_id']);

                    $total = $harian['rata']+$tugas['rata']+$pts['rata']+$pas['rata']+$pat['rata'];
                    $rata = $total/5;
                    $data['harian'] = $harian['rata'];
                    $data['tugas'] = $tugas['rata'];
                    $data['pts'] = $pts['rata'];
                    $data['pas'] = $pas['rata'];
                    $data['pat'] = $pat['rata'];
                    $data['total'] = $total;
                    $data['rata'] =$rata;

                    $style = file_get_contents(base_url('assets/css/presensi.css'));
                    $cetak = $this->load->view('tutor/nilai/cetak',$data,TRUE);
                    $jadwal= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                    $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                    $jadwal->Output('Rekap Nilai '.$data['matpel']["matpel_nama"].' '.$data['wb']["wargabelajar_nomor_induk"].' Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.pdf', 'D');
                    
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
            $pts = $nilai->calcPTS($id);
            $pas = $nilai->calcPAS($id);
            $pat = $nilai->calcPAT($id);

            $total = $harian['rata']+$tugas['rata']+$pts['rata']+$pas['rata']+$pat['rata'];
            $rata = $total/5;

            $data[0]['total']=$total;
            $data[0]['rata']=$rata;
            echo json_encode($data);
        }
        public function hapus($jadwal=null,$id=null,$nilai=null){
            if(!isset($id) || (!isset($jadwal))|| (!isset($nilai))){
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

        public function rekap($jadwal=null,$type=null)
        {
            if(!isset($jadwal))redirect('nilai');
           
            $nilai = $this->Nilai_model;
            
            $data["model"]=$this->Nilai_model;
            $data["wargabelajars"]= $nilai->getWargaBelajar($jadwal);
            $data["jadwal"]= $nilai->getKelasAndMatpel($jadwal);
            if(!$data["jadwal"]) redirect('nilai');

            $data["title"] = 'Rekap Nilai '.$data['jadwal']["matpel_nama"].' '.$data['jadwal']["kelas_nama"].' Tahun Ajaran '.$this->session->userdata('tahunajaran_nama');
            $data["tahunajarans"]=$this->Nilai_model->getTahunAjaran();

            $this->load->view('tutor/nilai/rekap',$data);

            if($type=="pdf"){

                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('tutor/nilai/cetak_rekap',$data,TRUE);
                $jadwal= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $jadwal->Output('Rekap Nilai '.$data['jadwal']["matpel_nama"].' '.$data['jadwal']["kelas_nama"].' Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.pdf', 'D');
                
            }elseif($type=="xlsx"){
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:P1')
                    ->setCellValue('A2', 'Rekap Nilai '.$data['jadwal']["matpel_nama"].' '.$data['jadwal']["kelas_nama"].' Tahun Ajaran '.$this->session->userdata('tahunajaran_nama'))
                    ->mergeCells('A2:P2')
                    ->setCellValue('A5','NO')
                    ->mergeCells('A5:A6')
                    ->setCellValue('B5','Nomor Induk')
                    ->mergeCells('B5:B6')
                    ->setCellValue('C5','Nama')
                    ->mergeCells('C5:C6')
                    ->setCellValue('D5','Total')
                    ->mergeCells('D5:H5')
                    ->setCellValue('D6','Harian')
                    ->setCellValue('E6','Tugas')
                    ->setCellValue('F6','PTS')
                    ->setCellValue('G6','PAS')
                    ->setCellValue('H6','PAT')
                    ->setCellValue('I5','Nilai')
                    ->mergeCells('I5:M5')
                    ->setCellValue('I6','Harian')
                    ->setCellValue('J6','Tugas')
                    ->setCellValue('K6','PTS')
                    ->setCellValue('L6','PAS')
                    ->setCellValue('M6','PAT')
                    ->setCellValue('N5','Total')
                    ->mergeCells('N5:N6')
                    ->setCellValue('O5','Rata-rata')
                    ->mergeCells('O5:O6')
                    ->setCellValue('P5','Keterangan')
                    ->mergeCells('P5:P6');

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
                $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
                

                // Parsing data from database
                $row = 7;
                $n = 1;
                foreach ($data["wargabelajars"] as $wargabelajar) {
                    $id = $wargabelajar["wargabelajar_id"];
                    $getnilaiID = $nilai->getIDNIilai($jadwal,$id);
                    $idnilai = $getnilaiID["nilai_id"];

                    $CountPAT = $nilai->countPAT($idnilai);
                    $CountPTS = $nilai->countPTS($idnilai);
                    $CountPAS = $nilai->countPAS($idnilai);
                    $CountTugas = $nilai->countTugas($idnilai);
                    $CountHarian = $nilai->countHarian($idnilai);

                    $sumPTS = $nilai->sumPTS($idnilai);
                    $sumPAS = $nilai->sumPAS($idnilai);
                    $sumPAT = $nilai->sumPAT($idnilai);
                    $sumTugas = $nilai->sumTugas($idnilai);
                    $sumHarian = $nilai->sumHarian($idnilai);

                    $total = $sumPTS['pts']+$sumPAS['pas']+$sumTugas['tugas']+$sumHarian['harian'] + $sumPAT['pat'];
                    $average = ($total / 5);
                    
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
                        ->setCellValue('F'.$row,$CountPTS['pts'])
                        ->setCellValue('G'.$row,$CountPAS['pas'])
                        ->setCellValue('H'.$row,$CountPAT['pat'])
                        ->setCellValue('I'.$row,$sumHarian['harian'])
                        ->setCellValue('J'.$row,$sumTugas['tugas'])
                        ->setCellValue('K'.$row,$sumPTS['pts'])
                        ->setCellValue('L'.$row,$sumPAS['pas'])
                        ->setCellValue('M'.$row,$sumPAT['pat'])
                        ->setCellValue('N'.$row,$total)
                        ->setCellValue('O'.$row,$average)
                        ->setCellValue('P'.$row,$status);
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
                        ->setCellValue('M'.$row,'=sum(M7:M'.$ndata.')')
                        ->setCellValue('N'.$row,'=sum(N7:N'.$ndata.')')
                        ->setCellValue('O'.$row,'=sum(O7:O'.$ndata.')');
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
                        ->setCellValue('M'.$row,'=average(M7:M'.$ndata.')')
                        ->setCellValue('N'.$row,'=average(N7:N'.$ndata.')')
                        ->setCellValue('O'.$row,'=average(O7:O'.$ndata.')');
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
                        ->setCellValue('M'.$row,'=count(M7:M'.$ndata.')')
                        ->setCellValue('N'.$row,'=count(N7:N'.$ndata.')')
                        ->setCellValue('O'.$row,'=count(O7:O'.$ndata.')');
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
                        ->setCellValue('M'.$row,'=max(M7:M'.$ndata.')')
                        ->setCellValue('N'.$row,'=max(N7:N'.$ndata.')')
                        ->setCellValue('O'.$row,'=max(O7:O'.$ndata.')');
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
                        ->setCellValue('M'.$row,'=min(M7:M'.$ndata.')')
                        ->setCellValue('N'.$row,'=min(N7:N'.$ndata.')')
                        ->setCellValue('O'.$row,'=min(O7:O'.$ndata.')');
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
                header('Content-Disposition: attachment;filename="Rekap Nilai '.$data['jadwal']["matpel_nama"].' '.$data['jadwal']["kelas_nama"].' Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.xlsx"');
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
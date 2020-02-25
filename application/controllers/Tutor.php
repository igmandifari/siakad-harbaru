<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Tutor extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model("Tutor_model");
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index()
    {
        $data["tutors"] = $this->Tutor_model->getAll();
        $data["title"] = "Data Tutor";
        $data["actor"] = "Tutor";
        $data["tahunajarans"] = $this->Tutor_model->getTahunAjaran();
        $this->load->view('tutor/list',$data);    
    }

    public function hapus($id=null)
    {
        if (!isset($id)){
            redirect('siswa');
        }
        else{
            try{
            $this->Tutor_model->delete($id);
            $this->session->set_flashdata('success', 'Berhasil');
        }catch( Exception $e ) {
            redirect('dasbor');
        }

            
            redirect('tutor');
        }
    }
    public function ubah_password(){
        $tutor = $this->Tutor_model;

        $this->form_validation->set_rules('tutor_password','Password','min_length[5]');

        if ($this->form_validation->run()){
           $tutor->perbarui_password();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('tutor');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal');
            redirect('tutor');
        } 
    }
    public function ubah($id=null)
    {
        if (!isset($id)) redirect('tutor');

        $tutor = $this->Tutor_model;
        $data['tutor'] = $tutor->getByid($id);

        if(!$data['tutor']) redirect('tutor');
        
        $validasi = $this->form_validation;
        $validasi->set_rules($tutor->rules());
        if ($validasi->run()){
                $tutor->perbarui();
                $this->session->set_flashdata('success', 'Berhasil');
            
        }else{
            $this->session->set_flashdata('failed', 'Gagal');
        }
        $data["title"] = "Ubah Data";
        $data["actor"] = "Tutor";
        $data["tahunajarans"] = $this->Tutor_model->getTahunAjaran();
        
        $this->load->view('tutor/ubah',$data);
    }

    public function tambah()
    {
        $tutor = $this->Tutor_model;
    
        $validasi = $this->form_validation;
        $validasi->set_rules($tutor->rules());
        if ($validasi->run()){
            
            $tutor->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('tutor');
        }
        
        $data["title"] = "Tambah Data";
        $data["actor"] = "Tutor";
        $data["tahunajarans"] = $this->Tutor_model->getTahunAjaran();

        $this->load->view('tutor/tambah',$data);
    }
    public function cetak($type=null)
    {
        $tutor = $this->Tutor_model;
        $data['tutors'] = $tutor->getAll();
        if ($type != "xlsx" && $type !="pdf") {
                redirect('tutor');
            }elseif($type=="pdf"){
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('tutor/cetak',$data,TRUE);
                $pdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $pdf->Output('Data Tutor.pdf', 'D');
            }elseif($type=="xlsx"){
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:O1')
                    ->setCellValue('A2', 'Data Tutor')
                    ->mergeCells('A2:O2')
                    ->setCellValue('A5','NO')
                    ->setCellValue('B5','Nomor Induk')
                    ->setCellValue('C5','Nama Lengkap')
                    ->setCellValue('D5','Jenis Kelamin')
                    ->setCellValue('E5','Tempat Lahir')
                    ->setCellValue('F5','Tanggal Lahir')
                    ->setCellValue('G5','Agama')
                    ->setCellValue('H5','Pendidikan Terakhir')
                    ->setCellValue('I5','Kewarganegaraan')
                    ->setCellValue('J5','Alamat')
                    ->setCellValue('K5','Desa/Kelurahan')
                    ->setCellValue('L5','Kecamatan')
                    ->setCellValue('M5','Kota/Kab')
                    ->setCellValue('N5','Provinsi')
                    ->setCellValue('O5','Kode POS');

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
                $row = 6;
                $n = 1;
                foreach ($data["tutors"] as $tutor) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,$n)
                        ->setCellValue('B'.$row,$tutor->tutor_nomor_induk)
                        ->setCellValue('C'.$row,$tutor->tutor_nama)
                        ->setCellValue('D'.$row,$tutor->tutor_jenis_kelamin)
                        ->setCellValue('E'.$row,$tutor->tutor_tempat_lahir)
                        ->setCellValue('F'.$row,$tutor->tutor_tanggal_lahir)
                        ->setCellValue('G'.$row,$tutor->tutor_agama)
                        ->setCellValue('H'.$row,$tutor->tutor_pendidikan_terakhir)
                        ->setCellValue('I'.$row,$tutor->tutor_kewarganegaraan)
                        ->setCellValue('J'.$row,$tutor->tutor_alamat_jalan.' '.$tutor->tutor_alamat_rtrw)
                        ->setCellValue('K'.$row,$tutor->tutor_alamat_desa)
                        ->setCellValue('L'.$row,$tutor->tutor_alamat_kecamatan)
                        ->setCellValue('M'.$row,$tutor->tutor_alamat_kabupaten)
                        ->setCellValue('N'.$row,$tutor->tutor_alamat_provinsi)
                        ->setCellValue('O'.$row,$tutor->tutor_alamat_kodepos);
                    $row++;
                    $n++;
                }
              
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Data Tutor '.date('d-m-Y H'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Data Tutor.xlsx"');
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
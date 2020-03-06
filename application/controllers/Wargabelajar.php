<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

Class Wargabelajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Wargabelajar_model');
        $this->load->library('form_validation');        
        $this->load->helper('security');
        $logs = $this->Wargabelajar_model->logs(); 

    }
    
    public function index()
    {
        $data["title"] = "Data Warga Belajar";
   	    $data["actor"] = "Warga Belajar";
        $data["wargabelajars"] = $this->Wargabelajar_model->getAll();
        $data["tahunajaran_all"] = $this->Wargabelajar_model->getTahunAjaran();

        $this->load->view('wargabelajar/list',$data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) redirect('wargabelajar');
        
        if($this->Wargabelajar_model->delete($id)){
            redirect('wargabelajar');
        }
    }
    public function ubah_password(){
        $wargabelajar = $this->Wargabelajar_model;

        $this->form_validation->set_rules('wargabelajar_password','Password','min_length[5]');

        if ($this->form_validation->run()){
           $wargabelajar->perbarui_password();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('wargabelajar');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal');
            redirect('wargabelajar');
        } 
    }
    public function ubah_orangtua(){
        $wargabelajar = $this->Wargabelajar_model;

        $validasi = $this->form_validation;
        $validasi->set_rules($wargabelajar->rules_ortu());

        if ($validasi->run()){
           $wargabelajar->perbarui_ortu();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('wargabelajar');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal');
            redirect('wargabelajar');
        } 

    }
    public function ubah($id = null)
    {
        if (!isset($id)) redirect('wargabelajar');

        $wargabelajar = $this->Wargabelajar_model;
     
        $validasi = $this->form_validation;
        $validasi->set_rules($wargabelajar->rules_2());

        if ($validasi->run()){
            $wargabelajar->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        }
        $data['wargabelajar'] = $wargabelajar->getByid($id);
        $data["title"] = "Ubah Data";
        $data["actor"] = "Warga Belajar";
        $data["tahunajaran_all"] = $wargabelajar->getTahunAjaran();
        

        if(!$data['wargabelajar']) redirect('wargabelajar');
        
        $this->load->view('wargabelajar/ubah',$data);
    }

    public function tambah()
    {
        $wargabelajar = $this->Wargabelajar_model;
        

        $validasi =  $this->form_validation;
        $validasi->set_rules($wargabelajar->rules());

        if ($validasi->run()){
            $wargabelajar->simpan();
            $this->session->set_flashdata('success', 'Berhasil');

            redirect('wargabelajar');
        }
        $nik = $wargabelajar->get_nik();
        $data["rec_nik"] = ($nik['nik'] + 1); 
        $data["title"] = "Tambah Data";
        $data["actor"] = "Warga Belajar";
        $data["tahunajaran_all"] = $wargabelajar->getTahunAjaran();

        $this->load->view('wargabelajar/tambah',$data);
    }
    function select_validate($param)
    {
        if($param=="0"){
            $this->form_validation->set_message('select_validate', 'Mohon untuk memilih {field}');
            return false;
        } else{
            return true;
        }
    }
    public function cetak($type=null)
    {
        $wargabelajar= $this->Wargabelajar_model;
        $data["wargabelajars"] = $wargabelajar->getAlls();
        if ($type != "xlsx" && $type !="pdf") {
                redirect('wargabelajar');
            }elseif($type=="pdf"){
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('wargabelajar/cetak',$data,TRUE);
                $pdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $pdf->Output('Data Wargabelajar.pdf', 'D');
            }elseif($type=="xlsx"){
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:AK1')
                    ->setCellValue('A2', 'Data Wargabelajar')
                    ->mergeCells('A2:AK2')
                    ->setCellValue('A5','NO')
                    ->setCellValue('B5','Nomor Induk')
                    ->setCellValue('C5','NISN')
                    ->setCellValue('D5','Nama Lengkap')
                    ->setCellValue('E5','Jenis Kelamin')
                    ->setCellValue('F5','Tempat Lahir')
                    ->setCellValue('G5','Tanggal Lahir')
                    ->setCellValue('H5','Agama')
                    ->setCellValue('I5','Kewarganegaraan')
                    ->setCellValue('J5','Alamat')
                    ->setCellValue('K5','Desa/Kelurahan')
                    ->setCellValue('L5','Kecamatan')
                    ->setCellValue('M5','Kota/Kab')
                    ->setCellValue('N5','Provinsi')
                    ->setCellValue('O5','Kode POS')
                    ->setCellValue('P5','Asal Sekolah')
                    ->setCellValue('Q5','Alamat Asal Sekolah')
                    ->setCellValue('R5','Nomor STTB')
                    ->setCellValue('S5','Tanggal Masuk')
                    ->setCellValue('T5','Tahun Ajaran Masuk')
                    ->setCellValue('U5','Nama Ayah')
                    ->setCellValue('V5','Nama Ibu')
                    ->setCellValue('W5','Pekerjaan')
                    ->setCellValue('X5','Alamat')
                    ->setCellValue('Y5','Desa/Kelurahan')
                    ->setCellValue('Z5','Kecamatan')
                    ->setCellValue('AA5','Kota/Kab')
                    ->setCellValue('AB5','Provinsi')
                    ->setCellValue('AC5','Kode POS')
                    ->setCellValue('AD5','Nama Wali')
                    ->setCellValue('AE5','Pekerjaan')
                    ->setCellValue('AF5','Alamat')
                    ->setCellValue('AG5','Desa/Kelurahan')
                    ->setCellValue('AH5','Kecamatan')
                    ->setCellValue('AI5','Kota/Kab')
                    ->setCellValue('AJ5','Provinsi')
                    ->setCellValue('AK5','Kode POS')
                    ;

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
                $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true); 
                $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true); 
                $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true); 
                $spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);  
                $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true); 
                $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true); 
                $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true); 
                $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true); 
                $spreadsheet->getActiveSheet()->getColumnDimension('AG')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('AH')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('AI')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('AJ')->setAutoSize(true); 
                $spreadsheet->getActiveSheet()->getColumnDimension('AK')->setAutoSize(true);

                // Parsing data from database
                $row = 6;
                $n = 1;
                foreach ($data["wargabelajars"] as $wargabelajar) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,$n)
                        ->setCellValue('B'.$row,$wargabelajar->wargabelajar_nomor_induk)
                        ->setCellValue('C'.$row,$wargabelajar->wargabelajar_nisn)
                        ->setCellValue('D'.$row,$wargabelajar->wargabelajar_nama)
                        ->setCellValue('E'.$row,$wargabelajar->wargabelajar_jenis_kelamin)
                        ->setCellValue('F'.$row,$wargabelajar->wargabelajar_tempat_lahir)
                        ->setCellValue('G'.$row,$wargabelajar->wargabelajar_tanggal_lahir)
                        ->setCellValue('H'.$row,$wargabelajar->wargabelajar_agama)
                        ->setCellValue('I'.$row,$wargabelajar->wargabelajar_kewarganegaraan)
                        ->setCellValue('J'.$row,$wargabelajar->wargabelajar_alamat_jalan.' '.$wargabelajar->wargabelajar_alamat_rtrw)
                        ->setCellValue('K'.$row,$wargabelajar->wargabelajar_alamat_desa)
                        ->setCellValue('L'.$row,$wargabelajar->wargabelajar_alamat_kecamatan)
                        ->setCellValue('M'.$row,$wargabelajar->wargabelajar_alamat_kabupaten)
                        ->setCellValue('N'.$row,$wargabelajar->wargabelajar_alamat_provinsi)
                        ->setCellValue('O'.$row,$wargabelajar->wargabelajar_alamat_kodepos)
                        ->setCellValue('P'.$row,$wargabelajar->wargabelajar_kejar)
                        ->setCellValue('Q'.$row,$wargabelajar->wargabelajar_kejar_alamat)
                        ->setCellValue('R'.$row,$wargabelajar->wargabelajar_sttb)
                        ->setCellValue('S'.$row,$wargabelajar->wargabelajar_masuk)
                        ->setCellValue('T'.$row,$wargabelajar->tahunajaran_nama)
                        ->setCellValue('U'.$row,$wargabelajar->orangtua_ayah_nama)
                        ->setCellValue('V'.$row,$wargabelajar->orangtua_ibu_nama)
                        ->setCellValue('W'.$row,$wargabelajar->orangtua_ayah_pekerjaan)
                        ->setCellValue('X'.$row,$wargabelajar->orangtua_ayah_alamat_jalan.' '.$wargabelajar->orangtua_ayah_alamat_rtrw)
                        ->setCellValue('Y'.$row,$wargabelajar->orangtua_ayah_alamat_desa)
                        ->setCellValue('Z'.$row,$wargabelajar->orangtua_ayah_alamat_kecamatan)
                        ->setCellValue('AA'.$row,$wargabelajar->orangtua_ayah_alamat_kabupaten)
                        ->setCellValue('AB'.$row,$wargabelajar->orangtua_ayah_alamat_provinsi)
                        ->setCellValue('AC'.$row,$wargabelajar->orangtua_ayah_alamat_kodepos)
                        ->setCellValue('AD'.$row,$wargabelajar->orangtua_wali_nama)
                        ->setCellValue('AE'.$row,$wargabelajar->orangtua_wali_pekerjaan)
                        ->setCellValue('AF'.$row,$wargabelajar->orangtua_wali_alamat_jalan.' '.$wargabelajar->orangtua_wali_alamat_rtrw)
                        ->setCellValue('AG'.$row,$wargabelajar->orangtua_wali_alamat_desa)
                        ->setCellValue('AH'.$row,$wargabelajar->orangtua_wali_alamat_kecamatan)
                        ->setCellValue('AI'.$row,$wargabelajar->orangtua_wali_alamat_kabupaten)
                        ->setCellValue('AJ'.$row,$wargabelajar->orangtua_wali_alamat_provinsi)
                        ->setCellValue('AK'.$row,$wargabelajar->orangtua_wali_alamat_kodepos);
                    $row++;
                    $n++;
                }
              
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Data Wargabelajar '.date('d-m-Y H'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Data Wargabelajar.xlsx"');
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
    public function cek(){
        echo phpinfo();
    }

}
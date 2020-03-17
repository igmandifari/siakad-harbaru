<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    
class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');        
        $this->load->helper('security');
    }

    public function index()
    {
        $logs = $this->Kelas_model->logs();
        $data["title"] = "Data Kelas";
        $data["actor"] = "Kelas";
        $data["kelass"] = $this->Kelas_model->getAll();
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();
    
        $this->load->view('kelas/list',$data);
    }
    public function tambah()
    {
        $logs = $this->Kelas_model->logs();
        $kelas = $this->Kelas_model;
        
        $validasi = $this->form_validation;
        $validasi->set_rules($kelas->rules());

        if ($validasi->run()){
            $kelas->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
            
            redirect("kelas"); 
        }

        $data["title"] = "Tambah Data";
        $data["actor"] = "Kelas";
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        $this->load->view('kelas/tambah',$data);
    }

    public function hapus($id=null)
    {
        $logs = $this->Kelas_model->logs();
        if(!isset($id)){
            redirect('kelas');
        }else{
            $this->Kelas_model->delete($id);
            redirect('kelas');
        }
    }
    

    public function ubah($id=null)
    {
        $logs = $this->Kelas_model->logs();
        if (!isset($id)) redirect('kelas');

        $kelas = $this->Kelas_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($kelas->rules());

        if ($validasi->run()){
            $kelas->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        }
        
        $data["title"] = "Ubah Data";
        $data["actor"] = "Kelas";
        $data['kelas'] = $kelas->getByid($id);
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        if(!$data['kelas']) redirect('kelas');

        $this->load->view('kelas/ubah',$data);

    }
    public function rombel($type=null)
    {
        $logs = $this->Kelas_model->logs();
        $kelas = $this->Kelas_model;

        $data["actor"] = "Rombel";
        $data["title"] = "Daftar Rombel";
        $data["SemuaRombel"] = $kelas->getRombel();
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        $this->load->view('kelas/rombel_list',$data);
    }
    public function tambah_rombel()
    {
        $logs = $this->Kelas_model->logs();
        $kelas = $this->Kelas_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($kelas->rules_tambah_rombel());

        if($validasi->run()){
            $kelas->saveRombel();
            $this->session->set_flashdata('success', 'Berhasil'); 

            redirect('kelas/rombel');
        }
        $data['title'] = "Tambah Rombel";
        $data['actor'] = "Rombel";
        $data['getKelas'] = $kelas->getKelas();
        $data['getTahun'] = $kelas->getTahun();
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        $this->load->view('kelas/tambah_rombel',$data);
    }
    public function rombel_tambah($id=null)
    {
        $logs = $this->Kelas_model->logs();
        if (!isset($id)) redirect('kelas/rombel');
        $kelas = $this->Kelas_model;
        $data['kelas'] = $kelas->getRombelbyId($id);
        $data['semua_wargabelajar'] = $kelas->getWargaBelajarNonRombel();
        $data['actor'] = 'Rombel';
        $data['title'] = 'Masukan Ke Rombel';
        if(!$data['kelas']) redirect('kelas/rombel');
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        $this->load->view('kelas/rombel_tambah',$data);
        
    }
    public function rombel_lihat($id=null,$type=null)
    {
        $logs = $this->Kelas_model->logs();
        if (!isset($id)) redirect('kelas/rombel');
        $kelas = $this->Kelas_model;
        $data['kelas'] = $kelas->getRombelbyId($id);
        $data['semua_wargabelajar'] = $kelas->getRombelDetbyId($id);
        $data['actor'] = 'Rombel';
        $data['title'] = 'Lihat Rombel';
        if(!$data['semua_wargabelajar']) redirect('kelas/rombel');
        $data["tahunajarans"] = $this->Kelas_model->getTahunAjaran();

        $this->load->view('kelas/rombel_lihat',$data);
        if($type=="pdf"){

                    $style = file_get_contents(base_url('assets/css/presensi.css'));
                    $cetak = $this->load->view('kelas/cetak_rombel',$data,TRUE);
                    $pdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                    $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                    $pdf->Output('Data Rombel '.$data['kelas']["kelas_nama"].' Tahun Ajaran '.$data['kelas']["tahunajaran_nama"].'.pdf', 'D');
                    
                }elseif($type=="xlsx"){
                    $spreadsheet = new Spreadsheet();
                    $spreadsheet->getActiveSheet();
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'PKBM Harapan Baru')
                        ->mergeCells('A1:F1')
                        ->setCellValue('A2', 'Data Rombel')
                        ->mergeCells('A2:F2')
                        ->setCellValue('A5','NO')
                        ->setCellValue('B5','Tahun Ajaran')
                        ->setCellValue('C5','Kelas')
                        ->setCellValue('D5','Nomor Induk')
                        ->setCellValue('E5','NISN')
                        ->setCellValue('F5','Nama');

                    // Set Width
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    

                    // Parsing data from database
                    $row = 6;
                    $n = 1;
                    foreach ($data["semua_wargabelajar"] as $wargabelajar) {
                        $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A'.$row,$n)
                            ->setCellValue('B'.$row,$data["kelas"]["tahunajaran_nama"])
                            ->setCellValue('C'.$row,$data["kelas"]["kelas_nama"])
                            ->setCellValue('D'.$row,$wargabelajar->wargabelajar_nomor_induk)
                            ->setCellValue('E'.$row,$wargabelajar->wargabelajar_nisn)
                            ->setCellValue('F'.$row,$wargabelajar->wargabelajar_nama);
                        $row++;
                        $n++;
                    }
                  
                    // Rename worksheet
                    $spreadsheet->getActiveSheet()->setTitle('Rombel '.$data["kelas"]["kelas_nama"]);

                    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                    $spreadsheet->setActiveSheetIndex(0);

                    // Set landscape
                    $spreadsheet->getActiveSheet()->getPageSetup()
                        ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                    $spreadsheet->getActiveSheet()->getPageSetup()
                        ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                    // Redirect output to a client’s web browser (Xlsx)
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="Data Rombel '.$data["kelas"]["tahunajaran_nama"].' '.$data["kelas"]["kelas_nama"].'.xlsx"');
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
    public function rombel_simpan()
    {
        $logs = $this->Kelas_model->logs();
        $validasi = $this->form_validation;
        $kelas = $this->Kelas_model;
        if($this->input->method()=="post"){
            $rombel= $this->input->post('rombel_id');
            $wargabelajar = $this->input->post('wargabelajar_id');
                $cek = $kelas->cekisthere($wargabelajar,$rombel);
            if(isset($cek)){
                $this->session->set_flashdata('failed', 'Warga belajar Sudah ada');  
            }else{
                $kelas->rombelsave();
                $this->session->set_flashdata('success', 'Berhasil');            
            }
            redirect('kelas/rombel_tambah/'.$this->input->post('rombel_id'));
        }
        else{
            redirect('kelas/rombel');
        }
    }

    public function rombel_det_hapus($id=null,$rombel_id=null)
    {
        $logs = $this->Kelas_model->logs();
        if(!isset($id)){
            redirect('kelas/rombel_lihat/'.$rombel_id);
        }else{
            $this->Kelas_model->rombelDet($id);
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect('kelas/rombel_lihat/'.$rombel_id);
        }
    }
    public function rombel_hapus($id=null)
    {
        $logs = $this->Kelas_model->logs();
        $kelas = $this->Kelas_model;
            
        if(!isset($id)){
            redirect('kelas/rombel');
        }else{
            $kelas->delRombel($id);
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
            redirect('kelas/rombel');
        }
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
        $logs = $this->Kelas_model->logs();
        $kelas = $this->Kelas_model;
        $data['kelass'] = $kelas->getAll();
        if ($type != "xlsx" && $type !="pdf") {
                redirect('kelas');
            }elseif($type=="pdf"){
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('kelas/cetak',$data,TRUE);
                $pdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $pdf->Output('Data Kelas.pdf', 'D');
            }elseif($type=="xlsx"){
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:B1')
                    ->setCellValue('A2', 'Data Kelas')
                    ->mergeCells('A2:B2')
                    ->setCellValue('A5','NO')
                    ->setCellValue('B5','Nama Kelas');

                // Set Width
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                

                // Parsing data from database
                $row = 6;
                $n = 1;
                foreach ($data["kelass"] as $kelas) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,$n)
                        ->setCellValue('B'.$row,$kelas->kelas_nama);
                    $row++;
                    $n++;
                }
              
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Data Kelas '.date('d-m-Y H'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Data Kelas.xlsx"');
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
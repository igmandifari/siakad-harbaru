<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    
class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");

        $this->load->library("Form_validation");
        $this->load->model("Jadwal_model");
        $this->load->helper("security");
    }
    public function index()
    {
        $logs = $this->Jadwal_model->logs();
        $jadwal = $this->Jadwal_model;

        $data["tahuns"] = $jadwal->getTahunajaran();
        $data["title"] = "Jadwal Mata Pelajaran";
        $data["actor"] = "Mata Pelajaran";
        

        $this->load->view('jadwal/list_tahun',$data);
    }
    public function ubah($tahun=null,$id=null)
    {
        $logs = $this->Jadwal_model->logs();
        if(!isset($id))redirect('jadwal');

        $jadwal = $this->Jadwal_model;
        $validasi = $this->form_validation;

        $validasi->set_rules($jadwal->rules());
        
        if($validasi->run()){
            $jadwal->perbarui();
            $this->session->set_flashdata('success', 'Berhasil Diubah');

        }
        $data['tahun'] = $jadwal->getTahun($tahun);
        $data["title"] = "Ubah Jadwal Mata Pelajaran";
        $data["actor"] = "Jadwal";
        $data["kelass"] = $jadwal->getKelas($tahun);
        $data["matpels"] = $jadwal->getMatpel();
        $data["tutors"] = $jadwal->getTutors();
        $data["jadwal"] = $jadwal->getById($id);
        $data["tahuns"] = $jadwal->getTahunajaran();

        if(!$data['jadwal']) redirect('jadwal');
        
        $this->load->view("jadwal/ubah",$data);
    }

    public function matpel_tambah($tahun=null)
    {
        $logs = $this->Jadwal_model->logs();
        if(!isset($tahun)) redirect('jadwal');

        $jadwal = $this->Jadwal_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($jadwal->rules());
        
        if($validasi->run()){
            $jadwal->simpan();
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan');

            redirect('jadwal/matpel_lihat/'.$tahun);

        }
        $data['tahun'] = $jadwal->getTahun($tahun);
        $data["title"] = "Tambah Jadwal Mata Pelajaran";
        $data["actor"] = "Jadwal";
        $data["kelas_all"] = $jadwal->getKelas($tahun);
        $data["matpel_all"] = $jadwal->getMatpel();
        $data["tutors"] = $jadwal->getTutors();
        $data["tahuns"] = $jadwal->getTahunajaran();
        
        $this->load->view("jadwal/tambah",$data);
    }
    public function matpel_lihat($tahun=null,$type=null)
    {
        $logs = $this->Jadwal_model->logs();
        if(!isset($tahun)) redirect('jadwal');

        $jadwal = $this->Jadwal_model;
        $data["jadwals"] =$jadwal->getMatpelTahun($tahun);
        $data["title"] = "Jadwal Mata Pelajaran";
        $data["actor"] = "Jadwal";
        $data["tahuns"] = $jadwal->getTahunajaran();
        $data['jadwalss'] = $jadwal->getJadwals($tahun);
        $data['tahun'] = $jadwal->nameoftahunajaran($tahun);

        if(!$data['jadwals']) redirect('jadwal');
            if($type=="pdf"){
                // $this->load->view('jadwal/cetak',$data);
                $style = file_get_contents(base_url('assets/css/report.css'));
                $cetak = $this->load->view('jadwal/cetak',$data,TRUE);
                $pdf= new \Mpdf\Mpdf();
                $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $pdf->Output('Jadwal Pelajaran Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.pdf', 'D');
                
            }elseif($type=="xlsx"){
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:H1')
                    ->setCellValue('A2', 'Jadwal Pelajaran')
                    ->mergeCells('A2:H2')
                    ->setCellValue('A5','NO')
                    ->setCellValue('B5','Tahun Ajaran')
                    ->setCellValue('C5','Kelas')
                    ->setCellValue('D5','Tipe Pembelajaran')
                    ->setCellValue('E5','Mata Pelajaran')
                    ->setCellValue('F5','Tutor')
                    ->setCellValue('G5','Hari')
                    ->setCellValue('H5','Waktu');

                // Set Width
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                

                // Parsing data from database
                $row = 6;
                $n = 1;
                foreach ($data["jadwalss"] as $jadwal) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,$n)
                        ->setCellValue('B'.$row,$data['tahun']['tahunajaran_nama'])
                        ->setCellValue('C'.$row,$jadwal->kelas_nama)
                        ->setCellValue('D'.$row,$jadwal->jadwal_tipe_pembelajaran)
                        ->setCellValue('E'.$row,$jadwal->matpel_nama)
                        ->setCellValue('F'.$row,$jadwal->tutor_nama)
                        ->setCellValue('G'.$row,$jadwal->jadwal_hari)
                        ->setCellValue('H'.$row,$jadwal->jadwal_waktu);
                    $row++;
                    $n++;
                }
              
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Jadwal Pelajaran '.date('d-m-Y'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Data Jadwal Pelajaran Tahun '.$data['tahun']['tahunajaran_nama'].'.xlsx"');
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

        $this->load->view('jadwal/list',$data);
    }
    public function hapus($id=null){
        $logs = $this->Jadwal_model->logs();
        $jadwal = $this->Jadwal_model;
        $tahun = $this->uri->segment('3');
        $data['jadwal'] = $jadwal->getById($id);

        if(!isset($id)) redirect('jadwal');

        if(!$data['jadwal']) {
            redirect('jadwal');
        }else{
            $jadwal->delete($id);
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
            redirect('jadwal/matpel_lihat/').$tahun;
        }

        
    }
    public function tambah_tutorial_mandiri($id){
        $logs = $this->Jadwal_model->logs();
        $jadwal = $this->Jadwal_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($jadwal->rules_tutorial_mandiri());

        if($validasi->run()){
            $tahun = $this->uri->segment('3');
            $jadwal->save_tutorial_mandiri();
            $this->session->set_flashdata('success', 'Berhasil Ditambahan');

            redirect('jadwal/matpel_lihat/'.$id);
        }else{
            $this->session->set_flashdata('failed', 'Gagal');
            redirect('jadwal/matpel_tambah/'.$id.'#tutorial-mandiri');
            
        }
    }
    public function update_tutorial_mandiri($tahun=null,$id=null){
        $logs = $this->Jadwal_model->logs();
        $jadwal = $this->Jadwal_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($jadwal->rules_tutorial_mandiri());

        if($validasi->run()){
            $jadwal->update_tutorial_mandiri();
            $this->session->set_flashdata('success', 'Berhasil Diubah');

            redirect('jadwal/ubah/'.$tahun.'/'.$id);
        }else{
            redirect('jadwal/ubah/'.$tahun.'/'.$id);
            $this->session->set_flashdata('failed', 'Gagal');
        }
    }
    public function delTahun($id=null){
        $logs = $this->Jadwal_model->logs();
        $jadwal = $this->Jadwal_model;
            
        if(!isset($id)){
            redirect('jadwal');
        }else{
            $jadwal->delTahun($id);
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
            redirect('jadwal');
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
            $logs = $this->Jadwal_model->logs();
            $model = $this->Jadwal_model;

            if(!isset($cetak)){
                redirect('jadwal');
            }elseif ($type != "xlsx" && $type !="pdf") {
                redirect('jadwal');
            }elseif($type=="pdf"){
                
                $data['jadwals'] = $model->getJadwals($tahun);
                // $this->load->view('jadwal/cetak',$data);
                $style = file_get_contents(base_url('assets/css/report.css'));
                $cetak = $this->load->view('jadwal/cetak',$data,TRUE);
                $jadwal= new \Mpdf\Mpdf();
                $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $jadwal->Output('Jadwal Pelajaran Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.pdf', 'D');
                
            }elseif($type=="xlsx"){
                $data['jadwals'] = $model->getJadwals($tahun);
                var_dump($data['jadwals']);
            }
        }
}
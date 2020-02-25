<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
 
class Tahunajaran extends CI_Controller
{
    private $tahunajaran;
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Tahunajaran_model');
        $this->load->library('form_validation'); 
        $this->load->helper('security'); 
    }

    public function index()
    {
        $data["tahunajarans"] = $this->Tahunajaran_model->getAll();
        $data["title"] = "Data Tahun Ajaran";
        $data["actor"] = "Tahun Ajaran";

        $this->load->view('tahunajaran/list',$data);
    }

    public function tambah()
    {
        $tahunajaran = $this->Tahunajaran_model;

        $validasi = $this->form_validation;
        $validasi->set_rules($tahunajaran->rules());

        if ($validasi->run()){
            $semua_kelas = $tahunajaran->getKelas();
            $this->tahunajaran_id = uniqid();
                    
                $simpan_tahun_ajaran =  $tahunajaran->simpan(array(
                    'tahunajaran_id'                  => $this->tahunajaran_id,
                    'tahunajaran_nama'                => $this->input->post("tahunajaran_nama"),
                    'created_at'        => date('Y-m-d H:i:s')
                ));
                foreach($semua_kelas as $kelas){
                    $simpan_rombel = $tahunajaran->simpan_rombel(array(
                        'rombel_id'         => uniqid(),
                        'tahunajaran_id'    => $this->tahunajaran_id,
                        'kelas_id'          => $kelas->kelas_id,
                        'created_at'        => date('Y-m-d H:i:s')
                    ));
                }
            
            $this->session->set_flashdata('success', 'Berhasil');

            redirect('tahunajaran');
        }

        $data["title"] = "Tambah Data";
        $data["actor"] = "Mata Pelajaran";
        $data["tahunajarans"] = $this->Tahunajaran_model->getAll();
        $this->load->view('tahunajaran/tambah',$data);
    }

    public function hapus($id=null)
    {
        if(!isset($id)){
            redirect('tahunajaran');
        }else{
            $this->Tahunajaran_model->delete($id);
            redirect('tahunajaran');
        }
    }

    public function ubah($id=null)
    {
        if(!isset($id)) redirect('tahunajaran');
        $tahunajaran = $this->Tahunajaran_model;
        $data['tahunajaran'] = $tahunajaran->getByid($id);

        if(!$data['tahunajaran']) redirect('tahunajaran');

        $validasi = $this->form_validation;
        $validasi->set_rules($tahunajaran->rules());

        if ($validasi->run()){
            $tahunajaran->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        }

        $data["title"] = "Ubah Data";
        $data["actor"] = "Kelas";
        $data["tahunajarans"] = $this->Tahunajaran_model->getAll();
        
        $this->load->view("tahunajaran/ubah",$data);
    }
    public function cetak($type=null)
    {
        $model = $this->Tahunajaran_model;
        $data['tahunajarans'] = $model->getAll();
        if ($type != "xlsx" && $type !="pdf") {
                redirect('tahunajaran');
            }elseif($type=="pdf"){
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('tahunajaran/cetak',$data,TRUE);
                $pdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $pdf->Output('Data Tahunajaran.pdf', 'D');
            }elseif($type=="xlsx"){
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:B1')
                    ->setCellValue('A2', 'Data Tahun Ajaran')
                    ->mergeCells('A2:B2')
                    ->setCellValue('A5','NO')
                    ->setCellValue('B5','Tahun Ajaran');

                // Set Width
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                

                // Parsing data from database
                $row = 6;
                $n = 1;
                foreach ($data["tahunajarans"] as $tahunajaran) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,$n)
                        ->setCellValue('B'.$row,$tahunajaran->tahunajaran_nama);
                    $row++;
                    $n++;
                }
              
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Tahun Ajaran '.date('d-m-Y H'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Data Tahun Ajaran.xlsx"');
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
<?php
class Dasbor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        $this->load->model('Dasbor_model');
        $logs = $this->Dasbor_model->logs();   
    }
    public function logs()
    {
        if($this->session->userdata('level')==0){
            $logs = $this->Dasbor_model->get_logs();

            echo json_encode($logs);

        }else{
            redirect('dasbor');
        }
    }
    public function coba()
    {
        // 1. ambil nilai tahun ajaran aktif contoh "2018/2019" menjadi 1819

    
            // 2.1 ambil nik terakhir contoh "181907001"

            // 2.2. ambil 4 karakter awal dari nik terakhir menjadi 
            // 2.3 lakukan perbanding dengan tahun ajaran aktif yang sudah difilter
            // 2.4 apabila sama, maka akan mengambil 07001 lalu ditambah 1
            // 2.5.1 apabila hasilnya ada 1 digit contoh(2), maka tambahkan 2 digit 00 didepannya
            // 2.5.2 apabila hasilnya ada 2 digit contoh(11), maka tambahkan 1 digit 0 didepannya
            // 2.6 apabila tidak sama, maka ambil nilai tahun ajaran aktif yang sudah difilter
            // 2.6.1 ambil no bulan sekarang
            // 2.6.2 tambahakan tahun aktif dengan bulan sekarang ditambah 001

            // bila tidak ada nik maka tahun sekarang yang sudah difilter ditambah bulan sekarang tambahkan 001
        // $tahun = "2018/2019";
        // $awal = substr($tahun, 2,2);
        // $kedua = substr($tahun, 7,2);
        // $previous_nik = '171807010';
        // $last_digit = substr($previous_nik, 6,3);
        // $new = ($last_digit + 1);
        // $count= strlen($new);
        // if($count == 2){
        //     $new = '0'.$new;
        //     echo $new; 
        // }else{
        //     echo $new.'<br>'.$count.'<br>';
        //     echo date('m').'<br>';

        //     echo $awal.$kedua;    
        // }

        // percobaan password
        // kombinasi password
        // 3 huruf awal ditambah 2 digit tanggal, bulan, tahun lahir dengan huruf awalnya kapital
        // zam180599 
        // $name = "Zam Zam";
        // $example ="1999-05-18";
        // $years = substr($example, 2,2);
        // $month = substr($example, 5,2);
        // $date = substr($example, 8,2);
        // $new_name = substr($name, 1,2);
        // $first_name = substr($name, 0,1);
        // $first_name = strtoupper($first_name);
        // $password = $first_name.$new_name.$years.$month.$date;
        // echo 'password: '.$password.'<br>';
        // echo 'hash :'.sha1(md5($password));
        echo '<input type="radio" name="a"><br>';
        echo '<input type="radio" name="a"><br>';
        echo '<input type="radio" name="a">';
    }
    public function index(){
        $dasbor = $this->Dasbor_model;
        $logs = $dasbor->logs();
        $data["title"] = "Dasbor";
        $data["tahunajarans"] = $dasbor->getTahunAjaran();


        if($this->session->userdata('level') == 0){
            $data["logs"] = $dasbor->get_logs();
            $data["countWargaBelajar"] = $dasbor->countWargaBelajar();
            $data["countAdmin"] = $dasbor->countAdmin();
            $data["countTutor"] = $dasbor->countTutor();
            $data["countPimpinan"] = $dasbor->countPimpinan();
            $this->load->view('dasbor/dasbor_admin',$data);
        }
        else if($this->session->userdata('level') == 1){
            $tahun= $this->session->userdata('tahunajaran_id');
            $data["haris"]=$dasbor->getHari($tahun);
            $data['dasbor'] =  $this->Dasbor_model;
            $this->load->view('dasbor/wargabelajar/dasbor_wargabelajar',$data);
        }else if($this->session->userdata('level') == 2)
        {
            $data['masukans'] = $dasbor->get_masukan();
            $this->load->view('dasbor/pimpinan/dasbor',$data);
        }else if($this->session->userdata('level') == 3)
        {
            $data["all_jadwal_mengajar"] = $dasbor->getJadwalByIdTutor();
            $this->load->view('dasbor/dasbor_tutor',$data);
        }

    }
    public function setTahunajaran()
    {
        $logs = $this->Dasbor_model->logs();
        if($this->input->method()=="post"){
            $thnid = $this->input->post('tahunajaran_id');

            $model = $this->Dasbor_model;
            $tahunajaran = $model->get_tahun_ajaran($thnid);
            $data = array(
                'tahunajaran_id'    => $tahunajaran['tahunajaran_id'],
                'tahunajaran_nama'  => $tahunajaran['tahunajaran_nama'],
                'open_nilai'            => $tahunajaran['open_nilai']
            );
            $this->session->set_userdata($data);
        }
    }
    public function wargabelajar()
    {
        $logs = $this->Dasbor_model->logs();
        if($this->session->userdata('level') != 2){
            redirect('dasbor');
        }else{
            $model = $this->Dasbor_model;
            $data['title'] = "Wargabelajar";
            $data['wargabelajars'] = $model->getWargabelajars();
            $this->load->view('dasbor/pimpinan/wargabelajar',$data);
        }
    }
    public function tutor()
    {
        $logs = $this->Dasbor_model->logs();
        if($this->session->userdata('level') != 2){
            redirect('dasbor');
        }else{
            $model = $this->Dasbor_model;
            $data['title'] = "Tutor";
            $data['tutors'] = $model->getTutors();
            $this->load->view('dasbor/pimpinan/tutor',$data);
        }
    }
    public function kelas($jenis=null,$id=null,$tahun=null)
    {
        $logs = $this->Dasbor_model->logs();
        if($this->session->userdata('level') != 2 && $this->session->userdata('level') != 0){
            redirect('dasbor');
        }else{
            $model = $this->Dasbor_model;
            $data['title'] = "Daftar Kelas";
            $data['tahunajarans'] =  $model->getTahunAjaran();
            $data['model'] = $model;

            if($jenis=="nilai"){
                $data["wargabelajars"]= $model->getWargaBelajar($id);
                $data["jadwal"]= $model->getKelasAndMatpel($id);
                if(!$data["wargabelajars"]){
                    if($this->session->userdata('level')==0){
                        redirect('jadwal/matpel_lihat/'.$tahun);
                    }else{
                        redirect('dasbor/kelas');
                    }
                } 

                if($this->session->userdata('level')==2){
                    $this->load->view('dasbor/pimpinan/nilai',$data,FALSE);
                }elseif ($this->session->userdata('level')==0) {
                    $this->load->view('jadwal/nilai',$data);
                }
            }elseif($jenis=="presensi"){
                $idpresensi=$model->getIDPresensi($id);
                if(!$idpresensi) {
                    if($this->session->userdata('level')==0){
                        redirect('jadwal/matpel_lihat/'.$tahun);
                    }else{
                        redirect('dasbor/kelas');
                    }
                } 
                $data["wargabelajars"] = $model->getWb($idpresensi["presensi_id"]);
                $data["kelas"] = $model->getNameKelas($id);
                $data["actor"] = $data["kelas"]["kelas_nama"];

                if($this->session->userdata('level')==2){
                    $this->load->view('dasbor/pimpinan/presensi',$data);
                }elseif ($this->session->userdata('level')==0) {
                    $this->load->view('jadwal/presensi',$data);
                }
            }else{
                $this->load->view('dasbor/pimpinan/kelas',$data,FALSE);
            }
        }
    }
}
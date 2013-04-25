<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

        $data['view'] = 'welcome';
        $data['menu'] = 0;
        $this->load->view('index', $data);
    }

    public function pengadaankarcis() {
        if ($this->session->userdata('islogin') == true) {
            $this->load->library('grocery_CRUD');


            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('stok_karcis');
            $crud->set_subject('Stok Karcis');
            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_print();
            $crud->unset_export();
            $crud->unset_edit();
            $crud->add_action('LihatDetail', '', site_url('main/lihatpengadaan\/'), 'ui-icon-plus');
            $crud->set_language('indonesian');
            $crud->where('tahun', date('Y'));

            $output = $crud->render();
            $output->menu = 1;
            $this->load->model('pengadaan_model');
            $output->pengadaanbulanini = $this->pengadaan_model->PengadaanBulanIni();

            $this->load->view('index2', $output);
        } else {
            $data['view'] = 'login';
            $data['menu'] = 1;
            $this->load->view('index', $data);
        }
    }

    public function pengadaangudang() {
        if ($this->session->userdata('islogin') == true) {
            $this->load->library('grocery_CRUD');


            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('stok_gudang');
            $crud->set_subject('Pengadaan Stok Karcis di Gudang');
            $crud->display_as('id_stok_gudang', 'id');
            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_print();
            $crud->unset_export();
            $crud->unset_edit();
            $crud->add_action('LihatDetail', '', site_url('main/lihatpengadaangudang\/'), 'ui-icon-plus');
            $crud->set_language('indonesian');
            $crud->where('tahun', date('Y'));

            $output = $crud->render();
            $output->menu = 6;
            $this->load->model('pengadaan_model');
            $output->pengadaanbulanini = $this->pengadaan_model->PengadaanBulanIni();

            $this->load->view('index2', $output);
        } else {
            $data['view'] = 'login';
            $data['menu'] = 6;
            $this->load->view('index', $data);
        }
    }

    public function lihatpengadaan() {

        if ($this->session->userdata('islogin') == true) {
            $id = (int) $this->uri->segment(3);

            $this->load->model('laporan_model');
            $this->load->model('pengadaan_model');

            $data['view'] = 'lihatpengadaan';
            $data['menu'] = 1;
            $data['tipe'] = "Porporasi";
            $dt = $this->laporan_model->ambilPengadaanIDstok($id);
            if ($dt)
                $data['laporan'] = array(array($dt, '', ''));
            $data['info'] = $this->pengadaan_model->PengadaanIDStok($id);



            $this->load->view('index', $data);
        }else {
            $data['view'] = 'login';
            $data['menu'] = 1;
            $this->load->view('index', $data);
        }
    }

    public function lihatpengadaangudang() {
        if ($this->session->userdata('islogin') == true) {
            $id = (int) $this->uri->segment(3);

            $this->load->model('laporan_model');
            $this->load->model('pengadaan_model');

            $data['view'] = 'lihatpengadaan';
            $data['menu'] = 6;
            $data['tipe'] = "Gudang";
            $dt = $this->laporan_model->ambilPengadaanGudangIDstok($id);
            if ($dt)
                $data['laporan'] = array(array($dt, '', ''));
            $data['info'] = $this->pengadaan_model->PengadaanGudangIDStok($id);



            $this->load->view('index', $data);
        }else {
            $data['view'] = 'login';
            $data['menu'] = 6;
            $this->load->view('index', $data);
        }
    }

    public function del() {
        if ($this->session->userdata('islogin') == true) {
            if (isset($_POST['batal'])) {
                $this->load->model('pengadaan_model');
                $q = $this->pengadaan_model->batalkanPengadaan($this->input->post('id'));
                if ($q) {
                    $data['view'] = 'batalkan_pengadaan';
                    $data['menu'] = 1;
                    $data['pesan'] = 'Pengadaan yang lama untuk bulan ini sudah dihapus, anda bisa melakukan pengadaan baru lagi';
                    $this->load->view('index', $data);
                } else {
                    $data['view'] = 'batalkan_pengadaan';
                    $data['menu'] = 1;
                    $data['view'] = 'batalkan_pengadaan';
                    $data['pesan'] = 'Pengadaan tidak bisa dihapus';
                    $this->load->view('index', $data);
                }
            }
        } else {
            $data['view'] = 'login';
            $data['menu'] = 1;
            $this->load->view('index', $data);
        }
    }

    public function pengadaankarcis_add() {
        if ($this->session->userdata('islogin') == true) {
            $data['view'] = 'pengadaan';
            $data['menu'] = 1;
            $this->load->view('index', $data);
        } else {
            $data['view'] = 'login';
            $data['menu'] = 1;
            $this->load->view('index', $data);
        }
    }

    public function pengadaangudang_add() {
        if ($this->session->userdata('islogin') == true) {
            $dt['view'] = 'pengadaan_gudang';
            $dt['menu'] = 6;

            if (isset($_POST['submit'])) {
                $data['bus_besar_kw1'] = $this->input->post('bus_besar_kw1', true);
                $data['bus_besar_kw2'] = $this->input->post('bus_besar_kw2', true);


                $data['bus_sedang_kw1'] = $this->input->post('bus_sedang_kw1', true);
                $data['bus_sedang_kw2'] = $this->input->post('bus_sedang_kw2', true);


                $data['truk_besar_kw1'] = $this->input->post('truk_besar_kw1', true);
                $data['truk_besar_kw2'] = $this->input->post('truk_besar_kw2', true);


                $data['truk_sedang_kw1'] = $this->input->post('truk_sedang_kw1', true);
                $data['truk_sedang_kw2'] = $this->input->post('truk_sedang_kw2', true);


                $data['truk_gandeng_kw1'] = $this->input->post('truk_gandeng_kw1', true);
                $data['truk_gandeng_kw2'] = $this->input->post('truk_gandeng_kw2', true);


                $data['sepeda_motor_kw1'] = $this->input->post('sepeda_motor_kw1', true);
                $data['sepeda_motor_kw2'] = $this->input->post('sepeda_motor_kw2', true);


                $data['mobil_kw1'] = $this->input->post('mobil_kw1', true);
                $data['mobil_kw2'] = $this->input->post('mobil_kw2', true);


                $data['sepeda_kw1'] = $this->input->post('sepeda_kw1', true);
                $data['sepeda_kw2'] = $this->input->post('sepeda_kw2', true);
                $data['nama_operator'] = $this->input->post('nama_operator', true);
                $data['stok_lama'] = $this->input->post('stoklama', true);

                $this->form_validation->set_rules('bus_besar_kw1', 'Bus Besar KW1', 'required|numeric');
                $this->form_validation->set_rules('bus_besar_kw2', 'Bus Besar KW2', 'required|numeric');


                $this->form_validation->set_rules('bus_sedang_kw1', 'Bus sedang KW1', 'required|numeric');
                $this->form_validation->set_rules('bus_sedang_kw2', 'Bus Sedang KW2', 'required|numeric');


                $this->form_validation->set_rules('truk_besar_kw1', 'Truk Besar KW1', 'required|numeric');
                $this->form_validation->set_rules('truk_besar_kw2', 'Truk Besar KW2', 'required|numeric');


                $this->form_validation->set_rules('truk_sedang_kw1', 'Truk sedang KW1', 'required|numeric');
                $this->form_validation->set_rules('truk_sedang_kw2', 'Truk Sedang KW2', 'required|numeric');


                $this->form_validation->set_rules('truk_gandeng_kw1', 'Truk Gandeng KW1', 'required|numeric');
                $this->form_validation->set_rules('truk_gandeng_kw2', 'Truk Gandeng KW2', 'required|numeric');


                $this->form_validation->set_rules('sepeda_motor_kw1', 'Sepeda Motor KW1', 'required|numeric');
                $this->form_validation->set_rules('sepeda_motor_kw2', 'Sepeda Motor KW2', 'required|numeric');


                $this->form_validation->set_rules('mobil_kw1', 'Mobil KW1', 'required|numeric');
                $this->form_validation->set_rules('mobil_kw2', 'MObil KW2', 'required|numeric');


                $this->form_validation->set_rules('sepeda_kw1', 'Sepeda KW1', 'required|numeric');
                $this->form_validation->set_rules('sepeda_kw2', 'Sepeda KW2', 'required|numeric');
                $this->form_validation->set_rules('nama_operator', 'Nama Penyetor', 'required');

                if ($this->form_validation->run()) {
                    $this->load->model("pengadaan_gudang_model");

                    //cek laporan
                    $this->load->model('pengeluaran_model');
                    if ($this->pengeluaran_model->cekLaporanBulanIni() == false) {
                        $this->pengeluaran_model->tambahLaporanBulanIni();
                    }
                    if ($this->pengeluaran_model->cekLaporanGudangBulanIni() == false) {
                        $this->pengeluaran_model->tambahLaporanGudangBulanIni();
                    }
                    //

                    $this->pengadaan_gudang_model->simpanPengadaan($data);
                    redirect(site_url('main/pengadaangudang' . $data['stok_lama']));
                }
            }
            $this->load->view('index', $dt);
        } else {
            $data['view'] = 'login';
            $data['menu'] = 1;
            $this->load->view('index', $data);
        }
    }

    public function pengeluarankarcis() {

        if ($this->session->userdata('islogin') == true) {
            $this->load->library('grocery_CRUD');


            $crud = new grocery_CRUD();
            // $crud->set_theme('datatables');
            $crud->set_table('pengeluaran_karcis');
            $crud->set_subject('Pengeluaran Karcis');
            $crud->set_relation('id_karcis', 'jenis_karcis', 'jenis_karcis');


            $crud->display_as('id_karcis', 'Jenis Karcis')
                    ->display_as('nama_penyetor', 'Nama Penyetor')
                    ->display_as('bundel_kw1', 'Jumlah Bundel Kw1')
                    ->display_as('bundel_kw2', 'Jumlah bundel kw2');
            $crud->set_language('indonesian');
            $crud->unset_print();
            $crud->unset_export();
            $crud->unset_edit();
            $crud->set_rules('bundel_kw1', 'Jumlah Bundel Kw1', 'required|callback_bundelkw1_keluar[id_karcis]');
            $crud->set_rules('bundel_kw2', 'Jumlah Bundel Kw2', 'required|callback_bundelkw2_keluar[id_karcis]');

            $crud->callback_before_insert(array($this, 'cek_pergantian_bulan'));
            $crud->callback_after_insert(array($this, 'pengurangan_stok'));
            $crud->callback_before_delete(array($this, 'kembalikan_stok'));
            $crud->where('MONTH(waktu)', date('n'));
            $crud->where('YEAR(waktu)', date('Y'));

            if (isset($_POST['submit'])) {


                $crud->where('MONTH(waktu)', $this->input->post('bulan'));
                $crud->where('MONTH(waktu)', date('Y'));
            }
            $crud->columns('id_karcis', 'nama_penyetor', 'kode', 'bundel_kw1', 'bundel_kw2', 'total');
            $crud->add_fields('id_karcis', 'nama_penyetor', 'kode', 'bundel_kw1', 'bundel_kw2', 'total');
            $crud->field_type('total', 'invisible');
            $crud->required_fields('id_karcis', 'nama_penyetor', 'kode', 'bundel_kw1', 'bundel_kw2');

            $output = $crud->render();
            $output->menu = 2;

            $this->load->view('index2', $output);
        } else {
            $data['view'] = 'login';
            $data['menu'] = 2;
            $this->load->view('index', $data);
        }
    }

    public function bundelkw1_keluar($str, $field) {
        $this->load->model('pengeluaran_model');
        $idkarcis = $_POST[$field];
        if ($this->pengeluaran_model->cekBatasStokKW1($str, $idkarcis) == false) {
            $this->form_validation->set_message('bundelkw1_keluar', 'stok KW1 porporasi tidak mencukupi untuk pengeluaran tersebut');
            return false;
        } else {
            return true;
        }
    }

    public function bundelkw2_keluar($str, $field) {
        $this->load->model('pengeluaran_model');
        $idkarcis = $_POST[$field];
        if ($this->pengeluaran_model->cekBatasStokKW2($str, $idkarcis) == false) {
            $this->form_validation->set_message('bundelkw2_keluar', 'stok KW2 porporasi tidak mencukupi untuk pengeluaran tersebut');
            return false;
        } else {
            return true;
        }
    }

    public function cek_pergantian_bulan($post_array) {
        $this->load->model('pengeluaran_model');
        if ($this->pengeluaran_model->cekLaporanBulanIni() == false) {
            $this->pengeluaran_model->tambahLaporanBulanIni();
        }
        if ($this->pengeluaran_model->cekLaporanGudangBulanIni() == false) {
            $this->pengeluaran_model->tambahLaporanGudangBulanIni();
        }
        $post_array['total'] = $post_array['bundel_kw1'] + $post_array['bundel_kw2'];
        return $post_array;
    }

    public function pengurangan_stok($post_array) {
        $this->load->model('pengeluaran_model');
        $id_karcis = $post_array['id_karcis'];
        $kw1 = $post_array['bundel_kw1'];
        $kw2 = $post_array['bundel_kw2'];
        $this->pengeluaran_model->penguranganStokKarcis($id_karcis, $kw1, $kw2);
        return $post_array;
    }

    public function kembalikan_stok($primary_key) {
        $this->load->model('pengeluaran_model');
        $this->pengeluaran_model->kembalikan_stok($primary_key);
        return true;
    }

//         public function operator(){
//             $this->load->library('grocery_CRUD');	
//            
//            
//                        $crud = new grocery_CRUD();
//                       // $crud->set_theme('datatables');
//			$crud->set_table('operator');
//			$crud->set_subject('Operator');
//                       
//			$output = $crud->render();
//                        $output->menu=3;
//             
//		$this->load->view('index2',$output);
//        }

    public function jeniskarcis() {

        if ($this->session->userdata('islogin') == true) {
            $this->load->library('grocery_CRUD');


            $crud = new grocery_CRUD();
            //$crud->set_theme('datatables');
            $crud->set_table('jenis_karcis');
            $crud->set_subject('Jenis Karcis');
            $crud->edit_fields('jenis_karcis', 'harga_bundel');
            $crud->unset_add();
            $crud->unset_delete();
            $crud->set_language('indonesian');
            $crud->display_as('stok_kw1', 'Stok Kw1 (Porporasi)');
            $crud->display_as('stok_kw2', 'Stok Kw2 (Porporasi)');
            $crud->display_as('stok_kw1_gudang', 'Stok kw1 di Gudang');
            $crud->display_as('stok_kw2_gudang', 'Stok kw2 di Gudang');

            $output = $crud->render();
            $output->menu = 4;


            $this->load->view('index2', $output);
        } else {
            $data['view'] = 'login';
            $data['menu'] = 4;
            $this->load->view('index', $data);
        }
    }

    public function laporan() {
        if ($this->session->userdata('islogin') == true) {
            $data['view'] = 'laporan';
            $data['menu'] = 5;


            if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
                if ($this->form_validation->run()) {


                    $tipe_laporan = $this->input->post('tipe_laporan');
                    $bulan = $this->input->post('bulan_laporan');
                    $tahun = $this->input->post('tahun');
                    $this->load->model('laporan_model');
                    $data['tipe'] = $tipe_laporan;
                    $data['laporan'] = $this->laporan_model->ambilDataLaporan($tipe_laporan, $bulan, $tahun);
                }
            }


            $this->load->view('index', $data);
        } else {
            $data['view'] = 'login';
            $data['menu'] = 5;
            $this->load->view('index', $data);
        }
    }

    public function laporanexcel() {
        if ($this->session->userdata('islogin') == true) {
            $data['menu'] = 5;


            if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
                if ($this->form_validation->run()) {


                    $tipe_laporan = $this->input->post('tipe_laporan');
                    $bulan = $this->input->post('bulan_laporan');
                    $tahun = $this->input->post('tahun');
                    $this->load->model('laporan_model');
                    $data['tipe'] = $tipe_laporan;
                    $data['laporan'] = $this->laporan_model->ambilDataLaporan($tipe_laporan, $bulan, $tahun);
                }
            }


            $this->load->view('laporan_excel', $data);
        } else {
            $data['view'] = 'login';
            $data['menu'] = 5;
            $this->load->view('index', $data);
        }
    }

    public function login() {
        if (isset($_POST['Submit'])) {
            $user = $this->input->post('username', TRUE);
            $pass = $this->input->post('password', TRUE);
            $redir = $this->input->post('redir', TRUE);
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->load->model('login_model');

            if ($this->form_validation->run() && $this->login_model->login($user, $pass) == true) {


                $this->session->set_userdata(array('islogin' => true));
                redirect($redir);
            } else {
                $data['menu'] = 1;
                $data['view'] = 'login';
                $data['pesan'] = 'User atau password salah';
                $this->load->view('index', $data);
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('main'));
    }

    public function simpanpengadaan() {

        $data['bus_besar_kw1'] = $this->input->post('bus_besar_kw1', true);
        $data['bus_besar_kw2'] = $this->input->post('bus_besar_kw2', true);


        $data['bus_sedang_kw1'] = $this->input->post('bus_sedang_kw1', true);
        $data['bus_sedang_kw2'] = $this->input->post('bus_sedang_kw2', true);


        $data['truk_besar_kw1'] = $this->input->post('truk_besar_kw1', true);
        $data['truk_besar_kw2'] = $this->input->post('truk_besar_kw2', true);


        $data['truk_sedang_kw1'] = $this->input->post('truk_sedang_kw1', true);
        $data['truk_sedang_kw2'] = $this->input->post('truk_sedang_kw2', true);


        $data['truk_gandeng_kw1'] = $this->input->post('truk_gandeng_kw1', true);
        $data['truk_gandeng_kw2'] = $this->input->post('truk_gandeng_kw2', true);


        $data['sepeda_motor_kw1'] = $this->input->post('sepeda_motor_kw1', true);
        $data['sepeda_motor_kw2'] = $this->input->post('sepeda_motor_kw2', true);


        $data['mobil_kw1'] = $this->input->post('mobil_kw1', true);
        $data['mobil_kw2'] = $this->input->post('mobil_kw2', true);


        $data['sepeda_kw1'] = $this->input->post('sepeda_kw1');
        $data['sepeda_kw2'] = $this->input->post('sepeda_kw2');


        $data['nama_operator'] = $this->input->post('nama_operator');
        $data['bulan'] = $this->input->post('bulan');


        $this->form_validation->set_rules('bus_besar_kw1', 'Bus Besar KW1', 'required|numeric|callback_cekgudang_kw1[1]');
        $this->form_validation->set_rules('bus_besar_kw2', 'Bus Besar KW2', 'required|numeric|callback_cekgudang_kw2[1]');


        $this->form_validation->set_rules('bus_sedang_kw1', 'Bus sedang KW1', 'required|numeric|callback_cekgudang_kw1[2]');
        $this->form_validation->set_rules('bus_sedang_kw2', 'Bus Sedang KW2', 'required|numeric|callback_cekgudang_kw2[2]');


        $this->form_validation->set_rules('truk_besar_kw1', 'Truk Besar KW1', 'required|numeric|callback_cekgudang_kw1[3]');
        $this->form_validation->set_rules('truk_besar_kw2', 'Truk Besar KW2', 'required|numeric|callback_cekgudang_kw2[3]');


        $this->form_validation->set_rules('truk_sedang_kw1', 'Truk sedang KW1', 'required|numeric|callback_cekgudang_kw1[4]');
        $this->form_validation->set_rules('truk_sedang_kw2', 'Truk Sedang KW2', 'required|numeric|callback_cekgudang_kw2[4]');


        $this->form_validation->set_rules('truk_gandeng_kw1', 'Truk Gandeng KW1', 'required|numeric|callback_cekgudang_kw1[5]');
        $this->form_validation->set_rules('truk_gandeng_kw2', 'Truk Gandeng KW2', 'required|numeric|callback_cekgudang_kw2[5]');


        $this->form_validation->set_rules('sepeda_motor_kw1', 'Sepeda Motor KW1', 'required|numeric|callback_cekgudang_kw1[6]');
        $this->form_validation->set_rules('sepeda_motor_kw2', 'Sepeda Motor KW2', 'required|numeric|callback_cekgudang_kw2[6]');


        $this->form_validation->set_rules('mobil_kw1', 'Mobil KW1', 'required|numeric|callback_cekgudang_kw1[7]');
        $this->form_validation->set_rules('mobil_kw2', 'MObil KW2', 'required|numeric|callback_cekgudang_kw2[7]');


        $this->form_validation->set_rules('sepeda_kw1', 'Sepeda KW1', 'required|numeric|callback_cekgudang_kw1[8]');
        $this->form_validation->set_rules('sepeda_kw2', 'Sepeda KW2', 'required|numeric|callback_cekgudang_kw2[8]');


        $this->form_validation->set_rules('bulan', 'Bulan', 'required|numeric');
        $this->form_validation->set_rules('nama_operator', 'Nama Operator', 'required');

        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_message('numeric', '%s harus diisi angka');


        $this->load->model('pengadaan_model');


        if ($this->form_validation->run()) {

            //cek laporan
            $this->load->model('pengeluaran_model');
            if ($this->pengeluaran_model->cekLaporanBulanIni() == false) {
                $this->pengeluaran_model->tambahLaporanBulanIni();
            }
            if ($this->pengeluaran_model->cekLaporanGudangBulanIni() == false) {
                $this->pengeluaran_model->tambahLaporanGudangBulanIni();
            }
            //
            $this->pengadaan_model->simpanStok($data);
            redirect(site_url('main/pengadaankarcis'));
        } else {
            $data['view'] = 'pengadaan';
            $data['menu'] = 1;

            $this->load->view('index', $data);
        }
    }

    public function cekgudang_kw1($str, $id) {
        $this->load->model('pengadaan_model');

        if ($this->pengadaan_model->cekStokKW1DiGUdang($id, $str)) {
            return true;
        } else {
            $this->form_validation->set_message('cekgudang_kw1', 'Stok di Gudang tidak cukup untuk %s');
            return false;
        }
    }

    public function cekgudang_kw2($str, $id) {
        $this->load->model('pengadaan_model');

        if ($this->pengadaan_model->cekStokKW2DiGUdang($id, $str)) {
            return true;
        } else {
            $this->form_validation->set_message('cekgudang_kw2', 'Stok di Gudang tidak cukup untuk %s');
            return false;
        }
    }

}


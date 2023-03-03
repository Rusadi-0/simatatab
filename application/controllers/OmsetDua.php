<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Kuala_Lumpur');

class OmsetDua extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Omset Per Bulan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['user_sub_menu'] = $this->db->get_where('user_sub_menu')->row_array();
        $this->load->model('OmsetDua_model', 'omsetD');

        $data['jan'] = $this->omsetD->sumJan('omset');
        $data['feb'] = $this->omsetD->sumfeb('omset');
        $data['mar'] = $this->omsetD->sumMar('omset');
        $data['apr'] = $this->omsetD->sumApr('omset');
        $data['mei'] = $this->omsetD->sumMei('omset');
        $data['jun'] = $this->omsetD->sumJun('omset');
        $data['jul'] = $this->omsetD->sumJul('omset');
        $data['agus'] = $this->omsetD->sumAgus('omset');
        $data['sep'] = $this->omsetD->sumSep('omset');
        $data['okt'] = $this->omsetD->sumOkt('omset');
        $data['nop'] = $this->omsetD->sumNop('omset');
        $data['des'] = $this->omsetD->sumDes('omset');

        // kembalian

        $data['kemjan'] = $this->omsetD->kemJan('omset');
        $data['kemfeb'] = $this->omsetD->kemfeb('omset');
        $data['kemmar'] = $this->omsetD->kemMar('omset');
        $data['kemapr'] = $this->omsetD->kemApr('omset');
        $data['kemmei'] = $this->omsetD->kemMei('omset');
        $data['kemjun'] = $this->omsetD->kemJun('omset');
        $data['kemjul'] = $this->omsetD->kemJul('omset');
        $data['kemagus'] = $this->omsetD->kemAgus('omset');
        $data['kemsep'] = $this->omsetD->kemSep('omset');
        $data['kemokt'] = $this->omsetD->kemOkt('omset');
        $data['kemnop'] = $this->omsetD->kemNop('omset');
        $data['kemdes'] = $this->omsetD->kemDes('omset');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('OmsetDua/index', $data);
        $this->load->view('templates/footer');
    }

    public function data()
    {
        $data['title'] = 'Data ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->model('Omset_model', 'omset');
        $data['tagihan'] = $this->db->get('tagihan')->result_array();
        $data['aset'] = $this->db->get('aset')->row_array();
        
        $data['getAll'] = $this->omset->getAll('omset');
        $data['getAss'] = $this->omset->getAss('omset');
        
        // $data['user_sub_menu'] = $this->db->get_where('user_sub_menu')->row_array();
        $this->load->model('OmsetDua_model', 'omsetD');
        
        $data['jan'] = $this->omsetD->sumJan('omset');
        $data['feb'] = $this->omsetD->sumfeb('omset');
        $data['mar'] = $this->omsetD->sumMar('omset');
        $data['apr'] = $this->omsetD->sumApr('omset');
        $data['mei'] = $this->omsetD->sumMei('omset');
        $data['jun'] = $this->omsetD->sumJun('omset');
        $data['jul'] = $this->omsetD->sumJul('omset');
        $data['agus'] = $this->omsetD->sumAgus('omset');
        $data['sep'] = $this->omsetD->sumSep('omset');
        $data['okt'] = $this->omsetD->sumOkt('omset');
        $data['nop'] = $this->omsetD->sumNop('omset');
        $data['des'] = $this->omsetD->sumDes('omset');

        // kembalian

        $data['kemjan'] = $this->omsetD->kemJan('omset');
        $data['kemfeb'] = $this->omsetD->kemfeb('omset');
        $data['kemmar'] = $this->omsetD->kemMar('omset');
        $data['kemapr'] = $this->omsetD->kemApr('omset');
        $data['kemmei'] = $this->omsetD->kemMei('omset');
        $data['kemjun'] = $this->omsetD->kemJun('omset');
        $data['kemjul'] = $this->omsetD->kemJul('omset');
        $data['kemagus'] = $this->omsetD->kemAgus('omset');
        $data['kemsep'] = $this->omsetD->kemSep('omset');
        $data['kemokt'] = $this->omsetD->kemOkt('omset');
        $data['kemnop'] = $this->omsetD->kemNop('omset');
        $data['kemdes'] = $this->omsetD->kemDes('omset');

        $this->form_validation->set_rules('nama_penyetor', 'nama_penyetor', 'required');
        $this->form_validation->set_rules('nilai_omset', 'nilai_omset', 'required');
        $this->form_validation->set_rules('jumlah_kembalian', 'jumlah_kembalian', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('OmsetDua/data', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_penyetor' => $this->input->post('nama_penyetor'),
                'nilai_omset' => $this->input->post('nilai_omset'),
                'jumlah_kembalian' => $this->input->post('jumlah_kembalian'),
                'tanggal_stor' => date('Y-m-d'),
                'bulan' => date('mY'),
                'tahun' => date('Y'),
                'waktu_stor' => time(),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('omset', $data);
            $this->db->set('bulan', (date("m") + 1) . date("Y"));
            $this->db->where('id', 1);
            $this->db->update('omset');
            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data berhasil <strong> Tertambah..!!</strong></div>');
            redirect('OmsetDua/data');
        }
    }
    public function tagihan(){
        $data = [
            'dari_tagihan' => $this->input->post('dari_tagihan'),
            'total_tagihan' => $this->input->post('total_tagihan'),
            'tanggal_tagihan' => $this->input->post('tanggal_tagihan'),
            'bulan' => date('mY'),
            'tahun' => date('Y'),
            'time' => time()
        ];
        $this->db->insert('tagihan', $data);
        $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data berhasil <strong> Tertambah..!!</strong></div>');
        redirect('OmsetDua/data');
    }
    public function aset(){
        $dataA = [
            'nilai' => $this->input->post('aset_sekarang'),
            'bulan' => date('mY'),
            'tahun' => date('Y'),
            'time' => time()
        ];
        $this->db->insert('aset', $dataA);
        $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data berhasil <strong> Tertambah..!!</strong></div>');
        redirect('OmsetDua/data');
    }
    public function delete($id)
    {
        $this->db->delete('omset', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data dipilih berhasil <strong>Terhapus..!!</strong></div>');
        redirect('OmsetDua/data');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['user_sub_menu'] = $this->db->get_where('user_sub_menu')->row_array();
        // $this->load->model('OmsetDua_model', 'omsetD');
        $data['omset'] = $this->db->get_where('omset', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nama_penyetor', 'nama_penyetor', 'required');
        $this->form_validation->set_rules('nilai_omset', 'nilai_omset', 'required');
        $this->form_validation->set_rules('jumlah_kembalian', 'jumlah_kembalian', 'required');
        $this->form_validation->set_rules('tanggal_stor', 'tanggal_stor', 'required');
        $this->form_validation->set_rules('bulan', 'bulan', 'required');
        $this->form_validation->set_rules('tahun', 'tahun', 'required');
        $this->form_validation->set_rules('waktu_stor', 'waktu_stor', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('OmsetDua/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_penyetor = htmlspecialchars($this->input->post('nama_penyetor'));
            $nilai_omset = htmlspecialchars($this->input->post('nilai_omset'));
            $jumlah_kembalian = htmlspecialchars($this->input->post('jumlah_kembalian'));
            $tanggal_stor = htmlspecialchars($this->input->post('tanggal_stor'));
            $bulan = htmlspecialchars($this->input->post('bulan'));
            $tahun = htmlspecialchars($this->input->post('tahun'));
            $waktu_stor = htmlspecialchars($this->input->post('waktu_stor'));
            $keterangan = htmlspecialchars($this->input->post('keterangan'));
            $this->db->set('nama_penyetor', $nama_penyetor);
            $this->db->set('nilai_omset', $nilai_omset);
            $this->db->set('jumlah_kembalian', $jumlah_kembalian);
            $this->db->set('tanggal_stor', $tanggal_stor);
            $this->db->set('bulan', $bulan);
            $this->db->set('tahun', $tahun);
            $this->db->set('waktu_stor', $waktu_stor);
            $this->db->set('keterangan', $keterangan);
            $this->db->where('id', $id);
            $this->db->update('omset');
            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data dipilih berhasil <strong>Teredit..!!</strong></div>');
            redirect('OmsetDua/data');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');


class BukuTamu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    //MENU REKAM TAMU MASUK =====================================
    public function rekam()
    {

        $data['title'] = 'Rekam Tamu Masuk';
        $data['openMenu'] = 'Buku Tamu';
        $data['sub'] = '';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->db->get('user')->result_array();
        $data['userRole'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('namaTamu', 'Nama Tamu', 'required');
        $this->form_validation->set_rules('alamatTamu', 'Alamat Tamu', 'required');
        $this->form_validation->set_rules('ditemui', 'Ingin Bertemu', 'required');
        // $this->form_validation->set_rules('tanggalBerkunjung', 'Tanggal Berkunjung', 'required');
        $this->form_validation->set_rules('keperluanTamu', 'Keperluan Tamu', 'required');
        // $this->form_validation->set_rules('gambar', 'gambar', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bukuTamu/rekam/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'namaTamu' => htmlspecialchars($this->input->post('namaTamu')),
                'statusTamu' => 0,
                'alamatTamu' => htmlspecialchars($this->input->post('alamatTamu')),
                'ditemui' => htmlspecialchars($this->input->post('ditemui')),
                'tanggalBerkunjung' => $this->input->post('tanggalBerkunjung'),
                'keperluanTamu' => htmlspecialchars(str_replace(array("\n", "\r"), '', $this->input->post('keperluanTamu'))),
                'gambar' => htmlspecialchars($this->input->post('gambar')),
                'tamuMasuk' => time(),
                'tamuKeluar' => NULL
            ];
            $this->db->insert('tamu', $data);
            $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible animate__animated animate__slideInDown animate__faster" role="alert">
            <strong>Berhasil!!</strong>, merekam tamu masuk
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('BukuTamu/rekam');
        }
    }

    public function upload()
    {
        // new filename
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $filename = time() . '.jpg';

        $url = '';
        if (move_uploaded_file($_FILES['webcam']['tmp_name'], 'img/' . $filename)) {
            // $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/upload/' . $filename;
            $url = $filename;
        }

        // Return image url
        echo $url;

        // unlink("./img/".$url);
    }
    public function unRekam()
    {
        unlink("./img/" . $_POST["hapusGmr"]);

        redirect('BukuTamu/rekam');
    }


    // MENU DATA KUNJUNGAN ========================================
    public function data()
    {
        $data['title'] = 'Data Berkunjung';
        $data['openMenu'] = 'Buku Tamu';
        $data['sub'] = '';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['tamu'] = $this->db->get('tamu')->result_array();
        $data['users'] = $this->db->get('user')->result_array();
        $data['userRole'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bukuTamu/data/index', $data);
        $this->load->view('templates/footer');
    }

    public function editDataTamu($id)
    {
        $data['title'] = 'Data Berkunjung';
        $data['openMenu'] = 'Buku Tamu';
        $data['sub'] = 'Edit Data Tamu';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['tamu'] = $this->db->get_where('tamu', ['id' => $id])->row_array();
        $data['users'] = $this->db->get('user')->result_array();
        $data['userRole'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('namaTamu', 'Nama Tamu', 'required');
        $this->form_validation->set_rules('alamatTamu', 'Alamat Tamu', 'required');
        $this->form_validation->set_rules('ditemui', 'Ingin Bertemu', 'required');
        $this->form_validation->set_rules('tanggalBerkunjung', 'Tanggal Berkunjung', 'required');
        $this->form_validation->set_rules('keperluanTamu', 'Keperluan Tamu', 'required');
        // $this->form_validation->set_rules('tamuMasuk', 'Waktu Berkunjung', 'required');
        // $this->form_validation->set_rules('gambar', 'gambar', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bukuTamu/data/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $namaTamu = htmlspecialchars($this->input->post('namaTamu'));
            $alamatTamu = htmlspecialchars($this->input->post('alamatTamu'));
            $ditemui = htmlspecialchars($this->input->post('ditemui'));
            $tanggalBerkunjung = htmlspecialchars($this->input->post('tanggalBerkunjung'));
            $keperluanTamu = htmlspecialchars(str_replace(array("\n", "\r"), '', $this->input->post('keperluanTamu')));
            $gambar = htmlspecialchars($this->input->post('gambar'));
            // $tamuMasuk = time();

            $this->db->set('namaTamu', $namaTamu);
            $this->db->set('alamatTamu', $alamatTamu);
            $this->db->set('ditemui', $ditemui);
            $this->db->set('tanggalBerkunjung', $tanggalBerkunjung);
            $this->db->set('keperluanTamu', $keperluanTamu);
            $this->db->set('gambar', $gambar);
            $this->db->where('id', $id);
            $this->db->update('tamu');
            $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible animate__animated animate__slideInDown animate__faster" role="alert">
            <strong>Berhasil!!</strong>, data tamu sudah teredit
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('BukuTamu/data');
        }
    }

    public function hapusDataTamu($id, $gambar)
    {
        $this->db->delete('tamu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible animate__animated animate__slideInDown animate__faster" role="alert">
        <strong>Berhasil!!</strong>, data tamu terhapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');

        unlink("./img/" . $gambar);
        redirect('BukuTamu/data');
    }

    public function unRekamEdit($id)
    {
        $gambar = $_POST["hapusGmr"];
        unlink("./img/" . $gambar);

        $this->db->set('gambar', "tidak ada");
        $this->db->where('id', $id);
        $this->db->update('tamu');

        redirect('BukuTamu/editDataTamu/' . $id);
    }
    public function cetak(){
        $data['title'] = 'Cetak Data Tamu';
        $data['tamu'] = $this->db->get('tamu')->result_array();
        $data['users'] = $this->db->get('user')->result_array();

        $this->load->view('bukuTamu/data/cetak', $data);
    }










    public function dataStatusKlikKirim($id)
    {
        $this->db->set('statusTamu', 1);
        $this->db->where('id', $id);
        $this->db->update('tamu');
        redirect('BukuTamu/data');
    }
    public function dataStatusKlikUlang($id)
    {
        $this->db->set('statusTamu', 0);
        $this->db->where('id', $id);
        $this->db->update('tamu');
        redirect('BukuTamu/data');
    }
}

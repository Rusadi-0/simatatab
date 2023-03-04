<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Kuala_Lumpur');

class BukuTamu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function rekam()
    {
        $data['title'] = 'Rekam Tamu Masuk';
        $data['openMenu'] = 'Buku Tamu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->db->get('user')->result_array();

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
                'namaTamu' => $this->input->post('namaTamu'),
                'alamatTamu' => $this->input->post('alamatTamu'),
                'ditemui' => $this->input->post('ditemui'),
                'tanggalBerkunjung' => $this->input->post('tanggalBerkunjung'),
                'keperluanTamu' => $this->input->post('keperluanTamu'),
                'gambar' => $this->input->post('gambar')
            ];
            $this->db->insert('tamu', $data);
            $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible animate__animated animate__slideInDown animate__faster" role="alert">
            <strong>Berhasil!!</strong>, merekam tamu masuk
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('BukuTamu/rekam');
        }

    }
    public function data()
    {
        $data['title'] = 'Data Berkunjung';
        $data['openMenu'] = 'Buku Tamu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bukuTamu/data/index', $data);
        $this->load->view('templates/footer');

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
}

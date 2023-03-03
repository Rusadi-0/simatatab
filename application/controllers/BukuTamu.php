<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Kuala_Lumpur');

class BukuTamu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function rekam()
    {
        $data['title'] = 'Rekam Tamu Masuk';
        $data['openMenu'] = 'Buku Tamu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bukuTamu/rekam/index', $data);
        $this->load->view('templates/footer');
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
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Kuala_Lumpur');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['openMenu'] = '';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Kuala_Lumpur');

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function account()
    {
        $data['title'] = 'Setting Account';
        $data['openMenu'] = 'Settings';
        $data['sub'] = '';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userRole'] = $this->db->get('user_role')->result_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('settings/account/index', $data);
        $this->load->view('templates/footer');
    }
}
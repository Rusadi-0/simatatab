<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Kuala_Lumpur');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('name', 'Nama Menu', 'required');
        $this->form_validation->set_rules('menu', 'Controllers', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['id' => htmlspecialchars($this->input->post('id')), 'menu' => htmlspecialchars(ucfirst($this->input->post('menu'))), 'icon' => htmlspecialchars($this->input->post('icon')), 'name' => htmlspecialchars($this->input->post('name'))]);
            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Menu berhasil <strong>Tertambahkan..!!</strong></div>');
            redirect('menu');
        }
    }

    public function delete($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();
        $data['submenu'] = $this->db->get_where('user_sub_menu')->row_array();

        // $this->load->view('menu/hapusMenu.php', $data);
        $this->db->delete('user_menu', ['id' => $id]);
        $this->db->delete('user_sub_menu', ['menu_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Menu dipilih berhasil <strong>Terhapus..!!</strong></div>');
        redirect('menu');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

        $this->form_validation->set_rules('menu', 'Controllers', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('name', 'Nama Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/menu-edit', $data);
            $this->load->view('templates/footer');
        } else {

            $menu = htmlspecialchars($this->input->post('menu'));
            $icon = htmlspecialchars($this->input->post('icon'));
            $name = htmlspecialchars($this->input->post('name'));

            $this->db->set('menu', $menu);
            $this->db->set('icon', $icon);
            $this->db->set('name', $name);
            $this->db->where('id', $id);
            $this->db->update('user_menu');

            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Menu dipilih berhasil <strong>Teredit..!!</strong></div>');
            redirect('menu');
        }
    }


    public function submenu()
    {
        $data['title'] = 'Submenu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu('user_sub_menu');
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        // $this->form_validation->set_rules('icons', 'icons', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title')),
                'menu_id' => htmlspecialchars($this->input->post('menu_id')),
                'url' => htmlspecialchars($this->input->post('url')),
                'icons' => htmlspecialchars("mdi mdi-flower"),
                'is_active' => htmlspecialchars($this->input->post('is_active'))
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Submenu berhasil <strong>Tertambahkan..!!</strong></div>');
            redirect('menu/submenu');
        }
    }
    public function subMenuDelete($id)
    {
        $data['menu'] = $this->db->get_where('user_sub_menu')->row_array();

        $this->db->delete('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Submenu dipilih berhasil <strong>Terhapus..!!</strong></div>');
        redirect('menu/submenu');
    }

    public function subMenuEdit($id)
    {
        $data['title'] = 'Edit Submenu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['subMenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/submenu_edit', $data);
            $this->load->view('templates/footer');
        } else {
            // $id = $this->input->post('id');
            $title = htmlspecialchars($this->input->post('title'));
            $menu = htmlspecialchars($this->input->post('menu_id'));
            $url = htmlspecialchars($this->input->post('url'));
            $icons = htmlspecialchars($this->input->post('icons'));
            $active = htmlspecialchars($this->input->post('is_active'));

            $this->db->set('title', $title);
            $this->db->set('menu_id', $menu);
            $this->db->set('url', $url);
            $this->db->set('icons', $icons);
            $this->db->set('is_active', $active);
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu');

            $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Submenu dipilih berhasil <strong>Teredit..!!</strong></div>');
            redirect('menu/submenu');
        }
    }
}

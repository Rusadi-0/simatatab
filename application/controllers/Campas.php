<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Kuala_Lumpur');

class Campas extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          is_logged_in();
     }

     public function index()
     {
          $data['title'] = 'Campas ';
          $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
          $data['campas'] = $this->db->get('campas')->result_array();

          $this->form_validation->set_rules('namaCampas', 'namaCampas', 'required');
          $this->form_validation->set_rules('alamatCampas', 'alamatCampas', 'required');
          $this->form_validation->set_rules('teleponCampas', 'teleponCampas', 'required');
          $this->form_validation->set_rules('rekeningCampas', 'rekeningCampas', 'required');

          if ($this->form_validation->run() == false) {
               $this->load->view('templates/header', $data);
               $this->load->view('templates/topbar', $data);
               $this->load->view('templates/sidebar', $data);
               $this->load->view('campas/index', $data);
               $this->load->view('templates/footer');
          } else {
               $data = [
                    'namaCampas' => htmlspecialchars($this->input->post('namaCampas')),
                    'alamatCampas' => htmlspecialchars($this->input->post('alamatCampas')),
                    'teleponCampas' => htmlspecialchars($this->input->post('teleponCampas')),
                    'rekeningCampas' => htmlspecialchars($this->input->post('rekeningCampas'))
               ];
               $this->db->insert('campas', $data);
               $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data berhasil <strong> Tertambah..!!</strong></div>');
               redirect('campas');
          }
     }

     public function delete($id)
     {
          $this->db->delete('campas', ['id' => $id]);
          $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data dipilih berhasil <strong>Terhapus..!!</strong></div>');
          redirect('campas');
     }
     public function edit($id)
     {
          $data['title'] = 'Edit Campas ';
          $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
          $data['campas'] = $this->db->get_where('campas', ['id' => $id])->row_array();

          $this->form_validation->set_rules('namaCampas', 'namaCampas', 'required');
          $this->form_validation->set_rules('alamatCampas', 'alamatCampas', 'required');
          $this->form_validation->set_rules('teleponCampas', 'teleponCampas', 'required');
          $this->form_validation->set_rules('rekeningCampas', 'rekeningCampas', 'required');

          if ($this->form_validation->run() == false) {
               $this->load->view('templates/header', $data);
               $this->load->view('templates/topbar', $data);
               $this->load->view('templates/sidebar', $data);
               $this->load->view('campas/edit', $data);
               $this->load->view('templates/footer');
          } else {
               $namaCampas = htmlspecialchars($this->input->post('namaCampas'));
               $alamatCampas = htmlspecialchars($this->input->post('alamatCampas'));
               $teleponCampas = htmlspecialchars($this->input->post('teleponCampas'));
               $rekeningCampas = htmlspecialchars($this->input->post('rekeningCampas'));
               $this->db->set('namaCampas', $namaCampas);
               $this->db->set('alamatCampas', $alamatCampas);
               $this->db->set('teleponCampas', $teleponCampas);
               $this->db->set('rekeningCampas', $rekeningCampas);
               $this->db->where('id', $id);
               $this->db->update('campas');
               $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data dipilih berhasil <strong>Teredit..!!</strong></div>');
               redirect('campas');
          }
     }
     //     TAGIHAN CAMPAS
     public function tagihan()
     {
          $data['title'] = 'Tagihan';
          $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
          $data['campas'] = $this->db->get('campas')->result_array();
          $data['tagihan'] = $this->db->get('tagihan')->result_array();

          $this->load->model('Omset_model', 'omset');

          $data['tagih'] = $this->omset->anggaran('tagihan');
          $data['omset'] = $this->omset->getData('omset');
          $data['omsetBulan'] = $this->omset->getBulan('omset');
          $data['getAkhir'] = $this->omset->getDataAkhir('omset');
          $data['getAll'] = $this->omset->getAll('omset');
          $data['getAss'] = $this->omset->getAss('omset');
          $data['sumLabaAll'] = $this->omset->sumLabaAll('omset');
          $data['sumKembalianAll'] = $this->omset->sumKembalianAll('omset');

          $this->form_validation->set_rules('dari_tagihan', 'dari_tagihan', 'required');
          $this->form_validation->set_rules('total_tagihan', 'total_tagihan', 'required');
          $this->form_validation->set_rules('tanggal_tagihan', 'tanggal_tagihan', 'required');

          if ($this->form_validation->run() == false) {
               $this->load->view('templates/header', $data);
               $this->load->view('templates/topbar', $data);
               $this->load->view('templates/sidebar', $data);
               $this->load->view('campas/tagihan', $data);
               $this->load->view('templates/footer');
          } else {
               $data = [
                    'dari_tagihan' => htmlspecialchars($this->input->post('dari_tagihan')),
                    'total_tagihan' => htmlspecialchars($this->input->post('total_tagihan')),
                    'tanggal_tagihan' => htmlspecialchars($this->input->post('tanggal_tagihan')),
                    'bulan' => date("mY"),
                    'tahun' => date("Y")
               ];
               $this->db->insert('tagihan', $data);
               $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data berhasil <strong> Tertambah..!!</strong></div>');
               redirect('campas/tagihan');
          }
     }
     public function deleteTagihan($id)
     {
          $this->db->delete('tagihan', ['id' => $id]);
          $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data dipilih berhasil <strong>Terhapus..!!</strong></div>');
          redirect('campas/tagihan');
     }
     public function editTagihan($id)
     {
          $data['title'] = 'Edit Tagihan ';
          $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
          $data['tagihan'] = $this->db->get_where('tagihan', ['id' => $id])->row_array();
          $data['campas'] = $this->db->get('campas')->result_array();

          $this->form_validation->set_rules('dari_tagihan', 'dari_tagihan', 'required');
          $this->form_validation->set_rules('total_tagihan', 'total_tagihan', 'required');
          $this->form_validation->set_rules('tanggal_tagihan', 'tanggal_tagihan', 'required');
          $this->form_validation->set_rules('bulan', 'bulan', 'required');
          $this->form_validation->set_rules('tahun', 'tahun', 'required');

          if ($this->form_validation->run() == false) {
               $this->load->view('templates/header', $data);
               $this->load->view('templates/topbar', $data);
               $this->load->view('templates/sidebar', $data);
               $this->load->view('campas/editTagihan', $data);
               $this->load->view('templates/footer');
          } else {
               $dari_tagihan = htmlspecialchars($this->input->post('dari_tagihan'));
               $total_tagihan = htmlspecialchars($this->input->post('total_tagihan'));
               $tanggal_tagihan = htmlspecialchars($this->input->post('tanggal_tagihan'));
               $bulan = htmlspecialchars($this->input->post('bulan'));
               $tahun = htmlspecialchars($this->input->post('tahun'));
               $this->db->set('dari_tagihan', $dari_tagihan);
               $this->db->set('total_tagihan', $total_tagihan);
               $this->db->set('tanggal_tagihan', $tanggal_tagihan);
               $this->db->set('bulan', $bulan);
               $this->db->set('tahun', $tahun);
               $this->db->where('id', $id);
               $this->db->update('tagihan');
               $this->session->set_flashdata('message', '<div class="alert fade show notifikasi alert-success" data-dismiss="alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="mdi mdi-close"></i></button>Data dipilih berhasil <strong>Teredit..!!</strong></div>');
               redirect('campas/tagihan');
          }
     }
}

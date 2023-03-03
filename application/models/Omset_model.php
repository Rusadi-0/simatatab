<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Omset_model extends CI_Model
{
    public function getData()//untuk validasi input omset sekarang
    {
        $query = "SELECT tanggal_stor FROM omset ORDER BY tanggal_stor DESC;";
        return $this->db->query($query)->row_array();
    }
    
    public function getBulan()
    {
        $query = "SELECT * FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '%m%Y')) AND NOT id='1' ORDER BY id DESC;";
        return $this->db->query($query)->result_array();
    }
    
    public function getBulanOld()
    {
        $query = "SELECT * FROM omset_old WHERE bulan IN (DATE_FORMAT(NOW(), '%m%Y')) AND NOT id='1' ORDER BY id DESC;";
        return $this->db->query($query)->result_array();
    }
    
    public function getDataAkhir()
    {
        $query = "SELECT * FROM omset ORDER BY id DESC LIMIT 1";
        return $this->db->query($query)->result_array();
    }
    public function getAll()
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '%m%Y')) AND NOT id='1'";
        return $this->db->query($query)->row_array();
    }
    public function getAss()
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '%m%Y')) AND NOT id='1'";
        return $this->db->query($query)->row_array();
    }
    public function anggaran()
    {
        $query = "SELECT SUM(total_tagihan) FROM tagihan";
        return $this->db->query($query)->row_array();
    }
    public function sumLabaAll()
    {
        $query = "SELECT SUM(nilai_omset) FROM omset";
        return $this->db->query($query)->row_array();
    }
    public function sumKembalianAll()
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset";
        return $this->db->query($query)->row_array();
    }

}    

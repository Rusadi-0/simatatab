<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OmsetDua_model extends CI_Model
{
    public function sumJan()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '01%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function sumFeb()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '02%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function sumMar()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '03%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function sumApr()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '04%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function sumMei()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '05%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function sumJun()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '06%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function sumJul()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '07%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function sumAgus()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '08%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function sumSep()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '09%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function sumOkt()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '10%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function sumNop()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '11%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function sumDes()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(nilai_omset) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '12%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    // KEMBALIAN
    
    public function kemJan()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '01%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function kemFeb()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '02%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function kemMar()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '03%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function kemApr()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '04%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function kemMei()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '05%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function kemJun()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '06%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function kemJul()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '07%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function kemAgus()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '08%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function kemSep()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '09%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function kemOkt()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '10%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function kemNop()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '11%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }
    public function kemDes()//untuk validasi input omset sekarang
    {
        $query = "SELECT SUM(jumlah_kembalian) FROM omset WHERE bulan IN (DATE_FORMAT(NOW(), '12%Y')) AND NOT id='1';";
        return $this->db->query($query)->row_array();
    }

    
}

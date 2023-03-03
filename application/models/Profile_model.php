<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function getUserRole()
    {
        $query = "SELECT * 
                  FROM `user_role`
                ";
        return $this->db->query($query)->result_array();
    }
}

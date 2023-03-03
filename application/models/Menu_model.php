<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` 
                  FROM `user_sub_menu` 
                  JOIN `user_menu` 
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                  WHERE NOT `user_sub_menu`.`url` 
                  AND `user_sub_menu`.`id` NOT IN (1,2,4,5,7,20) 
                ";
        return $this->db->query($query)->result_array();
    }
    
    public function getUsers()
    {
        $query ="SELECT `user`.*, `user_role`.`role`
                 FROM `user`
                 JOIN `user_role`
                 ON `user`.`role_id` = `user_role`.`id`
                 ";
        return $this->db->query($query)->result_array();
    }
}

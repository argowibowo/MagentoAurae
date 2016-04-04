<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('email, password');
   $this -> db -> from('ms_customer');
   $this -> db -> where('email', $username);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function createUser($array_data) {
        $this->db->insert('tbl_users', $array_data);
 }
}
?>
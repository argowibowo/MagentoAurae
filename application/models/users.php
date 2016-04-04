<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kategori
 *
 * @author admin
 */
class users extends CI_Model{
    //put your code here
    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('Lusername'));
        $password = $this->security->xss_clean($this->input->post('Lpassword'));
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('tbl_users');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'username' => $row->username,
                    'password' => $row->password
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}

?>

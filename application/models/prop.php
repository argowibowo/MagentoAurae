<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of prop
 *
 * @author admin
 */
class prop extends CI_Model {
    //put your code here
    function get_prop(){
        //query
        //$this->db->where(array('id'=>7,'usr_mail'=>'mail@mail.org'));
        $this->db->select('*');
        $q = $this->db->get('mst_propinsi');
        
        if($q->num_rows() > 0)
        {
          foreach ($q->result() as $row)
          {
            $data[] = $row;
          }
          return $data;
        }
    }
    
    function get_kab(){
        //query
        //$this->db->where(array('id'=>7,'usr_mail'=>'mail@mail.org'));
        $this->db->select('*');
        $q = $this->db->get('mst_kabupaten');
        
        if($q->num_rows() > 0)
        {
          foreach ($q->result() as $row)
          {
            $data[] = $row;
          }
          return $data;
        }
    }
}

?>
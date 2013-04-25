<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */

class Login_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    
    public function login($user,$pass){
        $q=$this->db->query("select admin from admin where admin=? and password=md5(?)",
                array($user,$pass));
        if($q->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }
}
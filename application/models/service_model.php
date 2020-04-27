<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service_model extends CI_Model {
    public function escape_array($array){
        $posts = array();
        if (! empty($array)){
         	foreach($array as $key => $value) {  
         		if ($value == null) continue;
            	$posts[$key] = $this->db->escape_str($value);
         	}
        }
        return $posts;
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProductModel extends CI_Model
{
    public function getproducts()  
      {
	    $query = $this->db->get('products');  
         return $query; 
      }
      public function getdata($id)  
      {
        $this->db->where('id',$id);
	    $query = $this->db->get('products');  
         return $query; 
      }
     
}

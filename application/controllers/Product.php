<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {

   public function __construct()
   {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('ProductModel');
   }

   public function index()
    {
        $data['product']     = $this->ProductModel->getproducts();
        $this->load->view('list',$data);
    }
   public function create($id=0)
    {
        $files=array();
        $count=count($_FILES['files']['name']);
        if(!empty($_FILES['files']['name'])){
            foreach($_FILES as $value){
                for($s=0; $s<=$count-1; $s++){
                    $_FILES['files']['name']=$value['name'][$s];
                    $_FILES['files']['type']    = $value['type'][$s];
                    $_FILES['files']['tmp_name'] = $value['tmp_name'][$s];
                    $_FILES['files']['error']       = $value['error'][$s];
                    $_FILES['files']['size']    = $value['size'][$s];
                    $config['upload_path'] = 'upload';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $_FILES['files']['name'];
     
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('files')){
                        $uploadData = $this->upload->data();
                        $files[] = $uploadData['file_name'];
                    }
                }
            }
        }
        $data=array('product_name'=>$this->input->post('product_name'),'product_price'=>$this->input->post('product_price'),'product_description'=>$this->input->post('product_description'));
     
        if ($id==0){
             $this->db->insert('products',$data);
             $last_id = $this->db->insert_id();
             if(!empty($files)){
                 foreach($files as $p_index=>$p_value) {
                    $this->db->insert('product_images', array('product_id'=>$last_id,'files'=>$p_value));
                 }
             }
        }
        else {
            $this->db->where('id',$id);
            $this->db->update('products',$data);
            if(!empty($files)){
                foreach($files as $p_index=>$p_value) {
                   $this->db->update('product_images', array('product_id'=>$last_id,'files'=>$p_value) );
                }
            }
         }
    
    }

    public function edit($id)
    {
        $data['product']     = $this->ProductModel->getdata($id);
        $this->load->view('list',$data);
    }

   public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('products');
        $this->load->view('list',$data);
    }
}
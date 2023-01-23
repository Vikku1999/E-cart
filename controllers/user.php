<?php
class User extends MY_Controller
{
    public function index(){
        $this->load->model('loginmodel','ar');
      $products=$this->ar->list();
     //echo "<pre>";print_r($users); die;
     
        $this->load->view('admin/fpage',['products'=>$products]);

    }
}
?>
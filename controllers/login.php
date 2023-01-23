<?php
class login extends MY_Controller{

    public function index()
    {
      
        if($this->session->userdata('id'))
        return redirect('admin/welcome');
     $this->form_validation->set_rules('uname','User Name','required');
     $this->form_validation->set_rules('pass','Password','required');
    $this->form_validation->set_error_delimiters('<div class="error">','</div>');

    if($this->form_validation->run()){

      $uname=$this->input->post('uname');
      $pass=$this->input->post('pass');
     
    $this->load->model('loginmodel');
    $id=$this->loginmodel->isvalidate($uname,$pass);
    if($id){
      // true
      
     
      $this->session->set_userdata('id',$id);
      return redirect('admin/welcome');
    }else{
      
     $this->session->set_flashdata('Login_failed','Invalid username/password');
    
     return redirect('login');
    }
    } else{

      $this->load->view('Admin/Login');
     
    }
       
    }
    public function admin()
    {
      
        if($this->session->userdata('id'))
        return redirect('admin/awelcome');
     $this->form_validation->set_rules('uname','User Name','required');
     $this->form_validation->set_rules('pass','Password','required');
    $this->form_validation->set_error_delimiters('<div class="error">','</div>');

    if($this->form_validation->run()){

      $uname=$this->input->post('uname');
      $pass=$this->input->post('pass');
     
    $this->load->model('loginmodel');
    $id=$this->loginmodel->Aisvalidate($uname,$pass);
    if($id){
      // true
      
     
      $this->session->set_userdata('id',$id);
      return redirect('admin/awelcome');
    }else{
      
     $this->session->set_flashdata('Login_failed','Invalid username/password');
    
     return redirect('login/admin');
    }
    } else{

      $this->load->view('Admin/alogin');
     
    }
       
    }


}

?>
<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');

require APPPATH.'views/razorpay-php/Razorpay.php';
use Razorpay\Api\Api;

class Payment extends MY_controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('payment_model');
    }

    public function index(){
        //session data - customer
        $id=1;
        $this->session->set_userdata('id', $id);
        $customerdata=$this->payment_model->fetchCustomerData($id);
        // print_r($customerdata);
        // die;
        $this->load->view('payment-view',['customerdata'=>$customerdata]);
    }
    public function checkout(){
        $key_id = 'rzp_test_Dv1gQzvMiKjX4g';
        $secret = '09vNaK59mxmsmM9dxrzDalNe';
        $price = $this->input->post('price');
        //Create order
        $api = new Api($key_id, $secret);
        $order=$api->order->create([
                   'receipt' => 'order_rcptid_11',
                 
                   'amount' =>  $price, 
                    'currency' => 'INR']);
        
        //Get customer detail
        $customerid = $this->session->userdata('id');
        $customerdata=$this->payment_model->fetchCustomerData($customerid);
        $this->load->view('razorpay-checkout',['customer'=>$customerdata, 
         'order'=>$order, 'key_id'=>$key_id, 'secret'=>$secret
    ]);   
    }

    public function paymentStatus(){
         print_r($_POST);
    }
}

?>
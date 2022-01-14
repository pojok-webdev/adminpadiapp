<?php
Class Installs extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $data = array(
            'actstatus'=>array('surveys'=>'','installs'=>'active'),
            'pagetitle'=>$this->uri->segment(1)
        );
        $this->load->view('templates/installs',$data);
    }
}
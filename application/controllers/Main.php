<?php
Class Main extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $this->load->view('templates/index');
    }
    function surveys(){
        $this->load->view('templates/surveys');
    }
}
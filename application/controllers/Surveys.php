<?php
Class Surveys extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('survey_image');
    }
    function index(){
        $data = array(
            'actstatus'=>array('surveys'=>'active','installs'=>''),
            'pagetitle'=>$this->uri->segment(1),
            'objs'=>$this->survey_image->gets()
        );
        $this->load->view('templates/surveys',$data);
    }
    function images(){
        $data = array(
            'actstatus'=>array('surveys'=>'active','installs'=>''),
            'pagetitle'=>$this->uri->segment(1).' / '.$this->uri->segment(2),
            'objs'=>$this->survey_image->gets()
        );
        $this->load->view('templates/pages/survey_images',$data);
    }
    function getdata(){
        $objs = $this->survey_image->gets();
        $arr = array();
        foreach($objs['res'] as $obj){
            array_push($arr,'['.$obj->id.','.$obj->survey_site_id.',"X","Y","Z"]');
        };
        echo '{"data":['.implode(',',$arr).']}';
    }
    function getimages(){
        $objs = $this->survey_image->gets();
        echo json_encode($objs['res']);
    }
    function ajaxformat(){
        echo '{
            "data": [
              [
                "Tiger Nixon",
                "System Architect",
                "Edinburgh",
                "5421",
                "2011/04/25",
                "$320,800"
              ],
              [
                "Garrett Winters",
                "Accountant",
                "Tokyo",
                "8422",
                "2011/07/25",
                "$170,750"
              ]]}';
    }
    function saveImage($img,$imagename){
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        //$fileName = $this->config->item('surveyimagepath').$imagename.'.png';
        $fileName = '/home/webdev/phpworkspace/adminpadiapp/images/'.$imagename.'.png';

        file_put_contents($fileName, $fileData);
    }
    function saveImageJpeg($img,$imagename){
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        //$fileName = $this->config->item('surveyimagepath').$imagename.'.png';
        $fileName = '/home/webdev/phpworkspace/adminpadiapp/images/'.$imagename.'.jpg';

        file_put_contents($fileName, $fileData);
    }
    function save_image(){
        $params = $this->input->post();
        $this->saveImageJpeg($params['image'],$params['imagename']);
        echo json_encode($params);
    }
}
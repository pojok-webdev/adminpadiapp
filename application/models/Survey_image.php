<?php
Class Survey_image extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function gets(){
        $sql = 'select id,survey_site_id,img,description,"c" c from survey_images limit 0,3';
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),
            'cnt'=>$que->num_rows()
        );
    }
}
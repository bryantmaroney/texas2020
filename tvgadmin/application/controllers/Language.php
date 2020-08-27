<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function changeLanguage() {

        $this->load->helper('language');

        if ($this->input->post('language') == "english") {
            $this->lang->load('home_lang','english');
            $this->lang->load('candidate_lang','english');
        }
        else if ($this->input->post('language') == "spanish") {
            $this->lang->load('home_lang','spanish');
            $this->lang->load('candidate_lang','spanish');
        }

        $this->session->set_userdata('language', $this->input->post('language'));
        
        $all_lang_array = $this->lang->language;

        echo json_encode($all_lang_array);

    }
	
    
}

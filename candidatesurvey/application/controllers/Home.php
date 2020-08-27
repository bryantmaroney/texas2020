<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index() {
        $this->load->helper('url');
        redirect('step1');    
	}

    public function urlMiddleware($step){
        if ($this->session->userdata('first_name') == null || $this->session->userdata('last_name') == null || $this->session->userdata('selected_office') == null) {
            redirect('step2');
        }
        else if($this->session->userdata('issues') == null && $step !="step3"){
            redirect('step3');
        }
        else {
            $this->load->view($step);
        }
    }

    public function step1(){
        $this->load->view('step1Last');
    }
    public function step2(){
        $this->load->view('step2');
    }
    public function step3(){
        $this->urlMiddleware("step3");
    }
    public function step4(){
        $this->urlMiddleware("step4");
    }
    public function step5(){
        // $this->urlMiddleware("step5");
        $this->load->view('step5');
    }
    public function veryfySuccess(){
        // $this->urlMiddleware("newVerifySuccess");
        $this->load->view('newVerifySuccess');
    }
	

}

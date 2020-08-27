<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('layouts/header');
        $this->load->view('index');
        $this->load->view('layouts/footer');
    }
    
    public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function getInfoStep1() {
        if($this->input->post('address') || $this->input->post('zipcode')) {
            $_SESSION['inputs'] = $_POST;

            if(strlen($this->input->post('zipcode')) == 5) {
                $url = "https://www.usgeocoder.com/api/get_info.php?address=".$_POST['address']."&zipcode=".$_POST['zipcode']."&authkey=0fd192b5d12f6689c953680ecc10355f";
                $xml = simplexml_load_file($url);
                // echo '<pre>';
                // print_r((string)$xml->request_status->request_status_code);
                // echo '<br>';
                // print_r($xml->request_status->request_status_code);
                // echo '<br>';
                // print_r($xml);die;
                if((string)$xml->request_status->request_status_code !== "Invalid" && (string)$xml->request_status->request_status_code !== "NoMatch" && (string)$xml->request_status->request_status_code !== "ZipMatch") {
                    $res = array(
                        'congressional_district_name' => (string)$xml->jurisdictions_info->congressional_legislators->congressional_district->congressional_district_name,
                        'congressional_district_id' => (int)$xml->jurisdictions_info->congressional_legislators->congressional_district_id->congressional_district_id_value,
                        'state_upper_house_district_1_name' => (string)$xml->jurisdictions_info->state_legislation->state_upper_house_district_1->state_upper_house_district_1_name,
                        'state_upper_house_district_1_id_value' => (int)$xml->jurisdictions_info->state_legislation->state_upper_house_district_1_id->state_upper_house_district_1_id_value,
                        'state_lower_house_district_1_name' => (string)$xml->jurisdictions_info->state_legislation->state_lower_house_district_1->state_lower_house_district_1_name,
                        'state_lower_house_district_1_id_value' => (int)$xml->jurisdictions_info->state_legislation->state_lower_house_district_1_id->state_lower_house_district_1_id_value
                    );
                    
                    $_SESSION['district'] = $res;
                    $_SESSION['candidates'] = $this->getCandidates();

                    redirect('/step1');
                } else {
                    if($xml->request_status->request_status_code === 'Invalid') {
                        $result ='Please Try Again.';
                    } elseif($xml->request_status->request_status_code === 'NoMatch') {
                        $result ="There is no match found for {$_POST['address']} in {$_POST['city']} with this zip code {$_POST['zipcode']}";
                    } else {
                        $result ="There is no match found for {$_POST['address']} in {$_POST['city']} with this zip code {$_POST['zipcode']}";
                    }
                }
            } else {
                $result = 'You can use only 5 digit Zip Code.';
            }
        }

        $this->session->set_flashdata('message', isset($result) ? $result : 'Please Try Again.');
        redirect('/');
    }

    public function getCandidates() {
        $data = [
            'us_senate_data' => [],
            'us_house_data' => [],
            'texas_senate_data' => [],
            'texas_house_data' => []
        ];
        
        $districts = array("",$_SESSION['district']['congressional_district_id'],$_SESSION['district']['state_upper_house_district_1_id_value'], $_SESSION['district']['state_lower_house_district_1_id_value']);
        $candidatesData = $this->db->select('*')->from('candidates')->where_in('which_district', $districts)->get()->result_array();

        foreach ($candidatesData as $key => &$value) {
            $value['issues']        = json_decode($value['issues']);
            $value['skipCount']     = 0;
            $value['agreeCount']    = 0;
            $value['disagreeCount'] = 0;
            $value['commentsCount'] = 0;
            $value['answersCount']  = 0;
            $value['issues']        = $value['issues'] ? $value['issues'] : [];

            foreach($value['issues'] as $answer) {
                switch($answer) {
                    case 'neither':
                        $value['skipCount']++;
                        $value['answersCount']++;
                    break;
                    case 'agree':
                        $value['agreeCount']++;
                        $value['answersCount']++;
                    break;
                    case 'disagree':
                        $value['disagreeCount']++;
                        $value['answersCount']++;
                    break;
                    default:
                        if(trim($answer)) $value['commentsCount']++;
                        $value['answersCount']++;
                    break;
                }
            }

            switch($value['seeking_office']) {
                case 'U.S. Senate':
                    $data['us_senate_data'][] = $value;
                break;
                case 'U.S. House':
                    if($_SESSION['district']['congressional_district_id'] == $value['which_district']) {
                        $data['us_house_data'][] = $value;
                    }
                break;
                case 'T.X. Senate':
                    if($_SESSION['district']['state_upper_house_district_1_id_value'] == $value['which_district']) {
                        $data['texas_senate_data'][] = $value;
                    }
                break;
                case 'T.X. House':
                    if($_SESSION['district']['state_lower_house_district_1_id_value'] == $value['which_district']) {
                        $data['texas_house_data'][] = $value;
                    }
                break;
            }
        }

        return $data;
    }

    public function stepOne() {
        if(isset($_SESSION['district']) && isset($_SESSION['candidates'])) {
            $this->load->view('layouts/header', ['district' => $_SESSION['district']]);
            $this->load->view('step1', ['district' => $_SESSION['district'], 'candidates' => $_SESSION['candidates']]);
            $this->load->view('layouts/footer');
        } else {
            redirect('/');
        }
    }

    public function getMyVotes($answers) {
        $me                  = [];
        $me['skipCount']     = 0;
        $me['agreeCount']    = 0;
        $me['disagreeCount'] = 0;
        $me['commentsCount'] = 0;
        $me['answersCount']  = 0;
        $me['issues']        = new stdClass();

        foreach($answers as $key => $value) {
            $dataKey = preg_replace('/_answer$/', '', $key);
            // $me['issues']->{$dataKey . '_answer'} = isset($data->$dataKey) ? $data->$dataKey : '';
            $me['issues']->{$dataKey . '_answer'} = isset($_SESSION['myVotes']['issues']->{$dataKey . '_answer'}) ? $_SESSION['myVotes']['issues']->{$dataKey . '_answer'} : '';
            $me['issues']->{$dataKey . '_comment'} = '';

            switch($me['issues']->{$dataKey . '_answer'}) {
                case 'skip':
                case 'neither':
                    $me['skipCount']++;
                    $me['answersCount']++;
                break;
                case 'agree':
                    $me['agreeCount']++;
                    $me['answersCount']++;
                break;
                case 'disagree':
                    $me['disagreeCount']++;
                    $me['answersCount']++;
                break;
                default:
                    if(trim($me['issues']->{$dataKey . '_answer'})) $me['commentsCount']++;
                break;
            }
        }

        $_SESSION['myVotes'] = $me;
        return $me;
    }

    public function stepTwo($index) {
        preg_match('/[A-z_]+$/', isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : $_SERVER['PATH_INFO'], $in);
        if(!empty($in)) {
            switch($in[0]){
                case 'us_senate':
                    $in = 'U.S. SENATE ';
                    $image = base_url() . 'assets/images/b1.png';
                break;
                case 'us_house':
                    $in = 'U.S. HOUSE DISTRICT ' . $_SESSION['district']['congressional_district_id'];
                    $image = base_url() . 'assets/images/districts/U.s. House ' . $_SESSION['district']['congressional_district_id'] . '.png';
                break;
                case 'texas_house':
                    $in = 'TEXAS HOUSE DISTRICT ' . $_SESSION['district']['state_lower_house_district_1_id_value'];
                    $image = base_url() . 'assets/images/districts/Texas House ' . $_SESSION['district']['state_lower_house_district_1_id_value'] . '.png';
                break;
                case 'texas_senate':
                    $in = 'TEXAS SENATE DISTRICT ' . $_SESSION['district']['state_upper_house_district_1_id_value'];
                    $image = base_url() . 'assets/images/districts/Texas Senate ' . $_SESSION['district']['state_upper_house_district_1_id_value'] . '.png';
                break;
            }
        }

        if(isset($_SESSION['district']) && isset($_SESSION['candidates']) && isset($_SESSION['candidates']["{$index}_data"])) {
            $data['candidates'] = $_SESSION['candidates']["{$index}_data"];
            $data['votes'] = [
                'end_gerry_answer' => 'End Gerrymandering',
                'vote_by_mail_answer' => 'Vote By Mail',
                'reval_writers_answer' => 'Reveal the Writers',
                'reth_reg_answer' => 'Rethink Registration',
                'limit_lob_answer' => 'Limit the Lobbyists',
                'modern_election_answer' => 'Modernize Elections',
                'rank_candidate_answer' => 'Ranking Your Candidates',
                'tune_in_texas_answer' => 'Tune In Texas',
                'clean_up_answer' => 'Clean Up Elections',
                'ban_barriers_answer' => 'Ban the Barriers'
            ];
            $me = $this->getMyVotes($data['votes']);
            array_unshift($data['candidates'], $me);
            $data['text'] = $in;
            $data['img'] = $image;
            $data['district'] = $_SESSION['district'];
            
            if(isset($_GET['html'])) {
                if($index === 'texas_senate') {
                    $res = !array_search($_SESSION['district']['state_upper_house_district_1_id_value'], ['2', '3', '5', '7', '8', '9', '10', '14', '15', '16', '17', '23', '25', '30', '31']);
                } else {
                    $res = true;
                }
                $html = $this->load->view('step2', $data, true);
                echo json_encode(['data' => $html, 'election' => $res]);
            } else {
                $this->load->view('layouts/header', ['district' => $data['district']]);
                $this->load->view('step2', $data);
                $this->load->view('layouts/footer');    
            }
        } else {
            redirect('/');
        }
    }
    
    public function userVote(){
        $_SESSION['myVotes']['issues']->{$this->input->post('question') . '_answer'} = $this->input->post('answer');
        echo '<pre>';
        print_r($_SESSION['myVotes']);die;
    }

    public function getChoiceImg() {
        $res = $this->db->select('img_name')->from('choice_vote_img')->where('ip', $this->get_client_ip())->get()->result_array();

        return isset($res[0]) ? $res[0]['img_name'] : 'empty';
    }

    public function saveChoiceImg($filename) {
        if($this->getChoiceImg() === 'empty') {
            $this->db->insert('choice_vote_img', ['ip' => $this->get_client_ip(), 'img_name' => $filename]);
        } else {
            $this->db->where('ip', $this->get_client_ip());
            $this->db->update('choice_vote_img', ['img_name' => $filename]);
        }
    }

    public function SaveChoiceImage() {
        $uploadPath     = preg_replace('/application\/controllers$/', '', __DIR__) . 'assets/images/userchoices/';
        $base64         = $this->input->post('base64');
        $image_parts    = explode(";base64,", $base64);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type     = $image_type_aux[1];
        $image_base64   = base64_decode($image_parts[1]);
        $name           = md5(time());
        $filename       = $name . ".{$image_type}";
        $file           = $uploadPath . $filename;
        $prevImg        = $uploadPath . $this->getChoiceImg() . ".{$image_type}";

        if(file_exists($prevImg)) {
            unlink($prevImg);
        }

        $this->saveChoiceImg($name);
        file_put_contents($file, $image_base64);

        echo json_encode(['indexName' => $name]);
    }
    
    public function ChoiceShare($index) {
        $this->load->view('pageMeta', ['cardShareDetails' => [
                'title' => 'Find your Candidates at Texas2020.org',
                'description' => 'I just used Candidate Search & Comparison at Texas2020.org! These are the candidates I chose for my districts based on the issues they stand for. Find and share yours too!!',
                'url' => 'https://texas2020.org/?candidate_search',
                'image' => base_url().'assets/images/userchoices/' . $index . '.jpeg'
            ]
        ]);
    }
    
    public function importCandidates(){
        echo '<pre>';
        $path  = preg_replace('/application\/controllers$/', 'assets/files/', __DIR__);
        if (file_exists($path . 'read.csv') && ($handle = fopen($path . 'read.csv', 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $candidate = new stdClass();
                $candidate->first_name = trim($data[2]);
                $candidate->last_name = trim($data[3]);
                switch(trim($data[0])){
                    case 'USSENATE':
                        $candidate->seeking_office = 'U.S. Senate';
                    break;
                    case 'USHOUSE':
                        $candidate->seeking_office = 'U.S. House';
                    break;
                    case 'TXHOUSE':
                        $candidate->seeking_office = 'T.X. House';
                    break;
                    case 'TXSENATE':
                        $candidate->seeking_office = 'T.X. Senate';
                    break;
                }
                $candidate->which_district = trim($data[1]) === 'NA' ? '' : (int)$data[1];
                $candidate->email = trim($data[4]);
                if(isset($candidate->seeking_office)) {
                    $query = "SELECT * FROM candidates WHERE email='{$candidate->email}' AND first_name='{$candidate->first_name}' AND last_name='{$candidate->last_name}' AND seeking_office='{$candidate->seeking_office}'";
                    if(!$this->db->query($query)->result_id->num_rows) {
                        $query = 'INSERT INTO candidates (';
                        $query .= 'first_name, last_name, seeking_office, which_district, email)';
                        $query .= " VALUES ('{$candidate->first_name}', '{$candidate->last_name}', '{$candidate->seeking_office}', '{$candidate->which_district}', '{$candidate->email}')";
                        $res = $this->db->query($query);
                        print_r($query);
                        var_dump($res);
                    }
                }
            }
            fclose($handle);
        }
    }
}
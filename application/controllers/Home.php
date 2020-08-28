<?php
// use \DrewM\MailChimp\MailChimp;
//Include required PHPMailer files
	require FCPATH.'/application/helpers/MailChimp.php';
//Define name spaces
	use \DrewM\MailChimp\MailChimp;

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->lang->load('landing_lang', 'english');

        if($this->session->userdata('language') == '' || $this->session->userdata('language') == 'english') {

            $this->session->set_userdata('language', 'english');
            $this->lang->load('landing_lang', 'english');

        } else {
            $this->lang->load('landing_lang', 'spanish');
        }

        $this->cardShareDetails = [
            1 => [
                'title' => 'How to Fix Gerrymandering:',
                'description' => 'Every 10 years after a census, our elected officials, in both parties, draw district lines around voters to skew elections in their favor.',
                'url' => base_url().'?EndGerrymandering',
                'image' => base_url().'assets/images/fbImg1.png'
            ],
            2 => [
                'title' => 'Why Vote by Mail is A Good Thing:',
                'description' => 'Current restrictions on absentee voting prevent many Texans from voting. This year an unprecedented number will be affected. Voters should never be forced to choose between their right to vote and their health and the health of others.',
                'url' => base_url().'?VoteByMail',
                'image' => base_url().'assets/images/fbImg2.png'
            ],
            3 => [
                'title' => 'Why the Origin of Laws Should Be Transparent:',
                'description' => 'Corporations have created “Bill Factories” where they write one bill, then create copies for individual states, which legislators pass while concealing the origins and authorship from the public.',
                'url' => base_url().'?RevealtheWriters',
                'image' => base_url().'assets/images/fbImg3.png'
            ],
            4 => [
                'title' => 'Why Texas Votes Should Be Secure & Backed Up:',
                'description' => 'Malfunctions and vulnerabilities plague our archaic voting systems, leaving Texans with no paper backup and no way to verify the accuracy and security of our vote.',
                'url' => base_url().'?ModernizeElections',
                'image' => base_url().'assets/images/fbImg4.png'
            ],
            5 => [
                'title' => 'How to Solve Party Polarization:',
                'description' => "Conventional elections create party polarization and leave voters dissatisfied with their choice of candidates and 'winners' who didn't receive majority support.",
                'url' => base_url().'?RCV',
                'image' => base_url().'assets/images/fbImg5.png'
            ],
            6 => [
                'title' => 'How Texas Can Increase Voter Turnout:',
                'description' => "Polling location closures, limited polling options, and restrictive polling legislation create barriers for many Texans, denying them equal access to exercise their right to vote.",
                'url' => base_url().'?BantheBarriers',
                'image' => base_url().'assets/images/fbImg6.png'
            ],
            7 => [
                'title' => "Why Money Shouldn't Influence Our Laws:",
                'description' => "Paid lobbyists influence our elected officials with campaign donations, and lucrative job offers after they leave office. In exchange, while in office, politicians pass laws that favor the special interests of lobbyists.",
                'url' => base_url().'?LimittheLobbyists',
                'image' => base_url().'assets/images/fbImg7.png'
            ],
            8 => [
                'title' => "How Texas Should Register to Vote:",
                'description' => "Our outdated voter registration system results in errors, inefficiencies and wasted taxpayer dollars that fuel partisan disputes over the integrity of voter rolls.",
                'url' => base_url().'?RethinkRegistration',
                'image' => base_url().'assets/images/fbImg8.png'
            ],
            9 => [
                'title' => "Why Texas Should Have Publicly Funded Elections:",
                'description' => "Candidates need access to deep-pocketed donors  to run for office. As a result, those who are elected typically serve those wealthy donors rather than the people they represent.",
                'url' => base_url().'?CleanUpElections',
                'image' => base_url().'assets/images/fbImg9.png'
            ],
            10 => [
                'title' => "Why Texas Needs to Pay More Attention:",
                'description' => "Public engagement and knowledge about state and the federal politics are at an all-time low allowing the continued corruption in our state's elections.",
                'url' => base_url().'?TuneinTexas',
                'image' => base_url().'assets/images/fbImg10.png'
            ],
            'default' => [
                'title' => 'Texas2020 Voter Guide',
                'description' => "For all of us just waking up to politics, we created a fun, non-partisan guide for all of us to be informed voters in Texas 2020.",
                'url' => base_url(),
                'image' => base_url().'assets/images/fb_final_share_image_200.png'
            ],
            'instruction' => [
                'title' => '10 simple ways to make a difference',
                'description' => "Swipe or scroll through the 10 ways we can help save our democracy in Texas.",
                'url' => base_url().'/?10-4Texas',
                'image' => base_url().'assets/images/instruction_share.png'
            ]
        ];

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

    public function index() {
        if(isset($_SESSION['showInstruction']) && $_SESSION['showInstruction']['time'] + 900 > time()) {
            $showInstruction = $_SESSION['showInstruction']['status'];
        } else {
            unset($_SESSION['showInstruction']);
            $showInstruction = true;
        }

        $cardShareDetails = $this->cardShareDetails['default'];

        $card_to_share = $_SERVER['QUERY_STRING'];

        switch ($card_to_share) {
            case 'EndGerrymandering':
                $card_to_share_id = 1;
                break;
            case 'VoteByMail':
                $card_to_share_id = 2;
                break;
            case 'RevealtheWriters':
                $card_to_share_id = 3;
                break;
            case 'ModernizeElections':
                $card_to_share_id = 4;
                break;
            case 'RCV':
                $card_to_share_id = 5;
                break;
            case 'BantheBarriers':
                $card_to_share_id = 6;
                break;
            case 'LimittheLobbyists':
                $card_to_share_id = 7;
                break;
            case 'RethinkRegistration':
                $card_to_share_id = 8;
                break;
            case 'CleanUpElections':
                $card_to_share_id = 9;
                break;
            case 'TuneinTexas':
                $card_to_share_id = 10;
                break;
            case '10-4Texas':
                $card_to_share_id = 'instruction';
                break;
            default:
                $card_to_share_id = 'default';
                break;
        }

        $cardShareDetails = $this->cardShareDetails[$card_to_share_id];

        $video_links = $this->db->select('*')->from('video_links')->where('link IS NOT NULL', null, false)->order_by('id',"ASC")->get()->result();
        // We want the embed versions of the links
        foreach($video_links as $v) {
            $v->link = str_replace(['https://youtu.be/', 'https://www.youtube.com/watch?v='], 'https://www.youtube.com/embed/', $v->link);
        }
        // map video links array to IDs for easy access
        $video_links = array_combine(array_map(function($value){return $value->id;}, $video_links), $video_links);

        $this->load->view('landing', ['cardShareDetails' => $cardShareDetails, 'showInstruction' => $showInstruction, 'video_links' => $video_links, 'indexName' => $this->getVoteImg()]);
    }

    public function lookupVideoLink($id) {
        $video_link = $this->db->select('id, title, link, short_title')->from('video_links')->where('id', $id)->get()->result()[0];
        echo json_encode($video_link);
    }

    public function ShowInstructions() {
        $this->session->set_userdata("showInstruction", ['status' => $this->input->post('show'), 'time' => time()]);
    }

    public function SlideIndex($index) {
        // $this->session->set_userdata('index', $this->input->post('index'));;
        $cardShareDetails = $this->cardShareDetails[$index];
        $this->load->view('pageMeta', ['cardShareDetails' => $cardShareDetails]);
    }

    public function changeLanguage() {

        $this->load->helper('language');

        if ($this->input->post('language') == "english") {
            $this->lang->load('landing_lang','english');
        }
        else if ($this->input->post('language') == "spanish") {
            $this->lang->load('landing_lang','spanish');
        }

        $this->session->set_userdata('language', $this->input->post('language'));
        
        $all_lang_array = $this->lang->language;

        echo json_encode($all_lang_array);
    }

    public function getAddressInfo() {

        if (isset($_POST['address']) || isset($_POST['zipcode'])){

            $url_parameter = "";

            if($_POST['address'] != "") {

                $url_parameter .= "address=".$_POST['address'];
            }

            if ($_POST['zipcode'] != "") {
                $url_parameter .="&zipcode=".$_POST['zipcode'];
            }

            if(strlen($_POST['zipcode']) == 5) {

                $url = "https://usgeocoder.com/api/get_info.php?address=".$_POST['address']."&zipcode=".$_POST['zipcode']."&authkey=2f372a00237e6e114eb954d93ba947bf";

                $xml = simplexml_load_file($url);

                if($xml->request_status->request_status_code != "Invalid")

                {
                    if($xml->request_status->request_status_code == "NoMatch") {

                        $resultArr = [
                            'status' => 'error',
                            'errorText' => "There is no match found for {$_POST['address']} in {$_POST['city']} with this zip code {$_POST['zipcode']}",
                        ];

                    }else{

                        if($xml->request_status->request_status_code=="ZipMatch") {
                            $resultArr = [
                                'status' => 'error',
                                'errorText' => "There is no match found for {$_POST['address']} in {$_POST['city']} with this zip code {$_POST['zipcode']}",
                            ];
                        }
                        else if( $_POST['address'] == $xml->address_info->street) {
                            // $resultArr = [
                            //     'status' => 'error',
                            //     'errorText' => 'Please try this "'.$xml->address_info->street.'" address',
                            // ];

                            if(strlen($_POST['zipcode']) == 5 || strlen($_POST['zipcode']) == 9 || strlen($_POST['zipcode']) == 10) {

                                if(strlen($_POST['zipcode']) == 10) {


                                    if( $_POST['zipcode'][5] != "-" || strpos($_POST['zipcode'], '-') === false ) {

                                        $resultArr = array();
                                        $resultArr['result'] = "<p class='districtMachineError'>Please enter your correct Zip Code.</p>";
                                        $resultArr['success'] = 0;
                                        $resultArr['zip_error'] = 1;
                                        exit;
                                    }
                                }

                            $url_parameter = "&zipcode=".substr($_POST['zipcode'], 0, 5);

                            $url = "https://www.usgeocoder.com/api/get_info.php?".$url_parameter."&authkey=0fd192b5d12f6689c953680ecc10355f";
                            $xml = simplexml_load_file($url);

                            if($xml->request_status->request_status_code != "Invalid")

                            {

                                if($xml->request_status->request_status_code == "NoMatch"){

                                    $result['result'] .= '<p>Neither street address nor zip code was found.</p>';
                                    $result['success'] = 0;

                                }else{

                                    $congressional_district_name=$xml->jurisdictions_info->congressional_legislators->congressional_district->congressional_district_name;
                                    $congressional_district_id=$xml->jurisdictions_info->congressional_legislators->congressional_district_id->congressional_district_id_value;

                                    $state_upper_house_district_1_name=$xml->jurisdictions_info->state_legislation->state_upper_house_district_1->state_upper_house_district_1_name;
                                    $state_upper_house_district_1_id_value=$xml->jurisdictions_info->state_legislation->state_upper_house_district_1_id->state_upper_house_district_1_id_value;
                                    $state_lower_house_district_1_name=$xml->jurisdictions_info->state_legislation->state_lower_house_district_1->state_lower_house_district_1_name;
                                    $state_lower_house_district_1_id_value=$xml->jurisdictions_info->state_legislation->state_lower_house_district_1_id->state_lower_house_district_1_id_value;

                                    $res=array();

                                    $res['congressional_district_name'] = $congressional_district_name;
                                    $res['congressional_district_id'] = ltrim($congressional_district_id, '0');

                                    $res['state_lower_house_district_1_name'] = $state_lower_house_district_1_name;
                                    $res['state_lower_house_district_1_id_value'] = ltrim($state_lower_house_district_1_id_value, '0');

                                    $res['state_upper_house_district_1_name'] = $state_upper_house_district_1_name;
                                    $res['state_upper_house_district_1_id_value'] = ltrim($state_upper_house_district_1_id_value, '0');

                                    $resultArr = array();

                                    $resultArr['status'] = "showDistricts";
                                    $resultArr['us_house_district'] = $res['congressional_district_id'];
                                    $resultArr['texas_house_district'] = $res['state_lower_house_district_1_id_value'];
                                    $resultArr['texas_senate_district'] = $res['state_upper_house_district_1_id_value'];
                                }

                            }else{

                                $result['result'] = '<p>Please Try Again.</p>';
                                $result['success'] = 0;

                                echo json_encode($result);
                            }

                        } else {

                            $result['result'] = "<p class='districtMachineError'>Please enter your correct Zip Code.</p>";
                            $result['success'] = 0;
                            $result['zip_error'] = 1;

                            echo json_encode($result);
                        }

                        }
                        else {
                            $resultArr = [
                                'status' => 'success',
                                'address' => $xml->address_info->street,
                                'city' => $xml->address_info->city,
                                'zip' => $xml->address_info->zip5,
                                'state' => $xml->address_info->state,
                            ];
                        }
                    }
                    echo json_encode($resultArr);
                }
                else{

                    $resultArr = [
                        'status' => 'error'
                    ];

                    echo json_encode($resultArr);
                }
            } else {

                $resultArr = [
                    'status' => 'error',
                    'errorText' => "You can use only 5 digit Zip Code.",
                ];

                echo json_encode($resultArr);
            }
        } else {

        echo json_encode(array('success' => 0));

    }

    exit;
    }

    public function getDistrictInfo() {

        if(isset($_POST['address']) || isset($_POST['zipcode'])){

            $url_parameter="";

            if($_POST['address']!=""){

                $url_parameter .="address=".$_POST['address'];
            }

            if($_POST['zipcode']!=""){

                $url_parameter .="&zipcode=".$_POST['zipcode'];
            }

            if(strlen($_POST['zipcode']) == 5 || strlen($_POST['zipcode']) == 9 || strlen($_POST['zipcode']) == 10) {

                if(strlen($_POST['zipcode']) == 10) {

                    if( $_POST['zipcode'][5] != "-" || strpos($_POST['zipcode'], '-') === false ) {

                        $resultArr = array();
                        $resultArr['result'] ="<p class='districtMachineError'>Please enter your correct Zip Code.</p>";
                        $resultArr['success'] = 0;
                        $resultArr['zip_error'] = 1;

                        echo json_encode($resultArr);

                        exit;
                    }
                }

                $url_parameter = "&zipcode=".substr($_POST['zipcode'], 0, 5);
                $url = "https://www.usgeocoder.com/api/get_info.php?".$url_parameter."&authkey=0fd192b5d12f6689c953680ecc10355f";
                $xml = simplexml_load_file($url);

                if($xml->request_status->request_status_code!="Invalid")
                {

                    if($xml->request_status->request_status_code=="NoMatch"){

                        $result['result'] .= '<p>Neither street address nor zip code was found.</p>';
                        $result['success'] = 0;

                    }else{

                        $congressional_district_name=$xml->jurisdictions_info->congressional_legislators->congressional_district->congressional_district_name;
                        $congressional_district_id=$xml->jurisdictions_info->congressional_legislators->congressional_district_id->congressional_district_id_value;

                        $state_upper_house_district_1_name=$xml->jurisdictions_info->state_legislation->state_upper_house_district_1->state_upper_house_district_1_name;
                        $state_upper_house_district_1_id_value=$xml->jurisdictions_info->state_legislation->state_upper_house_district_1_id->state_upper_house_district_1_id_value;

                        $state_lower_house_district_1_name=$xml->jurisdictions_info->state_legislation->state_lower_house_district_1->state_lower_house_district_1_name;
                        $state_lower_house_district_1_id_value=$xml->jurisdictions_info->state_legislation->state_lower_house_district_1_id->state_lower_house_district_1_id_value;

                        $res=array();

                        $res['congressional_district_name'] = $congressional_district_name;
                        $res['congressional_district_id'] = ltrim($congressional_district_id, '0');

                        $res['state_lower_house_district_1_name'] = $state_lower_house_district_1_name;
                        $res['state_lower_house_district_1_id_value'] = ltrim($state_lower_house_district_1_id_value, '0');
                        $res['state_upper_house_district_1_name'] = $state_upper_house_district_1_name;
                        $res['state_upper_house_district_1_id_value'] = ltrim($state_upper_house_district_1_id_value, '0');

                        $resultArr = array();
                        $resultArr['us_house_district'] = $res['congressional_district_id'];
                        $resultArr['texas_house_district'] = $res['state_lower_house_district_1_id_value'];
                        $resultArr['texas_senate_district'] = $res['state_upper_house_district_1_id_value'];

                        echo json_encode($resultArr);
                    }

                }else{

                    $result['result'] ='<p>Please Try Again.</p>';
                    $result['success']=0;

                    echo json_encode($result);
                }
            } else {

                $result['result'] ="<p class='districtMachineError'>Please enter your correct Zip Code.</p>";
                $result['success']=0;
                $result['zip_error']=1;

                echo json_encode($result);
            }

        } else {
            echo json_encode(array('success' => 0));
        }

        exit;
    }

    public function subscribeMailToMailChimp() {

        $MailChimp = new MailChimp('79c7b3cbe4a14c3a3bc3af171e753aca-us4');

        $list_id = 'c9c971ba69';

        $result = $MailChimp->post("lists/$list_id/members", [
            'email_address' => $this->input->post('mail'),
            'status'        => 'subscribed',
        ]);
    }

    public function activists()
    {
        $this->load->view('activists');

    }

    public function activistMailToMailChimp() {

        $MailChimp = new MailChimp('79c7b3cbe4a14c3a3bc3af171e753aca-us4');

        $list_id = 'aee0af3431';

        $result = $MailChimp->post("lists/$list_id/members", [
            'email_address' => $this->input->post('mail'),
            'status'        => 'subscribed',
        ]);

    }

    public function userVote(){
        
        $voter = $this->db->select('*')->from('users_votes')->where('ip', $this->get_client_ip())->get()->result_array();

        if (empty($voter)) {

            $prevJson = [];
            
            $prevJson[$this->input->post('question')] = $this->input->post('answer');

            $newJson = json_encode($prevJson);

            $PublicIP = $this->get_client_ip();
            $details = file_get_contents("https://api.snoopi.io/$PublicIP");
            $details  =  json_decode($details ,true);

            $data = array(
                'answers' => $newJson,
                'ip' =>  $PublicIP,
                'created_at' => date('Y-m-d H:i:s'),
                'city' => $details['City'],
                'state' => $details['State']
            );

            $this->db->insert('users_votes', $data);

        }
        else {

            $voter = $voter[0];

            $prevJson = json_decode($voter['answers'],true);
            $prevJson[$this->input->post('question')] = $this->input->post('answer');

            $newJson = json_encode($prevJson);

            $data = array(
                'answers' => $newJson,
            );

            $this->db->set($data);
            $this->db->where('ip', $this->get_client_ip());
            $this->db->update('users_votes');
        }
    }

    public function viewSummary() {

        $votes = $this->db->select('*')->from('users_votes')->where('ip', $this->get_client_ip())->get()->result_array();
        $answers = !empty($votes) ? json_decode($votes[0]['answers'], true) : [];

        $this->load->view('summary', ['answers' => $answers]);
    }

    public function getVoteImg() {
        $res = $this->db->select('img_name')->from('vote_img')->where('ip', $this->get_client_ip())->get()->result_array();

        return isset($res[0]) ? $res[0]['img_name'] : 'empty';
    }

    public function saveVoteImg($filename) {
        if($this->getVoteImg() === 'empty') {
            $this->db->insert('vote_img', ['ip' => $this->get_client_ip(), 'img_name' => $filename]);
        } else {
            $this->db->where('ip', $this->get_client_ip());
            $this->db->update('vote_img', ['img_name' => $filename]);
        }
    }

    public function SaveVoteImage() {

        $uploadPath     = getcwd() . '/assets/images/voteShare/';
        $base64         = $this->input->post('base64');
        $image_parts    = explode(";base64,", $base64);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type     = $image_type_aux[1];
        $image_base64   = base64_decode($image_parts[1]);
        $name           = md5(time());
        $filename       = $name . ".{$image_type}";
        $file           = $uploadPath . $filename;
        $prevImg        = $uploadPath . $this->getVoteImg() . ".{$image_type}";

        if(file_exists($prevImg)) {
            unlink($prevImg);
        }

        $this->saveVoteImg($name);
        file_put_contents($file, $image_base64);

        echo json_encode(['indexName' => $name]);
    }

    public function VoteShare($index) {
        $this->load->view('pageMeta', ['cardShareDetails' => [
                'title' => 'My Take on Texas.',
                'description' => "I voted on the 10 Solutions for Texas. What's your take?",
                'url' => base_url().'?10-4Texas',
                'image' => base_url().'assets/images/voteShare/' . $index . '.png'
            ]
        ]);
    }

    public function candidate_survey_pdf() {
        $this->load->view('candidate_survey_pdf');
    }
}


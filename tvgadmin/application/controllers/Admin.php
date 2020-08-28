<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Include required PHPMailer files
	require FCPATH.'/application/helpers/PHPMailer.php';
	require FCPATH.'/application/helpers/SMTP.php';
	require FCPATH.'/application/helpers/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;


class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function dd($array) {
        print("<pre>");
        print_r($array);
        die;
    }

    public function get_admin(){
        $admin =  $this->db->select('admins.first_name,admins.last_name,admins.email,admins.image,admins.super_admin')->from('admins')->where('id', $this->session->userdata('adminID'))->get()->result_array();
        return $admin[0];
    }

    public function index() {
        if (!empty($this->session->userdata('adminID'))) {

            $candidates = $this->db->select('*')->from('test_candidates')->get()->result_array();
            $test_candidates = [];

            foreach ($candidates as &$candidate) {

                foreach (json_decode($candidate['data'],true) as $data) {
                    $test_candidates[] = $data;
                }
            }

            foreach ($test_candidates as &$test_candidate) {
                $election_reform = [
                    'gerrymandering' => $test_candidate['gerrymandering'],
                    'empower' => $test_candidate['empower'],
                    'ranked_choice' => $test_candidate['ranked_choice'],
                    'term' => $test_candidate['term'],
                    'auto_reg' => $test_candidate['auto_reg'],
                ];
                $money_in_politics = [
                    'LOBBING' => $test_candidate['LOBBING'],
                    'WHOWRITESOURLAWS' => $test_candidate['WHOWRITESOURLAWS'],
                    'CRIMINALIZE' => $test_candidate['CRIMINALIZE'],
                    'LIMIT' => $test_candidate['LIMIT'],
                    'CAMPAIGN' => $test_candidate['CAMPAIGN'],
                ];

                $test_candidate['election_reform'] = json_encode($election_reform);
                $test_candidate['money_in_politics'] = json_encode($money_in_politics);
            }

            $submitted_candidates = $this->db->select('*')->from('candidates')->where('admin_verify', 1)->order_by('created_at',"DESC")->get()->result_array();
            $voters = $this->db->select('*')->from('users_votes')->order_by('id',"DESC")->get()->result_array();

            $admins = $this->db->select('*')->from('admins')->where('id !=', $this->session->userdata('adminID'))->order_by('id',"DESC")->get()->result_array();

            // Define answers counts for Issue Tally

            $end_gerry_total = 0;
            $end_gerry_total_agree = 0;
            $end_gerry_total_disagree = 0;
            $end_gerry_total_neither = 0;

            $vote_by_mail_total = 0;
            $vote_by_mail_total_agree = 0;
            $vote_by_mail_total_disagree = 0;
            $vote_by_mail_total_neither = 0;

            $reval_writers_total = 0;
            $reval_writers_total_agree = 0;
            $reval_writers_total_disagree = 0;
            $reval_writers_total_neither = 0;

            $modern_election_total = 0;
            $modern_election_total_agree = 0;
            $modern_election_total_disagree = 0;
            $modern_election_total_neither = 0;

            $rank_candidate_total = 0;
            $rank_candidate_total_agree = 0;
            $rank_candidate_total_disagree = 0;
            $rank_candidate_total_neither = 0;

            $ban_barriers_total = 0;
            $ban_barriers_total_agree = 0;
            $ban_barriers_total_disagree = 0;
            $ban_barriers_total_neither = 0;

            $limit_lob_total = 0;
            $limit_lob_total_agree = 0;
            $limit_lob_total_disagree = 0;
            $limit_lob_total_neither = 0;

            $reth_reg_total = 0;
            $reth_reg_total_agree = 0;
            $reth_reg_total_disagree = 0;
            $reth_reg_total_neither = 0;

            $clean_up_total = 0;
            $clean_up_total_agree = 0;
            $clean_up_total_disagree = 0;
            $clean_up_total_neither = 0;

            $tune_in_texas_total = 0;
            $tune_in_texas_total_agree = 0;
            $tune_in_texas_total_disagree = 0;
            $tune_in_texas_total_neither = 0;

            foreach ($submitted_candidates as &$candidate) {
                $candidateAgreeCount = 0;
                $candidateDisAgreeCount = 0;
                $candidateNeitherCount = 0;
                $candidateSkippedCount = 0;

                $issues = json_decode($candidate['issues'],true) ? json_decode($candidate['issues'],true) : [];

                foreach ($issues as $key => $issue) {
                    if (strpos($key, 'answer') !== false) {
                        if ($issue == "agree") {
                            $candidateAgreeCount++;

                            if ($key == 'end_gerry_answer') {
                                $end_gerry_total_agree++;
                            }else if($key == 'vote_by_mail_answer') {
                                $vote_by_mail_total_agree++;
                            }else if ($key == 'reval_writers_answer') {
                                $reval_writers_total_agree++;
                            }else if ($key == 'modern_election_answer') {
                                $modern_election_total_agree++;
                            }else if ($key == 'rank_candidate_answer') {
                                $rank_candidate_total_agree++;
                            }else if ($key == 'ban_barriers_answer') {
                                $ban_barriers_total_agree++;
                            }else if ($key == 'limit_lob_answer') {
                                $limit_lob_total_agree++;
                            }else if ($key == 'reth_reg_answer') {
                                $reth_reg_total_agree++;
                            }else if ($key == 'clean_up_answer') {
                                $clean_up_total_agree++;
                            }else if ($key == 'tune_in_texas_answer') {
                                $tune_in_texas_total_agree++;
                            }else {
                                // Nothing to do
                            }
                        }
                        else if($issue == "disagree") {
                            $candidateDisAgreeCount++;

                            if ($key == 'end_gerry_answer') {
                                $end_gerry_total_disagree++;
                            }else if($key == 'vote_by_mail_answer') {
                                $vote_by_mail_total_disagree++;
                            }else if ($key == 'reval_writers_answer') {
                                $reval_writers_total_disagree++;
                            }else if ($key == 'modern_election_answer') {
                                $modern_election_total_disagree++;
                            }else if ($key == 'rank_candidate_answer') {
                                $rank_candidate_total_disagree++;
                            }else if ($key == 'ban_barriers_answer') {
                                $ban_barriers_total_disagree++;
                            }else if ($key == 'limit_lob_answer') {
                                $limit_lob_total_disagree++;
                            }else if ($key == 'reth_reg_answer') {
                                $reth_reg_total_disagree++;
                            }else if ($key == 'clean_up_answer') {
                                $clean_up_total_disagree++;
                            }else if ($key == 'tune_in_texas_answer') {
                                $tune_in_texas_total_disagree++;
                            }else {
                                // Nothing to do
                            }
                        }
                        else if ($issue == "neither") {
                            $candidateNeitherCount++;

                            if ($key == 'end_gerry_answer') {
                                $end_gerry_total_neither++;
                            }else if($key == 'vote_by_mail_answer') {
                                $vote_by_mail_total_neither++;
                            }else if ($key == 'reval_writers_answer') {
                                $reval_writers_total_neither++;
                            }else if ($key == 'modern_election_answer') {
                                $modern_election_total_neither++;
                            }else if ($key == 'rank_candidate_answer') {
                                $rank_candidate_total_neither++;
                            }else if ($key == 'ban_barriers_answer') {
                                $ban_barriers_total_neither++;
                            }else if ($key == 'limit_lob_answer') {
                                $limit_lob_total_neither++;
                            }else if ($key == 'reth_reg_answer') {
                                $reth_reg_total_neither++;
                            }else if ($key == 'clean_up_answer') {
                                $clean_up_total_neither++;
                            }else if ($key == 'tune_in_texas_answer') {
                                $tune_in_texas_total_neither++;
                            }else {
                                // Nothing to do
                            }
                        }
                        else if($issue == "skip"){
                            $candidateSkippedCount++;
                        }
                    }
                }

                $end_gerry_total++;
                $vote_by_mail_total++;
                $reval_writers_total++;
                $modern_election_total++;
                $rank_candidate_total++;
                $ban_barriers_total++;
                $limit_lob_total++;
                $reth_reg_total++;
                $clean_up_total++;
                $tune_in_texas_total++;


                $candidate['candidateAgreeCount'] = $candidateAgreeCount;
                $candidate['candidateDisAgreeCount'] = $candidateDisAgreeCount;
                $candidate['candidateNeitherCount'] = $candidateNeitherCount;
                $candidate['candidateSkippedCount'] = $candidateSkippedCount;
            }

            $issues_tally_data = [];

            $end_gerry_stats_arry = [
                'title' => 'END GERRYMANDERING',
                'total' => $end_gerry_total,
                'agree_total' => $end_gerry_total_agree,
                'agree_percent' => $end_gerry_total ? round( $end_gerry_total_agree / $end_gerry_total  * 100, 1) : 0,
                'disagree_total' => $end_gerry_total_disagree,
                'disagree_percent' => $end_gerry_total ? round( $end_gerry_total_disagree / $end_gerry_total  * 100, 1) : 0,
                'neither_total' => $end_gerry_total_neither,
                'neither_percent' => $end_gerry_total ? round( $end_gerry_total_neither / $end_gerry_total  * 100, 1) : 0
            ];
            array_push($issues_tally_data, $end_gerry_stats_arry);

            $vote_by_mail_stats_arry = [
                'title' => 'VOTE BY MAIL',
                'total' => $vote_by_mail_total,
                'agree_total' => $vote_by_mail_total_agree,
                'agree_percent' => $vote_by_mail_total ? round( $vote_by_mail_total_agree / $vote_by_mail_total  * 100, 1) : 0,
                'disagree_total' => $vote_by_mail_total_disagree,
                'disagree_percent' => $vote_by_mail_total ? round( $vote_by_mail_total_disagree / $vote_by_mail_total  * 100, 1) : 0,
                'neither_total' => $vote_by_mail_total_neither,
                'neither_percent' => $vote_by_mail_total ? round( $vote_by_mail_total_neither / $vote_by_mail_total  * 100, 1) : 0
            ];
            array_push($issues_tally_data, $vote_by_mail_stats_arry);

            $reval_writers_stats_arry = [
                'title' => 'REVEAL THE WRITERS',
                'total' => $reval_writers_total,
                'agree_total' => $reval_writers_total_agree,
                'agree_percent' => $reval_writers_total ? round( $reval_writers_total_agree / $reval_writers_total  * 100, 1) : 0,
                'disagree_total' => $reval_writers_total_disagree,
                'disagree_percent' => $reval_writers_total ? round( $reval_writers_total_disagree / $reval_writers_total  * 100, 1) : 0,
                'neither_total' => $reval_writers_total_neither,
                'neither_percent' => $reval_writers_total ? round( $reval_writers_total_neither / $reval_writers_total  * 100, 1) : 0
            ];
            array_push($issues_tally_data, $reval_writers_stats_arry);

            $modern_election_stats_arry = [
                'title' => 'MODERNIZE ELECTIONS',
                'total' => $modern_election_total,
                'agree_total' => $modern_election_total_agree,
                'agree_percent' => $reval_writers_total ? round( $modern_election_total_agree / $modern_election_total  * 100, 1) : 0,
                'disagree_total' => $modern_election_total_disagree,
                'disagree_percent' => $reval_writers_total ? round( $modern_election_total_disagree / $modern_election_total  * 100, 1) : 0,
                'neither_total' => $modern_election_total_neither,
                'neither_percent' => $reval_writers_total ? round( $modern_election_total_neither / $modern_election_total  * 100, 1) : 0
            ];
            array_push($issues_tally_data, $modern_election_stats_arry);

            $rank_candidate_stats_arry = [
                'title' => 'RANK YOUR CANDIDATES',
                'total' => $rank_candidate_total,
                'agree_total' => $rank_candidate_total_agree,
                'agree_percent' => $reval_writers_total ? round( $rank_candidate_total_agree / $rank_candidate_total  * 100, 1) : 0,
                'disagree_total' => $rank_candidate_total_disagree,
                'disagree_percent' => $reval_writers_total ? round( $rank_candidate_total_disagree / $rank_candidate_total  * 100, 1) : 0,
                'neither_total' => $rank_candidate_total_neither,
                'neither_percent' => $reval_writers_total ? round( $rank_candidate_total_neither / $rank_candidate_total  * 100, 1) : 0
            ];
            array_push($issues_tally_data, $rank_candidate_stats_arry);

            $ban_barriers_stats_arry = [
                'title' => 'BAN THE BARRIERS',
                'total' => $ban_barriers_total,
                'agree_total' => $ban_barriers_total_agree,
                'agree_percent' => $ban_barriers_total ? round( $ban_barriers_total_agree / $ban_barriers_total  * 100, 1) : 0,
                'disagree_total' => $ban_barriers_total_disagree,
                'disagree_percent' => $ban_barriers_total ? round( $ban_barriers_total_disagree / $ban_barriers_total  * 100, 1) : 0,
                'neither_total' => $ban_barriers_total_neither,
                'neither_percent' => $ban_barriers_total ? round( $ban_barriers_total_neither / $ban_barriers_total  * 100, 1) : 0
            ];
            array_push($issues_tally_data, $ban_barriers_stats_arry);

            $limit_lob_stats_arry = [
                'title' => 'LIMIT THE LOBBYISTS',
                'total' => $limit_lob_total,
                'agree_total' => $limit_lob_total_agree,
                'agree_percent' => $limit_lob_total ? round( $limit_lob_total_agree / $limit_lob_total  * 100, 1) : 0,
                'disagree_total' => $limit_lob_total_disagree,
                'disagree_percent' => $limit_lob_total ? round( $limit_lob_total_disagree / $limit_lob_total  * 100, 1) : 0,
                'neither_total' => $limit_lob_total_neither,
                'neither_percent' => $limit_lob_total ? round( $limit_lob_total_neither / $limit_lob_total  * 100, 1) : 0
            ];
            array_push($issues_tally_data, $limit_lob_stats_arry);

            $reth_reg_stats_arry = [
                'title' => 'RETHINK REGISTRATION',
                'total' => $reth_reg_total,
                'agree_total' => $reth_reg_total_agree,
                'agree_percent' => $reth_reg_total ? round( $reth_reg_total_agree / $reth_reg_total  * 100, 1) : 0,
                'disagree_total' => $reth_reg_total_disagree,
                'disagree_percent' => $reth_reg_total ? round( $reth_reg_total_disagree / $reth_reg_total  * 100, 1) : 0,
                'neither_total' => $reth_reg_total_neither,
                'neither_percent' => $reth_reg_total ? round( $reth_reg_total_neither / $reth_reg_total  * 100, 1) : 0
            ];
            array_push($issues_tally_data, $reth_reg_stats_arry);

            $clean_up_stats_arry = [
                'title' => 'CLEAN UP ELECTIONS',
                'total' => $clean_up_total,
                'agree_total' => $clean_up_total_agree,
                'agree_percent' => $clean_up_total ? round( $clean_up_total_agree / $clean_up_total  * 100, 1) : 0,
                'disagree_total' => $clean_up_total_disagree,
                'disagree_percent' => $clean_up_total ? round( $clean_up_total_disagree / $clean_up_total  * 100, 1) : 0,
                'neither_total' => $clean_up_total_neither,
                'neither_percent' => $clean_up_total ? round( $clean_up_total_neither / $clean_up_total  * 100, 1) : 0
            ];
            array_push($issues_tally_data, $clean_up_stats_arry);

            $tune_in_texas_stats_arry = [
                'title' => 'TUNE IN TEXAS',
                'total' => $tune_in_texas_total,
                'agree_total' => $tune_in_texas_total_agree,
                'agree_percent' => $tune_in_texas_total ? round( $tune_in_texas_total_agree / $tune_in_texas_total  * 100, 1) : 0,
                'disagree_total' => $tune_in_texas_total_disagree,
                'disagree_percent' => $tune_in_texas_total ? round( $tune_in_texas_total_disagree / $tune_in_texas_total  * 100, 1) : 0,
                'neither_total' => $tune_in_texas_total_neither,
                'neither_percent' => $tune_in_texas_total ? round( $tune_in_texas_total_neither / $tune_in_texas_total  * 100, 1) : 0
            ];
            array_push($issues_tally_data, $tune_in_texas_stats_arry);

            $this->load->view('Admin/adminDashboardTest', ["test_candidates" => $test_candidates, "submitted_candidates" => $submitted_candidates, "voters" => $voters, "admin" => $this->get_admin(), "admins" => $admins, 'issues_tally_data' => $issues_tally_data]);
        }
        else {
            return redirect('admin');
        }     
    }

    public function blogList() {
        if (!empty($this->session->userdata('adminID'))) {
            $admins = $this->db->select('*')->from('admins')->where('id !=', $this->session->userdata('adminID'))->order_by('id',"DESC")->get()->result_array();
            $this->load->view('Admin/blog_list', ["admins" => $admins, "admin" => $this->get_admin()]);
        }
        else {
            return redirect('admin');
        }
    }

    public function cleanCandidates() {
        $this->db->empty_table('candidates');
    }

    public function editVideoLinksForm() {
        if (empty($this->session->userdata('adminID'))) {
            return redirect('admin');
        } else {
            $admins = $this->db->select('*')->from('admins')->where('id !=', $this->session->userdata('adminID'))->order_by('id',"DESC")->get()->result_array();
            $video_links = $this->db->select('*')->from('video_links')->order_by('id',"ASC")->get()->result();
            $this->load->view('editVideoLinks', ["video_links" => $video_links, "admins" => $admins, "admin" => $this->get_admin()]);
        }
    }

    public function updateVideoLinks() {
        if (empty($this->session->userdata('adminID'))) {
            return redirect('admin');
        } else {
            // Update links in db
            for($i = 1; $i <= 10; $i++) {
                $this->db->update('video_links', ['link' => $_POST["link_$i"]], ['id'=>$i]);
            }

            // Generate new video sitemap
            $video_links = $this->db->select('*')->from('video_links')->where('link IS NOT NULL', null, false)->order_by('id',"ASC")->get()->result();

            $xml = new DOMDocument('1.0', 'utf-8');
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            $root = $xml->appendChild($xml->createElement('urlset'));
            $xml->createAttributeNS("http://www.sitemaps.org/schemas/sitemap/0.9", 'element');
            $xml->createAttributeNS("http://www.google.com/schemas/sitemap-video/1.1", "video:attr");

            foreach($video_links as $v) {
                $url = $root->appendChild($xml->createElement('url'));
                $url->appendChild($xml->createElement('loc', 'https://texas2020.org/'));
                $video = $url->appendChild($xml->createElement('video:video'));
                $video->appendChild($xml->createElement('video:thumbnail_loc', "https://texas2020.org/assets/images/fbImg{$v->id}.png"));
                $video->appendChild($xml->createElement('video:title', "{$v->title}... 10-4 Texas"));
                $video->appendChild($xml->createElement('video:description', $v->description));
                $video->appendChild($xml->createElement('video:player_loc', $v->link));
                $video->appendChild($xml->createElement('video:publication_date', date('Y-m-d')));
            }
            $xml->save(__DIR__.'/../../../sitemap_videos.xml');

            return redirect('admin/dashboard');
        }
    }

    public function loginPage() {
        if (!empty($this->session->userdata('adminID'))) {
            return redirect('admin/dashboard');
        }
        else {
            $this->load->view('adminLogin');
        }

    }

    public function login() {

        $admin = $this->db->select('*')->from('admins')->where('email',$this->input->post('email'))->get()->result_array()[0];

        if (!empty($admin)) {
            
            if (password_verify($this->input->post('password'), $admin['password'])) {
                $this->session->set_userdata('adminID', $admin['id']);
                return redirect('admin/dashboard');
            }
            else {
                $this->session->set_flashdata('admin_login_error', 'email or password is wrong!');
                $this->session->set_flashdata('email', $this->input->post('email'));
                return redirect($_SERVER['HTTP_REFERER']);
            }

        }
        else {
            $this->session->set_flashdata('admin_login_error', 'email or password is wrong!');
            $this->session->set_flashdata('email', $this->input->post('email'));
            return redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function logout() {
        $this->session->unset_userdata('adminID');
        return redirect('admin');
    }

    public function getAdmin() {
        $admin = $this->db->select('*')->from('admins')->where('id',$this->session->userdata('adminID'))->get()->result_array()[0];
        return $admin;
    }

    public function reset() {
        if (!empty($this->session->userdata('adminID'))) {
            return redirect('admin/dashboard');
        }
        else {
            $this->load->view('adminResetPassword');
        } 
    }

    public function resendEmail() {
        $admin = $this->db->select('*')->from('candidates')->where('id',$this->input->post('id'))->get()->result_array()[0];
        $toMail = $admin['email'];
        

        $id = $this->input->post('id');
        $verify_token = uniqid().time().md5($id);

        $data = array(
            'verify_token' =>  $verify_token,
        );

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('candidates');


        $mail = new PHPMailer();
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Set mailer to use smtp
            $mail->isSMTP();
        //Define smtp host
            $mail->Host = "smtp.gmail.com";
        //Enable smtp authentication
            $mail->SMTPAuth = true;
        //Set smtp encryption type (ssl/tls)
            $mail->SMTPSecure = "ssl";
        //Port to connect smtp
            $mail->Port = "465";
        //Set gmail username
            $mail->Username = "survey@texas2020.org";
        //Set gmail password
            $mail->Password = "WakeUp2020!";
        //Email subject
            $mail->Subject = "Reset Password";
        //Set sender email
            $mail->setFrom('survey@texas2020.com');
        //Enable HTML
            $mail->isHTML(true);

        //Email body
            $mail->Body = $this->load->view('adminResetPasswordContent.php',['verify_link' => $verify_link],true);
        //Add recipient
            $mail->addAddress($toMail);
        //Finally send email
        if ( $mail->send() ) {
            
        }else{
            echo "Message could not be sent.";
        }
        //Closing smtp connection
        $mail->smtpClose();
    }

    public function resetPassword() {

        $admin = $this->db->select('*')->from('admins')->where('email',$this->input->post('email'))->get()->result_array();

        if (!empty($admin)) {
            $admin = $admin[0];

            $verify_token = uniqid().time().md5($admin['id']);

            $data = array(
                'verify_token' =>  $verify_token,
            );

            $this->db->set($data);
            $this->db->where('id', $admin['id']);
            $this->db->update('admins');

            $verify_link = base_url().'admin/password/reset/'.$verify_token.'/'.$admin['id'];

            $toMail = $admin['email'];
            // print_r($toMail);
            // die;

            $mail = new PHPMailer();
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            //Set mailer to use smtp
            	$mail->isSMTP();
            //Define smtp host
            	$mail->Host = "smtp.gmail.com";
            //Enable smtp authentication
            	$mail->SMTPAuth = true;
            //Set smtp encryption type (ssl/tls)
            	$mail->SMTPSecure = "ssl";
            //Port to connect smtp
            	$mail->Port = "465";
            //Set gmail username
            	$mail->Username = "survey@texas2020.org";
            //Set gmail password
            	$mail->Password = "WakeUp2020!";
            //Email subject
            	$mail->Subject = "Reset Password";
            //Set sender email
            	$mail->setFrom('survey@texas2020.com');
            //Enable HTML
            	$mail->isHTML(true);

            //Email body
            	$mail->Body = $this->load->view('adminResetPasswordContent.php',['verify_link' => $verify_link],true);
            //Add recipient
            	$mail->addAddress($toMail);
            //Finally send email
        	if ( $mail->send() ) {
        		
        	}else{
                echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
        	}
            //Closing smtp connection
            $mail->smtpClose();
            
            return redirect(base_url().'admin/?mail_sent');
           
        }
        else {
            $this->session->set_flashdata('resetPasswordError', 'Wrong email!');
            return redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function resetPasswordFinal($verify_token, $id) {

        $admin = $this->db->select('*')
            ->where('id', $id)
            ->get('admins')->result_array()[0];

        if ($admin['verify_token'] == $verify_token) {
            $this->session->set_userdata('changePassAdminID', $id);
            return redirect('admin/set/new/password');
        }
        else {
            return redirect(base_url().'admin/?verify_error');
        }
    }

    public function newPassView() {
        $this->load->view('newPassword');
    }

    public function saveNewPassword() {

        $data = array(
            'password' =>  password_hash($this->input->post('new_password'), PASSWORD_BCRYPT),
        );

        $this->db->set($data);
        $this->db->where('id', $this->session->userdata('changePassAdminID'));
        $this->db->update('admins');

        $this->session->unset_userdata('changePassAdminID');

        return redirect(base_url().'admin/?verify_success');
    }

    public function editCandidate() {

        $editData = $this->input->post();
        unset($editData['id']);
    
        $test_candidates = $this->db->select('*')->from('test_candidates')->get()->result_array();

        foreach ($test_candidates as &$test_candidate) {
            $test_candidate_data = json_decode($test_candidate['data'],true);
            foreach ($test_candidate_data as &$data) {

                if($data['id'] == $this->input->post('id')) {

                    $data[array_keys($editData)[0]] = $editData[array_keys($editData)[0]];
                    
                    $data = array(
                        'data' => json_encode($test_candidate_data),
                    );
                    $this->db->set($data);
                    $this->db->where('id', $test_candidate['id']);
                    $this->db->update('test_candidates');
                }
            }    
        }
    }

    public function editCandidateAnswers() {

        $editData = $this->input->post();
        unset($editData['id']);

        $test_candidates = $this->db->select('*')->from('test_candidates')->get()->result_array();

        foreach ($test_candidates as &$test_candidate) {
            $test_candidate_data = json_decode($test_candidate['data'],true);
            foreach ($test_candidate_data as &$data) {

                if($data['id'] == $this->input->post('id')) {

                    foreach ($editData as $key => $value) {
                        $data[$key] = $value;
                    }

                    $data = array(
                        'data' => json_encode($test_candidate_data),
                    );
                    $this->db->set($data);
                    $this->db->where('id', $test_candidate['id']);
                    $this->db->update('test_candidates');
                }
            }    
        }
        
    }

    public function deleteTestCandidate() {

        $test_candidates = $this->db->select('*')->from('test_candidates')->get()->result_array();

        foreach ($test_candidates as &$test_candidate) {
            $test_candidate_data = json_decode($test_candidate['data'],true);
            foreach ($test_candidate_data as $key => &$data) {

                if($data['id'] == $this->input->post('id')) {

                    unset($test_candidate_data[$key]);

                    $data = array(
                        'data' => json_encode($test_candidate_data),
                    );
                    $this->db->set($data);
                    $this->db->where('id', $test_candidate['id']);
                    $this->db->update('test_candidates');
                }
            }    
        }

        
    }

    public function testCandidatePhoto() {
        if (!empty($_FILES)) {

            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = time().uniqid().$_FILES['file']['name'];
            $targetPath = getcwd() . '/assets/uploads/';
            $targetFile = $targetPath . $fileName ;
            move_uploaded_file($tempFile, $targetFile);

            $test_candidates = $this->db->select('*')->from('test_candidates')->get()->result_array();

            foreach ($test_candidates as &$test_candidate) {
                $test_candidate_data = json_decode($test_candidate['data'],true);
                foreach ($test_candidate_data as &$data) {

                    if($data['id'] == $this->input->post('id')) {

                        $data['local_profile_photo'] = base_url().'assets/uploads/'.$fileName;

                        $data = array(
                            'data' => json_encode($test_candidate_data),
                        );

                        $this->db->set($data);
                        $this->db->where('id', $test_candidate['id']);
                        $this->db->update('test_candidates');
                    }
                }    
            }

            echo (base_url().'assets/uploads/'.$fileName);
        }
    }

    public function submmitedCandidatePhoto() {
        if (!empty($_FILES)) {

            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = time().uniqid().$_FILES['file']['name'];
            $targetPath = getcwd() . '/assets/uploads/';
            $targetFile = $targetPath . $fileName ;
            move_uploaded_file($tempFile, $targetFile);


            $data = array(
                'local_profile_photo' => base_url().'assets/uploads/'.$fileName,
            );

            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('candidates');

            echo (base_url().'assets/uploads/'.$fileName);
        }
    }

    public function deleteSubmittedCandidate() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('candidates');
    }

    public function deleteVoters() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('voters');
    }

    public function officeChanger() {
        
 
        if ($this->input->post('office') == "All") {
           $candidatesCount = $this->db->select('*')->from('candidates')->where('active','1')->get()->num_rows();
        }
        else {
            $candidatesCount = $this->db->select('*')->from('candidates')->where('active','1')->where('seeking_office', $this->input->post('office'))->get()->num_rows();
        }

        // print("<pre>");
        // print_r($this->input->post('office'));die;

        $insert_item = $this->db->select('*')->from('candidates')->limit(1)->order_by('id',"DESC")->get()->result_array()[0];

        $result = [
            'insert_item' => $insert_item,
            'candidatesCount' => $candidatesCount
        ];

        echo(json_encode($result));
    }

    public function circleChartVoters() {

        
        $candidatesCount = $this->db->select('*')->from('voters')->get()->num_rows();
       

        $insert_item = $this->db->select('*')->from('voters')->limit(1)->order_by('id',"DESC")->get()->result_array()[0];

        $result = [
            'insert_item' => $insert_item,
            'candidatesCount' => $candidatesCount
        ];

        echo(json_encode($result));
    }

    public function getMounthData() {
        $yearStart = $this->input->post('year')."-01-01 00:00:00";
        $yearEnd = $this->input->post('year') + 1 ."-01-01 00:00:00";

        $candidates = $this->db->select('*')->from($this->input->post('dbTable'))->where("created_at >= ",  $yearStart)->where("created_at < ",  $yearEnd)->get()->result_array();

        $mounthResult = [
            'jan' => [],
            'fed' => [],
            'mar' => [],
            'apr' => [],
            'may' => [],
            'jun' => [],
            'jul' => [],
            'aug' => [],
            'sep' => [],
            'oct' => [],
            'nov' => [],
            'dec' => []
        ];

        foreach ($candidates as $key => $candidate) {

            if (substr($candidate['created_at'], 5,2) == "01") {
                array_push($mounthResult['jan'], $candidate); 
            }
            else if (substr($candidate['created_at'], 5,2) == "02") {
                array_push($mounthResult['fed'], $candidate); 
            }
            else if (substr($candidate['created_at'], 5,2) == "03") {
                array_push($mounthResult['mar'], $candidate); 
            }
            else if (substr($candidate['created_at'], 5,2) == "04") {
                array_push($mounthResult['apr'], $candidate); 
            }
            else if (substr($candidate['created_at'], 5,2) == "05") {
                array_push($mounthResult['may'], $candidate); 
            }
            else if (substr($candidate['created_at'], 5,2) == "06") {
                array_push($mounthResult['jun'], $candidate); 
            }
            else if (substr($candidate['created_at'], 5,2) == "07") {
                array_push($mounthResult['jul'], $candidate); 
            }
            else if (substr($candidate['created_at'], 5,2) == "08") {
                array_push($mounthResult['aug'], $candidate); 
            }
            else if (substr($candidate['created_at'], 5,2) == "09") {
                array_push($mounthResult['sep'], $candidate); 
            }
            else if (substr($candidate['created_at'], 5,2) == "10") {
                array_push($mounthResult['oct'], $candidate); 
            }
            else if (substr($candidate['created_at'], 5,2) == "11") {
                array_push($mounthResult['nov'], $candidate); 
            }
            else if (substr($candidate['created_at'], 5,2) == "12") {
                array_push($mounthResult['dec'], $candidate); 
            }
        }

        foreach ($mounthResult as &$item) {
           $item = count($item);
        }

        echo json_encode($mounthResult);
    }

    public function getMapData() {


        
        if ($this->input->post('section') == 'candidates') {
           $ipKey = 'candidateIP';
        }
        else {
            $ipKey = 'voterIP';
        }

        $submitted_candidates = $this->db->select('*')->from($this->input->post('section'))->order_by('id',"DESC")->get()->result_array();
        $plots = [];

        foreach ($submitted_candidates as $key => $item) {

            $lat = $item['latitude'];
            $lon = $item['longitude'];
            $city = explode(",", $item['geoLocation'])[0]; 

            $plots[$city] = [
                "latitude" => +$lat,
                "longitude" => +$lon,
                // "text" => [
                //     "content" => $details->city,
                // ],
            ];   
        }
        echo json_encode($plots);
    }

    public function editAdminData() {

      
          
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('firstName','First Name','trim|required');
        $this->form_validation->set_rules('lastName','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');


        
        if ($this->form_validation->run() == FALSE)
        {
            $error = array(
                'firstName' => form_error('firstName'),
                'lastName' => form_error('lastName'),
                'password' => form_error('password'),
                'email' => form_error('email'),
                'confirmPassword' => form_error('confirmPassword'),


            );

            echo json_encode($error);
        }
        else
        {

            $data = array(
                'first_name' => $this->input->post('firstName'),
                'last_name' => $this->input->post('lastName'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            );

            $this->db->set($data);
            $this->db->where('id', $this->session->userdata('adminID'));
            $this->db->update('admins');
        }
    }

    public function adminAvatarPhoto() {
        if (!empty($_FILES)) {

            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = time().uniqid().$_FILES['file']['name'];
            $targetPath = getcwd() . '/assets/uploads/';
            $targetFile = $targetPath . $fileName ;
            move_uploaded_file($tempFile, $targetFile);

            $data = array(
                'image' => base_url().'assets/uploads/'.$fileName,
            );

            $this->db->set($data);
            $this->db->where('id', $this->session->userdata('adminID'));
            $this->db->update('admins');
           

            echo (base_url().'assets/uploads/'.$fileName);
        }
    }

    public function editAdminsData() {

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE)
        {
            echo "error";
        }
        else
        {
            $data = array(
                'first_name' =>  $this->input->post('first_name'),
                'last_name' =>  $this->input->post('last_name'),
                'email' =>  $this->input->post('email'),
                'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'super_admin' => $this->input->post('adminType')
            );

            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('admins');                       
        }




    }

    public function deleteAdminAccount(){
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('admins');
    }

    public function adminsPhoto(){
        if (!empty($_FILES)) {

            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = time().uniqid().$_FILES['file']['name'];
            $targetPath = getcwd() . '/assets/uploads/';
            $targetFile = $targetPath . $fileName ;
            move_uploaded_file($tempFile, $targetFile);

            $data = array(
                'image' => base_url().'assets/uploads/'.$fileName,
            );

            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('admins');
           

            echo (base_url().'assets/uploads/'.$fileName);
        }
    }

    public function addAdmin(){

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            echo "error";
        } else {
            
            $data = array(
                'first_name' =>  $this->input->post('first_name'),
                'last_name' =>  $this->input->post('last_name'),
                'email' =>  $this->input->post('email'),
                'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'super_admin' => 0,
                'image' => "https://soheard.dev/dev/texas-voter-guide/assets/images/defaultAdmin.png",
                'super_admin' => $this->input->post('adminType')
            );

            $this->db->insert('admins', $data);
            $insert_id = $this->db->insert_id();

            echo $insert_id;   
        }
    }

    public function adminVerifyCandidate() {
       
        $data = array(
            'admin_verify' => 1,
            'active' => 1
        );

        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('candidates');
    }

    public function importCandidates() {
        $path = preg_replace('/application.?controllers$/', 'assets/files/', __DIR__);
        $fileName = $path . $_FILES['upload']['name'];

        if(file_exists($fileName)) {
            unlink($fileName);
        };

        if(move_uploaded_file($_FILES['upload']['tmp_name'], $fileName)) {
            if (file_exists($fileName) && ($handle = fopen($fileName, 'r')) !== FALSE) {

                $candidates_from_csv_count = 0;
                $duplicated_candidates_count = 0;
                $duplicated_candidates_data = [];
                $imported_candidates_count = 0;
                $not_duplicated_candidates_data = [];

                $duplicated_candidates_ids = [];

                $insert_batch_array = [];

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

                    $candidates_from_csv_count++;

                    if(isset($candidate->seeking_office)) {
                        $query = "
                            SELECT * FROM candidates
                            WHERE (
                                first_name = '{$candidate->first_name}' 
                                AND last_name = '{$candidate->last_name}' 
                                AND seeking_office = '{$candidate->seeking_office}' 
                                AND (which_district = '{$candidate->which_district}' OR which_district = '0{$candidate->which_district}')
                            )
                            OR (
                                first_name = '{$candidate->first_name}' 
                                AND seeking_office = '{$candidate->seeking_office}' 
                                AND (which_district = '{$candidate->which_district}' OR which_district = '0{$candidate->which_district}')
                            )
                            OR (
                                last_name = '{$candidate->last_name}' 
                                AND seeking_office = '{$candidate->seeking_office}' 
                                AND (which_district = '{$candidate->which_district}' OR which_district = '0{$candidate->which_district}')
                            )
                        ";

                        if(!$this->db->query($query)->result_id->num_rows) {

                            $imported_candidates_count++;

                            if ($candidate->email == 'Missing') {
                                $candidate->email = '';
                            }

                            $insert_batch_array[] = [
                                'first_name' => $candidate->first_name,
                                'last_name' => $candidate->last_name,
                                'seeking_office' => $candidate->seeking_office,
                                'which_district' => $candidate->which_district
                            ];

                        }else {
                            $duplicated_candidates_ids[] = $this->db->query($query)->result()[0]->id;
                            $duplicated_candidates_count++;
                            $duplicated_candidates_data[] = $candidate;
                        }
                    }
                }

                $this->db->insert_batch('candidates', $insert_batch_array);

                fclose($handle);
                unlink($fileName);

                echo json_encode(array('success' => true, 'msg' => 'Candidates are imported'));
            }
        }
    }

}

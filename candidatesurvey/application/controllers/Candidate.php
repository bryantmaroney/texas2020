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

class Candidate extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->database();

        $this->load->library('session');
        date_default_timezone_set('America/Chicago');
    }

    function get_client_ip() {
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
	
    public function step3Save() {
        $this->session->set_userdata("issues", json_encode($this->input->post()));
    }

    public function step2Save() {
        $this->session->set_userdata($this->input->post());
    }

    public function sendMailToAllAdmins($data) {
        $admins = $this->db->select('*')->get('admins')->result_array();
        foreach ($admins as $key => $admin) {

            if ($admin['email'] !== 'AGnaedinger@commoncause.org' && $admin['email'] !== 'AGutierrez@commoncause.org' && $admin['email'] !== 'AGnadinger@commoncause.org') {

                $toMail = $admin['email'];
                $mail = new PHPMailer();
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->Port = "465";
                $mail->Username = "survey@texas2020.org";
                $mail->Password = "WakeUp2020!";
                $mail->Subject = "New Candidate Sign Up";
                $mail->setFrom('survey@texas2020.com');
                $mail->isHTML(true);
                $mail->Body = $this->load->view('candidateRegistred', ['data' => $data], true);
                $mail->addAddress($toMail);
                if ( $mail->send() ) {

                }else{
                    echo "Message could not be sent.";
                }
                $mail->smtpClose();

            }
        }
    }

    public function verification() {

        $toMail = $this->input->post('email');

        $PublicIP = $this->get_client_ip();
        $details = file_get_contents("https://api.snoopi.io/$PublicIP");
        $details  =  json_decode($details ,true);

        $data = array(
            'first_name'=> $this->session->userdata('first_name'),
            'last_name'=>   $this->session->userdata('last_name'),
            'seeking_office' => $this->session->userdata('selected_office'),
            'which_district' => $this->session->userdata('which_district'),
            'local_profile_photo' => $this->session->userdata('local_profile_photo'),
            'active' => 0,
            'email' => $toMail,
            'created_at' => date("Y-m-d H:i:s"),
            'candidateIP' => $this->get_client_ip(),
            'issues' => $this->session->userdata('issues'),
            'geoLocation' => $details['City'].", ".$details['State'],
            'latitude' => $details['Latitude'],
            'longitude' => $details['Longitude'],
            'response_status' => 'responded'
        );

        $where = array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'seeking_office' => $data['seeking_office'],
            'which_district' => $data['which_district']
        );

        $res = $this->db->get_where('candidates', $where)->result_array();
        if(isset($res[0])) {
            $id = $res[0]['id'];
            $this->db->where($where);
            $res = $this->db->update('candidates', $data);
        } else {
            $res = $this->db->insert('candidates',$data);
            $id = $this->db->insert_id();
        }

        $this->session->set_userdata("resendID", $id);

        // $id = $this->input->post('id');
        $verify_token = uniqid().time().md5($id);
        $data = array(
            'verify_token' =>  $verify_token,
        );

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('candidates');

        $verify_link = base_url().'candidate/verify/'.$verify_token.'/'.$id;

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
            $mail->Subject = "Candidate Verification";
        //Set sender email
            $mail->setFrom('survey@texas2020.com');
        //Enable HTML
            $mail->isHTML(true);

        //Email body
            $mail->Body = $this->load->view('candidateVerificationMailContent.php',['verify_link' => $verify_link],true);
        //Add recipient
            $mail->addAddress($toMail);
        //Finally send email
        if ( $mail->send() ) {
            
        }else{
            echo "Message could not be sent.";
        }
        //Closing smtp connection
        $mail->smtpClose();

        $this->sendMailToAllAdmins($where);

        $array_items = array('first_name','last_name','seeking_office','which_district','local_profile_photo','issues');

        $this->session->unset_userdata($array_items);
    }

    public function candidateVerify($verify_token, $id) {
        $candidate = $this->db->select('*')
            ->where('id', $id)
            ->get('candidates')->result_array()[0];

        $isSpecialCandidate = $this->db->select('*')
            ->where([
                'email' => $candidate['email'],
                // 'office' => $candidate['seeking_office']
            ])
            ->get('special_candidate_emails')->result_array();


        $admin_verify = (!empty($isSpecialCandidate)) ? 1 : 0;

        if ($candidate['verify_token'] == $verify_token) {

            $data = array(
                'active' =>  '1',
                'admin_verify' => $admin_verify
            );
            
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('candidates');

        	$array_items = array('resendID');

        	$this->session->unset_userdata($array_items);

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
                $mail->Subject = "Verification done";
            //Set sender email
                $mail->setFrom('survey@texas2020.com');
            //Enable HTML
                $mail->isHTML(true);

            //Email body
                $mail->Body = $this->load->view('afterVerifyEmailTemplate.php',"",true);
            //Add recipient
                $mail->addAddress($candidate['email']);
            //Finally send email
            if ( $mail->send() ) {
                
            }else{
                echo "Message could not be sent.";
            }
            //Closing smtp connection
            $mail->smtpClose();

            return redirect(base_url().'verify/success');
        }
        else {
            return redirect('https://soheard.dev/dev/texas-voter-guide?verify_faild');
        }
    }

    public function resendVerification() {

        $id = +$this->session->userdata('resendID');

    	$candidate = $this->db->select('candidates.email')
            ->where('id', $id)
            ->get('candidates')->result_array()[0];

        $toMail = $candidate['email'];

        $verify_token = uniqid().time().md5($id);

        $data = array(
            'verify_token' =>  $verify_token,
        );

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('candidates');

        $verify_link = base_url().'candidate/verify/'.$verify_token.'/'.$id;

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
            $mail->Subject = "Candidate Verification";
        //Set sender email
            $mail->setFrom('survey@texas2020.com');
        //Enable HTML
            $mail->isHTML(true);

        //Email body
            $mail->Body = $this->load->view('candidateVerificationMailContent.php',['verify_link' => $verify_link],true);
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

    public function saveCandidatePhoto() {
        if (!empty($_FILES)) {

            $maxDim = 100;

            $tempFile = $_FILES['file']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize( $tempFile );

            if ( $width > $maxDim || $height > $maxDim ) {

                $target_filename = $tempFile;
                $ratio = $width/$height;

                if( $ratio > 1) {
                    $new_width = $maxDim;
                    $new_height = $maxDim/$ratio;
                } else {
                    $new_width = $maxDim*$ratio;
                    $new_height = $maxDim;
                }

                $src = imagecreatefromstring( file_get_contents( $tempFile ) );
                $dst = imagecreatetruecolor( $new_width, $new_height );
                imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
                imagedestroy( $src );
                imagepng( $dst, $target_filename );
                imagedestroy( $dst );
            }

            $fileName = time().uniqid().$_FILES['file']['name'];
            $targetPath = getcwd() . '/assets/uploads/';
            $targetFile = $targetPath . $fileName;
            move_uploaded_file($tempFile, $targetFile);
            $imageUrl =  base_url().'assets/uploads/'.$fileName;

            $this->session->set_userdata('local_profile_photo',$imageUrl);
        }
    }

    public function removeSessionImage() {
        $array_items = array('local_profile_photo');

        $this->session->unset_userdata($array_items);
    }
    
	

}

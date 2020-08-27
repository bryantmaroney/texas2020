<?php

if (!function_exists('callAPI')) {

    function callAPI($method, $url, $data , $tokenize) {
        
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        //,
        curl_setopt($curl, CURLOPT_URL, $url);
        if ($tokenize) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'authorization: bearer '.TYPEFORM_TOKEN
            ));
        } else {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json'
            ));
        }
        
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return $result;
    }

}

if (!function_exists('getCandidates')) {

    function getCandidates($items) {
        $candidates = array();
        $election_total = 5; 
        $money_total = 5; 
        if($items) {
            
            foreach ($items as $item) {
                
                $election_agreed = 0;
                $money_agreed = 0;
                $seeking_office = getValue($item['answers'],'VYmpXW0tm5wb');
                if($seeking_office != '') {
                    
                    $row = array();
                    $row['id'] = $item['landing_id']; 
                    $row['first_name'] = getValue($item['answers'],'bNl03bqCoAF4'); 
                    $row['last_name'] = getValue($item['answers'],'Sjo45sU26tni');; 
                    $row['seeking_office'] = getValue($item['answers'],'VYmpXW0tm5wb');
                    $row['which_district'] = getValue($item['answers'],'JPJX22b4SI4O');
                    $row['like_profile_photo'] = getValue($item['answers'],'DHmc4zAekEXO');
                    $row['profile_photo_url'] = getValue($item['answers'],'AeG4lXYuL2NF');
                    $row['election_comment'] = getValue($item['answers'],'nN1IMX0DmftE');
                    $row['politics_comment'] = getValue($item['answers'],'uZiScs75zkKw');
                    
                    
                    $row['local_profile_photo'] = '';
                    if($row['profile_photo_url']!='') {
                        $row['local_profile_photo'] = downloadImageAPI($row['profile_photo_url']);
                    }

                    $row['end_gerrymandering'] = getValue($item['answers'],'JJBg1fCfIf7m');
                    $row['small_donors'] = getValue($item['answers'],'Gjl41N7OpWmk');
                    $row['open_primaries'] = getValue($item['answers'],'BhjTgBFLnm1M');
                    $row['ranked_choice'] = getValue($item['answers'],'iLnsbz7QHGjd');
                    $row['terms_limits'] = getValue($item['answers'],'iUB5r0NM4QH8');
                    $row['automatic_registration'] = getValue($item['answers'],'XfVvPPQ4T6ar');

                    // $row['finance_reform'] = getValue($item['answers'],'GVX36SWX2JCM');
                    // $row['transparency_disclose'] = getValue($item['answers'],'Vz9i4XMg8Kwa');
                    // $row['limit_lobbyist'] = getValue($item['answers'],'IM3dp5QMZYYz');
                    // $row['model_legislation'] = getValue($item['answers'],'bvA30vJuXhyp');
                    // $row['tbd'] = getValue($item['answers'],'qfABDeDRnJ4U');

                    $row['Lobbying'] = getValueByRef($item['answers'],'91ba0bb5-0f0f-41ed-94cb-679fb7af4fa8');
                    $row['who_writes_Our_laws'] = getValueByRef($item['answers'],'9e42339f-83e0-45ad-b1d3-4e9ddcc5c207');
                    $row['criminalize_disinformation'] = getValueByRef($item['answers'],'242a5e81-e509-49d0-b8bd-edf8fc0e5840');
                    $row['limit_the_lobbyists'] = getValueByRef($item['answers'],'305f83db-8571-41e7-8f62-c98d4a720c50');
                    $row['campaign_finance_reform'] = getValueByRef($item['answers'],'92ecf647-f796-46cc-93f1-a07fb5ee44ac');

                    // election agreed
                    if($row['end_gerrymandering'] == 'Agree') {
                        $election_agreed += 1;
                    }
                    if($row['small_donors'] == 'Agree') {
                        $election_agreed += 1;
                    }
                    if($row['ranked_choice'] == 'Agree') {
                        $election_agreed += 1;
                    }
                    if($row['terms_limits'] == 'Agree') {
                        $election_agreed += 1;
                    }
                    if($row['automatic_registration'] == 'Agree') {
                        $election_agreed += 1;
                    }

                    // money agreed
                    if($row['Lobbying'] == 'Agree') {
                        $money_agreed += 1;
                    }
                    if($row['who_writes_Our_laws'] == 'Agree') {
                        $money_agreed += 1;
                    }
                    if($row['criminalize_disinformation'] == 'Agree') {
                        $money_agreed += 1;
                    }
                    if($row['limit_the_lobbyists'] == 'Agree') {
                        $money_agreed += 1;
                    }
                    if($row['campaign_finance_reform'] == 'Agree') {
                        $money_agreed += 1;
                    }

                    $row['election_agreed'] = $election_agreed;
                    $row['election_total'] = $election_total;

                    $row['money_agreed'] = $money_agreed;
                    $row['money_total'] = $money_total;

                    $candidates[] = $row;

                }
            }
        }

        return $candidates;
    }
}

if (!function_exists('getValue')) {

    function getValue($answers, $id) {
        $val = '';
        if($answers) {
            foreach ($answers as $answer) {
                if($answer['field']['id'] == $id && $answer['type'] == 'text'){
                    $val = $answer['text'];
                }
                else if($answer['field']['id'] == $id && $answer['type'] == 'choice'){
                    $val = $answer['choice']['label'];
                }
                else if($answer['field']['id'] == $id && $answer['type'] == 'boolean'){
                    $val = 0;
                    if ($answer['boolean'] == 1) {
                        $val = 1;
                    }
                }
                else if($answer['field']['id'] == $id && $answer['type'] == 'file_url'){
                    $val = $answer['file_url'];
                    
                }
            }
        }
        
        return $val;
        
    }

}

if (!function_exists('getValueByRef')) {

    function getValueByRef($answers, $ref) {
        $val = '';
        if($answers) {
            foreach ($answers as $answer) {
                if($answer['field']['ref'] == $ref && $answer['type'] == 'text'){
                    $val = $answer['text'];
                }
                else if($answer['field']['ref'] == $ref && $answer['type'] == 'choice'){
                    $val = $answer['choice']['label'];
                }
                else if($answer['field']['ref'] == $ref && $answer['type'] == 'boolean'){
                    $val = 0;
                    if ($answer['boolean'] == 1) {
                        $val = 1;
                    }
                }
                else if($answer['field']['ref'] == $ref && $answer['type'] == 'file_url'){
                    $val = $answer['file_url'];
                    
                }
            }
        }
        
        return $val;
        
    }

}

if (!function_exists('cmp')) {

    function cmp($a, $b) {
        if ($a['first_name'] == $b['first_name']) {
            return 0;
        }
        return ($a['first_name'] < $b['first_name']) ? -1 : 1;
    }

}

if (!function_exists('downloadImageAPI')) {

    function downloadImageAPI($profile_photo_url) {
        
        $image_name = time().uniqid().'_local_profile_photo.jpg';
        
        file_put_contents(UPLOAD_DIR.$image_name, callAPI('GET', $profile_photo_url, false, true));
        
        return $image_name;

    }

}





<div class="mobile_desktop_container">
    <div class="desktop_view_content step2_desktop">
        <div class="candidate_table table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th class="logo_container">
                            <div class="body_content">
                                <div class="candidate_details">
                                    <div class="candidate_details_right">
                                        <h1>Compare Candidates</h1>
                                        <h5><?=$text?></h5>
                                    </div>
                                    <div class="candidate_details_left">
                                        <img src="<?=$img?>" alt="">
                                    </div>
                                </div>
                                <div class="share_choice_btn">
                                    <button class="backToDistricts" type="button"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</button>
                                    <button class="toNextOffice" type="button">Next Office</button>
                                    <!-- <button type="button" class="share_comparision"><i class="fa fa-share-alt" aria-hidden="true"></i></button> -->
                                </div>
                            </div>
                        </th>
                        <?php
                            $indx = 0;
                            foreach($candidates as $value) {
                            $isRespond = $value['agreeCount'] === 0 && $value['disagreeCount'] === 0 && $value['skipCount'] === 0 && $value['commentsCount'] === 0;
                            ?>
                            <th>
                                <p class="candidate_title"><?= isset($value['first_name']) ? "{$value['first_name']} <br> {$value['last_name']}" : '&nbsp;' ?></p>
                                <div class="candidate_th_card">
                                    <span class="<?= isset($value['first_name']) ? 'candidate_img' : 'candidate_name' ?>">
                                        <?php if(isset($value['first_name'])) { ?>
                                            <img src="<?= trim($value['local_profile_photo']) && !$isRespond ? trim($value['local_profile_photo']) : base_url() . 'assets/images/no-user.jpg' ?>" alt="">
                                        <?php } else { ?>
                                            ME
                                        <?php } ?>
                                    </span>
                                    <ul>
                                        <li>
                                            <p><?= $value['agreeCount'] === 0 ? '-' : $value['agreeCount'] ?></p>
                                            <img src="<?=base_url()?>assets/images/thumb-up.png" alt="">
                                        </li>
                                        <li>
                                            <p><?= $value['disagreeCount'] === 0 ? '-' : $value['disagreeCount'] ?></p>
                                            <img class="thumb_down" src="<?=base_url()?>assets/images/thumb-up.png" alt="">
                                        </li>
                                        <li>
                                            <p><?= $value['skipCount'] === 0 ? '-' : $value['skipCount'] ?></p>
                                            <span class="h6">N/A</span>
                                        </li>
                                    </ul>
                                    <?php if($indx !== 0) { ?>
                                        <div class="<?=$value['answersCount'] === 0 ? 'nudge' : 'choose_candidate'?> desktop_choose" data-index="<?= $indx ?>" title="<?=$value['answersCount'] === 0 ? 'Coming soon' : ''?>">
                                            <?php if ($value['answersCount'] == 0) {?>
                                               <a class='tooltip2' href='javascript:;'><h2><?= $value['answersCount'] !== 0 ? 'Choose' : 'Nudge' ?></h2>
                                            <div class='tooltiptext2'>
                                              <p>Coming Soon!</p>
                                                <img class="down_arrow" src="<?=base_url()?>assets/images/down-arrow.png" alt="">
                                            </div>

                                        </a>
                                          <?php }

                                         else{ ?>
                                         <h2><?= $value['answersCount'] !== 0 ? 'Choose' : 'Nudge' ?></h2>
                                            <?php  } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </th>
                        <?php $indx++; } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $index = 0;
                        foreach($votes as $key => $value) {
                            $num = $index;
                            $index++
                        ?>    
                        <tr>
                            <td>
                                <span><img class="play-video" data-id="<?=$num?>" src="<?=base_url()?>assets/images/play_icon.png" alt=""></span>
                                <h3>
                                    <strong><?= $index ?></strong>
                                    <?= $value ?>
                                </h3>
                                <span class="openInfoModal" data-info-id="<?=$num?>"><i class="fa fa-info" aria-hidden="true"></i></span>
                                <?php if ($num === 9) { ?>
                                    <div class='comment-bubble'>
                                        <img src="<?=base_url()?>assets/images/CommentBubble.png">
                                        Candidate comments
                                    </div>
                                <?php } ?>
                            </td>
                        <?php 
                        $indx = 0;
                        foreach($candidates as $candidate) {
                            $comment = isset($candidate['issues']->{preg_replace('/answer$/', 'comment', $key)}) ? $candidate['issues']->{preg_replace('/answer$/', 'comment', $key)} : '';
                            $type    = isset($candidate['issues']->{$key}) ? $candidate['issues']->{$key} : '';
                            ?>
                            <td title='Cast Your Vote!'>
                            <input type="hidden" value="<?=$comment?>" data-index="<?=$indx?>" data-num="<?=$num?>" data-type="<?=$type?>">
                            <?php
                            switch($type){
                                case 'agree':
                                    echo "<img src='" . base_url() . "assets/images/green-up.png' alt=''>";
                                break;
                                case 'disagree':
                                    echo "<img src='" . base_url() . "assets/images/red-down.png' alt=''>";
                                break;
                                case 'skip':
                                case 'neither':
                                    echo "<p>N/A</p>";
                                break;
                                default:
                                    if($indx === 0) {
                                        echo "<a class='vote_btn tooltip1' href='javascript:;'>Vote
                                            <div class='tooltiptext'>
                                                <h3 class='d-flex'><strong></strong>
                                                </h3>
                                                <div class='d-flex' data-id='$indx' data-name='$key'>
                                                    <button class='agree_btn step3-agree' type='button'><img src='". base_url() . "assets/images/thumb-up.png' alt=''> Agree</button>
                                                    <button class='agree_btn disagree_btn step3-disagree' type='button'><img src='". base_url() . "assets/images/thumb-down.png' alt=''> Disagree</button>
                                                    <button class='agree_btn neither_btn step3-skip' type='button'><small>N/A</small> Neither</button>
                                                </div>
                                                <img class='down_arrow' src='". base_url() . "assets/images/down-arrow.png' alt=''>
                                            </div>
                                        </a>";
                                    } else {
                                        echo "<p>No Response</p>";    
                                    }
                                break;
                            }

                            if($index === 10) {
                                if($candidate['agreeCount'] === 0 && $candidate['disagreeCount'] === 0 && $candidate['skipCount'] === 0 && $candidate['commentsCount'] === 0){
                                    if($indx === 0) {
                                        echo "<div class='summary_box'>
                                        </div>";
                                    } else {
                                        echo "<div class='no_response_box'>
                                            <h2>
                                                Did Not Respond
                                                <small>to Survey</small>
                                            </h2>
                                        </div>";
                                    }
                                    
                                } else { 
                                    if($indx === 0) { ?>
                                        <div class='summary_box'></div>
                                    <?php } else { ?>
                                        <a href="javascript:;">
                                            <div class="summary_box openCandidateModal"  data-click-index="<?= $indx ?>">
                                                <img src="<?= base_url() ?>assets/images/comment_icon.png" alt="">
                                                <h2 class="bold">Summary</h2>
                                                <h2 class="thin">w/ Comments</h2>
                                            </div>
                                        </a>
                                 <?php } ?>
                                <?php } ?>
                            <?php }
                            echo "</td>";
                            $indx++;
                        } ?>
                        </tr>
                    <?php } ?>
                </tbody>             
            </table>
        </div>
        <div class="share_choice_btn share_choice_btn_bg share_choice_btn_border c-hide-d mt-0">
            <!-- <button type="button" class="share_comparision">Share chosen candidate</button> -->
            <h4><?=$text?></h4>
            <!--<button type="button"><i class="fa fa-share-alt" aria-hidden="true"></i> Share comparison</button>-->
            <!-- <button class="toNextOffice" type="button">Next Office</button> -->
        </div>
    </div>

    <div class="mobile_view_content step2_mobile">
        <header class="header c-hide">
            <div class="burger_icon">
                <a href="javascript:;" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="<?=base_url()?>assets/images/burger-icon.png" alt="">
                </a>                   
            </div>             
            <div class="logo">
                <img src="<?=base_url()?>assets/images/logo-mob.png" alt="">
            </div>
            <div class="collapse navbarToggle" id="navbarToggleExternalContent">
                <ul>
                    <li><a href="<?=preg_replace('/candidatesearch\//', '', base_url())?>">Home</a></li>
                    <li><a href="<?=preg_replace('/candidatesearch\//', '', base_url())?>?candidate_search">Choose Candidates</a></li>
                    <li><a href="<?=preg_replace('/candidatesearch\//', '', base_url())?>?10-4Texas">Problems & Solutions</a></li>
                    <li><a href="<?=preg_replace('/candidatesearch\//', '', base_url())?>?10-4">10-4 Texas</a></li>
                    <li><a href="<?=preg_replace('/candidatesearch\//', '', base_url())?>">Trusted Resources</a></li>
                    <li><a href="<?=preg_replace('/candidatesearch\//', '', base_url())?>?make_a_difference">Make a Difference</a></li>
                </ul>
            </div>        
        </header>
        <div class="body_content mx-md-4">
            <a class="back_btn_style c-hide-m mt-4" href="<?=base_url()?>step1"><i class="fa fa-caret-left" aria-hidden="true"></i>  Back to all offices</a>
            <div class="share_choice_btn c-hide">
                <button class="backToDistricts" type="button"><i class="fa fa-caret-left" aria-hidden="true"></i> Back to all offices</button>
                <button class="toNextOffice" type="button">Next Office <i class="fa fa-caret-right" aria-hidden="true"></i></button>
            </div>
            <div class="candidate_details">
                <div class="candidate_details_left">
                    <img src="<?=$img?>" alt="">
                </div>
                <div class="candidate_details_right">
                    <div>
                        <h1>Compare Candidates</h1>
                        <h5><?=$text?></h5>
                    </div>
                    <p class="swipe-right">Swipe Right to See More Candidates</p>
                </div>
            </div>
        </div>
        <div class="candidate_table table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>

                        <?php foreach($candidates as $value) {
                            $isRespond = $value['agreeCount'] === 0 && $value['disagreeCount'] === 0 && $value['skipCount'] === 0 && $value['commentsCount'] === 0;
                            ?>
                            <th>
                                <p class="candidate_title"><?= isset($value['first_name']) ? "{$value['first_name']} {$value['last_name']}" : '&nbsp;' ?></p>
                                <div class="candidate_th_card">
                                    <span class="<?= isset($value['first_name']) ? 'candidate_img' : 'candidate_name' ?>">
                                        <?php if(isset($value['first_name'])) { ?>
                                            <img src="<?= trim($value['local_profile_photo']) && !$isRespond ? trim($value['local_profile_photo']) : base_url() . 'assets/images/no-user.jpg' ?>" alt="">
                                        <?php } else { ?>
                                            ME
                                        <?php } ?>
                                    </span>
                                    <ul>
                                        <li>
                                            <p><?= $value['agreeCount'] === 0 ? '-' : $value['agreeCount'] ?></p>
                                            <img src="<?=base_url()?>assets/images/thumb-up.png" alt="">
                                        </li>
                                        <li>
                                            <p><?= $value['disagreeCount'] === 0 ? '-' : $value['disagreeCount'] ?></p>
                                            <img class="thumb_down" src="<?=base_url()?>assets/images/thumb-up.png" alt="">
                                        </li>
                                        <li>
                                            <p><?= $value['skipCount'] === 0 ? '-' : $value['skipCount'] ?></p>
                                        </li>
                                    </ul>
                                </div>
                            </th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $index = 0;
                        foreach($votes as $key => $value) { 
                            $num = $index;
                            $index++
                        ?>
                        <tr>    
                            <td colspan="500">
                                <h3>
                                    <strong><?= $index ?></strong>
                                    <?= $value ?>
                                    <span><img class="play-video" data-id="<?=$num?>" src="<?=base_url()?>assets/images/play_icon.png" alt=""></span>
                                    <span class="openInfoModal" data-info-id="<?=$num?>"><i class="fa fa-info" aria-hidden="true"></i></span>
                                </h3>    
                            </td>
                        </tr>
                        <tr>
                        <?php 
                        $indx = 0;
                        foreach($candidates as $candidate) {
                            $comment = isset($candidate['issues']->{preg_replace('/answer$/', 'comment', $key)}) ? $candidate['issues']->{preg_replace('/answer$/', 'comment', $key)} : '';
                            $type    = isset($candidate['issues']->{$key}) ? $candidate['issues']->{$key} : '';
                            ?>
                            <td>
                            <input type="hidden" value="<?=$comment?>" data-index="<?=$indx?>" data-num="<?=$num?>" data-type="<?=$type?>">
                            <?php
                            switch($type){
                                case 'agree':
                                    echo "<img src='" . base_url() . "assets/images/green-up.png' alt=''>";
                                break;
                                case 'disagree':
                                    echo "<img src='" . base_url() . "assets/images/red-down.png' alt=''>";
                                break;
                                case 'skip':
                                case 'neither':
                                    echo "<p>N/A</p>";
                                break;
                                default:
                                    if($indx === 0) {
                                        echo "<a class='vote_btn tooltip1' href='javascript:;'>Vote
                                            <div class='tooltiptext'>
                                                <h3 class='d-flex'><strong></strong>
                                                </h3>
                                                <div class='d-flex' data-id='$indx' data-name='$key'>
                                                    <button class='agree_btn step3-agree' type='button'><img src='". base_url() . "assets/images/thumb-up.png' alt=''> Agree</button>
                                                    <button class='agree_btn disagree_btn step3-disagree' type='button'><img src='". base_url() . "assets/images/thumb-down.png' alt=''> Disagree</button>
                                                    <button class='agree_btn neither_btn step3-skip' type='button'><small>N/A</small> Neither</button>
                                                </div>
                                                <img class='down_arrow' src='". base_url() . "assets/images/down-arrow.png' alt=''>
                                            </div>
                                        </a>";
                                    } else {
                                        echo "<p>No Response</p>";    
                                    }
                                    
                                break;
                            }

                            if($index === 10 && $indx !== 0) {
                                if($candidate['agreeCount'] === 0 && $candidate['disagreeCount'] === 0 && $candidate['skipCount'] === 0 && $candidate['commentsCount'] === 0) { ?>
                                <div class="no_response_box">
                                    <h2>
                                        Did Not Respond
                                        <small>to Survey</small>
                                    </h2>
                                </div>
                                <?php } else { ?>    
                                <div class="summary_box">
                                    <a href="javascript:;" class="openCandidateModal" data-click-index="<?= $indx ?>">
                                        <img src="<?= base_url() ?>assets/images/comment_icon.png" alt="">
                                    </a>
                                    <h2 class="bold">Summary</h2>
                                    <h2 class="thin">w/ Comments</h2>
                                </div>
                                <?php } ?>
                                <div class="<?=$candidate['answersCount'] === 0 ? 'nudge' : 'choose_candidate'?>" data-index="<?= $indx ?>">
                                    <h2><?= $candidate['answersCount'] !== 0 ? 'Choose This Candidate' : 'Nudge' ?></h2>
                                </div>
                                
                            <?php }

                            echo "</td>";
                            $indx++;
                        } ?>
                        </tr>
                    <?php } ?>
                </tbody>             
            </table>
        </div>
        <div class="share_choice_btn share_choice_btn_bg share_choice_btn_border mt-0">
            <h4><?=$text?></h4>
            <!--<button type="button"><i class="fa fa-share-alt" aria-hidden="true"></i> Share comparison</button>-->
            <button type="button" class="backToDistricts"><i class="fa fa-caret-left" aria-hidden="true"></i> Back to all offices</button>
            <button class="toNextOffice" type="button">Next Office</button>
        </div>
    </div>
</div>

<button style="display: none" data-toggle="modal" data-target="#comment_modal" id="openCommentsModal"></button>
<div class="videoModal" style="display: none;">
    <div class="videoModalContainer" id="vModalContainer">
        <div class="closeContainer">
            <img class="closeVideoModal" src="<?=preg_replace('/candidatesearch\//', '', base_url())?>assets/images/closeModal.png">
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal comment_modal" id="comment_modal">
<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header pb-5">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="comment_header">
              <div class="comment_header_img"><img src="<?=base_url()?>assets/images/candidate_2.png" alt=""></div>
              <div class="comment_header_name">
                  <h1>Comments by</h1>
                  <h5>John Lastnamehere</h5>
              </div>
          </div>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="top_arrow">
                <img src="<?=base_url()?>assets/images/top_arrow.png" alt="">
            </div>
            <?php 
            $index = 0;
            foreach($votes as $key => $value) { 
                $index++
            ?>
            <div class="comment_body">
                <div class="comment_body_header">
                    <span data-id="<?= $index - 1?>"></span>
                    <h3>
                        <strong><?= $index ?></strong>
                        <?= $value ?>
                    </h3>
                </div>
                <p>
                                    
                </p>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>

<div class="summary-modal-container" id="summaryModal">
    <div class="summary-modal-section">
        <div class="summary-modal-header">
            <img src="<?=base_url()?>assets/images/x_icon.png?>" class="close-summary-modal" id="closeSummaryModal">
            <img src="<?=base_url()?>assets/images/shareImgs/headerImg.png">
        </div>
        <div class="summary-modal-body">
            <div class="district-item">
                <span class="district-user-container">
                    <img src="<?=base_url()?>assets/images/Not_Up_For_Election.jpg" class="district-user-img">
                </span>
                <img src="<?=base_url()?>assets/images/shareImgs/container.png" class="district-item-img">
                <img src="<?=base_url()?>assets/images/shareImgs/icon.png" class="district-icon-img">
                <img src="<?=base_url()?>assets/images/b1.png" class="district-img">
                <span class="district-name">U.S. <br> SENATE</span>
                <span class="district-user-name">Name Surname</span>
            </div>
            <div class="district-item">
                <span class="district-user-container">
                    <img src="<?=base_url()?>assets/images/Not_Up_For_Election.jpg" class="district-user-img">
                </span>
                <img src="<?=base_url()?>assets/images/shareImgs/container.png" class="district-item-img">
                <img src="<?=base_url()?>assets/images/shareImgs/icon.png" class="district-icon-img">
                <img src="<?=base_url()?>assets/images/districts/U.s. House <?=$district['congressional_district_id']?>.png" class="district-img">
                <span class="district-name">U.S. <br> HOUSE</span>
                <span class="district-user-name">Name Surname</span>
            </div>
            <div class="district-item">
                <span class="district-user-container">
                    <img src="<?=base_url()?>assets/images/Not_Up_For_Election.jpg" class="district-user-img">
                </span>
                <img src="<?=base_url()?>assets/images/shareImgs/container.png" class="district-item-img">
                <img src="<?=base_url()?>assets/images/shareImgs/icon.png" class="district-icon-img">
                <img src="<?=base_url()?>assets/images/districts/Texas House <?=$district['state_lower_house_district_1_id_value']?>.png" class="district-img">
                <span class="district-name">TEXAS <br> HOUSE</span>
                <span class="district-user-name">Name Surname</span>
            </div>
            <div class="district-item">
                <span class="district-user-container">
                    <img src="<?=base_url()?>assets/images/Not_Up_For_Election.jpg" class="district-user-img">
                </span>
                <img src="<?=base_url()?>assets/images/shareImgs/container.png" class="district-item-img">
                <img src="<?=base_url()?>assets/images/shareImgs/icon.png" class="district-icon-img">
                <img src="<?=base_url()?>assets/images/districts/Texas Senate <?=$district['state_upper_house_district_1_id_value']?>.png" class="district-img">
                <span class="district-name">TEXAS <br> SENATE</span>
                <span class="district-user-name">Name Surname</span>
            </div>
        </div>
        <div class="summary-modal-footer">
            <img class="footer-logo" src="<?=base_url()?>assets/images/shareImgs/footerImg.png">
            <!--<div class="shareVote">-->
            <!--    <img src="https://soheard.dev/dev/texas2020-full/assets/images/scaled/mobShare_15_15.png" alt="">-->
            <!--    <span>SHARE</span>-->
            <!--</div>-->
        </div>
    </div>
    <div class="share_comparision modal-share"><img src="<?=base_url()?>assets/images/mobShare_15_15.png"> &nbsp; Share</div>
    <!-- <button class="backToTexas2020" type="button"><i class="fa fa-caret-left" aria-hidden="true"></i> Back To Texas2020</button> -->
</div>

<div class="info-modal-container" id="infoModal">
    <div class="flip-card-background">
        <div class="flip-card-back-top">
        </div>
        <div>
            <div class="flip-card-back-img">
                <img src="" width="435" height="auto" alt="" class="problem-solution-img">
            </div>
            <div class="flip-card-back-textdivs">
                <div class="flip-card-text-div-left">
                    <span class="problem_solution_titles">PROBLEM:</span>
                    <p class="problem"></p>
                </div>
                <div class="flip-card-text-div-right">
                    <span class="problem_solution_titles">SOLUTION:</span>
                    <p class="solution"></p>
                </div>
            </div>
        </div>
        <div class="deskVoteButtons">
            <div>
                <div class="desktopAgree step3-agree" data-name="clean_up">
                    <img src="https://texas2020.org/assets/images/optimized_new/mobileAgreeIcone_20_20_07d1fcabb9fe6ff943b3a4c1157eedca.png" width="25" height="auto" alt="">
                    <span class="fb_gothic_cond">Agree</span>
               </div>
            </div>
            <div>
                <div class="desktopDisagree step3-disagree" data-name="clean_up">
                    <img src="https://texas2020.org/assets/images/optimized_new/mobileDisagreeIcone_optimized_20_20_cff12bee62ef9b89374b43a116d9beba.png" width="20" height="auto" alt="">
                    <span class="fb_gothic_cond">Disagree</span>
                </div>
                <div class="deskShareSkip">
                    <div class="desktopSkip step3-skip" data-name="clean_up">
                        <span>N/A NEITHER</span>&nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $status = !array_search($district['state_upper_house_district_1_id_value'], ['2', '3', '5', '7', '8', '9', '10', '14', '15', '16', '17', '23', '25', '30', '31']);
    $count = 0;
    foreach($candidates as $val) {
        if(!empty($val)) {
            $count++;
        }
    }
?>
<input type='hidden' id="countData" value="<?=$count?>">
<div class="mobile_view_content">
    <header class="header c-hide">
        <div class="burger_icon">
            <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="<?=base_url()?>assets/images/burger-icon.png" alt="">
            </a>
        </div>
        <div class="logo">
            <img src="<?=base_url()?>assets/images/new-panel1-mobile-logo.png" alt="">
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="body_content">
                    <a class="back_btn_style remove_chooses" href="<?=preg_replace('/candidatesearch\//', '', base_url())?>?candidate_search"><i class="fa fa-caret-left" aria-hidden="true"></i> Start a New Search</a>
                    <h1 class="mb-2 margin-top">Your districts and your Candidates</h1>
                    <p class=" c-hide">
                        Compare Candidates from each office and share your chosen candidates on social media
                    </p>
                    <h3 class="c-hide-d">
                        Compare Candidates from each office and share your chosen candidates on social media
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-0px">
                <div class="compare_card_section">
                    <div class="candidate-block">
                        <div class="compare_card">
                            <div class="country_left_side us_senate">
                                <img src="<?=base_url()?>assets/images/b1.png" alt="">
                                <h6>U.S. <br> Senate</h6>
                            </div>
                            <div class="candidate_right_side">
                                <h6>U.S. Senate Candidates</h6>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <?php
                                    $index = 0;
                                    foreach($candidates['us_senate_data'] as $value) { ?>
                                    <div class="candidate_info" data-id="<?=$index?>" data-name="usSenate">
                                        <h5><?= "{$value['first_name']} {$value['last_name']}" ?></h5>
                                        <span class="select_candidate" data-id="0">
                                            <?php
                                                // $img = trim($value['local_profile_photo']) ? preg_replace('/https:\/\/texas2020.org\//', 'https://soheard.dev/dev/texas2020-full/', $value['local_profile_photo']) : base_url() . 'assets/images/no-user.jpg';
                                                $img = trim($value['local_profile_photo']) ? $value['local_profile_photo'] : base_url() . 'assets/images/no-user.jpg';
                                            ?>
                                            <img src="<?= $img ?>" alt="">
                                        </span>
                                    </div>
                                    <?php
                                    $index++;
                                    } ?>
                                </div>
                                <button data-id="0" class="compare_btn" data-type="us_senate" type="button">Compare U.S. Senate</button>
                            </div>
                        </div>
                        <div class="compare_card">
                            <div class="country_left_side  us_house">
                                <img src="<?=base_url()?>assets/images/districts/U.s. House <?=$district['congressional_district_id']?>.png" alt="">
                                <h6>U.S. <br> House</h6>
                            </div>
                            <div class="candidate_right_side">
                                <h6>U.S.  House District <?= $district['congressional_district_id'] ?> Candidates</h6>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <?php
                                    $index = 0;
                                    foreach($candidates['us_house_data'] as $value) { ?>
                                    <div class="candidate_info" data-id="<?=$index?>" data-name="usHouse">
                                        <h5><?= "{$value['first_name']} {$value['last_name']}" ?></h5>
                                        <span class="select_candidate" data-id="1">
                                            <?php
                                                // $img = trim($value['local_profile_photo']) ? preg_replace('/https:\/\/texas2020.org\//', 'https://soheard.dev/dev/texas2020-full/', $value['local_profile_photo']) : base_url() . 'assets/images/no-user.jpg';
                                                $img = trim($value['local_profile_photo']) ? $value['local_profile_photo'] : base_url() . 'assets/images/no-user.jpg';
                                            ?>
                                            <img src="<?= $img ?>" alt="">
                                        </span>
                                    </div>
                                    <?php
                                    $index++;
                                    } ?>
                                </div>
                                <button data-id="1" class="compare_btn" data-type="us_house" type="button">Compare U.S. House</button>
                            </div>
                        </div>
                    </div>
                    <div class="candidate-block">
                        <div class="compare_card">
                            <div class="country_left_side  tx_house">
                                <img src="<?=base_url()?>assets/images/districts/Texas House <?=$district['state_lower_house_district_1_id_value']?>.png" alt="">
                                <h6>Texas <br> house</h6>
                            </div>
                            <div class="candidate_right_side">
                                <h6>Texas  House District <?= $district['state_lower_house_district_1_id_value'] ?> Candidates</h6>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <?php
                                    $index = 0;
                                    foreach($candidates['texas_house_data'] as $value) { ?>
                                    <div class="candidate_info"  data-id="<?=$index?>" data-name="txHouse">
                                        <h5><?= "{$value['first_name']} {$value['last_name']}" ?></h5>
                                        <span class="select_candidate" data-id="2">
                                            <?php
                                                // $img = trim($value['local_profile_photo']) ? preg_replace('/https:\/\/texas2020.org\//', 'https://soheard.dev/dev/texas2020-full/', $value['local_profile_photo']) : base_url() . 'assets/images/no-user.jpg';
                                                $img = trim($value['local_profile_photo']) ? $value['local_profile_photo'] : base_url() . 'assets/images/no-user.jpg';
                                            ?>
                                            <img src="<?= $img ?>" alt="">
                                        </span>
                                    </div>
                                    <?php
                                    $index++;
                                    } ?>
                                </div>
                                <button data-id="2" class="compare_btn" data-type="texas_house" type="button">Compare Tx House</button>
                            </div>
                        </div>
                        <div class="compare_card">
                            <div class="country_left_side tx_senate">
                                <img src="<?=base_url()?>assets/images/districts/Texas Senate <?=$district['state_upper_house_district_1_id_value']?>.png" alt="">
                                <h6>Texas <br> Senate</h6>
                            </div>
                            <div class="candidate_right_side">
                                <h6>Texas Senate District <?= $status ? $district['state_upper_house_district_1_id_value'] . ' Candidates' : '' ?> </h6>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <?php
                                    if($status) {
                                        $index = 0;
                                        foreach($candidates['texas_senate_data'] as $value) { ?>
                                        <div class="candidate_info"  data-id="<?=$index?>" data-name="txSenat">
                                            <h5><?= "{$value['first_name']} {$value['last_name']}" ?></h5>
                                            <span class="select_candidate" data-id="3">
                                                <?php
                                                    // $img = trim($value['local_profile_photo']) ? preg_replace('/https:\/\/texas2020.org\//', 'https://soheard.dev/dev/texas2020-full/', $value['local_profile_photo']) : base_url() . 'assets/images/no-user.jpg';
                                                    $img = trim($value['local_profile_photo']) ? $value['local_profile_photo'] : base_url() . 'assets/images/no-user.jpg';
                                                ?>
                                                <img src="<?= $img ?>" alt="">
                                            </span>
                                        </div>
                                        <?php
                                        $index++;
                                        }
                                    } else {
                                        echo '<p class="not-election">This district is not up for election.</p>';
                                    }?>
                                </div>
                                <?php
                                    if($status) {
                                        echo '<button data-id="3" class="compare_btn" data-type="texas_senate" type="button">Compare Tx Senate</button>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="reset-choice-container">
                        <button class="reset_choices">Reset choices</button>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="share_choice_btn share_choice_btn_bg">
        <!-- <button type="button" class="shareChoices"><i class="fa fa-share-alt" aria-hidden="true"></i> Share your choices</button> -->
    </div>
</div>

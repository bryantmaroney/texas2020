<table id="dataTable" class="table table-striped table-bordered  dataTable nowrap" cellspacing="0" width="100%">
    <thead>
        <tr class="tableHead">
            <th class="name">FIRST NAME</th>
            <th class="name">LAST NAME</th>
            <th class="position">OFFICE-DISTRICT</th>
            <!-- <th class="election_reform">ELECTION REFORM</th>
            <th class="money_in_politics">MONEY IN POLITICS</th> -->
            <th class="issues no-sorting" style="width: 45%;">ISSUES</th>
            <th class="verify">VERIFIED</th>
            <th class="editDelete no-sorting">EDIT/REMOVE</th>
        </tr>
    </thead>

    <tbody class="candidatesTableBody">
        <?php $candidateCount = 1; ?>
        <?php foreach ($submitted_candidates as $key => $submitted_candidate) { ?>
            <?php $chartCount = 1; ?>
            <tr candidateID="<?php echo $submitted_candidate['id'] ?>">
                <td class="imageField">
                    <?php if(!empty($submitted_candidate['local_profile_photo'])) { ?>
                        <img class="tableUserImage lazy" data-src="<?php echo $submitted_candidate['local_profile_photo'] ?>" alt="">
                    <?php } else { ?>
                        <img class="tableUserImage lazy" data-src="<?php echo base_url(); ?>assets/images/candidate_dummy.png" alt="">
                    <?php } ?>
                    <span><?=$submitted_candidate['first_name']?></span>
                </td>
                <td class="imageField padNotFirst" style="text-align: center !important;"><span><?=$submitted_candidate['last_name']?></span></td>

                <?php if($submitted_candidate['seeking_office'] == "U.S. Senate") { ?>
                    <td class="padNotFirst"><span><?= $submitted_candidate['seeking_office']?></span></td>
                <?php } else { ?>
                    <td class="padNotFirst"><span><?= $submitted_candidate['seeking_office']." - ".$submitted_candidate['which_district'] ?></span></td>
                <?php } ?>

                <td class="answersPart padNotFirst" style="width: 45%;padding: 0!important;">
                    <div class="candidateAnswersCountCharts">

                        <div>
                            <span class="answers_counts_style" style="color: #2DA107;"><?= $submitted_candidate['candidateAgreeCount']?></span>
                            <button class="candidateAgree">
                                <img src="<?php echo(base_url()) ?>/assets/images/candidateAgree.png" alt="">
                                <span>AGREE</span>
                            </button>
                        </div>
                        <?php $chartCount++; ?>

                        <div>
                            <span class="answers_counts_style" style="color: #C30100;"><?= $submitted_candidate['candidateDisAgreeCount']?></span>
                            <button class="candidateDisAgree">
                                <img src="<?php echo(base_url()) ?>/assets/images/candidateDisAgree.png" alt="">
                                <span>DISAGREE</span>
                            </button>
                        </div>
                        <?php $chartCount++; ?>

                        <div>
                            <span class="answers_counts_style" style="color: #6D6D6D;"><?= $submitted_candidate['candidateNeitherCount']?></span>
                            <button class="candidateNeither">
                                <img src="<?php echo(base_url()) ?>/assets/images/candidateNeither.png" alt="">
                                <span>NEITHER</span>
                            </button>
                        </div>
                        <?php $chartCount++; ?>

                    </div>
                </td>

                <td class="isVerified padNotFirst">
                    <?php if($submitted_candidate['active'] == "1" || $submitted_candidate['admin_verify'] == "1") { ?>
                        <button class="verified">Verified</button>
                    <?php } else { ?>
                        <button class="notVerified">Not Verified</button>
                    <?php } ?>
                </td>

                <td class="edDelSection padNotFirst" candidateID="<?= $submitted_candidate['id'] ?>">
                    <span class="editSubmettedCandidatePhoto">
                        <label for="upload<?php echo($key) ?>">
                            <img src="<?php echo base_url(); ?>assets/images/edit.png" title="edit candidate" alt="">
                        </label>
                        <input style="display: none" type="file" name="upload" id="upload<?php echo($key) ?>" class="upload-box changeSubmPhotoInp" placeholder="Upload File" />
                    </span>
                    <?php if($submitted_candidate['admin_verify'] == 1) { ?>
                        <span class="verifySubmittedCandidate" data-toggle="tooltip" title="Candidate is verified"><img src="<?php echo base_url(); ?>assets/images/verifyByAdmin.png" alt=""></span>
                    <?php } else { ?>
                        <span class="verifySubmittedCandidate adminVerifyCandidate" data-toggle="tooltip" title="Candidate is not verified"><img src="<?php echo base_url(); ?>assets/images/verifyByAdmin.png" alt=""></span>
                    <?php } ?>
                    <span class="deleteSubmittedCandidate"><img src="<?php echo base_url(); ?>assets/images/delete.png" title="delete candidate" alt=""></span>
                </td>

            </tr>
            <?php $candidateCount++; ?>
        <?php } ?>
    </tbody>
</table>

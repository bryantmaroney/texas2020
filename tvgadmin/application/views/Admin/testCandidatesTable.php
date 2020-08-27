<div class="card">
      <h3 class="card-header text-center font-weight-bold text-uppercase py-4 textTitle">Test Candidates</h3>
      <div class="card-body">
        <div id="table" class="table-editable">
          <table id="testDataTable" class="table table-striped dataTable nowrap" cellspacing="0" width="100%">
            <thead>
              <tr class="tableHead">
                <th class="text-center">NAME</th>
                <th class="position">OFFICE</th>
                <th class="text-center">ELECTION REFORM</th>
                <th class="text-center">MONEY IN POLITICS</th>                        
                <th class="text-center">EDIT/REMOVE</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($test_candidates as $key => $test_candidate) { ?>
                     <tr candidateID="<?= $test_candidate['id'] ?>">

                        <td class="image-td">
                            <?php if (!empty($test_candidate['local_profile_photo'])) { ?>
                                <img class="testCandidateImage" src="<?php echo $test_candidate['local_profile_photo'] ?>" alt="">
                                    
                            <?php } else { ?>
                                <img class="testCandidateImage" src="<?php echo base_url(); ?>assets/images/candidate_dummy.png" alt="">
                                    
                            <?php } ?>
                            <span><?php echo $test_candidate['first_name'].$test_candidate['last_name'] ?></span>
                        </td>

                        <td class="padNotFirst" name="seeking_office" contenteditable="true"><?php echo $test_candidate['seeking_office'] ?></td>

                         <td class="answersPart padNotFirst">
                            <?php  $index = 1; ?>
                            <?php foreach (json_decode($test_candidate['election_reform']) as $answer) {?>
                                <?php if($answer == "agree") { ?>
                                    <span><?= $index++ ?>.<img src="<?php echo base_url(); ?>assets/images/right-mark.png" width="38" height="38" alt="img"> </span>
                                <?php } else { ?>
                                    <span><?= $index++ ?>.<img src="<?php echo base_url(); ?>assets/images/close-red.png" width="38" height="38" alt="img"> </span>
                                <?php } ?>    
                            <?php } ?>
                        </td>
                        <td class="answersPart padNotFirst">
                            <?php  $index = 1; ?>
                             <?php foreach (json_decode($test_candidate['money_in_politics']) as $answer) {?>
                                <?php if($answer == "agree") { ?>
                                    <span><?= $index++ ?>.<img src="<?php echo base_url(); ?>assets/images/right-mark.png" width="38" height="38" alt="img"> </span>
                                <?php } else { ?>
                                    <span><?= $index++ ?>.<img src="<?php echo base_url(); ?>assets/images/close-red.png" width="38" height="38" alt="img"> </span>
                                <?php } ?>     
                            <?php } ?>
                        </td>
                        
                        <td class="padNotFirst">
                            <span class="editSubmettedCandidatePhoto">
                                <label for="upload<?php echo($key) ?>">
                                    <img src="<?php echo base_url(); ?>assets/images/edit.png" title="edit candidate" alt="">
                                </label>
                                <input style="display: none" type="file" name="upload" id="upload<?php echo($key) ?>" class="upload-box changePhotoInp" placeholder="Upload File" />
                            </span>
                            <span class="deleteTestCandidate"><img src="<?php echo base_url(); ?>assets/images/delete.png" title="delete candidate" alt=""></span>

                        </td>
                     </tr>  
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
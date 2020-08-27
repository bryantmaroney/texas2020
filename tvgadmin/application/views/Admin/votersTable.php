<table id="votersDataTable" class="table table-striped table-bordered nowrap dataTable" cellspacing="0" width="100%">
    <thead>
        <tr class="tableHead">
            <th class="name">IP ADDRESS</th>
            <th class="position">GEO LOCATED</th>
            <th class="office">EMAIL ADDRESS</th>
            <th class="age">SURVEY COMPLETE</th>
            <th class="age">SHARED</th>
            <th class="age">NETWORKS SHARED</th>

        </tr>
    </thead>
    <tbody class="candidatesTableBody">
        <?php foreach ($voters as $voter) { ?>
            <tr class="voterColumn" voterID="<?= $voter['id'] ?>">
                <td><?= $voter['ip'] ?></td>
                <td><?= $voter['city'].",".$voter['state'] ?></td>
                <td>testemail.gmail.com</td>
                <td>
                    <!-- <?php if ($voter['survey_complete']) { ?>
                        <span class="yes">Yes</span>
                    <?php } else { ?>
                        <span class="no">No</span>
                    <?php } ?>  -->  
                    <span class="yes">Yes</span>
                </td>
                <td class="no">
                     <!-- <?php if ($voter['shared']) { ?>
                        <span class="yes">Yes</span>
                    <?php } else { ?>
                        <span class="no">No</span>
                    <?php } ?> -->
                    <span class="no">No</span>
                </td>
                <td class="shareIcons">
                    <div>
                        <img src="<?php echo base_url(); ?>assets/images/fb.png" width="38" height="38" alt="img">
                        <img src="<?php echo base_url(); ?>assets/images/tw.png" width="38" height="38" alt="img">
                        <img src="<?php echo base_url(); ?>assets/images/in.png" width="38" height="38" alt="img">
                        <img src="<?php echo base_url(); ?>assets/images/lin.png" width="38" height="38" alt="img">
                    </div>
                </td>
            </tr>
        <?php } ?>  
    </tbody>
</table> 

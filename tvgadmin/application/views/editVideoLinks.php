<?php $this->load->view('Admin/adminHeader'); ?>

<div>
    <h2>Edit Video Links</h2>
    <p>Edit the links for the 10 issue videos below.</p>
    <p>
        <form method="post" action="<?php echo base_url() ?>admin/update-video-links">
            <?php
            ?>
            <?php foreach($video_links as $v):?>
                <div class="form-group row">
                    <label for="link_<?php echo $v->id ?>" class="col-sm-2 col-form-label"><?php echo $v->id ?>. <?php echo $v->short_title ?></label>
                    <div class="col-sm-10">
                        <input class="form-control" name="link_<?php echo $v->id ?>" value="<?php echo $v->link ?>">
                    </div>
                </div>
            <?php endforeach;?>
            <button id="save-links" class="btn btn-primary">Save</button>
        </form>
    </p>
</div>


</body>




<script src="<?php echo base_url(); ?>assets/js/bootstrap-4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin.js"></script>







<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</html>

<?php echo form_open('user/delete/$id') ?>

<?php echo form_fieldset('User Delete') ?>

<p> Are you sure you want to delete: <?php echo $firstname.' '.$lastname ?> </p>

<?php echo form_submit('delete_user', 'Delete User') ?>

<?php echo form_fieldset_close() ?>

<?php echo form_close() ?>
<?php
$firstname_data = array(
              'name'        => 'firstname',
              'id'          => 'firstname',
              'value'       => set_value('firstname'),
              'maxlength'   => '100',
              'size'        => '50',
            );

$lastname_data = array(
              'name'        => 'lastname',
              'id'          => 'lastname',
              'value'       => set_value('lastname'),
              'maxlength'   => '100',
              'size'        => '50',
            );
            
$username_data = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => set_value('username'),
              'maxlength'   => '100',
              'size'        => '50',
            );            

$email_data = array(
              'name'        => 'email',
              'id'          => 'email',
              'value'       => set_value('email'),
              'maxlength'   => '100',
              'size'        => '50',
            );

$password_data = array(
              'name'        => 'password',
              'id'          => 'password',
              'value'       => set_value('password'),
              'maxlength'   => '100',
              'size'        => '50',
            );

$password_confirm_data = array(
              'name'        => 'password_confirm',
              'id'          => 'password_confirm',
              'value'       => set_value('password_confirm'),
              'maxlength'   => '100',
              'size'        => '50',
            );
?>

<?php echo form_open('user/add') ?>

<?php echo form_fieldset('User Information') ?>

<p>
<?php echo form_label('Firstname', 'firstname') ?>
<?php echo form_error('firstname') ?>
<?php echo form_input($firstname_data) ?>
</p>

<p>
<?php echo form_label('Lastname', 'lastname') ?>
<?php echo form_error('lastname') ?>
<?php echo form_input($lastname_data) ?>
</p>

<p>
<?php echo form_label('Username', 'username') ?>
<?php echo form_error('username') ?>
<?php echo form_input($username_data) ?>
</p>

<p>
<?php echo form_label('Email', 'email') ?>
<?php echo form_error('email') ?>
<?php echo form_input($email_data) ?>
</p>

<p>
<?php echo form_label('Password', 'password') ?>
<?php echo form_error('password') ?>
<?php echo form_password($password_data) ?>
</p>

<p>
<?php echo form_label('Confirm Password', 'password_confirm') ?>
<?php echo form_error('password_confirm') ?>
<?php echo form_password($password_confirm_data) ?>
</p>

<?php echo form_submit('add_user', 'Add User') ?>

<?php echo form_fieldset_close() ?>

<?php echo form_close() ?>
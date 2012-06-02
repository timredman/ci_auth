<!-- Notify that user has been added -->
<?php if ($this->session->flashdata('status')) { ?>
<div class="notify">
	<?php echo $this->session->flashdata('status'); ?> 
</div>
<?php } ?>

<a href="<?php echo base_url('user/add') ?>">Add User</a> 

<?php if($users){ ?>
	
<table>
	<tr>
		<thead>
			<th>Username</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
	</tr>
<?php foreach ($users->result() as $user) { ?>
		<tr>
			<td><?php echo $user->username ?></td>
			<td><?php echo $user->firstname ?></td>
			<td><?php echo $user->lastname ?></td>
			<td><?php echo $user->email ?></td>
			<td><a href="<?php echo base_url('user/edit').'/'.$user->id ?>">Edit</a></td>
			<td><a href="<?php echo base_url('user/delete').'/'.$user->id ?>">Delete</a></td>
		</tr>
<?php } ?>
	
</table>
	
<?php } else { ?>

	<div class="Alert">No users found</div>

<?php } ?>
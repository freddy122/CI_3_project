<div class="responsive-table">
<?php
	foreach($user as $key => $val){
?>

<table class="table table-striped">
	<tr>
		<td>Nom</td>
		<td><?php echo ($val['nom']); ?></td>
	</tr>	
	
	<tr>
		<td>Prenom</td>
		<td><?php echo ($val['prenom']); ?></td>
	</tr>	
	<tr>
		<td>Role</td>
		<td><?php echo ($val['role_id']); ?></td>
	</tr>	
	<tr>
		<td>Username</td>
		<td><?php echo ($val['username']); ?></td>
	</tr>	
</table>
<?php
	}
?>
</div>
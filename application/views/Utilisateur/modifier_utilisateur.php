<div class="responsive-table">
<?php
	//print_r($user_edit);
	foreach($user_edit as $key => $val){
		
?>
<table class="table table-striped">
	<input type="hidden" value="<?php echo $val['id_user'];?>" id="iduser"/>
	<tr>
		<td>Nom</td>
		<td><input type="text"  value="<?php echo $val['nom'] ;?>" class="input-medium" id="nom"></td>
	</tr>
	<tr>
		<td>Prénom</td>
		<td><input type="text" value="<?php echo $val['prenom'] ;?>" id="prenom" ></td>
	</tr>
	<tr>
		<td>Rôle</td>
		<td><input type="text" value="<?php echo $val['role_id'] ;?>" id="role"></td>
	</tr>
	<tr>
		<td>Pseudo</td>
		<td><input type="text" value="<?php echo $val['username'] ;?>" id="pseudo"></td>
	</tr>
</table>
<?php
	}
?>
</div>
<?php
	foreach($role_edit as $key => $val){	
?>
<table class="table table-striped">
	<input type="hidden" value="<?php echo $val['id_role'];?>" id="idrole"/>
	<tr>
		<td>Nom</td>
		<td><input type="text"  value="<?php echo $val['lib_role'];?>" class="input-medium" id="librole"></td>
	</tr>
</table>
<?php
	}
?>
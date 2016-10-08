<div class="responsive-table">
<?php
	foreach($role as $key => $val){
?>

<table class="table table-striped">
	<tr>
		<td>Libelle role </td>
		<td><?php echo ($val['lib_role']); ?></td>
	</tr>		
</table>
<?php
	}
?>
<div class="responsive-table">
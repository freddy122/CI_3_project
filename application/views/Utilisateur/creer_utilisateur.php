<div class="responsive-table">
<table class="table table-striped">
	<input type="hidden"  id="iduser"/>
	<tr>
		<td>Nom</td>
		<td><input type="text"   class="input-medium" id="nom"></td>
	</tr>
	<tr>
		<td>Prénom</td>
		<td><input type="text"  id="prenom" ></td>
	</tr>
	<tr>
		<td>Rôle</td>
		<td>		
			<select id="role" required="true">
			<?php $i=1; foreach($role as $roles): ?>
				<option value="<?php echo $roles->id_role; ?>">
						<?php echo $roles->lib_role; ?>
				</option>
			<?php $i++; endforeach; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Pseudo</td>
		<td><input type="text"  id="pseudo"></td>
	</tr>
	<tr>
		<td>Mot de passe</td>
		<td><input type="text"  id="password"></td>
	</tr>
</table>
</div>

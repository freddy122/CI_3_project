<div id="content">
	<div class="panel box-shadow-none content-header">
	  <div class="panel-body">
		<div class="col-md-12">
			<h3 class="animated fadeInLeft">Gestion utilisateur</h3>
			<p class="animated fadeInDown">
			  index <span class="fa-angle-right fa"></span> Role utilisateur
			</p>
		</div>
	  </div>
	</div>
	
	<div class="col-md-12 top-20 padding-0">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading"><h3>Liste rôle utilisateur</h3></div>
				<div class="panel-body">
				  <br/>
				  <div><a  href='<?php echo site_url("Users/creer_role/"); ?>' class="btn btn-success" role="button" role="button" data-toggle="modal" data-target="#modal_ajout" data-remote="false">Ajouter nouvel Rôle</a></div>
				  <br/>
				  <div class="responsive-table">
				  <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th><center>Role</center></th>
								<th><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=1;
							foreach($user_role as $list_role){
								echo '<tr class="odd gradeX">';
								echo '<td><center>'.$list_role -> lib_role.'</center></td>';
								echo '<td>
								<center>
								<a href='.site_url("Users/modifier_role/".$list_role->id_role).' class="btn btn-primary btns" role="button" data-toggle="modal" data-target="#Modif_role" data-remote="false">Modifier</a>';?>
								
								<a href="<?php echo site_url("Users/supprimer_role/".$list_role->id_role)?>" onclick="return(confirm('voulez vous supprimer cet utilisateur'))" class="btn btn-danger" role="button">supprimer</a>
							<?php	echo '<a href ='.site_url("Users/voir_role/".$list_role->id_role).' class="btn btn-success" role="button" role="button" data-toggle="modal" data-target="#voir_role" data-remote="false">Voir detail</a>
								</center>
								</td>';
								echo '</tr>';
							}
							?>
						</tbody>
					</table>			
				  </div>
			  </div>
			</div>
		</div>  
	</div>
</div>


<!-- voir -->
<div class="modal fade" id="voir_role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Information Utilisateur</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sortir</button>
      </div>
    </div>
  </div>
</div>

<!-- modifier -->
<div class="modal fade" id="Modif_role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier Role</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="modifier_role" >Modifier</button>
      </div>
    </div>
  </div>
</div>

<!-- ajouter -->
<div class="modal fade" id="modal_ajout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ajouter Utilisateur</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="ajouter_role" >Ajouter</button>
      </div>
    </div>
  </div>
</div>
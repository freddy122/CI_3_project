      
		<div class="container-fluid" style="height:1200px">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="index.html"> Dashboard</a>
                        </li>
                        <li>
                            <a href="calendar.html"> Calendar</a>
                        </li>
                        <li>
                            <a href="stats.html"> Statistics (Charts)</a>
                        </li>
                        <li>
                            <a href="form.html"> Forms</a>
                        </li>
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                       
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="#">Dashboard</a> <span class="divider">/</span>	
	                                    </li>
	                                    <li>
	                                        <a href="#">Settings</a> <span class="divider">/</span>	
	                                    </li>
	                                    <li class="active">Tools</li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
					<?php if($msg = $this->session->flashdata("message")) ?>
 
    <p class="success">
        <?php echo $msg?>
    </p>
					<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Bootstrap dataTables</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Nom</th>
												<th>Prénom</th>
												<th>Role</th>
												<th>Username</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
										
										<?php
										$i=1;
										foreach($user_list as $list_user){
											echo '<tr class="odd gradeX">';
											echo '<td>'.$list_user -> nom.'</td>';
											echo '<td>'.$list_user -> prenom.'</td>';
											echo '<td>'.$list_user -> role.'</td>';
											echo '<td>'.$list_user -> username.'</td>';
											echo '<td>
											<a href='.site_url("Users/modifier/".$list_user->id_user).' class="btn btn-primary btns" role="button" data-toggle="modal" data-target="#myModal" >Modifier</a>
											<a href ='.site_url("Users/supprimer/".$list_user->id_user).' class="btn btn-danger supprimer" role="button" >Supprimer</a>
											<a href ='.site_url("Users/voir/".$list_user->id_user).' class="btn btn-success" role="button" role="button" data-toggle="modal" data-target="#myModal_view" >Voir detail</a>
											</td>';
											echo '</tr>';
										}
									    ?>

			
	

										</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
					
                </div>
            </div>
            

        </div>
	

	
	<!-- Button to trigger modal -->
    <!--a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a-->
         
    <!-- Modal edit -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Modification Utilisateur</h3>
		</div>
		<div class="modal-body">
			<p id="contents"></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
			<button class="btn btn-primary" name="modif_agent" id="modifier">Modifier</button>
		</div>
    </div>
	
	<!-- Modal show -->
	<div id="myModal_view" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Modification Utilisateur</h3>
		</div>
		<div class="modal-body">
			<p id="contents"></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
			<button class="btn btn-primary" name="modif_agent" id="modifier">Modifier</button>
		</div>
    </div>
	


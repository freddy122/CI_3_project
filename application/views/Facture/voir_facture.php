<?php print_r($factr); ?>

          <div id="content">
            <div class="tabs-wrapper text-center">             
             <div class="panel box-shadow-none text-left content-header">
                  <div class="panel-body" style="padding-bottom:0px;">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Detail Facture JIRAMA</h3>

                    </div>

                  </div>
              </div>
            <div class="col-md-12 tab-content">

            <div role="tabpanel" class="tab-pane fade active in" id="tabs-area-demo" aria-labelledby="tabs1">
					
				<div class="col-md-12 top-20 padding-0" id="form_modifier" >
					<div class="col-md-12">
					  <div class="panel">
					  <?php $i=1; foreach($factr as $factur): ?>
						<div class="panel-heading">
							<h3>Detail facture du
								<?php 
									$dtdeb = new DateTime($factur->date_deb);
									echo $dtdeb->format('d/m/Y'); ?> 
									au
								<?php 
									$dtfin = new DateTime($factur->date_fin);
									echo $dtfin->format('d/m/Y');
								?>
							</h3>
						</div>
						<div class="panel-body">							  
							<br/>
							  <div class="responsive-table">
									<form class="form-horizontal row-fluid" action="" method="post">	
									<div class="form-group form-animate-text" style="margin-top:40px !important;">
										<input class="form-text mask-fallback " type="text"  name="facture_m[date_deb]" id="name" value="<?php echo $factur->consommation;?>">
										<span class="bar"></span>
										<label>Consommation : </label>
									</div>	
									
									<div class="form-group form-animate-text" style="margin-top:40px !important;">
										<input class="form-text mask-fallback " type="text"  name="facture_m[date_deb]" id="name" value="<?php echo $factur->date_deb;?>">
										<span class="bar"></span>
										<label>Date Début : </label>
									</div>
																				
									<div class="form-group form-animate-text" style="margin-top:40px !important;">
										
										<input class="form-text mask-fallback " type="text"  name="facture_m[date_fin]" id="names"  value="<?php echo $factur->date_fin;?>" >
										<span class="bar"></span>
										<label>Date Fin : </label>
									</div>
										
									<?php $i++; endforeach; ?>	
									</form>
									 <a href="<?php echo base_url('index.php/Facture/index')?>" class="btn-danger">retour</a>
							  </div>
					  </div>
					  </div>
				   </div>  
              </div>
            
				
				
            </div>
				
              </div>
            </div>
          </div>

		  
		  


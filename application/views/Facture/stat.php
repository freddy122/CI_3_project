          <div id="content">
            <div class="tabs-wrapper text-center">             
             <div class="panel box-shadow-none text-left content-header">
                  <div class="panel-body" style="padding-bottom:0px;">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Statistique Facturation JIRAMA</h3>

                    </div>
                  </div>
              </div>
            <div class="col-md-12 tab-content">

            <div role="tabpanel" class="tab-pane fade active in" id="tabs-area-demo" aria-labelledby="tabs1">
					
				<div class="col-md-12 top-20 padding-0" id="form_modifier" >
					<div class="col-md-12">
					  <div class="panel">
						<div class="panel-heading"><h3>Stat</h3></div>
							<div class="panel-body">
							  
							<br/>

							  <div class="responsive-table">
									<form class="form-horizontal row-fluid" action="" method="post">
									
										
									</form>
									
									<div class="form-group form-animate-text" style="margin-top:40px !important;">
										<input class="form-text mask-fallback datepickers" type="text" required="" id="date_stat1" required="true">
										<span class="bar"></span>
										<label>Date Début : </label>
									</div>
																				
									<div class="form-group form-animate-text" style="margin-top:40px !important;">
										<input class="form-text mask-fallback datepickers1" type="text" required=""  id="date_stat2" required="true">
										<span class="bar"></span>
										<label>Date Fin : </label>
									</div>
									
									<button class="btn btn-primary" id="aff_stat">Afficher stat</button>
									<div id="chart1" class="aff_chart"></div>
							  </div>
					  </div>
					  </div>
				   </div>  
              </div>	
            </div>				
		  </div>
		</div>
	  </div>

<script src="<?php echo base_url(); ?>assets/js/stat_facture.js"></script>		  
		  


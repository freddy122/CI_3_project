<div id="content">

	 <div class="col-md-12">
                  <div class="col-md-12">
                    <div class="col-md-12 tabs-area">
                      <div class="liner"></div>
                      <ul class="nav nav-tabs nav-tabs-v5" id="tabs-demo6">
                        <li class="active">
                         <a href="#tabs-demo6-area1" data-toggle="tab" title="Plannification tâche production">
                          <span class="round-tabs one">
                            <!--i class="glyphicon glyphicon-home"></i-->
							<span class="fa fa-calendar-o"></span>
                          </span> 
                        </a>
                      </li>

                      <li>
                        <a href="#tabs-demo6-area2" data-toggle="tab" title="Visualisation tâche production">
                         <span class="round-tabs two">
                           <!--i class="glyphicon glyphicon-user"></i-->
						   <span class="fa fa-eye"></span>
						   
                         </span> 
                       </a>
                     </li>

                     <li>
                      <a href="#tabs-demo6-area3" data-toggle="tab" title="Diagramme de gantt">
                       <span class="round-tabs three">
                        <!--i class="glyphicon glyphicon-gift"></i-->
						<span class="fa fa-area-chart"></span>
                      </span> </a>
                    </li>

                    <li>
                      <a href="#tabs-demo6-area4" data-toggle="tab" title="blah blah">
                       <span class="round-tabs four">
                         <i class="glyphicon glyphicon-comment"></i>
                       </span> 
                     </a>
                   </li>

                   <li><a href="#tabs-demo6-area5" data-toggle="tab" title="completed">
                     <span class="round-tabs five">
                      <i class="glyphicon glyphicon-ok"></i>
                    </span> </a>
                  </li>
                </ul>
                <div class="tab-content tab-content-v5">
                  <div class="tab-pane fade in active" id="tabs-demo6-area1">	
				  <div style="padding:9px">
				 
					<div  class="row">					
						<div class="col-md-1">
							<label>Departement</label>
						</div>
						<div class="col-md-3">
							<select multiple style="width:100%;" id="slct_dept">
								<?php foreach($depts as $dept){ ?>
									<option value="<?php echo $dept['dept'];?>">
											<?php echo $dept['dept']; ?>
									</option>
								<?php }?>												
							</select>
						</div>
						
						<div class="col-md-1">
							<label>Unité de production </label>
						</div>

						<div class="col-md-3">
							<select multiple style="width:100%;" id="slct_up">												
							</select>
						</div>
												
						<div class="col-md-1">
							<label>Fonction</label>
						</div>
						<div class="col-md-3">						
							<select multiple style="width:100%;" id="slct_fonct"></select>
						</div>
						
					</div>
					<br/>
					<div class="row">
						<div class="col-md-1">
								<label>Matricule</label>
						</div>
						<div class="col-md-11">
							<select multiple style="width:100%;" id="slct_matr"></select>
						</div>
					</div>
					</div>

                    <p class="text-center">
                      <button  class="btn btn-success btn-round green" id="btn_filtrer"> Filtrer <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></button>
                    </p>
					<div style="padding:9px;" id="resultat_datas">
						<table id="result_data" class="display" width="100%" cellspacing="0">
							<thead>
									<th>dept</th>
									<th>up</th>
									<th>fonction</th>
									<th>matricule</th>
									<th>nomp</th>	
									<th>prenomp</th>								
							</thead>

						</table>
					</div>
                  </div>
                  <div class="tab-pane fade" id="tabs-demo6-area2">
                    <h3 class="head text-center">Create a Mimin<sup>™</sup> Profile</h3>
                    <p class="narrow text-center">
                      Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                    </p>

                    <p class="text-center">
                      <a href="" class="btn btn-success btn-round green"> create your profile <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                    </p>

                  </div>
                  <div class="tab-pane fade" id="tabs-demo6-area3">
                    <h3 class="head text-center">Mimin goodies</h3>
                    <p class="narrow text-center">
                      Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                    </p>

                    <p class="text-center">
                      <a href="" class="btn btn-success btn-round green"> start using Mimin <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                    </p>
                  </div>
                  <div class="tab-pane fade" id="tabs-demo6-area4">
                    <h3 class="head text-center">Drop comments!</h3>
                    <p class="narrow text-center">
                      Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                    </p>

                    <p class="text-center">
                      <a href="" class="btn btn-success btn-round green"> start using Mimin <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                    </p>
                  </div>
                  <div class="tab-pane fade" id="tabs-demo6-area5">
                    <div class="text-center">
                      <i class="img-intro icon-checkmark-circle"></i>
                    </div>
                    <h3 class="head text-center">thanks for staying tuned! <span style="color:#f48250;">♥</span> Bootstrap</h3>
                    <p class="narrow text-center">
                      Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                    </p>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>      
              </div>
	
</div>
<script src="<?php echo base_url(); ?>assets/js/tache_prod.js"></script>
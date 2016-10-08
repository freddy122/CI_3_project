$(document).ready(function(){
	$("#form_ajouter").css('display','none');
	$("#resultat").css('display','none');
	
	/* gestion utilisateur */
	
	/* Modifier */
	$("#myModal").on("show.bs.modal", function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"));
    });
	
    $("#myModal").on('hidden.bs.modal',function(e){
		$(this).removeData();
	})
	
	$("#Modif_role").on("show.bs.modal", function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"));
    });
	
    $("#Modif_role").on('hidden.bs.modal',function(e){
		$(this).removeData();
	})
	
	/* fin modifier */
	
	/* voir */
	$("#myModal_view").on("show.bs.modal", function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"));
    });

	$("#myModal_view").on('hidden.bs.modal',function(e){
		$(this).removeData();
	})
	
	$("#voir_role").on("show.bs.modal", function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"));
    });

	$("#voir_role").on('hidden.bs.modal',function(e){
		$(this).removeData();
	})
	
	$("#voir_facture").on("show.bs.modal", function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"));
    });

	$("#voir_facture").on('hidden.bs.modal',function(e){
		$(this).removeData();
	})
	/* fin voir*/
	
	/* Ajouter */
	$("#modal_ajout").on("show.bs.modal", function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"));
    });

	$("#modal_ajout").on('hidden.bs.modal',function(e){
		$(this).removeData();
	})
	
	$("#ajout_role").on("show.bs.modal", function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"));
    });

	$("#ajout_role").on('hidden.bs.modal',function(e){
		$(this).removeData();
	})	
	

	
	$('#ajouter_fact').click(function(){
		$("#list_facture").css('display','none');
		$("#form_ajouter").css('display','block');
	})
	
	/* fin Ajouter*/
	
	/* Modifier */
	$("#modifier").click(function(){
		var nom    = $("#nom").val();
		var prenom = $("#prenom").val();
		var role   = $("#role").val();
		var pseudo = $("#pseudo").val();
		var iduser = $("#iduser").val();

		$.ajax({
			type: "POST",
			url: "execute_update",
			cache: false,
			data: {'iduser':iduser,'nom':nom,'prenom':prenom,'role':role,'pseudo':pseudo},
			success: function(res) {
				window.location.href = "index";
			}
		})
	})
	
	
	$("#modifier_role").click(function(){
		var idrole     = $("#idrole").val();
		var librole    = $("#librole").val();

		$.ajax({
			type: "POST",
			url: "execute_update_role",
			cache: false,
			data: {'librole':librole,'idrole':idrole},
			success: function(res) {
				window.location.href = "role";
			}
		})
	})
	/* Fin Modifier */
	
	
	/* Ajouter */
	$('#ajouter').click(function(){
		var nom      = $("#nom").val();
		var prenom   = $("#prenom").val();
		var role     = $("#role").val();
		var pseudo   = $("#pseudo").val();
		var iduser   = $("#iduser").val();
		var password = $("#password").val();
		alert(nom);
		$.ajax({
			type: "POST",
			url: "insert_data",
			cache: false,
			data: {'iduser':iduser,'nom':nom,'prenom':prenom,'role':role,'pseudo':pseudo,'password':password},
			success: function(res) {
				window.location.href = "index";
			}
		})
	})
	
	$('#ajouter_role').click(function(){
		var librole      = $("#librole").val();
		$.ajax({
			type: "POST",
			url: "insert_data_role",
			cache: false,
			data: {'librole':librole},
			success: function(res) {
				window.location.href = "role";
			}
		})
	})
	
	/* Fin Ajouter */
	/* fin gestion utilisateur */
	
	/* facture */
	/* deb rechercher facture*/
	
	$('#btn_rechercher').click(function(){
		$("#resultat").css('display','block');
		datedeb = $("#d_deb").val();
		datefin = $("#d_fin").val();
		//alert(datedeb+'_'+datefin);
		$.ajax({
			type: "POST",
			url: "recherche_avancer",
			cache: false,
			data: {'datedeb':datedeb,'datefin':datefin},
			success: function(res) {
				//window.location.href = "index";
				
				$("#resultat").css('display','block');
				$("#resultat").html(res);
			}
		})
		
		
	})
	
	
	/* fin rechercher facture*/
	
	/* stat */
	$('#btn_stat').click(function(){
		var p = getJsonStat();
		console.log(p.cons);
	})
	
	
	function getJsonStat(){
		datedeb = $("#d_deb_stat").val();
		datefin = $("#d_fin_stat").val();
		var aar ;
		$.ajax({
			type: "POST",
			url: "statitistique",
			cache: false,
			async : false,
			datatype: 'json',
			data: {'datedeb':datedeb,'datefin':datefin},
			success: function(res) {
				var aa = JSON.parse(res);
				aar = aa;
			}
		})	
		return aar;
	}
	
	/*$.jqplot.config.enablePlugins = true;
				var s1 = [2, 6, 7, 10];
				var ticks = ['a', 'b', 'c', 'd'];
				 
				plot1 = $.jqplot('chart1', [s1], {
					
					animate: !$.jqplot.use_excanvas,
					seriesDefaults:{
						renderer:$.jqplot.BarRenderer,
						pointLabels: { show: true }
					},
					axes: {
						xaxis: {
							renderer: $.jqplot.CategoryAxisRenderer,
							ticks: ticks
						}
					},
					highlighter: { show: false }
				});
			 
				$('#chart1').bind('jqplotDataClick',
					function (ev, seriesIndex, pointIndex, data) {
						$('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
					}
				);*/
	/* fin stat */
	
	/* fin facture */
	$(".datepickers").datepicker({
			dateFormat:'yy-mm-dd'
	});
		
	$(".datepickers1").datepicker({
		dateFormat:'yy-mm-dd'
	});
	$('#datatables-example').DataTable();
	
	$("#myModal").on('hidden.bs.modal',function(e){
		$(this).removeData();
	})

	$('.supprimer').click(function(){
		return(confirm('Voulez vous supprimer'));
	})
	
	/*ged*/
	
	/*select client*/
	$("#dataclient").change(function(){
		
		idclient = $(this).val();
		$.ajax({
			type: "POST",
			url: "getprestation",
			cache: false,
			data: {'idcli':idclient},
			success: function(msg) {
				$("#slct_presta").html(msg);
			}
		})
		
		$.ajax({
			type: "POST",
			url: "getcommande",
			cache: false,
			data: {'idcli':idclient},
			success: function(msg) {
				$("#slct_commande").html(msg);
			}
		})
		
		$.ajax({
			type: "POST",
			url: "getlotclient",
			cache: false,
			data: {'idcli':idclient},
			success: function(msg) {
				$("#slct_lot").html(msg);
			}
		})
		
	})
	
	/* select presta*/
	$("#slct_presta").change(function(){
		
		idpresta = $(this).val();
		//alert(idpresta);
		$.ajax({
			type: "POST",
			url: "getcommandepresta",
			cache: false,
			data: {'idprest':idpresta},
			success: function(msg) {
				$("#slct_commande").html(msg);
			}
		})
		
		$.ajax({
			type: "POST",
			url: "getlotpresta",
			cache: false,
			data: {'idprest':idpresta},
			success: function(msg) {
				$("#slct_lot").html(msg);
			}
		})
		
		
		
	})
	
	/* fin select presta*/
	
	
	/* select commande*/
	$("#slct_commande").change(function(){		
		idcommande = $(this).val();
		$.ajax({
			type: "POST",
			url: "getlotcommande",
			cache: false,
			data: {'idcom':idcommande},
			success: function(msg) {
				$("#slct_lot").html(msg);
			}
		})
	})
	
	/* fin select commande*/
	
	/* clique rechercher*/
	$("#affiche_ged").click(function(){
		client = $("#dataclient").val();
		presta = $("#slct_presta").val();
		cmd    = $("#slct_commande").val();
		lot    = $("#slct_lot").val();
		st_pli = $("#slct_statut_pli").val();
		//alert(st_pli+'_'+lot+'_'+cmd+'_'+presta+'_'+client);
		
		
	})
	//affiche_ged
	/* fin clique rechercher*/
	
	/*fin ged*/
	
	
	
	
})
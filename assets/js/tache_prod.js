$(document).ready(function(){
	/* tache production */
	$("#slct_up").load(
         "getup",
         function(zMsg)
         {
            $(this).html(zMsg) ;
         }
    )
	
	$("#slct_fonct").load(
         "getfonction",
         function(zMsg)
         {
            $(this).html(zMsg) ;
         }
    )
	
	$("#slct_matr").load(
         "getpersonnel",
         function(zMsg)
         {
            $(this).html(zMsg) ;
         }
    )
	
	
	
	$("#slct_dept").change(function(){
		iddept = $(this).val();
		//alert(iddept);
		$.ajax({
			type: "POST",
			url: "getup",
			cache: false,
			data: {'iddept':iddept},
			success: function(msg) {
				$("#slct_up").html(msg);
			}
		})
		
		$.ajax({
			type: "POST",
			url: "getfonction",
			cache: false,
			data: {'iddept':iddept},
			success: function(msg){
				$("#slct_fonct").html(msg);
			}
		})
		
		$.ajax({
			type: "POST",
			url: "getpersonnel",
			cache: false,
			data: {'iddept':iddept},
			success: function(msg){
				$("#slct_matr").html(msg);
			}
		})
		
	})
	
	
	$("#slct_up").change(function(){
		idup = $(this).val();
		//alert(idup);
		$.ajax({
			type: "POST",
			url: "getfonction",
			cache: false,
			data: {'idup':idup},
			success: function(msg) {
				$("#slct_fonct").html(msg);
			}
		})
		
		$.ajax({
			type: "POST",
			url : "getpersonnel",
			cache: false,
			data: {'idup':idup},
			success: function(msg) {
				$("#slct_matr").html(msg);
			}
		})
		
	})
	
	$("#slct_fonct").change(function(){
		idfoct = $(this).val();
		idup = $("#slct_up").val();
		//alert(idfoct);
		$.ajax({
			type: "POST",
			url: "getpersonnel",
			cache: false,
			data: {'idfoct':idfoct,'idup':idup},
			success: function(msg) {
				$("#slct_matr").html(msg);
			}
		})
	})
	
	$("#btn_filtrer").click(function(){
		
		iddept = $("#slct_dept").val();
		idup   = $("#slct_up").val();
		idfoct = $("#slct_fonct").val();		
		idpers = $("#slct_matr").val();
		
		alert(iddept+"_"+idup+"_"+idfoct+"_"+idpers);
		
		$.ajax({
			type: "POST",
			url: "ajax_resultat",
			cache: false
			//data: {,'idfoct':idfoct},
			/*success: function(msg) {
				$("#result_data").html(msg);
				
			}*/
		})
		
	})
	
	$('#result_data').DataTable();
	
	
	/*$('#result_data').DataTable({
		"processing": true,
		"serverSide": true,
		"aaSorting": [[1,'asc']],
		"sPaginationType": "full_numbers",
		"order": [[ 3, "asc" ]],
		"oLanguage" : {
			"sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
			"sZeroRecords": "Nothing found - sorry",
			"sInfo": "Affichage de _START_ &agrave;  _TOTAL_ enregistrements",
			"sInfoEmpty": "Showing 0 to 0 of 0 records",
			"sInfoFiltered": "(filtered from _MAX_ total records)",
			"sProcessing": "Chargement...",
			"oPaginate": {
				'sFirst': 'D\351but',
				'sLast': 'Fin',
				'sNext': 'Suivant',
				'sPrevious': 'Pr&eacutec&eacutedent'
			},
		},
		"scrollX" : true,
		"scrollY" : 520,		
		"iDisplayStart": 0,
		"ajax": {
			//"url" : "ajax_resultat"
		    "data": function (d) {
				d.filtre = 'visualiser';
				d.filtre_numchantier = $('#filtre_numchantier').val();
				d.filtre_nom         = $('#filtre_nom').val();
				d.filtre_prenom      = $('#filtre_prenom').val();
				d.filtre_adresse     = $('#filtre_adresse').val();
				d.filtre_codepostal  = $('#filtre_codepostal').val();
				d.filtre_ville       = $('#filtre_ville').val();
			}
		},

		"columns": [
			{ "data": "dept" },
			{ "data": "up" },
			{ "data": "fonction" },
			{ "data": "matricule" },
			{ "data": "nomp" },
			{ "data": "prenomp" }
		],
	});*/
	
	
	/* fin tache production */
})
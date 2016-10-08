$(document).ready(function(){

	
	
	
	

  /*jQuery.jqplot.config.enablePlugins = true;
  plot7 = jQuery.jqplot('chart1',
    [[['Verwerkende industrie', 9],['Retail', 8], ['Primaire producent', 7],
    ['Out of home', 6],['Groothandel', 5], ['Grondstof', 4], ['Consument', 3], ['Bewerkende industrie', 2]]],
    {
      title: ' ',
      seriesDefaults: {shadow: true, renderer: jQuery.jqplot.PieRenderer, rendererOptions: { showDataLabels: true } },
      legend: { show:true }
    }
  );*/

	
	
	$("#aff_stat").click(function(){
		var dt1 = $("#date_stat1").val();
		var dt2 = $("#date_stat2").val();
		var arr = [];
		$.ajax({
			type: "POST",
			url: "getstat",
			async : false,
			datatype: 'json',
			data: {'datedeb':dt1,'datefin':dt2},
			success: function(res) {
				
				var aa = JSON.parse(res);
				//$(".aff_chart").html("<div id=\"chart1\" ></div>")
				arr = aa;
			}
		})
		//console.log(arr);
		var arr_date = [];
		var arr_data = [];
		$.each(arr,function(a,b){
			//console.log(a+'--'+b);
			arr_date.push(b);
			arr_data.push(a);
			
		})
		
		console.log(arr_date);
		console.log(arr_data);
		/*var aa = [];
		for(var i=0;i<arr_data.length;i++){
			//console.log(arr_data[i])
			aa.push(arr_data[i])
		}*/
		//console.log(arr_data);
		
		$.jqplot.config.enablePlugins = true;
		var s1 = [2, 6, 7.5, 10.2];
		console.log(s1)
		var ticks = ['a', 'b', 'c', 'd'];
		 console.log(ticks)
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
		);
		
		
	})
})
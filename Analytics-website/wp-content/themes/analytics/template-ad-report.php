
<?php
/**
 * Template Name: AD Report Template
 */
?>


<script type="text/javascript" src="http://tools.mwiseapps.com/js/Chart.js"></script>

  
  <div class="fluid-container section content-items"> 

<div class="content-items">

	<div class="container container-pad-50">

	<?php 
			$base_api = "http://mwiseapps.com/analytics/";
			
				$re_code = $_GET['re_code'];
				// create curl resource 
			$ch = curl_init(); 
			
			curl_setopt($ch, CURLOPT_URL, $base_api ."api/campaign/get_report/".$re_code); 

			//return the transfer as a string 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

			// $output contains the output string 
			$output = curl_exec($ch); 

			// close curl resource to free up system resources 
			curl_close($ch); 

			$response = json_decode(json_decode($output)->response);

			$options = $response[0]->re_selected;

			// echo  $options;
			$logo = $response[0]->re_logo;
			$created_date = $response[0]->re_created_date;
			$email = $response[0]->re_user_email;  


			$camp_id = $link_id = $response[0]->re_camp_id;
			
			// create curl resource 
			$ch = curl_init(); 

			// set url 
			curl_setopt($ch, CURLOPT_URL, $base_api . "api/linkly/get_total_opens/". $link_id); 

			//return the transfer as a string 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

			// $output contains the output string 
			$output = curl_exec($ch); 

			// close curl resource to free up system resources 
			curl_close($ch); 
			$response = json_decode(json_decode($output)->response); 
			
			// var_dump($response);
			$ad_name = $response[0]->li_name;

			$camp_id = $link_id;

			$total_opens = $response[0]->Total_Opens;
	
	
	?>

			<div class="row report-title">
				<div class='col-xl-3'>
					<img id="report_img" src=<?php echo $base_api.'public/logos/'. $logo ;?> style="width:200px;height:200px" />
				</div>
				<div class='col-xl-8'>
							<div class='title' data-value="<?php echo $ad_name;?>">
									<?php echo "[".$ad_name."] - ANALYTICS REPORT";?>
							</div>
							<div>
									<span>Launch Date: 
										<?php  $date = date_create($response[0]->li_timestamp);
												echo date_format($date,"d-M-Y"); 
										?>
									</span> <span>Report Date: 
										<?php  
												echo date_format(new DateTime($created_date),"d-M-Y"); 
										?>
									</span>
							</div>
					</div>
				<div class='col-xl-1 font20'>
					<span><a class='ad_report'></a></span>  <span class=""><i class="fa fa-print" aria-hidden="true"></i></span>  <span class=""><i class="fa fa-download" aria-hidden="true"></i></span>	
				</div>
			</div>
			
			
			<div class="report-box summary" >
				<div class="report-header first"><div class="text"><h4>summary</h4></div>
				<!-- <div class="buttons"><a>printer friendly</a><a>download</a><a>report</a></div> -->
			
				</div>
				 <div class="report-body">

					<table class="pure-table pure-table-horizontal" style="    width: 100%;"> 
					<thead>
						<tr>
							<th>Total Clicks</th>
							<th>Unique Clicks</th>
							<th>Fraudulent Clicks</th>
							<th>Conversation</th>
							<th>Bots</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
					
						<tr>
						
							<td><?php echo $response[0]->Total_Opens;?></td>
							<td><?php echo $response[0]->Total_Opens;?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>

						</tr>
					</tbody>
					</table> 
					
				 </div>
			</div>
			<div class="report-box">
				<div class="report-header margin-top"><h4>READING TREND</h4></div>
				<div class="report-body">
					<div class="col-xl-12 ad-reading-time">
						<canvas id="line_chart_time">
					</div>
				</div>
			</div>	
			<div class="row">
			<div class="report-box col-xl-6 client-platform">
				<div class="report-header margin-top"><h4>CLIENTS</h4></div>

				<div class="report-body">
				
					<div class="" align="center">
						<div class="pie-chart-size"><canvas id="pie_chart_client"></div>
						<div id="legend_client" class="legend_client"></div>
					</div>
					<!-- <div class="col-xl-6" align="center"><div class="pie-chart-size"><canvas id="pie_chart_referer"></div>
						<div id="legend_referer" class="legend_client"></div>
					</div> -->
					<!-- <div class="col-xl-4"></div> -->
				</div>
				
			</div>

			<div class="report-box col-xl-6 referers">
				<div class="report-header margin-top"><h4>REFERERS</h4></div>
				<div class="report-body">
						<div class="" align="center"><div class="pie-chart-size"><canvas id="pie_chart_referer"></div>
						<div id="legend_referer" class="legend_client"></div>
					</div>
				</div>
			</div>	
	</div>

			<div class="report-half-box row">
			<div class="report-box col-xl-6 geo-location">
						<div class=" report-header margin-top"><h4>GEOLOCATION</h4></div>
						<div style="width:100%"><div id="vmap" style="height: 400px; width: 540px" class="report-body"></div></div>
					</div>
			<div class="report-box col-xl-6 top-browsers" >
						<div class=" report-header margin-top"><h4>BROWSERS</h4></div>
						<div class="country-group report-body" style="width:100%">
							<div class="pie-chart-size">
								<canvas id="pie_chart">
							</div>
							<div id="legend_country" class="legend_client"></div>
						</div>
			</div>
			</div>
			<div class="report-box click-stream">
				<div class="report-header margin-top"><h4>CLICK STREAM</h4></div>
				 <div class="report-body">
					<table class="pure-table pure-table-horizontal" style="    width: 100%;"> 
						<thead>
							<tr>
								<th>IP</th>
								<th>Referer</th>
								<th>Country</th>
								<th>Service Provider</th>
								<th>B</th>
								<th>P</th>
								<th>Device</th>
								<th>Access Time</th>
							</tr>
						</thead>
						<tbody>
						<?php 	

									$base_api = "http://mwiseapps.com/analytics/";

									// $link_id = $_GET['link_id'];
									// echo $link_id;
									// create curl resource 
		 							$ch = curl_init(); 
									curl_setopt($ch, CURLOPT_URL, $base_api . "api/linkly/get_links_details_by_id/".$link_id); 
									//return the transfer as a string 
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
									// $output contains the output string 
									$output = curl_exec($ch); 
									// close curl resource to free up system resources 
									curl_close($ch); 
									$response = json_decode(json_decode($output)->response); 

									// var_dump($response);
									
									for ($i=0; $i < count($response); $i++) { ?>
										
											<tr>
										
													<td><?php echo $response[$i]->ld_ip;?></td>
													<td><?php if($response[$i]->ld_referer == ''){echo 'Unknown';}else{ echo $response[$i]->ld_referer;}?></td>
													<td><?php echo $response[$i]->ld_country;?></td>
													<td><?php echo '';?></td>
													<td><?php echo $response[$i]->ld_browser;?></td>
													<td><?php echo $response[$i]->ld_platform;?></td>
													<td><?php echo $response[$i]->ld_platform;?></td>
													<td><?php echo date('M/d/Y h:i:s',strtotime($response[$i]->ld_timestamp));?></td>
											</tr>


									<?php } ?>
							
						</tbody>
					</table> 
				 </div>
			</div>

			<div class="row">

						<div class="report-box col-xl-8 clicks-comparison" >
							<div class="report-header margin-top"><h4>CLICKS - PERFORMACE COMPARISON</h4></div>
							<div class="report-body">
								<div class="reading-time-margin">
									<canvas id="clicks_comparison"></canvas>
									<?php 	// create curl resource 
										$ch = curl_init();

										curl_setopt($ch, CURLOPT_URL, $base_api . "api/linkly/get_ad_latest"); 

										$post = ['email'=> $email];
										
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
										curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
										$response = curl_exec($ch);
										curl_close($ch);  

										$response = json_decode(json_decode($response)->response); 

										
										
										for ($i=1; $i < count($response); $i++) { ?>

											<div class='clicks-comparison-camp' style='display:none'
													data-value=''
													data-camp-opens='<?php echo $response[$i]->Total_Opens?>'
													data-camp-name='<?php echo $response[$i]->li_name?>'><?php echo $response[$i]->li_name?></div>

								<?php } ?>
								</div>
							</div>
						</div>	


				</div>

		
	</div>
		
</div>
<script src="http://tools.mwiseapps.com/js/jquery.vmap.js"></script>
<script src="http://tools.mwiseapps.com/js/jquery.vmap.world.js"></script>
<link rel="stylesheet" type="text/css" href="http://tools.mwiseapps.com/js/jqvmap.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css">

<script>
		var labels = [];
	var data =[];
	var temp=[];

	var camp_id = '<?php echo $camp_id?>';
	var email = '<?php echo wp_get_current_user()->user_email;?>';

	var total_opens = '<?php echo $total_opens;?>';

	var ad_name = '<?php echo $ad_name;?>';

	<?php 
	  					// $base_api = "http://mwiseapps.com/analytics/";
						  
	 	// create curl resource 
		 $ch = curl_init(); 
		 
		// set url 
		curl_setopt($ch, CURLOPT_URL, $base_api . "api/linkly/" . $link_id); 

		//return the transfer as a string 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

		// $output contains the output string 
		$output = curl_exec($ch); 

		// close curl resource to free up system resources 
		curl_close($ch); 
		
		$response = json_decode(json_decode($output)->response);


		$daterange = (object)$response[0];
		$browser = (object)$response[1];
		$referer = (object)$response[2];
		$platform = (object)$response[3];
		$country = (object)$response[4];
		
		// var_dump((object)$daterange[0]);
		
		

		$b_label = array();
		$b_data = array();
		
		foreach($browser as $row1){
		
			$b_label[] = '"' . $row1->browser . '"';
			$b_data[] = $row1->browser_total;
			
		}

		$p_label = array();
		$p_data = array();
		
		foreach($platform as $row2){
		
			$p_label[] = '"' . $row2->platform . '"';
			$p_data[] = $row2->platform_total;
			
		}
		
		$r_label = array();
		$r_data = array();
		
		foreach($referer as $row3){
		
			$r_label[] = '"' . $row3->referer . '"';
			$r_data[] = $row3->referer_total;
			
		} 

		$ci_data = array();
		$ci_name = array();
		$ci_code = array();
		foreach($country as $row4){
		
			$ci_name[] = '"' . $row4->countryname . '"';
			$ci_data[] = $row4->country_total;
			$ci_code[] = '"' . $row4->countrycode . '"';
		
			
		}

	 ?>

	 

	<?php $index = 0; foreach($daterange as $row){?>

		data[<?php echo $index;?>] = <?php echo $row->unique_opens;?>;
		temp[<?php echo $index;?>] = <?php echo $row->unique_opens;?>;
		labels[<?php echo $index;?>] = "<?php echo $row->time;?>";

	<?php $index++; }?>

	var brow_label = [<?php echo join(',',$b_label)?>];
	var brow_data = [<?php echo join(',',$b_data)?>];
	var plat_label = [<?php echo join(',',$p_label)?>];
	var plat_data = [<?php echo join(',',$p_data)?>];
	var ref_label = [<?php echo join(',',$r_label)?>];
	var ref_data = [<?php echo join(',',$r_data)?>];
	var valuez =  [<?php echo join(',',$ci_name)?>];
	var total =  [<?php echo join(',',$ci_data)?>];
	var ct_code = [<?php echo join(',',$ci_code)?>];


	var line_chart_linkly;

	var backgrounds = ["#009bdb", "#00c8c2", "#ffc446", "#ff95e0", "#ff7575", "#7457a8"];

	jQuery('.container-pad-50').css('opacity',1);

var browser_data = {
		labels : brow_label,
		datasets : [{
			data : brow_data,
			label: "Browser Type",
            backgroundColor: [
                "#2f4e8b",
                "red",
                "yellow",
				"green",
				"black",
				"white"]
		}]
		
	}

	var platform_data = {
		labels : plat_label,
		datasets : [{
			data : plat_data,
			label: "Platform/Device",
            backgroundColor: [
                "#2f4e8b",
                "red",
                "yellow",
				"green",
				"black",
				"white"]
		}]
		
	} 
	var referer_data = {
		labels : ref_label,
		datasets : [{
			data : ref_data,
            backgroundColor: [
                "#2f4e8b",
                "red",
                "yellow",
				"green",
				"black",
				"purple"]
		}]
		
	}
	
	var countries = [];
	var countrynames = [];
	for(var i =0;i<=valuez.length;i++){
		var ct_name = valuez[i];
		var ct_codezz = ct_code[i];
		countries[ct_codezz] = total[i];
		countrynames[ct_codezz] = ct_name;
	}
//	countries['au'] = 20;
	var map = jQuery('#vmap').vectorMap({
	 				    map: 'world_en',
	 				    backgroundColor: null,
	 				   values: countries,
						color: '#ffffff',
	 				    hoverOpacity: 0.7,
//	 				    selectedColor: '#ffffff',
	 				   enableZoom: true,
	 				    showTooltip: true,
	 				   onLabelShow: function(event, label, code)
	 				    {
	 				    
	 				            label.text( countrynames[code.toLowerCase()] + " ("+ countries[code.toLowerCase()]+" Opens)");
	 		
	 				    },
						selectedRegions: ['MO', 'FL', 'OR'],
	 				    scaleColors: ['#FFFFFF',"#7457a8"],
	 				    normalizeFunction: 'polynomial',
						// onRegionClick: function(event, code){
						// 	event.preventDefault();
						// 	country_code = '('+code+')';
			
						// 	cus_table.search(country_code).data().draw();
						// 		//event.preventDefault();
						// 	console.log(arguments);
						// 	return false;

						// 	}
					 });
					 

					 var base_url = 'http://mwiseapps.com/analytics/';
					// var camp_id = 21;	


					 var pie_chart_client = document.getElementById('pie_chart_client').getContext('2d');
					var myPieChart_client = null;
	

		// jQuery.ajax({

		// 	type: "GET",
		// 	url: base_url + "api/campaign/popular_email_clients/" + camp_id,
		// 	// data:{   },
		// 	dataType: 'json',
		// 	success: function(res) {
				var newData = plat_data;
				var newLabel = plat_label;
				// var res_array = res.response;
				var temp = plat_data;

				var arr = [1,2,3,4];
				var total=0;
				for(var i in temp) { total += temp[i]; }
				
				for (var index = 0; index < temp.length; index++) {
					// newData.push(temp[index].Total_Opens);
					// newLabel.push(temp[index].EmailClient);

					create_legend("#legend_client","legend-number-"+index,plat_label[index], index, temp[index], Math.round(temp[index]*100/total), backgrounds[index]);

				}

				console.log(newData);
				console.log(newLabel);

				var piedata = {
						    labels: newLabel,
						    datasets: [
						        {
						            data: newData,
						            backgroundColor: backgrounds,
						            hoverBackgroundColor: backgrounds,
							}]
						};

					if(myPieChart_client != null){
						myPieChart_client.destroy();
					}

				// console.log(piedata);
				var options = {        
					cutoutPercentage: 75,
					legend:{
						position:'bottom',
						display: false
					}
				};
				myPieChart_client = new Chart(pie_chart_client,{

					    type: 'doughnut',
					    data: piedata,
						options: options
					});


					var pie_chart_referer = document.getElementById('pie_chart_referer').getContext('2d');
					var myPieChart_referer = null;
	

		// jQuery.ajax({

		// 	type: "GET",
		// 	url: base_url + "api/campaign/popular_email_clients/" + camp_id,
		// 	// data:{   },
		// 	dataType: 'json',
		// 	success: function(res) {
				var newData = ref_data;
				var newLabel = ref_label;
				// var res_array = res.response;
				var temp = ref_data;

				var arr = [1,2,3,4];
				var total=0;
				for(var i in temp) { total += temp[i]; }
				
				for (var index = 0; index < temp.length; index++) {
					// newData.push(temp[index].Total_Opens);
					// newLabel.push(temp[index].EmailClient);
					ref_label[index] = ref_label[index].replace("http://", "");
					ref_label[index] = ref_label[index].replace("https://", "");
					ref_label[index] = ref_label[index].replace("www.", "");
					ref_label[index] = ref_label[index].replace(".com", "");
					ref_label[index] = ref_label[index].split("/")[0];

					
					create_legend("#legend_referer","legend-number-referer-"+index,ref_label[index], index, temp[index], Math.round(temp[index]*100/total), backgrounds[index]);

				}

				console.log(newData);
				console.log(newLabel);

				var piedata = {
						    labels: newLabel,
						    datasets: [
						        {
						            data: newData,
						            backgroundColor: backgrounds,
						            hoverBackgroundColor: backgrounds,
							}]
						};

					if(myPieChart_referer != null){
						myPieChart_referer.destroy();
					}

				// console.log(piedata);
				var options = {        
					cutoutPercentage: 75,
					legend:{
						position:'bottom',
						display: false
					}
				};
				myPieChart_referer = new Chart(pie_chart_referer,{

					    type: 'doughnut',
					    data: piedata,
						options: options
					});


					var pie_chart = document.getElementById('pie_chart').getContext('2d');
		var myPieChart = null;
		// jQuery.ajax({

		// 	type: "GET",
		// 	url: base_url + "api/campaign/popular_countries/" + camp_id,
		// 	// data:{   },
		// 	dataType: 'json',
		// 	success: function(res) {
				var newData = brow_data;
				var newLabel = brow_label;
				// var res_array = res.response;
				var temp = brow_data;

				var total=0;
				for(var i in temp) { total += temp[i]; }

				for (var index = 0; index < temp.length; index++) {
					// newData.push(temp[index].Total_Opens);
					// newLabel.push(temp[index].Country);
					create_legend("#legend_country","legend-number-country"+index, brow_label[index], index, temp[index], Math.round(temp[index]*100/total), backgrounds[index]);

				}

				var piedata = {
						    labels: newLabel,
						    datasets: [
						        {
						            data: newData,
						            backgroundColor: backgrounds,
						            hoverBackgroundColor: backgrounds,
							}]
						};

					if(myPieChart != null){
						myPieChart.destroy();
					}

				var options = {        
					cutoutPercentage: 75,
					legend:{
						position:'bottom',
						display: false
					}
				};
					 myPieChart = new Chart(pie_chart,{

					    type: 'doughnut',
					    data: piedata,
						options: options
					});


		// 	}
		// });

		var line_chart_time = document.getElementById('line_chart_time').getContext('2d');
		var myline_chart_time = null;

		// res = JSON.parse(res);
				//console.log(res.response);
				// var res_array = res.response;
				// var temp = JSON.parse(res_array);
				//console.log(JSON.parse(res_array));
				var newData = data;
				var newLabel = labels;
				// for (var index = 0; index < temp.length; index++) {
				// 	var element = temp[index];
				// 	// console.log(element);
				// 	newData.push(element.percentage);
				// 	newLabel.push(element.time + "s");
					
				// }

				var data = {
								labels: newLabel,
								datasets: [
									{
										label: "Reading Trend",
										fill: true,
										lineTension: 0,
										pointRadius: 0,
										borderWidth: 1 ,
										backgroundColor: '#faf8fc',
										borderColor: "#7457a8",
										borderCapStyle: 'butt',
										borderDash: [],
										borderDashOffset: 0.0,
										borderJoinStyle: 'miter',
										pointBorderColor: "#7457a8",
										pointBackgroundColor: "#fff",
										pointBorderWidth: 5,
										pointHoverRadius: 5,
										pointHoverBackgroundColor: "rgba(118, 81, 188, 0.72)",
										pointHoverBorderColor: "#7457a8",
										pointHoverBorderWidth: 2,
										pointHitRadius: 2,
										data: newData,
										spanGaps: false,
										zeroLineColor: "#7457a8"
									}
								]
							};

					if(myline_chart_time != null)
						{
							myline_chart_time.destroy();
						}

						var options = {        
								// cutoutPercentage: 75,
								legend:{
									// position:'bottom',
									display: false
								},
								elements: {
									line: {
										tension: 0
									}
								}
							};
					 myline_chart_time = new Chart(line_chart_time, {
							type: 'line',
							data: data,
							options: options
						});

				


		// 	}
		// });

		function create_legend(legend_name, legend_number, name, index, total, percentage, backgrounds){
			jQuery(legend_name).append("<div class='legend-group'><div class='legend-name'>"+name+
																	"</div><div id='"+legend_number+"' class='legend-number'>"+total+
																	"</div><div class='legend-name-percentage'>"+percentage+"%<div></div>");
					// console.log(backgrounds);
					jQuery("#"+legend_number).css("background-color",backgrounds);
		}




		var device_label = [];
		var device_data = [];
		var clicks_comparison = document.getElementById('clicks_comparison').getContext('2d');
		var myBarChart = null;

// 		jQuery.each(res, function(key,value) {
						// device_label.push(current_camp_name);
						// device_data.push(total_perc);
// // 						str += value.Browser_Usage + "--";
// 					});
				device_label.push(ad_name);
				device_data.push(total_opens);

				jQuery('.clicks-comparison-camp').each(function(){
					var cam_name = jQuery(this).data('camp-name');
					var cam_opens = jQuery(this).data('camp-opens');

					device_label.push(cam_name);
					device_data.push(cam_opens);
				}).promise().done(function(){
					var barData = {
							labels: device_label,
							datasets: [
								{
									label: 'Opens',

									backgroundColor: backgrounds,
									borderColor: backgrounds,
									borderWidth: 1,
				//			 			            fillColor: '#382765',
									data: device_data
								}
							]
						};

					
					if(myBarChart != null)
					{
						myBarChart.destroy();
					}
					
					myBarChart = new Chart(clicks_comparison, {
						type: 'bar',
						data: barData,
						options:{
							scales: {
								xAxes: [{
									barPercentage: 0.2
								}]
							},
							legend:{
								position:'bottom',
								display: false
							}
						}
				});
				})

		

		function performClick(elemId) {
			var elem = document.getElementById(elemId);
			if(elem && document.createEvent) {
				var evt = document.createEvent("MouseEvents");
				evt.initEvent("click", true, false);
				elem.dispatchEvent(evt);
			}
		}

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					jQuery('#blah')
						.attr('src', e.target.result)
						.width(200)
						.height(200);

						jQuery('#report_img')
						.attr('src', e.target.result)
						.width(200)
						.height(200);
						
				};

				reader.readAsDataURL(input.files[0]);
			}
		}
		
		jQuery(document).ready(function(){
			jQuery('header').remove();
			jQuery('footer').remove();
			var options = '<?php echo $options?>';

			options = options.split(',');
		
			for (var index = 0; index < options.length; index++) {
				var element = options[index];
				console.log(element);
				if(element != '')
				{
					jQuery('.'+element).show();
				}
			}
		})
	
</script>

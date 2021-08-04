
<?php
/**
 * Template Name: AD Tracker Template
 */
?>
<style>
	.back-kv{
		background-image: url('<?php echo get_field('background_kv');?>');
		background-repeat: no-repeat;
		background-size: cover;
		min-height: 332px;
		background-position: center center;
	}
</style>

<script type="text/javascript" src="http://tools.mwiseapps.com/js/Chart.js"></script>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="fluid-container back-kv no-bottom">
  	<div class="container">
  	<div class="heading-kv">
  	<?php /*?><h1><span class="white-bar">THE EDGE </span> FOR <?php echo get_field('the_edge_for');?></h1><?php */?>
	  <h1 class="lato"><?php 	
								$base_api = "http://mwiseapps.com/analytics/";
								
								$link_id = base64_decode(urldecode($_GET['link_id']));
	
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
								echo $ad_name;

								$datezz = $response[0]->datezz;

								
								?></h1>
	  </div>
	  
  	<div class="cta-kv">
	  <span>Launch Date: <?php 
		 	$date = date_create($response[0]->li_timestamp);
			 echo date_format($date,"d M Y"); ?></span>

<span>Open To Track: <?php echo $response[0]->limit; ?></span>
  	</div>
  	</div>
  </div>
  <!-- <div class="fluid-container section content-items"> </div> -->
<div class="fluid-container section content-items"> 

<div class="content-items">

	<div class="container container-pad-50">

			<div class="row report-title">
				<div class='col-xl-3'>
					<img id="report_img" src="#" style='display:none'/>
				</div>
				<div class='col-xl-7'>
							<div class='title' data-value="<?php echo $ad_name;?>">
									<?php echo "[".$ad_name."] - LINK REPORT";?>
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
				<div class='col-xl-2 font20'>
					<span><a class='ad_report'>REPORT</a></span>  <span class="">
						<!-- <i class="fa fa-print" aria-hid3den="true"></i></span>  <span class=""><i class="fa fa-download" aria-hidden="true"></i> -->
					
					</span>	
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
							<td><?php echo $response[0]->unique_opensss;?></td>
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
				
					<div class="" align="center" style="display: inline-flex;">
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
						<div class="" align="center" style="display: inline-flex;"><div class="pie-chart-size"><canvas id="pie_chart_referer"></div>
						<div id="legend_referer" class="legend_client"></div>
					</div>
				</div>
			</div>	
	</div>

			<div class="report-half-box row">
			<div class="report-box col-xl-6 geo-location">
						<div class=" report-header margin-top"><h4>GEOLOCATION</h4></div>
						<div style="width:100%"><div id="vmap" style="height: 400px; " class="report-body"></div></div>
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
									// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

									$post = ['datezz'=> $datezz];

									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

									// $output contains the output string 
									$output = curl_exec($ch); 
									// close curl resource to free up system resources 
									curl_close($ch); 
									$response = json_decode(json_decode($output)->response); 

									// var_dump($response);
									
									for ($i=0; $i < count($response); $i++) { ?>
										
											<tr>
										
													<td><?php echo $response[$i]->ld_ip;?></td>
													<td><?php if($response[$i]->ld_referer == ''){echo 'Unknown';}else{ 
														
														$response[$i]->ld_referer = str_replace("http://", "", $response[$i]->ld_referer);       
														$response[$i]->ld_referer = str_replace("https://", "", $response[$i]->ld_referer);
														$response[$i]->ld_referer = str_replace("wwww.", "", $response[$i]->ld_referer);
														$response[$i]->ld_referer = str_replace(".com", "", $response[$i]->ld_referer);
														$response[$i]->ld_referer = explode("/", $response[$i]->ld_referer)[0];   
				
														echo $response[$i]->ld_referer;
														
														}?></td>
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

						<div class="report-box col-xl-8 clicks-comparison" style='display:none'>
							<div class="report-header margin-top"><h4>OPENS - PERFORMACE COMPARISON</h4></div>
							<div class="report-body">
								<div class="reading-time-margin">
									<canvas id="clicks_comparison">
								</div>
							</div>
						</div>	


				</div>



			<div class="row customise-control">
								<div class="report-box col-xl-12 report no-padding" style='display:none'>
									<!-- <div><i class="fa fa-angle-left" aria-hidden="true"></i></div> -->
									<div class="report-header margin-top"><p>customise your own analytics report</p></div>
								</div>	

								<div class="report-box col-xl-4 report bg-color border-right" style='display:none'>
									<div class='select-module'>SELECT MODULES:</div>
									<div>
										<div class='module' data-value='summary'>Summary</div>
										<div class='module' data-value='total-clicks'>Total Clicks</div>
										<div class='module' data-value='unique-clicks'>Unique Clicks</div>
										<div class='module' data-value='client-platform'>Client Platforms</div>
										<div class='module' data-value='top-browsers'>Top Browsers</div>
										<div class='module' data-value='mobile-devices'>Top Mobile Devices</div>
										<div class='module' data-value='geo-location'>Geo-Location</div>
										<div class='module' data-value='referers'>Referers</div>
										<div class='module' data-value='click-stream'>Click Stream</div>
										
									</div>
								</div>	
								<div class="report-box col-xl-4 report bg-color border-right" style='display:none'>
									<div class='select-module'>SELECT PERFORMANCE COMPARISON:</div>
										<div>
											<div class='module'>None</div>
											<div class='module'>Overal Averages</div>
											<div class='module'>Industry Averages</div>
											<div class='module'>Your Previous Campaign</div>
											<div class='module'>Selected Previous Links</div>

											<?php 	// create curl resource 
										$ch = curl_init();

										curl_setopt($ch, CURLOPT_URL, $base_api . "api/linkly/get_ad_latest"); 

										$email = wp_get_current_user()->user_email;   
										$post = ['email'=> $email];
										
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
										curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
										$response = curl_exec($ch);
										curl_close($ch);  

										$response = json_decode(json_decode($response)->response); 

										
										
										for ($i=1; $i < count($response); $i++) { ?>

											<div class='sub-padding-left module'  
													data-value=''
													data-camp-opens='<?php echo $response[$i]->Total_Opens?>'
													data-camp-name='<?php echo $response[$i]->li_name?>'><?php echo $response[$i]->li_name?></div>

								<?php } ?>
											<!-- <div class=' sub-padding-left module'>Campaign Link 1</div>
											<div class=' sub-padding-left module '>Campaign Link 2</div>
											<div class=' sub-padding-left module '>Campaign Link 3</div>
											<div class=' sub-padding-left module '>Campaign Link 4</div> -->
										</div>
								</div>	
								
								<div class="report-box col-xl-4 report bg-color" style='display:none'>
									<div class='select-module center' style='padding-left:0px'>UPLOAD YOUR LOGO:</div>
									<div class='center'>(only available on Growing & Pro plans)</div>
									<div class='drag-drop-box'><img id="blah" src="#" alt="Your Logo" style='margin-top: 10px;margin-bottom: 10px;'/></div>
									<div class='center'>
										<input type="button" class="add-new-button" id="browser" onclick="performClick('theFile');" value="BROWSER">
										<input type="file" id="theFile" style='display:none' onchange="readURL(this);" accept="image/x-png,image/jpeg"/>
									</div>
								</div>	

								
								<div class="report-box col-xl-12 report create-report" style='display:none'>
									<input type="button" class="add-new-button" id="create_report" value="CREATE REPORT">
									
								</div>
								

				</div>	
		</div>
			
		
		

				
	<!-- <div class="report-box">
			
				<div class="report-header margin-top"><h1 style="color:black">Number of Clicks</h1></div>

				<div class="report-body">
					<div class="col-xs-12"> 
						<canvas id="line_chart_linkly" class="line_chart_time" ></canvas>
					
					</div>
			</div>
		</div>	

		<div class="col-xs-6"> 
		<h1 style="color:black">Browser</h1>
		<canvas id="bar_chart_linkly" class="line_chart_time" ></canvas>
		 </div>	
		 <div class="col-xs-6">
		 <h1 style="color:black">Platform/Device</h1>
		<canvas id="platform_chart_linkly" class="line_chart_time" ></canvas>
		 </div>	
		 <div style="text-align: center" class="col-xs-6"> 
		 <h1 style="color:black">Referer</h1> 
		 <div style="height: 500px">
		<canvas style="height: 500px" id="referer_chart_linkly" class="line_chart_time" ></canvas> 
		 </div>	</div>	


	</div> -->
		
	</div>
		
</div>

<!-- <div class="subscribe">
<div class="container">
	<div class="row">
	 	<div class="col-md-8 auto">
	 		<div><h3 class="gotham">SIGN UP TO OUR NEWSLETTER FOR TIPS &amp; SPECIAL OFFERS</h3></div>
	 		<div class="row">
	 		<div class="col-md-9"><input placeholder="Enter your email address here."></div>
	 		<div class="col-md-3 no-lm"><button>Submit</button></div>
	 		
	 		</div>
	 	</div>
	</div>
</div> -->
	
</div>
  
  
  
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
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

	<?php 
	  					$base_api = "http://mwiseapps.com/analytics/";
						  
	 	// create curl resource 
		 $ch = curl_init(); 
		 
		// set url 
		curl_setopt($ch, CURLOPT_URL, $base_api . "api/linkly/" . $link_id); 

		//return the transfer as a string 
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

		$post = ['datezz'=> $datezz];

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

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

			// $row3->referer = $row3->referer.replace("http://", "");
			// $row3->referer = $row3->referer.replace("https://", "");
			// $row3->referer = $row3->referer.replace("www.", "");
			// $row3->referer = $row3->referer.replace(".com", "");
			// $row3->referer = $row3->referer.split("/")[0];
		
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

	var backgrounds = ["#005c99","#006bb3", "#007acc", "#008ae6", "#0099ff","#1aa3ff", "#33adff", "#4db8ff","#66c2ff","#80ccff"];


	jQuery('.container-pad-50').css('opacity',1);

	jQuery(document).ready(function(){
		
			// line_chart_linkly = document.getElementById('line_chart_linkly').getContext('2d');
			// bar_chart_linkly = document.getElementById('bar_chart_linkly').getContext('2d');
			// platform_chart_linkly = document.getElementById('platform_chart_linkly').getContext('2d');
			// referer_chart_linkly = document.getElementById('referer_chart_linkly').getContext('2d');
	
	
	
				
// 			var click_data = {
// 				labels : labels,
// 				datasets : [{
// 					data : data,
// 					label: "Number of Click",
// 					backgroundColor: [ "#2f4e8b","#2f4e8b","#2f4e8b","#2f4e8b","#2f4e8b","#2f4e8b","#2f4e8b","#2f4e8b","#2f4e8b","#2f4e8b","#2f4e8b"]
// 				}]
				
// 			}
// //		alert((data.sort(function(a, b){return b-a}))[0]);
	
// 			var myBarChart = new Chart(line_chart_linkly, {

// 				type: 'bar',
// 				data: click_data,
// 				options: {
// 					legend: {
// 						display: false
// 					},
// 					layout: {
//     				padding: 30
//   					},
					
// 			animation: {
// 			duration: 0,
// 			onComplete: function () {
// 				// render the value of the chart above the bar
// 				var ctx = this.chart.ctx;
// //				ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, 'normal', Chart.defaults.global.defaultFontFamily);
// 				ctx.fillStyle = this.chart.config.options.defaultFontColor;
// 				ctx.textAlign = 'center';
// 				ctx.textBaseline = 'bottom';
// 				this.data.datasets.forEach(function (dataset) {
// 					for (var i = 0; i < dataset.data.length; i++) {
// 						var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model;
// 						ctx.fillText(dataset.data[i], model.x, model.y - 5);
// 					}
// 				});
// 			}},
// 			scales: {
// 				yAxes: [{
// 					ticks: {
// 						min: 0
// //						,
// //						max: temp.sort(function(a, b){return b-a})[0] + 2,
// //						stepSize: 1
// 					}
// 				}]
// 			}
       
// //					 title: {
// //            display: true,
// //            text: 'Custom Chart Title'
// //        }
//     }
// 			});

	
// 			var myBarChart = new Chart(bar_chart_linkly, {
// 				type: 'horizontalBar',
// 				data: browser_data,
// 				options: {
// 					legend: {
// 						display: false
// 					 },
// 					layout: {
//     				padding: 30
//   					},
// 					animation: {
// 			duration: 0,
// 			onComplete: function () {
// 				// render the value of the chart above the bar
// 				var ctx = this.chart.ctx;
// //				ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, 'normal', Chart.defaults.global.defaultFontFamily);
// 				ctx.fillStyle = this.chart.config.options.defaultFontColor;
// 				ctx.textAlign = 'center';
// 				ctx.textBaseline = 'bottom';
// 				this.data.datasets.forEach(function (dataset) {
// 					for (var i = 0; i < dataset.data.length; i++) {
// 						var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model;
// 						ctx.fillText(dataset.data[i], model.x + 21, model.y);
// 					}
// 				});
// 			}},
//         scales: {
//             xAxes: [{
//                 ticks: {
//                     min: 0
// //					,
// //                    stepSize: 1,
// //					max: tempda.sort(function(a, b){return b-a})[0] + 2
//                 }
//             }]
//         }
//     }
// 			});
// 				var myBarChart = new Chart(platform_chart_linkly, {
// 				type: 'bar',
// 				data: platform_data,
// 				options: {
// 					legend: {
// 					display: false
// 					},
// 					layout: {
//     				padding: 30
//   					}, 
// 					animation: {
// 					duration: 0,
// 					onComplete: function () {
// 							// render the value of the chart above the bar
// 							var ctx = this.chart.ctx;
// 			//				ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, 'normal', Chart.defaults.global.defaultFontFamily);
// 							ctx.fillStyle = this.chart.config.options.defaultFontColor;
// 							ctx.textAlign = 'center';
// 							ctx.textBaseline = 'bottom';
// 							this.data.datasets.forEach(function (dataset) {
// 								for (var i = 0; i < dataset.data.length; i++) {
// 									var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model;
// 									ctx.fillText(dataset.data[i], model.x, model.y - 5);
// 								}
// 							});
// 			}},
// 				scales: { 
// 					yAxes: [{
// 						ticks: {
// 							min: 0
// //							,
// //							stepSize: 1,
// //							max: tempdata.sort(function(a, b){return b-a})[0] + 2
// 						}
// 					}]
// 				}
//     }
// 			});
				
// 				var myBarChart = new Chart(referer_chart_linkly, {
// 				type: 'doughnut',
// 				data: referer_data,
// 				options: {
// 					 legend: {
//                 display: true,
// //                position: 'left',
// 				position: 'bottom',
//                 labels: {
//                     fontColor: 'rgb(255, 99, 132)'
//                 }},
// //					layout: {
// //    				padding: 30 
// //  					}, 
//     }  
// 			});
		
		

	});
	

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
	 				    scaleColors: ['#FFFFFF',"#005c99"],
	 				    normalizeFunction: 'polynomial',
						// onRegionClick: function(event, code){
						// 	event.preventDefault();
						// 	country_code = '('+code+')';
			
						// 	cus_table.search(country_code).data().draw();
						// 		//event.preventDefault();
						// 	//  console.log(arguments);
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

				//  console.log(newData);
				//  console.log(newLabel);

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

				// //  console.log(piedata);
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

				//  console.log(newLabel);
				// new new_data = [];
				var new_label = [];
				// for (let index = 0; index < ref_label.length; index++) {
				// 	const element = ref_label[index];
					
				// 	ref_label[index] = ref_label[index].replace("http://", "");
				// 	ref_label[index] = ref_label[index].replace("https://", "");
				// 	ref_label[index] = ref_label[index].replace("www.", "");
				// 	ref_label[index] = ref_label[index].replace(".com", "");
				// 	ref_label[index] = ref_label[index].split("/")[0];

				// 	if(new_label.indexOf(ref_label[index] != -1)){
				// 		new_label.push(ref_label[index]);
				// 		new_data.push(ref_data)
				// 	}

				// }
				// var res_array = res.response;
				var temp = ref_data;

				var arr = [1,2,3,4];
				var total=0;
				for(var i in temp) { total += temp[i]; }
				
				for (var index = 0; index < temp.length; index++) {
					// newData.push(temp[index].Total_Opens);
					// newLabel.push(temp[index].EmailClient);
					if(ref_label[index] == "") continue;
					ref_label[index] = ref_label[index].replace("http://", "");
					ref_label[index] = ref_label[index].replace("https://", "");
					ref_label[index] = ref_label[index].replace("www.", "");
					ref_label[index] = ref_label[index].replace(".com", "");
					ref_label[index] = ref_label[index].split("/")[0];
					
					create_legend("#legend_referer","legend-number-referer-"+index,ref_label[index], index, temp[index], Math.round(temp[index]*100/total), backgrounds[index]);

				}

				//  console.log(newData);
				//  console.log(newLabel);

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

				// //  console.log(piedata);
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
				////  console.log(res.response);
				// var res_array = res.response;
				// var temp = JSON.parse(res_array);
				////  console.log(JSON.parse(res_array));
				var newData = data;
				var newLabel = labels;
				// for (var index = 0; index < temp.length; index++) {
				// 	var element = temp[index];
				// 	// //  console.log(element);
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
										borderWidth: 3 ,
										backgroundColor: ' rgb(26, 163, 255)',
										borderColor: backgrounds[0],
										borderCapStyle: 'butt',
										borderDash: [],
										borderDashOffset: 0.0,
										borderJoinStyle: 'miter',
										pointBorderColor: backgrounds[0],
										pointBackgroundColor: "#fff",
										pointBorderWidth: 5,
										pointHoverRadius: 5,
										pointHoverBackgroundColor: "rgb(26, 163, 255)",
										pointHoverBorderColor: backgrounds[0],
										pointHoverBorderWidth: 2,
										pointHitRadius: 2,
										data: newData,
										spanGaps: false,
										zeroLineColor: backgrounds[0]
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

			if(name == '') return;
			jQuery(legend_name).append("<div class='legend-group'><div class='legend-name'>"+name+
																	"</div><div id='"+legend_number+"' class='legend-number'>"+total+
																	"</div><div class='legend-name-percentage'>"+percentage+"%<div></div>");
					// //  console.log(backgrounds);
					jQuery("#"+legend_number).css("background-color",backgrounds);
		}


		jQuery('.ad_report').click(function(){

			jQuery('#blah').attr('src', '#');
				jQuery('.module').removeClass('module-selected');



			jQuery('.report-box').each(function(){
				jQuery(this).fadeOut(1500);
			}).promise().done(function(){
					jQuery('.report').fadeIn(1500);
					
				})

				jQuery('#report_img').attr('src','#');
				jQuery('#report_img').hide();
				jQuery('#blah').attr('src','#');
		})
		

		jQuery('.module').click(function(){
			if(jQuery(this).hasClass('module-selected')){
				jQuery(this).removeClass('module-selected');
			}else{
				jQuery(this).addClass('module-selected');
			}
		})

		var opens_comparison_label = [];
			var opens_comparison_data = [];

		jQuery('#create_report').click(function(){

			var options = [];

			var logo = jQuery('#report_img').attr('src');

			var date = new Date();

			var day = date.getDate();
  			var month = date.getMonth() + 1;
  			var year = date.getFullYear();

			var created_date = year + '-' + month + '-' + day;

			if(jQuery('.module-selected') == undefined || logo == '#'){
				alert('Please select module and logo to make report');
				return false;
			}


			opens_comparison_label.push(jQuery('.lato').text());
			opens_comparison_data.push(parseInt(total_opens));
			jQuery('.module-selected').each(function(){
				var value = jQuery(this).data('value');
				if(value != ''){
					options.push(value);
					jQuery('.'+value).fadeIn(1500);
				}

				if(jQuery(this).data('camp-opens') != undefined){
					var cam_name = jQuery(this).data('camp-name');
					var cam_opens = jQuery(this).data('camp-opens');
					opens_comparison_label.push(cam_name);
					opens_comparison_data.push(cam_opens);

				}

			}).promise().done(function(){
						jQuery('.report').hide();

					jQuery('.report-title').fadeIn(1000);

					//  console.log(opens_comparison_label);

					if(opens_comparison_label.length > 1){
							//  console.log("GOOOO HERE");

							options.push('clicks-comparison');
							// options.push('engage-time-comparison');

							jQuery('.clicks-comparison').show();
							// jQuery('.engage-time-comparison').show();
									var barData = {
										labels: opens_comparison_label,
										datasets: [
											{
												label: 'Opens',

												backgroundColor: backgrounds,
												borderColor: backgrounds,
												borderWidth: 1,
			//			 			            fillColor: '#382765',
												data: opens_comparison_data
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
							myBarChart.update();

					}else{
						jQuery('.clicks-comparison').hide();
					}
					
					
					jQuery.ajax({   

							type: "post",
							url: "http://mwiseapps.com/analytics/api/campaign/create_report",
							data:{
								camp_id : camp_id,
								email : email,
								options : options,
								logo : logo,
								created_date : created_date,
								type: 0
							},
							// dataType: 'json',
							success: function(res) {

							}})
			})

			jQuery('.report').hide();
			
			jQuery('#report_img').fadeIn(1000);

			// jQuery('.report-box').each(function(){
			// 		jQuery(this).fadeOut(1000);
			// })
		})

		var device_label = [];
		var device_data = [];
		var clicks_comparison = document.getElementById('clicks_comparison').getContext('2d');
		var myBarChart = null;

// 		jQuery.each(res, function(key,value) {
						// device_label.push(current_camp_name);
						// device_data.push(total_perc);
// // 						str += value.Browser_Usage + "--";
// 					});

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
	
</script>

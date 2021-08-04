
<?php
/**
 * Template Name: Report Template
 */
?>
<script type="text/javascript" src="http://tools.mwiseapps.com/js/Chart.js"></script>
<div class="fluid-container section content-items">    

	<div class="content-items">

		<div class="container container-pad-50" style='opacity:1'>
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
											$logo = $response[0]->re_logo;
											$created_date = $response[0]->re_created_date;
											$email = $response[0]->re_user_email;  
											// $options = explode(',', $options);

						  
												  $camp_id = $response[0]->re_camp_id;

												  // create curl resource 
											$ch = curl_init(); 
											
											// set url 
											curl_setopt($ch, CURLOPT_URL, $base_api . "api/campaign/". $camp_id); 

											//return the transfer as a string 
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

											// $output contains the output string 
											$output = curl_exec($ch); 

											// close curl resource to free up system resources 
											curl_close($ch); 
											
											$camp = json_decode(json_decode($output)->response)[0];
											

											$camp_name = $camp->Camp_Name; 

											$master_camp = $camp->mctp_mc_id;


												  
													// create curl resource 
												$ch = curl_init(); 
												
												curl_setopt($ch, CURLOPT_URL, $base_api ."api/campaign/opens/".$camp_id); 
										
												//return the transfer as a string 
												curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
										
												// $output contains the output string 
												$output = curl_exec($ch); 
										
												// close curl resource to free up system resources 
												curl_close($ch); 

												$response = json_decode(json_decode($output)->response);

												
												

												$date2 = $response->date;

												$total_opens_assigned =  $response->total_opens_assigned;

												if((int)$total_opens_assigned == 0){
													$total_opens_assigned = 1;
												}

												// var_dump($date);
												if($date2 != NULL){
													$clicks = $response->clicks;
													$total_opens = $response->opens;
													// echo $total_opens;
													// $date = $date->format("Y-m-d H:i:s");
												}else{
													$total_opens = $response->Opens;
													// echo $total_opens;
													$date2 = NULL;
												}

									?>
									<?php 
													// create curl resource 
													$ch = curl_init(); 
												
													curl_setopt($ch, CURLOPT_URL, $base_api . "api/campaign/unique_opened/".$camp_id); 
	
	
													// var_dump($date);
													$post = ['date'=> $date2];
	
													curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
													curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
													// $response = curl_exec($ch);
													// curl_close($ch);
											
													// //return the transfer as a string 
													// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
											
													// // $output contains the output string 
													$output = curl_exec($ch); 
											
													// // close curl resource to free up system resources 
													curl_close($ch); 
	
													$response = json_decode(json_decode($output)->response);
	
													// var_dump($response);die();
	
													$unique_opens = $response[0]->unique_opens;
													
	
													$forward_total = $response[0]->forward_total;
													$print_total = $response[0]->print_total;
													
													
													// echo $unique_opens;
										
									?>

				<div class="row report-title">

					<div class='col-xl-3'> Your Logo
						<!-- <img id="report_img" src=<?php echo $base_api.'public/logos/'. $logo ;?> alt="Your Logo" style="width:200px;height:200px" /> -->
						<!-- <img id="report_img" src="#" alt="Your Logo" style="width:200px;height:200px" /> -->

					</div>
					<div class='col-xl-8'>
							<div class='title' data-value="<?php echo $camp->Camp_Name;?>">
									<!-- <?php echo "[".$camp->Camp_Name."] - ANALYTICS REPORT";?> -->

									<?php echo "[Example Campaign] - ANALYTICS REPORT";?>
							</div>
							<div>
									<span>Launch Date: 
										<?php  $date = date_create($camp->Created_Date);
												echo date_format($date,"d-M-Y"); 
										?>
									</span> <span>Report Date: 
										<?php  
												echo date_format(new DateTime($created_date),"d-M-Y"); 
										?>
									</span>
							</div>
					</div>
					<!-- <div class='col-xl-1 font20'><span><i class="fa fa-print" aria-hidden="true"></i></span>  <span><i class="fa fa-download" aria-hidden="true"></i></span></div> -->
				</div>


				<div class="row report-box insight  insight-simmary" style='display:flex'>
					<div class="col-xl-4">
						<div>INSIGHTS</div>
						<div>The effectiveness rating of the email is:</div>
						<div class='font40'>46%</div>
					</div>
						
					<div class="col-xl-4">
					<div>GREAT OPEN RATE</div>
						<div>You have a compeling subject line</div>
						<div>LOW TRACTION</div>
						<div>TIP: Ensure your email is well designed with a clear message hierarchy to encourage recipients to linger longer over your message</div>
						<div>LOW CLICKTHROUGH</div>
						<div>TIP: Ensure your offer is valuable and relevant to your recipients</div>
					</div>

					<div class="col-xl-4">
						<div>GREAT OPEN RATE</div>
						<div>You have a compeling subject line</div>
						<div>LOW TRACTION</div>
						<div>TIP: Ensure your email is well designed with a clear message hierarchy to encourage recipients to linger longer over your message</div>
						<div>LOW CLICKTHROUGH</div>
						<div>TIP: Ensure your offer is valuable and relevant to your recipients</div>
					</div>
				</div>

				<div class="report-half-box row ">
						<div class="report-box col-xl-3 total-opens">
								<div class=" report-header margin-top"><h4>OPENS</h4>&nbsp;&nbsp;&nbsp;<span>
								<i class="fa fa-info-circle" style="opacity: 0.5;" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Total opens shows the number of times this email has been opened. Unique opens shows the number of different users who have opened it at least once. The percentage is based on the credits that was set during campaign creation."></i></span></div>
								<div class="display-inline">
									<div class='pie_size' style="width:120px;height:120px;">
										<canvas id='opens_pie_chart' ></canvas>
										<img id="img_opens_pie_chart" src="" style="display:none;width: 100%;"/>

									</div>
									<div  class="legend_client" style="margin:auto;padding-left: 20px;"><div>Total</div> <div class='font20 color-open'><?php echo number_format($total_opens,0,".",",")?></div> <div class='font20'><?php $total_opens_perc = (int)($total_opens / $total_opens_assigned * 100) ;echo (int)($total_opens / $total_opens_assigned * 100). "%";?>  <i class="fa fa-envelope-open-o" aria-hidden="true"></i></div></div>
								</div>
								<div class="display-inline">
									<div class='pie_size' style="width:120px;height:120px;">
										<canvas id='unique_opens_pie_chart' ></canvas>
										<img id="img_unique_opens_pie_chart" src="" style="display:none"/>
									</div>
									<div class="legend_client" style="margin:auto;padding-left: 20px;"><div>Unique</div> <div class='font20 color-unique'><?php echo number_format($unique_opens,0,".",",")?></div> <div class='font20'><?php echo (int)($unique_opens / $total_opens_assigned * 100) . "%";?>  <i class="fa fa-user" aria-hidden="true"></i> <i class="fa fa-envelope-open-o" aria-hidden="true"></i></div></div>
								</div>
						</div>


						<?php
								// create curl resource 
								$ch = curl_init(); 
											
								// set url 
								curl_setopt($ch, CURLOPT_URL, $base_api . "api/linkly/get_links/". $camp_id); 

								// var_dump($date);
								// echo $date;
								// var_dump($date);
								$post = ['date'=> $date2];

								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
								// $response = curl_exec($ch);
								// curl_close($ch);
						
								// //return the transfer as a string 
								// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
						
								// // $output contains the output string 
								$output = curl_exec($ch); 
						
								// // close curl resource to free up system resources 
								curl_close($ch); 
								//return the transfer as a string 
								// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

								// // $output contains the output string 
								// $output = curl_exec($ch); 

								// // close curl resource to free up system resources 
								// curl_close($ch); 

								// var_dump($output);die();
								
								$res = json_decode(json_decode($output)->response);

								$report_file = json_decode($output)->report_file;
								// var_dump($res);

								$total_click = 0;
								if($date2 != NULL){
									$total_click = $clicks;
									$sum = $clicks;
								}else{
									
									for ($i=0; $i < count($res); $i++) {
										$sum +=  $res[$i]->Total_Opens;
										$total_click +=  $res[$i]->Total_Opens;

									}
								}
								

								// $total_click = $sum;
								// $didnt_click = 0;
								// $click_rate = 0;
								// $click_rate_remain = 0;
								// $click_per_person = 0;
								$unique_click = 0;
								if($unique_opens != 0){
									
									$unique_click = $res[0]->people;

									$didnt_click = $unique_opens - $res[0]->people;
								
									$click_rate = number_format($res[0]->people * 100 / $unique_opens, 2);

									$click_rate_remain = number_format(100 - $click_rate, 2);

									$click_per_person = number_format($sum / $res[0]->people, 2);
								}
						
						?>

							<div class="report-box col-xl-3 total-clicks">
									<div class=" report-header margin-top"><h4>CLICKS</h4>&nbsp;&nbsp;&nbsp;<span>
									<i class="fa fa-info-circle" style="opacity: 0.5;" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Total clicks shows the number of times links in this email have been clicked. Unique clicks shows the number of clicks without including repeated clicks on the same link by a user. The percentage is based on the credits that was set during campaign creation."></i></span></div>
									<div class="display-inline">
										<div class='pie_size' style="width:120px;height:120px;">
											<canvas id='clicks_pie_chart' >
										</div>
										<div  class="legend_client" style="margin:auto;padding-left: 20px;"><div>Total</div> <div class='font20 color-open'><?php echo number_format($total_click,0,".",",")?></div> <div class='font20'><?php echo (int)($total_click / $total_opens_assigned * 100). "%";?>  <i class="fa fa-hand-pointer-o" aria-hidden="true"></i></div></div>
									</div>
									<div class="display-inline">
										<div class='pie_size' style="width:120px;height:120px;">
											<canvas id='unique_clicks_pie_chart' >
										</div>
										<div class="legend_client" style="margin:auto;padding-left: 20px;"><div>Unique</div> <div class='font20 color-unique'><?php echo number_format($unique_click,0,".",",")?></div> <div class='font20'><?php echo (int)($unique_click / $total_opens_assigned * 100) . "%";?>  <i class="fa fa-user" aria-hidden="true"></i> <i class="fa fa-hand-pointer-o" aria-hidden="true"></i></i></div></div>
									</div>
							</div>

								<?php
								if((int)$total_opens == 0){
								$total_opens = 1;
								}

								?>
							<div class="report-box col-xl-3 total-forwards">
							<div class=" report-header margin-top"><h4>FORWARDS</h4></div>
							<div class="display-inline">
								<div class='pie_size' style="width:120px;height:120px;">
									<canvas id='forward_pie_chart' >
								</div>
								<div  class="legend_client" style="margin:auto;padding-left: 20px;"><div>Total</div> <div class='font20 color-open'><?php echo $forward_total?></div> <div class='font20'><?php echo number_format($forward_total / $total_opens * 100, 1). "%";?>  <i class="fa fa-share" aria-hidden="true"></i></div></div>
							</div>
							<div class="display-inline">
								<div class='pie_size' style="width:120px;height:120px;">
									<canvas id='unique_forward_pie_chart' >
								</div>
								<div class="legend_client" style="margin:auto;padding-left: 20px;"><div>Unique</div> <div class='font20 color-unique'><?php echo $forward_total?></div> <div class='font20'><?php echo number_format($forward_total / $total_opens * 100, 1) . "%";?>  <i class="fa fa-user" aria-hidden="true"></i> <i class="fa fa-share" aria-hidden="true"></i></div></div>
							</div>
							</div>

							<div class="report-box col-xl-3 total-prints">
							<div class=" report-header margin-top"><h4>PRINTS</h4></div>
							<div class="display-inline">
								<div class='pie_size' style="width:120px;height:120px;">
									<canvas id='print_pie_chart' >
								</div>
								<div  class="legend_client" style="margin:auto;padding-left: 20px;"><div>Total</div> <div class='font20 color-open'><?php echo $print_total?></div> <div class='font20'><?php echo number_format($print_total / $total_opens * 100, 1). "%";?> <i class="fa fa-print" aria-hidden="true"></i></div></div>
							</div>
							<div class="display-inline">
								<div class='pie_size' style="width:120px;height:120px;">
									<canvas id='unique_print_pie_chart' >
								</div>
								<div class="legend_client" style="margin:auto;padding-left: 20px;"><div>Unique</div> <div class='font20 color-unique'><?php echo $print_total?></div> <div class='font20'><?php echo number_format($print_total / $total_opens * 100, 1) . "%";?>  <i class="fa fa-user" aria-hidden="true"></i> <i class="fa fa-print" aria-hidden="true"></i></div></div>
							</div>
							</div>


							<!--<div class="report-box col-xl-3" >
							<div class=" report-header margin-top"><h4>COUNTRIES</h4></div>
							<div class="country-group report-body" style="width:100%">
								<div class="pie-chart-size">
									<canvas id="pie_chart">
								</div>
								<div id="legend_country" class="legend_client"></div>
							</div> 
							</div>-->
							</div>

				<div class="row">

						<div class="report-box col-xl-6 traction reading-trend">
							<div class="report-header margin-top"><h4>READING TREND</h4></div>
							<div class="report-body">
								<div class="reading-time-margin">
									<canvas id="line_chart_time">
								</div>
							</div>
						</div>	

						<div class="report-box col-xl-6 traction" align="center">
								<div class="report-header margin-top"><h4>ENGAGEMENT</h4></div>
								<div class="report-body"><span>Read (8+ sec)</span> | <span>Skim (3 - 7 sec)</span> | <span>Deleted/Glanced (0 - 2 sec)</span></div>
								<div class="country-group report-body" style='max-height:235px'>						
									<div class="pie-chart-size"><canvas id="pie_chart_read"></div>
									<div id="legend_read" class="legend_client"></div>
								</div>					
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

				<div class="row">

						<div class="report-box col-xl-8 engage-time-comparison" style='display:none'>
							<div class="report-header margin-top"><h4>ENGAGEMENT TIME - PERFORMACE COMPARISON</h4></div>
							<div class="report-body">
								<div class="reading-time-margin">
									<canvas id="engage_time_comparison">
								</div>
							</div>
						</div>	


				</div>

				<div class="row">

				<div class="report-box col-xl-12 traction daily-activity">
							<div class="report-header margin-top"><h4>OPENS CLICKS ACTIVITY</h4></div>
							<div class="report-body"  style="min-height:575px">
							<div style="    text-align: center;
    margin-bottom: 20px;">
									<span class="">Total: </span>
									<span class="email-opens">Opens</span>
									<span class="link-clicks">Link Clicks</span>
									<!-- <span class="view-more"><a></a></span> -->
									<span><select id='daily_hourly'><option value="1">every 4 hours</option><option value="3">every 8 hours</option><option value="2">daily</option></select></span>  
								</div>
								<div class="reading-time-margin" style="margin-bottom:20px">
									<canvas id="daily_line_chart_time"></canvas>
									<img id="img_daily_line_chart_time" src="" style="display:none;width: 100%;"/>

								</div>

								<div id="div_open_click_details">
									<table id="open_click_details" class="pure-table pure-table-horizontal pure-table-bordered" style="display:none;    width: 100%;">
												<thead>
													<th>DAY RANGE</th>
													<th>UNIQUE OPENS</th>
													<th>TOTAL OPENS</th>
													<th>UNIQUE CLICKS</th>
													<th>TOTAL CLICKS</th>
												</thead>
												<tbody>
													<tr></tr>
												</tbody>
									</table>
								</div>
								<div style='margin-top:1em;bottom:0'><a href='javascript:void(0);' id='report_activity' class='export_cvs_file' data-file="">Export CSV File</a></div>
							</div>
						</div>

						<div class="report-box col-xl-12 ad-tracking">
							<div class="report-header margin-top"><h4>CLICK TRACKING</h4></div>
							<div class="report-body" style='min-height:300px'>
								<div class="">

										<?php

											
											

											echo "<div class='click_stat'><div style='display:inline-flex;margin-bottom: 20px;min-width:190px'><div class='total_click' id='unique_click' style='    background-color: #FF5722;' data-value='".$res[0]->people."'> 0</div> <div style='font-size: 15px;font-weight: bold;'>people clicks <div style='font-size: 13px;
											color: #607D8B;'> <span style='font-size:16px'>".$click_rate."%</span> click rate</div></div></div>";

											echo "<div style='display:inline-flex;min-width:190px'><div class='total_click' id='total_click' data-value='".$sum."'> 0</div> <div style='font-size: 15px;font-weight: bold;'>total clicks <div style='font-size: 13px;
											color: #607D8B;'>made by ".$res[0]->people." people</div></div></div>";


											echo "<div style='display:inline-flex;min-width:224px;'><div class='total_click' style='background-color: #607D8B;' data-value='".$click_per_person."'> 0</div> <div style='font-size: 15px;font-weight: bold;'>clicks per person <div style='font-size: 13px;
											color: #607D8B;'> Average of all clicks.</div></div></div>";
											
											echo "<div style='display:inline-flex;min-width:190px'><div class='total_click' style='background-color: #3F51B5;' data-value='".$didnt_click."'> 0</div> <div style='font-size: 15px;font-weight: bold;'>didn't clicks <div style='font-size: 13px;
											color: #607D8B;'> <span>".$click_rate_remain."</span>% all openers</div></div></div></div>";

											echo "<div style='' class='row'>";
											
											echo "<div class='col-6' >";
											for ($i=0; $i < count($res); $i++) { ?>
												<div class='border3'>
													<div><span class="color-bold"><?php echo $res[$i]->li_url;?></span></div>
													<div>
														<div>Total Clicks: <span class="color-bold"><?php echo $res[$i]->total_clicks;?></span> <a class='link_clicked' href="javascript:void(0);" data-id="<?php echo $camp_id?>" data-linkid="<?php echo $res[$i]->li_id?>">(who)</a></div>
														<div>Unique Clicks: <span class="color-bold"><?php echo $res[$i]->unique_clicks;?></span></div>
														<div>Popularity: <span class="color-bold"><?php echo number_format($res[$i]->total_clicks / $sum * 100, 1) . "%";?></span></div>
													</div>
												</div>
											<?php }  

											echo "</div><div class='col-6' style='overflow-y: scroll !important;    height: 420px;margin-top: 1em;'>"."<table id='click_details' class='pure-table pure-table-horizontal ' style='width:100%'>
													<thead>
														<th>Email</th>
														<th>Total</th>
													</thead>
													<tbody><tr></tr></tbody></table>"." <div style='margin-top:1em'><a href='javascript:void(0);' id='email_click_report' class='export_cvs_file' data-file=''>Export CSV File</a></div> </div>";

											// echo "<div><a href='javascript:void(0);'>Export</></div>";		
											echo "</div>";

											
										?>
									
								</div>
							</div>
						</div>
						
						<!-- <div class="report-box col-xl-6 ad-tracking" >
								<div class=" report-header margin-top"><h4>POPULAR CLICK DEVICES</h4></div>
								<div class="country-group report-body" style="width:100%;height:300px">
									<div class="pie-chart-size">
										<canvas id="popular_click_device">
									</div>
									<div id="legend_popular_click_device" class="legend_client"></div>
								</div>

					</div>	 -->

						<!-- <div class="report-box col-xl-6 ad-tracking">
							<div class="report-header margin-top"><h4>POPULAR CLICK DEVICE</h4></div>
							<div class="report-body" >
								
							</div>
							<div style="width:100%;height:250px">
										<canvas id="popular_click_device" >
									</div>
									<div id="legend_popular_click_device" class="legend_client"></div>
						</div>	 -->

											


				</div>
					

					<div class="row">

					<div class="report-box col-xl-6 email-client" >
								<div class=" report-header margin-top"><h4>EMAIL CLIENTs</h4></div>
								<div class="report-body"><div style=""></div></div>
								<div class="country-group report-body" style="width:100%;height:250px">
									<div class="pie-chart-size">
										<canvas id="email_clients_pie_chart">
									</div>
									<div id="legend_email_client" class="legend_client"></div>
								</div>
								<div class="report-body"><div style=""></div></div>
					</div>		

						<!-- <div class="report-box col-xl-6 traction email-client" align="center">
								<div class="report-header margin-top"><h4>DEVICES AND CLIENTS</h4></div>
								<div class="report-body"><span>Read (8+ sec)</span> | <span>Skim (3 - 7 sec)</span> | <span>Deleted/Glanced (0 - 2 sec)</span></div>
								<div class="country-group report-body" style='max-height:250px'>						
									<div class="pie-chart-size"><canvas id="pie_chart_read"></div>
									<div id="legend_read" class="legend_client"></div>
								</div>					
							</div>							 -->

							<div class="report-box col-xl-6 ad-tracking" >
								<div class=" report-header margin-top"><h4>POPULAR CLICK DEVICES</h4></div>
								<div class="country-group report-body" style="width:100%;height:300px">
									<div class="pie-chart-size">
										<canvas id="popular_click_device">
									</div>
									<div id="legend_popular_click_device" class="legend_client"></div>
								</div>

							</div>	

					</div>							
				
					<div class="row">
						<!-- <div class="col-xl-4" align="center">
							<div class="pie-chart-size"><canvas id="pie_chart_client"></div>
							<div id="legend_client" class="legend_client"></div>
						</div> -->
						
						<div class="report-box col-xl-12 email-client">
						<div class=" report-header margin-top"><h4>CLIENT POPULARITY</h4></div>
								<div class="client-display">
								
									<div class="report-body">
									<div class='email_client_per'>
										<table class="pure-table pure-table-horizontal" border="0" style='text-align:left'>
												<thead>
													<th style='text-align:right'>Email Client</th>
													<th style='text-align:center'>Percentage of Total Opens</th>
													<th></th>
												</thead>
												<tbody>
													<?php
													
													// create curl resource 
													$ch = curl_init(); 
													
													// set url 
													curl_setopt($ch, CURLOPT_URL, $base_api . "api/campaign/popular_email_clients/".$camp_id); 

													//return the transfer as a string 
													// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

													$post = ['datezz'=> $date2];

													curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
													curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

													// $output contains the output string 
													$output = curl_exec($ch); 

													// close curl resource to free up system resources 
													curl_close($ch); 
													
													$res = json_decode(json_decode($output)->response);

													$total = 0;
													for ($i=0; $i < count($res); $i++) { 
														$total += $res[$i]->Total_Opens;
													}
													
													for ($i=0; $i < count($res); $i++) { ?>
														
														<tr>
															<td style='white-space: nowrap;text-align:right'><?php echo $res[$i]->EmailClient?></td>
															<?php $str = "example".$i;
																echo '<style>@keyframes example'.$i.' {
																			from {width: 0%;}
																			to {width: '.(int)($res[$i]->Total_Opens / $total * 100).'%;}
																		}</style>';?>
															<td width="100%" style="padding: 0;"><div class="box-shadow-popularity"><div class="<?php echo $str;?> popular-box" style="animation-name: <?php echo $str;?>;animation-duration: 5s;background-color:#005c99;height:20px;width:<?php echo (int)($res[$i]->Total_Opens / $total * 100); ?>%"></div>&nbsp;&nbsp; <?php echo (int)($res[$i]->Total_Opens / $total * 100) . "%";?></div></td>
															<td class='font-color' valign="center"><?php echo number_format($res[$i]->Total_Opens, 0, ".", ",")?></td>
														</tr>

													<?php }
													?>
												
												</tbody>
										</table>
									</div>
									
								</div>

								<div class="report-body">
									<div class='email_client_per'>
										<table class="pure-table pure-table-horizontal" border="0" style='text-align:left'>
												<thead>
													<th style='text-align:right'>Email Client</th>
													<th style='text-align:center'>Percentage of Unique Opens</th>
													<th></th>
												</thead>
												<tbody>
													<?php
													
													// create curl resource 
													$ch = curl_init(); 
													
													// set url 
													curl_setopt($ch, CURLOPT_URL, $base_api . "api/campaign/unique_popular_email_clients/".$camp_id); 

													//return the transfer as a string 
													// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
													$post = ['datezz'=> $date2];

													curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
													curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post)); 

													// $output contains the output string 
													$output = curl_exec($ch); 

													// close curl resource to free up system resources 
													curl_close($ch); 
													
													$res = json_decode(json_decode($output)->response);

													$total = 0;
													for ($i=0; $i < count($res); $i++) { 
														$total += $res[$i]->Total_Opens;
													}
													
													for ($i=0; $i < count($res); $i++) { ?>
														
														<tr>
															<td style='white-space: nowrap;text-align:right'><?php echo $res[$i]->EmailClient?></td>
															<?php $str = "example".$i;
																echo '<style>@keyframes example'.$i.' {
																			from {width: 0%;}
																			to {width: '.(int)($res[$i]->Total_Opens / $total * 100).'%;}
																		}</style>';?>
															<td width="100%" style="padding: 0;"><div class="box-shadow-popularity"><div class="<?php echo $str;?> popular-box" style="animation-name: <?php echo $str;?>;animation-duration: 2.5s;background-color:#005c99;height:20px;width:<?php echo (int)($res[$i]->Total_Opens / $total * 100); ?>%"></div>&nbsp;&nbsp; <?php echo (int)($res[$i]->Total_Opens / $total * 100) . "%";?></div></td>
															<td class='font-color' valign="center"><?php echo number_format($res[$i]->Total_Opens, 0, ".", ",")?></td>
														</tr>

													<?php }
													?>
												
												</tbody>
										</table>
									</div>
									
								</div>
													</div>

						</div>
						
					</div>

				<div class="report-half-box row">
					<div class="report-box col-xl-6 geolocation">
								<div class=" report-header margin-top"><h4>GEOLOCATION</h4></div>
								<div style="width:100%"><div id="vmap" style="height: 400px; " class="report-body"></div></div>
							</div>
					<div class="report-box col-xl-6 geolocation" >
								<div class=" report-header margin-top"><h4>COUNTRIES</h4></div>
								<div class="country-group report-body" style="width:100%">
									<div class="pie-chart-size">
										<canvas id="pie_chart">
									</div>
									<div id="legend_country" class="legend_client"></div>
								</div>
					</div>
				</div>

				<!-- <div class="report-half-box row">
					<div class="report-box col-xl-6" >
							
					</div>
				</div>

				<div class="report-box ad-tracking">
					<div class="report-header margin-top"><h4>CLICK STREAM</h4></div>
					<div class="report-body">
						<table class="pure-table pure-table-horizontal" style="    width: 100%;"> 
							<thead>
								<tr>
									<th>Email Address</th>
									<th>Reading Time</th>
									<th>Country</th>
									<th>Mail Service</th>
									<th>Device</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody>
							<?php 	// create curl resource 
										$ch = curl_init(); 
										curl_setopt($ch, CURLOPT_URL, $base_api . "api/linkly/get_links_details/".$camp_id); 
										//return the transfer as a string 
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
										// $output contains the output string 
										$output = curl_exec($ch); 
										// close curl resource to free up system resources 
										curl_close($ch); 
										$response = json_decode(json_decode($output)->response); 
										
										for ($i=0; $i < count($response); $i++) { ?>

													<tr>
													
														<td><?php echo '';?></td>
														<td><?php echo ''?></td>
														<td><?php echo $response[$i]->ld_country;?></td>
														<td><?php echo '';?></td>
														<td><?php echo $response[$i]->ld_platform;?></td>
														<td><?php echo date('M/d/Y h:i:s',strtotime($response[$i]->ld_timestamp));?></td>

													</tr>

								<?php		}
										
							?>
								
							</tbody>
						</table> 
					</div>
				</div> -->

				<div class="row">

						<div class="report-box col-xl-8 clicks-comparison" style='display:none'>
							<div class="report-header margin-top"><h4>OPENS - PERFORMACE COMPARISON</h4></div>
							<div class="report-body">
								<div class="reading-time-margin">
									<canvas id="clicks_comparison"></canvas>

									<?php 	// create curl resource 
										$ch = curl_init();

										curl_setopt($ch, CURLOPT_URL, $base_api . "api/campaign/get_latest_camps"); 

										 
										$post = ['email'=> $email];
										
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
										curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
										$response = curl_exec($ch);
										curl_close($ch);  

										$response = json_decode(json_decode($response)->response); 

										
										
										for ($i=1; $i < count($response); $i++) { ?>

											<div class='clicks-comparison-camp' style='display:none'
													data-camp-reads='<?php echo $response[$i]->Reads?>'
													data-camp-opens='<?php echo $response[$i]->Total_Opens?>'
													data-camp-name='<?php echo $response[$i]->Camp_Name?>'><?php echo $response[$i]->Camp_Name?></div>

								<?php } ?>
								</div>
							</div>
						</div>	


				</div>

				<div class="row">

						<div class="report-box col-xl-8 engage-time-comparison" style='display:none'>
							<div class="report-header margin-top"><h4>ENGAGEMENT TIME - PERFORMACE COMPARISON</h4></div>
							<div class="report-body">
								<div class="reading-time-margin">
									<canvas id="engage_time_comparison">
								</div>
							</div>
						</div>	


				</div>

				<div class="row hot-leads" style="display:none">

							<div class="report-box col-xl-12 hot-leads" style='margin-bottom: 10px;'>
								<div class="report-header margin-top"><h4>HOT LEADS</h4></div>
							</div>	
							<div class="report-box col-xl-4 hot-leads">
										<div class='hot-leads-box bg-color'>
										<div><img src="<?php echo get_home_url();?>/wp-content/uploads/2017/09/hot.jpg" /></div>
											<div class='hot-leads-text'>Hot Leads</div>
											<div class='hot-leads-total' id='hot-leads-0'>35</div>
										</div>
										
							</div>
							<div class="report-box col-xl-4 hot-leads">
							<div class='hot-leads-box bg-color'>
							<div><img src="<?php echo get_home_url();?>/wp-content/uploads/2017/09/warm.jpg" /></div>
							<div class='hot-leads-text'>Could Spark</div>
											<div class='hot-leads-total' id='hot-leads-1' >53</div>
							</div>							
										
							</div>
							<div class="report-box col-xl-4 hot-leads">
									<div class='hot-leads-box bg-color'>
									<div><img src="<?php echo get_home_url();?>/wp-content/uploads/2017/09/cold.jpg" /></div>
									<div class='hot-leads-text'>Gone Cold</div>	
											<div class='hot-leads-total' id='hot-leads-2'>9</div>
									</div>	
										
							</div>

					 </div>
					 <div class='row no-padding2 view-list'>
						 <div class="report-box col-xl-4 view-all hot-leads"><span class='view' data-value=0>View List</span></div>
						 <div class="report-box col-xl-4 view-all hot-leads"><span class='view' data-value=1>View List</span></div>
						 <div class="report-box col-xl-4 view-all hot-leads"><span class='view' data-value=2>View List</span></div>
					 </div>
					 <div class="row arrow-box">
						 	<div class="col-xl-4" ><div class="arrow-down" ></div></div>
							<div class="col-xl-4" ><div class="arrow-down"></div></div>
							<div class="col-xl-4" ><div class="arrow-down"></div></div>
					</div>
					 <div class='row'>
							<div class="report-box col-xl-12 hot-leads" style="display:none">
									<div class='report-body'>
										<table id='hot_leads_table' class="pure-table pure-table-horizontal" style="    width: 100%;">
											<thead>
												<tr>
													<th>Email</th>
													<th>Reading Time</th>
													<th>Opens</th>
													<th>Country</th>
													<th>City</th>
													<th>B</th>
													<th>P</th>
													<th>Device</th>
													<th>Access Time</th>
												</tr>
											</thead>
											<tbody>		
											</tbody>					
										</table>
									</div>										
							</div>
					 </div>


			</div>
			
		</div>
	</div>
		
	<input type='hidden' id='reads'>
</div>

<script src="http://tools.mwiseapps.com/js/jquery.vmap.js"></script>
<script src="http://tools.mwiseapps.com/js/jquery.vmap.world.js"></script>
<link rel="stylesheet" type="text/css" href="http://tools.mwiseapps.com/js/jqvmap.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css">

<script>

var camp_read = 0;

var camp_id = '<?php echo $camp_id?>';

var master_camp = '<?php echo $master_camp?>';

var datezz = <?php echo json_encode($date2)?>;																

var email = '<?php echo wp_get_current_user()->user_email;?>';

var total_open = '<?php echo $total_opens?>';
var unique_opens = '<?php echo $unique_opens?>';

var total_click = '<?php echo $total_click?>';
var unique_click = '<?php echo $unique_click?>';


var total_opens_assigned = '<?php echo $total_opens_assigned;?>';

jQuery('#total_assign_new').html("Open to track: "+total_opens_assigned);
var forward_total = '<?php echo $forward_total;?>';
var print_total = '<?php echo $print_total;?>';

	// var backgrounds = ["#f8a231", "#5ac5d2", "#6d6f71", "#ad9681", "#fef0d3", "#134A8D"];
	var backgrounds = ["#009bdb", "#00c8c2", "#ffc446", "#ff95e0", "#ff7575", "#7457a8"];

	var backgrounds = ["#009973","#00b386","#00e6ac", "#00ffbf", "#1affc6", "#33ffcc"];

	var backgrounds = ["#0052cc","#005ce6","#0066ff", "#1a75ff", "#3385ff", "#4d94ff","#66a3ff", "#80b3ff", "#99c2ff","#b3d1ff"];

	var backgrounds = ["#005c99","#006bb3", "#007acc", "#008ae6", "#0099ff","#1aa3ff", "#33adff", "#4db8ff","#66c2ff","#80ccff"];


	// var backgrounds = ["#248f8f","#29a3a3","#2eb8b8", "#33cccc", "#47d1d1", "#5cd6d6"];															

var line_chart_time = null;
var myline_chart_time = null;

var daily_line_chart_time = null;
var mydaily_line_chart_time = null;

var opens_pie_chart = null;
var unique_opens_pie_chart = null;

var clicks_pie_chart = null;
var unique_clicks_pie_chart = null;


var forward_pie_chart = null;
var myForward_pie_chart = null;

var print_pie_chart = null;
var myPrint_pie_chart = null;

var unique_forward_pie_chart = null;
var myUnique_forward_pie_chart = null;

var unique_print_pie_chart = null;
var myUnique_print_pie_chart = null;

var myOpens_pie_chart = null;

var myClicks_pie_chart = null;	

var myUnique_opens_pie_chart = null; 

var myUnique_clicks_pie_chart = null;

line_chart_time = document.getElementById('line_chart_time').getContext('2d');

daily_line_chart_time = document.getElementById('daily_line_chart_time').getContext('2d');


opens_pie_chart = document.getElementById('opens_pie_chart').getContext('2d');

clicks_pie_chart = document.getElementById('clicks_pie_chart').getContext('2d');


forward_pie_chart = document.getElementById('forward_pie_chart').getContext('2d');

unique_forward_pie_chart = document.getElementById('unique_forward_pie_chart').getContext('2d');

print_pie_chart = document.getElementById('print_pie_chart').getContext('2d');

unique_print_pie_chart = document.getElementById('unique_print_pie_chart').getContext('2d');





unique_opens_pie_chart = document.getElementById('unique_opens_pie_chart').getContext('2d');

unique_clicks_pie_chart = document.getElementById('unique_clicks_pie_chart').getContext('2d');


jQuery('.container-pad-50').css('opacity',0.4);
									

var base_url = 'http://mwiseapps.com/analytics/';

var home_url = '<?php echo get_home_url();?>';
			// Opens chart
			var piedata = {
						labels: ['Opens','Total'],
						datasets: [
							{
								data: [parseInt(total_open), total_opens_assigned],
								backgroundColor: ['#11a3d8','#d2d4d8'],
								hoverBackgroundColor: ['#11a3d8','#d2d4d8'],
						}]
					};

				if(myOpens_pie_chart != null){
					myOpens_pie_chart.destroy();
				}

			// console.log(piedata);
			var options = {        
				cutoutPercentage: 75,
				legend:{
					position:'bottom',
					display: false
				},
					animation: {
							
							onComplete: function(animation) {
								// console.log(document.getElementById('daily_line_chart_time').toDataURL('image/png'));

								// jQuery("#img_opens_pie_chart").attr('src',document.getElementById('opens_pie_chart').toDataURL('image/png'));

							}
						}
			};
			myOpens_pie_chart = new Chart(opens_pie_chart,{

					type: 'doughnut',
					data: piedata,
					options: options
				});

				// CLICKS chart

				var piedata = {
						labels: ['Opens','Total'],
						datasets: [
							{
								data: [parseInt(total_click), total_opens_assigned],
								backgroundColor: ['#11a3d8','#d2d4d8'],
								hoverBackgroundColor: ['#11a3d8','#d2d4d8'],
						}]
					};

				if(myClicks_pie_chart != null){
					myClicks_pie_chart.destroy();
				}

			// console.log(piedata);
			var options = {        
				cutoutPercentage: 75,
				legend:{
					position:'bottom',
					display: false
				}
			};
			myClicks_pie_chart = new Chart(clicks_pie_chart,{

					type: 'doughnut',
					data: piedata,
					options: options
				});



				/// Forward Chart

				var piedata = {
						labels: ['Forwards','Total'],
						datasets: [
							{
								data: [parseInt(forward_total), total_open],
								backgroundColor: ['#11a3d8','#d2d4d8'],
								hoverBackgroundColor: ['#11a3d8','#d2d4d8'],
						}]
					};

				if(myForward_pie_chart != null){
					myForward_pie_chart.destroy();
				}

			// console.log(piedata);
			var options = {        
				cutoutPercentage: 75,
				legend:{
					position:'bottom',
					display: false
				}
			};
			myForward_pie_chart = new Chart(forward_pie_chart,{

					type: 'doughnut',
					data: piedata,
					options: options
				});

				/// Forward Chart


				// Print Chart

				var piedata = {
						labels: ['Prints','Total'],
						datasets: [
							{
								data: [parseInt(print_total), total_open],
								backgroundColor: ['#11a3d8','#d2d4d8'],
								hoverBackgroundColor: ['#11a3d8','#d2d4d8'],
						}]
					};

				if(myPrint_pie_chart != null){
					myPrint_pie_chart.destroy();
				}

			// console.log(piedata);
			var options = {        
				cutoutPercentage: 75,
				legend:{
					position:'bottom',
					display: false
				}
			};
			myPrint_pie_chart = new Chart(print_pie_chart,{

					type: 'doughnut',
					data: piedata,
					options: options
				});




	// Unique Opens
	var piedata = {
			labels: ['Opens','Total'],
			datasets: [
				{
					data: [parseInt(unique_opens), total_opens_assigned],
					backgroundColor: ['#7457a8','#d2d4d8'],
					hoverBackgroundColor: ['#7457a8','#d2d4d8'],
			}]
		};

	if(myUnique_opens_pie_chart != null){
		myUnique_opens_pie_chart.destroy();
	}

// console.log(piedata);
var options = {        
	cutoutPercentage: 75,
	legend:{
		position:'bottom',
		display: false
	}
};
myUnique_opens_pie_chart = new Chart(unique_opens_pie_chart,{

		type: 'doughnut',
		data: piedata,
		options: options
	});


	// Unique Clicks

	var piedata = {
			labels: ['Opens','Total'],
			datasets: [
				{
					data: [parseInt(unique_click), total_opens_assigned],
					backgroundColor: ['#7457a8','#d2d4d8'],
					hoverBackgroundColor: ['#7457a8','#d2d4d8'],
			}]
		};

	if(myUnique_clicks_pie_chart != null){
		myUnique_clicks_pie_chart.destroy();
	}

// console.log(piedata);
var options = {        
	cutoutPercentage: 75,
	legend:{
		position:'bottom',
		display: false
	}
};
myUnique_clicks_pie_chart = new Chart(unique_clicks_pie_chart,{

		type: 'doughnut',
		data: piedata,
		options: options
	});

	// Unique forward 


	var piedata = {
			labels: ['Forwards','Total'],
			datasets: [
				{
					data: [parseInt(forward_total), total_open],
					backgroundColor: ['#7457a8','#d2d4d8'],
					hoverBackgroundColor: ['#7457a8','#d2d4d8'],
			}]
		};

	if(myUnique_forward_pie_chart != null){
		myUnique_forward_pie_chart.destroy();
	}

// console.log(piedata);
var options = {        
	cutoutPercentage: 75,
	legend:{
		position:'bottom',
		display: false
	}
};
myUnique_forward_pie_chart = new Chart(unique_forward_pie_chart,{

		type: 'doughnut',
		data: piedata,
		options: options
	});


	//  Unique Print 

	var piedata = {
			labels: ['Prints','Total'],
			datasets: [
				{
					data: [parseInt(print_total), total_open],
					backgroundColor: ['#7457a8','#d2d4d8'],
					hoverBackgroundColor: ['#7457a8','#d2d4d8'],
			}]
		};

	if(myUnique_print_pie_chart != null){
		myUnique_print_pie_chart.destroy();
	}

// console.log(piedata);
var options = {        
	cutoutPercentage: 75,
	legend:{
		position:'bottom',
		display: false
	}
};
myUnique_print_pie_chart = new Chart(unique_print_pie_chart,{

		type: 'doughnut',
		data: piedata,
		options: options
	});





jQuery.ajax({



		type: "post",
		url: base_url + "api/campaign/read_time/" + camp_id,
		data: {"datezz":datezz},
		dataType: 'json',
		success: function(res) {
			jQuery('.container-pad-50').css('opacity',1);


			// res = JSON.parse(res);
			//console.log(res.response);
			var res_array = res.response;
			var temp = JSON.parse(res_array);
			//console.log(JSON.parse(res_array));
			var newData = [];
			var newLabel = [];
			for (var index = 0; index < temp.length; index++) {
				var element = temp[index];
				// console.log(element);
				newData.push(element.percentage);
				newLabel.push(element.time + "s");
				
			}

			var gradient = line_chart_time.createLinearGradient(400, 300, 0, 0);
			gradient.addColorStop(0, 'rgba(115, 86, 168,1)');   
			gradient.addColorStop(1, 'rgba(115, 86, 168,0)');


			var data = {
							labels: newLabel,
							datasets: [
								{
									label: "Reading Trend",
									// fillColor : gradient,
									fill: true,
									lineTension: 0,
									pointRadius: 3,
									borderWidth: 4 ,
									backgroundColor: gradient,
									borderColor: "#7457a8",
									borderCapStyle: 'butt',
									borderDash: [],
									borderDashOffset: 0.0,
									borderJoinStyle: 'miter',
									pointBorderColor: "#7457a8",
									pointBackgroundColor: "#fff",
									pointBorderWidth: 3,
									pointHoverRadius: 3,
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
							events: false,
							showTooltips: false,
							animation: {
								duration: 0,
								onComplete: function () {
									// render the value of the chart above the bar
									var ctx = this.chart.ctx;
									ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, 'bold', Chart.defaults.global.defaultFontFamily);
									ctx.fillStyle = this.chart.config.options.defaultFontColor;
									ctx.textAlign = 'center';
									ctx.textBaseline = 'bottom';
									this.data.datasets.forEach(function (dataset) {
										for (var i = 0; i < dataset.data.length; i++) {
//											console.log(dataset.data[i]);
											var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model;
											ctx.fillText(dataset.data[i] + "%", model.x + 5, model.y - 7);
										}
									});
								}
							}
						};
				 myline_chart_time = new Chart(line_chart_time, {
						type: 'line',
						data: data,
						options: options
					});


		}
	});


	// Daily Activity Line graph



	// var pie_chart_client = document.getElementById('pie_chart_client').getContext('2d');
	// var myPieChart_client = null;


	// jQuery.ajax({

	// 	type: "GET",
	// 	url: base_url + "api/campaign/popular_email_clients/" + camp_id,
	// 	// data:{   },
	// 	dataType: 'json',
	// 	success: function(res) {
	// 		var newData = [];
	// 		var newLabel = [];
	// 		var res_array = res.response;
	// 		var temp = JSON.parse(res_array);

	// 		// var arr = [1,2,3,4];
	// 		var total=0;
	// 		for(var i in temp) { total += temp[i].Total_Opens; }
			
	// 		for (var index = 0; index < temp.length; index++) {
	// 			newData.push(temp[index].Total_Opens);
	// 			newLabel.push(temp[index].EmailClient);

	// 			create_legend("#legend_client","legend-number-"+index,temp[index].EmailClient, index, temp[index].Total_Opens, Math.round(temp[index].Total_Opens*100/total), backgrounds[index]);

	// 		}

	// 		console.log(newData);
	// 		// console.log(newLabel);

	// 		var piedata = {
	// 				    labels: newLabel,
	// 				    datasets: [
	// 				        {
	// 				            data: newData,
	// 				            backgroundColor: backgrounds,
	// 				            hoverBackgroundColor: backgrounds,
	// 					}]
	// 				};

	// 			if(myPieChart_client != null){
	// 				myPieChart_client.destroy();
	// 			}

	// 		// console.log(piedata);
	// 		var options = {        
	// 			cutoutPercentage: 75,
	// 			legend:{
	// 				position:'bottom',
	// 				display: false
	// 			}
	// 		};
	// 		myPieChart_client = new Chart(pie_chart_client,{

	// 			    type: 'doughnut',
	// 			    data: piedata,
	// 				options: options
	// 			});

			


	// 	}
	// });

	var pie_chart_read = document.getElementById('pie_chart_read').getContext('2d');
	var myPieChart_read = null;

	jQuery.ajax({

		type: "POST",
		url: base_url + "api/campaign/read_statistics/" + camp_id,
		data:{"datezz":datezz},
		dataType: 'json',
		success: function(res) {
				var res_array = res.response;
				var temp = JSON.parse(res_array);
			camp_read = temp.Read;
			var newData = [temp.Read,temp.Skim, temp.Glanced];
			var labels = ['Read', 'Skim', 'Deleted/Glanced'];
			var total = 0;
			for(var i in newData) { total += parseInt(newData[i]); }

			if(total == 0){
				total = 1;
				jQuery('#legend_read').parents('.report-box').first().find('span').hide();
				return;
			}
			for (var index = 0; index < newData.length; index++) {
				var element = newData[index];
				create_legend("#legend_read","legend-number-read-"+index, labels[index], index, element, Math.round(element * 100 / total), backgrounds[index]);
				jQuery(jQuery('#legend_read').parents('.report-box').first().find('span')[index]).css({'color':backgrounds[index], 'font-weight':'bold'});
			}
			
		//	console.log(newData);

			var piedata = {
						labels: labels,
						datasets: [
							{
								data: newData,
								backgroundColor: backgrounds,
								hoverBackgroundColor: backgrounds
							}]
					};

				if(myPieChart_read != null){
					myPieChart.destroy();
				}

			// console.log(piedata);
			var options = {        
				cutoutPercentage: 75,
				legend:{
					position:'bottom',
					display: false
				}
			};
			myPieChart_read = new Chart(pie_chart_read,{

					type: 'doughnut',
					data: piedata,
					options:options
				});


		}
	});
	
	jQuery.ajax({
		
					 type: "POST",
					 url: base_url + "api/campaign/user_location/" + camp_id,
					 data:{'datezz':datezz},
					 dataType: 'json',
					 success: function(res) {

						var res_array = res.response;
						var temp = JSON.parse(res_array);
		
						 var data_map = [];
						 var countries = [];
		
						//  $('#vmap').empty();
						 var total = 0;
						 if(res){

							for (var index = 0; index < temp.length; index++) {
								var element = temp[index];
								
								if(element.CountryCode.toLowerCase() == '') continue;
								data_map[element.CountryCode.toLowerCase()] = element.Total_Opens;

								if(element.CountryCode === "United States")
								{
									countries[element.CountryCode.toLowerCase()] = "The United States of America";
								}else{
								countries[element.CountryCode.toLowerCase()] = element.Country;}
								total += parseInt(element.Total_Opens);


								
							}

							// console.log(data_map);
							// console.log(countries);
		
		
							 var map = jQuery('#vmap').vectorMap({
								 map: 'world_en',
								 backgroundColor: null,
								 color: '#ffffff',
								 hoverOpacity: 0.7,
								enableZoom: true,
		
								 showTooltip: true,
								onLabelShow: function(event, label, code)
								 {
										 // Plain TEXT labels
								   if (typeof countries[code] === "undefined") {
									
									}else{
										 label.text(countries[code] + " ("+ data_map[code]+" Opens)");
		
		
									 }
								 },
								 values: data_map,
								selectedRegions: ['MO', 'FL', 'OR'],
								scaleColors:['#FFFFFF',"#005c99"],
								 normalizeFunction: 'polynomial',
								// onRegionClick: function(event, code){
								// 	// event.preventDefault();
								// 	// country_code = '('+code+')';
		
								// 	// cus_table.search(country_code).data().draw();
								// 	// console.log(arguments);
								// 	// return false;
		
								// 	}
							 });
		
						 }
						//  $('#total_open').text("Opens By Country: " + total + " opens");
		
					}
					});

	var pie_chart = document.getElementById('pie_chart').getContext('2d');
	var myPieChart = null;
	jQuery.ajax({

		type: "POST",
		url: base_url + "api/campaign/popular_countries/" + camp_id,
		data:{'datezz':datezz},
		dataType: 'json',
		success: function(res) {
			var newData = [];
			var newLabel = [];
			var res_array = res.response;
			var temp = JSON.parse(res_array);

			var total=0;
			for(var i = 0; i < temp.length; i++) { total += parseInt(temp[i].Total_Opens); }

			//console.log(total);

			for (var index = 0; index < temp.length; index++) {
				newData.push(temp[index].Total_Opens);

				newLabel.push(temp[index].Country);

				var percentage = temp[index].Total_Opens*100/total;
				// console.log(percentage);
				if(percentage < 1){
					percentage = percentage.toPrecision(1);
				}else{
					percentage = Math.round(percentage);
				}
				create_legend("#legend_country","legend-number-country"+index, temp[index].Country, index, temp[index].Total_Opens, percentage, backgrounds[index]);

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


		}
	});

	var popular_click_device = document.getElementById('popular_click_device').getContext('2d');

	var my_popular_click_device = null;

				jQuery.ajax({

		type: "POST",
		url: base_url + "api/linkly/get_links_details/" + camp_id,  
		data:{'datezz':datezz},
		dataType: 'json',
		success: function(res) {
			var newData = [];
			var newLabel = [];
			var res_array = res.response;
			var temp = JSON.parse(res_array);

			// temp.sort(function(a,b) {return (parseInt(a.Total_Clicks) > parseInt(b.Total_Clicks)) ? -1 : ((parseInt(b.Total_Clicks) > parseInt(a.Total_Clicks)) ? 1 : 0);} ); 
			// console.log(temp);
			var total=0;
			for(var i in temp) { 
				total += parseInt(temp[i].total); 
			}

			for (var index = 0; index < temp.length; index++) {
				newData.push(temp[index].total);
				newLabel.push(temp[index].ld_platform);
				create_legend("#legend_popular_click_device","legend_popular_click_device"+index, temp[index].ld_platform, index, temp[index].total, Math.round(temp[index].total*100/total), backgrounds[index]);

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

				if(my_popular_click_device != null){
					my_popular_click_device.destroy();
				}

			var options = {        
				cutoutPercentage: 75,
				legend:{
					position:'bottom',
					display: false
				}
			};
			my_popular_click_device = new Chart(popular_click_device,{

					type: 'doughnut',
					data: piedata,
					options: options
				});


		}
		});


	


	var email_clients_pie_chart = document.getElementById('email_clients_pie_chart').getContext('2d');
	var myEmailClientsPieChart = null;
	jQuery.ajax({

		type: "POST",
		url: base_url + "api/campaign/email_clients/" + camp_id,
		data:{"datezz":datezz},
		dataType: 'json',
		success: function(res) {
			var newData = [];
			var newLabel = [];
			var res_array = res.response;
			var temp = JSON.parse(res_array);

			temp.sort(function(a,b) {return (parseInt(a.Total_Clicks) > parseInt(b.Total_Clicks)) ? -1 : ((parseInt(b.Total_Clicks) > parseInt(a.Total_Clicks)) ? 1 : 0);} ); 

			var total=0;
			for(var i in temp) { 
				total += parseInt(temp[i].Total_Clicks); 
			}

			for (var index = 0; index < temp.length; index++) {
				newData.push(temp[index].Total_Clicks);
				newLabel.push(temp[index].Device_Name);
				create_legend("#legend_email_client","legend-email-client"+index, temp[index].Device_Name, index, temp[index].Total_Clicks, Math.round(temp[index].Total_Clicks*100/total), backgrounds[index]);

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

				if(myEmailClientsPieChart != null){
					myEmailClientsPieChart.destroy();
				}

			var options = {        
				cutoutPercentage: 75,
				legend:{
					position:'bottom',
					display: false
				}
			};
			myEmailClientsPieChart = new Chart(email_clients_pie_chart,{

					type: 'doughnut',
					data: piedata,
					options: options
				});


		}
	});

	var device_label = [];
	var device_data = [];
	var clicks_comparison = document.getElementById('clicks_comparison').getContext('2d');
	var myBarChart = null;

	var total_perc = <?php echo $total_opens;?>;
// 		jQuery.each(res, function(key,value) {
					// device_label.push(current_camp_name);
					device_data.push(total_perc);
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


			var device_label = [];
	var device_data = [];
	var engage_time_comparison = document.getElementById('engage_time_comparison').getContext('2d');
	var my_engage_time_BarChart = null;

	var total_perc = <?php echo $total_opens;?>;
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

				
				if(my_engage_time_BarChart != null)
				{
					my_engage_time_BarChart.destroy();
				}
				
				my_engage_time_BarChart = new Chart(engage_time_comparison, {
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

	function create_legend(legend_name, legend_number, name, index, total, percentage, backgrounds){
		jQuery(legend_name).append("<div class='legend-group'><div class='legend-name'>"+name+
																"</div><div id='"+legend_number+"' class='legend-number'><span style='text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);'>"+numberWithCommas(total)+"</span>"+
																"</div><div class='legend-name-percentage'>"+percentage+"%<div></div>");
				// console.log(backgrounds);
				jQuery("#"+legend_number).css("background-color",backgrounds);
	}

	jQuery('.bgcolor').click(function(){
		// console.log('Hello');
		var thiszz = jQuery(this);

		if(thiszz.hasClass('active')){
			return false;
		}
		var id = thiszz.data('id');
		// console.log(id);

		if(id == 'overview'){
			jQuery('.report-box').each(function(){
				jQuery(this).fadeIn(1500);
			})
			
			jQuery('.clicks-comparison').hide();
			jQuery('.engage-time-comparison').hide();
			jQuery('.report').hide();
			jQuery('.hot-leads').hide();
		}else{
			jQuery('.report-box').each(function(){
				jQuery(this).fadeOut(1500);
			}).promise().done(function(){
				jQuery(id).fadeIn(1500);
			})
		}
		jQuery('.bgcolor').removeClass('active');
		jQuery(this).addClass('active');

		jQuery('.report-title').hide();

		if(id == '.report'){
			jQuery('#blah').attr('src', '#');
			jQuery('#report_img').attr('src', '#');
			
			jQuery('.module').removeClass('module-selected');
		}
		
	})

	jQuery('.customise-modules').click(function(){
		jQuery('.report-box').each(function(){
				jQuery(this).fadeOut(1500);
			}).promise().done(function(){
				jQuery('.report').fadeIn(1500);
				jQuery('.bgcolor').removeClass('active');
				jQuery('.bgcolor[data-id=".report"]').addClass('active');
			})

			jQuery('.report-title').hide();

			jQuery('#blah').attr('src', '#');
			jQuery('#report_img').attr('src', '#');
	})

	

	jQuery('.module').click(function(){
		if(jQuery(this).hasClass('module-selected')){
			jQuery(this).removeClass('module-selected');
		}else{
			jQuery(this).addClass('module-selected');
		}
	})

	jQuery('#create_report').click(function(){
		var options = [];

		var logo = jQuery('#report_img').attr('src');
		// var temp = jQuery('#theFile').get(0).files[0];

		var date = new Date();

		var day = date.getDate();
		  var month = date.getMonth() + 1;
		  var year = date.getFullYear();

		var created_date = year + '-' + month + '-' + day;

		if(jQuery('.module-selected') == undefined || logo == '#'){
			alert('Please select module and logo to make report');
			return false;
		}
		
		var opens_comparison_label = [];
		var opens_comparison_data = [];

		var opens_comparison_read = [];
		

		opens_comparison_label.push(jQuery('.title').data('value'));
		opens_comparison_data.push(total_perc);

		opens_comparison_read.push(camp_read);
		// console.log(camp_read);
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
				var cam_reads = jQuery(this).data('camp-reads');

				opens_comparison_read.push(cam_reads)

			}
		}).promise().done(function(){
					jQuery('.report').hide();

				jQuery('.report-title').fadeIn(1000);

				// console.log(opens_comparison_label);

				if(opens_comparison_label.length > 1){
						// console.log("GOOOO HERE");

						options.push('clicks-comparison');
						options.push('engage-time-comparison');

						jQuery('.clicks-comparison').show();
						jQuery('.engage-time-comparison').show();
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


						var barData = {
						labels: opens_comparison_label,
						datasets: [
							{
								label: 'Opens',

								backgroundColor: backgrounds,
								borderColor: backgrounds,
								borderWidth: 1,
//			 			            fillColor: '#382765',
								data: opens_comparison_read
							}
						]
					};

				
				if(my_engage_time_BarChart != null)
				{
					my_engage_time_BarChart.destroy();
				}
				
				my_engage_time_BarChart = new Chart(engage_time_comparison, {
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

			my_engage_time_BarChart.update();


				}else{
					jQuery('.clicks-comparison').hide();
				}
				
				
				jQuery.ajax({   

						type: "post",
						url:  base_url + "api/campaign/create_report",
						data:{
							camp_id : camp_id,
							email : email,
							options : options,
							logo : logo,
							created_date : created_date,
							type: 1
						},
						// dataType: 'json',
						success: function(res) {

							var obj = JSON.parse(res.response);

							jQuery('#report_table > tbody tr:last').remove();
							jQuery('#report_table > tbody tr:first').before('<tr><td>'+obj[0]+'</td><td>'+obj[1]+'</td><td><a href="'+home_url+'/report/?re_code='+obj[2]+'" target="_blank"style="color:#05c8c2" >'+obj[2]+'</a></td></tr>');
						}
					})
		})

		

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
	var hot_leads;
	var could_spark;
	var gone_cold;
	jQuery(document).ready(function(){

		jQuery('header').remove();
			jQuery('footer').remove();
			var options = '<?php echo $options?>';

			options = options.split(',');
		
			for (var index = 0; index < options.length; index++) {
				var element = options[index];
				// console.log(element);
				if(element != '')
				{
					jQuery('.'+element).show();
				}
			}

		var i = 0;
		jQuery(".email_client_per").each(function(){
			var thiss = jQuery(this);
			var i = 0;
			thiss.find(".popular-box").each(function(){

					var thisss = jQuery(this);
					thisss.css("background-color",backgrounds[i]);
					i++;
			})

		})

		jQuery('.hot-leads-box').hover(function(){
			jQuery('.view-list').fadeIn();
		})

		jQuery.ajax({
				type: "post",
				url:  base_url +"api/campaign/test_hot_leads",
				data: {camp_id:camp_id, email:email, datezz:datezz},
				dataType: 'json',
				success: function(res) {
					var obj = JSON.parse(res.response);

					// console.log(obj);
					for (var index = 0; index < obj.length; index++) {
						var element = obj[index].length;
						var id = '#hot-leads-' + index;
						jQuery(id).text(element);
					}

					hot_leads = obj[0];
					could_spark = obj[1];
					gone_cold = obj[2];
				}
		})

		

		jQuery('.view').click(function(){
			var value = jQuery(this).data('value');
			jQuery("#hot_leads_table > tbody").empty();
			jQuery("#hot_leads_table > tbody").append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
			if(value == 0){
				loadDataTable(hot_leads);
			}
			if(value == 1){
				loadDataTable(could_spark);
			}
			if(value == 2){
				loadDataTable(gone_cold);
			}

			jQuery('.hot-leads-box').css('border-color','#FFFFFF');
			jQuery('.arrow-down').css('display','none');
			jQuery(jQuery('.hot-leads-box')[value]).css('border-color','#fb6931');
			jQuery(jQuery('.arrow-down')[value]).fadeIn();
			jQuery('.view').css('opacity',1);
			jQuery(this).css('opacity',0.5);

			jQuery("#hot_leads_table").show();
		})

		// jQuery(".popular-box").css("background-color",backgrounds[0]);
		jQuery(".font-color").css("color",backgrounds[0]);

		
		
		jQuery('.total_click').each(function () {
			var $this = jQuery(this);
			jQuery({ Counter: 0 }).animate({ Counter: $this.data("value") }, {
			  duration: 2500,
			  easing: 'swing',
			  step: function () {
				$this.text(Math.ceil(this.Counter));
			  }
			});
		  });

		  setTimeout(() => {
			jQuery('.total_click').each(function () {
				var $this = jQuery(this);
				$this.text(numberWithCommas($this.data("value")));
			})
		  }, 2500);

		  jQuery('[data-toggle="tooltip"]').tooltip();


		  load_opens_clicks_activity(1,undefined,1);

		  jQuery("#daily_hourly").change(function(){
			  var val = jQuery(this).val();

			//   console.log(val);

			  load_opens_clicks_activity(val,undefined,0);

			  


		  })

		//   load_email_click_detail(133, 235);

		  jQuery(".link_clicked").click(function(){

				var id = jQuery(this).data("id");
				var linkid = jQuery(this).data("linkid");

				jQuery('#click_details > tbody').empty();
				jQuery('#click_details > tbody').append("<tr></tr>");

				load_email_click_detail(id, linkid);

		  })

		  jQuery(document).on("click",".clicks_details", function(){
			 
			  var camp = jQuery(this).data("mcamp");
			  var datess = jQuery(this).data("timezzz");

			  console.log(datess);

			  load_opens_clicks_activity(0,datess,0);

			  jQuery(".clicks_details").each(function(){
				jQuery(this).parents("tr").first().css("border","none");
			  })
			  jQuery(this).parents("tr").first().css("border","1px solid");
			  jQuery(this).parents("tr").first().css("border-color",backgrounds[0]);

		  })
		//   jQuery(".clicks_details").click(function(){
											
		
		//  })

		jQuery(document).on("click",".export_cvs_file", function(){  

			window.location = base_url + "/report_file/" + jQuery(this).data("file");
		
		})

		jQuery(document).on("click",".email_report_file", function(){  

			window.location = base_url + "/report_file/" + jQuery(this).data("file");

		})

		

		// html2canvas(document.body).then(function(canvas) {
			
		// 	this.document.body.appendChild(canvas);
		// });

		
		

		  
	})

	const numberWithCommas = (x) => {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	function loadDataTable(list){
		for (var index = 0; index < list.length; index++) {
					var element = list[index];				
					var d = new Date(element.Open_Time);

					var datestring = d.getDate()  + "-" + (d.getMonth()+1) + "-" + d.getFullYear() + " " +
					d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

					element.Cust_Email_uniqid = "---------------------";

					jQuery('#hot_leads_table > tbody tr:last').after('<tr><td>'+element.Cust_Email_uniqid+'</td><td>'+element.Reading_Time+'</td><td>'+element.Accumulator+'</td><td>'+element.Country+'</td><td>'+element.City+'</td><td></td><td></td><td></td><td>'+datestring+'</td></tr>');
					// if(index == 100) break;
				}

				// jQuery('#hot_leads_table > tbody tr:first').remove();
				// jQuery('#hot_leads_table').DataTable({
				// 	"pageLength": 300
				// });
	}

	function load_email_click_detail(camp_id, link_id){
		

		jQuery.ajax({

				type: "POST",
				url: base_url + "api/linkly/get_email_click/" + camp_id + "/" + link_id,
				data: {'datezz':datezz},
				dataType: 'json',
				success: function(res) {

					var res_array = res.response;
					// console.log(res.response);
					var report_file = res.report_file;

					console.log(report_file);
					var temp = JSON.parse(res_array);

					for (var index = 0; index < temp.length; index++) {
						var element = temp[index];

						jQuery('#click_details > tbody tr:last').after("<tr><td>"+element.email+"</td><td>"+element.total+"</td></tr>");
					}

					jQuery("#email_click_report").data("file",report_file);

					
				}
			})

	}
	

	function load_opens_clicks_activity(val,datess,first){

		if(datess != undefined){

			// datess = datess.split(" ").join("_");
			var new_url_1 = base_url + "api/campaign/open_daily_activity/" + camp_id + "/" + val + "/1";
			var new_url_2 = base_url + "api/linkly/open_hourly_click_activity/" + master_camp + "/" + val + "/1";

		}else{
			var new_url_1 = base_url + "api/campaign/open_daily_activity/" + camp_id + "/" + val + "/1";
			var new_url_2 = base_url + "api/linkly/open_hourly_click_activity/" + master_camp + "/" + val + "/1";
		}
							
		jQuery.ajax({

				type: "POST",
				url: new_url_2,
				data: {"datess":datess, "datezz":datezz},
				// dataType: 'json',
				success: function(res) {

					jQuery('.container-pad-50').css('opacity',1);

					// res = JSON.parse(res);
					//console.log(res.response);
					var res_array = res.response;

					var report_file = res.report_file;

					jQuery("#report_activity").data("file", report_file);
					// console.log(report_file);
					var temp = JSON.parse(res_array);
					//console.log(JSON.parse(res_array));
					var newData = [];
					var newLabel = [];

					var newLabelTime = [];

					var new_unique_opens = [];
					for (var index = 0; index < temp.length; index++) {   
						var element = temp[index];
						// console.log(element);
						newData.push(parseInt(element.unique_opens));
						newLabel.push(element.time);
						// newLabel.push(element.timezzz);
						// newLabelTime.push(element.timezzz);

						new_unique_opens.push(element.uniq_opens);
					}

					jQuery.ajax({

							type: "POST",
							url: new_url_1,   
							data: {"datess":datess, "datezz":datezz},
							// dataType: 'json',
							success: function(res2) {

											var res_array2 = res2.response;
										// console.log(res.response);
										var temp2 = JSON.parse(res_array2);
										//console.log(JSON.parse(res_array));
										var newData2 = [];
										var newLabel2 = [];

										var new_unique_opens_2 = [];
										if(val != 0){
											jQuery('#open_click_details > tbody').empty();
											jQuery('#open_click_details > tbody').append("<tr></tr>");
										}

										

										var sum_opens = 0;
										var sum_clicks = 0;

										var sum_unique_opens = 0;
										var sum_unique_clicks = 0;

										for (var index = 0; index < temp2.length; index++) {
											var element = temp2[index];
											// console.log(element);
											newData2.push(parseInt(element.unique_opens));
											newLabel2.push(element.time);

											new_unique_opens_2.push(element.uniq_opens);

											newLabelTime.push(element.timezzz);

											if(new_unique_opens[index] == undefined){
													new_unique_opens[index] = 0;
													newData[index] = 0;
												}

											sum_opens += parseInt(newData2[index]);
											sum_clicks += parseInt(newData[index]);

											sum_unique_opens += parseInt(new_unique_opens_2[index]);
											sum_unique_clicks += parseInt(new_unique_opens[index]);

											var who = "";
											var who2 = "";
											if(parseInt(new_unique_opens_2[index]) != 0){
												who = "<a class='email_report_file' data-file="+element.emails_file+" style='font-size:12px'>(Who)</a>";
											}

											// if(parseInt(new_unique_opens[index]) != 0){
											// 	who2 = "<a style='font-size:12px'>(Who)</a>";
											// }


											if(val == 2 && (parseInt(new_unique_opens_2[index]) != 0)){
												

												jQuery('#open_click_details > tbody tr:last').after("<tr><td><a href='javascript:void(0)' class='clicks_details' data-mcamp='"+master_camp+"' data-timezzz='"+newLabelTime[index]+"'>"+newLabel2[index]+"</a></td><td>"+numberWithCommas(new_unique_opens_2[index])+" "+who+"</td><td>"+numberWithCommas(newData2[index])+"</td><td>"+new_unique_opens[index]+" "+who2+"</td><td>"+numberWithCommas(parseInt(newData[index]))+"</td></tr>");

											}
											
										}

										if(val == 2){

												jQuery('#open_click_details > tbody tr:last').after("<tr><td></td><td>N/A "+'<span><i class="fa fa-info-circle" style="opacity: 0.5;" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="The unique opens are showed in the time-frame, so this total is not useful."></i></span>'+"</td><td>"+numberWithCommas(sum_opens)+"</td><td>N/A "+'<span><i class="fa fa-info-circle" style="opacity: 0.5;" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="The unique clicks are showed in the time-frame, so this total is not useful."></i></span>'+"</td><td>"+numberWithCommas(sum_clicks)+"</td></tr>");
												jQuery('[data-toggle="tooltip"]').tooltip();
										}
										

										

										jQuery(".link-clicks").css("color","#009bdb");
										jQuery(".email-opens").css("color","#FF5722");


										// console.log(newLabel2);
										var data = {
									labels: newLabel2,
									datasets: [
										{
											label: "clicks",
											fill: true,
											lineTension: 0,
											pointRadius: 3,
											borderWidth: 4 ,
											backgroundColor: 'rgba(0, 155, 219, 0.25)',
											borderColor: "#009bdb",
											borderCapStyle: 'butt',
											borderDash: [],
											borderDashOffset: 0.0,
											borderJoinStyle: 'miter',
											pointBorderColor: "#009bdb",
											pointBackgroundColor: "#fff",
											pointBorderWidth: 3,
											pointHoverRadius: 3,
											pointHoverBackgroundColor: "rgba(0, 155, 219, 0.72)",
											pointHoverBorderColor: "#009bdb",
											pointHoverBorderWidth: 2,
											pointHitRadius: 2,
											data: newData,
											spanGaps: false,
											zeroLineColor: "#009bdb"
										},
										{
											label: "opens",
											fill: true,
											lineTension: 0,
											pointRadius: 3,
											borderWidth: 4 ,
											backgroundColor: 'rgba(255, 87, 34, 0.25)',
											borderColor: "#FF5722",
											borderCapStyle: 'butt',
											borderDash: [],
											borderDashOffset: 0.0,
											borderJoinStyle: 'miter',
											pointBorderColor: "#FF5722",
											pointBackgroundColor: "#fff",
											pointBorderWidth: 3,
											pointHoverRadius: 3,
											pointHoverBackgroundColor: "rgba(255, 87, 34, 0.72)",
											pointHoverBorderColor: "#FF5722",
											pointHoverBorderWidth: 2,
											pointHitRadius: 2,
											data: newData2,
											spanGaps: false,
											zeroLineColor: "#FF5722"
										}
									]
								};

						if(mydaily_line_chart_time != null)
							{
								mydaily_line_chart_time.destroy();
							}

							var options = {        
									// cutoutPercentage: 75,
									legend:{
										// position:'bottom',
										display: false
									},
									animation: {
											
											onComplete: function(animation) {
												// console.log(document.getElementById('daily_line_chart_time').toDataURL('image/png'));

												// jQuery("#img_opens_pie_chart").attr('src',document.getElementById('opens_pie_chart').toDataURL('image/png'));

												// jQuery("#img_opens_pie_chart").css("display","block");
												// jQuery("#opens_pie_chart").css("display","none");

												// // jQuery("#img_daily_line_chart_time").css("display","block");
												// // jQuery("#daily_line_chart_time").css("display","none");

												// html2canvas(document.body).then(function(canvas) {
												// 	// Export the canvas to its data URI representation
												// 	var base64image = canvas.toDataURL("image/png");

												// 	// Open the image in a new window
												// 	// window.open(base64image , "_blank");

												// 	document.body.appendChild(canvas);
												// });

												if(datezz != null && first == 1){
													createDialog();
												}
											}
										}
								};
						mydaily_line_chart_time = new Chart(daily_line_chart_time, {
								type: 'line',
								data: data,
								options: options
							});


							// html2canvas(document.querySelector("#daily_line_chart_time")).then(canvas => {
							// 	// document.body.appendChild(canvas)
							// 	console.log(canvas.toDataURL('image/png'));
							// });

							// html2canvas(document.body).then(function(canvas) {
							// 	// Export the canvas to its data URI representation
							// 	var base64image = canvas.toDataURL("image/png");

							// 	// Open the image in a new window
							// 	// window.open(base64image , "_blank");

							// 	console.log(base64image);
							// });

							// Canvas2Image.saveAsPNG(daily_line_chart_time);
							// console.log(document.getElementById('daily_line_chart_time').toDataURL('image/jpeg'));
							// var img = new Image();
							// img.onload = function(){
							// 	daily_line_chart_time.drawImage(img, 0, 0);

							// 	alert(daily_line_chart_time.toDataURL('image/jpeg'));
							// };

							// img.src = URL.createObjectURL(event.target.files[0]);


							if(val == 2 || val == 0)
									  jQuery('#open_click_details').fadeIn();
							  else
									  jQuery('#open_click_details').fadeOut();


							}

					})


					


				}
				});
	}

	function createDialog(){

		if(!alertify.topup){
		//define a new dialog
		alertify.dialog('topup',function factory(){
		return{
			main:function(message){
			this.message = message;
			this.setHeader('<h5>YOU’RE MISSING OUT!</h5>');
			},
			setup:function(){
				return { 
				// buttons:[{text: "cool!", key:27/*Esc*/}],
				// focus: { element:0 }
				};
			},
			prepare:function(){
			this.setContent(this.message);
			},
			build:function(){
			this.elements.root.classList.add("topups");
			}
		}}); 
	}

	 alertify.topup("<div class='alertify-basket'><div class='black'>You have reached your purchased limit of credits for this campaign, and are currently missing out on data of customers. Top-up credits for this campaign to access full & updated analytics.</div><div class='normal'></div><div class='button-basket'><a href='javascript:showClose();' class='light'>Continue</a><a href='"+home_url+"/my-account' class='light'>Go to Top Up</a></div></div>");
	 window.showClose = function(){
		  alertify.topup().close();
		//   alertify.close("");
		}
		
	}
	
</script>

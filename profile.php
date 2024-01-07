<?php 
	require_once("includes/config.inc.php"); 
	//error_reporting(E_ALL); ini_set('display_errors', 1);
	$sql = mysql_query("select * from dream_cars where buyer_id='".$_SESSION['ses_user_info']['id']."' order by id desc limit 1");
	$dream_car_info = mysql_fetch_assoc ($sql);
	
	
	$sql = "SELECT * FROM `dealers_car_biddings` where last_bidding_time>'".time()."' and dream_car_uniqueid = '".$dream_car_info['bid_id']."' order by id desc";
	
	$result = mysql_query($sql);
	$bidlists = array();
	while($row = mysql_fetch_assoc($result)) {
		$bidlists[] = $row;
	}
	
	//$sql = "SELECT * FROM `car_bidding_amounts` where created<'".$dream_car_info['last_bidding_time']."' and dream_car_uniqueid = '".$dream_car_info['bid_id']."' order by bid_amount_diffrence asc";
	$sql = "SELECT * FROM `car_bidding_amounts` WHERE id IN (SELECT MAX(id) FROM `car_bidding_amounts` where dream_car_uniqueid = '".$dream_car_info['bid_id']."' GROUP BY dealership_id) order by bid_amount_diffrence asc";
	
	$result = mysql_query($sql);
	$biddding_amount_lists = array();
	while($row = mysql_fetch_assoc($result)) {
		$biddding_amount_lists[] = $row;
	}
	
	function time_elapsed_string($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);
	
		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;
	
		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}
	
		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
?>
<!doctype html>
<!--[if IE 7 ]> <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="images/favicon.ico">
<title>Automotive Car Dealership &amp; Business HTML Template</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yellowtail%7COpen%20Sans%3A400%2C300%2C600%2C700%2C800" media="screen" />
<!-- Custom styles for this template -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css" media="screen" />
<link href="css/jquery.fancybox.css" rel="stylesheet">
<link href="css/jquery.selectbox.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!--<link href="css/mobile.css" rel="stylesheet">-->
<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
<link href="css/animate.min.css" rel="stylesheet">
<link href="css/ts.css" type="text/css" rel="stylesheet">
<link href="css/styles_rasel.css" type="text/css" rel="stylesheet">
<link href="css/jquery-ui.css" type="text/css" rel="stylesheet">
<link href="css/jquery.countdown.css" type="text/css" rel="stylesheet">
<style>
	/* Landscape phone to portrait tablet */
	@media (max-width: 767px) {
		.col-sm-6{width:50% !important;float:left;}
	}
	
	/* Landscape phones and down */
	@media (max-width: 480px) {
		.col-sm-6{width:50% !important;float:left;}
	}
	
</style>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<style>
	input[type="radio"], input[type="checkbox"]{
		left:0;
		position: relative;	
	}
</style>
</head>

<body>
<?php include('header.php'); ?>

<div id="match_div">
	<?php foreach($bidlists as $bidlist): $match_arr = json_decode($bidlist['match_details']);  ?>
        <div id="modal_match_<?php echo $bidlist['id'] ?>" style="display:none;background-color:#fff;min-width:360px;max-width:360px;height:680px;overflow:auto">
            <table class="table table-striped">
                <thead>
                    <tr class="info">
                        <th colspan="3"><?php echo $dream_car_info['name'] ?></th>
                    </tr>
                    <tr>
                        <td colspan="3" style="background-color:#DFF7C3">
                            <b>
                                <?php if($bidlist['is_trade_available'] == "yes"): echo 'Have Trade'; ?>
                                <?php else: echo 'Don\'t have trade'; ?><?php endif; ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="background-color:#DFF7C3">
                            <b>
                                <?php if($bidlist['is_finance_available'] == "yes"): echo 'Need Financing'; ?>
                                <?php else: echo 'Don\'t need financing'; ?><?php endif; ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="background-color:#DFF7C3">
                            <b>
                                <?php echo 'Want to search in Zipcode: '.$dream_car_info['zip'].', '.$dream_car_info['search_range'].' radius'; ?>
                            </b>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="35%"><b>Body Type</b></td>
                        <td width="60%"><?php echo $dream_car_info['body_style'] ?></td>       
                        <td width="5%"><input name="match[]" type="checkbox" value="check_body" <?php if(in_array('check_body',$match_arr)): ?> checked <?php endif; ?>></td>         
                    </tr>
                    
                    <tr>
                        <td><b>Make</b></td>
                        <td><?php echo $dream_car_info['make'] ?></td>  
                        <td><input name="match[]" type="checkbox" value="check_make" <?php if(in_array('check_make',$match_arr)): ?> checked <?php endif; ?>></td>
                    </tr>
                    
                    <tr>
                        <td><b>Model</b></td>
                        <td><?php echo $dream_car_info['model'] ?></td>    
                        <td><input name="match[]" type="checkbox" value="check_model" <?php if(in_array('check_model',$match_arr)): ?> checked <?php endif; ?>></td>                    
                    </tr>
                    
                    <tr>
                        <td><b>Year</b></td>
                        <td><?php echo $dream_car_info['year'] ?></td>  
                        <td><input name="match[]" type="checkbox" value="check_year" <?php if(in_array('check_year',$match_arr)): ?> checked <?php endif; ?>></td>                      
                    </tr>
                    
                    <tr>
                        <td><b>Engine</b></td>
                        <td><?php echo $dream_car_info['engine'] ?></td>  
                        <td><input name="match[]" type="checkbox" value="check_engine" <?php if(in_array('check_engine',$match_arr)): ?> checked <?php endif; ?>></td>                      
                    </tr>
                    
                    <tr>
                        <td><b>Transmission</b></td>
                        <td><?php echo $dream_car_info['transmission'] ?></td> 
                        <td><input name="match[]" type="checkbox" value="check_transmission" <?php if(in_array('check_transmission',$match_arr)): ?> checked <?php endif; ?>></td>               
                    </tr>
                    
                    <tr>
                        <td><b>Drive</b></td>
                        <td><?php echo $dream_car_info['drive'] ?></td> 
                        <td><input name="match[]" type="checkbox" value="check_drive" <?php if(in_array('check_drive',$match_arr)): ?> checked <?php endif; ?>></td>               
                    </tr>
                    
                    <tr>
                        <td><b>Number of Door</b></td>
                        <td><?php echo $dream_car_info['door'] ?></td>  
                        <td><input name="match[]" type="checkbox" value="check_number_doors" <?php if(in_array('check_number_doors',$match_arr)): ?> checked <?php endif; ?>></td>              
                    </tr>
                    
                    <tr>
                        <td><b>Trim</b></td>
                        <td><?php echo $dream_car_info['trim'] ?></td>  
                        <td><input name="match[]" type="checkbox" value="check_trim" <?php if(in_array('check_trim',$match_arr)): ?> checked <?php endif; ?>></td>                      
                    </tr>
                    
                    <tr>
                        <td><b>Interior Fabric</b></td>
                        <td><?php echo $dream_car_info['internal_fabric'] ?></td>  
                        <td><input name="match[]" type="checkbox" value="check_interior_fabric" <?php if(in_array('check_interior_fabric',$match_arr)): ?> checked <?php endif; ?>></td>              
                    </tr>
                    
                    <tr>
                        <td><b>Interior Color</b></td>
                        <td><span style="background-color:#<?php echo $dream_car_info['interior_color'] ?>;position: relative; float: left; height: 20px; width: 20px;"></span></td> 
                        <td><input name="match[]" type="checkbox" value="check_interior_color" <?php if(in_array('check_interior_color',$match_arr)): ?> checked <?php endif; ?>></td>                       
                    </tr>
                    
                    <tr>
                        <td><b>Exterior Color</b></td>
                        <td><span style="background-color:#<?php echo $dream_car_info['exterior_color'] ?>;position: relative; float: left; height: 20px; width: 20px;"></span></td> 
                        <td><input name="match[]" type="checkbox" value="check_exterior_color" <?php if(in_array('check_exterior_color',$match_arr)): ?> checked <?php endif; ?>></td>               
                    </tr>
                    
                    <?php 
                        $package_option_arr = explode('##',$dream_car_info['opt_package']);
                        if(!empty($package_option_arr)):
                    ?>
                    
                    <tr>
                        <td colspan="3" style="background-color:#E2FCFF">Package Options</td>
                    </tr>
                    <?php foreach($package_option_arr as $package_option_ar): ?>
                    <tr>
                        <td colspan="2"><?php echo $package_option_ar ?></td>    
                        <td><input name="match[]" type="checkbox" value="check_opt_package" <?php if(in_array('check_opt_package',$match_arr)): ?> checked <?php endif; ?>></td>            
                    </tr>
                    <?php endforeach; endif; ?>
                    
                    
                    <?php 
                        $interior_option_arr = explode('##',$dream_car_info['opt_interior']);
                        if(!empty($interior_option_arr)):
                    ?>
                    
                    <tr>
                        <td colspan="3" style="background-color:#E2FCFF">Interrior Options</td>
                    </tr>
                    <?php foreach($interior_option_arr as $interior_option_ar): ?>
                    <tr>
                        <td colspan="2"><?php echo $interior_option_ar ?></td>                
                        <td><input name="match[]" type="checkbox" value="check_opt_interior" <?php if(in_array('check_opt_interior',$match_arr)): ?> checked <?php endif; ?>></td>  
                    </tr>
                    <?php endforeach; endif; ?>
                    
                    
                    <?php 
                        $exterior_option_arr = explode('##',$dream_car_info['opt_exterior']);
                        if(!empty($exterior_option_arr)):
                    ?>
                    
                    <tr>
                        <td colspan="3" style="background-color:#E2FCFF">Exterrior Options</td>
                    </tr>
                    <?php foreach($exterior_option_arr as $exterior_option_ar): ?>
                    <tr>
                        <td colspan="2"><?php echo $exterior_option_ar ?></td> 
                        <td><input name="match[]" type="checkbox" value="check_opt_exterior" <?php if(in_array('check_opt_exterior',$match_arr)): ?> checked <?php endif; ?>></td>                 	</tr>
                    <?php endforeach; endif; ?>
                     
                    
                    <?php 
                        $additional_option_arr = explode('##',$dream_car_info['opt_additional_fees']);
                        if(!empty($additional_option_arr)):
                    ?>
                    
                    <tr>
                        <td colspan="3" style="background-color:#E2FCFF">Additional Options</td>
                    </tr>
                    <?php foreach($additional_option_arr as $additional_option_ar): ?>
                    <tr>
                        <td colspan="2"><?php echo $additional_option_ar ?></td>       
                        <td><input name="match[]" type="checkbox" value="check_opt_additional" <?php if(in_array('check_opt_additional',$match_arr)): ?> checked <?php endif; ?>></td>           
                    </tr>
                    <?php endforeach; endif; ?>
                    
                    
                    
                    <?php 
                        $mechanical_option_arr = explode('##',$dream_car_info['opt_mechanical']);
                        if(!empty($mechanical_option_arr)):
                    ?>
                    
                    <tr>
                        <td colspan="3" style="background-color:#E2FCFF">Mechanical Options</td>
                    </tr>
                    <?php foreach($mechanical_option_arr as $mechanical_option_ar): ?>
                    <tr>
                        <td colspan="2"><?php echo $mechanical_option_ar ?></td>                
                        <td><input name="match[]" type="checkbox" value="check_opt_mechanical" <?php if(in_array('check_opt_mechanical',$match_arr)): ?> checked <?php endif; ?>></td>  
                    </tr>
                    <?php endforeach; endif; ?>
                    
                    
                    <?php 
                        $safety_option_arr = explode('##',$dream_car_info['opt_safety']);
                        if(!empty($safety_option_arr)):
                    ?>
                    
                    <tr>
                        <td colspan="3" style="background-color:#E2FCFF">Safety Options</td>
                    </tr>
                    <?php foreach($safety_option_arr as $safety_option_ar): ?>
                    <tr>
                        <td colspan="2"><?php echo $safety_option_ar ?></td>    
                        <td><input name="match[]" type="checkbox" value="check_opt_safety" <?php if(in_array('check_opt_safety',$match_arr)): ?> checked <?php endif; ?>></td>              
                    </tr>
                    <?php endforeach; endif; ?>
                    
                    <tr>
                        <td colspan="3">&nbsp;&nbsp;</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    <?php endforeach; ?>
</div>

<div class="clearfix"></div>
<section id="secondary-banner" style="background-image:none;background-color:#fff;text-shadow:none;padding-top:80px;">
    
			<div id="wrapper">
                <div id="layout-static">
                
                <?php include('profile_left_menu.php'); ?>
                
                
                <div class="static-content-wrapper" style="background-color:#fff">
                  <div class="static-content">
                    <div class="page-content"><br/><br/>
                      
                      <div class="container-fluid">
                        <!--<div class="row1">
                          <div class="col-md-3">
                            <div class="info-tile tile-orange" style="background-color:#0063c0">
                              <div class="tile-body" style="text-align:center;color:#fff"><span>5</span></div>
                              <div class="tile-heading" style="text-align:center;color:#fff"><span>VEHICLES</span></div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="info-tile tile-success" style="background-color:#0063c0">
                              <div class="tile-body" style="text-align:center;color:#fff"><span>3</span></div>
                              <div class="tile-heading" style="text-align:center;color:#fff"><span>TRADES</span></div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="info-tile tile-info" style="background-color:#0063c0">
                              <div class="tile-body" style="text-align:center;color:#fff"><span>2</span></div>
                              <div class="tile-heading" style="text-align:center;color:#fff"><span>BIDS</span></div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="info-tile tile-danger" style="background-color:#0063c0">
                              <div class="tile-body" style="text-align:center;color:#fff">
                                <span>1</span>
                              </div>
                              <div class="tile-heading" style="text-align:center;color:#fff"><span>APPROVED</span></div>
                            </div>
                          </div>
                        </div>-->
                        <div class="row1">
                        <div class="col-md-8">
                        	<div class="panel-heading" style="background-color:#198ef8">
			                    <p style="margin-top:0px;margin-bottom:0px;text-align:center;font-size:20px;font-weight:bold">My Bids</p>	
                            </div>
                            
                            <div style="border:1px solid #68b7ff">
                            	<?php 
									$sql = mysql_query("select image from car_images where year='".$dream_car_info['year']."' and make='".$dream_car_info['make']."' and model='".$dream_car_info['model']."' and trim='".$dream_car_info['trim']."' and engine='".$dream_car_info['engine']."' and transmission='".$dream_car_info['transmission']."' and wheel='".$dream_car_info['drive']."' limit 1") ;
									$car_image_info = mysql_fetch_assoc ($sql);
								?>
                                <!--<img src="<?php echo site_url ?>images/car_images/resized/597a29cae7304_R.png" style="width:500px;">-->
                                <div style="text-align:center">
                                	<img src="<?php echo $car_image_info['image']?$car_image_info['image']:site_url.'images/no_image.png' ?>" style="width:500px">
                                </div>
                                <p style="font-size:20px;color:#595858;text-align:center;font-weight:bold;margin-top:15px;"><?php echo $dream_car_info['year'] ?><?php echo ' '.$dream_car_info['make'] ?><?php echo ' '.$dream_car_info['model'] ?><?php echo ' '.$dream_car_info['body_style'] ?></p>
                                <div style="width:320px;margin:0 auto">
                                    <table cellpadding="10" cellspacing="10" width="100%">
                                        <tr>
                                            <td width="7%">
                                                <span style="font-weight:bold;color:#198ef8;writing-mode: tb-rl;transform: rotate(-180deg);text-transform:uppercase">Time Left</span>
                                            </td>
                                            <td width="93%" align="center">
                                                <div style="width:100%;color: rgb(0, 0, 0) !important; font-size: 18px;" id="defaultCountdown">
                                        </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            
                            
                            <div id="tabs" style="border-color:#68b7ff;border-top:none;">
                              <ul>
                                <li><a href="#tabs-1">Activity</a></li>
                                <li><a href="#tabs-2">Details</a></li>
                                <li><a href="#tabs-3">Trade</a></li>
                                <li><a href="#tabs-4">Rebates</a></li>
                              </ul>
                              <div id="tabs-1" style="display:inline-block;width:100%">
                                <?php $i=1; foreach($biddding_amount_lists as $biddding_amount_list): ?>
                                    
                                    <?php 
										$sql = mysql_query("select * from dealers_car_biddings where dream_car_uniqueid='".$biddding_amount_list['dream_car_uniqueid']."' and dealership_id= '".$biddding_amount_list['dealership_id']."' limit 1");
										$bidding_info = mysql_fetch_assoc ($sql);
										
									?>
                                    <div style="margin-bottom:30px;">
                                        <div class="col-md-12" style="padding:0px;border:1px solid #68b7ff;border-radius:5px;">
                                            <div style="width: 100%; height:70px; padding: 5px; display: table; color: rgb(255, 255, 255) !important;">
                                                    <div style="width: 50%; padding-bottom: 5px;float:left;">
                                                        <div style="background: rgba(0, 0, 0, 0) url('images/red_ball.png') repeat scroll 0% 0%; width: 55px; height: 55px; font-size: 25px; padding: 10px;float: left;">
                                                            D<?php echo $bidding_info['dealer_random_number'] ?>
                                                        </div>
                                                        <div style="float: left; width: 210px; padding-left: 10px;">
                                                            <span class="username" style="font-weight: bold;font-size: 20px; color: #4b4b4b;;display:block"><?php echo $dream_car_info['make'] ?> Dealer <?php echo $bidding_info['dealer_random_number'] ?></span>
                                                            <span class="username" style="font-weight: bold;font-size: 14px; color: #939393;;display:block"><?php echo time_elapsed_string(date('Y-m-d h:i:s', $biddding_amount_list['created'])) ?></span>
                                                        </div>
                                                    </div>
                                                    <div style="width: 40%; float: left; margin-left: 50px; background: rgba(0, 0, 0, 0) url('admin/images/match.png') no-repeat scroll 0% 0%; height: 60px; padding-top: 8px;">
                                                        <a id="modal_trigger_<?php echo $bidding_info['id'] ?>" href="#modal_match_<?php echo $bidding_info['id'] ?>" style="color:#fff"><span style="padding-left:12px;font-size: 22px;"><?php echo $bidding_info['match_percentage'] ?>%</span></a>
                                                        
                                                        
                                                    </div>
                                                
                                            </div>
                                            
                                            
                                            <div style="width:100%;background-color:#51acff;padding:10px 5px;display:table">
                                                <div style="float: left; width: 18.5%; border-right: 1px solid rgb(255, 255, 255); margin-right: 10px; padding-right: 7px;">
                                                    <span class="username" style="font-weight: bold;font-size: 14px; color: #fff;;display:block">NEW OFFER</span>
                                                    <span class="username" style="font-weight: bold;font-size: 14px; color: #fff;;display:block">W/ REBATE</span>
                                                    <span class="username" style="font-weight: bold;font-size: 20px; color: #fff;;display:block">N/A</span>
                                                </div>
                                                
                                                <div style="float: left; width: 18.5%; border-right: 1px solid rgb(255, 255, 255); margin-right: 10px; padding-right: 7px;">
                                                    <span class="username" style="font-weight: bold;font-size: 14px; color: #fff;;display:block">NEW OFFER</span>
                                                    <span class="username" style="font-weight: bold;font-size: 14px; color: #fff;;display:block">W/O REBATE</span>
                                                    <span class="username" style="font-weight: bold;font-size: 20px; color: #fff;;display:block">$<?php echo number_format($biddding_amount_list['new_car_bid_amount']) ?></span>
                                                </div>
                                                
                                                <div style="float: left; width: 18.5%; border-right: 1px solid rgb(255, 255, 255); margin-right: 10px; padding-right: 7px;">
                                                    <span class="username" style="font-weight: bold;font-size: 14px; color: #fff;;display:block">TRADE-IN</span>
                                                    <span class="username" style="font-weight: bold;font-size: 14px; color: #fff;;display:block">OFFER</span>
                                                    <span class="username" style="font-weight: bold;font-size: 20px; color: #fff;;display:block">$<?php echo number_format($biddding_amount_list['trade_bid_amount']) ?></span>
                                                </div>
                                                
                                                <div style="float: left; width: 18.5%; border-right: 1px solid rgb(255, 255, 255); margin-right: 10px; padding-right: 7px;color:#eaf542">
                                                    <span class="username" style="font-weight: bold;font-size: 14px; display:block">YOUR COST</span>
                                                    <span class="username" style="font-weight: bold;font-size: 14px; display:block">W/ REBATE</span>
                                                    <span class="username" style="font-weight: bold;font-size: 20px; display:block">N/A</span>
                                                </div>
                                                
                                                <div style="float: left; width: 18.5%;border-right:1px solid rgb(81, 172, 255);color:#eaf542">
                                                    <span class="username" style="font-weight: bold;font-size: 14px; display:block">YOUR COST</span>
                                                    <span class="username" style="font-weight: bold;font-size: 14px;display:block"> W/O REBATE</span>
                                                    <span class="username" style="font-weight: bold;font-size: 20px; display:block">$<?php echo number_format($biddding_amount_list['bid_amount_diffrence']) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width: 80%; background-color: rgb(255, 255, 255); padding: 10px 5px; border: 1px solid #68b7ff; border-radius: 0px 0px 5px 5px; margin: 0px auto; display: table;border-top:0px;color:#595959">
                                            <div style="width:50%;float:left;color:#fff;border-right:1px solid #68b7ff;text-align:center">
                                                <span class="username" style="font-weight: bold;font-size: 20px; color: #595959;">Dealers Notes <span style="color:#68b7ff">(5)</span></span>
                                            </div>
                                            <div style="width:50%;float:left;color:#fff;text-align:center">
                                                <span class="username" style="font-weight: bold;font-size: 20px; color: #595959;">Accept Bid</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php $i++; endforeach; ?>
                                    
                                    
                                    
                              </div>
                              <div id="tabs-2">
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                              </div>
                              <div id="tabs-3">
                                <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                                <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                              </div>
                              <div id="tabs-4">
                                <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                                <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                              </div>
                            </div>
                            
                            
                            
                        </div>
                        <div class="col-md-4">
                        	<div class="panel-heading" style="background-color:#198ef8">
			                    <p style="margin-top:0px;margin-bottom:0px;text-align:center;font-size:20px;font-weight:bold">CarsMatch Support</p>	
                            </div>
                            
                            <div style="border:1px solid #68b7ff;text-align:center;margin-bottom:20px;padding:10px;">
                            	<textarea style="border:1px solid #198ef8;border-radius:5px;width:100%;height:200px;margin-bottom:10px;color:#000" placeholder="We’re sorry for the inconvenience. Currently, there is no one available at this time.  Please type your message here and we’ll get back to you as soon as someone is available."></textarea>
                                <input type="submit" value="Submit" style="background-color:#e70012;border-radius:10px;width:100px;">
                            </div>
                            
                            <div class="panel-heading" style="background-color:#198ef8;">
			                    <p style="margin-top:0px;margin-bottom:0px;text-align:center;font-size:20px;font-weight:bold">Dealer Chat</p>	
                            </div>
                            
                            <div style="border:1px solid #68b7ff;text-align:center;height:400px;">
                            	
                            </div>
                        </div>
                        	
		<!--<div class="col-md-6">
			<div class="panel panel-gray" data-widget='{"draggable": "false"}'>
                <div class="panel-heading">
                    <p style="margin-top:0px;margin-bottom:0px;">RECENT BID (ID 5882479A328C8)</p>
	                <div class="panel-ctrls button-icon-bg" 
						data-actions-container="" 
						data-action-collapse='{"target": ".panel-body"}'
						data-action-colorpicker=''
						data-action-refresh-demo='{"type": "circular"}'
						>
					</div>
				</div>
				
				<div class="panel-body scroll-pane" style="height: 320px;">
					<div class="scroll-content">
						<ul class="mini-timeline">
							<li class="mini-timeline-lime">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Vincent Keller</a> added new task <a href="#/">Admin Dashboard UI</a>
										<span class="time">4 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-deeporange">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Shawna Owen</a> added <a href="#/" class="name">Alonzo Keller</a> and <a href="#/" class="name">Mario Bailey</a> to project <a href="#/">Wordpress eCommerce Template</a>
										<span class="time">6 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-info">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Christian Delgado</a> commented on thread <a href="#/">Frontend Template PSD</a>
										<span class="time">12 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-indigo">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Jonathan Smith</a> added <a href="#/" class="name">Frend Pratt</a> and <a href="#/" class="name">Robin Horton</a> to project <a href="#/">Material Design Admin Template</a>
										<span class="time">6 hours ago</span>
									</div>
								</div>
							</li>
							<li class="mini-timeline-lime">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Vincent Keller</a> added new task <a href="#/">Admin Dashboard UI</a>
										<span class="time">4 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-deeporange">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Shawna Owen</a> added <a href="#/" class="name">Alonzo Keller</a> and <a href="#/" class="name">Mario Bailey</a> to project <a href="#/">Wordpress eCommerce Template</a>
										<span class="time">6 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-info">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Christian Delgado</a> commented on thread <a href="#/">Frontend Template PSD</a>
										<span class="time">12 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-indigo">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Jonathan Smith</a> added <a href="#/" class="name">Frend Pratt</a> and <a href="#/" class="name">Robin Horton</a> to project <a href="#/">Material Design Admin Template</a>
										<span class="time">6 hours ago</span>
									</div>
								</div>
							</li>
							<li class="mini-timeline-default">
								<div class="timeline-body ml-n">
									<div class="timeline-content">
										<button type="button" data-loading-text="Loading..." class="loading-example-btn btn btn-sm btn-default">See more</button>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>-->
        
        
        <!--<div class="col-md-6">
			<div class="panel panel-gray" data-widget='{"draggable": "false"}'>
                <div class="panel-heading">
                	<p style="margin-top:0px;margin-bottom:0px;">RECENT BID (ID 588212D5F28C8)</p>
	                <div class="panel-ctrls button-icon-bg" 
						data-actions-container="" 
						data-action-collapse='{"target": ".panel-body"}'
						data-action-colorpicker=''
						data-action-refresh-demo='{"type": "circular"}'
						>
					</div>
				</div>
				
				<div class="panel-body scroll-pane" style="height: 320px;">
					<div class="scroll-content">
						<ul class="mini-timeline">
							<li class="mini-timeline-lime">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Vincent Keller</a> added new task <a href="#/">Admin Dashboard UI</a>
										<span class="time">4 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-deeporange">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Shawna Owen</a> added <a href="#/" class="name">Alonzo Keller</a> and <a href="#/" class="name">Mario Bailey</a> to project <a href="#/">Wordpress eCommerce Template</a>
										<span class="time">6 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-info">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Christian Delgado</a> commented on thread <a href="#/">Frontend Template PSD</a>
										<span class="time">12 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-indigo">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Jonathan Smith</a> added <a href="#/" class="name">Frend Pratt</a> and <a href="#/" class="name">Robin Horton</a> to project <a href="#/">Material Design Admin Template</a>
										<span class="time">6 hours ago</span>
									</div>
								</div>
							</li>
							<li class="mini-timeline-lime">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Vincent Keller</a> added new task <a href="#/">Admin Dashboard UI</a>
										<span class="time">4 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-deeporange">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Shawna Owen</a> added <a href="#/" class="name">Alonzo Keller</a> and <a href="#/" class="name">Mario Bailey</a> to project <a href="#/">Wordpress eCommerce Template</a>
										<span class="time">6 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-info">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Christian Delgado</a> commented on thread <a href="#/">Frontend Template PSD</a>
										<span class="time">12 mins ago</span>
									</div>
								</div>
							</li>

							<li class="mini-timeline-indigo">
								<div class="timeline-icon"></div>
								<div class="timeline-body">
									<div class="timeline-content">
										<a href="#/" class="name">Jonathan Smith</a> added <a href="#/" class="name">Frend Pratt</a> and <a href="#/" class="name">Robin Horton</a> to project <a href="#/">Material Design Admin Template</a>
										<span class="time">6 hours ago</span>
									</div>
								</div>
							</li>
							<li class="mini-timeline-default">
								<div class="timeline-body ml-n">
									<div class="timeline-content">
										<button type="button" data-loading-text="Loading..." class="loading-example-btn btn btn-sm btn-default">See more</button>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>-->
        
        


        </div>
      </div>
    </div>
  </div>
                  
                  
            
    <footer role="contentinfo">
        <div class="clearfix">
            <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="fa fa-arrow-up"></i></button>
        </div>
    </footer>
            
            </div>
        </div>
    </div>
</section>









<!--Footer Start-->
<?php include('footer.php'); ?>

<script>
	
	function getDealersBids() {
		jQuery.ajax({
			  type: 'POST',
			  url: '<?php echo site_url ?>ajax/getDealersBids.php',
			  data: {
				  
			  },
		  success: function(data){
			 var res = data.split("######");
			 
			 if(res[0].length >0) {
				jQuery('#tabs-1').html(res[0]);	  
			 }
			 if(res[1].length >0) {
				jQuery('#match_div').html(res[1]);	  
			 }
			 
			 
			 //jQuery("#tabs-1").html(data);
			 //getDealersBids();
			 abc();
			 setTimeout(getDealersBids, 5000);
			}
		});			
	}
	
	getDealersBids();
	
	/*jQuery(function () {
		if ( jQuery( "#tabs" ).length ) {
			jQuery( "#tabs" ).tabs();
		}
		
		<?php foreach($bidlists as $bidlist): ?>
			jQuery("#modal_trigger_<?php echo $bidlist['id'] ?>").leanModal({top : 50, overlay : 0.6 });
		<?php endforeach; ?>
		
	});*/
</script>

<?php if(!empty($_SESSION['ses_user_info'])): ?>
<script>
function abc() {
	jQuery( document ).ready(function() {
		var austDay = new Date('<?php echo date("D M d Y H:i:s O", $dream_car_info['last_bidding_time']) ?>');
		jQuery('#defaultCountdown').countdown({until: austDay, padZeroes: true, format: 'DHMS'});
		
		
		if ( jQuery( "#tabs" ).length ) {
			jQuery( "#tabs" ).tabs();
		}
		
		<?php foreach($bidlists as $bidlist): ?>
			jQuery("#modal_trigger_<?php echo $bidlist['id'] ?>").leanModal({top : 50, overlay : 0.6 });
		<?php endforeach; ?>
		
	});
}
</script>
<?php endif; ?>


</body>
</html>
<?php 
	require_once("includes/config.inc.php"); 
	/*$bidding_time = '';
	
	
	if($_REQUEST['bid'] == 'BID ME NOW') {
		$bidding_time = strtotime('+2 days', time());	
		
		$sql = mysql_query("select * from tmp_con_selections where id='".$_REQUEST['cid']."' limit 1");
		$car_info = mysql_fetch_assoc ($sql);
		
		$sql = mysql_query("select * from zips where zip='".$_REQUEST['zip']."' limit 1");
		$zip_info = mysql_fetch_assoc ($sql);
		
		$sql = "INSERT INTO `dream_cars` set 
		   `buyer_id` = '".$_SESSION['ses_user_info']['id']."',
		   `bid_id` = '".$bid_unique_id."',
		   `user_session_id` = '".session_id()."',
		   `cid` = '".$_REQUEST['cid']."',
		   `name` = '".$car_info['name']."',
		   `make` = '".$car_info['make']."',
		   `model` = '".$car_info['model']."',
		   `year` = '".$car_info['year']."',
		   `engine` = '".$car_info['engine']."',
		   `trim` = '".$car_info['trim']."',
		   `transmission` = '".$car_info['transmission']."',
		   `drive` = '".$car_info['drivenWheels']."',
		   `door` = '".$car_info['numOfDoors']."',
		   `internal_fabric` = '".$car_info['interior_fabric']."',
		   `body_style` = '".$car_info['body_type']."',
		   `interior_color` = '".$_REQUEST['i']."',
		   `exterior_color` = '".$_REQUEST['e']."',
		   `opt_package` = '".json_encode($_REQUEST['opt_package'])."',
		   `opt_interior` = '".json_encode($_REQUEST['opt_interior'])."',
		   `opt_exterior` = '".json_encode($_REQUEST['opt_exterior'])."',
		   `opt_additional_fees` = '".json_encode($_REQUEST['opt_additional_fees'])."',
		   `opt_mechanical` = '".json_encode($_REQUEST['opt_mechanical'])."',
		   `opt_safety` = '".json_encode($_REQUEST['opt_safety'])."',
		   `last_bidding_time` = '".$bidding_time."',
		   `have_trade` = '".$_REQUEST['have_trade']."',
		   `need_financing` = '".$_REQUEST['need_financing']."',
		   `zip` = '".$_REQUEST['zip']."',
		   `city` = '".$zip_info['city']."',
		   `state` = '".$zip_info['state']."',
		   `search_range` = '".$_REQUEST['range']."',
		   `created` = '".time()."'";
		
		mysql_query($sql);
	}
	
	
	
	
	
	
	
	
	if(!empty($_REQUEST['range'])) {
		$sql = "select id, ((ACOS(SIN(".$zip_info['latitude']." * PI() / 180) * SIN(latitude * PI() / 180) + COS(".$zip_info['latitude']." * PI() / 180) * COS(latitude * PI() / 180) * COS((".$zip_info['longitude']." - longitude) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance FROM dealers group by status,dealers_make HAVING distance<=".$_REQUEST['range']." and status='1' and LOWER(`dealers_make`) like '%".$car_info['make'].",%' ORDER BY distance";
		
		//$dealer_info = mysql_fetch_assoc ($sql);	
		$result = mysql_query($sql);
		$dealerLists = array();
		while($row = mysql_fetch_assoc($result)) {
			$dealerLists[] = $row;
		}
	}*/
	
	//print_r($_REQUEST);
	//exit;
	//$_SESSION[''] = 
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
<link href="css/mobile.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
<link href="css/animate.min.css" rel="stylesheet">
<link href="css/ts.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>

<!-- Twitter Feed Scripts 
     Uncomment to activate

<script type="text/javascript" src="js/twitter/jquery.tweet.js"></script>
<script type="text/javascript" src="js/twitter/twitter_feed.js"></script> -->

</head>

<body>
<?php include('header.php'); ?>

<!--secondary-banner ends-->
<div class="message-shadow"></div>
<section class="content">
    <div class="container">
        <div class="inner-page portfolio-container row" style="margin-top:180px;">
            <div class="col-md-12">
                <div class="box clearfix"> 
                    <h3>Please Give your trade car details</h3>
                </div>
            </div>
        </div>
        
        <div class="inner-page portfolio-container row">
            <div class="col-md-12">
            	<div class="row1">
                    <div class="col-md-8" style="display:table;margin:auto;float:none">
                        <form method="post">
                            <div class="col-md-6">
                                <input type="text" name="vinno" id="vinno" style="width:100%;height:33px;" placeholder="Enter VIN Number..." required>
                            </div>
                            <div class="col-md-6">
                                <input type="button" value="Add Trade Car" onClick="getTradeVehicleInfo()">
                            </div>
                        </form>
                     </div>
                  </div>
              
              	<div class="row1" id="vin_info">
                </div>
            </div>
            <br/><br/>
            <div class="col-md-12">
            	<div class="row1">
                    <div class="col-md-8" style="display:table;margin:auto;float:none">
                        <form action="<?php echo site_url ?>finalize_bid.php" method="post">
                            
                            <input type="hidden" name="have_trade" value="<?php echo $_REQUEST['have_trade'] ?>">
                            <input type="hidden" name="need_financing" value="<?php echo $_REQUEST['need_financing'] ?>">
                            <input type="hidden" name="zip" value="<?php echo $_REQUEST['zip'] ?>">
                            <input type="hidden" name="range" value="<?php echo $_REQUEST['range'] ?>">
                            <input type="hidden" name="bid" value="<?php echo $_REQUEST['bid'] ?>">
                            <input type="hidden" name="cid" value="<?php echo $_REQUEST['cid'] ?>">
                            <input type="hidden" name="i" value="<?php echo $_REQUEST['i'] ?>">
                            <input type="hidden" name="e" value="<?php echo $_REQUEST['e'] ?>">
                            
                            <input type="hidden" name="opt_package" value='<?php echo json_encode($_REQUEST['opt_package']) ?>'>
                            <input type="hidden" name="opt_interior" value='<?php echo json_encode($_REQUEST['opt_interior']) ?>'>
                            <input type="hidden" name="opt_exterior" value='<?php echo json_encode($_REQUEST['opt_exterior']) ?>'>
                            <input type="hidden" name="opt_accessories" value='<?php echo json_encode($_REQUEST['opt_accessories']) ?>'>
                            <!--<input type="hidden" name="opt_additional_fees" value='<?php echo json_encode($_REQUEST['opt_additional_fees']) ?>'>
                            <input type="hidden" name="opt_mechanical" value='<?php echo json_encode($_REQUEST['opt_mechanical']) ?>'>
                            <input type="hidden" name="opt_safety" value='<?php echo json_encode($_REQUEST['opt_safety']) ?>'>-->
                             
                            <input type="hidden" name="trade_car_vin" id="trade_car_vin" value="" >
                            <input type="hidden" name="trade_details" id="trade_details" value="" >
                            
                            <div class="col-md-6">
                                <input type="submit" value="Submit For Dealer" id="submit_for_dealers" style="display:none" >
                            </div>
                        </form>
                     </div>
                  </div>
              
              	
            </div>
            
            
            
            
            
        </div>
    </div>
    <!--container ends--> 
</section>
<!--content ends--> 

<!--Footer Start-->
<?php include('footer.php'); ?>

<!-- Bootstrap core JavaScript --> 

<script src="js/jquery.mixitup.min.js" type="text/javascript"></script> 
<script src="js/retina.js"></script> 
<script src="js/main.js"></script> 
<script type="text/javascript" src="js/jquery.fancybox.js"></script> 
<script src="js/modernizr.custom.js"></script> <script defer src="js/jquery.flexslider.js"></script> 
<script src="js/jquery.bxslider.js" type="text/javascript"></script> 
<script src="js/jquery.selectbox-0.2.js" type="text/javascript"></script> 
<script type="text/javascript" src="js/jquery.mousewheel.js"></script> 
<script type="text/javascript" src="js/jquery.easing.js"></script>

<script>
	function getTradeVehicleInfo(){
		
		jQuery("#trade_car_vin").val(jQuery("#vinno").val());
		
		jQuery.ajax({
			  type: 'POST',
			  url: '<?php echo site_url ?>ajax/getTradeVehicleInfo.php',
			  data: {
				  vinno: jQuery("#vinno").val()
			  },
		  success: function(data){
			 var res = data.split("####");	
			 if(res[0].length >0) {
				jQuery('#trade_details').val(res[0]);	  
			 }
			 if(res[1].length >0) {
				jQuery('#vin_info').html(res[1]);	  
			 }
			jQuery("#submit_for_dealers").css('display','block');
			}
		});		
	}
</script>
</body>
</html>
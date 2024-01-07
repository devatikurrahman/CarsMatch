<?php 
	require_once("includes/config.inc.php"); 
	
	$bidding_time = '';
	/*print_r($_REQUEST);
	exit;*/
	
	if($_REQUEST['bid'] == 'BID ME NOW') {
		$bidding_time = strtotime('+10 days', time());	
	}
	
	
	$sql = mysql_query("select * from tmp_con_selections where id='".$_REQUEST['cid']."' limit 1");
	$car_info = mysql_fetch_assoc ($sql);
	
	mysql_query("INSERT INTO `saved_vehicles` (`id`, `buyer_id`, `user_session_id`, `cid`, `name`, `make`, `model`, `year`, `engine`, `trim`, `transmission`,`drive`,`door`,`internal_fabric`,`body_style`, `interior_color`, `exterior_color`, `opt_package`, `opt_interior`, `opt_exterior`, `opt_additional_fees`, `opt_mechanical`, `opt_safety`, `created`) VALUES (NULL, '".$_SESSION['ses_user_info']['id']."', '".session_id()."', '".$_REQUEST['cid']."', '".$car_info['name']."', '".$car_info['make']."', '".$car_info['model']."', '".$car_info['year']."', '".$car_info['engine']."', '".$car_info['trim']."', '".$car_info['transmission']."', '".$car_info['drivenWheels']."', '".$car_info['numOfDoors']."', '".$car_info['interior_fabric']."', '".$car_info['body_type']."', '".$_REQUEST['i']."', '".$_REQUEST['e']."', '".json_encode($_REQUEST['opt_package'])."', '".json_encode($_REQUEST['opt_interior'])."', '".json_encode($_REQUEST['opt_exterior'])."', '".json_encode($_REQUEST['opt_additional_fees'])."', '".json_encode($_REQUEST['opt_mechanical'])."', '".json_encode($_REQUEST['opt_safety'])."', '".time()."')");
	
	//print_r($_REQUEST);
	//exit;
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
        <div class="inner-page portfolio-container row" style="margin-top:180px;" id="firspart">
            <div class="col-md-12">
                <div class="box clearfix"> 
                    <h3>Your Vehicle Saved Successfully!!</h3>
                </div>
            </div>
        </div>
        
        <!--<div class="inner-page portfolio-container row" style="margin-top:180px;display:none" id="secondpart">
            <div class="col-md-12">
            </div>
        </div>-->
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
</body>
</html>
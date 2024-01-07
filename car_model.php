<?php 
	require_once("includes/config.inc.php"); 
	
	$_SESSION['pending_bid_id'] = 0;
	$_SESSION['is_pending_save_id'] = 0;
	
	/*$modelsStr = file_get_contents("https://api.edmunds.com/api/vehicle/v2/".rawurlencode($_REQUEST['makenicename'])."/models?fmt=json&api_key=rs5hb8wwnhm3us3mhq9auj2p&state=new&view=basic&year=".$_REQUEST['modelyear']);
	//exit;
	
	$modelsArr = json_decode($modelsStr);*/
	//print_r($modelsArr);
	//exit;
	
	$sql = "SELECT * FROM `models` where make='".$_REQUEST['makenicename']."' order by model asc";
	//exit;
	$result = mysql_query($sql);
	$cartLists = array();
	while($row = mysql_fetch_assoc($result)) {
		$cartLists[] = $row['model'];
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
<link href="css/mobile.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
<link href="css/animate.min.css" rel="stylesheet">
<link href="css/ts.css" type="text/css" rel="stylesheet">
<style>
	/* Landscape phone to portrait tablet */
	@media (max-width: 767px) {
		.col-sm-3{width:50% !important;float:left;}
	}
	
	/* Landscape phones and down */
	@media (max-width: 480px) {
		.col-sm-3{width:50% !important;float:left;}
	}
	
	body {
    counter-reset: section;
}

	
	.progress-bar123 ol {
		list-style-type: none;
		padding-left:0px;
	}
	.progress-bar123 ol > li.completed::before {
		background-size: 16px 16px;
	}
	.progress-bar123 ol > li a {
		color: #a6a6a6;
	}
	.progress-bar123 ol > li a, a:active, a:visited {
		text-decoration: none;
	}
	.progress-bar123 ol > li.current::before {
		color: #2ecc71;
	}
	.progress-bar123 ol > li.current::before {
		border: 2px solid #2ecc71;
		content: "";
		height: 30px;
		width: 30px;
	}
	
	.progress-bar123 ol > li {
		display: block;
		float: left;
		list-style: outside none none;
		position: relative;
		text-align: center;
		text-transform: uppercase;
		width: 25%;
		padding-left: 0;
	}
	
	.progress-bar123-label{
		color:#000;	
	}
	.progress-bar123 ol > li:before {
		background-color: white;
		border: 2px solid #00a4ff;
		border-radius: 50%;
		box-sizing: border-box;
		color: #00a4ff;
		counter-increment: section;
		content: counter(section, decimal);
		display: block;
		height: 30px;
		line-height: 28px;
		margin: 0 auto 6px;
		position: relative;
		text-align: center;
		width: 30px;
		z-index: 50;
	}
	
	
	.progress-bar123 ol > li::after {
		background-color: #dddddd;
		content: " ";
		display: block;
		height: 2px;
		left: 50%;
		position: absolute;
		top: 15px;
		width: 100%;
		z-index: 0;
	}
	.progress-bar123 ol > li.last::after {
		background-color: #dddddd;
		content: " ";
		display: block;
		height: 2px;
		left: -50%;
		position: absolute;
		top: 15px;
		width: 100%;
		z-index: 0;
	}
	
	
	.progress-bar123 ol > li.completed::before {
		background-color: #2ecc71;
		border: medium none;
		content: "" !important;
		font-family: inherit !important;
	}
	.progress-bar123 ol > li.completed::before {
		background-size: 16px 16px;
	}
	.icon, .progress-bar123 ol > li.completed::before, .carwow-blockquote::before, blockquote::before, .carwow-blockquote-question::before, input[type="checkbox"] + label::before, .input-with-icon-user, .input-with-icon-user:focus, .input-with-icon-user.error, .input-with-icon-padlock, .input-with-icon-padlock:focus, .input-with-icon-padlock.error, .rsArrowIcn, .list-with-icons > li::before, .list-pros > li::before, .list-cons > li::before, .list-perks > li::before, .remodal-close {
		background-position: center center;
		background-repeat: no-repeat;
		background-size: 24px 24px;
	}
	.icon-check-white, .progress-bar123 ol > li.completed::before {
		background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%3E%3Cpath%20d%3D%22M11.668%2021.287l12.107-17.46c.81-1.126-.758-2.425-1.692-1.4L9.546%2016.187l1.382-.193-9.245-5.613c-1.106-.69-2.27.8-1.35%201.73l9.482%209.62c.476.48%201.595.347%201.853-.433z%22%20fill%3D%22%23ffffff%22%3E%3C%2Fpath%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E");
		background-repeat: no-repeat;
	}
	
	.progress-bar123 ol > li.completed::after {
		background-color: #2ecc71;
	}
	
</style>

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
        <div class="inner-page portfolio-container row" style="margin-top:140px;" id="firspart">
            <div class="col-md-12" style="padding:0px;">
                <div class="box clearfix"> 
                    <div class="col-md-12 progress-bar123" style="padding-bottom:50px;padding-left:0px;padding-right:0px;">
                        <ol>
                            <li class="current">
                            	<div class="progress-bar123-label">MAKE/MODEL</div>
                            </li>
                            <li class="">
                            	<div class="progress-bar123-label">EXTERIOR / INTERIOR</div>
                            </li>
                            <!--<li class="">
                            	<div class="progress-bar123-label">INTERIOR</div>
                            </li>-->
                            <li class="">
                            	<div class="progress-bar123-label">OPTIONS</div>
                            </li>
                            <li class="last">
                            	<div class="progress-bar123-label">MY MATCH</div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12" style="padding:0px;">
                <h4><span style="padding: 5px; border: 1px solid rgb(0, 0, 0); border-radius: 60px; display: inline-block; width: 40px; height: 40px; text-align: center; margin-right: 10px;">1</span>CHOOSE YOUR MODEL</h4><br/>
                <?php
					if(!empty($cartLists)): $i=1; ?>
						<?php foreach($cartLists as $modelsAr): ?>
							<?php if($i%4 == 1): ?>
								<div class="box clearfix">
							<?php endif; ?>
								
								<div class="col-sm-3">
								   <a href="<?php echo site_url ?>build_own.php?makenicename=<?php echo $_REQUEST['makenicename'] ?>&modelnicename=<?php echo $modelsAr ?>&modelyear=<?php echo $_REQUEST['modelyear'] ?>"><?php echo $modelsAr; ?></a>
                                   
                                   <!--<a href="<?php echo site_url ?>getEdmundData.php?makenicename=<?php echo $_REQUEST['makenicename'] ?>&modelnicename=<?php echo $modelsAr ?>&modelyear=<?php echo $_REQUEST['modelyear'] ?>"><?php echo $modelsAr; ?></a>-->
								</div>
								
							<?php if(($i%4 == 0) || ($i == count($cartLists))): ?>
								</div>
							<?php endif; ?>
						<?php $i++; endforeach; ?>
					<?php endif; 
					
				?>                   
            </div>
            <div class="clearfix"></div>
        </div>
        
        <div class="inner-page portfolio-container row" style="margin-top:180px;display:none" id="secondpart">
            <div class="col-md-12">
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
</body>
</html>
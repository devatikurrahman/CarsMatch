<?php 
	require_once("includes/config.inc.php"); 
	
	$_SESSION['pending_bid_id'] = 0;
	$_SESSION['is_pending_save_id'] = 0;
	
	$sql = "SELECT distinct vehicle_sub_type FROM `vehicle_type_make_model_data` where vehicle_type='".$_REQUEST['vehicle_type']."' order by vehicle_sub_type asc";
	$result = mysql_query($sql);
	$cartLists = array();
	while($row = mysql_fetch_assoc($result)) {
		$cartLists[] = $row['vehicle_sub_type'];
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
<!--<link href="css/jquery.selectbox.css" rel="stylesheet">-->
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
<style>
	.sbSelector{
		width:90%;
		font-size:16px;	
	}
	a.sbSelector:link, a.sbSelector:visited, a.sbSelector:hover{
		font-size:16px;	
	}
</style>
</head>

<body>
<?php include('header.php'); ?>
<!--secondary-banner ends-->
<div class="message-shadow"></div>
<section class="content">
    <div class="container">
        <div class="inner-page portfolio-container row" style="margin-top:140px;" id="firspart">
            
            <div class="col-md-12" style="min-height:100px;">
                <h4 style="margin-left:15px;">CHOOSE YEAR, MAKE, MODEL:</h4><br/>
                <form action="<?php echo site_url ?>build_own.php" method="get">
                <div class="col-sm-3" style="text-align:center;padding-top:10px;padding-bottom:10px;">
                   <select name="year" id="year" onChange="getMakeByYear()" style="width: 100%;border: 1px solid rgba(0, 0, 0, 0.30);height: 45px;color: #333;background: none;font-family: 'Open Sans', sans-serif;font-size: 18px;line-height: 48px;border-radius:0px;">
                   		<option value="">SELECT YEAR</option>
                        <?php //for($i=date('Y')+1;$i>date('Y')-3;$i--): ?>
                        	<option value="2021"><?php echo '2021' ?></option>
                        <?php //endfor; ?>
                   </select>
                                
                </div>
                
                <div class="col-sm-3" style="text-align:center;padding-top:10px;padding-bottom:10px;">
                   <select name="make" id="make" onChange="getModelByYearMake()" style="width: 100%;border: 1px solid rgba(0, 0, 0, 0.30);height: 45px;color: #333;background: none;font-family: 'Open Sans', sans-serif;font-size: 18px;line-height: 48px;border-radius:0px;">
                   		<option value="">SELECT MAKE</option>
                   </select>
                </div>
                
                
                <div class="col-sm-3" style="text-align:center;padding-top:10px;padding-bottom:10px;">
                   <select name="model" id="model" style="width: 100%;border: 1px solid rgba(0, 0, 0, 0.30);height: 45px;color: #333;background: none;font-family: 'Open Sans', sans-serif;font-size: 18px;line-height: 48px;border-radius:0px;">
                   		<option value="">SELECT MODEL</option>
                   </select>
                </div>
                
                <div class="col-sm-3" style="text-align:center;padding-top:10px;padding-bottom:10px;">
                   <input type="submit" value="GO" style="height: 50px; background-color: rgb(0, 114, 231); color: rgb(255, 255, 255); font-size: 16px; width:100%">
                </div>
                                 
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
<!--<script src="js/jquery.selectbox-0.2.js" type="text/javascript"></script> -->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script> 
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script>
	jQuery(function () {
		/*jQuery("#year").selectbox();
		jQuery("#make").selectbox();
		jQuery("#model").selectbox();*/
	});
	function getMakeByYear(){
		var aa = jQuery("select#year").val();
		jQuery.ajax({
			  type: 'POST',
			  url: '<?php echo site_url ?>ajax/get_make_by_year_vehicle_type_sub.php',
			  data: {
				  vehicle_type: '<?php echo $_REQUEST['vehicle_type'] ?>',
				  vehicle_sub_type: '<?php echo $_REQUEST['vehicle_sub_type'] ?>',
				  year: aa
			  },
		  success: function(data){
			  //jQuery("#make").selectbox('detach');
			  jQuery("#make").html(data);
			  //jQuery("#make").selectbox('attach');
			}
		});		
		
	}
	
	function getModelByYearMake() {
		jQuery.ajax({
			  type: 'POST',
			  url: '<?php echo site_url ?>ajax/get_model_by_year_make_vehicle_type_sub.php',
			  data: {
				  vehicle_type: '<?php echo $_REQUEST['vehicle_type'] ?>',
				  vehicle_sub_type: '<?php echo $_REQUEST['vehicle_sub_type'] ?>',
				  year: jQuery("select#year").val(),
				  make: jQuery("select#make").val()
			  },
		  success: function(data){
              alert(data);
			  //jQuery("#model").selectbox('detach');
			  jQuery("#model").html(data);
			 // jQuery("#model").selectbox('attach');
			}
		});		
	}
</script>
</body>
</html>
<?php 
	require_once("includes/config.inc.php"); 
	
	$_SESSION['pending_bid_id'] = 0;
	$_SESSION['is_pending_save_id'] = 0;
	
	$sql = "SELECT distinct vehicle_type FROM `vehicle_type_make_model_data` order by vehicle_type asc";
	$result = mysql_query($sql);
	$vehicletLists = array();
	while($row = mysql_fetch_assoc($result)) {
		$vehicletLists[] = $row;
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
<link href="css/ts.css" type="text/css" rel="stylesheet">
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
<script>
	jQuery(function () {
		$('#vehicle_type').selectbox({
			  onChange: function (val, inst) {
				 //alert(val);
				 jQuery("#vehicle_type_val").val(val);
			  }        
		});
	});
</script>
</head>

<body>
<?php include('header.php'); ?>
<div class="clearfix"></div>
<section id="secondary-banner" class="dynamic-image-1">
    <div class="container">
    	<div class="col-md-6" style="float: none; margin: auto;">
            <div class="box clearfix"> 
                <h2>Search by vehicle type:</h4>
                
                    <!--<form action="vehicle_sub_type.php" method="post">-->
                        <div class="col-sm-6" style="margin-top:20px;padding-left:0px;padding-right:0px;">
                            <select name="vehicle_type" id="vehicle_type">
                                <option value="">SELECT VEHICLE TYPE</option>
                                <?php if(!empty($vehicletLists)): ?>
                                	<?php foreach($vehicletLists as $vehicletList): ?>
                                    	<option value="<?php echo $vehicletList['vehicle_type'] ?>"><?php echo $vehicletList['vehicle_type'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <input type="hidden" id="vehicle_type_val" value="">
                        <div class="col-sm-6" style="margin-top:20px;padding-left:0px;padding-right:0px;">
                            <input type="submit" value="GO" onClick="getVehicleSubType()" style="height: 50px; background-color: rgb(0, 114, 231); color: rgb(255, 255, 255); font-size: 20px; width:100%">
                        </div>
                    <!--</form>-->
                
                <br/><br/>
            </div>
        </div>
    </div>
</section>
<!--secondary-banner ends-->
<!--<div class="message-shadow"></div>
<section class="content">
    <div class="container">
        <div class="inner-page portfolio-container row" style="margin-top:180px;" id="firspart">
            <div class="col-md-12">
                <div class="box clearfix"> 
                    <h4 style="margin-left:15px;">Select a model year:</h4>
                    <div class="col-md-12">
                        <input type="radio" id="year2015" checked="" value="" name="modelyear">
                        <label for="year2015" style="right:0;left:0">2015</label><br>
                    </div>
                    <div class="col-md-12">
                        <input type="radio" id="year2016"  value="" name="modelyear">
                        <label for="year2016" style="right:0;left:0">2016</label><br>
                    </div>
                    <br/><br/>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        
        <div class="inner-page portfolio-container row" style="margin-top:180px;display:none" id="secondpart">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</section>-->
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
function getVehicleSubType(){
	var vehicle_val = jQuery("#vehicle_type_val").val();
	jQuery.ajax({
          type: 'POST',
          url: '<?php echo site_url ?>ajax/get_vehicle_subtype_by_type.php',
          data: {
              vehicle_type: vehicle_val
          },
      success: function(data){
      	if($.trim(data)) {
			 window.location.href= "<?php echo site_url ?>year_make_model.php?vehicle_type="+vehicle_val+"&vehicle_sub_type="+data;	
		}
		else {
			 window.location.href= "<?php echo site_url ?>vehicle_sub_type.php?vehicle_type="+vehicle_val;
		}
	  }
    });		
    
}
</script>

</body>
</html>
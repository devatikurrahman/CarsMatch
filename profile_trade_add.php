<?php 
	require_once("includes/config.inc.php"); 
	if(!empty($_REQUEST['vinno'])) {
		$modelsStr = file_get_contents("https://api.edmunds.com/api/vehicle/v2/vins/".$_REQUEST['vinno']."?manufactureCode=".substr($_REQUEST['vinno'], 0, 3)."&fmt=json&api_key=rs5hb8wwnhm3us3mhq9auj2p");	
		/*$modelsStr = '{"make":{"id":200005143,"name":"Ford","niceName":"ford"},"model":{"id":"Ford_F_150","name":"F-150","niceName":"f-150"},"engine":{"name":"Engine","equipmentType":"ENGINE","availability":"STANDARD","compressionRatio":9.3,"cylinder":8,"size":4.6,"displacement":4606.0,"configuration":"V","fuelType":"regular unleaded","horsepower":231,"torque":293,"totalValves":16,"manufacturerEngineCode":"99W","type":"gas","code":"8VNAG4.6","compressorType":"NA","rpm":{"horsepower":4750,"torque":3500},"valve":{"gear":"single overhead camshaft"}},"transmission":{"name":"4A","equipmentType":"TRANSMISSION","availability":"STANDARD","transmissionType":"AUTOMATIC","numberOfSpeeds":"4"},"drivenWheels":"rear wheel drive","numOfDoors":"4","options":[{"category":"Other","options":[{"id":"200235259","name":"Rear Window Defroster","equipmentType":"OPTION","availability":"All except Lariat"},{"id":"200235274","name":"California Emissions System Not Required","description":"Control code for units either shipped to California Emissions States dealers or ordered by California Emissions States dealers for registration in non-California States locations.","equipmentType":"OPTION","availability":"All Models"},{"id":"200235295","name":"5.4L EFI V8 Engine","description":"Includes 5.4L V8 engine with 300hp @ 5000 rpm and 365 ft-lbs of torque @ 3750 rpm.","equipmentType":"OPTION","availability":"XL/STX/XLT"},{"id":"200235297","name":"3.55 Limited Slip Axle Ratio","equipmentType":"OPTION","availability":"All except Supercab LB/FX4"},{"id":"200235317","name":"3.73 Axle Ratio","equipmentType":"OPTION","availability":"All except SuperCab LB/FX4/4WD SuperCrew XLT"},{"id":"200235267","name":"AM/FM Stereo W/ CD And Cassette Player","equipmentType":"OPTION","availability":"All except Lariat"},{"id":"200235252","name":"Trailer Tow Package","description":"Includes Class IV trailer hitch receiver, 7-pin wiring harness, heavy duty 72 amp battery, upgraded radiator and auxiliary transmission oil cooler.","equipmentType":"OPTION","availability":"All"},{"id":"200235254","name":"Fog Lamps","equipmentType":"OPTION","availability":"XL/STX/2WD XLT"},{"id":"200235276","name":"California Emissions System","description":"Required on units with GVWR of 14,000# or less for California, Maine, Massachusetts, New York and Vermont registration. Optional for Arizona, Connecticut, Nevada, New Hampshire, New Jersey, Oregon, Pennsylvania and Rhode Island (Cross-Border states).","equipmentType":"OPTION","availability":"All Models"},{"id":"200235294","name":"Daytime Running Lamps","equipmentType":"OPTION","availability":"All"},{"id":"200235260","name":"Manual Sliding Rear Window","equipmentType":"OPTION","availability":"All"},{"id":"200235292","name":"Engine Block Heater","equipmentType":"OPTION","availability":"All"},{"id":"200235309","name":"Power Adjustable Pedals","equipmentType":"OPTION","availability":"All except Lariat"},{"id":"200235298","name":"3.73 Limited Slip Axle Ratio","equipmentType":"OPTION","availability":"All except SuperCab LB"}]}],"colors":[{"category":"Exterior","options":[{"id":"200235203","name":"Black Clearcoat","equipmentType":"COLOR","availability":"USED"},{"id":"200235201","name":"Bright Red Clearcoat","equipmentType":"COLOR","availability":"USED"},{"id":"200235200","name":"Dark Shadow Grey Clearcoat Metallic","equipmentType":"COLOR","availability":"USED"},{"id":"200235204","name":"Silver Clearcoat Metallic","equipmentType":"COLOR","availability":"USED"},{"id":"200235205","name":"Oxford White Clearcoat","equipmentType":"COLOR","availability":"USED"}]}],"categories":{"market":"N/A","EPAClass":"Standard Pickup Trucks","vehicleSize":"Large","primaryBodyType":"Truck","vehicleStyle":"Extended Cab Pickup","vehicleType":"Truck","manufacturerCabType":"SuperCab"},"squishVin":"1FTRX12W4F","years":[{"id":100502974,"year":2004,"styles":[{"id":100314120,"name":"4dr SuperCab STX Rwd Styleside 6.5 ft. SB (4.6L 8cyl 4A)","submodel":{"body":"SuperCab","modelName":"F-150 SuperCab","niceName":"supercab"},"trim":"STX"},{"id":100314119,"name":"4dr SuperCab STX Rwd Styleside 5.5 ft. SB (4.6L 8cyl 4A)","submodel":{"body":"SuperCab","modelName":"F-150 SuperCab","niceName":"supercab"},"trim":"STX"},{"id":100314131,"name":"4dr SuperCab XLT Rwd Styleside 6.5 ft. SB (4.6L 8cyl 4A)","submodel":{"body":"SuperCab","modelName":"F-150 SuperCab","niceName":"supercab"},"trim":"XLT"},{"id":100314130,"name":"4dr SuperCab XLT Rwd Styleside 5.5 ft. SB (4.6L 8cyl 4A)","submodel":{"body":"SuperCab","modelName":"F-150 SuperCab","niceName":"supercab"},"trim":"XLT"},{"id":100314097,"name":"4dr SuperCab XL Rwd Styleside 6.5 ft. SB (4.6L 8cyl 4A)","submodel":{"body":"SuperCab","modelName":"F-150 SuperCab","niceName":"supercab"},"trim":"XL"}]}],"matchingType":"SQUISHVIN","MPG":{"highway":"18","city":"14"}}';*/
		$car_info = json_decode($modelsStr);
		
		
	}
	
	
		/*exit;*/
	
	if(!empty($_POST['add_trade'])) {
		mysql_query("INSERT INTO `trade_vehicles` (`id`, `buyer_id`, `user_session_id`, `name`, `make`, `model`, `year`, `engine`, `trim`, `transmission`, `drive`, `door`, `internal_fabric`, `body_style`, `interior_color`, `exterior_color`, `opt_package`, `opt_interior`, `opt_exterior`, `opt_additional_fees`, `opt_mechanical`, `opt_safety`, `created`) VALUES (NULL, '".$_SESSION['ses_user_info']['id']."', '".session_id()."', '".$_POST['vname']."', '".$_POST['vmake']."', '".$_POST['vmodel']."', '".$_POST['vyears']."', '".$_POST['vengine']."', '".$_POST['vtrim']."', '".$_POST['vtransmission']."', '".$_POST['vdrive']."', '".$_POST['vdoors']."', '', '', '', '', '', '', '', '', '', '', '".time()."')");
		header('Location: '.site_url.'profile_trades.php');
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
<style>
/* Landscape phone to portrait tablet */

@media (max-width: 767px) {
.col-sm-6 {
	width: 50% !important;
	float: left;
}
}
	
	/* Landscape phones and down */
	@media (max-width: 480px) {
.col-sm-6 {
	width: 50% !important;
	float: left;
}
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>

</head>

<body>
<?php include('header.php'); ?>

    
<div class="clearfix"></div>
<section id="secondary-banner" style="background-image:none;background-color:#fff;text-shadow:none;padding-top:80px;">
  <div id="wrapper">
    <div id="layout-static">
      <?php include('profile_left_menu.php'); ?>
      <div class="static-content-wrapper" style="background-color:#fff">
        <div class="static-content">
          <div class="page-content"><br/>
            <br/>
            <div class="container-fluid">
              <div class="row1">
                <div class="col-md-12">
                  <div data-widget="{&quot;draggable&quot;: &quot;false&quot;}" class="panel panel-info" data-widget-static="" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
                    <div class="panel-heading">
                      <h5 style="color:#fff">Trades</h5>
                      <div class="options"> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row1">
              	<div class="col-md-8" style="display:table;margin:auto;float:none">
                    <form action="" method="post">
                        <div class="col-md-6">
                            <input type="text" name="vinno" value="<?php echo $_REQUEST['vinno'] ?>" style="width:100%;height:33px;" placeholder="Enter VIN Number..." required>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" value="submit">
                        </div>
                    </form>
                 </div>
              </div>
              
              <?php if(!empty($car_info)):  //print_r($car_info); ?>
              	<div class="row1" style="padding-top:50px;">
                  	<div class="col-md-8" style="display:table;margin:auto;float:none">
                        <div style="background-color:#fff;min-width:360px;max-width:360px;height:680px;overflow:auto">
                            <form action="" method="post">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="info">
                                            <th colspan="2"><?php echo $car_info->years[0]->styles[0]->name ?></th>
                                            <input type="hidden" name="vname" value="<?php echo $car_info->years[0]->styles[0]->name ?>">
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="35%"><b>Body Type</b></td>
                                            <td width="65%"><?php echo $car_info->categories->primaryBodyType ?></td>   
                                            <input type="hidden" name="vtype" value="<?php echo $car_info->categories->primaryBodyType ?>">    
                                        </tr>
                                        
                                        <tr>
                                            <td><b>Make</b></td>
                                            <td><?php echo $car_info->make->name ?></td>  
                                            <input type="hidden" name="vmake" value="<?php echo $car_info->make->name ?>">
                                        </tr>
                                        
                                        <tr>
                                            <td><b>Model</b></td>
                                            <td><?php echo $car_info->model->name ?></td>
                                            <input type="hidden" name="vmodel" value="<?php echo $car_info->model->name ?>">    
                                        </tr>
                                        
                                        <tr>
                                            <td><b>Year</b></td>
                                            <td><?php echo $car_info->years[0]->year ?></td>  
                                            <input type="hidden" name="vyears" value="<?php echo $car_info->years[0]->year ?>">    
                                        </tr>
                                        
                                        <tr>
                                            <td><b>Engine</b></td>
                                            <td><?php echo $car_info->engine->size.' '.$car_info->engine->configuration.' '.$car_info->engine->cylinder ?></td>  
                                            <input type="hidden" name="vengine" value="<?php echo $car_info->engine->size.' '.$car_info->engine->configuration.' '.$car_info->engine->cylinder ?>">      
                                        </tr>
                                        <?php if(!empty($car_info->transmission)): ?>
                                            <tr>
                                                <td><b>Transmission</b></td>
                                                <td><?php echo $car_info->transmission->numberOfSpeeds.' speed '.$car_info->transmission->transmissionType ?></td> 
                                                <input type="hidden" name="vtransmission" value="<?php echo $car_info->transmission->numberOfSpeeds.' speed '.$car_info->transmission->transmissionType ?>"> 
                                            </tr>
                                        <?php endif; ?>
                                        
                                        <?php if(!empty($car_info->drivenWheels)): ?>
                                            <tr>
                                                <td><b>Drive</b></td>
                                                <td><?php echo $car_info->drivenWheels ?></td> 
                                                <input type="hidden" name="vdrive" value="<?php echo $car_info->drivenWheels ?>">   
                                            </tr>
                                        <?php endif; ?>
                                        
                                        <?php if(!empty($car_info->numOfDoors)): ?>
                                            <tr>
                                                <td><b>Number of Door</b></td>
                                                <td><?php echo $car_info->numOfDoors ?></td> 
                                                <input type="hidden" name="vdoors" value="<?php echo $car_info->numOfDoors ?>">   
                                            </tr>
                                        <?php endif; ?>
                                        
                                        <?php if(!empty($car_info->numOfDoors)): ?>
                                            <tr>
                                                <td><b>Trim</b></td>
                                                <td><?php echo $car_info->years[0]->styles[0]->trim ?></td>  
                                                <input type="hidden" name="vtrim" value="<?php echo $car_info->years[0]->styles[0]->trim ?>">     
                                            </tr>
                                        <?php endif; ?>
                                        
                                        <?php /*?><tr>
                                            <td><b>Interior Color</b></td>
                                            <td><span style="background-color:#<?php echo $bidList['interior_color'] ?>;position: relative; float: left; height: 20px; width: 20px;"></span></td> 
                                               
                                        </tr>
                                        
                                        <tr>
                                            <td><b>Exterior Color</b></td>
                                            <td><span style="background-color:#<?php echo $bidList['exterior_color'] ?>;position: relative; float: left; height: 20px; width: 20px;"></span></td> 
                                            
                                        </tr>
                                        
                                        <?php 
                                            $package_option_arr = json_decode($bidList['opt_package']);
                                            if(!empty($package_option_arr)):
                                        ?>
                                        
                                        <tr>
                                            <td colspan="3" style="background-color:#E2FCFF">Package Options</td>
                                        </tr>
                                        <?php foreach($package_option_arr as $package_option_ar): ?>
                                        <tr>
                                            <td colspan="3"><?php echo $package_option_ar ?></td>    
                                        </tr>
                                        <?php endforeach; endif; ?>
                                        
                                        
                                        <?php 
                                            $interior_option_arr = json_decode($bidList['opt_interior']);
                                            if(!empty($interior_option_arr)):
                                        ?>
                                        
                                        <tr>
                                            <td colspan="3" style="background-color:#E2FCFF">Interrior Options</td>
                                        </tr>
                                        <?php foreach($interior_option_arr as $interior_option_ar): ?>
                                        <tr>
                                            <td colspan="3"><?php echo $interior_option_ar ?></td>                
                                        </tr>
                                        <?php endforeach; endif; ?>
                                        
                                        
                                        <?php 
                                            $exterior_option_arr = json_decode($bidList['opt_exterior']);
                                            if(!empty($exterior_option_arr)):
                                        ?>
                                        
                                        <tr>
                                            <td colspan="3" style="background-color:#E2FCFF">Exterrior Options</td>
                                        </tr>
                                        <?php foreach($exterior_option_arr as $exterior_option_ar): ?>
                                        <tr>
                                            <td colspan="3"><?php echo $exterior_option_ar ?></td> 
                                        </tr>
                                        <?php endforeach; endif; ?>
                                         
                                        
                                        <?php 
                                            $additional_option_arr = json_decode($bidList['opt_additional_fees']);
                                            if(!empty($additional_option_arr)):
                                        ?>
                                        
                                        <tr>
                                            <td colspan="3" style="background-color:#E2FCFF">Additional Options</td>
                                        </tr>
                                        <?php foreach($additional_option_arr as $additional_option_ar): ?>
                                        <tr>
                                            <td colspan="3"><?php echo $additional_option_ar ?></td>       
                                        </tr>
                                        <?php endforeach; endif; ?>
                                        
                                        
                                        
                                        <?php 
                                            $mechanical_option_arr = json_decode($bidList['opt_mechanical']);
                                            if(!empty($mechanical_option_arr)):
                                        ?>
                                        
                                        <tr>
                                            <td colspan="3" style="background-color:#E2FCFF">Mechanical Options</td>
                                        </tr>
                                        <?php foreach($mechanical_option_arr as $mechanical_option_ar): ?>
                                        <tr>
                                            <td colspan="3"><?php echo $mechanical_option_ar ?></td>                
                                        </tr>
                                        <?php endforeach; endif; ?>
                                        
                                        
                                        <?php 
                                            $safety_option_arr = json_decode($bidList['opt_safety']);
                                            if(!empty($safety_option_arr)):
                                        ?>
                                        
                                        <tr>
                                            <td colspan="3" style="background-color:#E2FCFF">Safety Options</td>
                                        </tr>
                                        <?php foreach($safety_option_arr as $safety_option_ar): ?>
                                        <tr>
                                            <td colspan="3"><?php echo $safety_option_ar ?></td>    
                                        </tr>
                                        <?php endforeach; endif; ?><?php */?>
                                        
                                        <tr>
                                            <td colspan="3">&nbsp;&nbsp;</td>
                                        </tr>  
                                        
                                        <input type="hidden" name="add_trade" value="1">
                                        <tr>
                                            <td colspan="3" align="center"><input type="submit" value="Add For Trade"></td>
                                        </tr>    
                                        
                                                    
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                  </div>
              <?php endif; ?>
              
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
	jQuery(document).ready(function() {
		<?php if(!empty($bidLists)): ?>	
			<?php foreach($bidLists as $bidList): ?>
				jQuery("#modal_trigger_<?php echo $bidList['id'] ?>").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
			<?php endforeach; ?>
		<?php endif; ?>
	});
</script>

</body>
</html>
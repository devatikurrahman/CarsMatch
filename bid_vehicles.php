<?php 
	require_once("includes/config.inc.php"); 
	
	$sql = "SELECT * FROM `dream_cars` where buyer_id = '".$_SESSION['ses_user_info']['id']."' order by id desc";
	$result = mysql_query($sql);
	$bidLists = array();
	while($row = mysql_fetch_assoc($result)) {
		$bidLists[] = $row;
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
<?php if(!empty($bidLists)): ?>
	<?php foreach($bidLists as $bidList): ?>
        <div id="modal_<?php echo $bidList['id'] ?>" style="display:none;background-color:#fff;min-width:360px;max-width:360px;height:680px;overflow:auto">
            
        
            <table class="table table-striped">
                <thead>
                    <tr class="info">
                        <th colspan="3"><?php echo $bidList['name'] ?></th>
                    </tr>
                    <tr>
                        <td colspan="3" style="background-color:#DFF7C3">
                            <b>
                                <?php if($bidList['have_trade'] == "yes"): echo 'Have Trade'; ?>
                                <?php else: echo 'Don\'t have trade'; ?><?php endif; ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="background-color:#DFF7C3">
                            <b>
                                <?php if($bidList['need_financing'] == "yes"): echo 'Need Financing'; ?>
                                <?php else: echo 'Don\'t need financing'; ?><?php endif; ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="background-color:#DFF7C3">
                            <b>
                                <?php echo 'Want to search in Zipcode: '.$bidList['zip'].', '.$bidList['range'].' radius'; ?>
                            </b>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="35%"><b>Body Type</b></td>
                        <td width="65%"><?php echo $bidList['body_style'] ?></td>       
                    </tr>
                    
                    <tr>
                        <td><b>Make</b></td>
                        <td><?php echo $bidList['make'] ?></td>  
                    </tr>
                    
                    <tr>
                        <td><b>Model</b></td>
                        <td><?php echo $bidList['model'] ?></td>    
                    </tr>
                    
                    <tr>
                        <td><b>Year</b></td>
                        <td><?php echo $bidList['year'] ?></td>  
                          
                    </tr>
                    
                    <tr>
                        <td><b>Engine</b></td>
                        <td><?php echo $bidList['engine'] ?></td>  
                          
                    </tr>
                    
                    <tr>
                        <td><b>Transmission</b></td>
                        <td><?php echo $bidList['transmission'] ?></td> 
                        
                    </tr>
                    
                    <tr>
                        <td><b>Drive</b></td>
                        <td><?php echo $bidList['drive'] ?></td> 
                        
                    </tr>
                    
                    <tr>
                        <td><b>Number of Door</b></td>
                        <td><?php echo $bidList['door'] ?></td>  
                        
                    </tr>
                    
                    <tr>
                        <td><b>Trim</b></td>
                        <td><?php echo $bidList['trim'] ?></td>  
                          
                    </tr>
                    
                    <tr>
                        <td><b>Interior Fabric</b></td>
                        <td><?php echo $bidList['internal_fabric'] ?></td>  
                        
                    </tr>
                    
                    <tr>
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
                    <?php endforeach; endif; ?>
                    
                    <tr>
                        <td colspan="3">&nbsp;&nbsp;</td>
                    </tr>                
                </tbody>
            </table>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
    
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
                      <h5 style="color:#fff">Bid Vehicles</h5>
                      <div class="options"> </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr class="info">
                            <th>&nbsp;</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Engine</th>
                            <th>Trim</th>
                            <th>Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($bidLists)): ?>
                          	<?php foreach($bidLists as $bidList): ?>
                                  <?php 
								  	$sql = mysql_query("select * from make_images where year='".$bidList['year']."' and make='".$bidList['make']."' and model='".$bidList['model']."' and trim='".$bidList['trim']."' limit 1") ;
									$make_image_info = mysql_fetch_assoc ($sql);
								  ?>
                                  <tr>
                                    <td><img src="<?php echo $make_image_info['image']; ?>" style="width:150px;"></td>
                                    <td><?php echo $bidList['make'] ?></td>
                                    <td><?php echo $bidList['model'] ?></td>
                                    <td><?php echo $bidList['year'] ?></td>
                                    <td><?php echo $bidList['engine'] ?></td>
                                    <td><?php echo $bidList['trim'] ?></td>
                                    <td>
                                    	<a class="btn btn-info" id="modal_trigger_<?php echo $bidList['id'] ?>" href="#modal_<?php echo $bidList['id'] ?>"><i class="fa fa-info"></i></a>
                                    </td>
                                  </tr>
                              <?php endforeach; ?>
                          <?php endif; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
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
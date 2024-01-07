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
<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAFqAPWaxVQnJMkCBEHvlP1fIqevvgoN44&#038;libraries=geometry%2Cplaces%2Cdrawing&#038;ver=4.7.4'></script>

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
        <div class="inner-page portfolio-container row">
            <div class="col-md-12" style="margin-top:50px;">
            	<div class="find_map row clearfix">
                    <h3 style="text-align:center">FIND US ON THE MAP</h2>
                    <div class="map margin-vertical-30">
                        <div id='map' class="contact" data-longitude='-79.38' data-latitude='43.65' data-zoom='7' style='height: 390px;'></div>
                    </div>
                </div>
            	<div class="row1">
                	<div class="inner-page portfolio-container row" style="margin-top:50px;margin-bottom:50px;">
                        <div class="col-md-12">
                            <div class="box clearfix"> 
                                <h3 style="text-align:center">CONTACT US</h3>
                                <h4 class="title-left" style="margin-top:0px;color:#8b8b8b;text-align:center;margin-bottom:0px;">Please fill out the form below. <span style="font-size:27px;">(We will contact you within 24-48 hrs.)</span></h4>
                            </div>
                        </div>
                    </div>
                	<div class="col-md-8 col-xs-12" style="display:table;margin:auto;float:none;">
                        <form action="" method="post">
                            <fieldset id="contact_form">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <p id="messagesent" style="color:#0C3;font-weight:400;font-size:16px;text-align:center;display:none">Message Sent Successfully !!</p>
                                        <p id="messagesentfailed" style="color:#ff0000;font-weight:400;font-size:16px;text-align:center;display:none">Message Sending Failed! Please confirm that you are not a robot.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input  class="form-control margin-bottom-25" placeholder="FULL NAME" id="uname" name="uname" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input  class="form-control margin-bottom-25" placeholder="CELL" id="cell" name="cell" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input  class="form-control margin-bottom-25" placeholder="EMAIL" id="uemail" name="uemail" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input  class="form-control margin-bottom-25" placeholder="AVAILABILITY" id="showing_time" name="showing_time">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <textarea class="form-control margin-bottom-25" rows="5" placeholder="COMMENT..." id="message" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="6LcCNRYTAAAAAAzKxnA9mSiDrWusottgzmBWwalM"></div>
                                        </div>
                                    </div>
                                </div>
                            <!--<button class="btn btn-secondary btn-block">Request info</button>-->
                            <div class="col-md-12 col-xs-12" style="text-align:center">
                            	<div class="form-group">
                            		<input type="submit" class="btn btn-secondary btn-block" value="SUBMIT" onClick="return formvalidation()" style="background-color:#ff7800;max-width: 380px;margin: auto;">
                            	</div>
                            </div>
                            </fieldset>
                        </form>
                     </div>
                  </div>
              
              	<div class="row1" id="vin_info">
                </div>
            </div>
            <br/><br/>
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
		function IsEmail(email) {
		  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		  return regex.test(email);
		}
		
		function formvalidation() {
			var flag = 0;
			if(jQuery("#uname").val() =='') {
				jQuery("#uname").css('border','1px solid #ff0000');
				jQuery("#uname").css('background-color','#ffd6d8');
				flag = 1;
			}
			else {
				jQuery("#uname").css('border','1px solid #e4e4e4');
				jQuery("#uname").css('background-color','#fff');
			}
			
			if(jQuery("#uemail").val() =='') {
				jQuery("#uemail").css('border','1px solid #ff0000');
				jQuery("#uemail").css('background-color','#ffd6d8');
				flag = 1;
			}
			else if(!IsEmail(jQuery("#uemail").val())) {
				jQuery("#uemail").css('border','1px solid #ff0000');
				jQuery("#uemail").css('background-color','#ffd6d8');
				flag = 1;
			}
			else {
				jQuery("#uemail").css('border','1px solid #e4e4e4');
				jQuery("#uemail").css('background-color','#fff');
			}
			
			if(jQuery("#cell").val() =='') {
				jQuery("#cell").css('border','1px solid #ff0000');
				jQuery("#cell").css('background-color','#ffd6d8');
				flag = 1;
			}
			else {
				jQuery("#cell").css('border','1px solid #e1e1e1');
				jQuery("#cell").css('background-color','#fff');
			}
			
			if(flag == 1) {
				return false;	
			}
			else {
				return true;	
			}
		}
		
		
		
		var map = null;
        var panorama = null;
        var fenway = new google.maps.LatLng(32.9875926, -96.8038873);
        var mapOptions = {
            center: fenway,
            zoom: 13
        };
        var panoramaOptions = {
            position: fenway,
            pov: {
                heading: 34,
                pitch: 10
            }
        };
        var tabsHeight = function() {
            //jQuery(".detail-media .tab-content").css('min-height',jQuery("#gallery").innerHeight());
            //jQuery("#map,#street-map").css('min-height',jQuery(".detail-media #gallery").innerHeight());
        };
        jQuery(window).on('load',function(){
            tabsHeight();
        });
        jQuery(window).on('resize',function(){
            tabsHeight();
        });
        function initialize() {

            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            //panorama = new google.maps.StreetViewPanorama(document.getElementById('street-map'), panoramaOptions);
           // map.setStreetView(panorama);
		   
		   var image = '<?php echo site_url ?>images/tiny_logo.png';
			var beachMarker = new google.maps.Marker({
			  position: {lat: 32.9875926, lng: -96.8038873},
			  map: map,
			  icon: image
			});
        }
        google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</body>
</html>
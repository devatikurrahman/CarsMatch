<div class="clearfix"></div>
<section class="copyright-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="logo-footer margin-bottom-40 md-margin-bottom-40 sm-margin-bottom-10 xs-margin-bottom-20"><a href="#">
                    <!--<h1>Automotive</h1>
                    <span>template</span>-->
                    	<img src="images/CarsMatch_Logo_white.png" />
                    </a></div>
                <p>Copyright &copy; <?php echo date('Y') ?> Cars Match.  All rights reserved.</p>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <ul class="social margin-bottom-25 md-margin-bottom-25 sm-margin-bottom-20 xs-margin-bottom-20 xs-padding-top-10 clearfix">
                    <li><a class="sc-1" href="#"></a></li>
                    <li><a class="sc-2" href="#"></a></li>
                    <li><a class="sc-3" href="#"></a></li>
                    <li><a class="sc-4" href="#"></a></li>
                    <li><a class="sc-5" href="#"></a></li>
                    <li><a class="sc-6" href="#"></a></li>
                    <li><a class="sc-7" href="#"></a></li>
                    <li><a class="sc-8" href="#"></a></li>
                    <li><a class="sc-9" href="#"></a></li>
                    <li><a class="sc-10" href="#"></a></li>
                </ul>
                <ul class="f-nav">
                    <li><a href="index.html">How it Works</a></li>
                    <li><a href="#">Research</a></li>
                    <li><a href="<?php echo site_url ?>">Bid Me Now</a></li>
                    <li><a href="services.html">Trade</a></li>
                    <li><a href="our-team.html">Finance</a></li>
                    <li><a href="blog.html">Delivery</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="contact.html">Sign Up / Sign In</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="back_to_top"> <img src="http://demo.themesuite.com/automotive/images/arrow-up.png" alt="scroll up" /> </div>
<?php if(empty($_SESSION['ses_user_info'])): ?>
<div id="modal" class="popupContainer" style="display:none;border:2px solid #097bef">
    <header class="popupHeader">
        <span class="header_title" id="head_title">SIGN IN</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>
    <section class="popupBody">
        <div class="user_login" id="loginview">
            <p id="login_failed" style="display:none;color:#ff0000">Sign IN Failed! Incorrect Email or Password.</p>
            <p id="login_message" style="color: #63C900; text-align: center; font-weight: bold; font-size: 15px;margin-bottom:10px;margin-top:10px; text-transform:uppercase"></p>
            <form id="myform" action="" method="post">
                <b>Email</b>
                <input type="text" id="semail" name="semail" />
                <br />

                <b>Password</b>
                <input type="password" id="spass" name="spass" />
                <br />
                         
                <div style="height: 40px; padding: 0px;" class="item col-sm-12">
                    <div style="padding-left: 0px; width: 50%; float: left;" class="item col-sm-6">
                        <!--<a class="btnx btn_red modal_close" onclick="showSignupForm()" style="cursor:pointer">Signup</a>-->
                        <a class="btnx btn_red" onclick="showSignupForm()" style="cursor:pointer;padding-left:10px;padding-right:10px;">CREATE ACCOUNT</a>
                    </div>
                    <div style="padding-right: 0px; text-align: right; width: 50%; float: right;" class="item col-sm-6">
                        <a onclick="submitLoginForm()" class="btnx btn_red" style="cursor:pointer">SIGN IN</a>
                    </div>
                </div>
                <div style="padding-left: 0px; padding-right: 0px; float: left;" class="item col-sm-12">
                    <a style="cursor: pointer; margin-bottom: 10px; margin-left: 0px;" class="forgot_password" onclick="showForgetView()">Forgot password?</a>
                </div>
                <input type="hidden" name="task" id="task" value="">
            </form>
        </div>
        
        
        <div class="user_login" id="signupview" style="display:none">
            <p id="signup_failed" style="display:none;color:#ff0000">Your email address already exists. Please try with different email.</p>
            <form id="myform" action="" method="post">
                <b>Name</b>
                <input type="text" id="rname" name="rname" />
                <br />
                
                <b>Email</b>
                <input type="text" id="remail" name="remail" />
                <br />

                <b>Password</b>
                <input type="password" id="rpass" name="rpass" />
                <br />
                         
                <div style="height: 40px; padding: 0px;" class="item col-sm-12">
                    <div style="padding-left: 0px; width: 50%; float: left;" class="item col-sm-6">
                        <a class="btnx btn_red" onclick="showLoginView()" style="cursor:pointer">SIGN IN</a>
                    </div>
                    <div style="padding-right: 0px; text-align: right; width: 50%; float: right;" class="item col-sm-6">
                        <a onclick="submitSignupForm()" class="btnx btn_red" style="cursor:pointer;padding-left:10px;padding-right:10px;">CREATE ACCOUNT</a>
                    </div>
                </div>
                <div style="padding-left: 0px; padding-right: 0px; float: left;" class="item col-sm-12">
                    <a style="cursor: pointer; margin-bottom: 10px; margin-left: 0px;" class="forgot_password" onclick="showForgetView()">Forgot password?</a>
                </div>
                <input type="hidden" name="rtask" id="rtask" value="">
            </form>
        </div>
        
        
        <div class="user_login" id="forgetpassview" style="display:none">
            <p id="email_sent" style="display:none;color:#6cbe35">You've just sent an email with password</p>
            <form id="myforgetform" action="" method="post">
                <b>Email</b>
                <input type="text" id="femail" name="femail" />
                <br />
                <div class="action_btns">
                    <div class="one_half" style="width:16%">
                        <a onClick="showLoginView()" class="forgot_password" style="cursor:pointer;margin-left:0px;">SIGN IN</a>
                    </div>
                    <div class="one_half" style="width:42%">
                        <a onClick="showSignupForm()" class="forgot_password" style="cursor:pointer;padding-left:0px;padding-right:0px;">CREATE ACCOUNT</a>
                    </div>
                    <div class="one_half last" style="width: 37%; margin-bottom: 10px; margin-top: 10px;">
                        <a onClick="submitForgetForm()" class="btnx btn_red" style="cursor:pointer;padding-left:7px;padding-right:7px;margin-bottom:10px;">Email Password</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<?php endif; ?>


<?php //if(!empty($_SESSION['ses_user_info'])): ?>
<div id="chat_div">
	<div style="background-color:#198BFF;">
    	<a onclick="minimize_chat()" style="cursor:pointer;color:#fff;float:left">
        	<p id="user_status_<?php echo $superadmin_info['id'] ?>" style="width:10px;border-radius:10px;border-radius: 10px;  margin-top: 14px; margin-left:10px; background-color: rgb(255, 0, 0); height: 10px;"></p>
        </a>
        
        <a style="cursor:pointer;color:#fff" onclick="maximize_chat()">
            <i class="fa fa-wechat"></i>&nbsp;&nbsp;Live Support !!
        </a>
        <a id="chat_mini_sign" onclick="minimize_chat()" style="cursor:pointer;color:#fff;display:none"><i  class="fa fa fa-minus-circle" style="right:10px;top:1px;line-height: 35px;position: absolute;"></i></a>
    </div>
    <div style="background-color:#FFF;height:365px;">
    	
        
        <?php if(!empty($_SESSION['ses_user_info'])): ?>
            <div style="height:324px;" id="chatdiv">
            </div>
            
            
            <div style="height:50px;padding-left:0px;">
                <div class="col-md-11" style="padding-left:0px;padding-right:0px;width:240px;float:left">
                    <input type="text" name="chat_text" id="chat_text" style="width:100%;height:40px;padding-left:10px;" placeholder="Type a message here...">
                </div>	
                
                <div style="width:55px;float:right">
                    <input type="button" value="Send" style="height: 40px; font-size: 14px; line-height: 29px;" onClick="submitChat()">
                </div>	
            </div>
            
            <input type="hidden" id="to_userid" value="<?php echo $superadmin_info['id']; ?>" />
            <input type="hidden" id="lastmessagetime" value="" />
        <?php else: ?>
        	<div id="thankyou" style="color:#ff0000;display:none;padding:100px 10px">
            	<b>Thank you for your message. We will get back to you shortly!!!</b>
            </div>
            
            <div id="an_message_form" style="color:#ff0000;">
                <table width="100%" cellpadding="5" cellspacing="0">
                    <tr>
                        <td style="color:#000"><b>Name:</b>&nbsp;</td>
                        <td><input type="text" name="chat_name" id="chat_name" style="width:100%"></td>
                    </tr>
                    <tr>
                        <td style="color:#000"><b>Email:</b>&nbsp;</td>
                        <td><input type="text" name="chat_email" id="chat_email" style="width:100%"></td>
                    </tr>
                    <tr>
                        <td style="color:#000"><b>Cell:</b>&nbsp;</td>
                        <td><input type="text" name="chat_cell" id="chat_cell" style="width:100%"></td>
                    </tr>
                    <tr>
                        <td style="color:#000"><b>Message:</b>&nbsp;</td>
                        <td>
                            <textarea id="chat_message" name="chat_message" style="width:100%;height:100px;" placeholder="Type your message here..."></textarea>
                        </td>
                    </tr>
                    <input type="hidden" id="to_userid" value="<?php echo $superadmin_info['id']; ?>" />
                    <input type="hidden" id="lastmessagetime" value="" />
                    <tr>
                        <td style="color:#000">&nbsp;</td>
                        <td>
                            <input type="button" value="Send" style="height: 40px; font-size: 14px; line-height: 29px;width:70px;" onClick="submitAnonymousChat()">
                        </td>
                    </tr>
                </table>
            </div>
		<?php endif; ?>
        
    </div>
</div>

<audio>
    <source src="<?php echo site_url ?>admin/assets/skypesmsto.mp3"></source>
    <source src="<?php echo site_url ?>admin/assets/skypesmsto.ogg"></source>
</audio>

<style>
	#chat_div {
		background-color: #198BFF;
		border: 1px solid #198BFF;
		bottom: -365px;
		height: 400px;
		position: fixed;
		right: 0;
		width: 300px;
		z-index: 1000;
		line-height:35px;
		text-align:center;
		color:#fff;
		border-top-left-radius:5px;
	  }
</style>
<?php //endif; ?>

<!-- Bootstrap core JavaScript --> 
<script src="js/retina.js"></script> 
<script src="js/main.js"></script> 
<script src="js/modernizr.custom.js"></script> 
<script defer src="js/jquery.flexslider.js"></script> 
<script type="text/javascript" src="js/jquery.fancybox.js"></script> 
<script src="js/jquery.bxslider.js" type="text/javascript"></script> 
<script src="js/jquery.selectbox-0.2.js" type="text/javascript"></script> 
<script type="text/javascript" src="js/jquery.mousewheel.js"></script> 
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<script type="text/javascript" src="js/sweetalert-dev.js"></script>

<script type="text/javascript" src="js/jquery-ui.js"></script>


<script type="text/javascript" src="admin/assets/js/enquire.min.js"></script> 									<!-- Load Enquire -->
<script type="text/javascript" src="admin/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->
<script type="text/javascript" src="admin/assets/js/application.js"></script> 
<script type="text/javascript" src="admin/assets/js/jquery.plugin.min.js"></script>
<script type="text/javascript" src="admin/assets/js/jquery.countdown.js"></script>

<script>
	
	function maximize_chat() {
		jQuery("#chat_div").css('bottom','0px');
		jQuery("#chat_mini_sign").css('display','block');
	}
	
	function minimize_chat() {
		jQuery("#chat_div").css('bottom','-365px');
		jQuery("#chat_mini_sign").css('display','none');	
	}
	
	
	function timeSince(date) {
	
		//var seconds = Math.floor((new Date() - date) / 1000);
		var seconds = Math.floor(((new Date().getTime()/1000) - date));
	
		var interval = Math.floor(seconds / 31536000);
	
		if (interval >= 1) {
			return interval + " years";
		}
		interval = Math.floor(seconds / 2592000);
		if (interval >= 1) {
			return interval + " months";
		}
		interval = Math.floor(seconds / 86400);
		if (interval >= 1) {
			return interval + " days";
		}
		interval = Math.floor(seconds / 3600);
		if (interval >= 1) {
			return interval + " hours";
		}
		interval = Math.floor(seconds / 60);
		if (interval >= 1) {
			return interval + " minutes";
		}
		return Math.floor(seconds) + " seconds";
	}
	
	function submitChat() {
		
		jQuery("#chatdiv").animate({ scrollTop: jQuery('#chatdiv').prop('scrollHeight') }, "fast");
		
		jQuery("#chatdiv").append('<div class="col-md-12" style="margin-top:5px;margin-bottom:5px;padding:5px;margin:0px;clear: both;"><div class="col-md-1" style="padding:0px;margin-top:-5px;"><img src="<?php if(!empty($_SESSION['ses_user_info'])): echo $_SESSION['ses_user_info']['image']; else: echo site_url."admin/images/user_avatar.png"; endif; ?>" style="width:30px;height:30px;"></div><div class="col-md-7" style="padding-top: 5px; padding-bottom: 5px; border-radius: 5px; background-color: #DDFBFF; margin-left: 10px;color:#000;font-size:13px;line-height:17px;">'+jQuery("#chat_text").val()+'</div><div class="col-md-3" style="text-align: right; font-size: 12px; color: #c6c6c6;line-height:15px;padding:5px;padding-top:0px;"><?php echo date('M j,y') ?><br/><?php echo date('h:i A') ?></div></div>');	
		
		jQuery.ajax({
			  type: 'GET',
			  url: '<?php echo site_url ?>admin/chat_ajax/insert_chat.php',
			  data: {
				  message_from: '<?php if(!empty($_SESSION['ses_user_info'])): echo $_SESSION['ses_user_info']['id']; else: echo "-1"; endif; ?>',
				  message_to: jQuery("#to_userid").val(),
				  message: jQuery("#chat_text").val()
			  },
			  success: function(data){
				
			  }
		});
		
		jQuery("#chat_text").val('');
		
		return false;
	}
	
	jQuery("#chat_text").keypress(function(e) {
		if(e.which == 13) {
			submitChat();
		}
	});
	
	function removeUsersdivColor() {
		<?php foreach($userists as $userist): ?>	
			jQuery("#usersdiv_<?php echo $userist['id'] ?>").css('background-color','#fff');
		<?php endforeach; ?>
	}

	
	function showAllChat(userid,username) {
		removeUsersdivColor();
		jQuery("#usersdiv_"+userid).css('background-color','#DDFBFF');
		jQuery("#user_comment_status_"+userid).css('display','none');
		//alert(userid+'##'+username);
		jQuery("#to_userid").val(userid);
		jQuery("#to_username").html(username);
		jQuery("#chatdiv").html('');
		
		
		
		jQuery.ajax({
			  type: 'GET',
			  url: '<?php echo site_url ?>admin/chat_ajax/getMessageText.php',
			  data: {
				  user_id: '<?php if(!empty($_SESSION['ses_user_info'])): echo $_SESSION['ses_user_info']['id']; else: echo '-1'; endif; ?>',
				  message_to: jQuery("#to_userid").val(),
			  },
			  success: function(data){
				 var JSONArray = jQuery.parseJSON( data );
				 if(JSONArray.length>0) {
					for(var i=0;i<JSONArray.length;i++) {
						//alert(JSONArray[i]['image']);
						if(JSONArray[i]['message_from'] == '<?php echo $_SESSION['ses_user_info']['id']; ?>'){
							var selimage = '';
							if(JSONArray[i]['image']) {
								selimage = JSONArray[i]['image'];
							}
							else {
								
								selimage = '<?php echo site_url."admin/images/user_avatar.png"; ?>';
							}
							jQuery("#chatdiv").append('<div class="col-md-12" style="margin-top:5px;margin-bottom:5px;padding:5px;margin:0px;clear: both;"><div class="col-md-1" style="padding:0px;margin-top:-5px;"><img src="'+selimage+'" style="width:30px;height:30px;"></div><div class="col-md-7" style="padding-top: 5px; padding-bottom: 5px; border-radius: 5px; background-color: #DDFBFF; margin-left: 10px;color:#000;font-size:13px;line-height:17px;">'+JSONArray[i]['message']+'</div><div class="col-md-3" style="text-align: right; font-size: 11px; color: #c6c6c6;line-height:15px;padding:5px;padding-top:0px;">Mar 3, 17<br/>11:28 PM</div></div>');
						}
						else {
							var selimage = '';
							if(JSONArray[i]['image']) {
								selimage = JSONArray[i]['image'];
							}
							else {
								
								selimage = '<?php echo site_url."admin/images/user_avatar.png"; ?>';
							}
							jQuery("#chatdiv").append('<div class="col-md-12" style="margin-top:5px;margin-bottom:5px;padding:5px;margin:0px;clear: both;"><div class="col-md-1" style="float:right;padding:0px;margin-top:-5px;"><img src="'+selimage+'" style="width:30px;height:30px;"></div><div class="col-md-7" style="padding-top: 5px; padding-bottom: 5px; border-radius: 5px; background-color: #EAEAEA; margin-right: 10px;float:right;color:#000;font-size:13px;line-height:17px;">'+JSONArray[i]['message']+'</div><div class="col-md-3" style="text-align: left; font-size: 11px; color: #c6c6c6;line-height:15px;padding:5px;padding-top:0px;">Mar 3, 17<br/>11:29 PM</div></div>');
						}
					}
					jQuery("#lastmessagetime").val(JSONArray[JSONArray.length-1]['created']);
				 }
				 else {
					jQuery("#lastmessagetime").val('1'); 
				 }
				 
				jQuery("#chatdiv").animate({ scrollTop: jQuery('#chatdiv').prop('scrollHeight') }, "fast");
				return false;
				
			  }
		  });
		  
		  
		  /*if(jQuery("#unread_message_count").html()=='1'){
				jQuery("#unread_message_count").html('');
				jQuery("#unread_message_count").css('display','none');	
				
				jQuery("#unread_message_list").html('');  
		  }*/
		
		setTimeout(function(){
            jQuery("#chat_text").focus();
        }, 1);
	}
	
	
	
	var soundarr = [];
	
	function showOnlineOffline() {
		jQuery.ajax({
			  type: 'GET',
			  url: '<?php echo site_url ?>admin/chat_ajax/ajax_chat.php',
			  data: {
				  user_id: '<?php if(!empty($_SESSION['ses_user_info'])): echo $_SESSION['ses_user_info']['id']; else: echo '-1'; endif; ?>',
				  message_to: jQuery("#to_userid").val(),
			  },
			  success: function(data){
				var JSONArray = jQuery.parseJSON( data );  
				for(var i=0;i<JSONArray['online_users'].length;i++) {
					jQuery('#user_status_'+(JSONArray['online_users'][i].toString())).css('background-color', 'green');
				}
				
				for(var i=0;i<JSONArray['offline_users'].length;i++) {
					jQuery('#user_status_'+(JSONArray['offline_users'][i].toString())).css('background-color', 'red');
				}
			  
				
				if(JSONArray['chat_message']) {
					if(JSONArray['chat_message'].length>0) {
						
						var audio = document.getElementsByTagName("audio")[0];
						
						
						var totalunreadmessage = 0;
						var unread_message_list = '';
						for(var i=0;i<JSONArray['chat_message'].length;i++) {
							if(JSONArray['chat_message'][i]['message_from'] == '<?php echo $_SESSION['ses_user_info']['id'] ?>'){
								jQuery("#chatdiv").append('<div class="col-md-12" style="margin-top:5px;margin-bottom:5px;padding:5px;margin:0px;"><div class="col-md-1" style="padding:0px;margin-top:-5px;"><img src="'+JSONArray['chat_message'][i]['image']+'" style="width:30px;height:30px;"></div><div class="col-md-7" style="padding-top: 5px; padding-bottom: 5px; border-radius: 5px; background-color: #DDFBFF; margin-left: 10px;color:#000;font-size:13px;line-height:17px;">'+JSONArray['chat_message'][i]['message']+'</div><div class="col-md-3" style="text-align: right; font-size: 11px; color: #c6c6c6;line-height:15px;padding:5px;padding-top:0px;">Mar 3, 17<br/>11:31 PM</div></div>');
							}
							else {
									if(JSONArray['chat_message'][i]['message_from'] == $("#to_userid").val()) {
										jQuery("#chatdiv").append('<div class="col-md-12" style="margin-top:5px;margin-bottom:5px;clear:both"><div class="col-md-1" style="float:right;padding:0px;margin-top:-5px;"><img src="'+JSONArray['chat_message'][i]['image']+'" style="width:30px;height:30px;"></div><div class="col-md-7" style="padding-top: 5px; padding-bottom: 5px; border-radius: 5px; background-color: #EAEAEA; margin-right: 10px;float:right;color:#000;font-size:13px;line-height:17px;">'+JSONArray['chat_message'][i]['message']+'</div><div class="col-md-3" style="text-align: left; font-size: 11px; color: #c6c6c6;line-height:15px;padding:5px;padding-top:0px;">Mar 3, 17<br/>11:32 PM</div></div>');
										
									}
									else {
										
										$("#user_comment_status_"+JSONArray['chat_message'][i]['message_from']).css('display','block');
																				
										totalunreadmessage++;
										
										if(soundarr.indexOf(JSONArray['chat_message'][i]['id']) == -1) {
											//soundarr[] = JSONArray['chat_message'][i]['id'];
											soundarr.push(JSONArray['chat_message'][i]['id']);
											
											audio.play();
										}
										
										var uname = JSONArray['chat_message'][i]['first_name']+' '+JSONArray['chat_message'][i]['last_name'];
										
									}
								}
								
							}
						}
						
						jQuery("#lastmessagetime").val(JSONArray['chat_message'][JSONArray['chat_message'].length-1]['created']);
					 }
					
					jQuery("#chatdiv").animate({ scrollTop: jQuery('#chatdiv').prop('scrollHeight') }, "fast");
					return false;
					
				}
			
		  });
	}
	
	//showAllChat('<?php echo $superadmin_info['id'] ?>','<?php echo $superadmin_info['first_name'].' '.$superadmin_info['last_name'] ?>');
	//setInterval(showOnlineOffline, 3000);
	
	
	
	
	
	
	
	<?php if(empty($_SESSION['ses_user_info'])): ?>
		jQuery( document ).ready(function() {
			jQuery("#modal_login").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });	
			jQuery("#login_message").html('Please click on CREATE ACCOUNT button or SIGN IN');
		});
	<?php endif; ?>
	
	function showSignupForm() {
		jQuery("#signupview").css('display','block');	
		jQuery("#forgetpassview").css('display','none');	
		jQuery("#loginview").css('display','none');
		jQuery("#head_title").html('CREATE ACCOUNT');
	}
	
	/*function showPreLoginView() {
		//jQuery("#modal").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });	
		//showLoginView();
		
	}*/
	
	function showLoginView() {
		jQuery("#forgetpassview").css('display','none');	
		jQuery("#signupview").css('display','none');	
		jQuery("#loginview").css('display','block');	
		jQuery("#head_title").html('SIGN IN');
	}
	
	function showForgetView() {
		jQuery("#loginview").css('display','none');	
		jQuery("#signupview").css('display','none');	
		jQuery("#forgetpassview").css('display','block');	
		jQuery("#head_title").html('FORGOT PASSWORD');
	}
	
	function IsEmail(email) {
	  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
	
	function submitForgetForm() {
		var flag = 0;
				
		if(jQuery("#femail").val() =='') {
			jQuery("#femail").css('border','1px solid #ff0000');
			jQuery("#femail").css('background-color','#ffe2e2');
			flag = 1;
		}
		else if(!IsEmail(jQuery("#femail").val())) {
			jQuery("#femail").css('border','1px solid #ff0000');
			jQuery("#femail").css('background-color','#ffe2e2');
			flag = 1;
		}
		else {
			jQuery("#femail").css('border','1px solid #ddd');
			jQuery("#femail").css('background-color','#fff');
		}
		
		if(flag == 1) {
			return false;	
		}
		else {
			 jQuery.ajax({
				  type: 'POST',
				  url: '<?php echo site_url ?>ajax/forget-password',
				  data: {
					  email: jQuery("#femail").val(),
				  },
				  success: function(data){
					  if(data == 'done') {
						 jQuery("#email_sent").css('display','block');
					  }
				  }
			  });
		}
	}
	
	
	function submitSignupForm() {
		var flag = 0;
			
		if(jQuery("#rname").val() =='') {
			jQuery("#rname").css('border','1px solid #ff0000');
			jQuery("#rname").css('background-color','#ffe2e2');
			flag = 1;
		}
		else {
			jQuery("#rname").css('border','1px solid #ddd');
			jQuery("#rname").css('background-color','#fff');
		}	
				
		if(jQuery("#remail").val() =='') {
			jQuery("#remail").css('border','1px solid #ff0000');
			jQuery("#remail").css('background-color','#ffe2e2');
			flag = 1;
		}
		else if(!IsEmail(jQuery("#remail").val())) {
			jQuery("#remail").css('border','1px solid #ff0000');
			jQuery("#remail").css('background-color','#ffe2e2');
			flag = 1;
		}
		else {
			jQuery("#remail").css('border','1px solid #ddd');
			jQuery("#remail").css('background-color','#fff');
		}
		
		if(jQuery("#rpass").val() =='') {
			jQuery("#rpass").css('border','1px solid #ff0000');
			jQuery("#rpass").css('background-color','#ffe2e2');
			flag = 1;
		}
		else {
			jQuery("#rpass").css('border','1px solid #ddd');
			jQuery("#rpass").css('background-color','#fff');
		}
		
		
		if(flag == 1) {
			return false;	
		}
		else {
			 jQuery.ajax({
				  type: 'POST',
				  url: '<?php echo site_url ?>ajax/usersignup.php',
				  data: {
					  rname: jQuery("#rname").val(),
					  email: jQuery("#remail").val(),
					  pass: jQuery("#rpass").val(),
					  rtask: jQuery("#rtask").val(),
				  },
				  success: function(data){
					  
					  if(data == 'email_exists') {
						    jQuery("#signup_failed").css('display','block');
							jQuery("#remail").css('border','1px solid #ff0000');
							jQuery("#remail").css('background-color','#ffe2e2');  
							
							jQuery("#rpass").val('');
					  }
					  else if(data == 'bid_exists_done') {
						  jQuery('a[rel*=leanModal]').leanModal({ top : 200, overlay : 0.6, closeButton: ".modal_close" });
		  				  jQuery("#showDivId").click();
					  }
					  else if(data == 'save_exists_done') {
						  submitform_savenow2();
					  }
					  else {
						location.reload();  
					  }
				  }
			});
			return false;	
		}	
	}
	
	
	function submitLoginForm() {
		var flag = 0;
				
		if(jQuery("#semail").val() =='') {
			jQuery("#semail").css('border','1px solid #ff0000');
			jQuery("#semail").css('background-color','#ffe2e2');
			flag = 1;
		}
		else if(!IsEmail(jQuery("#semail").val())) {
			jQuery("#semail").css('border','1px solid #ff0000');
			jQuery("#semail").css('background-color','#ffe2e2');
			flag = 1;
		}
		else {
			jQuery("#semail").css('border','1px solid #ddd');
			jQuery("#semail").css('background-color','#fff');
		}
		
		if(jQuery("#spass").val() =='') {
			jQuery("#spass").css('border','1px solid #ff0000');
			jQuery("#spass").css('background-color','#ffe2e2');
			flag = 1;
		}
		else {
			jQuery("#spass").css('border','1px solid #ddd');
			jQuery("#spass").css('background-color','#fff');
		}
		
		
		if(flag == 1) {
			return false;	
		}
		else {
			 jQuery.ajax({
				  type: 'POST',
				  url: '<?php echo site_url ?>ajax/userlogin.php',
				  data: {
					  email: jQuery("#semail").val(),
					  pass: jQuery("#spass").val(),
					  task: jQuery("#task").val(),
					  
				  },
				  success: function(data){
					  if(data == 'not done') {
						    jQuery("#login_failed").css('display','block');
							jQuery("#semail").css('border','1px solid #ff0000');
							jQuery("#semail").css('background-color','#ffe2e2');  
							
							jQuery("#spass").css('border','1px solid #ff0000');
							jQuery("#spass").css('background-color','#ffe2e2');
					  }
					  else if(data == 'bid_exists_done') {
						  jQuery("#modal").css('display','none');
						  jQuery('a[rel*=leanModal]').leanModal({ top : 200, overlay : 0.6, closeButton: ".modal_close" });
		  				  jQuery("#showDivId").click();
					  }
					  else if(data == 'save_exists_done') {
						  submitform_savenow2();
					  }
					  else {
						//location.reload();  
						//window.location('<?php echo site_url ?>profile.php');
						window.location.href = "<?php echo site_url ?>profile.php";
					  }
				  }
			});
		}
	}
	
	
	
	function submitAnonymousChat() {
		var flag = 0;
			
		if(jQuery("#chat_name").val() =='') {
			jQuery("#chat_name").css('border','1px solid #ff0000');
			jQuery("#chat_name").css('background-color','#ffe2e2');
			flag = 1;
		}
		else {
			jQuery("#chat_name").css('border','1px solid #ddd');
			jQuery("#chat_name").css('background-color','#fff');
		}	
				
		if(jQuery("#chat_email").val() =='') {
			jQuery("#chat_email").css('border','1px solid #ff0000');
			jQuery("#chat_email").css('background-color','#ffe2e2');
			flag = 1;
		}
		else if(!IsEmail(jQuery("#chat_email").val())) {
			jQuery("#chat_email").css('border','1px solid #ff0000');
			jQuery("#chat_email").css('background-color','#ffe2e2');
			flag = 1;
		}
		else {
			jQuery("#chat_email").css('border','1px solid #ddd');
			jQuery("#chat_email").css('background-color','#fff');
		}
		
		if(jQuery("#chat_cell").val() =='') {
			jQuery("#chat_cell").css('border','1px solid #ff0000');
			jQuery("#chat_cell").css('background-color','#ffe2e2');
			flag = 1;
		}
		else {
			jQuery("#chat_cell").css('border','1px solid #ddd');
			jQuery("#chat_cell").css('background-color','#fff');
		}
		
		if(jQuery("#chat_message").val() =='') {
			jQuery("#chat_message").css('border','1px solid #ff0000');
			jQuery("#chat_message").css('background-color','#ffe2e2');
			flag = 1;
		}
		else {
			jQuery("#chat_message").css('border','1px solid #ddd');
			jQuery("#chat_message").css('background-color','#fff');
		}
		
		
		if(flag == 1) {
			return false;	
		}
		else {
			 jQuery.ajax({
				  type: 'GET',
				  url: '<?php echo site_url ?>admin/chat_ajax/insert_chat.php',
				  data: {
					  message_from: '-<?php echo time() ?>',
					  message_to: jQuery("#to_userid").val(),
					  chat_name: jQuery("#chat_name").val(),
					  chat_email: jQuery("#chat_email").val(),
					  chat_cell: jQuery("#chat_cell").val(),
					  message: jQuery("#chat_message").val()
				  },
				  success: function(data){
					 jQuery("#an_message_form").css('display','none');
					 jQuery("#thankyou").css('display','block');
				  }
			});
		
			jQuery("#chat_text").val('');
		
			return false;
		}	
	}
</script>
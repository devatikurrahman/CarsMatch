<?php 
	$sql = mysql_query("select * from users where user_type='superadmin' limit 1") ;
	$superadmin_info = mysql_fetch_assoc ($sql);
?>
<header  data-spy="affix" data-offset-top="1" class="clearfix">
    <div class="bottom-header" >
        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid"> 
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="<?php echo site_url ?>">
                        	<span class="logo">
                            	<img src="images/CarsMatch_Logo_white.png" />
                            </span>
                        </a> </div>
                    
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav pull-right">
                            <li><a href="index.html">How it Works</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Research <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="404.html">New Cars</a></li>
                                    <li><a href="about.html">Financing</a></li>
                                    <li><a href="faq.html">Trade-Ins</a></li>
                                </ul>
                            </li>
                            <!--<li><a href="<?php echo site_url ?>">Bid Me Now</a></li>-->
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Trade <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="404.html">My Car's Worth</a></li>
                                    <li><a href="about.html">Get an Offer</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="index.html">Finance</a></li>
                            <li><a href="<?php echo site_url ?>contact.php">Contact Us</a></li>
                            
                            <?php if(empty($_SESSION['ses_user_info'])): ?>
                            	<li><a style="cursor:pointer" id="modal_login" href="#modal" onclick="showPreLoginView()">Login / Sign Up</a></li>
                            <?php else: ?>
                            	<li><a style="cursor:pointer" href="<?php echo site_url ?>profile.php">My Profile</a></li>
                                <li><a style="cursor:pointer" href="<?php echo site_url ?>logout.php">Logout</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse --> 
                </div>
                <!-- /.container-fluid --> 
            </nav>
        </div>
    </div>
</header>
<div class="static-sidebar-wrapper sidebar-default" style="background-color:#68b7ff">
    <div class="static-sidebar">
      <div class="sidebar">
        <div class="widget">
          <div class="widget-body">
            <div class="userinfo">
              <div class="avatar">
                <?php if(!empty($_SESSION['ses_user_info']['imagefileurl'])): ?>
                <img src="<?php echo $_SESSION['ses_user_info']['imagefileurl'] ?>" class="img-responsive img-circle">
                <?php else: ?>
                <img src="<?php echo site_url ?>/images/user_avatar.png" class="img-responsive img-circle">
                <?php endif; ?>
              </div>
              <div class="info"> <span class="username" style="color:#FFF"><?php echo $_SESSION['ses_user_info']['first_name'] ?> <?php echo $_SESSION['ses_user_info']['last_name'] ?></span> <span class="useremail"  style="color:#FFF"><?php echo $_SESSION['ses_user_info']['email'] ?></span> </div>
            </div>
          </div>
        </div>
        <div class="widget stay-on-collapse" id="widget-sidebar">
          <nav role="navigation" class="widget-body">
            <!--<ul class="acc-menu">
              <li><a href="<?php echo site_url ?>dashboard.php"><span style="margin-right:15px;"><img src="<?php echo site_url ?>admin/images/dealer_dashboard.png"></span><span>Dashboard</span></a></li>
              <li><a href="<?php echo site_url ?>dashboard.php"><span style="margin-right:15px;"><img src="<?php echo site_url ?>admin/images/notes.png"></span><span>Notes</span></a></li>
              
              
              <li><a class="hasChild" href="javascript:;"><span style="margin-right:15px;"><img src="<?php echo site_url ?>admin/images/leads.png"></span><span>Vehicles</span></a>
                  <ul class="acc-menu" style="background-color:#7cc2ff">
                    <li><a href="<?php echo site_url ?>bid_vehicles.php">Bid Vehicles</a></li>
                    <li><a href="<?php echo site_url ?>saved_vehicles.php">Saved Vehicles</a></li>
                  </ul>
                </li>
              
              
              <li><a href="javascript:;"><span style="margin-right:15px;"><img src="<?php echo site_url ?>admin/images/trades.png"></span><span>Trades</span></a>
                  <ul class="acc-menu" style="background-color:#7cc2ff">
                    <li><a href="<?php echo site_url ?>profile_trades.php">Total Trades</a></li>
                    <li><a href="<?php echo site_url ?>profile_trade_add.php">Add Trade</a></li>
                  </ul>
                </li>
              
              <li><a href="<?php echo site_url ?>dashboard.php"><span style="margin-right:15px;"><img src="<?php echo site_url ?>admin/images/current_bids.png"></span><span>Dealer Bids</span></a></li>
              <li><a href="<?php echo site_url ?>dashboard.php"><span style="margin-right:15px;"><img src="<?php echo site_url ?>admin/images/docs.png"></span><span>Docs</span></a></li>
              <li><a href="<?php echo site_url ?>dashboard.php"><span style="margin-right:15px;"><img src="<?php echo site_url ?>admin/images/delivery.png"></span><span>Delivery</span></a></li>
              <li><a href="<?php echo site_url ?>dashboard.php"><span style="margin-right:15px;"><img src="<?php echo site_url ?>admin/images/settings.png"></span><span>Settings</span></a></li>
              <li><a href="<?php echo site_url ?>dashboard.php"><span style="margin-right:15px;"><img src="<?php echo site_url ?>admin/images/support.png"></span><span>Support</span></a></li>
              <li><a href="<?php echo site_url ?>dashboard.php"><span style="margin-right:15px;"><img src="<?php echo site_url ?>admin/images/chat.png"></span><span>Chat</span></a></li>
            </ul>-->
            <ul class="acc-menu">
              <li><a href="http://sam.carsmatch.com/dashboard.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
              <li><a href="http://sam.carsmatch.com/dashboard.php"><i class="fa fa-book"></i><span>Notes</span></a></li>
              <li class="hasChild"><a href="javascript:;"><i class="fa fa-user"></i><span>Vehicles</span></a>
                  <ul class="acc-menu" style="background-color: rgb(124, 194, 255); display: none;">
                    <li><a href="http://sam.carsmatch.com/bid_vehicles.php">Bid Vehicles</a></li>
                    <li><a href="http://sam.carsmatch.com/saved_vehicles.php">Saved Vehicles</a></li>
                  </ul>
                </li>
              
              <li class="hasChild"><a href="javascript:;"><i class="fa fa-user"></i><span>Trades</span></a>
                  <ul class="acc-menu" style="background-color: rgb(124, 194, 255); display: none;">
                    <li><a href="http://sam.carsmatch.com/profile_trades.php">Total Trades</a></li>
                    <li><a href="http://sam.carsmatch.com/profile_trade_add.php">Add Trade</a></li>
                  </ul>
                </li>
              
              <li><a href="http://sam.carsmatch.com/dashboard.php"><i class="fa fa-strikethrough"></i><span>Dealer Bids</span></a></li>
              <li><a href="http://sam.carsmatch.com/dashboard.php"><i class="fa fa-paperclip"></i><span>Docs</span></a></li>
              <li><a href="http://sam.carsmatch.com/dashboard.php"><i class="fa fa-send"></i><span>Delivery</span></a></li>
              <li><a href="http://sam.carsmatch.com/dashboard.php"><i class="fa fa-gear"></i><span>Settings</span></a></li>
              <li><a href="http://sam.carsmatch.com/dashboard.php"><i class="fa fa-phone"></i><span>Support</span></a></li>
              <li><a href="http://sam.carsmatch.com/dashboard.php"><i class="fa fa-wechat"></i><span>Chat</span></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
<!-- //////////////////////////////////////////////////// Navigation-Panel div -->
<div id="navigation-panel" class=""style="background-color:#1b262c;">
<nav class="sidebar nano">

<div class="clearfix"></div>

<div id="#sidebar-navbar" class="sidebar-nav nano-content navbar-collapse ">
<ul class="nav" id="side-menu">


<!-- Single Link -->

<li id="example1"><a href="dashboard.php?m=0" <?php if($_GET['m']==0){?> class="chevron active"<?php }else{?> class="chevron" <?php } ?>style="background-color:#1b262c;">
<i class="fa fa-th-large" aria-hidden="true" style='color:#fff;'></i> <span class="link-hide"style='color:#fff;'> Dashboard </span></a>
</li>


<li id="example1"><a href="dashboard.php?m=1" <?php if($_GET['m']==1){?> class="chevron active"<?php }else{?> class="chevron" <?php } ?>style="background-color:#1b262c;">
<i class="fa fa-th-large" aria-hidden="true" style='color:#fff;'></i> <span class="link-hide"style='color:#fff;'> My Details </span></a>
<ul class="nav nav-second-level" >
<li><a href="profile_settings.php?m=1"  class="active" style="background-color:#1b262c;"><p style='color:#ffffff;'>Profile Settings</p></a></li>
<li><a href="password_settings.php?m=1" class="active" style="background-color:#1b262c;"><p style='color:#ffffff;'>Password Settings</p></a></li>
<li><a href="joining_letter.php?m=1"    class="active" style="background-color:#1b262c;"><p style='color:#ffffff;'>Welcome Letter</p></a></li>
<li><a href="kyc_up.php?m=1"  class="active" style="background-color:#1b262c;"><p style='color:#ffffff;'>KYC</p></a></li>

</ul>
</li>

<li id="example1"><a href="#" <?php if($_GET['m']==2){?> class="chevron active"<?php }else{?> class="chevron" <?php } ?>style="background-color:#1b262c;"><i class="fa fa-sitemap" aria-hidden="true"style='color:#fff;'></i> <span class="link-hide"><p style='color:#fff;'> Join </p></span></a>
<ul class="nav nav-second-level">
<li><a href="register.php?m=2" class="active"style="background-color:#1b262c;"><p style='color:#fff;'>Register</p></a></li>


<!-- <li><a href="downline_member.php?m=2" class="active"style="background-color:#1b262c;"><p style='color:#fff;'>Downline Member</p></a></li>
<li><a href="genealogy.php?m=2" class="active" style="background-color:#1b262c;"><p style='color:#fff;'>Binary Tree</p></a></li>

<li><a href="level_tree.php?m=2" class="active" style="background-color:#1b262c;"><p style='color:#fff;'>Level Tree</p></a></li> -->


</ul>
</li>





<li id="example1"><a href="#" <?php if($_GET['m']==2){?> class="chevron active"<?php }else{?> class="chevron" <?php } ?>style="background-color:#1b262c;"><i class="fa fa-sitemap" aria-hidden="true"style='color:#fff;'></i> <span class="link-hide"><p style='color:#fff;'> Team View </p></span></a>
<ul class="nav nav-second-level">
<li><a href="direct_member.php?m=2" class="active"style="background-color:#1b262c;"><p style='color:#fff;'>Direct Member</p></a></li>
<li><a href="downline_member.php?m=2" class="active"style="background-color:#1b262c;"><p style='color:#fff;'>Downline Member</p></a></li>
<li><a href="genealogy.php?m=2" class="active" style="background-color:#1b262c;"><p style='color:#fff;'>Binary Tree</p></a></li>




</ul>
</li>






<!-- <li id="example1"><a href="#" <?php if($_GET['m']==5){?> class="chevron active"<?php }else{?> class="chevron" <?php } ?>style="background-color:#1b262c;" ><i class="fa fa-money" aria-hidden="true"style='color:#fff;'></i> <span class="link-hide"><p style='color:#fff;'> E-wallet </p></span></a>
<ul class="nav nav-second-level">
<li><a href="current_ewallet_status.php?m=5" class="active"style="background-color:#1b262c;"><p style='color:#fff;'> E-Wallet Status</p></a></li>
<li><a href="withdrwal_transfer.php?m=5" class="active"style="background-color:#1b262c;"><p style='color:#fff;'>Withdrawal</p></a></li>
<li><a href="withdrwal_history.php?m=5" class="active"style="background-color:#1b262c;"><p style='color:#fff;'>Withdrawal History</p></a></li>
</ul>
</li> -->



<!--
<li id="example1"><a href="#" <?php if($_GET['m']==16){?> class="chevron active"<?php }else{?> class="chevron" <?php } ?>style="background-color:#1b262c;"><i class="fa fa-pie-chart" aria-hidden="true"style='color:#fff;'></i> <span class="link-hide"><p style='color:#fff;'> Coupon </p></span></a>
<ul class="nav nav-second-level">
<li><a href="couponlist.php?m=16"style="background-color:#1b262c;"><p style='color:#fff;'>My Coupon</p></a></li>
<li><a href="refferal_couponlist.php?m=16"style="background-color:#1b262c;"><p style='color:#fff;'>Referral Coupon</p></a></li>

</ul>
</li>
-->

<!--
<li id="example1"><a href="#" <?php if($_GET['m']==6){?> class="chevron active"<?php }else{?> class="chevron" <?php } ?>style="background-color:#1b262c;"><i class="fa fa-pie-chart" aria-hidden="true"style='color:#fff;'></i> <span class="link-hide"><p style='color:#fff;'> Benefit </p></span></a>
<ul class="nav nav-second-level">
<li><a href="daily_income.php?m=6"style="background-color:#1b262c;"><p style='color:#fff;'>Daily Income</p></a></li>
<li><a href="weekly_income.php?m=6"style="background-color:#1b262c;"><p style='color:#fff;'>Weekly Payout</p></a></li>
</ul>
</li>
-->

<li id="example1"><a href="#" <?php if($_GET['m']==3){?> class="chevron active"<?php }else{?> class="chevron" <?php } ?>style="background-color:#1b262c;"><i class="fa fa-envelope" aria-hidden="true"style='color:#fff;'></i> <span class="link-hide"><p style='color:#fff;'>Message</p></span></a>
<ul class="nav nav-second-level">
<li><a href="message_zone.php?m=3" class="active"style="background-color:#1b262c;"><p style='color:#fff;'>Inbox</p></a></li>
<li><a href="compose_messages.php?m=3" class="active"style="background-color:#1b262c;"><p style='color:#fff;'>Compose</p></a></li>
<li><a href="sent_messages.php?m=3" class="active"style="background-color:#1b262c;"><p style='color:#fff;'>Sent Message</p></a></li>
</ul>
</li>







</ul> <!-- /side-menu -->
</div> <!-- /sidebar-nav -->

</nav> <!-- /sidebar-->
</div> <!-- /navigation-panel -->

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from website.y0.pl/preview/master/011/pages/basic-forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Nov 2016 04:57:43 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="description" content="Admin Template">
    <meta name="author" content="Zwolek">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Master</title>
    <!-- Custom Style-->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- Theme Color Style-->
    <link rel="stylesheet" type="text/css" href="css/theme-purple.css">    
    <!-- Nano Scroller Default Style-->
    <link rel="stylesheet" href="css/nanoscroller.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- //////////////////////////////////////////////////// Header-Panel div -->
<div id="header-panel">
<nav class="navbar navbar-fixed-top">
<div class="container-fluid">
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="navbar-header">

      <a class="navbar-brand" href="index.html">
          <span class="logo-img"><!-- logo img <img src="img" alt=""> -->M</span>
          <span class="logo-text hidden-xs hidden-sm">Master</span>
      </a> <!-- /navbar-brand --> 

    <ul class="nav navbar-nav">

    <!-- menu open/close button -->
    <li class="btn-menu hidden-xs hidden-sm"> <a id="menu-toggle" href="#" class="toggle"></a> </li>
    <li class="btn-menu hidden-md hidden-lg"> <a id="mobile-menu-toggle" href="#" class="toggle"></a> </li>

    <li class="dropdown reports">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell" aria-hidden="true"></i>
      <span class="badge">4</span></a>
      <ul class="dropdown-menu">
        <li class="title-alerts">You have 4 reports</li>
        
        <!-- ////////////////////////////// Item 1 ////////////////////////////// -->
        <li class="item">
            <button class="close-button"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div class="icon pull-left"><i class="center-block fa fa-user-plus" aria-hidden="true"></i></div>
            <div class="content"> John Doe creat new account</div>
            <div class="time-history">2 min ago</div>
        </li> <!-- /item -->

        <!-- ////////////////////////////// Item 2 ////////////////////////////// -->
        <li class="item">
            <button class="close-button"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div class="icon pull-left"><i class="center-block fa fa-plus" aria-hidden="true"></i></div>
            <div class="content"> Matthew Doe buy new item</div>
            <div class="time-history">10 min ago</div>
        </li> <!-- /item -->

        <!-- ////////////////////////////// Item 3 ////////////////////////////// -->
        <li class="item">
            <button class="close-button"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div class="icon pull-left"><i class="center-block fa fa-upload" aria-hidden="true"></i></div>
            <div class="content"> Upload file complete</div>
            <div class="time-history">1 hour ago</div>
        </li> <!-- /item -->

        <!-- ////////////////////////////// Item 4 ////////////////////////////// -->
        <li class="item">
            <button class="close-button"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div class="icon pull-left"><i class="center-block fa fa-twitter" aria-hidden="true"></i></div>
            <div class="content"> 5 new followers on twitter</div>
            <div class="time-history">3 Hours ago</div>
        </li> <!-- /item -->

      </ul> <!-- /dropdown-menu -->
    </li> <!-- /dropdwon reports-->

    <li class="dropdown message">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope" aria-hidden="true"></i>
          <span class="badge">3</span></a>
          <ul class="dropdown-menu">
            <li class="title-alerts">You have 3 mails</li>
            
            <!-- ////////////////////////////// Item 1 ////////////////////////////// -->
            <li class="item">
            <a href="#" class="mail-link">
                <div class="icon pull-left"><i class="center-block fa fa-envelope" aria-hidden="true"></i></div>
                <div class="content"> John Doe creat new account</div>
                <div class="time-history">2 min ago</div>
            </a> <!-- /mail-link -->
            </li> <!-- /item -->

            <!-- ////////////////////////////// Item 2 ////////////////////////////// -->
            <li class="item">
            <a href="#" class="mail-link">
                <div class="icon pull-left"><i class="center-block fa fa-envelope" aria-hidden="true"></i></div>
                <div class="content"> Matthew Doe buy new item</div>
                <div class="time-history">10 min ago</div>
            </a> <!-- /mail-link -->
            </li> <!-- /item -->

            <!-- ////////////////////////////// Item 3 ////////////////////////////// -->
            <li class="item">
            <a href="#" class="mail-link">
                <div class="icon pull-left"><i class="center-block fa fa-envelope" aria-hidden="true"></i></div>
                <div class="content"> Upload file complete</div>
                <div class="time-history">1 hour ago</div>
            </a> <!-- /mail-link -->
            </li> <!-- /item -->

            <li class="all-mails">
                <a href="#" data-toggle="tooltip" data-placement="top" title="See all messages">
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                </a>
            </li> <!-- /all-mails -->

          </ul> <!-- /dropdown-menu -->
        </li> <!-- /dropdown message -->

      </ul> <!-- /navbar-nav -->

      <form class="navbar-form navbar-left hidden-xs">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
      </form> <!-- /navbar-form -->

        <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown user-menu">
            
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="img/admin.jpg" alt="" class="profile-img img-circle img-resposnive pull-left"> 
        <span class="hidden-xs">Veronica Thornton</span> <span class="caret"></span></a>

        <ul class="dropdown-menu pull-right">
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
            <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>Dashboard</a></li>
            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>My Inbox</a> <span class="badge">3</span></li>
            <li class="divider"></li>
            <li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i>LockScreen</a></li>
            <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</a></li>
        </ul> <!-- /dropdown-menu -->
        </li> <!-- /dropdwon -->
        
      </ul> <!-- /navbar-right -->

    </div><!-- /navbar-collapse -->
  </div><!-- /container-fluid -->
</nav>
</div> <!-- /header-panel -->

<!-- //////////////////////////////////////////////////// Navigation-Panel div -->
<div id="navigation-panel" class=""> 
    <nav class="sidebar nano">

    <div class="clearfix"></div>

    <div id="#sidebar-navbar" class="sidebar-nav nano-content navbar-collapse ">
    <ul class="nav" id="side-menu">
    
    <li class="nav-header">Navigation</li>

    <!-- Single Link -->
    <li><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> <span class="link-hide"> Dashboard </span></a></li>
   
    <!-- Dropdown -->
    <li><a href="#" class="chevron"><i class="fa fa-desktop" aria-hidden="true"></i> <span class="link-hide"> Layouts </span></a>
        <ul class="nav nav-second-level">
            <li><a href="index.html" class="active">Layout 1</a></li>
            <li><a href="index.html">Layout 2</a></li>
        </ul> <!-- /nav-second-level -->
    </li> <!-- /li dropdown -->

    <!-- Dropdown -->
    <li><a href="#" class="chevron"><i class="fa fa-magic" aria-hidden="true"></i> <span class="link-hide"> Ui Elements </span></a>
        <ul class="nav nav-second-level">
            <li><a href="buttons.html">Buttons </a></li>
            <li><a href="grid.html">Grid </a></li>
            <li><a href="icons.html">Icons </a></li>
            <li><a href="lists.html">lists</a></li>
            <li><a href="modal.html">Modal, Popover & Tooltip</a></li>
            <li><a href="notifications.html">notifications</a></li>
            <li><a href="panels.html">Panels </a></li>
            <li><a href="progress-bar.html">progress bars</a></li>
            <li><a href="tabs.html">Tabs </a></li>
            <li><a href="typography.html">Typography </a></li>
        </ul> <!-- /nav-second-level -->
    </li> <!-- /li dropdown -->
    
    <!-- Dropdown -->
    <li><a href="#" class="chevron active"><i class="fa fa-wpforms" aria-hidden="true"></i> <span class="link-hide"> Forms </span></a>
        <ul class="nav nav-second-level">
            <li><a href="basic-forms.html" class="active">Basic Forms</a></li>
            <li><a href="file-dropzone.html">File Dropzone</a></li>
            <li><a href="file-upload.html">File Upload</a></li>
            <li><a href="form-addons.html">Form Addons</a></li>
            <li><a href="form-layout.html">Form Layout</a></li>
            <li><a href="form-mask.html">Form Mask</a></li>
            <li><a href="form-validation.html">Form Validation</a></li>
            <li><a href="image-cropping.html">Image Cropping</a></li>
            <li><a href="summernote.html">Summernote</a></li>
        </ul> <!-- /nav-second-level -->
    </li> <!-- /li dropdown -->

    <!-- Dropdown -->
    <li><a href="#" class="chevron"><i class="fa fa-external-link" aria-hidden="true"></i> <span class="link-hide"> Pages </span></a>
        <ul class="nav nav-second-level">
            <li><a href="blank-page.html">Blank Page</a></li>
            <li><a href="forgot-password.html">Forgot Password</a></li>
            <li><a href="lock-screen.html">Lockscreen</a></li>
            <li><a href="register.html">Register</a></li>
            <li><a href="sign-in.html">Sign In</a></li>
            <li><a href="404error.html">404 Error</a></li>
            <li><a href="500error.html">500 Error</a></li>
        </ul> <!-- /nav-second-level -->
    </li> <!-- /li dropdown -->
    
    <!-- Dropdown -->
    <li><a href="#" class="chevron"><i class="fa fa-envelope" aria-hidden="true"></i> <span class="link-hide"> Message </span></a>
        <ul class="nav nav-second-level">
            <li><a href="compose-mail.html">Compose Mail</a></li>
            <li><a href="inbox.html">Inbox</a></li>
            <li><a href="message-detalis.html">Message Detalis</a></li>
        </ul> <!-- /nav-second-level -->
    </li> <!-- /li dropdown -->

    <!-- Dropdown -->
    <li><a href="#" class="chevron"><i class="fa fa-table fa-fw" aria-hidden="true"></i> <span class="link-hide"> Tables </span></a>
        <ul class="nav nav-second-level">
            <li><a href="basic-tables.html">Basic Tables</a></li>
            <li><a href="data-tables.html">Data Tables</a></li>
            <li><a href="responsive-tables.html">Responsive Tables</a></li>
        </ul> <!-- /nav-second-level -->
    </li> <!-- /li dropdown -->

    <!-- Dropdown -->
    <li><a href="#" class="chevron"><i class="fa fa-area-chart" aria-hidden="true"></i> <span class="link-hide"> Charts </span></a>
        <ul class="nav nav-second-level">
            <li><a href="chart-js.html">Chart.js Charts</a></li>
            <li><a href="flot-js.html">Flot.js Charts</a></li>
            <li><a href="morris-js.html">Morris.js Charts</a></li>
        </ul> <!-- /nav-second-level -->
    </li> <!-- /li dropdown -->
    
    <li class="nav-header">Features</li>

    <!-- Dropdown -->
    <li><a href="#" class="chevron"><i class="fa fa-sitemap" aria-hidden="true"></i> <span class="link-hide"> Menu Levels </span></a>
        <ul class="nav nav-second-level">

            <li class="none"><a href="#" class="chevron">Third Level</a>
            <ul class="nav nav-third-level">
                <li><a href="#">Third Level Item</a></li>
                <li><a href="#">Third Level Item</a></li>
                <li><a href="#">Third Level Item</a></li>
                <li><a href="#">Third Level Item</a></li>
            </ul> <!-- /nav-third-level -->
            </li> <!-- /li dropdown -->

            <li><a href="#">Simple Link</a></li>

        </ul> <!-- /nav-second-level -->
    </li> <!-- /li dropdown -->

    <!-- Dropdown -->
    <li><a href="#" class="chevron"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="link-hide">E-commerce </span></a>
        <ul class="nav nav-second-level">
            <li><a href="customer.html">Customer</a></li>
            <li><a href="edit-customer.html">Edit Customer</a></li>
            <li><a href="edit-orders.html">Edit Orders</a></li>
            <li><a href="edit-product.html">Edit Product</a></li>
            <li><a href="orders.html">Orders</a></li>
            <li><a href="product-list.html">Product List</a></li>
        </ul> <!-- /nav-second-level -->
    </li> <!-- /li Dropdown -->

    <li class="nav-header">Extras</li>
    <li><a href="index.html"><i class="fa fa-reply" aria-hidden="true"></i><span class="link-hide">RTL Support</span></a></li>
    <li><a href="documentation.html"><i class="fa fa-file-o" aria-hidden="true"></i><span class="link-hide">Documentation</span></a></li>
    
    </ul> <!-- /side-menu -->
    </div> <!-- /sidebar-nav -->

    </nav> <!-- /sidebar-->
</div> <!-- /navigation-panel -->

<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
        <h1 class="dash-title">Basic Forms</h1>
        <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> home</a></li>
          <li><a href="#">Forms</a></li>
          <li><a href="#" class="active">Basic Forms</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Basic Forms -->
<div class="row">

    <!-- //////////////////////////////////////////////////// Vertical Forms -->
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3>Vertical Forms</h3>
                <p class="text-muted">Individual form controls automatically receive some global styling. All textual <code>&lt;input&gt;</code>, <code>&lt;textarea&gt;</code>, and <code>&lt;select&gt;</code> elements with <code>.form-control</code> are set to <code>width: 100%;</code> by default. Wrap labels and controls in <code>.form-group</code> for optimum spacing.</p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">

            <form>
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Jane Doe">
            </div> <!-- /form-group -->

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Email">
            </div> <!-- /form-group -->

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div> <!-- /form-group -->
            
            <div class="form-group">
                <label for="inputHelpBlock">Input with help text</label>
                <input type="text" id="inputHelpBlock" class="form-control" aria-describedby="helpBlock" placeholder="Input with help text">
                <div id="helpBlock" class="help-block">
                    <p>A block of help text that breaks onto a new line and may extend beyond one line.</p>
                </div>
            </div> <!-- /form-group -->

            <div class="form-group">
                <label for="readOnlyInput">Readonly input</label>
                <input id="readOnlyInput" class="form-control" type="text" placeholder="Readonly input here???" readonly>
            </div> <!-- /form-group -->
            
            <div class="form-group">
                <label>Textarea</label>
                <textarea class="form-control" rows="2" placeholder="Your Text"></textarea>
            </div> <!-- /form-group -->
            
            <div class="form-group">
                <label>Example: Select</label>
                <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select> <!-- /form-control -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label>Example: Multiple Select</label>
                <select multiple class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select> <!-- multiple /form-control -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="btn-bs-file btn btn-md bg-purple"> <span>Browse File</span>
                    <input type="file" />
                </label>
                <p class="help-block">Example block-level help text here.</p>
            </div> <!-- /form-group -->
            
            <div class="checkbox checkbox-purple">   
                <input id="checkbox01" class="check" type="checkbox" />
                <label for="checkbox01"><span>Check me</span></label>
            </div> <!-- /checkbox -->

            <div class="radio radio-purple">
                <input id="male" type="radio" name="gender" value="male">
                <label for="male"><span>Male</span></label>
            </div> <!-- /radio -->            

            <div class="radio radio-red">
                <input id="female" type="radio" name="gender" value="female">
                <label for="female"><span>Female</span></label>
            </div> <!-- /radio -->

            <button type="submit" class="btn btn-md bg-purple"><span>Submit</span></button>

            </form> <!-- /form -->

            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
    
    <!-- //////////////////////////////////////////////////// Horizontal Forms -->
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3>Horizontal Forms</h3>
                <p class="text-muted">Use Bootstrap's predefined grid classes to align labels and groups of form controls in a horizontal layout by adding <code>.form-horizontal</code> to the form (which doesn't have to be a <code>&lt;form&gt;</code>). Doing so changes <code>.form-group</code>s to behave as grid rows, so no need for <code>.row</code>.</p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">

            <form class="form-horizontal">
            
            <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10"><input type="text" class="form-control" id="name2" placeholder="Jane Doe"></div>
            </div> <!-- /form-group -->

            <div class="form-group">
                <label for="email2" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10"><input type="email" class="form-control" id="email2" placeholder="Email"></div>
            </div> <!-- /form-group -->

            <div class="form-group">
                <label for="password2" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" id="password2" placeholder="Password"></div>
            </div> <!-- /form-group -->

            <div class="form-group">
                <label for="inputHelpBlock2" class="col-sm-2 control-label">Input with help text</label>
                <div class="col-sm-10">
                    <input type="text" id="inputHelpBlock2" class="form-control" aria-describedby="helpBlock" placeholder="Input with help text">
                    <div id="helpBlock2" class="help-block">
                        <p>A block of help text that breaks onto a new line and may extend beyond one line.</p>
                    </div> <!-- /help-block -->
                </div> <!-- /col -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label for="readOnlyInput2" class="col-sm-2 control-label">Readonly input</label>
                <div class="col-sm-10">
                    <input id="readOnlyInput2" class="form-control" type="text" placeholder="Readonly input here???" readonly>
                </div> <!-- /col -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="col-sm-2 control-label">Textarea</label>
                <div class="col-sm-10"><textarea class="form-control" rows="10" placeholder="Your Text"></textarea></div>
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="col-sm-2 control-label">Example: Select</label>
                <div class="col-sm-10">
                <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select> <!-- /form-control -->
                </div> <!-- /col -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="col-sm-2 control-label">Example: Multiple Select</label>
                <div class="col-sm-10">
                <select multiple class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select> <!-- multiple /form-control -->
                </div> <!-- /col -->
            </div> <!-- /form-group -->

            <div class="form-group m-b-0">
                <div class="col-sm-offset-2 col-sm-10">
                <label class="btn-bs-file btn btn-md bg-purple"> <span>Browse File</span>
                    <input type="file" />
                </label>
                <p class="help-block">Example block-level help text here.</p>
                </div> <!-- /col -->
            </div> <!-- /form-group -->
           
            <div class="form-group m-b-0">
                <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox checkbox-purple">   
                    <input id="checkbox2" class="check" type="checkbox" />
                    <label for="checkbox2"><span>Check me</span></label>
                </div> <!-- /checkbox -->
                </div> <!-- /col -->
            </div> <!-- /form-group -->

            <div class="form-group m-b-0">
                <div class="col-sm-offset-2 col-sm-10">
                <div class="radio radio-purple">
                    <input id="male2" type="radio" name="gender" value="male">
                    <label for="male2"><span>Male</span></label>
                </div> <!-- /radio --> 
                </div> <!-- /col -->    
            </div> <!-- /form-group -->       
            
            <div class="form-group m-t-0">              
                <div class="col-sm-offset-2 col-sm-10">
                <div class="radio radio-red">
                    <input id="female2" type="radio" name="gender" value="female">
                    <label for="female2"><span>Female</span></label>
                </div> <!-- /radio -->
                </div> <!-- /col -->
            </div> <!-- /form-group -->

            <div class="col-sm-offset-2 col-sm-10 no-padding">
                <button type="submit" class="btn btn-md bg-purple"><span>Submit</span></button>
            </div> <!-- /col -->

            </form> <!-- /form-horizontal -->

            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->

</div> <!-- /row -->


<div class="row">

        <!-- //////////////////////////////////////////////////// Disable Forms -->
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Disable Forms</h3>
                    <p class="text-muted">Add the <code>disabled</code> boolean attribute on an input to prevent user interactions. Disabled inputs appear lighter and add a <code>not-allowed</code> cursor.</p>
                </div> <!-- /panel-heading -->
                <div class="panel-body m-t-10">
                <form>
                    <fieldset disabled> 
                    <div class="form-group">
                        <label for="disabledTextInput">Disabled input</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                    </div> <!-- /form-group -->
                    <div class="form-group">
                        <label for="disabledSelect">Disabled select menu</label>
                        <select id="disabledSelect" class="form-control">
                            <option>Disabled select</option>
                        </select> <!-- /form-control -->
                    </div> <!-- /form-group -->
                    <div class="checkbox checkbox-purple">   
                        <input id="checkbox02" class="check" type="checkbox" />
                        <label for="checkbox02"><span>Check me</span></label>
                    </div> <!-- /checkbox -->
                    <button type="submit" class="btn btn-md bg-purple"><span>Submit</span></button>
                    </fieldset> <!-- /disabled -->
                </form>
                </div> <!-- /panel-body -->
            </div> <!-- /panel -->
        </div> <!-- /col -->

        <!-- //////////////////////////////////////////////////// Inline Forms -->
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Inline Forms</h3>
                    <p class="text-muted">Add <code>.form-inline</code> to your form (which doesn't have to be a <code>&lt;form&gt;</code>) for left-aligned and inline-block controls.</p>
                </div> <!-- /panel-heading -->

                <div class="panel-body">
                <form class="form-inline">
                    <div class="form-group">
                    <label class="sr-only" for="amount">Amount (in dollars)</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" class="form-control" id="amount" placeholder="Amount">
                            <div class="input-group-addon">.00</div>
                        </div> <!-- /input-group -->
                    </div> <!-- /form-group -->
                    <button type="submit" class="btn btn-sm bg-purple m-l-10"><span>Transfer cash</span></button>
                </form> <!-- /form-inline -->
                </div> <!-- /panel-body -->

                <div class="panel-body">
                <form class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="email4">Email address</label>
                        <input type="email" class="form-control" id="email4" placeholder="Email">
                    </div> <!-- /form-group -->
                    <div class="form-group m-l-10">
                        <label class="sr-only" for="password4">Password</label>
                        <input type="password" class="form-control" id="password4" placeholder="Password">
                    </div> <!-- /form-group -->
                    <div class="checkbox checkbox-purple">   
                        <input id="checkbox03" class="check" type="checkbox" />
                        <label for="checkbox03"><span class="m-l-20">Check me</span></label>
                    </div> <!-- /checkbox -->
                    <button type="submit" class="btn btn-sm bg-purple m-l-10"> <span>Sign in</span></button>
                </form> <!-- /form-inline -->
                </div> <!-- /panel-body -->

                <div class="panel-body">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="email3">Email address</label>
                        <input type="email" class="form-control m-l-10" id="email3" placeholder="Email">
                    </div> <!-- /form-group -->
                    <div class="form-group m-l-10">
                        <label for="password3">Password</label>
                        <input type="password" class="form-control m-l-10" id="password3" placeholder="Password">
                    </div> <!-- /form-group -->
                    <button type="submit" class="btn btn-sm bg-purple m-l-10"><span>Submit</span></button>
                </form> <!-- /form-inline -->
                </div> <!-- /panel-body -->

            </div> <!-- /panel -->
        </div> <!-- /col -->

</div> <!-- /row -->

<div class="row">
        
        <!-- //////////////////////////////////////////////////// Control sizing -->
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Control sizing</h3>
                    <p class="text-muted">Set heights using classes like <code>.input-lg</code>, and set widths using grid column classes like <code>.col-lg-*</code>.</p>
                </div> <!-- /panel-heading -->
                <div class="panel-body">
                    <input class="form-control input-lg" type="text" placeholder=".input-lg">
                    <input class="form-control m-t-10" type="text" placeholder="Default input">
                    <input class="form-control input-sm m-t-10" type="text" placeholder=".input-sm">

                    <select class="form-control input-lg m-t-10">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                    </select>
                    <select class="form-control m-t-10">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                    </select>
                    <select class="form-control input-sm m-t-10">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                    </select>
                </div> <!-- /panel-body -->
                
                <div class="panel-body m-t-0">
                <form class="form-horizontal">

                    <div class="form-group form-group-lg ">
                        <label class="col-sm-2 control-label" for="formGroupInputLarge">Large label</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="formGroupInputLarge" placeholder="Large input">
                        </div>  <!-- /col -->
                    </div> <!-- /form-group -->

                    <div class="form-group form-group-sm">
                            <label class="col-sm-2 control-label" for="formGroupInputSmall">Small label</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Small input">
                        </div>  <!-- /col -->
                    </div> <!-- /form-group -->

                </form>  <!-- /form-horizontal -->
                </div> <!-- /panel-body -->

            </div> <!-- /panel -->
        </div> <!-- /col -->

        <!-- //////////////////////////////////////////////////// Basic Validation States -->
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

        <div class="panel">

            <div class="panel-heading">
                <h3>Basic Validation states</h3>
                <p class="text-muted">Bootstrap includes validation styles for error, warning, and success states on form controls. To use, add <code>.has-warning</code>, <code>.has-error</code>, or <code>.has-success</code> to the parent element.</p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">

                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess1">Input with success</label>
                    <input type="text" class="form-control" id="inputSuccess1" aria-describedby="helpBlock4">
                    <span id="helpBlock4" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                </div> <!-- /form group has-succes -->

                <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning1">Input with warning</label>
                    <input type="text" class="form-control" id="inputWarning1">
                    <span id="helpBlock5" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                </div> <!-- /form group has-warning -->

                <div class="form-group has-error">
                    <label class="control-label" for="inputError1">Input with error</label>
                    <input type="text" class="form-control" id="inputError1">
                    <span id="helpBlock6" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                </div> <!-- /form group has-error -->

                <div class="has-success">
                  <div class="checkbox checkbox-green">   
                        <input id="checkboxSuccess" class="check" type="checkbox" />
                        <label for="checkboxSuccess">Check me</label>
                    </div> <!-- /checkbox -->
                </div> <!-- /has-succes -->

                <div class="has-warning">
                    <div class="checkbox checkbox-yellow">   
                        <input id="checkboxWarning" class="check" type="checkbox" />
                        <label for="checkboxWarning">Check me</label>
                    </div> <!-- /checkbox -->
                </div> <!-- /has-warning -->

                <div class="has-error">
                    <div class="checkbox checkbox-red">   
                        <input id="checkboxError" class="check" type="checkbox" />
                        <label for="checkboxError">Check me</label>
                    </div> <!-- /checkbox -->
                </div> <!-- /has-error -->

            </div> <!-- /panel-body -->
            </div>
            </div>
</div> <!-- /row -->

<div class="row">

    <!-- //////////////////////////////////////////////////// Inpout Group -->
    <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="panel">

            <div class="panel-heading">
                <h3>Inpout Group</h3>
                <p class="text-muted">Extend form controls by adding text or buttons before, after, or on both sides of any text-based <code>&lt;input&gt;</code>. Use <code>.input-group</code> with an <code>.input-group-addon</code> or <code>.input-group-btn</code> to prepend or append elements to a single <code>.form-control</code>.</p>
            </div> <!-- /panel-heading -->
            <div class="panel-body">

                <div class="input-group">
                    <span class="input-group-addon bg-p" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                </div> <!-- /input-group -->

                <div class="input-group m-t-20">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-addon bg-p" id="basic-addon2">@example.com</span>
                </div> <!-- /input-group -->

                <div class="input-group m-t-20">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-sm bg-purple dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Action</span> <i class="fa fa-caret-down" aria-hidden="true"></i></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul> <!-- /dropdown-menu -->
                </div><!-- /btn-group -->
                    <input type="text" class="form-control" aria-label="" placeholder="text...">
                </div><!-- /input-group -->

                <div class="input-group m-t-20">
                    <span class="input-group-addon bg-purple">$</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Price">
                    <span class="input-group-addon bg-purple">.00</span>
                </div> <!-- /input-group -->

                <div class="input-group m-t-20">
                    <span class="input-group-addon bg-purple" id="basic-addon3">https://example.com/users/</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="text...">
                </div> <!-- /input-group -->

                 <div class="input-group dropup m-t-20"> 
                    <input class="form-control" aria-label="Text input with segmented button dropdown" placeholder="text..."> 
                    <div class="input-group-btn"> 
                        <button type="button" class="btn btn-sm bg-purple"><span>Action</span></button> 
                        <button type="button" class="btn btn-sm bg-purple dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-caret-up" aria-hidden="true"></i> <span class="sr-only">Toggle Dropdown</span> </button> 
                        <ul class="dropdown-menu dropdown-menu-right"> 
                            <li><a href="#">Action</a></li> 
                            <li><a href="#">Another action</a></li> 
                            <li><a href="#">Something else here</a></li> 
                            <li role="separator" class="divider"></li> 
                            <li><a href="#">Separated link</a></li> 
                        </ul> <!-- /dropdown-menu -->
                    </div> <!-- /input-group-btn --> 
                </div> <!-- /input-group -->

            </div> <!-- /panel-body -->

        </div> <!-- /panel -->

    </div> <!-- /col -->

</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<div class="row">
    <footer>
      <div id="credits">
        <div class="col-xs-12">  
        <p> Copyright?? 2016 Develop by Zwolek. All Rights Reserved.</p>
        </div> <!-- /col-sm-12 -->
      </div> <!-- /credits -->
    </footer> <!-- /footer-->
</div> <!-- /row -->

</div> <!-- /container-fluid -->
</div> <!-- /content-panel -->

<!-- /////////////////////////////// Scripts /////////////////////////////// -->  
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Offline jQuery script -->  
<!-- <script  type="text/javascript" src="jquery.min"></script>  -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script  type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Menu Script -->
<script  type="text/javascript" src="js/menu/metisMenu.min.js"></script>
<script type="text/javascript" src="js/menu/nanoscroller.js"></script>
<!-- Custom scripts -->
<script  type="text/javascript" src="js/jquery-functions.js"></script>

</body>


<!-- Mirrored from website.y0.pl/preview/master/011/pages/basic-forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Nov 2016 04:57:43 GMT -->
</html>
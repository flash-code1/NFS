<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/logo/NSMT_small.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>NSMT - <?php echo $web_title; ?></title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/date-picker.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <!-- MAP -->
   
    <!-- GOOGLE -->
  </head>
  <body onload="startTime()">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-main-header">
        <div class="main-header-right row m-0">
          <form class="form-inline search-full" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
          <div class="main-header-left">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
          </div>
          <div class="left-menu-header col horizontal-wrapper pl-0">
            <!-- <ul class="horizontal-menu">
              <li class="mega-menu"><a class="nav-link" href="#"><i data-feather="layers"></i><span>Promo</span></a>
                <div class="mega-menu-container menu-content">
                  <div class="container-fluid">
                    <div class="row">
                    </div>
                  </div>
                </div>
              </li>
            </ul> -->
          </div>
          <div class="nav-right col-8 pull-right right-menu">
            <ul class="nav-menus">
              <!-- <li class="language-nav">
                <div class="translate_wrapper">
                  <div class="current_lang">
                    <div class="lang"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">EN                               </span></div>
                  </div>
                  <div class="more_lang">
                    <div class="lang selected" data-value="en"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">English<span> (US)</span></span></div>
                    <div class="lang" data-value="de"><i class="flag-icon flag-icon-de"></i><span class="lang-txt">Deutsch</span></div>
                    <div class="lang" data-value="es"><i class="flag-icon flag-icon-es"></i><span class="lang-txt">Español</span></div>
                    <div class="lang" data-value="fr"><i class="flag-icon flag-icon-fr"></i><span class="lang-txt">Français</span></div>
                    <div class="lang" data-value="pt"><i class="flag-icon flag-icon-pt"></i><span class="lang-txt">Português<span> (BR)</span></span></div>
                    <div class="lang" data-value="cn"><i class="flag-icon flag-icon-cn"></i><span class="lang-txt">简体中文</span></div>
                    <div class="lang" data-value="ae"><i class="flag-icon flag-icon-ae"></i><span class="lang-txt">لعربية <span> (ae)</span></span></div>
                  </div>
                </div>
              </li> -->
              <!-- <li>                         <span class="header-search"><i data-feather="search"></i></span></li> -->
              <li class="onhover-dropdown">
                <div class="notification-box"><i data-feather="bell"></i><span class="badge badge-pill badge-secondary">4</span></div>
                <ul class="notification-dropdown onhover-show-div">
                  <li class="bg-primary">
                    <h6 class="f-18 mb-0">Notitication</h6>
                    <p class="mb-0">You have 4 new notification</p>
                  </li>
                  <li>
                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-primary"> </i>Delivery processing <span class="pull-right">10 min.</span></p>
                  </li>
                  <li>
                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-success"></i>Order Complete<span class="pull-right">1 hr</span></p>
                  </li>
                  <li>
                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-info"></i>Tickets Generated<span class="pull-right">3 hr</span></p>
                  </li>
                  <li>
                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-danger"></i>Delivery Complete<span class="pull-right">6 hr</span></p>
                  </li>
                  <li><a class="btn btn-primary" href="#">Check all notification</a>
                    <!--a.f-15.f-w-500.txt-dark(href="#") Check all notification-->
                  </li>
                </ul>
              </li>
              <li>
                <div class="mode"><i class="fa fa-moon-o"></i></div>
              </li>
            
              <!-- <li class="onhover-dropdown"><i data-feather="message-square"></i> -->
                <!-- <ul class="chat-dropdown onhover-show-div">
                  <li class="bg-primary text-center">
                    <h6 class="f-18 mb-0">Message Box</h6>
                    <p class="mb-0">You have 3 new messages </p>
                  </li>
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle mr-3" src="../assets/images/user/1.jpg" alt="">
                      <div class="status-circle online"></div>
                      <div class="media-body"><span>Erica Hughes</span>
                        <p>Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12 font-success">58 mins ago</p>
                    </div>
                  </li>
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle mr-3" src="../assets/images/user/2.jpg" alt="">
                      <div class="status-circle online"></div>
                      <div class="media-body"><span>Kori Thomas</span>
                        <p>Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12 font-success">1 hr ago</p>
                    </div>
                  </li>
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle mr-3" src="../assets/images/user/4.jpg" alt="">
                      <div class="status-circle offline"></div>
                      <div class="media-body"><span>Ain Chavez</span>
                        <p>Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12 font-danger">32 mins ago</p>
                    </div>
                  </li>
                  <li class="text-center"> <a class="btn btn-primary" href="#">View All     </a></li>
                </ul> -->
              </li>
              <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="profile-nav onhover-dropdown p-0">
                <div class="media profile-media"><img class="b-r-10" src="../assets/images/dashboard/profile.jpg" alt="">
                  <div class="media-body"><span>name_of_user</span>
                    <p class="mb-0 font-roboto">Director <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><i data-feather="user"></i><span>Account </span></li>
                  <li><i data-feather="mail"></i><span>Notification</span></li>
                  <!-- <li><i data-feather="file-text"></i><span>Taskboard</span></li> -->
                  <!-- <li><i data-feather="settings"></i><span>Settings</span></li> -->
                  <li><i data-feather="log-in"> </i><span>Log out</span></li>
                </ul>
              </li>
            </ul>
          </div>
          <script id="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
          <script id="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
            <center>
          <div class="logo-wrapper"><a href="index.php"><img class="img-fluid for-light" src="../assets/images/logo/NSMT_large.png" height="100" width="100" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/NSMT_large.png" height="100" width="100" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="index.php"><img class="img-fluid" src="../assets/images/logo/NSMT_large.png" alt=""></a></div>
          </center>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
                    <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-title">
                    <div>
                      <h6 class="">NSMT</h6>
                      <p class="">Track Student Payment</p>
                    </div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather=""></i><span class="">Dashboard</span>
                      <label class="badge badge-success">1</label></a>
                    <ul class="nav-submenu menu-content">
                      <li><a class="" href="index.php">Finance Report</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather=""></i><span class="">Customer Service</span>
                      <label class="badge badge-success">2</label></a>
                    <ul class="nav-submenu menu-content">
                      <li><a class="" href="#">Students</a></li>
                      <li><a class="" href="#">Enquiry</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather=""></i><span class="">Transaction</span>
                      <label class="badge badge-success">1</label></a>
                    <ul class="nav-submenu menu-content">
                      <li><a class="" href="#">Fees Payment</a></li>
                      <!-- <li><a class="" href="#">Card Track</a></li> -->
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather=""></i><span class="">Approval</span>
                      <label class="badge badge-success">2</label></a>
                    <ul class="nav-submenu menu-content">
                      <li><a class="" href="#">Fees Payment</a></li>
                      <li><a class="" href="#">Students</a></li>
                      <!-- <li><a class="" href="index.php">Card Track</a></li> -->
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather=""></i><span class="">Reports</span>
                      <label class="badge badge-success">2</label></a>
                    <ul class="nav-submenu menu-content">
                      <li><a class="" href="#">Fees Payment</a></li>
                      <li><a class="" href="#">Student List</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather=""></i><span class="">Configuration</span>
                      <label class="badge badge-success">2</label></a>
                    <ul class="nav-submenu menu-content">
                      <!-- <li><a class="" href="#">Payment Product</a></li>
                      <li><a class="" href="#">Payment Category</a></li>-->
                      <li><a class="" href="institution_manager.php">Institution Management</a></li>
                      <li><a class="" href="payment_system.php">Payment system</a></li>
                    </ul>
                  </li>
                  <!-- <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span class="lan-6">Widgets</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="general-widget.html">General</a></li>
                      <li><a href="chart-widget.html">Chart</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
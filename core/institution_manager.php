<?php
$web_title = "Manage Institution";
include("header.php");
?>
<!-- This page is like a route for managing institution structure -->
       <!-- Page Sidebar Ends-->
       <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-6">
                  <h3>Institution Managment</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Routes</li>
                  </ol>
                </div>
                <div class="col-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark pull-right">
                    <ul>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                      <li><a href="#"><i class="bookmark-search" data-feather="star"></i></a>
                        <form class="form-inline search-form" action="#" method="get">
                          <div class="form-group form-control-search">
                            <div class="Typeahead Typeahead--twitterUsers">
                              <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search.." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div>
                              </div>
                              <div class="Typeahead-menu"></div>
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
                        </form>
                      </li>
                    </ul>
                  </div>
                  <!-- Bookmark Ends-->
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 md-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="blog-box blog-list row">
                        <div class="col-sm-5"><img class="img-fluid sm-50-w" src="../assets/images/route_image/branch.png" alt=""></div>
                        <div class="col-sm-7">
                          <div class="blog-details">
                            <div class="blog-date digits"> <b>Branch</b> Management</div>
                            <br>
                                   <!-- button to create -->
                    <button onclick="window.open ('branch_management.php')" style="float: right;" class="btn btn-pill btn-dark btn-air-dark btn-dark-gradien" type="button">Manage Branch</button>
                    <!-- end button -->
                    <br>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="card">
                      <div class="blog-box blog-list row">
                        <div class="col-sm-5"><img class="img-fluid sm-50-w" src="../assets/images/route_image/role.svg" alt=""></div>
                        <div class="col-sm-7">
                          <div class="blog-details">
                            <div class="blog-date digits"><b>Role & Permission</b> Management</div>
                            <br>
                                   <!-- button to create -->
                    <button onclick="window.open ('role_management.php')" style="float: right;" class="btn btn-pill btn-dark btn-air-dark btn-dark-gradien" type="button">Manage Roles</button>
                    <!-- end button -->
                    <br>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                      <div class="blog-box blog-list row">
                        <div class="col-sm-5"><img class="img-fluid sm-50-w" src="../assets/images/route_image/usern.svg" alt=""></div>
                        <div class="col-sm-7">
                          <div class="blog-details">
                            <div class="blog-date digits"><b>Staff</b> Management</div>
                            <br>
                                   <!-- button to create -->
                    <button onclick="window.open ('staff_management.php')" style="float: right;" class="btn btn-pill btn-dark btn-air-dark btn-dark-gradien" type="button">Manage Staff</button>
                    <!-- end button -->
                    <br>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                      <div class="blog-box blog-list row">
                        <div class="col-sm-5"><img class="img-fluid sm-50-w" src="../assets/images/route_image/courses.png" alt=""></div>
                        <div class="col-sm-7">
                          <div class="blog-details">
                            <div class="blog-date digits"><b>Course</b> Management</div>
                            <br>
                                   <!-- button to create -->
                    <button onclick="window.open ('course_management.php')" style="float: right;" class="btn btn-pill btn-dark btn-air-dark btn-dark-gradien" type="button">Manage Course</button>
                    <!-- end button -->
                            <br>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-xl-4 xl-50 col-sm-6 box-col-6">
                    <div class="card">
                      <div class="blog-box blog-grid text-center product-box">
                        <div class="product-img"><img class="img-fluid top-radius-blog" src="../assets/images/faq/2.jpg" alt="">
                          <div class="product-hover">
                            <ul>
                              <li><i class="icon-link"></i></li>
                              <li><i class="icon-import"></i></li>
                            </ul>
                          </div>
                        </div>
                        <div class="blog-details-main">
                          <ul class="blog-social">
                            <li class="digits">9 April 2018</li>
                            <li class="digits">by: Admin</li>
                            <li class="digits">0 Hits</li>
                          </ul>
                          <hr>
                          <h6 class="blog-bottom-details">Perspiciatis unde omnis iste natus error sit.Dummy text</h6>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="col-xl-4 xl-50 col-sm-6 box-col-6">
                    <div class="card">
                      <div class="blog-box blog-grid text-center product-box">
                        <div class="product-img"><img class="img-fluid top-radius-blog" src="../assets/images/faq/4.jpg" alt="">
                          <div class="product-hover">
                            <ul>
                              <li><i class="icon-link"></i></li>
                              <li><i class="icon-import"></i></li>
                            </ul>
                          </div>
                        </div>
                        <div class="blog-details-main">
                          <ul class="blog-social">
                            <li class="digits">9 April 2018</li>
                            <li class="digits">by: Admin</li>
                            <li class="digits">0 Hits</li>
                          </ul>
                          <hr>
                          <h6 class="blog-bottom-details">Perspiciatis unde omnis iste natus error sit.Dummy text</h6>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="col-xl-4 xl-50 col-sm-6 box-col-6">
                    <div class="card">
                      <div class="blog-box blog-grid text-center product-box">
                        <div class="product-img"><img class="img-fluid top-radius-blog" src="../assets/images/faq/3.jpg" alt="">
                          <div class="product-hover">
                            <ul>
                              <li><i class="icon-link"></i></li>
                              <li><i class="icon-import"></i></li>
                            </ul>
                          </div>
                        </div>
                        <div class="blog-details-main">
                          <ul class="blog-social">
                            <li class="digits">9 April 2018</li>
                            <li class="digits">by: Admin</li>
                            <li class="digits">0 Hits</li>
                          </ul>
                          <hr>
                          <h6 class="blog-bottom-details">Perspiciatis unde omnis iste natus error sit.Dummy text</h6>
                        </div>
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>


              <!-- end -->
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
<!-- end of route -->
<?php
include("footer.php");
?>
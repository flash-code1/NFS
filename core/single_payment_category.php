<?php
$web_title = "Payment Category";
include("header.php");
?>
<!-- make move -->
<link href='datatable/DataTables/datatables.min.css' rel='stylesheet' type='text/css'>
<script src="datatable/DataTables/datatables.min.js"></script>
<script src="datatable/jquery-3.3.1.min.js"></script>
<?php
if ($configuration == 1 && isset($_GET["course"]) && $_GET["course"] != ""){
    $course_id = $_GET["course"];

    // Display course details
    $get_course = mysqli_query($con, "SELECT * FROM `courses` WHERE id = '$course_id'");
    $gc = mysqli_fetch_array($get_course);
    $course_name = $gc["name"];
?>
<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-6">
                  <h3>Payment System</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="role_management.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">View Payment Categories</li>
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
              <!-- Server Side Processing start-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5><?php echo $course_name; ?></h5><span>This page help you view all the Payment Categories in <?php echo $gc["shortCode"] ?>.</span>
                    <!-- button to create -->
                    <button onclick="window.open ('create_payment_category.php')" style="float: right;" class="btn btn-pill btn-success btn-air-success btn-success-gradien" type="button">Create Category</button>
                    <!-- end button -->
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="" class="display nowrap dataTable">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Amount(₦)</th>
                            <th>createdDate</th>
                            <th>updatedDate</th>
                            <th>Status</th>
                            <th>Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query_cat = mysqli_query($con, "SELECT * FROM `payment_category` WHERE course_id = '$course_id'");
                            if (mysqli_num_rows($query_cat) > 0){
                                while ($row = mysqli_fetch_array($query_cat)) {
                            ?>
                            <tr>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["description"]; ?></td>
                                <td><?php echo number_format($row["price"], 2); ?></td>
                                <td><?php echo $row["createdAt"]; ?></td>
                                <td><?php echo $row["updatedAt"]; ?></td>
                                <td><?php if ($row["Enabled"] == "1") {
                                    echo "Active";
                                } else {
                                    echo "Not Active";
                                } ?></td>
                                <td><a href="#" class="btn btn-pill btn-dark btn-air-dark btn-dark-gradien" type="button">Edit</a></td>
                            </tr>
                            <?php
                                }
                            }else {
                                echo "<marquee ><b style='color:red;'>No Payment Category,  Please Create - <a href='create_payment_category.php'>CLICK ME</a></b></marquee>";
                            }
                            ?>
                        </tbody>
                        <!-- <tfoot>
                          <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                          </tr>
                        </tfoot> -->
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Server Side Processing end-->
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
<!-- end -->
<?php
} else 
{
  echo '<script type="text/javascript">
  $(document).ready(function(){
   swal.fire({
    type: "error",
    title: "User not Authorized",
    text: "you have not been approved to view this page or Wrong Data Passed",
   showConfirmButton: false,
    timer: 4000
    }).then(
    function (result) {
      history.go(-1);
    }
    )
    });
   </script>
  ';
}
include("footer.php");
?>
<?php
$web_title = "Student";
include("header.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $c_id = addslashes($_POST["c_id"]);
    $prod_id = addslashes($_POST["prod_id"]);
    $stud_no = addslashes($_POST["stud_no"]);
    $f_n = addslashes($_POST["f_n"]);
    $email = addslashes($_POST["email"]);
    $phone = addslashes($_POST["phone"]);
    $dob = addslashes($_POST["dob"]);
    $ad_date = addslashes($_POST["ad_date"]);
    $address = addslashes($_POST["address"]);

    // Make move
    $query_stud_check = mysqli_query($con, "SELECT * FROM `student` WHERE student_no = '$stud_no' OR email = '$email'");

    if(mysqli_num_rows($query_stud_check) <= 0) {
        $insert_student = mysqli_query($con, "INSERT INTO `student` (`course_id`, `product_id`, `student_no`, `email`, `fullname`, `phone`, `dob`, `address`, `admission_date`, `is_approved`) VALUES ('{$c_id}', '{$prod_id}', '{$stud_no}', '{$email}', '{$f_n}', '{$phone}', '{$dob}', '{$address}', '{$ad_date}', '0')");
    if ($insert_student) {
      echo '<script type="text/javascript">
        $(document).ready(function(){
            Swal.fire({
                type: "success",
                title: "Student Created",
                text: "Awaiting Approval",
                showConfirmButton: false,
                timer: 6000
            })
        });
        </script>
        ';
    } else {
      echo '<script type="text/javascript">
      $(document).ready(function(){
          Swal.fire({
              type: "error",
              title: "Creation Failed",
              text: "Code Bug",
              showConfirmButton: false,
              timer: 4000
          })
      });
      </script>
      ';
    }
    } else {
        echo '<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
            type: "error",
            title: "Student has been created",
            text: "Please check the student management page",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
    }
}
if ($customer_service == 1){
    
// function
function fill_branch($con)
{
    $bch = mysqli_query($con, "SELECT * FROM `courses` WHERE `courses`.`Enabled` = '1'");
    $output = '';
    while ($row = mysqli_fetch_array($bch)) {
        $output .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
    }
    return $output;
}
?>
<!-- this setion import the student view -->

<!-- Page Sidebar Ends-->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-6">
                  <h3>Student Management</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="staff_management.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Create Course</li>
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
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Create Student</h5><span>Please fill the form properly</span>
                  </div>
                  <div class="card-body">
                    <div class="stepwizard">
                      <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step"><a class="btn btn-primary" href="#step-1">1</a>
                          <p>Step 1</p>
                        </div>
                        <div class="stepwizard-step"><a class="btn btn-light" href="#step-4">2</a>
                          <p>Step 2</p>
                        </div>
                      </div>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                      <div class="setup-content" id="step-1">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                                <div class="form-group mb-3">
                                   <label class="control-label">Course</label>
                                   <select class="form-control" id="course_ch" name="c_id" required="required">
                                   <option value="">select a course</option>
                                  <?php echo fill_branch($con); ?>
                                    </select>
                                </div>
                                <div id="show_prod"></div>
                            <div class="form-group mb-3">
                              <label class="control-label">Student No.</label>
                              <input class="form-control" type="text" name="stud_no" placeholder="NS1700026" required="required">
                            </div>
                            <div class="form-group mb-3">
                              <label class="control-label">Fullname</label>
                              <input class="form-control" type="text" name="f_n" placeholder="Sam Joe" required="required">
                            </div>
                            <div class="form-group mb-3">
                              <label class="control-label">Email</label>
                              <input class="form-control" type="text" name="email" placeholder="Student@example.com" required="required">
                            </div>
                           
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                          </div>
                        </div>
                      </div>
                      <div class="setup-content" id="step-4">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                          <div class="form-group mb-3">
                                   <label class="control-label">Phone</label>
                                   <input type="number" class="form-control" name="phone" required="required">
                                </div>
                                <div class="form-group mb-3">
                                   <label class="control-label">DOB</label>
                                   <input type="date" class="form-control" name="dob" required="required">
                                </div>
                                <div class="form-group mb-3">
                                   <label class="control-label">Admission Date</label>
                                   <input type="date" class="form-control" name="ad_date" required="required">
                                </div>
                                <div class="form-group mb-3">
                              <label class="control-label">Address</label>
                              <textarea class="form-control" name="address" placeholder="..." required="required">
                              </textarea>
                            </div>
                                
                            <button class="btn btn-success pull-right" type="submit">Finish!</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends   blossom is awesome -->
        </div>
<!-- end student importation -->
<script>
    $(document).ready(function() {
        $('#course_ch').on("change", function() {
            var course_id = $(this).val();
            $.ajax({
                url: "ajax_function/SelectStudentProduct.php",
                method: "POST",
                data: {
                    course_id: course_id
                },
                success: function(data) {
                    $('#show_prod').html(data);
                }
            });
        });
    });
</script>
<?php
} else 
{
  echo '<script type="text/javascript">
  $(document).ready(function(){
   swal.fire({
    type: "error",
    title: "User not Authorized",
    text: "you have not been authorized to use this page",
   showConfirmButton: false,
    timer: 3000
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
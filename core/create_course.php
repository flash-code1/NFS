<?php
$web_title = "Create Course";
include("header.php");
?>
<!-- a new stuff -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $shortcode = mysqli_real_escape_string($con, $_POST['sch']);
  $desc = mysqli_real_escape_string($con, $_POST['desc']);
  $batch =  $_POST['byear'];
  $branch =  $_POST['bch'];
  $date_time = date('Y-m-d H:i:s');

  $query_branch_check = mysqli_query($con, "SELECT * FROM `courses` WHERE name = '$name' OR shortCode = '$shortcode'");
  
  if (mysqli_num_rows($query_branch_check) <= 0) {
    $insert_branch = mysqli_query($con, "INSERT INTO `courses` (`branch_id`, `name`, `shortCode`, `Description`, `batchYear`, `createdAt`, `UpdatedAt`, `Enabled`) VALUES ('{$branch}', '{$name}', '{$shortcode}', '{$desc}', '{$batch}', '{$date_time}', '{$date_time}', '1')");
    if ($insert_branch) {
      echo '<script type="text/javascript">
        $(document).ready(function(){
            Swal.fire({
                type: "success",
                title: "Course Created",
                text: "Thank you!",
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
            title: "Course Name or Short Code Exist",
            text: "You cant create same course twice",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
  }
}

// function
function fill_branch($con)
{
    $bch = mysqli_query($con, "SELECT * FROM `branch`");
    $output = '';
    while ($row = mysqli_fetch_array($bch)) {
        $output .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
    }
    return $output;
}
?>
<!-- Page Sidebar Ends-->
<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-6">
                  <h3>Course Management</h3>
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
                    <h5>Create Course</h5><span>Please fill the form properly</span>
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
                              <label class="control-label">Name</label>
                              <input class="form-control" type="text" name="name" placeholder="National Diploma" required="required">
                            </div>
                            <div class="form-group mb-3">
                              <label class="control-label">ShortCode</label>
                              <input class="form-control" type="text" name="sch" placeholder="ND" required="required">
                            </div>
                            <div class="form-group mb-3">
                              <label class="control-label">Description</label>
                              <textarea class="form-control" name="desc" placeholder="ND" required="required">
                              </textarea>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                          </div>
                        </div>
                      </div>
                      <div class="setup-content" id="step-4">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                                <div class="form-group mb-3">
                                   <label class="control-label">Batch Year</label>
                                   <input type="date" class="form-control" name="byear" required="required">
                                </div>
                                <div class="form-group mb-3">
                                   <label class="control-label">Branch</label>
                                   <select class="form-control" name="bch" required="required">
                                  <?php echo fill_branch($con); ?>
                                    </select>
                                </div>
                                <!-- end it here -->
                            <!-- <div class="form-group mb-3">
                              <label class="control-label">City</label>
                              <input class="form-control mt-1" type="text" placeholder="City" required="required">
                            </div> -->
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
          <!-- Container-fluid Ends-->
        </div>
<?php
include("footer.php");
?>
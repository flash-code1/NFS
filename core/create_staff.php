<?php
$web_title = "Create Staff";
include("header.php");

?>
<!-- a new stuff -->
<?php
require_once "../bat/phpmailer/PHPMailerAutoload.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fn = mysqli_real_escape_string($con, $_POST['fn']);
  $ln = mysqli_real_escape_string($con, $_POST['ln']);
  $full = $fn." ".$ln;
  $em = mysqli_real_escape_string($con,$_POST['em']);
  $pass = $_POST['password'];
  $hash = password_hash($pass, PASSWORD_DEFAULT);
  $branch = $_POST['bch'];
  $org_role = $_POST['org'];
  $date_time = date('Y-m-d H:i:s');
  $ut = $_POST['usertype'];

  // Insert into users
  $res = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$em'");
  if (mysqli_num_rows($res) <= 0) {
    if ($em != "") {
      // insert into users
      $query_users = mysqli_query($con, "INSERT INTO `users` (`branch_id`, `role_id`, `fullname`, `email`, `password`, `usertype`, `last_logged`, `createdAt`, `updatedAt`, `Enabled`) VALUES ('{$branch}', '{$org_role}', '{$full}', '{$em}', '{$hash}', '{$ut}', '{$date_time}', '{$date_time}', '{$date_time}', '1')");

      if ($query_users) {
        // SEND UPDATE
           // echo msg email
           $gen_date = date('Y-m-d');
           // begining of mail
           $mail = new PHPMailer;
           // from email addreess and name
           $mail->From = "info@nspire.com.ng";
           $mail->FromName = "NSMT";
           // to adress and name
           $mail->addAddress($em, $fn);
           // reply address
           //Address to which recipient will reply
           // progressive html images
           $mail->addReplyTo("info@nspire.com.ng", "Reply");
           // CC and BCC
           //CC and BCC
           // $mail->addCC("cc@example.com");
           // $mail->addBCC("bcc@example.com");
           // Send HTML or Plain Text Email
           $mail->isHTML(true);
           $mail->Subject = "NSMT Welcome";
           $mail->Body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
           <html dir='ltr' xmlns='http://www.w3.org/1999/xhtml'>
           
           <head>
               <meta name='viewport' content='width=device-width' />
               <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
               <title>Application Successful</title>
           </head>
           
           <body style='margin:0px; background: #f8f8f8; '>
               <div width='100%' style='background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;'>
                   <div style='max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px'>
                       <table border='0' cellpadding='0' cellspacing='0' style='width: 100%; margin-bottom: 20px'>
                           <tbody>
                               <tr>
                                   <td style='vertical-align: top; padding-bottom:30px;' align='center'>
                                  Nspire School of Management and Technology
                                   </td>
                               </tr>
                           </tbody>
                       </table>
                       <table border='0' cellpadding='0' cellspacing='0' style='width: 100%;'>
                           <tbody>
                               <tr>
                                   <td style='background:#413e39; padding:20px; color:#fff; text-align:center;'> Nspire School of Management and Technology Registration Successful. </td>
                               </tr>
                           </tbody>
                       </table>
                       <div style='padding: 40px; background: #fff;'>
                           <table border='0' cellpadding='0' cellspacing='0' style='width: 100%;'>
                               <tbody>
                                   <tr>
                                       <td>
                                           <p>Submitted Date <b>$gen_date</b></p>
                                           <p>--Please Read Text Below--</p>
                                           <p>Find Below Your Login Credentials</p>
                                           <p>Username: $em</p>
                                           <p>Password: $pass</p>
                                           <center>
                                               <a href='https://www.anchorb-needle.com.ng/login.php' style='display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;'>Login</a>
                                           </center>
                                           <b>- Thanks</b> </td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                       <div style='text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px'>
                           <p> Powered by Nspire School of Management and Technology.
                               <br>
                               <a href='javascript: void(0);' style='color: #b2b2b5; text-decoration: underline;'>Unsubscribe</a> </p>
                       </div>
                   </div>
               </div>
           </body>
           
           </html>";
           $mail->AltBody = "This is the plain text version of the email content";
           // mail system
           if(!$mail->send()) 
           {
               echo "Mailer Error: " . $mail->ErrorInfo;
               echo '<script type="text/javascript">
  $(document).ready(function(){
      Swal.fire({
          type: "success",
          title: "Account Created",
          text: "Thank you!",
          showConfirmButton: false,
          timer: 6000
      })
  });
  </script>
  ';
           } else
           {
               echo "Message has been sent successfully";
               echo '<script type="text/javascript">
  $(document).ready(function(){
      Swal.fire({
          type: "success",
          title: "Account Created",
          text: "Thank you!",
          showConfirmButton: false,
          timer: 6000
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
                title: "Account Error",
                text: "User Creation Failed",
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
              title: "Registration Error",
              text: "Please input Value",
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
            title: "User Exist",
            text: "You cant create a user twice",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
  }
}

// functions for branch
function fill_branch($con)
{
    $bch = mysqli_query($con, "SELECT * FROM `branch`");
    $output = '';
    while ($row = mysqli_fetch_array($bch)) {
        $output .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
    }
    return $output;
}
// fill orgnization role
function fill_role($con)
{
    $rch = mysqli_query($con, "SELECT * FROM `role`");
    $output = '';
    while ($row = mysqli_fetch_array($rch)) {
        $output .= '<option value="' . $row["id"] . '">' . $row["title"] . '</option>';
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
                  <h3>Staff Management</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="staff_management.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Create Staff</li>
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
                    <h5>Create Staff</h5><span>Please fill the form properly</span>
                  </div>
                  <div class="card-body">
                    <div class="stepwizard">
                      <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step"><a class="btn btn-primary" href="#step-1">1</a>
                          <p>Step 1</p>
                        </div>
                        <div class="stepwizard-step"><a class="btn btn-light" href="#step-2">2</a>
                          <p>Step 2</p>
                        </div>
                        <div class="stepwizard-step"><a class="btn btn-light" href="#step-3">3</a>
                          <p>Step 3</p>
                        </div>
                        <div class="stepwizard-step"><a class="btn btn-light" href="#step-4">4</a>
                          <p>Step 4</p>
                        </div>
                      </div>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                      <div class="setup-content" id="step-1">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                            <div class="form-group mb-3">
                              <label class="control-label">First Name</label>
                              <input class="form-control" type="text" name="fn" placeholder="Samuel" required="required">
                            </div>
                            <div class="form-group mb-3">
                              <label class="control-label">Last Name</label>
                              <input class="form-control" type="text" name="ln" placeholder="Ajiboye" required="required">
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                          </div>
                        </div>
                      </div>
                      <div class="setup-content" id="step-2">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                            <div class="form-group mb-3">
                              <label class="control-label">Email</label>
                              <input class="form-control" type="text" name="em" placeholder="samuel@gmail.com" required="required">
                            </div>
                            <div class="form-group mb-3">
                              <label class="control-label">Password(Default - <b>Password1</b>)</label>
                              <input class="form-control" name="password" type="password" value="Password1" placeholder="Password" required="required">
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                          </div>
                        </div>
                      </div>
                      <div class="setup-content" id="step-3">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                            <div class="form-group mb-3">
                              <label class="control-label">Branch</label>
                              <select class="form-control" name="bch" required="required">
                                  <?php echo fill_branch($con); ?>
                              </select>
                            </div>
                            <div class="form-group mb-3">
                              <label class="control-label">Organization Role</label>
                              <select class="form-control" name="org" required="required">
                                  <?php echo fill_role($con); ?>
                              </select>
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                          </div>
                        </div>
                      </div>
                      <div class="setup-content" id="step-4">
                        <div class="col-xs-12">
                          <div class="col-md-12">
                            <div class="form-group mb-3">
                              <label class="control-label">Usertype</label>
                              <select class="form-control" name="usertype" required="required">
                                  <option value="admin">Admin</option>
                                  <option value="staff">Staff</option>
                              </select>
                            </div>
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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>NSMT Core</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="login/images/icons/"/> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
  <link rel="stylesheet" type="text/css" href="login/css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
<!--===============================================================================================-->
</head>
<?php

if (isset($_GET["success"])) {
  $succes = $_GET["success"];
  $success_length = strlen($succes);

  if ($success_length > 50) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        Swal.fire({
            type: "success",
            title: "Account Created",
            text: "Thank you!",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
  }
}
// // We are done
// // Initialize the session
session_start();
// YHA
$_SESSION['timestamp']=time();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  if($_SESSION["usertype"] == "admin"){
    header("location: core/index.php");
    exit;
  }
//   elseif($_SESSION["usertype"] == "staff"){
//       if($_SESSION["employee_status"] == "Employed"){
//         header("location: mfi/index.php");
//       }
//       elseif($_SESSION["employee_status"] == "Decommisioned"){
//         $err = "Sorry, you are not allowed to login";
//         $password = "";
//       }
//     exit;
//   }
}
 
// Include config file
require_once "function/db/config.php";
require_once "bat/phpmailer/PHPMailerAutoload.php";
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
$err = "";
// // Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter E-mail.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT  users.id,
                        users.email,
                        users.fullname, 
                        users.password,
                        users.usertype
                        FROM users
                        WHERE users.email = ?";
        // $sqlj = "SELECT users.id, users.int_id, users.username, users.fullname, users.usertype, users.password, org_role, display_name FROM staff JOIN users ON users.id = staff.user_id WHERE users.username = "sam"";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Set parameters
            $param_email = $email;

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $fullname,  $hashed_password, $usertype);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            session_regenerate_id();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["usertype"] = $usertype;
                            $_SESSION["fullname"] = $fullname;
                            $_SESSION["usertype"] = $usertype;
                            // $_SESSION["lastname"] = $lastname;
                            // mailin
                            // begining of mail
                            $mail = new PHPMailer;
                            // from email addreess and name
                            $mail->From = "info@nspire.com.ng";
                            $mail->FromName = "Nspire School of Management and Technology";
                            // to adress and name
                            $mail->addAddress($email, $fullname);
                            // reply address
                            //Address to which recipient will reply
                            // progressive html images
                            $mail->addReplyTo("info@nspire.com.ng", "Reply");
                            // CC and BCC
                            //CC and BCC
                            // $mail->addCC("cc@example.com");
                            $datetime = date('Y-m-d H:i:s');
                            // $mail->addBCC("bcc@example.com");
                            // Send HTML or Plain Text Email
                            $mail->isHTML(true);
                            $mail->Subject = "You Just Logged In $datetime";
                            $mail->Body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
                            <html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
                            
                            <head>
                                <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
                                <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
                                <meta name='viewport' content='width=device-width'>
                                <!--[if !mso]><!-->
                                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                                <!--<![endif]-->
                                <title></title>
                                <!--[if !mso]><!-->
                                <!--<![endif]-->
                                <style type='text/css'>
                                    body {
                                        margin: 0;
                                        padding: 0;
                                    }
                            
                                    table,
                                    td,
                                    tr {
                                        vertical-align: top;
                                        border-collapse: collapse;
                                    }
                            
                                    * {
                                        line-height: inherit;
                                    }
                            
                                    a[x-apple-data-detectors=true] {
                                        color: inherit !important;
                                        text-decoration: none !important;
                                    }
                                </style>
                                <style type='text/css' id='media-query'>
                                    @media (max-width: 520px) {
                            
                                        .block-grid,
                                        .col {
                                            min-width: 320px !important;
                                            max-width: 100% !important;
                                            display: block !important;
                                        }
                            
                                        .block-grid {
                                            width: 100% !important;
                                        }
                            
                                        .col {
                                            width: 100% !important;
                                        }
                            
                                        .col>div {
                                            margin: 0 auto;
                                        }
                            
                                        img.fullwidth,
                                        img.fullwidthOnMobile {
                                            max-width: 100% !important;
                                        }
                            
                                        .no-stack .col {
                                            min-width: 0 !important;
                                            display: table-cell !important;
                                        }
                            
                                        .no-stack.two-up .col {
                                            width: 50% !important;
                                        }
                            
                                        .no-stack .col.num4 {
                                            width: 33% !important;
                                        }
                            
                                        .no-stack .col.num8 {
                                            width: 66% !important;
                                        }
                            
                                        .no-stack .col.num4 {
                                            width: 33% !important;
                                        }
                            
                                        .no-stack .col.num3 {
                                            width: 25% !important;
                                        }
                            
                                        .no-stack .col.num6 {
                                            width: 50% !important;
                                        }
                            
                                        .no-stack .col.num9 {
                                            width: 75% !important;
                                        }
                            
                                        .video-block {
                                            max-width: none !important;
                                        }
                            
                                        .mobile_hide {
                                            min-height: 0px;
                                            max-height: 0px;
                                            max-width: 0px;
                                            display: none;
                                            overflow: hidden;
                                            font-size: 0px;
                                        }
                            
                                        .desktop_hide {
                                            display: block !important;
                                            max-height: none !important;
                                        }
                                    }
                                </style>
                            </head>
                            
                            <body class='clean-body' style='margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;'>
                                <!--[if IE]><div class='ie-browser'><![endif]-->
                                <table class='nl-container' style='table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;' cellpadding='0' cellspacing='0' role='presentation' width='100%' bgcolor='#FFFFFF' valign='top'>
                                    <tbody>
                                        <tr style='vertical-align: top;' valign='top'>
                                            <td style='word-break: break-word; vertical-align: top;' valign='top'>
                                                <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color:#FFFFFF'><![endif]-->
                                                <div style='background-color:transparent;'>
                                                    <div class='block-grid ' style='Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;'>
                                                        <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                                                            <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:500px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                                                            <!--[if (mso)|(IE)]><td align='center' width='500' style='background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                                                            <div class='col num12' style='min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;'>
                                                                <div style='width:100% !important;'>
                                                                    <!--[if (!mso)&(!IE)]><!-->
                                                                    <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                                                                        <!--<![endif]-->
                                                                        <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                                                                        <div style='color:#e7953f;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                                                                            <div style='line-height: 2; font-size: 12px; color: #e7953f; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 24px;'>
                                                                                <p style='font-size: 14px; line-height: 2; word-break: break-word; mso-line-height-alt: 28px; margin: 0;'><strong>Did You Just Logged In?</strong></p>
                                                                            </div>
                                                                        </div>
                                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                                        <table class='divider' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' role='presentation' valign='top'>
                                                                            <tbody>
                                                                                <tr style='vertical-align: top;' valign='top'>
                                                                                    <td class='divider_inner' style='word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;' valign='top'>
                                                                                        <table class='divider_content' border='0' cellpadding='0' cellspacing='0' width='100%' style='table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #C39F3C; height: 1px; width: 100%;' align='center' role='presentation' height='1' valign='top'>
                                                                                            <tbody>
                                                                                                <tr style='vertical-align: top;' valign='top'>
                                                                                                    <td style='word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' height='1' valign='top'><span></span></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--[if (IE)]></div><![endif]-->
                            </body>
                            
                            </html>
                            ";
                            $mail->AltBody = "This is the plain text version of the email content";
                            // mail system
                            if(!$mail->send()) 
                            {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } else
                            {
                                echo "Message has been sent successfully";
                            }
                            // end of mail
                            session_write_close();                            
                            //run a quick code to show active user
                            // Redirect user to welcome page
                            if ($stmt->num_rows ==1 && $_SESSION["usertype"]=="super"){
                                header("location: core/index.php");
                            //   header("location: ./mfi/admin/dashboard.php");
                            } else if ($stmt->num_rows ==1 && $_SESSION["usertype"]=="staff") {
                                header("location: core/index.php");
                            }
                            } else{
                              // Display an error message if password is not valid
                              $password_err = "The password you entered was not valid.";
                          }
                            
                        } 
                    
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = "No account found with that E-mail.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
  }


?>

<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/images/logo/NSMT_large.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<span class="login100-form-title">
						Login
          </span>
          
					<div class="wrap-input100 validate-input" data-validate = "Valid Email is required">

						<input class="input100" type="email" name="email" placeholder="E-mail">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
          </div>
		  <span class="help-block" style="color:red;"><?php 
		 echo $email_err; 
		  ?></span>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">

						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
          </div>
		  <span class="help-block" style="color:red;"><?php  
		  echo $password_err; 
		  ?></span>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Nspire School of Management and Technology
						</span>
						<!-- <a class="txt2" href="signup.php">
							Signup?
						</a> -->
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							All right reserved
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="login/vendor/tilt/tilt.jquery.min.js"></script>
  <script src="assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>
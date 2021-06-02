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
include("function/db/config.php");
// Include config file
require_once "bat/phpmailer/PHPMailerAutoload.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // import DB
$fn = mysqli_real_escape_string($con, $_POST["fullname"]);
$em = mysqli_real_escape_string($con, $_POST["email"]);
$pass = $_POST["password"];
$hash = password_hash($pass, PASSWORD_DEFAULT);
$ut = "admin";
$date_time = date('Y-m-d H:i:s');

$res = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$em'");
// check if it ex
if (mysqli_num_rows($res) <= 0) {
// proper
//  wow
    if ($em != "") {
        // add up
        // add branch, role and permission and users
        $select_branch = mysqli_query($con, "SELECT * FROM `branch` WHERE id = '1'");
        if (mysqli_num_rows($select_branch) <= 0){
        $query_branch = mysqli_query($con, "INSERT INTO `branch` (`id`, `name`, `location`, `Enabled`) VALUES ('1', 'Nspire Head office', 'Berger roundabout, old Arab contractor yard, Abuja', '1')");
        if ($query_branch) {
            $query_role = mysqli_query($con, "INSERT INTO `role` (`id`, `title`, `Description`, `createdAt`, `updatedAt`, `Enabled`) VALUES ('1', 'Super User', 'Control over the system', '{$date_time}', '{$date_time}', '1')");
            if ($query_role) {
                $query_permission = mysqli_query($con, "INSERT INTO `permission` (`id`, `role_id`, `dashboard`, `customer_service`, `transaction`, `approval`, `reports`, `configuration`) VALUES ('1', '1', '1', '1', '1', '1', '1', '1')");
            }
        }
        }
        $insert = mysqli_query($con, "INSERT INTO `users` (`branch_id`, `role_id`, `fullname`, `email`, `password`, `usertype`, `last_logged`, `createdAt`, `updatedAt`, `Enabled`) VALUES ('1', '1', '{$fn}', '{$em}', '{$hash}', 'super', '{$date_time}', '{$date_time}', '{$date_time}', '1')");
        if ($insert) {
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
            timer: 4000
        })
    });
    </script>
    ';
                 echo header ("Location: index.php?success='$hash'");
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
            timer: 4000
        })
    });
    </script>
    ';
                 echo header ("Location: login.php?success='$hash'");
             }
        } else {
            // echo account user not created
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
                 echo "Reg Error";
        // $_SESSION["Lack_of_intfund_$randms"] = "Registration Ex";
        // echo header ("Location: index.php?message3=$randms");
        // Echo Name Exist
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

// insert into client account
// done
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
						Signup
          </span>
          
					<div class="wrap-input100 validate-input" data-validate = "Valid username is required">

						<input class="input100" type="text" name="email" placeholder="E-mail">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
          </div>
          <!-- <div class="alert alert-success inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-up alert-center"></i>
                      <p><b> Well done! </b>You successfully read this important alert message.</p>
                      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div> -->

          <div class="wrap-input100 validate-input" data-validate = "Valid username is required">

						<input class="input100" type="text" name="fullname" placeholder="Fullname">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
          </div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">

						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
          </div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Signup
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Nspire School of Management and Technology.-
						</span>
						<a class="txt2" href="index.php">
							Login?
						</a>
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
    <script src="assets/js/height-equal.js"></script>
    <script src="assets/js/tooltip-init.js"></script>

    <!-- sweet alert -->
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
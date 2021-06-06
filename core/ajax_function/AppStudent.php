<?php
include('../../function/db/config.php');

if (isset($_GET["status"]) && isset($_GET["user"])) {
    $status = addslashes($_GET["status"]);
    $user = addslashes($_GET["user"]);

    if ($status == 1) {
        $query_student = mysqli_query($con, "SELECT * FROM `student` WHERE id = '$user'");
        $query_update = mysqli_query($con, "UPDATE `student` SET is_approved = '1' WHERE id = '$user'");
        
        if ($query_update) {
            // get information from product
            if (mysqli_num_rows($query_student) > 0) {
                $rowx = mysqli_fetch_array($query_student);
                $course_id = $rowx["course_id"];
                $product_id = $rowx["product_id"];

                // check to see if structure exist
                $query_student_structure = mysqli_query($con, "SELECT * FROM student_repayment_structure WHERE studentId = '$user'");

                if (mysqli_num_rows($query_student_structure) <= 0) {
                $query_repayment_st = mysqli_query($con, "SELECT * FROM `product_repayment_structure` WHERE productId = '$product_id'");
                if (mysqli_num_rows($query_repayment_st) > 0) {
                    while ($rox = mysqli_fetch_array($query_repayment_st)) {
                        $int_id = $rox["id"];
                        $paymentDue = $rox["paymentDue"];
                        $installment = $rox["installment"];
                        $due_amount = $rox["due_amount"];
                        $repaymentMonth = $rox["repaymentMonth"];
                        $isMandatory = $rox["isMandatory"];
                        $payment_status = $rox["payment_status"];
                        $description = $rox["description"];

                        // insert into table for student
                        $mysqli_query_student_install = mysqli_query($con, "INSERT INTO `student_repayment_structure` (`studentId`, `prs_id`, `productId`, `paymentDue`, `installment`, `due_amount`, `due_balance`, `repaymentMonth`, `isMandatory`, `payment_status`, `description`) VALUES ('{$user}', '{$int_id}', '{$product_id}', '{$paymentDue}', '{$installment}', '{$due_amount}', '0.00', '{$repaymentMonth}', '{$isMandatory}', '{$payment_status}', '{$description}')");

                        if ($mysqli_query_student_install) {
                            header("location: ../student_approve.php");
                        } else {
                            echo "WE COULDNT CREATE DATE: $int_id FOR THIS STUDENT INSTALLMENT - please screenshot";
                        }
                    }
                } else {
                    echo "COULDNT CREATE A REPAYMENT SCHEDULE FOR THIS STUDENT - please screenshot";
                }
                } else {
                    header("location: ../student_approve.php");
                }

                // query product installment structure table
            }
        // header("location: ../student_approve.php");
        }
    } else if ($status == 2) {
        $query_update = mysqli_query($con, "UPDATE `student` SET is_approved = '0' WHERE id = '$user'");
        if ($query_update) {
        header("location: ../student_approve.php");
        }
    } else {
        // Redirect to approval page
        header("location: ../student_approve.php");
    }
} else {
    // Redirect to approval page
    header("location: ../student_approve.php");
}
?>
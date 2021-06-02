<?php
include('../../function/db/config.php');

// check and sanitize
if (isset($_POST["id"]) && isset($_POST["amt_due"]) && isset($_POST["install"]) && isset($_POST["man"]) && $_POST["amt_due"] > -1 && $_POST["install"] > 0) {
    $id = $_POST["id"];
    $amt_due = addslashes($_POST["amt_due"]);
    $install = addslashes($_POST["install"]);
    $man = addslashes($_POST["man"]);

    // run the database here
    $query_check = mysqli_query($con, "SELECT * FROM `product_repayment_structure` WHERE id = '$id'");
    if (mysqli_num_rows($query_check) > 0) {
        $grs = mysqli_fetch_array($query_check);
        $due_amount = $grs["due_amount"];
        $installment = $grs["installment"];
        $isMandatory = $grs["isMandatory"];

        // check if the record match else update
        if ($due_amount == $amt_due && $installment == $install && $isMandatory == $man) {
            echo '<script type="text/javascript">
            $(document).ready(function(){
            swal.fire({
            type: "warning",
            title: "Already Saved",
            text: "Change value to update previous",
            showConfirmButton: false,
            timer: 2000
            })
            });
            </script>
            ';
        } else {
            // Update database
            $query_update_prod = mysqli_query($con, "UPDATE `product_repayment_structure` SET installment ='$install', due_amount = '$amt_due', isMandatory = '$man' WHERE id = '$id'");
            if ($query_update_prod) {
                echo '<script type="text/javascript">
            $(document).ready(function(){
             swal.fire({
              type: "success",
              title: "Module saved",
              text: "Amount Due: NGN '.number_format($amt_due, 2).' \n Installment: '.$install.'",
             showConfirmButton: false,
              timer: 2000
              })
              });
             </script>
            ';
            }
        }

    } else {
        echo '<script type="text/javascript">
    $(document).ready(function(){
     swal.fire({
      type: "error",
      title: "We cant match original id: '.$id.'",
      text: "This record cant be found in the database",
     showConfirmButton: false,
      timer: 2000
      })
      });
     </script>
    ';
    }
} else {
    echo "<b>No Data was sent</b>";
}
?>
<?php
$web_title = "Payment Product Settings";
include("header.php");
?>
<?php

if ($configuration == 1 && isset($_GET["conf"]) && $_GET["conf"] != ""){
?>
<!-- a new stuff -->
<?php
// get product info
  $conf = $_GET["conf"];
  // get product info
  $query_payment_product = mysqli_query($con, "SELECT * FROM `payment_product` WHERE id = '$conf'");

  if (mysqli_num_rows($query_payment_product) > 0) {
    $row = mysqli_fetch_array($query_payment_product);
    $userId = $row["userId"];
    $courseId = $row["courseId"];
    $name = $row["name"];
    $description = $row["description"];
    $fee_term = $row["fee_term"];
    $repayment_type = $row["repayment_type"];
    $startMonth = $row["startMonth"];
    $Enabled = $row["Enabled"];
  }

?>

<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-6">
                  <h3>Payment Product Settings</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="staff_management.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Product Configuration</li>
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
                    <h5><?php echo $name; ?></h5><span>Please configure payment settings <b class="primary">note: please click save button for each list</b> </span>
                  </div>
                  <div class="card-body">
                    <div class="stepwizard">
                      <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step"><a class="btn btn-primary" href="#step-4"></a>
                          <p> <b> Mandatory Payment (IF NO: auto over payment assigned) </b></p>
                        </div>
                      </div>
                    </div>

                      <div class="setup-content" id="step-4">
                      <div class="row">

                      <?php
                      $query_prod_installment = mysqli_query($con, "SELECT * FROM `product_repayment_structure` WHERE productId = '$conf'");
                      if (mysqli_num_rows($query_prod_installment) > 0) {
                        $rowss = 1;
                        while ($rowx = mysqli_fetch_array($query_prod_installment)) {
                        ?>
                          <div class="col-md-4">
                          <p> <b>Month #<?php echo $rowss." ". $rowx["repaymentMonth"]; ?></b> <br/> Due From: <?php echo $rowx["paymentDue"]; ?> </p>
                          <div class="form-group mb-3">
                              <label class="control-label">Amount Due (NGN):</label>
                              <input class="form-control" type="number" id="due_<?php echo $rowx["id"];?>" value="<?php echo number_format($rowx["due_amount"],2); ?>" placeholder="0.00" required="required">
                            </div>
                            <div class="form-group mb-3">
                              <label class="control-label">Installment(default: 1)</label>
                              <input class="form-control" type="number" id="installmen_<?php echo $rowx["id"];?>" value="<?php echo $rowx["installment"] ?>" placeholder="1" required="required">
                            </div>
                            <div class="form-group mb-3">
                              <label class="control-label">Mandatory Payment</label>
                              <select class="form-control" id="man_<?php echo $rowx["id"];?>" required="required">
                              <option value="<?php echo $rowx["isMandatory"] ?>"><?php if ($rowx["isMandatory"] == 1) {echo "YES";}else{echo"NO";} ?></option>
                              <option value="1">YES</option>
                              <option value="0">NO</option>
                              </select>
                            </div>
                            <div class="form-group mb-3">
                            <button id="l_check_<?php echo $rowx["id"];?>" data-product-id="<?php echo $rowx["id"]?>" class="btn btn-primary">Save</button>
                            </div>

                            <script>
                              $(document).ready(function() {
                                  $('#l_check_<?php echo $rowx["id"] ?>').on("click", function() {
                                      var id = $(this).data("product-id");
                                      var amt_due = $("#due_<?php echo $rowx["id"];?>").val();
                                      var install = $("#installmen_<?php echo $rowx["id"];?>").val();
                                      var man = $("#man_<?php echo $rowx["id"];?>").val();
                                      $.ajax({
                                          url: "ajax_function/singlePaymentProduct.php",
                                          method: "POST",
                                          data: {
                                              id: id,
                                              amt_due: amt_due,
                                              install: install,
                                              man: man
                                          },
                                          success: function(data) {
                                              $('#done_str').html(data);
                                          }
                                      });
                                  });
                              });
                          </script>

                          </div>

                         
                        <?php
                        $rowss ++;
                        }
                      } else {
                        echo "NO PAYMENT PRODUCTS";
                      }
                      ?>
                      <!-- result output -->
                      <div id="done_str"></div>
                      <!-- end result output -->
                      </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
<?php
} else 
{
  echo '<script type="text/javascript">
  $(document).ready(function(){
   swal.fire({
    type: "error",
    title: "User not Authorized",
    text: "you have not been approved to view this page",
   showConfirmButton: false,
    timer: 2000
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
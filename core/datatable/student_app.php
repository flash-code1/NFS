<?php
include 'config.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); // Search value

## Search 
$searchQuery = "";
if($searchValue != '') {
	$searchQuery = " AND (student_no like '%".$searchValue."%' OR email like '%".$searchValue."%' OR phone like '%".$searchValue."%' OR fullname like '%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from student");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from student WHERE 1 ".$searchQuery."");
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$staffQuery = "SELECT * FROM `student` WHERE 1 $searchQuery order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $staffQuery);
$data = array();
// echo $row;
// echo $rowperpage;
// echo $columnName." ";
// echo $columnSortOrder;
// if (mysqli_num_rows($empRecords) > 0) {
    while ($row = mysqli_fetch_assoc($empRecords)) {
        $c_id = $row["course_id"];
        $query_paycat = mysqli_query($con, "SELECT `courses`.`name` FROM `courses` WHERE id = '$c_id'");
        $gxt = mysqli_fetch_array($query_paycat);
        $course_name = $gxt["name"];
        // payment product
        $p_id = $row["product_id"];
        $query_payprod = mysqli_query($con, "SELECT `payment_product`.`name` FROM `payment_product` WHERE id = '$p_id'");
        $gpt = mysqli_fetch_array($query_payprod);
        $prod_name = $gpt["name"];
        // update the place
        $student_id = $row["id"];
        if ($row["is_approved"] == 1) {
            // Qwerty
            $status_warning = "danger";
            $status = "Disable";
            $code = 2;
        } else {
            $status_warning = "primary";
            $status = "Approve";
            $code = 1;
        }
        // end update
        $data[] = array(
                "student_no"=>strtoupper($row['student_no']),
                "course_id"=>strtoupper($course_name),
                "product_id"=> strtoupper($prod_name),
                "email"=> strtoupper($row["email"]),
                "fullname"=> strtoupper($row["fullname"]),
                "phone"=> strtoupper($row["phone"]),
                "dob"=> strtoupper($row["dob"]),
                "address"=> strtoupper($row["address"]),
                "admission_date"=> strtoupper($row["admission_date"]),
                "Status"=>"<a href='ajax_function/AppStudent.php?status=$code&user=$student_id' class='btn btn-pill btn-$status_warning btn-air-$status_warning btn-$status_warning-gradient' type='button'>$status</a>"
            );
    }
    
    ## Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );
    
    echo json_encode($response);
    
// } else {
//     echo "NO DATA";
// }
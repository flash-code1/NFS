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
$staffQuery = "SELECT * FROM `student` WHERE 1 $searchQuery AND is_approved = '1' order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
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
        $data[] = array(
                "StudentNo"=>strtoupper($row['student_no']),
                "Course"=>strtoupper($course_name),
                "PaymentProduct"=> strtoupper($prod_name),
                "Email"=> strtoupper($row["email"]),
                "Fullname"=> strtoupper($row["fullname"]),
                "Phone"=> strtoupper($row["phone"]),
                "DOB"=> strtoupper($row["fullname"]),
                "Address"=> strtoupper($row["address"]),
                "AdmissionDate"=> strtoupper($row["admission_date"]),
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
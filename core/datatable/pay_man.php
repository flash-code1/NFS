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
	$searchQuery = " AND (name like '%".$searchValue."%' or courseId like '%".$searchValue."%'
    or description like '%".$searchValue."%' or fee_term like '%".$searchValue."%' or repayment_type like '%".$searchValue."%'
    or installment like '%".$searchValue."%' or startMonth like '%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from payment_product");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from payment_product WHERE 1 ".$searchQuery."");
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$staffQuery = "SELECT payment_product.id, payment_product.name, payment_product.description, payment_product.fee_term, payment_product.repayment_type, payment_product.startMonth, courses.name AS course_name  FROM `payment_product` INNER JOIN `courses` ON payment_product.courseId = courses.id WHERE 1 $searchQuery order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $staffQuery);
$data = array();
// echo $row;
// echo $rowperpage;
// echo $columnName." ";
// echo $columnSortOrder;
// if (mysqli_num_rows($empRecords) > 0) {
    while ($row = mysqli_fetch_assoc($empRecords)) {
        $id = $row["id"];
        $data[] = array(
                "course_name"=>strtoupper($row['course_name']),
                "name"=>strtoupper($row['name']),
                "description"=>$row['description'],
                "fee_term"=>$row['fee_term'],
                "repayment_type"=> $row['repayment_type'],
                "startMonth"=> $row['startMonth'],
                "close"=>"<a href='single_payment_product.php?conf=$id' class='btn btn-pill btn-danger btn-air-danger btn-danger-gradien' type='button'>Settings</a>"
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
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
	$searchQuery = " AND (name like '%".$searchValue."%' or batchYear like '%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from branch");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from branch WHERE 1 ".$searchQuery."");
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$staffQuery = "SELECT * FROM `courses` WHERE 1 $searchQuery order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $staffQuery);
$data = array();
// echo $row;
// echo $rowperpage;
// echo $columnName." ";
// echo $columnSortOrder;
// if (mysqli_num_rows($empRecords) > 0) {
    while ($row = mysqli_fetch_assoc($empRecords)) {
        $c_id = $row["id"];
        $query_paycat = mysqli_query($con, "SELECT SUM(price) AS total FROM `payment_category` WHERE course_id = '$c_id'");
        $gxt = mysqli_fetch_array($query_paycat);
        $total = number_format($gxt["total"], 2);
        if ($total == "0") {
            $total = "<b style='color:red;'>No Category Created</b>";
        }
        $data[] = array(
                "Name"=>strtoupper($row['name']),
                "batchYear"=>$row['batchYear'],
                "Total"=> $total,
                "Edit"=>"<a href='single_payment_category.php?course=$c_id' class='btn btn-pill btn-dark btn-air-dark btn-dark-gradien' type='button'>View</a>"
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
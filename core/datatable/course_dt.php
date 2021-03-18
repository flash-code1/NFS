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
	$searchQuery = " AND (name like '%".$searchValue."%' or shortCode like '%".$searchValue."%'
    or batchYear like '%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from courses");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from courses WHERE 1 ".$searchQuery."");
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$staffQuery = "SELECT courses.id, courses.name, courses.shortCode, courses.Description, courses.batchYear, courses.createdAt, courses.UpdatedAt, courses.Enabled, branch.name AS bn FROM `courses` INNER JOIN branch ON courses.branch_id = branch.id WHERE 1 $searchQuery order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $staffQuery);
$data = array();
// echo $row;
// echo $rowperpage;
// echo $columnName." ";
// echo $columnSortOrder;
// if (mysqli_num_rows($empRecords) > 0) {
    while ($row = mysqli_fetch_assoc($empRecords)) {
        if ($row["Enabled"] == "1") {
            $enb = "Active";
        } else {
            $enb = "Not Active";
        }
        $data[] = array(
                "name"=>strtoupper($row['name']),
                "shortCode"=>strtoupper($row['shortCode']),
                "Desc"=>$row['Description'],
                "batchYear"=>$row['batchYear'],
                "branch"=>$row['bn'],
                "cdate"=> $row['createdAt'],
                "status"=> $enb,
                "close"=>"<a href='#' class='btn btn-pill btn-warning btn-air-warning btn-warning-gradien' type='button'>View</a>"
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
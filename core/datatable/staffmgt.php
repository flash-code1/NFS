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
	$searchQuery = " AND (fullname like '%".$searchValue."%' or email like '%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from users");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from users WHERE 1 ".$searchQuery."");
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$staffQuery = "SELECT users.fullname, users.email, users.createdAt, users.Enabled, role.title, branch.name FROM `users` INNER JOIN role ON users.role_id = role.id INNER JOIN branch ON users.branch_id = branch.id WHERE 1 $searchQuery order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $staffQuery);
$data = array();

// if (mysqli_num_rows($empRecords) > 0) {
    while ($row = mysqli_fetch_assoc($empRecords)) {
        $emp = $row["Enabled"];
        if ($emp == 1) {
            $emp = "Active";
        } else {
            $emp = "Not Active";
        }
        $data[] = array(
                "Name"=>strtoupper($row['fullname']),
                "Email"=>$row['email'],
                "Position"=>preg_replace('/[^a-zA-Z0-9 .-]/','', strtoupper($row['title'])),
                "GDate"=> $row['createdAt'],
                "Employment"=> $emp,
                "Branch"=>preg_replace('/[^a-zA-Z0-9 .-]/','', strtoupper($row['name'])),
                "close"=>"<a href='#' class='btn btn-pill btn-warning btn-air-warning btn-warning-gradien' type='button'>Edit</a>"
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
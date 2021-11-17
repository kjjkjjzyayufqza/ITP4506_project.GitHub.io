<?php
require_once('../conn.php');


$jsonstr =  $_POST["data"];
$obj = json_decode($jsonstr, true);

//$objar = $obj["status"][0]["studentID"];
//echo (count($obj["status"]));


for ($i=0; $i<count($obj["status"]); $i++)
{
    if($obj["status"][$i]["studentstatus"] == "Present"){
        $status = "Present";
    };
    if($obj["status"][$i]["studentstatus"] == "Late"){
        $status = "Late";
    };
    if($obj["status"][$i]["studentstatus"] == "Early leave"){
        $status = "Earlyleave";
    };
    if($obj["status"][$i]["studentstatus"] == "Personal leave"){
        $status = "Personalleave";
    };
    if($obj["status"][$i]["studentstatus"] == "Absent without reason"){
        $status = "absent";
    };
    $sql = "INSERT INTO attendance (id, classID, studentID, date, time, status) 
    VALUES (NULL, '{$obj["classid"]}', '{$obj["status"][$i]["studentID"]}', '2021-11-01', '18:51:02', '{$status}');" ;
    mysqli_query($conn, $sql);
}
$re = '{status : success}';
echo json_encode($re)
?>
<?php
require_once('conn.php');
extract($_POST);
$sql = "SELECT * FROM user";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
while($rc = mysqli_fetch_assoc($rs)){
    if($userID == $rc['id'] && $password == $rc['password']){
        session_start();
        $_SESSION['userid'] = $userID;
        $_SESSION['role'] = $rc['role'];
        if($_SESSION['role'] == "admin"){
            header('Location: pages/home_a.php');
        }elseif($_SESSION['role'] == "teacher"){
            header('Location: pages/home_t.php');
        }elseif($_SESSION['role'] == "student"){
            header('Location: pages/home_s.php');
        }
    }
    
}
// if(isset($_SESSION['userid']))
// {
    
//     $userID = $_POST['userID'];
//     $password = $_POST['password'];

//     $sql = "SELECT * FROM user WHERE id='$userID' AND password='$password';";
//     $rs = mysqli_query($conn, $sql);
 
// 	if(mysqli_num_rows($rs) == 1)
//     {
        
//         header('Location: pages/dashboard.html');
//     }
//     else
//     {
//         header('Location: index.php');
//     }

		

// }

if(!isset($_SESSION['userid'])){
    session_start();
    $_SESSION['Rerror'] = true;
    header('Location: index.php');
 }
?>
<?php 


@include 'dbcon.php';
if(isset($_GET['deleteemail'])){
    $email=$_GET['deleteemail'];


$delete = "DELETE  FROM users WHERE email = '$email'";
	$result = $conn -> query($delete);
    if($result){
        echo "deleted successfully";
       header('location:admin.php');
    }
    else 
    echo "not deleted";
}?>
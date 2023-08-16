<?php 


@include 'dbcon.php';
if(isset($_POST['update'])){
$up_username=$_POST['up_username'];
$up_password=$_POST['up_password'];
$up_email=$_POST['up_email'];
$up_usertype=$_POST['up_usertype'];
$up_photo=$_FILES['up_photo']['name'];
if(!empty($img_url = $_FILES['up_photo']['name']))
{

  if($up_usertype=="user"|| $up_usertype=="admin"){ 
move_uploaded_file($_FILES['up_photo']['tmp_name'], 'uphotos/'.$_FILES['up_photo']['name']);
$update="UPDATE users SET username='$up_username',password='$up_password', usertype='$up_usertype', pic='$img_url' WHERE email= '$up_email'";
$result = $conn -> query($update);
header('location:admin.php');
}
else 
$error[]="invalid user type hint user/admin";

}
else{
$update="UPDATE users SET username='$up_username', password='$up_password', usertype='$up_usertype' WHERE email= '$up_email'";
$result = $conn -> query($update);
header('location:admin.php');
}
}


if(isset($_GET['updateemail'])){
    $email=$_GET['updateemail'];


   $select = "SELECT *  FROM users WHERE email = '$email'";
	 $result = $conn -> query($select);
   $x=0;
    while ($row=mysqli_fetch_assoc($result)){
      $x++;
      $email=$row['email'];
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><link rel="stylesheet" type="text/css" href="css/update.css">
</head>
<body>
    <div class="login">
      <form method="post" enctype="multipart/form-data">
        <input type="text" name="up_username" value='<?php echo $row['username'];?>' id="username">  
      <input type="text" name=" up_password" value="<?php echo $row['password'];?>">  
      <input type="email" name="up_email" value="<?php echo $row['email'];?>"  id="email"  readonly>  
          <div class="group">
        <input type="text" name="up_usertype" value="<?php echo $row['usertype'];?>" >
        <input type="file" name='up_photo' accept=".png, .jpg, .jpeg" class="form-control-file" id="exampleFormControlFile1">
       <?php } }?>
        <?php
              if(isset($error)){
                foreach($error as $error){
                  echo '<div style="color:red"><b>'.$error.'</b></div>';
                };
              };
            ?>
</div>
      <input type="submit" name="update"value="update">
  </div>
    <div class="shadow"></div>
    </form>
</body>
</html>
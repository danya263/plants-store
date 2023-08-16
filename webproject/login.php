<?php 
@include 'dbcon.php';

if(isset ($_POST['submit'])){
	$username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $checkpassword=$_POST['checkpassword'];
    $usertype=$_POST['usertype'];
	$fileurl=$_FILES['photo']['name'];
    

	move_uploaded_file($_FILES['photo']['tmp_name'], 'uphotos/'.$_FILES['photo']['name']);
	$select = "SELECT * FROM users WHERE email = '$email'";
	$result = $conn -> query($select);
  
	if($result -> num_rows > 0) {
	  $error[] = 'email already exist!';
     } elseif(($password != $checkpassword)){
        
          $error[] = 'password not matched!';

     
     }else{
		$insert = "INSERT INTO `users`(`username`, `password`, `email`, `usertype`, `pic`)  VALUES('$username','$password','$email','$usertype','$fileurl')";
		$conn -> query($insert);
    if($usertype=="admin")
		header('location:admin.php');
    else
    header("location:index.php?username_in = $username");
	  };

  
}




if(isset($_POST['login'])){
  $emailin=$_POST['emailin'];
    $passwordin=$_POST['passwordin'];
 
	$select = "SELECT * FROM users WHERE email = '$emailin' && password='$passwordin'";
	$result = $conn -> query($select);
  
 
	if($result -> num_rows <= 0) {
	  $login_error[] = 'password or email has problem';


     }else{

       $x=0;
      while ($row=mysqli_fetch_assoc($result)){
          $x++;
          $usertypein=$row['usertype'];
          $usernamein=$row['username'];

      }
      
      echo  $usertypein;
      if($usertypein=="user")
      header("location:index.php ?username_in=$usernamein");

      elseif($usertypein=="admin")
      header('location:admin.php');
      else
      $login_error[]="not respond";
     }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title><link rel="stylesheet" type="text/css" href="css/login.css"><title>Document</title>
</head>
<body > <div class="slider">
    
  <img src="img/663dc3cf-d291-4e36-9dd8-55ca77fcb5e0.jpg" id="slideImg">
  
  </div><div class="overlay">
    <section class="forms-section">
        <h1 class="section-title">------------------          GARDENEA          -------------------</h1>
        <div class="forms">
          <div class="form-wrapper is-active">
            <button type="button" class="switcher switcher-login">
              Login
              <span class="underline"></span>
            </button>
            <form class="form form-login"  method="post" enctype="multipart/form-data">
              <fieldset>
                <legend>Please, enter your email and password for login.</legend>
                <div class="input-block">
                  <label for="login-email">E-mail</label>
                  <input id="login-email" name='emailin' type="email" required>
                </div>
                <div class="input-block">
                  <label for="login-password">Password</label>
                  <input id="login-password" name='passwordin' type="password" required>
                </div>
              </fieldset>
              <button type="submit" name='login' class="btn-login">Login</button>
              <?php
              if(isset($login_error)){
                foreach($login_error as $login_error){
                  echo '<div style="color:red"><b>'.$login_error.'</b></div>';
                };
              };
            ?>
            </form>
          </div>
          <div class="form-wrapper">
            <button type="button" class="switcher switcher-signup">
              Sign Up
              <span class="underline"></span>
            </button>
            <form class="form form-signup" method="post" enctype="multipart/form-data">
              <fieldset>
                <legend>Please, enter your email, password and password confirmation for sign up.</legend><div class="input-block">
                  <label for="username">username</label>
                  <input id="username" type="text"  name="username"    required>
                </div>
                <div class="input-block">
                  <label for="signup-email">E-mail</label>
                  <input id="signup-email" name='email' type="email" required>
                </div>
                <div class="input-block">
                  <label for="signup-password">Password</label>
                  <input id="signup-password" name="password" type="password" required>
                </div>
                <div class="input-block">
                  <label for="signup-password-confirm">Confirm password</label>
                  <input id="signup-password-confirm" name='checkpassword' type="password" required>
                </div> <div class="group">
                                     <input type="file" name='photo' accept=".png, .jpg, .jpeg" class="form-control-file" id="exampleFormControlFile1">
                  </div><select name='usertype' class="form-select" aria-label="Default select example" style="background-color: #ad9d51;">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                  </select>
              </fieldset>
              <button type="submit" name='submit' class="btn-signup">Continue</button>
              <?php
              if(isset($error)){
                foreach($error as $error){
                  echo '<div style="color:red"><b>'.$error.'</b></div>';
                };
              };
            ?>
            </form>
          </div>
        </div>
      </section></div>
    </main>
      </section> <script src="main.js" ></script>
</body>
</html>
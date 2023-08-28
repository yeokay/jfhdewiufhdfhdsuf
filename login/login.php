<?php
session_start();
if(isset($_POST['login'])){

  $password = $_POST['password'];
   if($password === '£B£HBBCSDbh(/VCSVYHijhdbvuijdbnfv07/&"/£"GDUHCVBDWS/(WE/F&VbhusdcvyuhbSXGCV&WED%F)&'){
     $_SESSION['login'] = true; header('LOCATION:../index.php'); die();
   } {
     echo "<div class='alert alert-danger'>why youre here?</div>";
   }

 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>𝐩𝐚𝐫𝐭𝐲 :)</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.png" />
<link rel="stylesheet" href="assets/css/style.css">


</head>
<body>
	
<center>
        <div class="wrapper">
    <div class="authentication-lock-screen d-flex align-items-center justify-content-center">
      <div class="card shadow-none bg-transparent">
        <div class="card-body p-md-5 text-center">
          <h2 class="text-white"><a style="color:white;" href="https://t.me/balenottere">𝒐𝒏𝒍𝒚 𝒈𝒐𝒅𝒔 𝒌𝒏𝒐𝒘 𝒘𝒉𝒂𝒕 𝒊𝒔 𝒃𝒆𝒉𝒊𝒏𝒅 𝒉𝒆𝒓𝒆</a></h2>
            <img src="assets/images/user.png" class="mt-5" width="200" alt="" />
          </div>
          </br>
          <p class="mt-2 text-white">𝒘𝒆𝒍𝒄𝒐𝒎𝒆 𝒕𝒐 𝒕𝒉𝒆 𝒈𝒂𝒕𝒆 </p><br>
          <form method="POST" id="signup-form" class="signup-form">
            <div class="form-group">
              <input type="text" class="btn btn-light" name="password" id="password"
                placeholder="password" />
              <span toggle="put the party password" class="zmdi zmdi-eye field-icon toggle-password"></span>
            </div></br>

            <div class="form-group">
              <input type="submit" name="login" id="login" class="btn btn-light" value="𝒈𝒆𝒕 𝒊𝒏 𝒕𝒉𝒆 𝒑𝒂𝒓𝒕𝒚" />
            </div>
          </form>
        </div>
      </div>
    </div>
   </div>
  </div>
 </div>
</div>
</center>
</body>
</html>

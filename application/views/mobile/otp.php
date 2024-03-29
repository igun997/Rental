<?php
  $asset = function($url){
    return base_url("assets/login/".$url);
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>OTP</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= $asset("images/icons/favicon.ico") ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= $asset("vendor/bootstrap/css/bootstrap.min.css") ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= $asset("fonts/font-awesome-4.7.0/css/font-awesome.min.css") ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= $asset("fonts/Linearicons-Free-v1.0.0/icon-font.min.css") ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= $asset("vendor/animate/animate.css") ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= $asset("vendor/css-hamburgers/hamburgers.min.css") ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= $asset("vendor/select2/select2.min.css") ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= $asset("css/util.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= $asset("css/main.css") ?>">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= $asset("images/img-01.jpg") ?>');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" action="" method="post">
					<div class="login100-form-avatar">
						<img src="//via.placeholder.com/80x80" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						OTP
					</span>

            <div class="wrap-input100 validate-input m-b-10" data-validate = "Isikan OTP">
              <input class="input100" type="password" name="otp" placeholder="OTP">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock"></i>
              </span>
            </div>

            <div class="container-login100-form-btn p-t-10">
              <button type="submit" class="login100-form-btn">
                VERIFIKASI
              </button>
            </div>

				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="<?= $asset("vendor/jquery/jquery-3.2.1.min.js") ?>"></script>
<!--===============================================================================================-->
	<script src="<?= $asset("vendor/bootstrap/js/popper.js") ?>"></script>
	<script src="<?= $asset("vendor/bootstrap/js/bootstrap.min.js") ?>"></script>
<!--===============================================================================================-->
	<script src="<?= $asset("vendor/select2/select2.min.js") ?>"></script>
<!--===============================================================================================-->
	<script src="<?= $asset("js/main.js") ?>"></script>

</body>
</html>

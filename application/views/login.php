<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/cahaya-travel/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/cahaya-travel/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/cahaya-travel/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/cahaya-travel/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/cahaya-travel/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/cahaya-travel/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/cahaya-travel/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/cahaya-travel/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/cahaya-travel/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/cahaya-travel/css/main.css">
	<link rel="icon"
      type="image/png"
      href="<?php echo base_url();?>assets/logo/cahayatravel-new.png"/>
<!--===============================================================================================-->
</head>
<body>
	
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(<?php echo base_url();?>assets/images/login.jpg);">
                    <span class="login100-form-title-1">
                        Sign In
                    </span>
                </div>
                <hr>
                <form class="login100-form validate-form" action="<?php echo base_url();?>login/doLogin" method="POST">
                    <?php if (!empty($notif)) { ?>
                        <div class="alert <?=$alert; ?> ">
                            <?= $notif; ?>
                        </div>
                    <?php } ?>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Enter username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100 password" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Show Password
                            </label>
                        </div>

                        <div>
                            <a href="<?php echo base_url();?>register" style="color: #48D1CC">
                                Create New Account 
                                <i class="fa fa-long-arrow-right"></i>	 
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <input type="submit" name="submit" value="LOGIN" class="login100-form-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/cahaya-travel/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/cahaya-travel/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?php echo base_url();?>assets/cahaya-travel/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/cahaya-travel/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/cahaya-travel/vendor/select2/select2.min.js"></script>
	<script src="<?php echo base_url();?>assets/cahaya-travel/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/cahaya-travel/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url();?>assets/cahaya-travel/vendor/countdowntime/countdowntime.js"></script>
	<script src="<?php echo base_url();?>assets/cahaya-travel/js/main.js"></script>
<!--===============================================================================================-->
<script type="text/javascript">
	$(document).ready(function(){		
		$('.input-checkbox100').click(function(){
			if($(this).is(':checked')){
				$('.password').attr('type','text');
			}else{
				$('.password').attr('type','password');
			}
		});
	});
</script>
</body>
</html>
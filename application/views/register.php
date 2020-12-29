<!--===============================================================================================-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem - Registration</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
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
						Register User
					</span>
				</div>

	<div class="card-body">
		<form enctype="multipart/form-data" action="<?php echo base_url();?>register" method="POST">
            <?php 
                $notif = $this->session->flashdata('notif');
                $alert = $this->session->flashdata('alert');
                if (!empty($notif)) {
            ?>
            <div class="alert <?=$alert; ?> ">
                <?= $notif; ?>
            </div>
            <?php } ?>
			<div class="form-group">
						<label style="color: #5F9EA0">Nama</label>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input type="text" name="nm_depan" class="form-control" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group-desc">
                                            <input type="text" name="nm_belakang" class="form-control" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
             </div>
            
            <div class="form-group">
                <label style="color: #5F9EA0">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>

            <div class="form-group">
                <label style="color: #5F9EA0">E-mail</label>
                <input type="text" name="email" class="form-control" placeholder="exception@gmail.com" required>
            </div>

            <div class="form-group">
                <label style="color: #5F9EA0" for="foto_ktp">Foto KTP</label><br>
                <input type="file" name="foto_ktp">
            </div>

            <div class="form-group">
                <label style="color: #5F9EA0">Password</label>
                <input type="password" name="password" class="form-control password" placeholder="Password" required>
            </div>

            <div class="flex-sb-m w-full p-b-30">
                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    <label class="label-checkbox100" for="ckb1">
                        Show Password
                    </label>
                </div>
			</div>
			
            <div class="container-login100-form-btn d-flex justify-content-between">
                <a type="button" href="<?php echo base_url();?>Login" class="login100-form-btn">
                    <i class="fa fa-arrow-left" aria-hidden="true"> Back</i>
                </a>
                <input class="login100-form-btn" type="submit" name="submit" value="Register">
			</div>
        </form>
    </div>
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
            <?php if (!empty($notif)) { ?>
            setTimeout(() => {
                window.location = 'login/'
            }, 1000);
        <?php } ?>	
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
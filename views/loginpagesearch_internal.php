<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Untuk Searching Surat...</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('/public/asset_login_search/images/icons/favicon.png');?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/asset_login_search/vendor/bootstrap/css/bootstrap.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/asset_login_search/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/asset_login_search/fonts/Linearicons-Free-v1.0.0/icon-font.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/asset_login_search/vendor/animate/animate.css');?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/asset_login_search/vendor/css-hamburgers/hamburgers.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/asset_login_search/vendor/animsition/css/animsition.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/asset_login_search/vendor/select2/select2.min.css');?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/asset_login_search/vendor/daterangepicker/daterangepicker.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/asset_login_search/css/util.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/asset_login_search/css/main.css');?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="<?php echo site_url('login_search/Logintamupegawai_search/process_pegawai') ?>" method="post" accept-charset="utf-8">
					<span class="login100-form p-b-32">
						<h5>Silahkan login terlebih dulu...</h5>
					</span>

					<span class="txt1 p-b-11">
						NIP Pegawai
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember_me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt3">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" style="width:100%;margin-bottom:10px;">
							Login
						</button>
						<a class="login100-form-btn" style="width:100%;" href="<?php echo $this->config->item('base_domain');?>/sistrabkdsulsel-ver02/">
							Kembali
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<?php 
$error = $this->session->userdata('form_error');
if ($error)
{   
	echo "<script> alert('Harap mengisi kolom username atau password') </script>";
}

$error_isian = $this->session->userdata('login_salah');
if ($error_isian)
{
	echo "<script> alert('Username atau password anda salah') </script>";
}

$error_login = $this->session->userdata('percobaan_login');
if ($error_login)
{
	echo "<script> alert('Maaf Sesi anda kadaluarsa. Silahkan login lagi') </script>";
}

$ok_keluar = $this->session->userdata('keluar', 'keluar');
if ($ok_keluar)
{
	echo "<script> alert('Anda telah keluar') </script>";
}

$this->session->unset_userdata('form_error');
$this->session->unset_userdata('login_salah');
$this->session->unset_userdata('percobaan_login');
$this->session->unset_userdata('keluar');
?>
<!--===============================================================================================-->
	<script src="<?php echo base_url('/public/asset_login_search/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('/public/asset_login_search/vendor/animsition/js/animsition.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('/public/asset_login_search/vendor/bootstrap/js/popper.js');?>"></script>
	<script src="<?php echo base_url('/public/asset_login_search/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('/public/asset_login_search/vendor/select2/select2.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('/public/asset_login_search/vendor/daterangepicker/moment.min.js');?>"></script>
	<script src="<?php echo base_url('/public/asset_login_search/vendor/daterangepicker/daterangepicker.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('/public/asset_login_search/vendor/countdowntime/countdowntime.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('/public/asset_login_search/js/main.js');?>"></script>

</body>
</html>
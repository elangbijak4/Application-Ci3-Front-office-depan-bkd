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
				<form class="login100-form validate-form flex-sb flex-w" action="<?php echo site_url('login_unggah_surat_tamu/Logintamupegawai_search/process_pegawai') ?>" method="post" accept-charset="utf-8">
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
							<a href="#" class="txt3" id="lupa_password">
								Forgot Password?
							</a>
						</div>

						<div>
							<a href="#" class="txt3" id="register">
								Register
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


<script>      
$(document).ready(function(){
	$("#register").click(function(){
		var loading = $("#pra_register");
		var tampilkan = $("#penampil_register");
		tampilkan.hide();
		loading.fadeIn(); 
		$.post('<?php echo site_url('/Frontoffice/frontoffice_register1/tamu');?>',{ data:"okbro"},
		function(data,status){
			loading.fadeOut();
			tampilkan.html(data);
			tampilkan.fadeIn(2000);
		});
	});

	$("#lupa_password").click(function(){
		var loading = $("#pra_register");
		var tampilkan = $("#penampil_register");
		tampilkan.hide();
		loading.fadeIn(); 
		$.post('<?php echo site_url('/Frontoffice/lupa_password/tamu');?>',{ data:"okbro"},
		function(data,status){
			loading.fadeOut();
			tampilkan.html(data);
			tampilkan.fadeIn(2000);
		});
	});
});

</script>

<!-- Modal1 -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content" style='background-color: rgba(200, 200, 200, 0.95);'>
		<div class="modal-header">
		<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
		<h5 class="modal-title">
			<img src="<?php echo base_url('/assets/assets_login/images/LogoSulselH.png');?>" class="logo_sulsel" style="height:40px;width:auto;float:left;margin-right:20px;" />
			e-Office BKD Prov. Sulsel
		</h5>
		</div>
		<div class="modal-body">
		  <center>
          <div id='pra_register' style='width:65%;' align='center' >
          <i class='fa-3x fas fa-spinner fa-pulse' <?php echo $this->config->item('style_progres_bulat_admin');?>></i>
          </center>
          <div id=penampil_register align="center" style='width:100%;overflow:auto;'></div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		</div>
	</div>
	</div>
</div>
	

	<div id="dropDownSelect1"></div>
	
<?php 
if(isset($src_register)){
	$this->load->library('model_frommyframework');
	$kolom_rujukan['nama_kolom']='digest_signature_tamu';
	$kolom_rujukan['nilai']=$signature;
	$kolom_target='idtamu';
	$idtamu=$this->model_frommyframework->pembaca_nilai_kolom_tertentu('tamu',$kolom_rujukan,$kolom_target);
	#echo "INI src_register: ".$src_register;
	#echo "<br>INI signature: ".$signature;
	#echo "<br>INI idtamu: ".$idtamu[0];

	//if($data_upload[0][0] || $data_upload[1][0]) {
		//alert('Selamat:\nSurat dan Berkas pendukung sukses diunggah');
		echo "
		<!--layer untuk modalku-->
		<div id='modalku' style='background: #777; position:fixed; left:0;right:0;top:0;bottom:0;z-index:90000; opacity:0.9;'>
		</div>
		<div id='panel'  style=''>
		<iframe id=\"target_pdf\" name=\"target_pdf\" src=\"".site_url($src_register)."/".$idtamu[0]."\" style=\"left:5%;right:5%;top:5%;bottom:5%;border:0px solid #000;position:absolute;width:90%;height:70%\"></iframe>
		<button type=\"button\" class=\"btn btn-info okbro\" style=\"bottom:20px;right:20px; position:absolute;\" onclick='document.getElementById(\"panel\").style.display=\"none\";document.getElementById(\"modalku\").style.display=\"none\";'>Close</button>
		<button type=\"button\" class=\"btn btn-warning\" style=\"bottom:20px;left:20px; position:absolute;\">Klik >> untuk cetak</button>
		</div>
		
		<style>
		#panel {
			border-radius: 10px; background: #fff; position:fixed; left:30%;right:30%;top:20%;bottom:20%;z-index:90001;
		}
		@media screen and (max-width: 480px) {
		#panel {
			left:5%;
			right:5%;
		}
		.okbro{
			width:60px;
		}
		}
		</style>
		";
	//} else {
		//alert('Maaf Surat dan Berkas Anda Gagal di unggah \natau Anda Belum Unggah Surat dan Berkas');
	//}
}

if(isset($pesan_gagal)){
	alert($pesan_gagal);
}

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
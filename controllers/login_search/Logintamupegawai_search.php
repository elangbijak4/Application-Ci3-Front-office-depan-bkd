<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logintamupegawai_search extends MY_Controller {

	public function __construct()
        {
         parent::__construct();
		 $this->load->model('Model_tamu', 'Muser');
		 $this->load->library("enkripsi");
		}
		
	public function index()
	{
		//cek session, jika ada langsung arahkan ke target
		$user = $this->session->userdata('user_frontoffice_search');
        $str = $user['email'].$user['idtamu']."1@@@@@!andisinra";
        $str = hash("sha256", $str );
        $hash=$this->session->userdata('hash');
        if (($user!==FALSE)&&($str==$hash))
        {   
			redirect(site_url('Frontoffice/search_page'));
		} 
		
		//cek cookie, jika ada langsung arahkan ke agamas
		$cookie_user=get_cookie('munirah_muslim');
		$cookie_tersimpan = $this->Muser->get_by_cookie($cookie_user)->row();

		//$cookietersimpan = $cookie_tersimpan->cookie;
		//print_r($cookietersimpan);
		//echo "INI COOKIE DARI BASISDATA: ".$cookietersimpan;
		//if (($cookie_user!==FALSE)&&($cookie_user==$cookietersimpan))
		if($cookie_tersimpan)
        {   
			//redirect(site_url('agamas'));
			//$data["agamas"] = $this->agama_model->getAll();
            //$this->load->view("Frontoffice/search_page");
            $this->load->view('search_page/halaman_search');
        } else {
			redirect(site_url('Frontoffice/halaman_login_search'));
		}
		
	}
  
	public function process()
	{
		//terima kiriman data dari halaman login
		
		
		$data = array(
			'idtamu' => $this->_post('idtamu')
		);
		
		
		$this->form_validation->set_rules('idtamu', 'idtamu', 'required'); 
		$this->form_validation->set_rules('password', 'Password', 'required'); 
		
		
		if ($this->form_validation->run() == 0)
		{   
			$this->session->set_userdata('form_error', 'error');
			//$this->load->view('Frontoffice/index');
			redirect(site_url('Frontoffice/halaman_login_search')); 
			
		}
		else
		{   
			//alert("INI ADALAH form_validation: ".$this->form_validation->run());
			//echo "OK MASUK DISINI BRO sebelum auth_check";
			$check = $this->Muser->auth_check($data);
			if ($check) {$oke='TRUE';} else {$oke='FALSE';}

			//print_r($check);
			if(($check != false) && (password_verify($this->_post('password'),$check->password))){
				$user = array (
				'email' => $check->email,
				'idtamu' => $check->idtamu
				);


				$str = $check->email.$check->idtamu."1@@@@@!andisinra";
				$str = hash("sha256", $str );
				$this->session->set_userdata('hash',$str);
				$this->session->set_userdata('user_frontoffice_search',$user);

				
				//$this->session->set_userdata('idtamu_login',$user['idtamu']);

				//echo $this->session->userdata('hash')." =hash<br>";
				//echo serialize($this->session->userdata('user_frontoffice'))." =user_frontoffice<br>";
				//echo $this->session->userdata('idtamu_login')." =idtamu_login<br>";

				//pembuatan cookie:
				$ok_cookie=$this->_post('remember_me');
				if($ok_cookie){
					//set cookie
					$cookie = array(
						'name'   => 'munirah_muslim',
						'value'  => 'Cookie dari BKD Provinsi Sulsel',
						'expire' => '3600',
						'domain' => $this->config->item('base_domain').'/front-office-depan',
						'path'   => '/',
						'secure' => TRUE
					);
					$random = random_int(10000,90000);
					$str_cookie = $cookie['name'].$cookie['value'].$cookie['expire'].$random."1@@@@@!andisinra";
					$str_cookie = hash("sha256", $str_cookie );
					$data_cookie = array(
						'cookie' => $str_cookie,
						'idtamu' => $user['idtamu']
					);
					
					set_cookie('munirah_muslim_tamu_search_bkd',$str_cookie,3600*24);
					$this->Muser->update_cookie($data_cookie);
				} 
				//KALAU MAU MENGETES KODE MENGGUNAKAN ECHO, MATIKAN DULU SEMUA FUNGSI redirect() KARENA INI MENUTUP HASILNYA;
				redirect( site_url('Frontoffice/search_page') ); 
			}
			$this->session->set_userdata('login_salah', 'salah');
			//redirect( site_url('Frontoffice/halaman_login_search') );
			
		}
		
		
	} 
  
	public function process_old()
	{
		//terima kiriman data dari halaman login
		$data = array(
			'username' => $this->_post('username')
		);
		$this->form_validation->set_rules('username', 'Username', 'required'); 
		$this->form_validation->set_rules('password', 'Password', 'required'); 

		if ($this->form_validation->run() == FALSE)
		{   
			$this->session->set_userdata('form_error', 'error');
			//echo "OK BRO";
			//$this->load->view('Frontoffice/index');
			redirect( site_url('Frontoffice/halaman_login_search') ); 
			
		}
		else
		{   
			$check = $this->Muser->auth_check($data);
			if ($check) {$oke='TRUE';} else {$oke='FALSE';}

			
			if(($check != false) && (password_verify($this->_post('password'),$check->password))){
				$user = array (
				'email' => $check->email,
				'username' => $check->username
				);


			
				$str = $check->email.$check->username."1@@@@@!andisinra";
				$str = hash("sha256", $str );
				$this->session->set_userdata('hash',$str);
				$this->session->set_userdata('user_frontoffice',$user);

				//pembuatan cookie:
				$ok_cookie=$this->_post('remember_me');
				if($ok_cookie){
					//set cookie
					$cookie = array(
						'name'   => 'munirah_muslim',
						'value'  => 'Cookie dari BKD Provinsi Sulsel',
						'expire' => '3600',
						'domain' => $this->config->item('base_domain').'/front-office-depan',
						'path'   => '/',
						'secure' => TRUE
					);
					$random = random_int(10000,90000);
					$str_cookie = $cookie['name'].$cookie['value'].$cookie['expire'].$random."1@@@@@!andisinra";
					$str_cookie = hash("sha256", $str_cookie );
					$data_cookie = array(
						'cookie' => $str_cookie,
						'username' => $user['username']
					);
					
					set_cookie('munirah_muslim',$str_cookie,3600*24);
					$this->Muser->update_cookie($data_cookie);
				} 
				//echo "OK BRO";
				redirect( site_url('Frontoffice/search_page') ); 
			}
			$this->session->set_userdata('login_salah', 'salah');
			redirect(site_url('Frontoffice/halaman_login_search'));
		}
		
	} 

	public function process_pegawai()
	{
		//terima kiriman data dari halaman login
		$data = array(
			'username' => $this->_post('username')
		);
		$this->form_validation->set_rules('username', 'Username', 'required'); 
		$this->form_validation->set_rules('password', 'Password', 'required'); 

		if ($this->form_validation->run() == FALSE)
		{   
			$this->session->set_userdata('form_error', 'error');
			//echo "OK BRO";
			//$this->load->view('Frontoffice/index');
			redirect(site_url('Frontoffice/halaman_login_search_internal')); 
			
		}
		else
		{   
			//$check = $this->Muser->auth_check($data);
			//if ($check) {$oke='TRUE';} else {$oke='FALSE';}
			$this->session->set_userdata('password',$this->_post('password'));
			$nip=$this->enkripsi->enkapsulasiData(array('nipbaru'=>$data['username']));
			$table=$this->enkripsi->enkapsulasiData('identpeg');
			$token=$this->enkripsi->enkapsulasiData('andisinra');
			redirect($this->config->item('bank_data')."/index.php/Frontoffice/read_where_loginpegawai_search/".$table."/".$nip."/".$token);

			/*
			if(($check != false) && (password_verify($this->_post('password'),$check->password))){
				$user = array (
				'email' => $check->email,
				'username' => $check->username
				);
			
				$str = $check->email.$check->username."1@@@@@!andisinra";
				$str = hash("sha256", $str );
				$this->session->set_userdata('hash',$str);
				$this->session->set_userdata('user',$user);

				//pembuatan cookie:
				$ok_cookie=$this->_post('remember_me');
				if($ok_cookie){
					//set cookie
					$cookie = array(
						'name'   => 'munirah_muslim',
						'value'  => 'Cookie dari BKD Provinsi Sulsel',
						'expire' => '3600',
						'domain' => 'localhost/front-office-depan',
						'path'   => '/',
						'secure' => TRUE
					);
					$random = random_int(10000,90000);
					$str_cookie = $cookie['name'].$cookie['value'].$cookie['expire'].$random."1@@@@@!andisinra";
					$str_cookie = hash("sha256", $str_cookie );
					$data_cookie = array(
						'cookie' => $str_cookie,
						'username' => $user['username']
					);
					
					set_cookie('munirah_muslim',$str_cookie,3600*24);
					$this->Muser->update_cookie($data_cookie);
				} 
				//echo "OK BRO";
				redirect( site_url('Akuntamupegawai/index_dashboard') ); 
			}
			*/
			$this->session->set_userdata('login_salah', 'salah');
			redirect(site_url('Frontoffice/halaman_login_search_internal'));
		}
		
	} 

	public function balikan_dari_bankdata($data){
		//echo "OK BRO MASUK DISINI<br>";
		$kiriman=$this->enkripsi->dekapsulasiData($data);
		if((password_verify($this->session->userdata('password'),$kiriman['nipbaru'][0]['password']))){
			//echo "OK BRO PASSWORD BENAR";
			$user = array (
				'email' => $kiriman['nipbaru'][0]['email'],
				'username' => $kiriman['nipbaru'][0]['username']
				);
			
			$str = $user['email'].$user['username']."1@@@@@!andisinra";
			$str = hash("sha256", $str );
			$this->session->set_userdata('hash',$str);
			$this->session->set_userdata('user_frontoffice_pegawai',$user);

			redirect(site_url('Frontoffice/search_page_internal'));
			//OLD
			//redirect( site_url('Akuntamupegawai/index_dashboard_pegawai/'.$data) );

		}else{
			//alert("Password tidak cocok");
			$this->load->view('search_page/loginpagesearch_internal');
		}
	}

	public function logout()
		{
			$this->session->unset_userdata('user_frontoffice_search');
			$this->session->set_userdata('keluar', 'keluar');
			delete_cookie('munirah_muslim_tamu_search_bkd');
			redirect(site_url('Frontoffice/halaman_login_search'));
		}
	
	public function logout_pegawai()
	{
		$this->session->unset_userdata('user_frontoffice_pegawai');
		$this->session->set_userdata('keluar', 'keluar');
		delete_cookie('munirah_muslim_pegawai_search_bkd');
		redirect(site_url('Frontoffice/halaman_login_search_internal'));
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	function __construct()
	{	
		parent::__construct();
		if(!empty($_SESSION['email_user'])) redirect(base_url());
		$this->module = "user";
		$this->table_name = "users, registrations";
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library(array('facebook','google'));
    $this->load->model(array('M_facebook','M_google'));
		$this->load->helper('url');

	}

	public function index()
	{	

		include_once APPPATH . "libraries/vendor/autoload.php";

		if ($_POST) {

			$email = htmlspecialchars($this->input->post('user_email', TRUE));

			$user = $this->db->get_where('users', ['email' => $email])->row_array();
			if ( $user && $user['password'] == NULL  ) { 
				$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert">
					Email Bubu sudah pernah terdaftar sebelumnya di website Sahabat Ibu Pintar. Mohon lakukan pembaruan password <a href='.base_url('auth/forgotPassword').'>DI SINI</a>.
				</div>');
				redirect('login');
			}

			$this->load->library('form_validation');

			$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[users.email]', 
				array(
						'required' 		=> 'Alamat email harus diisi',
						'valid_email'	=> 'Format alamat email yang anda masukkan salah. Pastikan format yang anda masukkan
											sesuai yourname@example.com',
						'is_unique' => 'Email sudah terdaftar',
					)
			);

			$rules = array(
				[
					'field' => 'user_password',
					'label' => 'Password',
					'rules' => 'callback_valid_password',
				]
			);

			$this->form_validation->set_rules($rules);

			
			// $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[8]|alpha_numeric',
			// 	array(
			// 			'required' 		=> 'Password harus diisi',
			// 			'matches' 		=> 'Password tidak sama. Ketik ulang password anda',
			// 			'min_length' 	=> 'Password harus terdiri dari minimal 8 karakter',
			// 			'alpha_numeric' => 'Password harus terdiri dari Huruf dan Angka',
			// 			'rules' 	=> 'callback_valid_password',
			// 		)
			// );

			$this->form_validation->set_rules('konfirmasi_password', 'Password Confirmation', 'required|matches[user_password]',
					array(
							'required' 		=> 'Password harus diketik ulang',
							'matches' 		=> 'Password tidak sama. Ketik ulang password anda',
							'min_length'	=> 'Password harus terdiri dari 8 karakter',
							'alpha_numeric' => 'Password harus terdiri dari Huruf dan Angka',
						)
			);

			if ($this->form_validation->run() == TRUE) {

				$this->load->helper('security');
				$password = $this->input->post('user_password', TRUE); 
				$hashed_password = password_hash($password, PASSWORD_DEFAULT);

				$input_data_user['email'] = htmlspecialchars($this->input->post('user_email', TRUE));				
				$input_data_user['password'] = $hashed_password;
				$input_data_user['is_active'] = '0';
				$input_data_user['created_at']   = date('Y-m-d H:i:s');
				$input_data_user['updated_at']   = date('Y-m-d H:i:s');				

				$input_data_regis['email'] = htmlspecialchars($this->input->post('user_email', TRUE));
				$input_data_regis['created_at']   = date('Y-m-d H:i:s');
				$input_data_regis['updated_at']   = date('Y-m-d H:i:s');

				$this->m_crud->add('users',$input_data_user);
				$this->m_crud->add('registrations',$input_data_regis);

				$this->send_mail($input_data_regis);

				$this->session->set_flashdata('msg','Data anda berhasil masuk, silahkan cek email anda untuk melakukan aktivasi');

				redirect('registration');

			}
		}

		$redirect_to = base_url('registration/with_facebook');
		$params['facebook_register_url'] = $this->facebook->create_auth_url($redirect_to);
		$params['flash'] = $this->session->flashdata('message');

		$google_client = new Google_Client();	
		$google_client->setClientId('354736706568-ktkaikjjs9kb3f3v5tbnpsl99pr5u14r.apps.googleusercontent.com'); //Define your ClientID
		$google_client->setClientSecret('bqwaQfJDgBywbBvFBgqN6xBa'); //Define your Client Secret Key
		$google_client->setRedirectUri('http://localhost/Sahabat-ibu-pintar/registration'); //Define your Redirect Uri
		$google_client->addScope('email');
		$google_client->addScope('profile');
		
		if(isset($_GET["code"]))
		{
		 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

		 if(!isset($token["error"]))
		 {
			$google_client->setAccessToken($token['access_token']);
	
			$this->session->set_userdata('access_token', $token['access_token']);
	
			$google_service = new Google_Service_Oauth2($google_client);
	
			$data = $google_service->userinfo->get();

			$uid = $data['id'];
			$email = $data['email'];
			$name = $data['given_name'].' '.$data['family_name'];
			$current_datetime = date('Y-m-d H:i:s');
	
			if($this->M_google->Is_already_register($email))
			{
				
				$this->session->set_flashdata('msg', '<b>'. $email .'</b> sebelumnya sudah mendaftar menggunakan akun Gmail.<br>Silahkan login di halaman login menggunakan akun Gmail');
				redirect(base_url('registration'));
			}
			else
			{
			 //insert data
			 $user_data = array(
				'name' => $name,
				'email' => $email,
				'oauth_uid' => $data['id'],
				'oauth_provider' => 'google',
				'is_active' => '1',
				'created_at' => $current_datetime,
				'updated_at' => $current_datetime
			 );
	
			 $this->M_google->Insert_user_data($user_data);
			}
			
		 }
		}

		$params['google_register_url'] =  $google_client->createAuthUrl();
	

		$this->load->view('include/header');
		$this->load->view('registration', $params);
		$this->load->view('include/footer');
	}

	public function with_facebook()
    {
        $code = $this->input->get('code');

        if ($code) {
            try {
                $helper = $this->facebook->create_helper();
                $access_token = $this->facebook->get_access_token();

                $this->facebook->set_access_token($access_token);
            }
            catch (Facebook\Exceptions\FacebookResponseException $e) {
                exit('Graph returned an error: ' . $e->getMessage());
            }
            catch (Facebook\Exceptions\FacebookSDKException $e) {
                exit('Facebook SDK returned an error: ' . $e->getMessage());
            }

            if (!isset($access_token)) {
                if ($helper->getError()) {
                    header('HTTP/1.0 401 Unauthorized');
                    echo "Error: " . $helper->getError() . "\n";
                    echo "Error Code: " . $helper->getErrorCode() . "\n";
                    echo "Error Reason: " . $helper->getErrorReason() . "\n";
                    echo "Error Description: " . $helper->getErrorDescription() . "\n";
                }
                else {
                    header('HTTP/1.0 400 Bad Request');
                    echo 'Bad request';
                }
                exit;
            }

						$user = $this->facebook->get_user();

            $uid = $user['id'];
            $name = $user['name'];
            $email = $user['email'];
            $picture = $user['picture'];

            if ($this->M_facebook->is_facebook_user_has_registered($uid)) {
                $this->session->set_flashdata('msg', '<b>'. $name .'</b> sebelumnya sudah mendaftar menggunakan akun Facebook.<br>Silahkan login di halaman login menggunakan akun Facebook');
                redirect(base_url('registration'));
            }
            else {
                $picture_name = strtolower($name);
                $picture_name = str_replace(' ', '-', $picture_name);

                $ch = curl_init($picture['url']);
                $fp = fopen('./assets/images/users/' . $picture_name .'.jpeg', 'wb');
                    curl_setopt($ch, CURLOPT_FILE, $fp);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_exec($ch);
                    curl_close($ch);
                fclose($fp);

                $user_data = [
                    'oauth_provider' => 'facebook',
                    'oauth_uid' => $uid,
                    'email' => $email,
                    'name' => $name,
										'picture' => $picture_name .'.jpeg',
										'is_active' => '1',
										'created_at' => date('Y-m-d H:i:s'),
										'updated_at' => date('Y-m-d H:i:s')
								];
								
								$user_data2 = [
									'email' => $email,
									'name' => $name,
									'created_at' => date('Y-m-d H:i:s'),
									'updated_at' => date('Y-m-d H:i:s')
							];

                $this->M_facebook->register_new_user($user_data);
                $this->M_facebook->register_new_user2($user_data2);

                $data = array('is_login' => TRUE, 'uid' => $uid);

                $this->session->set_userdata($data);

                $this->session->set_flashdata('msg', '<b>Berhasil!</b><br>Kamu berhasil mendaftar menggunakan akun Facebook. Selanjutnya, saat login silahkan gunakan tombol <b>Masuk dengan Facebook</b> dan tidak perlu memasukkan username / password');
                redirect('registration');
            }
        }
        else {
            show_404();
        }
    }
 
	public function send_mail($data){
		$to = $data['email'];
		$this->load->helper('security');
		$data['verified_code'] = do_hash(date('YmdHis').$to, 'md5'); // MD5
		$this->m_crud->edit('users',array('remember_token'=>$data['verified_code']),'email',$to);

		$this->load->library('email');
		$this->email->initialize($this->config->item('smtp_config'));

		$this->email->from($this->config->item('email_from'));
		$this->email->to($to);

		$this->email->subject('Sahabat ibu pintar Konfirmasi akun Anda');
		$data_email['content_email'] = $this->load->view('email/regis',$data,true);
		$html_email = $this->load->view('email/template',$data_email,true);
		$this->email->message($html_email);
		$this->email->send();
	}

	public function verify($code){
		
		$cek_user = $this->m_crud->get_row('users','remember_token',$code);

		if($cek_user['is_active']=='1'){
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">
				Account activation failed! Account already active.
			</div>');
			redirect('login');
		}

		$created = strtotime($cek_user['created_at']);
		
		if (time() - $created < (60*60*24) ) {

			if(!empty($cek_user)){
				$data = [
					'email_user' => $cek_user['email'],
					'name' => $cek_user['name']
				];
				$this->session->set_userdata($data);

				if($cek_user['is_active']=='0'){
					$data = array(
						'is_active' => '1',
						'email_verified_at	' => date('Y-m-d H:i:s')
					);
					$r = $this->m_crud->edit('users',$data,'remember_token',$code);
					if($r){
						$this->session->set_flashdata('sukses', 'Your account has been successfully verified, please login');
						redirect('verifikasi1');
					}
				} 		
			} else {
				$this->session->set_flashdata('message', 
					'<div class="alert alert-danger" role="alert">
						Account activation failed! wrong email.
					</div>');
				redirect('login');
			}

		} else{
			$this->session->set_flashdata('message', 
			'<div class="alert alert-danger" role="alert">
				Account activation failed! Token expired.
			</div>');
			redirect('login');
		}

	}	

	//Create strong password 
	public function valid_password($password = '')
	{
		$password = trim($password);

		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

		if (empty($password))
		{
			$this->form_validation->set_message('valid_password', 'Password harus diisi');

			return FALSE;
		}

		if (strlen($password) < 8)
		{
			$this->form_validation->set_message('valid_password', 'Password harus diisi dengan minimal 8 karakter');

			return FALSE;
		}

		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'Password harus diisi dengan minimal 1 huruf kecil');

			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'Password harus diisi dengan minimal 1 huruf kapital');

			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'Password harus diisi dengan minimal 1 angka');

			return FALSE;
		}

		// if (preg_match_all($regex_special, $password) < 1)
		// {
		// 	$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>ยง~'));

		// 	return FALSE;
		// }

		if (strlen($password) > 32)
		{
			$this->form_validation->set_message('valid_password', 'Password harus diisi dengan maksimal 32 karakter');

			return FALSE;
		}

		return TRUE;
	}
	//strong password end

	
}

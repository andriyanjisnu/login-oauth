<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{	
		parent::__construct();
		if(!empty($_SESSION['email_user'])) redirect(base_url());
		$this->module = "user";
		$this->table_name = "users";
		$this->load->helper('cookie','url');
		$this->load->library(array('facebook','google'));
    $this->load->model(array('M_facebook','M_google'));
		
	}

	public function index()	{	

		include_once APPPATH . "libraries/vendor/autoload.php";

		if ($_POST) {

			$this->load->library('form_validation');
			$this->form_validation->set_rules('user_pass', 'Password', 'required',
				array(
					'required' 		=> 'Password harus diisi',
				)
			);

			$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email', 
				array(
					'required' 		=> 'Alamat Email Tidak Boleh Kosong',
					'valid_email'	=> 'Format alamat email yang anda masukkan salah. Pastikan format yang anda masukkan
										sesuai yourname@example.com',
				)

			);

			if ($this->form_validation->run() == FALSE)	{
				// redirect('login');
			} else	{

				$email = $this->input->post('user_email', TRUE);
				$password = $this->input->post('user_pass', TRUE);

				$user = $this->db->get_where('users', ['email' => $email])->row_array();

				if ( $user['password'] == NULL  ) { 
					$this->session->set_flashdata('message', 
					'<div class="alert alert-success" role="alert">
					Email terdaftar sebelumnya. Mohon lakukan pembaruan password <a href='.base_url('auth/forgotPassword').'>DI SINI</a>.
					</div>');
					redirect('login');
				}

				// JIKA USER ADA
				if ( $user ) { 
					// JIKA USERNYA ACTIVE
					if ( $user['is_active'] == 1 ) { 
						// CEK PASSWORD
						if ( password_verify($password, $user['password']) ) { 
							$data = [
								'email_user' => $user['email'],
								'name' => $user['name'],
							];
							session_regenerate_id();
							$this->session->set_userdata($data);
							redirect(base_url());							
						} else {
							$this->session->set_flashdata('message', 
							'<div class="alert alert-danger" role="alert">
								Wrong password!
							</div>');
							redirect('login');		
						}
					} else {
						$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert">
							This Email has not been activated!
						</div>');
		
					}
				} else {

					$this->session->set_flashdata('message', 
						'<div class="alert alert-danger" role="alert">
							Email is not registered!
						</div>');
		
				}
			
			}			
		}

		$redirect_to = base_url('login/with_facebook');
		$params['flash'] = $this->session->flashdata('message');
		$params['facebook_login_url'] = $this->facebook->create_auth_url($redirect_to);

		$google_client = new Google_Client();	
		$google_client->setClientId(''); //Define your ClientID
		$google_client->setClientSecret(''); //Define your Client Secret Key
		$google_client->setRedirectUri(''); //Define your Redirect Uri
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
			 //update data
			 $user_data = array(
				'name' => $name,
				'email' => $email,
				'oauth_uid' => $uid,
				'oauth_provider' => 'google',
				'is_active' => '1',
				'created_at' => $current_datetime,
				'updated_at' => $current_datetime
			 );
	
			 $this->M_google->Update_user_data($user_data, $email);
			 $data = array('email_user' => $email, 'name' => $name);
			 session_regenerate_id();
			 $this->session->set_userdata($data);
			 redirect(base_url());
			}
			else
			{
				$this->session->set_flashdata('message', 'Akun <b>'. $name .'</b> dengan email <b>'. $email .'</b> belum terdaftar melalui Gmail.<br>Silahkan mendaftar terlebih Gmail');
				redirect('login');
			}
			
		 }
		}

		$params['google_login_url'] =  $google_client->createAuthUrl();
	
		$this->load->view('include/header');
		$this->load->view('login', $params);
		$this->load->view('include/footer');
	}

	public function with_facebook()
    {
        $code = $this->input->get('code');

        if ($code)
        {
            try {
                $helper = $this->facebook->create_helper();
                $access_token = $this->facebook->get_access_token();

                $this->facebook->set_access_token($access_token);
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                exit('Graph returned an error: ' . $e->getMessage());
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                exit('Facebook SDK returned an error: ' . $e->getMessage());
            }

            if (!isset($access_token)) {
                if ($helper->getError()) {
                    header('HTTP/1.0 401 Unauthorized');
                    echo "Error: " . $helper->getError() . "\n";
                    echo "Error Code: " . $helper->getErrorCode() . "\n";
                    echo "Error Reason: " . $helper->getErrorReason() . "\n";
                    echo "Error Description: " . $helper->getErrorDescription() . "\n";
                } else {
                    header('HTTP/1.0 400 Bad Request');
                    echo 'Bad request';
                }
                exit;
            }

						$user = $this->facebook->get_user();
						
            $uid = $user['id'];
            $email = $user['email'];
            $name = $user['name'];

            if ($this->M_facebook->is_facebook_user_exist($email, $uid))
            {
								$data = array('is_login' => TRUE, 'uid' => $uid, 'email_user' => $email, 'name' => $name);
																
                $this->session->set_userdata($data);

                $this->session->set_flashdata('message', 'Berhasil login!');
                redirect(base_url());
            }
            else
            {
                $this->session->set_flashdata('message', 'Akun <b>'. $name .'</b> dengan email <b>'. $email .'</b> belum terdaftar melalui Facebook.<br>Silahkan mendaftar terlebih dahulu');
                redirect('login');
            }
        }
        else
        {
            show_404();
        }
		}
		
	

	public function logout() {
		$this->session->unset_userdata('email_user');	
		$this->session->unset_userdata('name');	
		redirect('login');
	}


}

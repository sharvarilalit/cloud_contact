<?php
	class LoginController extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('LoginModel');  
            $this->load->library('form_validation'); 
		}
 
 
	public function index(){
		//load session library
		if($this->session->userdata('user')){
                     $this->load->view('templates/header');
                    // $this->load->view('templates/Login/Dashboard');
                    // $this->load->view('templates/Login/Home');
					 $this->load->view('templates/Contact/ContactView');
                     $this->load->view('templates/footer');
		}
		else{
                        $this->load->view('templates/header');
			            $this->load->view('templates/Login/LoginView');
                        $this->load->view('templates/footer');
		}
	}
 
    // //login func
	// public function login(){
	// 	//load session library
	// 	$output = array('error' => false);
 
	// 	$email = $_POST['email'];
	// 	$password = $_POST['password'];

    //     $this->form_validation->set_rules('email', 'Email', 'required');
	// 	$this->form_validation->set_rules('password', 'Password', 'required');
 
	// 	if ($this->form_validation->run() == FALSE)
	// 	{
	// 		$output['error'] = validation_errors();
	// 		$output['message'] = 'Login Invalid. User not found';
	// 	}
	// 	else
	// 	{
    //         $data = $this->LoginModel->login($email, $password);
    
    //         if($data){
    //             $this->session->set_userdata('user', $data);
    //             $output['message'] = 'Logging in. Please wait...';
    //         }
    //         else{
    //             $output['error'] = true;
    //             $output['message'] = 'Login Invalid. User not found';
    //         }
    //     }
	// 	echo json_encode($output); 
	// }
 
     //function to redirect dashboard 
	public function home(){
		if($this->session->userdata('user')){
			 $this->load->view('templates/header');
                       //  $this->load->view('templates/Login/Dashboard');
                        // $this->load->view('templates/Login/Home');
						$this->load->view('templates/Contact/ContactView');
                        $this->load->view('templates/footer');
                         $this->load->view('templates/footer');
		}
		else{
			redirect('/');
		}
 
	}
    //function to logout SNT 31052021    
        public function logout(){
		$this->session->unset_userdata('user');
		redirect('/');
	}

	 //login funcn updated
	 public function login(){
		//load session library
		$output = array('error' => false);
 
		$email = $_POST['email'];
		$password = $_POST['password'];

        $this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
 
		if ($this->form_validation->run() == FALSE)
		{
			$output['error'] = validation_errors();
			$output['message'] = 'Login Invalid. User not found';
		}
		else
		{
			$time=time()-30;
			$ip_address=$this->getIpAddr();

			$this->db->select('*');
			$this->db->from('contact_login_track');
			$this->db->where('TryTime>', $time); 
			$this->db->where('IpAddress', $ip_address); 
			$query = $this->db->get();
			//$check_login_row = $query;

			$total_count=$query->num_rows();
			//echo $total_count;
			if($total_count==3){
				$output['error'] = true;
                $output['message'] = 'To many failed login attempts. Please login after 30 sec';
			}
			else{
				$data = $this->LoginModel->login($email, $password);
				//echo $data;
				
				//print_r($data['ca_id']) ;
				if($data){
					$this->db->delete('contact_login_track', array('IpAddress' => $ip_address));
					$this->session->set_userdata('user', $data);
					$this->session->set_userdata('user_id', $data['ca_id']);
					$output['message'] = 'Logging in. Please wait...';
				}
				else{
					$total_count++;
					$rem_attm=3-$total_count;
					
					if($rem_attm==0){
						$output['error'] = true;
						$output['message'] = 'Please login after 30 sec';
					}else{
						$output['error'] = true;
                        $output['message'] = 'attempts remaining'.$rem_attm ;
					}
					$try_time=time();
					$data = array(
						'IpAddress' => $ip_address,
						'TryTime'  => $try_time
				    );
					$this->db->insert('contact_login_track',$data);
				}
			}
        }
		echo json_encode($output); 
	}

	// Getting IP Address
	function getIpAddr(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ipAddr=$_SERVER['HTTP_CLIENT_IP'];
		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
		$ipAddr=$_SERVER['REMOTE_ADDR'];
		}
		return $ipAddr;
	}

	//function to go to register view 
	public function register(){
		$this->load->view('templates/header');
		$this->load->view('templates/Register/RegisterView');
        $this->load->view('templates/footer');
	}

	//save records
	public function do_register(){
		//load session library
		$output = array('error' => false);
 
		$email = $_POST['email'];
		$password = $_POST['password'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$phone = $_POST['phone'];

        $this->form_validation->set_rules('email', 'Email','required|valid_email|is_unique[contact_admin.ca_email]');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required|is_unique[contact_admin.ca_phone_num]');
		$this->form_validation->set_rules('password', 'Password', 'required');
 
		if ($this->form_validation->run() == FALSE)
		{
			$output['error'] = validation_errors();
			$output['message'] = 'Registration failed';
		}
		else
		{
			//echo 1;
			$verification_key = md5(rand());
            $data = $this->LoginModel->do_register($email, $password,$fname, $lname, $phone, $verification_key);
			
			//echo $data;
			if($data>0)
			{
				$subject = "Please verify email for login";
				$message = "
				<p>Hi ".$_POST['fname']."</p>
				<p>This is email verification mail from Codeigniter Login Register system. For complete registration process and login into system. First you want to verify you email by click this <a href='".base_url()."register/".$verification_key."'>link</a>.</p>
				<p>Once you click this link your email will be verified and you can login into system.</p>
				<p>Thanks,</p>
				";
				$config = array(
				 'protocol'  => 'smtp',
				 'smtp_host' => 'ssl://smtp.googlemail.com',
				 'smtp_port' => 465,
				 'smtp_user'  => 'sharvaritendolkar36@gmail.com', 
				 'smtp_pass'  => 'ameyten9071999', 
				 'mailtype'  => 'html',
				 'charset'    => 'utf-8',
				 'wordwrap'   => TRUE
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('sharvaritendolkar36@gmail.com');
				$this->email->to($_POST['email']);
				$this->email->subject($subject);
				$this->email->message($message);
				if($this->email->send())
				{
				 $output['message'] = 'Check in your email for email verification mail';
				}
			   }
			  else
			  {
				$output['error'] = true;
				$output['message'] = 'Registration failed';
			  }

            // if($data){
            //     $output['message'] = 'Register Success...';
            // }
            // else{
            //     $output['error'] = true;
			// 	$output['message'] = 'Registration failed';
            // }
        }
		echo json_encode($output); 
	}

	//verify email on link click
	public 	function verify_email(){
		if($this->uri->segment(2))
		{
		$verification_key = $this->uri->segment(2);
		$result = $this->LoginModel->verify_email($verification_key);
		//echo $result;
		if($result)
		{
		$data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'login">here</a></h1>';
		}
		else
		{
		$data['message'] = '<h1 align="center">Invalid Link</h1>';
		}
		$this->load->view('templates/Register/emailVerification', $data);
		}
	}

	
}
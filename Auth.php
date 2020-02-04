<?php  
    
    class Auth extends CI_Controller{
        // this function will show the register page

        public function register(){

            $this->load->model('Auth_model');
            if ($this->Auth_model->authorized() == true){
                redirect(base_url().'index.php/Auth/dashboard');
            }
            $this->form_validation->set_message('is_unique','Email address already exist, please try Another.');
            // $this->form_validation->set_message('is_unique','Mobile_No already exist, please try Another.');
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[Ashish_User1.email]');
            $this->form_validation->set_rules('mobile','Mobile','required|max_length[10]|min_length[10]|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('password','Password','required');

            if ($this->form_validation->run()== false){
                // we will load our view
                $this->load->view('register');
            }else{
                //saverecord in to database 
                $formArray= array();
                $formArray['name']=$this->input->post('name');
                $formArray['email']=$this->input->post('email');
                $formArray['mobile']=$this->input->post('mobile');
                $formArray['password']=password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $formArray['created_at']=date('Y-m-d');
                $this->Auth_model->create($formArray);
                $this->session->set_flashdata('success','You are Resistered Successfully!');
                redirect(base_url().'index.php/Auth/register');
                
            }
        }

        public function login(){
            $this->load->model('Auth_model');
            if ($this->Auth_model->authorized() == true){
                redirect(base_url().'index.php/Auth/dashboard');

            }
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('password','Password','required');

            if ($this->form_validation->run()== true){
                // No Error
                $email=$this->input->post('email');
                $user = $this->Auth_model->checkUser($email);
                if(!empty($user)){
                    $password=$this->input->post('password');
                    if(password_verify($password,$user['password'])==true ){
                        $sessArray['id']=$user['id'];
                        $sessArray['name']=$user['name'];
                        $sessArray['email']=$user['email'];
                        $sessArray['mobile']=$user['mobile'];
                        $this->session->set_userdata('user',$sessArray);

                        redirect(base_url().'index.php/Auth/dashboard');
                    }else{
                        $this->session->set_flashdata('Failed','Eighter email or possword is incorrect, please try again!');
                        redirect(base_url().'index.php/Auth/login');
                    }
                }else{
                $this->session->set_flashdata('Failed','Eighter email or possword is incorrect, please try again!');
                redirect(base_url().'index.php/Auth/login');
                }
            }else{
            $this->load->view('login');
            }              
        }

        function dashboard()
        {
            $this->load->model('Auth_model');
            if ($this->Auth_model->authorized() == false){
                $this->session->set_flashdata('Failed','You are not Authorized  to access this section');
                redirect(base_url().'index.php/Auth/login');

            }
            $user=$this->session->userdata('user');
            $data['user'] = $user;
            $this->load->view('dashboard',$data);
        }
        function logout(){
            $this->session->unset_userdata('user');
            redirect(base_url().'index.php/Auth/login');
        }

    }
?>
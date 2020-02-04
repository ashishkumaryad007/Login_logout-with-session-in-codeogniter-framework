<?php

    class Auth_model extends CI_Model{

        // this function will save the user record in the databse

        public function create($formArray){

            $this->db->insert('Ashish_User1',$formArray);

        }
        // this method will return a row array based on emailed entered.
        public function checkUser($email){

            $this->db->where('email',$email);
            return $row=$this->db->get('Ashish_User1')->row_array();
        }
        // check user authorization
        function authorized(){
            $user=$this->session->userdata('user');
            if(!empty($user)){
                return true;
            }else{
                return false;
            }
        }
    }


?>
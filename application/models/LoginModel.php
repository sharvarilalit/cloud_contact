<?php
	class LoginModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // public function login($email, $password) {

    //     $data = array(
    //         'co_email' => $email,
    //         'co_password' => MD5($password)
    //     );


    //     $res = $this->db->insert('contact_login_track', $data);

    //     if ($res) {
    //         //$query = $this->db->get_where('contact_admin', array('ca_email' => $email, 'ca_password' => $password));
    //         $this->db->where('ca_password =', $password);
    //         $this->db->where('ca_email =', $email);
    //         $this->db->or_where('ca_phone_num =', $email);
    //         $query = $this->db->get('contact_admin');

    //         return $query->row_array();
    //     } else {
    //         return false;
    //     }
    // }

     public function do_register($email, $password,$fname, $lname, $phone, $verification_key) {
        $data = array(
            'ca_fname'  => $fname, 
            'ca_lname' => $lname, 
            'ca_password' => $password, 
            'ca_email' => $email, 
            'ca_phone_num' => $phone,
            'verification_key' => $verification_key
        );
       $result=$this->db->insert('contact_admin',$data);
       return $this->db->insert_id();
    }

    function verify_email($key)
    {
    $this->db->where('verification_key', $key);
    $this->db->where('verification_status', 0);
    $query = $this->db->get('contact_admin');
    if($query->num_rows() > 0)
    {
    $data = array(
        'verification_status'  => 1
    );
    $this->db->where('verification_key', $key);
    $this->db->update('contact_admin', $data);
    return true;
    }
    else
    {
    return false;
    }
    }


    public function login($email, $password) {
            //$query = $this->db->get_where('contact_admin', array('ca_email' => $email, 'ca_password' => $password));
            $this->db->where('ca_password =', $password);
            $this->db->where('verification_status =', 1);
            $this->db->where('ca_email =', $email);
            $this->db->or_where('ca_phone_num =', $email);
            $query = $this->db->get('contact_admin');
            
            return $query->row_array();
    }

}

?>
<?php
	class ContactModel extends CI_Model {

        function contact_list(){
            //$hasil=$this->db->get('contact_table');
            $hasil = $this->db->get_where('contact_table', array('ca_id' => $_SESSION['user_id']));
            return $hasil->result();
        }
     
        function save_contact(){
            $data = array(
                    'ct_fname'  => $this->input->post('ct_fname'), 
                    'ct_lname'  => $this->input->post('ct_lname'), 
                    'ct_email' => $this->input->post('ct_email'), 
                    'ct_phone_num'  => $this->input->post('ct_phone_num'), 
                    'ct_address'  => $this->input->post('ct_address'), 
                    'ct_company' => $this->input->post('ct_company'), 
                    'ct_nickname' => $this->input->post('ct_nickname'), 
                    'ca_id' => $_SESSION['user_id']
                );
            $result=$this->db->insert('contact_table',$data);
            return $result;
        }
     
        function update_contact(){
            $this->db->set('ct_fname', $this->input->post('ct_fname'));
            $this->db->set('ct_lname', $this->input->post('ct_lname'));
            $this->db->set('ct_phone_num', $this->input->post('ct_phone_num'));
            $this->db->set('ct_email', $this->input->post('ct_email'));
            $this->db->set('ct_address', $this->input->post('ct_address'));
            $this->db->set('ct_company', $this->input->post('ct_company'));
            $this->db->set('ct_nickname', $this->input->post('ct_nickname'));
            $this->db->where('ct_id', $this->input->post('ct_id'));
            $result=$this->db->update('contact_table');
            return $result;
        }
     
        function delete_contact(){
            $ct_id=$this->input->post('ct_id');
            $this->db->where('ct_id', $ct_id);
            $result=$this->db->delete('contact_table');
            return $result;
        }


        function getContactDetails(){
 

            // Select record
            $this->db->select('ct_fname,ct_lname,ct_email,ct_phone_num,ct_address,ct_company,ct_nickname,ct_status');
            $q = $this->db->get('contact_table');
            return $q;
          }

          //insert multiple data one time
          function insert($data)
            {
            $this->db->insert_batch('contact_table', $data);
            }
}

?>
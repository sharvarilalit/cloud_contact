<?php
	class ContactController extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('ContactModel');  
            $this->load->library('form_validation');
            $this->load->library('csvimport');
 
		}
 
        function index(){

            if($this->session->userdata('user')){
                $this->load->view('templates/header');
                 $this->load->view('templates/Login/Dashboard');
                  $this->load->view('templates/Contact/ContactView');
                 $this->load->view('templates/footer');
           }
           else{
               redirect('/');
           }

        }
     
        function contact_data(){
            $data=$this->ContactModel->contact_list();
            echo json_encode($data);
        }
     
        function contact_save(){

            $this->form_validation->set_rules('ct_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('ct_fname', 'First Name', 'required');
            $this->form_validation->set_rules('ct_phone_num', 'Phone Number', 'required');

     
            if ($this->form_validation->run() == FALSE)
            {
                $output['error'] = validation_errors();
                $output['message'] = 'Contact failed';
            }
            else
            {
    
                $data=$this->ContactModel->save_contact();
        
                if($data){
                    $output['message'] = 'Contact Save Success...';
                }
                else{
                    $output['error'] = true;
                    $output['message'] = 'Contact Failed';
                }
            }
            
            echo json_encode($output);
        }
     
        function update(){
            $this->form_validation->set_rules('ct_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('ct_fname', 'First Name', 'required');
            $this->form_validation->set_rules('ct_phone_num', 'Phone Number', 'required');

     
            if ($this->form_validation->run() == FALSE)
            {
                $output['error'] = validation_errors();
                $output['message'] = 'Contact failed';
            }
            else
            {
                $data=$this->ContactModel->update_contact();
                if($data){
                    $output['message'] = 'Contact Update Success...';
                }
                else{
                    $output['error'] = 'Contact Update failed';
                    $output['message'] = 'Contact Update Failed';
                }
            }
            echo json_encode($output);
        }
     
        function delete(){
            $data=$this->ContactModel->delete_contact();
            echo json_encode($data);
        }


        // Export data in CSV format 
        public function exportCSV(){ 
            $filename = 'users_'.date('Ymd').'.csv'; 
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=$filename"); 
            header("Content-Type: application/csv; ");
        // get data 
            $usersData = $this->ContactModel->getContactDetails();
            // file creation 
            $file = fopen('php://output','w');
            $header = array("First Name"," Last Name","Email","Contact", "Address", "Company", "Nick Name","Status"); 
            fputcsv($file, $header);
            foreach ($usersData->result_array() as $key => $value)
            { 
              fputcsv($file, $value); 
            }
            fclose($file); 
            exit; 
        }

        // Import data in CSV format 
        public function importCSV(){ 
            $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
            foreach($file_data as $row)
            {
             $data[] = array(
                    'ct_fname' => $row["First Name"],
                    'ct_lname'  => $row["Last Name"],
                    'ct_email'   => $row["Email"],
                    'ct_phone_num'   => $row["Contact"],
                    'ct_address' => $row["Address"],
                    'ct_company'   => $row["Company"],
                    'ct_nickname'   => $row["Nick Name"],
                    'ct_status'   => $row["Status"]
             );
            }
            $this->ContactModel->insert($data);
        }

        function share_link($id){
            $id= $this->uri->segment(2);
            //print_r($id);
            $token = md5(rand());
            $time=time();

                $data = array(
                    'ct_id' => $id,
                    'sl_token'  => $token,
                    'exp_time' => $time
                );
              $result = $this->db->insert('share_link',$data);
              if($result){
                $data['message'] = "<p><a href='".base_url()."contact/".$token."/".$id."'>Ckick This Link to View record</a></p>";
              }
              else{
                $data['message'] = '<h1 align="center">Invalid Link</h1>';
              }

              $this->load->view('templates/Contact/ShareLinkView', $data);
        }

        public 	function verify_link(){
            if($this->uri->segment(2)&& $this->uri->segment(3))
            {
            $token = $this->uri->segment(2);
            $id = $this->uri->segment(3);
            $current_time = time();

            $this->db->select('*');
			$this->db->from('share_link');
			$this->db->where('sl_token', $token); 
			$this->db->where('ct_id', $id); 
			$query = $this->db->get()->row();  
            $exp_time = $query->exp_time;
            
            // print_r($query);
            // print_r(time() - $exp_time);

            $result['contact'] = $this->db->get_where('contact_table', array('ct_id=' => $id))->row();
            
            if(time() - $exp_time < 3600){
                $this->load->view('templates/Contact/ContactDetail', $result);
            }
            else{
                //redirect('/', 'refresh');
            }
           
        }
    }

}
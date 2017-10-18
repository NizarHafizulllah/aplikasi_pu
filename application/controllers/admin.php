<?php 


class admin extends admin_controller {
	
	var $controller;
	public function admin(){
		parent::__construct();
		$this->controller = get_class($this);
	}
	
		function index(){

		

		


		$data_array=array();

		

		$content = $this->load->view("admin/index_view",$data_array,true);

		$this->set_subtitle("Desa Labuhan Ijuk");
		$this->set_title("BERANDA");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


	function get_data() {

    	


    	

    	$this->db->select("p.*, j.jenis as jenis, j.icon as icon")->from("properti p");
		$this->db->join('jenis j','j.id=p.jenis');
        $result = $this->db->get()->result_array();


		
        $data = array();
        foreach($result as $row) : 
		
        	$icon = base_url("upload_file/icon/".$row["icon"]);
        	$image = base_url("upload_file/image/".$row["image"]);
        
        	$data[] = array(
                "lat" => $row['lat'],
        		"lng" => $row['lng'],
        		"icon" => $icon,
                "jenis" => $row['jenis'],
                "nama" => $row['nama'],
                "image" => $image,
        		
         			 
        		  				);
        endforeach;

        //  show_array($data);
        // exit();
         
        echo json_encode($data); 
    }


}
?>
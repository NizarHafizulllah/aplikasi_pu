<?php 
class coba_map extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->controller = get_class($this);
		$this->load->helper("tanggal");
		$this->load->helper("url");
		$this->load->helper("kirimemail");
		//$this->load->helper("serviceurl");
		
	}
	
	function index(){
		$this->load->view("coba_map_view");
	}



	 function get_data() {

    	


    	$result = $this->db->get('properti')->result_array();
        
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

         
         
        echo json_encode($data); 
    }

	
	
	


}

?>

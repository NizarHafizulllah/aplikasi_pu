<?php 

class properti_model extends CI_Model {


	function properti_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
							"nama",
							'jenis'							 
		 	);

				

		 
		$this->db->select("p.*, j.jenis as jenis")->from("properti p");
		$this->db->join('jenis j','j.id=p.jenis');

		

		 
		 	
		 if(!empty($nama)) {
		 	$this->db->like("p.nama",$nama);
		 }
		 if(!empty($jenis)) {
		 	$this->db->like("p.jenis",$jenis);
		 }

		 

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>
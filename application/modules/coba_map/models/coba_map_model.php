<?php 

class lihat_data_model extends CI_Model {


	function __construct(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
							"nama",
							'no_kk'							 
		 	);

				

		 
		

		

		 
		 	
		

		 

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('properti');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>
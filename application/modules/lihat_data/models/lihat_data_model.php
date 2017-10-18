<?php 

class lihat_data_model extends CI_Model {


	function lihat_data_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"nik",
							"nama",
							'no_kk'							 
		 	);

				

		 
		

		

		 
		 	
		 if(!empty($nik)) {
		 	$this->db->like("nik",$nik);
		 }
		 if(!empty($nama)) {
		 	$this->db->like("nama",$nama);
		 }
		 if(!empty($no_kk)) {
		 	$this->db->like("no_kk",$no_kk);
		 }

		 

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get('penduduk');
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>
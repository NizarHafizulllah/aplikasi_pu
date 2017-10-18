<?php 
class jenis extends admin_controller{
	var $controller;
	function jenis(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model($this->controller.'_model','dm');
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}









function index(){
		$data_array=array();
        $userdata = $this->session->userdata('user_login');

        
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Data Hasil Import");
		$this->set_title("Data Hasil Import");
		$this->set_content($content);
		$this->cetak();
}


function baru(){
        $data_array=array();

        $data_array['action'] = 'simpan';

        $data_array['arr_jenis'] = $this->cm->arr_dropdown("jenis", "id", "jenis", "jenis");


        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Tambah Properti");
        $this->set_title("Tambah Properti");
        $this->set_content($content);
        $this->cetak();
}


function simpan(){


    $post = $this->input->post();
    
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('jenis','Jenis','required');  
              
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

       
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        $config['upload_path'] = './upload_file/icon';
                $path = $config['upload_path'];
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['encrypt_name'] = 'TRUE';


             $this->load->library('upload', $config);

        $filename_arr = array();
        foreach ($_FILES as $key => $value) {
            if (!empty($value['tmp_name']) && $value['size'] > 0) {
            if (!$this->upload->do_upload($key)) {
               // some errors
            } else {
                // Code After Files Upload Success GOES HERE
                $data_name = $this->upload->data();
                $filename_arr[] = $data_name['file_name'];
            }
        }
    }

    $post['icon'] = $filename_arr[0];

    // show_array($post);
    // exit();
        
        $res = $this->db->insert('jenis', $post); 
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}





    function get_data() {

    	

        // $this->db->select('nama_file, COUNT(nama_file) as total');
        // $this->db->group_by('nama_file'); 
        // $this->db->order_by('total', 'desc'); 
        // $group = $this->db->get('stck_non_provite')->result_array();
        // // echo $this->db->last_query();
        // foreach ($group as $row) {
        //     echo $row['nama_file'];
        //     echo $row['total'];
        // }
        // exit;
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
        $nama = $_REQUEST['columns'][1]['search']['value'];
        $jenis = $_REQUEST['columns'][2]['search']['value'];

        $userdata = $this->session->userdata('admin_login');



        // show_array($userdata);exit();
      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
                "nama" => $nama,
                "jenis" => $jenis,
				
				 
		);     
           
        $row = $this->dm->data($req_param)->result_array();
        // echo $this->db->last_query();exit;
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();
        

       // echo base_url("assets/birojasa");
        $arr_data = array();
        foreach($result as $row) : 
		// $daft_id = $row['daft_id'];
        $id = $row['id'];
        $icon = '<img src="'.base_url("upload_file/icon/".$row["icon"]).'" width="34" height="34">';
        $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-info'>Action</button>
                              <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                              <li><a href='tambah_penduduk/edit?id=$id'  ><i class='fa fa-edit'></i> Edit</a></li>
                              <li><a href ='#' onclick=\"hapus('$id')\"><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='lihat_data/detail?id=$id'  ><i class='fa fa-eye'></i> Detail</a></li>
                              </ul>
                            </div>";
        
        
        	$arr_data[] = array(
                $row['id'],
        		$row['jenis'],
                $icon,
                $action,
        		
         			 
        		  				);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
    }

    


    function detail(){

        $get = $this->input->get(); 
        $nik = $get['nik'];

        $this->db->where('nik',$nik);
        $penduduk = $this->db->get('penduduk');



        $data_array=array();
        $data_array = $penduduk->row_array();
        $data_array['tgl_lhr'] = flipdate($data_array['tgl_lhr']);
        
        // show_array($data_array);
        // exit();
        
        $content = $this->load->view("detail_view",$data_array,true);

        $this->set_subtitle("Detail Data Penduduk");
        $this->set_title("Detail Data Penduduk");
        $this->set_content($content);
        $this->cetak();
}




    function editdata(){
    	 $get = $this->input->get(); 
    	 $id = $get['id'];

    	 $this->db->where('id',$id);
    	 $res = $this->db->get('dealer');
    	 $data = $res->row_array();

         $this->session->set_userdata('jenis', array('action'=>'update', 'id'=>$id));

        $data['arr_dealer'] = $this->cm->arr_dropdown("dealer", "id", "nama", "nama");


        $data['action'] = 'update';
         // show_array($data); exit;
    	 
		

    	// $data_array=array(
    	// 		'id' => $data->id,
    	// 		'nama' => $data->nama,
    	// 		'no_siup' => $data->no_siup,
    	// 		'no_npwp' => $data->no_npwp,
    	// 		'no_tdp' => $data->no_tdp,
    	// 		'telp' => $data->telp,
    	// 		'alamat' => $data->alamat,
    	// 		'email' => $data->email,
    	// 		'hp' => $data->hp,

    	// 	);
		$content = $this->load->view($this->controller."_form_view",$data,true);

         // $content = $this->load->view($this->controller."_form_view",$data,true);

		$this->set_subtitle("Edit Biro Jasa");
		$this->set_title("Edit Biro Jasa");
		$this->set_content($content);
		$this->cetak();

    }







function update(){

    $post = $this->input->post();
   
       


        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama','Nama Dealer','required');    
        $this->form_validation->set_rules('alamat','Alamat Dealer','required');          
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 


        $this->db->where("id",$post['id']);
        $res = $this->db->update('dealer', $post); 
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DIUPDATE");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DIUPDATE");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}



    function hapusdata(){
    	$get = $this->input->post();
    	$nik = $get['nik'];

    	$data = array('nik' => $nik, );

    	$res = $this->db->delete('penduduk', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
    	//redirect('sa_birojasa_user');
        echo json_encode($arr);
    }



	// function simpan(){
	// 	$post = $this->input->post();
	// 	$password = md5($post['password']);
	// 	$data = array('nama' => $post['nama'],
	// 					'email' => $post['email'],
	// 					'alamat' => $post['alamat'],
	// 					'password' => $password,
	// 					'level' => 2);
	// 	$this->db->insert('sa_birojasa_user', $data); 

	// 	redirect('sa_birojasa_user');
	// }





	

}

?>
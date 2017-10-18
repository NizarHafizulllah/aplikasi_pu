<?php 
class import_data extends admin_controller{
	var $controller;
	function import_data(){
		parent::__construct();

		$this->controller = get_class($this);
		// $this->load->model('admin_penduduk_model','dm');
        $this->load->model("coremodel","cm");
		$this->load->helper("tanggal");
		$this->load->library("session");
		
	}


    function cekNIK(){
        $nik = $this->input->post('nik');
        $valid = true;
        $this->db->where('nik', $nik);
        $jumlah = $this->db->get("penduduk")->num_rows();    
        if($jumlah == 1) {
            $valid = false;
        }
        
        echo json_encode(array('valid' => $valid));
    
    }






function index(){
		$data_array=array();

		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Data");
		$this->set_title("Data");
		$this->set_content($content);
		$this->cetak();
}



function import(){
	$userdata = $this->session->userdata('admin_login');
	$config['upload_path'] = './temp_upload/';
	$this->db->where('user_id', $userdata['id']);
	$this->db->delete('temp_penduduk');
	
	if(!is_uploaded_file($_FILES['xlsfile']['tmp_name'])) {
			$ret = array("error"=>true,'pesan'=>"error");
			echo json_encode($ret);
			redirect(site_url('import_data'));
		}
	else {
		$full_path = $config['upload_path']. date("dmYhis")."_".$_FILES['xlsfile']['name'];
		copy($_FILES['xlsfile']['tmp_name'],$full_path);
		$this->load->library('excel');

		$objPHPExcel = PHPExcel_IOFactory::load($full_path);
		$arr_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);	

		
		$filename = $_FILES['xlsfile']['name'];
		

		$i=3;


		$hasil = array();

		foreach($arr_data   as  $index =>  $data) : 
			//echo "index $index <br />" ;
			// show_array($data);
		// echo $i.'<br />';
		// echo $data[$i]['A'] . '<br />'; 
		// $i++;
		
		if($index == 1)  continue;

		// $nama_pekerjaan = ;
		// $pekerjaan = ;
		// $id_pekerjaan = $pekerjaan;
		// echo $id_pekerjaan;exit;	

			$hasil = array(
			 
		
		"nik" 			=>$data['B'],
		"no_kk" 		=>$data['A'],
		"nama" 			=>$data['C'],
		"jk" 			=>$data['D'],
		"tmpt_lhr" 		=>$data['E'],
		"tgl_lhr" 		=>$data['F'],
		"gdr" 		=>$data['G'],
		"agama" 			=>$data['H'],
		"status" 		=>$data['I'],
		"shdk" 		=>$data['J'],
		"shdrt" 			=>$data['K'],
		"pddk_akhir" 		=>$data['L'],
		"pekerjaan" 	=>$data['M'],
		"nama_ibu" 		=>$data['N'],
		"nama_ayah" 		=>$data['O'],
		"nama_kk" 		=>$data['P'],
		"alamat" 		=>$data['Q'],
		"rt" 		=> ''.$data['R'].'',
		"rw" 		=>$data['S'],
		"nama_prop" 		=>$data['T'],
		"nama_kab" 		=>$data['U'],
		"nama_kec" 		=>$data['V'],
		"nama_kel" 		=>$data['W'],


		"user_id" => $userdata['id'],
		"jenis_perubahan" => 'T',
		
					);


			// $hasil['tgl_lhr'] = indo_date($hasil['tgl_lhr']);
			$this->db->insert('temp_penduduk', $hasil);
			endforeach;
			// echo $hasil['tgl_lhr'];
			// show_array($hasil); 
			// echo $this->db->last_query();
			// exit;
				$xdata = $hasil;
				// $this->session->set_userdata('agu', $xdata);
				// $userdata = $this->session->userdata('agu');
				// show_array($userdata);exit;
				// $_SESSION['xdata'] = $xdata;
				$arrdata['title'] = "IMPORT DATA";
				$this->db->where('user_id', $userdata['id']);
		 		$arrdata['data'] = $this->db->get('temp_penduduk')->result_array();
		 		$arrdata['controller'] = "import_data";
			   	$content = $this->load->view($this->controller."_preview",$arrdata,true);
		}

		// show_array($penduduk);
		// exit();

			$this->set_subtitle("Data Import");
			$this->set_title("Data Import");
			$this->set_content($content);
			$this->cetak();

}


function save(){

		
		$userdata = $this->session->userdata("admin_login");
		// $tes = $this->session->userdata("hello");
		// show_array($hasil_data); exit;

		// session_start();
		// show_array($_POST['data']);exit();
		$post = $this->input->post();
		// $xdata = $datalogin['xdata']; 
		
		$true = 0;
		$false = 0; 

		$arr_berhasil = array();
		$arr_gagal = array();

		if (!empty($post['data'])) {
			foreach($post['data'] as $index) : 
			
			$this->db->where('nik', $index);
			$res = $this->db->get('temp_penduduk')->row_array();
			$nik = $res['nik'];
			unset($res['user_id']);
			unset($res['jenis_perubahan']);
					
			// echo $res['no_reg'];
			// exit;
			$data_update = array();
			$this->db->where('nik', $res['nik']);
			$res2 = $this->db->get('penduduk');

			$baris = $res2->num_rows();
			// echo $this->db->last_query();
			// exit();
			if ($baris>=1) {
				$update = $res2->row_array();
				
				// show_array($update);
				// echo "FUCK";
				// exit;
				$this->db->where('nik', $update['nik']);
				$this->db->update('penduduk', $res);
				$data_update = array('jenis_perubahan' => 'U' );
				$this->db->where('nik', $nik);
				$this->db->update('temp_penduduk', $data_update);
			}else{
				
				
				$this->db->insert('penduduk', $res);

				$data_update = array('jenis_perubahan' => 'S' );
				$this->db->where('nik', $nik);
				$this->db->update('temp_penduduk', $data_update);
			}



				
				
			
			
			endforeach;
		}

		

		// exit;
				

				$this->db->where('jenis_perubahan', 'S');
				$this->db->where('user_id', $userdata['id']);
				$simpan = $this->db->get('temp_penduduk')->num_rows();

				$this->db->where('jenis_perubahan', 'U');
				$this->db->where('user_id', $userdata['id']);
				$update = $this->db->get('temp_penduduk')->num_rows();

				$this->db->where('jenis_perubahan', 'T');
				$this->db->where('user_id', $userdata['id']);
				$tidak_dipilih = $this->db->get('temp_penduduk')->num_rows();
		
		 		
		 		$arrdata['simpan'] = $simpan;
		 		$arrdata['update'] = $update;
		 		$arrdata['tidak_dipilih'] = $tidak_dipilih;
		 		$arrdata['arr_berhasil'] = $arr_berhasil;
		 		$arrdata['arr_gagal'] = $arr_gagal;
		 		$arrdata['controller'] = "penduduk_import";
			   	$content = $this->load->view("import_data_result",$arrdata,true);
			   	$now = date('Y-m-d');
				$this->set_subtitle("Hasil Import Data Tanggal ".flipdate($now));
				$this->set_title("Hasil Import Data ");
				$this->set_content($content);
				$this->cetak();
	}



    function coba() {
    	$data1 = array(
    			'1' => '1234',
    			'2' => '1234',
    			'3' => '1234',
    			'4' => '1234',
    		);

    	$data = array(
    			'satu' => $data1,
    			'dua' => 'kambing',
    			'tiga' => 'kambing',
    			'empat' => 'kambing',
    			'df' => $data1,
    			'ssfatsu' => $data1,
    			'safdtu' => $data1,
    			'safdftu' => $data1,
    			'safdfdsertu' => $data1,
    			'satdfdfu' => $data1,

    		);
    	$this->session->set_userdata('coba', $data);


    }

    function tes() {

$tes = $this->session->userdata("hello");
		show_array($tes);
    }

    function tes2() {

    	$this->session->unset_userdata('coba');

    }



}

?>

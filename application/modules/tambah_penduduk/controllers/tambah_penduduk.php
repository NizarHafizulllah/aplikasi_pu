<?php 
class tambah_penduduk extends admin_controller{
	var $controller;
	function tambah_penduduk(){
		parent::__construct();

		$this->controller = get_class($this);
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}









function index(){
		$data_array=array();
        $userdata = $this->session->userdata('user_login');
        $data_array['action'] = 'simpan';
        $data_array['arr_kelamin'] = array( '' => '- PILIH JENIS KELAMIN -',
        								'L' => 'LAKI-LAKI',
        								'P' => 'PEREMPUAN' );

        $data_array['arr_status'] = array( '' => '- PILIH STATUS -',
        								'KAWIN' => 'KAWIN',
        								'BELUM KAWIN' => 'BELUM KAWIN',
        								'CERAI HIDUP' => 'CERAI HIDUP',
        								'CERAI MATI' => 'CERAI MATI',
        								 );



         $data_array['arr_pendidikan'] = array( '' => '- PILIH PENNDIDIKANN TERAKHIR -',
        								'TIDAK/BELUM SEKOLAH' => 'TIDAK/BELUM SEKOLAH',
        								'BELUM TAMAT SD/SEDERAJAT' => 'BELUM TAMAT SD/SEDERAJAT',
        								'TAMAT SD/SEDERAJAT' => 'TAMAT SD/SEDERAJAT',
        								'SLTP/SEDERAJAT' => 'SLTP/SEDERAJAT',
        								'SLTA/SEDERAJAT' => 'SLTA/SEDERAJAT',
        								'DIPLOMA I/II' => 'DIPLOMA I/II',
        								'AKADEMI/DIPLOMA III/SARJANA MUDA' => 'AKADEMI/DIPLOMA III/SARJANA MUDA',
        								'DIPLOMA IV/STRATA I' => 'DIPLOMA IV/STRATA I',
        								'STRATA II' => 'STRATA II',
        								'STRATA III' => 'STRATA III',
        								 );

        $data_array['arr_agama'] = array( '' => '- PILIH AGAMA -',
        								'ISLAM' => 'ISLAM',
        								'KATHOLIK' => 'KATHOLIK',
        								'KRISTEN' => 'KRISTEN',
        								'BUDDHA' => 'BUDDHA',
        								'HINDU' => 'HINDU',
        								'KONGHUCU' => 'KONGHUCU', );

        $data_array['arr_darah'] = array( '' => '- PILIH GOL. DARAH -',
        								'O' => 'O',
        								'A' => 'A',
        								'B' => 'B',
        								'AB' => 'AB' );

        $data_array['arr_shdk'] = array( '' => '- HUBUNGAN DALAM KELUARGA -',
        								'KEPALA KELUARGA' => 'KEPALA KELUARGA',
        								'ISTRI' => 'ISTRI',
        								'MENANTU' => 'MENANTU',
        								'ANAK' => 'ANAK',
        								 'SAUDARA' => 'SAUDARA',
        								 'CUCU' => 'CUCU',
        								 'MERTUA' => 'MERTUA',
        								 'SUAMI' => 'SUAMI',
        								 'ORANG TUA' => 'ORANG TUA',);


        $data_array['arr_shdrt'] = array( '' => '- SHDRT -',
        								'1' => '1',
        								'2' => '2',
        								'3' => '3',
        								'4' => '4',
        								'5' => '5',
        								'6' => '6',
        								'7' => '7',
        								'8' => '8',
        								'9' => '9',
        								'10' => '10',
        								'11' => '11',
        								'12' => '12',
        								'13' => '13', );
        
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Tambah Data Penduduk");
		$this->set_title("Tambah Data Penduduk");
		$this->set_content($content);
		$this->cetak();
}



function simpan(){

	$post = $this->input->post();
	// show_array($post);

	 $this->load->library('form_validation');
        $this->form_validation->set_rules('nik','NIK','required');    
        $this->form_validation->set_rules('no_kk','No. KK','required');
        $this->form_validation->set_rules('nama','Nama','required');    
        $this->form_validation->set_rules('jk','Jenis Kelamin','required');
        $this->form_validation->set_rules('tmpt_lhr','Tempat Lahir','required');    
        $this->form_validation->set_rules('tgl_lhr','Tanggal Lahir','required');
        $this->form_validation->set_rules('agama','Agama','required'); 
        $this->form_validation->set_rules('status','Status','required');
        $this->form_validation->set_rules('nama_kk','Nama Kepala Keluarga','required');
        $this->form_validation->set_rules('shdk','SHDK','required');
        $this->form_validation->set_rules('shdrt','SHDRT','required');
        $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
        $this->form_validation->set_rules('pddk_akhir','Pendidikan Terakhir','required');
        $this->form_validation->set_rules('nama_ibu','Nama Ibu','required');
        $this->form_validation->set_rules('nama_ayah','Nama Ayah','required');
        $this->form_validation->set_rules('alamat','Alamat','required');  
        $this->form_validation->set_rules('rt','RT','required'); 
        $this->form_validation->set_rules('rw','RW','required');  

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     
        
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        $post['tgl_lhr'] = flipdate($post['tgl_lhr']);
        $post['nama_prop'] = "NUSA TENGGARA BARAT";
        $post['nama_kab'] = "SUMBAWA";
        $post['nama_kec'] = "MOYO HILIR";
        $post['nama_kel'] = "LABUHAN IJUK";
        $res = $this->db->insert('penduduk', $post); 
        
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


function edit(){

		$get = $this->input->get(); 
        $nik = $get['nik'];

        $this->db->where('nik',$nik);
        $penduduk = $this->db->get('penduduk');



		$data_array=array();
		$data_array = $penduduk->row_array();
		$data_array['tgl_lhr'] = flipdate($data_array['tgl_lhr']);
        $userdata = $this->session->userdata('user_login');
        $data_array['action'] = 'update';
        $data_array['arr_kelamin'] = array( '' => '- PILIH JENIS KELAMIN -',
        								'L' => 'LAKI-LAKI',
        								'P' => 'PEREMPUAN' );

        $data_array['arr_status'] = array( '' => '- PILIH STATUS -',
        								'KAWIN' => 'KAWIN',
        								'BELUM KAWIN' => 'BELUM KAWIN',
        								'CERAI HIDUP' => 'CERAI HIDUP',
                                        'CERAI MATI' => 'CERAI MATI',
        								 );

        $data_array['arr_mati'] = array( '0' => 'HIDUP',
        								'1' => 'MATI',
        								 );

        $data_array['arr_pindah'] = array( '0' => 'TINGGAL',
        								'1' => 'PINDAH',
        								 );



         $data_array['arr_pendidikan'] = array( '' => '- PILIH PENNDIDIKANN TERAKHIR -',
        								'TIDAK/BELUM SEKOLAH' => 'TIDAK/BELUM SEKOLAH',
        								'BELUM TAMAT SD/SEDERAJAT' => 'BELUM TAMAT SD/SEDERAJAT',
        								'TAMAT SD/SEDERAJAT' => 'TAMAT SD/SEDERAJAT',
        								'SLTP/SEDERAJAT' => 'SLTP/SEDERAJAT',
        								'SLTA/SEDERAJAT' => 'SLTA/SEDERAJAT',
        								'DIPLOMA I/II' => 'DIPLOMA I/II',
        								'AKADEMI/DIPLOMA III/SARJANA MUDA' => 'AKADEMI/DIPLOMA III/SARJANA MUDA',
        								'DIPLOMA IV/STRATA I' => 'DIPLOMA IV/STRATA I',
        								'STRATA II' => 'STRATA II',
        								'STRATA III' => 'STRATA III',
        								 );

        $data_array['arr_agama'] = array( '' => '- PILIH AGAMA -',
        								'ISLAM' => 'ISLAM',
        								'KATHOLIK' => 'KATHOLIK',
        								'KRISTEN' => 'KRISTEN',
        								'BUDDHA' => 'BUDDHA',
        								'HINDU' => 'HINDU',
        								'KONGHUCU' => 'KONGHUCU', );

        $data_array['arr_darah'] = array( '' => '- PILIH GOL. DARAH -',
        								'O' => 'O',
        								'A' => 'A',
        								'B' => 'B',
        								'AB' => 'AB' );

        $data_array['arr_shdk'] = array( '' => '- HUBUNGAN DALAM KELUARGA -',
        								'KEPALA KELUARGA' => 'KEPALA KELUARGA',
        								'ISTRI' => 'ISTRI',
        								'MENANTU' => 'MENANTU',
        								'ANAK' => 'ANAK',
        								 'SAUDARA' => 'SAUDARA',
        								 'CUCU' => 'CUCU',
        								 'MERTUA' => 'MERTUA',
        								 'SUAMI' => 'SUAMI',
        								 'ORANG TUA' => 'ORANG TUA',);


        $data_array['arr_shdrt'] = array( '' => '- SHDRT -',
        								'1' => '1',
        								'2' => '2',
        								'3' => '3',
        								'4' => '4',
        								'5' => '5',
        								'6' => '6',
        								'7' => '7',
        								'8' => '8',
        								'9' => '9',
        								'10' => '10',
        								'11' => '11',
        								'12' => '12',
        								'13' => '13', );

        // show_array($data_array);
        // exit();
        
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Edit Data Penduduk");
		$this->set_title("Edit Data Penduduk");
		$this->set_content($content);
		$this->cetak();
}


function update(){

	$post = $this->input->post();
	// show_array($post);

	 $this->load->library('form_validation');
        $this->form_validation->set_rules('nik','NIK','required');    
        $this->form_validation->set_rules('no_kk','No. KK','required');
        $this->form_validation->set_rules('nama','Nama','required');    
        $this->form_validation->set_rules('jk','Jenis Kelamin','required');
        $this->form_validation->set_rules('tmpt_lhr','Tempat Lahir','required');    
        $this->form_validation->set_rules('tgl_lhr','Tanggal Lahir','required');
        $this->form_validation->set_rules('agama','Agama','required'); 
        $this->form_validation->set_rules('status','Status','required');
        $this->form_validation->set_rules('nama_kk','Nama Kepala Keluarga','required');
        $this->form_validation->set_rules('shdk','SHDK','required');
        $this->form_validation->set_rules('shdrt','SHDRT','required');
        $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
        $this->form_validation->set_rules('pddk_akhir','Pendidikan Terakhir','required');
        $this->form_validation->set_rules('nama_ibu','Nama Ibu','required');
        $this->form_validation->set_rules('nama_ayah','Nama Ayah','required');
        $this->form_validation->set_rules('alamat','Alamat','required');  
        $this->form_validation->set_rules('rt','RT','required'); 
        $this->form_validation->set_rules('rw','RW','required');  

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     
        
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        $post['tgl_lhr'] = flipdate($post['tgl_lhr']);
        $post['nama_prop'] = "NUSA TENGGARA BARAT";
        $post['nama_kab'] = "SUMBAWA";
        $post['nama_kec'] = "MOYO HILIR";
        $post['nama_kel'] = "LABUHAN IJUK";
        $this->db->where('nik', $post['nik']);
        $res = $this->db->update('penduduk', $post); 
        
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
	

}

?>
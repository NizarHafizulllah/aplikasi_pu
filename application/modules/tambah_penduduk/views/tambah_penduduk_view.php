

 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>




 <form id="form_data" class="form-horizontal" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Data Penduduk</h3>
	</div>
	<div class="box-body">

    	<div class="form-group">
    		<label class="col-sm-2 control-label">No. Kartu Keluarga</label>
    		<div class="col-sm-4">
    			<input type="text" name="no_kk" id="no_kk" class="form-control input-style" placeholder="No. KK" value="<?php echo isset($no_kk)?$no_kk:""; ?>">
    		</div>
    		<label class="col-sm-2 control-label">No. Induk</label>
    		<div class="col-sm-4">
    			<input type="text" name="nik" id="nik" class="form-control input-style" placeholder="NIK" value="<?php echo isset($nik)?$nik:""; ?>">
    		</div>
    	</div> 

    	<div class="form-group">
    		<label class="col-sm-2 control-label">Nama</label>
    		<div class="col-sm-4">
    			<input type="text" name="nama" id="nama" class="form-control input-style" placeholder="Nama" value="<?php echo isset($nama)?$nama:""; ?>">
    		</div>
    		<label class="col-sm-2 control-label">Jenis Kelamin</label>
    		<div class="col-sm-4">
    			<?php echo form_dropdown("jk",$arr_kelamin,isset($jk)?$jk:'','id="jk" class="form-control input-style"'); ?>
    		</div>
    	</div> 

    	<div class="form-group">
    		<label class="col-sm-2 control-label">Tempat Lahir</label>
    		<div class="col-sm-4">
    			<input type="text" name="tmpt_lhr" id="tmpt_lhr" class="form-control input-style" placeholder="Tempat Lahir" value="<?php echo isset($tmpt_lhr)?$tmpt_lhr:""; ?>">
    		</div>
    		<label class="col-sm-2 control-label">Tgl. Lahir</label>
    		<div class="col-sm-4">
    			<input type="text" name="tgl_lhr" id="tgl_lhr" class="tanggal form-control input-style" placeholder="Tgl. Lahir" value="<?php echo isset($tgl_lhr)?$tgl_lhr:""; ?>" data-date-format="dd-mm-yyyy">
    		</div>
    	</div> 

    	<div class="form-group">
    		<label class="col-sm-2 control-label">Gol. Darah</label>
    		<div class="col-sm-4">
    			<?php echo form_dropdown("gdr",$arr_darah,isset($gdr)?$gdr:'','id="gdr" class="form-control input-style"'); ?>
    		</div>
    		<label class="col-sm-2 control-label">Agama</label>
    		<div class="col-sm-4">
    			<?php echo form_dropdown("agama",$arr_agama,isset($agama)?$agama:'','id="agama" class="form-control input-style"'); ?>
    		</div>
    	</div> 

    	<div class="form-group">
    		<label class="col-sm-2 control-label">Status</label>
    		<div class="col-sm-4">
    			<?php echo form_dropdown("status",$arr_status,isset($status)?$status:'','id="status" class="form-control input-style"'); ?>
    		</div>
    		<label class="col-sm-2 control-label">Nama Kepala Keluarga</label>
    		<div class="col-sm-4">
    			<input type="text" name="nama_kk" id="nama_kk" class="form-control input-style" placeholder="Nama Kepala Keluarga" value="<?php echo isset($nama_kk)?$nama_kk:""; ?>">
    		</div>
    	</div> 

    	<div class="form-group">
    		<label class="col-sm-2 control-label">SHDK</label>
    		<div class="col-sm-4">
    			<?php echo form_dropdown("shdk",$arr_shdk,isset($shdk)?$shdk:'','id="shdk" class="form-control input-style"'); ?>
    		</div>
    		<label class="col-sm-2 control-label">SHDRT</label>
    		<div class="col-sm-4">
    			<?php echo form_dropdown("shdrt",$arr_shdrt,isset($shdrt)?$shdrt:'','id="shdrt" class="form-control input-style"'); ?>
    		</div>
    	</div> 

    	<div class="form-group">
    		<label class="col-sm-2 control-label">Pekerjaan</label>
    		<div class="col-sm-4">
    			<input type="text" name="pekerjaan" id="pekerjaan" class="form-control input-style" placeholder="Pekerjaan" value="<?php echo isset($pekerjaan)?$pekerjaan:""; ?>">
    		</div>
    		<label class="col-sm-2 control-label">Pendidikan Terakhir</label>
    		<div class="col-sm-4">
    		<?php echo form_dropdown("pddk_akhir",$arr_pendidikan,isset($pddk_akhir)?$pddk_akhir:'','id="pddk_akhir" class="form-control input-style"'); ?>
    		</div>
    	</div> 

    	<div class="form-group">
    		<label class="col-sm-2 control-label">Nama Ibu</label>
    		<div class="col-sm-4">
    			<input type="text" name="nama_ibu" id="nama_ibu" class="form-control input-style" placeholder="Nama Ibu" value="<?php echo isset($nama_ibu)?$nama_ibu:""; ?>">
    		</div>
    		<label class="col-sm-2 control-label">Nama Ayah</label>
    		<div class="col-sm-4">
    			<input type="text" name="nama_ayah" id="nama_ayah" class="form-control input-style" placeholder="Nama Ayah" value="<?php echo isset($nama_ayah)?$nama_ayah:""; ?>">
    		</div>
    	</div> 

    	<div class="form-group">
    		<label class="col-sm-2 control-label">Alamat</label>
    		<div class="col-sm-4">
    			<textarea class="form-control input-style" name="alamat" id="alamat"><?php echo isset($alamat)?$alamat:""; ?></textarea>
    		</div>
    		<label class="col-sm-2 control-label">Rt/Rw</label>
    		<div class="col-sm-2">
    			<input type="text" name="rt" id="rt" class="form-control input-style" placeholder="Rt" value="<?php echo isset($rt)?$rt:""; ?>">
    		</div>
    		<div class="col-sm-2">
    			<input type="text" name="rw" id="rw" class="form-control input-style" placeholder="Rw" value="<?php echo isset($rw)?$rw:""; ?>">
    		</div>
    	</div>


    	<?php
        	if ($action=='update') { ?>
        		<div class="form-group">
    		<label class="col-sm-2 control-label">Status Mati</label>
    		<div class="col-sm-4">
    			<?php echo form_dropdown("status_mati",$arr_mati,isset($status_mati)?$status_mati:'','id="status_mati" class="form-control input-style"'); ?>
    		</div>
    		<label class="col-sm-2 control-label">Status Pindah</label>
    		<div class="col-sm-4">
    			<?php echo form_dropdown("status_pindah",$arr_pindah,isset($status_pindah)?$status_pindah:'','id="status_pindah" class="form-control input-style"'); ?>
    		</div>
    	</div>s
        	

        <?php	} ?>


    	

    	<div class="form-group pull-center">
    	<div class="col-md-2"></div>
        <div class="col-sm-4">
        <?php
        	if ($action=='simpan') { ?>
        		
        	 <button id="tombolsubmitsimpan" style="border-radius: 4;" type="submit" class="btn btn-primary"  >Simpan</button>

        <?php	}else{ ?>

         <button id="tombolsubmitupdate" style="border-radius: 4;" type="submit" class="btn btn-primary"  >Update</button>
		<?php
        	}
         ?>

         
          <a href="<?php echo site_url('lihat_data'); ?>"><button style="border-radius: 4;" id="reset" type="button" class="btn btn-danger">Kembali</button></a>
        </div>
      </div> 

	</div><!-- /.box-body -->
</div>
 </form>
      <?php 
$this->load->view($this->controller."_view_js");
?>
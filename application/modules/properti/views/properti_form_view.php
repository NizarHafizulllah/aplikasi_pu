

 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
 <script src="<?php echo base_url("assets"); ?>/vendors/fileinput/js/fileinput.min.js"></script>
 <link href="<?php echo base_url("assets"); ?>/vendors/fileinput/css/fileinput.min.css" rel="stylesheet">
<script src="<?php echo base_url("assets"); ?>/ckeditor/ckeditor.js"></script>


 <form id="form_data" class="form-horizontal" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form" enctype="multipart/form-data"> 
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Data Properti</h3>
	</div>
	<div class="box-body">

    	<div class="form-group">
    		<label class="col-sm-3 control-label">Nama</label>
    		<div class="col-sm-9">
    			<input type="text" name="nama" id="nama" class="form-control input-style" placeholder="Nama" value="<?php echo isset($nama)?$nama:""; ?>">
    		</div>
    	</div> 

    	<div class="form-group">
    		
    		<label class="col-sm-3 control-label">Jenis Properti</label>
    		<div class="col-sm-9">
    			<?php echo form_dropdown("jenis",$arr_jenis,isset($jenis)?$jenis:'','id="jenis" class="form-control input-style"'); ?>
    		</div>
    	</div> 

    	<div class="form-group">
    		<label class="col-sm-3 control-label">Lat</label>
    		<div class="col-sm-4">
    			<input type="text" name="lat" id="lat" class="form-control input-style" placeholder="Lat" value="<?php echo isset($lat)?$lat:""; ?>">
    		</div>
    		<label class="col-sm-1 control-label">Lng</label>
    		<div class="col-sm-4">
                <input type="text" name="lng" id="lng" class="form-control input-style" placeholder="Lng" value="<?php echo isset($lng)?$lng:""; ?>">
            </div>
    	</div> 

        <div class="form-group">
            <label class="col-sm-3 control-label">Image</label>
            <div class="col-sm-9">
                <input type="file" name="image" id="image" class="file form-control" data-show-preview="true" />
            </div>
        </div> 

        <div class="form-group">
            <label class="col-sm-3 control-label">Keterangan</label>
            <div class="col-sm-9">
                <textarea name="keterangan" id="keterangan" class="ckeditor"></textarea>
            </div>
        </div> 

    	

    	




    	

    	<div class="form-group pull-center">
    	<div class="col-md-3"></div>
        <div class="col-sm-4">
        <?php
        	if ($action=='simpan') { ?>
        		
        	 <button id="tombolsubmitsimpan" style="border-radius: 4;" type="submit" class="btn btn-primary"  >Simpan</button>

        <?php	}else{ ?>

         <button id="tombolsubmitupdate" style="border-radius: 4;" type="submit" class="btn btn-primary"  >Update</button>
		<?php
        	}
         ?>

         
          <a href="<?php echo site_url('properti'); ?>"><button style="border-radius: 4;" id="reset" type="button" class="btn btn-danger">Kembali</button></a>
        </div>
      </div> 

	</div><!-- /.box-body -->
     <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'keterangan' );
            </script>
</div>
 </form>



      <?php 
$this->load->view($this->controller."_form_view_js");
?>
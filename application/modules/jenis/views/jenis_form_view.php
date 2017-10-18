

 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
 <script src="<?php echo base_url("assets"); ?>/vendors/fileinput/js/fileinput.min.js"></script>
 <link href="<?php echo base_url("assets"); ?>/vendors/fileinput/css/fileinput.min.css" rel="stylesheet">



 <form id="form_data" class="form-horizontal" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form" enctype="multipart/form-data"> 
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Data Properti</h3>
	</div>
	<div class="box-body">

    	<div class="form-group">
    		<label class="col-sm-3 control-label">Jenis</label>
    		<div class="col-sm-9">
    			<input type="text" name="jenis" id="jenis" class="form-control input-style" placeholder="Jenis" value="<?php echo isset($jenis)?$jenis:""; ?>">
    		</div>
    	</div> 

        <div class="form-group">
            <label class="col-sm-3 control-label">Icon</label>
            <div class="col-sm-9">
                <input type="file" name="icon" id="icon" class="file form-control" data-show-preview="true" />
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

         
          <a href="<?php echo site_url('jenis'); ?>"><button style="border-radius: 4;" id="reset" type="button" class="btn btn-danger">Kembali</button></a>
        </div>
      </div> 

	</div><!-- /.box-body -->
</div>
 </form>
      <?php 
$this->load->view($this->controller."_form_view_js");
?>
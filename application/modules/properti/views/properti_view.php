 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


        <!-- Content Header (Page header) -->
        

          <!-- Default box -->
          

            

            <form role="form" action="" id="btn-cari" >
            <div class="row">
            
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">Nama</label>
                <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama" ></input>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">Jenis</label>
                <?php echo form_dropdown("",$arr_jenis,isset($jenis)?$jenis:'','id="jenis" class="form-control select2" required'); ?>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary form-control" id="btn_submit"><i class="fa fa-search"></i> Cari</button>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <button type="reset" class="btn btn-danger form-control" id="btn_reset"><i class="fa fa-ban"></i> Reset</button>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
              <label>&nbsp;</label>
                <a href="<?php echo site_url($this->controller.'/import'); ?>" class="btn btn-warning form-control" ><i class="fa fa-file-excel-o"></i> Import Data</a>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
              <label>&nbsp;</label>
                <a href="<?php echo site_url($this->controller.'/baru'); ?>" class="btn btn-success form-control" ><i class="fa fa-user-plus"></i> Tambah Data</a>
              </div>
            </div>
            </div>

             
            
            </form>
            


<table width="100%" border="0" id="biro_jasa" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr  > 
        <th>ID</th>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Lat</th>
        <th>Lng</th>
        <th>Action</th>
    </tr>
  
</thead>
</table>
            



<?php 
$this->load->view($this->controller."_view_js");
?>
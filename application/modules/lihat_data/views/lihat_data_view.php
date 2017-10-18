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
                <label for="Tanggal">NIK</label>
                <input name="nik" id="nik" type="text" class="form-control" placeholder="NIK" ></input>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">No. KK</label>
                <input name="no_kk" id="no_kk" type="text" class="form-control" placeholder="No. KK"></input>
              </div>
            </div>

            
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama"></input>
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
            </div>

             <div class="row">
             <div class="col-md-7">&nbsp;</div>
            <div class="col-md-2">
              <div class="form-group">
                <a href="<?php echo site_url('import_data'); ?>" class="btn btn-warning form-control" ><i class="fa fa-file-excel-o"></i> Import Data</a>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <a href="<?php echo site_url('tambah_penduduk'); ?>" class="btn btn-success form-control" ><i class="fa fa-user-plus"></i> Tambah Data</a>
              </div>
            </div>
            </div>
            </form>
            


<table width="100%" border="0" id="biro_jasa" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr  > 
        <th>No. KK</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>JK</th>
        <th>Action</th>
    </tr>
  
</thead>
</table>
            



<?php 
$this->load->view($this->controller."_view_js");
?>
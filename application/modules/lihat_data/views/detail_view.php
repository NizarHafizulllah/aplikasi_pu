<div class="col-md-6">

<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Data Pribadi</h3>
	</div>
	<div class="box-body">
        <div class="form-group">
            <label class="col-sm-4 control-label">NIK</label>
            <label class="col-sm-8 control-label">: <?php echo $nik ?></label>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label">Nama</label>
            <label class="col-sm-8 control-label">: <?php echo $nama ?></label>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label">Jenis Kelamin</label>
            <label class="col-sm-8 control-label">: <?php 
                    if ($jk=='L') {
                        echo 'LAKI-LAKI';
                    }else{
                        echo "PEREMPUAN";
                    } ?></label>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label">TTL</label>
            <label class="col-sm-8 control-label">: <?php echo $tmpt_lhr.', '.$tgl_lhr; ?></label>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label">Umur</label>
            <label class="col-sm-8 control-label">: <?php $from = new DateTime($tgl_lhr);
            $to = new DateTime('today');
            $age = $from->diff($to)->y.' Tahun '.$from->diff($to)->m.' Bulan '.$from->diff($to)->d.' Hari';
            echo $age ?></label>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label">Gol. Darah</label>
            <label class="col-sm-8 control-label">: <?php echo $gdr; ?></label>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Status Perkawinan</label>
            <label class="col-sm-8 control-label">: <?php echo $status; ?></label>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Agama</label>
            <label class="col-sm-8 control-label">: <?php echo $agama; ?></label>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Alamat</label>
            <label class="col-sm-8 control-label">: <?php echo $alamat; ?></label>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">RT/RW</label>
            <label class="col-sm-8 control-label">: <?php echo $rt.'/'.$rw; ?></label>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Desa</label>
            <label class="col-sm-8 control-label">: <?php echo $nama_kel; ?></label>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Kabupaten</label>
            <label class="col-sm-8 control-label">: <?php echo $nama_kab; ?></label>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Provinsi</label>
            <label class="col-sm-8 control-label">: <?php echo $nama_prop; ?></label>
        </div>

    	<div class="form-group pull-right">
        <div class="col-md-4"></div>
        <div class="col-sm-8">
          <a href="<?php echo site_url('lihat_data'); ?>"><button style="border-radius: 4;" id="reset" type="button" class="btn btn-danger">Kembali</button></a>
        </div>
      </div>

	</div><!-- /.box-body -->
</div>




</div>
<div class="col-md-6">

    <div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Data Keluarga</h3>
    </div>
    <div class="box-body">

        <div class="form-group">
            <label class="col-sm-4 control-label">No. Kartu Keluarga</label>
            <label class="col-sm-8 control-label">: <?php echo $no_kk; ?></label>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label">SHDK</label>
            <label class="col-sm-8 control-label">: <?php echo $shdk; ?></label>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label">SHDRT</label>
            <label class="col-sm-8 control-label">: <?php echo $shdrt; ?></label>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label">Kepala Keluarga</label>
            <label class="col-sm-8 control-label">: <?php echo $nama_kk ?></label>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label">Nama Ibu</label>
            <label class="col-sm-8 control-label">: <?php echo $nama_ibu; ?></label>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label">Nama Ayah</label>
            <label class="col-sm-8 control-label">: <?php echo $nama_ayah; ?></label>
        </div>
        

    </div><!-- /.box-body -->
</div>
    
    <div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Data Umum</h3>
    </div>
    <div class="box-body">

        <div class="form-group">
            <label class="col-sm-4 control-label">Pekerjaan</label>
            <label class="col-sm-8 control-label">: <?php echo $pekerjaan ?></label>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label">Pendidikan Terakhir</label>
            <label class="col-sm-8 control-label">: <?php echo $pddk_akhir ?></label>
        </div> 

        

    </div><!-- /.box-body -->
</div>

</div>

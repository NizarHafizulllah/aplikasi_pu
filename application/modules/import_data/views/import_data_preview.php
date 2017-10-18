 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">

<div class="col-md-12">
<form class="form-inline" id="gembreng" enctype="multipart/form-data" method="post" action="<?php echo site_url($this->controller."/save"); ?>">
<button type="submit" class="btn btn-primary">Import Data</button>
<table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                         <th width="3%"><input type="checkbox" id="selall" name="selall" value="1" /></th>
                        <th width="4%" >NO.</th>
                        <th width="12%" >NIk</th>
                        <th width="12%" >Nama</th>
                        <th width="9%" >Inisial</th>
                        <th width="12%" >Pasal</th>
                        <th width="10%" >Tgl. Masuk</th>
                        <th width="14%" >Tgl. Ekspirasi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
        $i = 0;
        //show_array($data);  
        foreach($data as $index => $row) : 
        $i++;
        ?>   
           <tr>
             <td><input class="ck_data" type="checkbox" name="data[<?php echo $row['nik']; ?>]" value="<?php echo isset($row['nik'])?$row['nik']:""; ?>" /></td>
             <td><?php echo $i; ?></td>
             <td><?php echo $row['nik']; ?></td>
             <td><?php echo $row['no_kk']; ?></td>
             <td><?php echo $row['nama']; ?></td>
             <td><?php echo $row['pekerjaan']; ?></td>
             <td><?php echo $row['jk']; ?></td>
             <td><?php echo $row['alamat']; ?></td>
       </tr>
           <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th width="3%">&nbsp;</th>
                        <th width="4%" >NO.</th>
                        <th width="12%" >No. Registrasi</th>
                        <th width="12%" >Nama</th>
                        <th width="9%" >Inisial</th>
                        <th width="12%" >Pasal</th>
                        <th width="10%" >Tgl. Masuk</th>
                        <th width="14%" >Tgl. Ekspirasi</th>
                      </tr>
                    </tfoot>
                  </table>

                  </form>

</div>


    <script>
      $(function () {
        $('#example2').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

<script>
 $(document).ready(function(){
 
$("#selall").click(function(){
    
    if(this.checked) { // check select status
            $('.ck_data').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.ck_data').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }

    
}
);
});              
</script>
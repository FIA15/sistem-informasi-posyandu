
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2021 <a href="#" class="text-success">DINAS SOSIAL KAB.KARAWANG</a></strong>
  </footer>
</div>
<!-- ./wrapper -->


<script src="<?=base_url('_assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<script src="<?=base_url('_assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('_assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?=base_url()?>/_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>/_assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?=base_url()?>/_assets/dist/js/adminlte.min.js"></script>
<script src="<?=base_url()?>/_assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- <script >
$(document).ready(function() {
  $("#kecamatan").change(function(){
//    var kecamatan = $("#kecamatan").val();
      $.ajax({
        url:"pegawai/ambildesa.php",
        data: "kecamatan="+kecamatan,
        cache: false,
  //      success: function(data){
    //      $("#desa").html(data);
      //  }
    //  });
  //});
//});
</script> -->
<script>
// kalender
  $(document).ready(function() {
      $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true,
          todayHighlight: true,
      });
  });

// table
  $(document).ready(function() {
    $('#table1').DataTable()
  });

// Radio
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    $("#kecamatan").change(function(){
    // variabel dari nilai combo box kendaraan
    var id_kecamatan = $("#kecamatan").val();
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "ambildesa.php",
        data: "kecamatan="+id_kecamatan,
        success: function(data){
            $("#desa").html(data);
        }
    });
});

</script>
</body>
</html>

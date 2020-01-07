<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

        <section class="content">
          <div class="col-md-8 col-md-offset-2">
            <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pengaturan Aplikasi</h3>
            </div>
            <div class="box-body">

              <div class="col-md-12">
                <form class="" action="" method="post">
                  <div class="form-group">
                    <label>Denda (%)</label>
                    <input type="number" min=1 max=100 class="form-control" name="denda" value="<?= $denda ?>">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success" >Simpan</button>
                  </div>
                </form>
              </div>
              <div class="col-md-12">

              </div>
            </div>
          </div>
          </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var t = $("#mytable").dataTable({});
    });
</script>

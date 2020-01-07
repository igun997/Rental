<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Verifikasi Data Pengguna</small></h1>
        </section><!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-info">


                        <div class="box-header with-border">
                            <h3 class="box-title">DATA PENGGUNA</h3>
                        </div><!-- /.box-header -->

                        <!-- form start -->
                        <div class="box-body">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table" id="dtable">
                                    <thead>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>USERNAME</th>
                                      <th>NO TELEPON</th>
                                      <th>KTP</th>
                                      <th>SIM</th>
                                      <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($user as $key => $value): ?>
                                        <?php if ($value->SIM != null): ?>
                                          <tr>
                                            <td><?= ($key+1) ?></td>
                                            <td><?= $value->NAME ?></td>
                                            <td><?= $value->USERNAME ?></td>
                                            <td><?= $value->NO_TELP ?></td>
                                            <td>
                                              <a href="<?= base_url("upload/mobil/".$value->KTP) ?>" target="_blank" >
                                                <img src="<?= base_url("upload/mobil/".$value->KTP) ?>" class="img-responsive" style="width:auto;height:200px" alt="">
                                              </a>
                                            </td>
                                            <td>
                                              <a href="<?= base_url("upload/mobil/".$value->SIM) ?>" target="_blank" >
                                                <img src="<?= base_url("upload/mobil/".$value->SIM) ?>" class="img-responsive" style="width:auto;height:200px" alt="">
                                              </a>
                                            </td>
                                            <td>
                                              <a href="<?= site_url("verifikasi/confirm/".$value->ID_USER) ?>" class="btn btn-success">Konfirmasi</a>
                                            </td>
                                          </tr>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.col (right) -->
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

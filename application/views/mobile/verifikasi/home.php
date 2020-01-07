<style media="screen">
input[type="file"] {
  display: none;
}
.custom-file-upload {
  border: 1px solid #ccc;
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
}
</style>
<div class="row">
  <div class="col-12">
    <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">VERIFIKASI</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <form class="" action="" method="post" enctype="multipart/form-data">
                      <table class="table table-bordered">
                        <tr>
                          <th>KTP</th>
                          <td>
                            <?php if ($detail->VALID == 0 && $detail->KTP == null): ?>
                              <label for="file-upload" class="custom-file-upload btn-block">
                                <center>
                                  <i class="fa fa-upload"></i> Pilih KTP
                                </center>
                              </label>
                              <input id="file-upload" name="KTP" type="file" />
                            <?php endif; ?>
                            <?php if ($detail->VALID == 1): ?>
                              <span class="badge badge-success">Terverifikasi</span>
                            <?php endif; ?>
                            <?php if ($detail->SIM != null): ?>
                              <span class="badge badge-warning">Menunggu Verifikasi</span>
                            <?php endif; ?>
                          </td>
                        </tr>
                        <tr>
                          <th>SIM</th>
                          <td>
                            <?php if ($detail->VALID == 0 && $detail->SIM == null): ?>
                              <label for="file-uploads" class="custom-file-upload btn-block">
                                <center>
                                  <i class="fa fa-upload"></i> Pilih SIM
                                </center>
                              </label>
                              <input id="file-uploads" name="SIM" type="file" />
                            <?php endif; ?>
                            <?php if ($detail->VALID == 1): ?>
                              <span class="badge badge-success">Terverifikasi</span>
                            <?php endif; ?>
                            <?php if ($detail->SIM != null): ?>
                              <span class="badge badge-warning">Menunggu Verifikasi</span>
                            <?php endif; ?>
                          </td>
                        </tr>
                        <?php if ($detail->SIM == null): ?>

                          <tr>
                            <td colspan="2">
                              <button type="submit" class="btn btn-success btn-block btn-large">
                                Upload Identitas
                              </button>
                            </td>
                          </tr>
                        <?php endif; ?>
                      </table>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
  </div>
</div>

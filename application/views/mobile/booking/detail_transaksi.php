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
                <h3 class="card-title">Detail <?= $transaksi->KODE_TRANSAKSI ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                      <table class="table table-bordered">
                        <tr>
                          <th>Kode transaksi</th>
                          <td><?= $transaksi->KODE_TRANSAKSI ?></td>
                        </tr>
                        <tr>
                          <th>Total Bayar</th>
                          <td>Rp.<?= number_format($transaksi->TOTAL_PEMBAYARAN) ?></td>
                        </tr>
                        <tr>
                          <th>Status Bayar</th>
                          <td>
                              <?php if ($transaksi->STATUS_PEMBAYARAN == 0): ?>
                                Belum Lunas
                              <?php endif; ?>
                              <?php if ($transaksi->STATUS_PEMBAYARAN == 1): ?>
                                Lunas
                              <?php endif; ?>
                              <?php if ($transaksi->STATUS_PEMBAYARAN == 2): ?>
                                Ditolak
                              <?php endif; ?>
                          </td>
                        </tr>
                      </table>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <?php if ($transaksi->STATUS_PEMBAYARAN == 0): ?>
                        <div class="col-12">
                          <form class="" action="" method="post">
                            <div class="form-group">
                              <label for="file-upload" class="custom-file-upload btn-block">
                                <center>
                                  <i class="fa fa-upload"></i> Pilih Bukti Pembayaran
                                </center>
                              </label>
                              <input id="file-upload" name="BUKTI_PEMBAYARAN" type="file"/>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-large btn-primary btn-block" >SIMPAN</button>
                            </div>
                          </form>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
  </div>
</div>

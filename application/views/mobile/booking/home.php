<div class="row">
  <div class="col-12">
    <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Pesanan Saya</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <?php foreach ($transaksi as $key => $value): ?>
                    <div class="col-12 mb-2">
                      <a href="<?= base_url("mobile/booking_detail/".$value->KODE_TRANSAKSI) ?>">
                        <?php
                          $row = $this->db->get_where("tb_gallery_mobil",["ID_MOBIL"=>$value->ID_MOBIL])->row();
                        ?>
                        <div class="position-relative p-3 bg-gray" style="height: 180px;background-image:url(<?= base_url("upload/mobil/".$row->IMAGE) ?>)">
                        <div class="ribbon-wrapper">
                          <?php if ($value->STATUS_PEMBAYARAN == 0): ?>
                          <div class="ribbon bg-danger">
                            PENDING
                          </div>
                          <?php endif; ?>
                          <?php if ($value->STATUS_PEMBAYARAN == 1 && $value->STATUS_TRANSAKSI == 1): ?>
                          <div class="ribbon bg-success">
                            LUNAS
                          </div>
                          <?php endif; ?>
                        </div>
                        <p><?= $value->KODE_TRANSAKSI ?></p>
                        <p><li class="fa fa-calendar-times"></li> <?= date("d-m-Y H:i:s",strtotime($value->TGL_SEWA)) ?></p>
                        <p><li class="fa fa-calendar-minus"></li> <?= date("d-m-Y H:i:s",strtotime($value->TGL_AKHIR_PENYEWAAN)) ?></p>
                        <p><li class="fa fa-money-bill-alt"></li> <?= number_format($value->TOTAL_PEMBAYARAN) ?></p>
                      </div>
                      </a>
                    </div>
                  <?php endforeach; ?>

                </div>
              </div>
              <!-- /.card-body -->
            </div>
  </div>
</div>

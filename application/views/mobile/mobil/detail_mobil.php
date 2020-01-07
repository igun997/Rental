<div class="row">
  <div class="col-12">
    <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title"><?= $mobil->NAMA_MOBIL ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <?php
                        $active = 0;
                         ?>
                         <?php foreach ($galeri->result() as $key => $value): ?>
                           <?php if ($active == 0): ?>
                             <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                           <?php endif; ?>
                         <?php endforeach; ?>
                      </ol>
                      <div class="carousel-inner">
                        <?php
                        $active = 0;
                         ?>
                         <?php foreach ($galeri->result() as $key => $value): ?>
                           <?php if ($active == 0): ?>
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="<?= base_url("upload/mobil/".$value->IMAGE) ?>">
                            </div>
                           <?php endif; ?>
                           <div class="carousel-item active">
                             <img class="d-block w-100" src="<?= base_url("upload/mobil/".$value->IMAGE) ?>">
                           </div>
                         <?php endforeach; ?>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6">
                        <p><li class="fa fa-car"></li> <?= $mobil->MERK_MOBIL ?> (<?= $mobil->TAHUN_MOBIL ?>)</p>
                        <p><li class="fa fa-map"></li> <?= $mobil->PLAT_NO_MOBIL ?></p>
                        <p><li class="fas fa-chair"></li> Kapasitas <?= $mobil->KAPASITAS_MOBIL ?></p>
                      </div>
                      <div class="col-6">
                        <p><li class="fas fa-money-check"></li> Rp. <?= number_format($mobil->HARGA_MOBIL) ?> </p>
                        <p><li class="fas fa-palette"></li> <?= $mobil->WARNA_MOBIL ?> </p>
                        <?php if ($mobil->STATUS_SEWA == 1): ?>
                          <p><li class="fas fa-ban"></li> <span class='badge badge-danger'>DISEWA</span> </p>

                        <?php else: ?>
                          <p><li class="fas fa-check"></li> <span class='badge badge-success'>TERSEDIA</span> </p>
                        <?php endif; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-12">
                        <form class="" action="" method="post">
                        <?php if ($mobil->STATUS_SEWA == 0 && $mobil->STATUS_MOBIL == 1): ?>
                        <div class="form-group">
                          <label>Dari</label>
                          <input type="text" class="form-control date" name="TGL_SEWA" value="" required>
                        </div>
                        <div class="form-group">
                          <label>Sampai</label>
                          <input type="text" class="form-control date" name="TGL_AKHIR_PENYEWAAN" value="" required>
                        </div>
                        <div class="form-group">
                          <label>Jam Sewa</label>
                          <input type="text" class="form-control time" name="jam" value="" required>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-large btn-block">
                            SEWA SEKARANG
                          </button>
                        </div>
                        </form>
                        <?php endif; ?>
                      </div>
                    </div>
                    <script type="text/javascript">
                      $(".date").pickadate({
                        format: 'yyyy-mm-dd',
                      });
                      $(".time").pickatime({
                        format: 'HH:i',
                      });
                    </script>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
  </div>
</div>

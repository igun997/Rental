<div class="row">
  <div class="col-12">
    <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Data Mobil</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <?php if ($user->VALID == 1): ?>
                    <?php foreach ($mobil as $key => $value): ?>
                    <div class="col-12 mb-2">
                      <a href="<?= base_url("mobile/view_detail/".$value->ID_MOBIL) ?>">
                        <?php
                          $row = $this->db->get_where("tb_gallery_mobil",["ID_MOBIL"=>$value->ID_MOBIL])->row();
                        ?>
                        <div class="position-relative p-3 bg-gray" style="height: 180px;background-image:url(<?= base_url("upload/mobil/".$row->IMAGE) ?>)">
                        <div class="ribbon-wrapper">
                          <?php if ($value->STATUS_SEWA == 1 && $value->STATUS_MOBIL == 1): ?>
                          <div class="ribbon bg-danger">
                            DISEWA
                          </div>
                          <?php endif; ?>
                          <?php if ($value->STATUS_SEWA == 0 && $value->STATUS_MOBIL == 1): ?>
                          <div class="ribbon bg-success">
                            TERSEDIA
                          </div>
                          <?php else: ?>
                            <?php if ($value->STATUS_MOBIL == 0): ?>
                              <div class="ribbon bg-dark">
                                KOSONG
                              </div>
                            <?php endif; ?>
                          <?php endif; ?>
                        </div>
                        <?= $value->NAMA_MOBIL ?> <br>
                      </div>
                      </a>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <div class="col-12">
                    <div class="alert alert-danger">
                      Silahkan Verifikasi Identitas Anda Di Menu Verifikasi
                    </div>
                  </div>
                <?php endif; ?>

                </div>
              </div>
              <!-- /.card-body -->
            </div>
  </div>
</div>
